Intro :
По Хую мороз : po rouyou morosse
Ты будешь водку?  : té boudiche vodkou
Конечно братан : queniéchna bratane

Comme tu voudwa maille ace liqinegue coque seuqueur mozeur feuquine sonne ove eu bitche

# I - Présentation
Framework PHP :
    - Cadre de travail : imposer une structure / façons de coder
    - Basé du MVC : model / view / controller
    - Avantages :
        - Une fois pris le main, utiliser le framework va grandement améliorer la vitesse de développement
        - Utilisation de bibliothèques éprouvées, + de sécurité + de facilité
        - Evolutivité et maintenance
        - Travail en équipe avec les devs
Concurrents :
    - ZendFramework
    - CakePHP
    - Silex


- Installation Symfony
    - Serveur web, php, base de données : xxamp (apache, php, mysql)
    - composer (composer-setup.exe) : https://getcomposer.org/download/
    - symfony installer : https://symfony.com/download
    - mettre php, composer, et symfony dans les variables
        (les installer composer et symfony le font automatiquement,
        donc reste php : on met le chemin du dossier de php.exe dans la variable environnement PATH)
    
    Nouveau projet : 
    - Se placer en ligne de commande dans le htdocs
        - symfony new --full symfony-tp
        OU
        - composer create-project symfony/website-skeleton symfony-tp
    OU récupérer un projet sur git ;
        - git clone url...
    Quand on récupère un projet depuis, certains fichiers ne sont versionnés, comme les vendor. 
    On les installe avec la commande : composer update    
              
    - créer un vhost : créer un nom de domaine uniquement pour notre poste
      et le faire vers le répertoire public de notre projet symfony
      On crée dans les fichiers de configuration de apache :
        - C:\xampp\apache\conf\extra\http-vhosts.conf et ajouter 
            <VirtualHost *:80>
                DocumentRoot "C:/xampp/htdocs/remise à niveau/8-symfony-tp/public"
                ServerName mon-symfony-tp.local
            </VirtualHost>
        - on redémarre pour prendre en compte le nouveau vhost
        
        - On dit à notre machine de rediriger ce domaine vers notre propre machine
          On modifie C:\Windows\System32\drivers\etc\host, pour ajouter :
          127.0.0.1		mon-symfony-tp.local
        
        - Dans le navigateur on tape : http://mon-symfony-tp.local
            
- Serveur Apache : Si vous utilisez apache comme serveur, pensez à installer
    le recipe : apache2-pack
    composer require symfony/apache-pack
        
- Création de la base la bdd :
    - On configure la chaine de connexion à une base dans le fichier .env
      à la racine du projet
    - On lance la commande pour créer la bdd dans mysql :
      php bin/console doctrine:database:create


Basé sur MVC :
    - models : entitiés, les classes d'objets qu'on veut gérer en bdd
    - views : les vues : ce que l'utilisateur va voir
    - controllers : orchestre tous les composants dont on a besoin pour retourner une réponse à afficher
        
# II - Utilisation

On ne crée un fichier par page, on va créer des routes, et les faire correspondre à un controller.
https://user.oc-static.com/upload/2018/10/21/15401393531707_14%20-%20router%20chapter%20router.png

    ## 1 - Controllers

Le controller est un point d'entrée, il faut faire une URL à chaque méthode du controller.
Générer un controller en ligne de commande :
php bin/console make:controller

Pour créer une page, il faut au minimum :
    - une route (annotation dans la classe controller)
    - un controller (fonction dans la classe controller juste en dessous)
    - un template (fichier .twig dans le dossier template)
    
Exercice : 
Créer un nouveau controller, puis créer une nouvelle page
qui affiche un doctype html complet, et le mot Hello World!
dans la balise body

    ## 1-bis Routing
Un controller est appelé si le composant routing fait un lien entre une
url et un pattern défini dans la route. Une fonction d'un controller doit obligatoire
retourner une objet Response.

- Les patterns peuvent des paramètres dynamiques : /article/read/{id}
Ici {id} est un paramètre d'URL qu'on va pouvoir dans le controller en injectant
la variable PHP $id dans les paramètres de la fonction.

Du coup, il faut faire attention : si un pattern écrit en dur correspondant
à une pattern dynamique déclaré avant, on ne pourra jamais accéder à cette page.
    Exemple :
        - /article/read/all
        Doit se trouver avant :
        - /article/read/{id}
        
- Les routes peuvent avoir des configurations particulières (voir controller RouteController) :
    - requirements : indiquer des expressions régulières que les paramètres d'url doivent respecter
    - defaults : donner des valeurs par défaut aux paramètres d'url (ce qui les rend facultatifs)
    - methods : indiquer quels sont les types de méthodes htttp (GET, POST, etc.) sont autorisées pour la route
    


    ## 2 - Templates
Par défaut avec Symfony, les templates sont générés avec Twig : moteur de template

Avec la méthode $this->render() dans un controller, on peut générer un template
en lui passant des variables.
Il faut indiquer le chemin du template dans le 1er paramètre.
On peut passer des variables dans le 2ème : il faut passer un tableau associatif,
les clés seront les noms de variables à utiliser dans le template.

- Dans le template, on peut alors utiliser ces variables.
    - Afficher une variable : {{ nom_variable }}
    - Faire quelquechose (condition, boucle) : {%  %}
    - Commentaires : {# #}
    
- Hériter d'un template avec extends :
    - reprendre le contenu d'un template parent
    et pouvoir modifier le contenu des blocks qui s'y trouvent
    - on peut redéfinir les blocks dans l'ordre que l'on veut
    - on peut reprendre le contenu du bloc parent grâce à la fonction parent()
    
- Générer des URLS
    - Dans nos templates, on peut vouloir faire des liens vers d'autres. On 
    utilise la fonction twig path(), dont le premier paramètre est le nom de 
    la route dont on veut l'URL
    
- Dans un template, on peut écrire {{ objet.attribut }} :
    Précisions sur la syntaxe{{ objet.attribut }}
    Le fonctionnement de la syntaxe{{ objet.attribut }} est un peu plus complexe qu'elle n'en a l'air.
    Elle ne fait pas seulementobjet->getAttribut.
    En réalité, voici ce qu'elle fait exactement :

    Elle vérifie si objet est un tableau, et si attribut est un index valide.
    Si c'est le cas, elle affiche objet['attribut'].
    Sinon, et si objet est un objet, elle vérifie si attribut est
    un attribut valide (public donc). Si c'est le cas, elle afficheobjet->attribut.

    Sinon, et si objet est un objet, elle vérifie si attribut() est
    une méthode valide (publique donc). Si c'est le cas, elle afficheobjet->attribut().

    Sinon, et si objet est un objet, elle vérifie si getAttribut() est
    une méthode valide. Si c'est le cas, elle afficheobjet->getAttribut().

    Sinon, et si objet est un objet, elle vérifie si isAttribut() est
    une méthode valide. Si c'est le cas, elle afficheobjet->isAttribut().

    Sinon, bug.
    
    ## Entités
Ce sont les données qu'on veut persister, qui représentent
le côté "métier" de notre application.
Par exemple dans un site e-commerce : produit, commande, utilisateur, etc.

1 - Création entité / Structure 
    On va alors modéliser nos entités par des classes d'objets,
    et on laisse doctrine faire les intéractions avec la base grâce à un mapping.
    
    1 - Configurer les accès à la base dans le fichier .env
        DATABASE_URL
        
    2 - Créer la base de données :
        php bin/console doctrine:database:create
    
    3 - Créer une entité : exemple Produit(nom, prix, description, en stock)
        php bin/console make:entity
    
    4 - Mettre à jour la structure de la base
        php bin/console doctrine:schema:update --force
        
    5 - Créer une autre entité
    6 - Mettre à jour la structure de la base
    7 - etc.
    
2 - Utilisation des entités

Dans un controller, on a besoin d'une entité, de l'entité manager de Doctrine.
Il suffit ensuite d'appeler la méthode persist de l'em, puis flush pour envoyer en bdd.

    ## Récupération des entités
On récupère des entités en passant par les Repository (pour indiquer quel le type d'entité à récupérer).
Il y a 4 méthodes par défaut : find(), findAll(), findBy(), findOneBy()
    - find: pour récupérer une entité par son ID
    - findAll: récupérer toutes les entités
    - findOneBy: récupérer une entité en fonction de un ou plusieurs paramètres
    - findBy: récupérér plusieurs entités en fonction de un ou plusieurs paramètres

On peut ajouter des méthodes à un repository pour créer des requêtes personnalisées
(voir AdvancedDoctrineController et ArticleRepository)
On a un repo associé à chaque entité : on peut créer des fonctions dans ce repo.
Il faut créer un "query builder", où on met nos critères spécifiques (where, group by, etc.).
Gr$ace à ce query builder, on récupère la "query".
Et sur la query, on récupère les résultats.

Ensuite, dans un controller, on pourra récupérer le Repo concerné et appeler les nouvelles fonctions.
    


    ## Formulaire
   
Pour "hydrater" une entité, on passait avant par un formulaire html,
puis on devait récupérer les valeurs une par une, les vérifier,
et instancier un objet pour lui setter ses propriétés grâce aux valeurs
récupérées.
Avec Symfony, on va laisser ces tâches au composant Form.

    1- Créer une entité (Product)
    2- Créer le formulaire associé (ProductType)
        - ajouter/retirer les champs qu'on veut afficher
        - configurer les champs
    3- Dans le controller, on va créer ce formulaire
    (4-) Quand l'utilisateur a validé le formulaire, le composant va nous
        permettre d'avoir une nouvelle entité avec les propriétés déjà settées
    5- Passer ce formulaire à notre template

    ## Messages Flash
    
Les messages flash sont des messages destinés à n'être affichés qu'une seule fois.
Ils sont pratiques lors de la création/modification/suppression des entités.
Un message flash est un message mis en session, et supprimé de la session dès lors qu'il est affiché.

Créer un message (dans un controller) :
    
```
$this->addFlash("type", "le message à afficher");
```

Afficher un message flash (dans un template)
```
{% for key, messages in app.flashes %}
    {% for message in messages %}
        <div class="alert alert-{{ key }}">{{ message }}</div>
    {% endfor %}
{% endfor %}
```

    ## Afficher le formulaire dans un template
    
1 - Afficher le formulaire en une seule fois :
On passe le FormView dans la fonction twig form()
{{ form(variableForm) }}

2 - afficher champ par champ
On utilise la fonction form_row pour afficher un champ (label, widget, erreur)
Et il faut ouvrir le formulaire et le fermer
Fonction form_start va générer la balise d'ouverture avec les propriétés définies
côté server (method, action, etc.)
Form form_end va générer la balise de fermeture en affichant les champs qui n'auraient
pas encore été affichés (dont le _token, champ hidden de sécurité)

3 - Afficher chaque élément d'un champ de façon indépendant : label, widget, erreur
form_label : pour afficher uniquement le label du champ
form_widget : pour afficher uniquement le widget (input, textarea, select) du champ
form_errrors : pour afficher uniquement l'erreur serveur du champ

    ## Validation des entités
Le service validator de symfony nous permet de valider des entités :
est-ce que les données sont valides ?
Le service form.factory utilise le service validator, sans qu'on ait besoin
de le préciser.

Il faut simplement configurer nos entités avec les contraintes
(obligatoire, pattern, unicité, etc.)
https://symfony.com/doc/current/reference/constraints.html

La validation serveur est fortement conseillée pour tout dev digne de ce nom.
    
    ## Services
Schéma fonctionnement global : https://user.oc-static.com/files/420001_421000/420451.png
Un service est une classe offrant une fonctionnalité particulière,
simplement déclaré comme étant un service. En architecture orientée service, on découpé ainsi mieux
son code.
    - Le service est accessible via le container de service
    - Le container se charge pour nous d'instancier le service, ou le renvoie directement si il a été déjà instancié
    - La dépendance des services à d'autres services est automatiquement gérée
    
   ## Exercice CRUD
   
Développer le CRUD pour une entité : Article

    - 1 : Générer l'entité Article : nom, description, auteur, en-ligne/hors-ligne
        - Créer la classe
        php bin/console make:entity
        
        - Mettre à jour la structure de la base de données
        php bin/console doctrine:schema:update --force
        
    - 2 : Générer le formulaire associé
        php bin/console make:form
    
    - 3 : Créer le controller associé avec les 4 méthodes : 
            - création, mise à jour, lecture, suppression
            - Donc 4 pages : route, fonction, template
            
            - Création :
                - Nouvel objet
                - Création formulaire
                - Associer formulaire à la requête
                - Vérification formulaire soumis et valide
                    - Enregistrement en bdd
                - Génération du template en lui passant le formulaire
                    - Afficher le formulaire dans le template
                    
            - Mise à jour
                - Récupération d'un objet depuis la bdd
                - Création formulaire
                - Associer formulaire à la requête
                - Vérification formulaire soumis et valide
                    - Enregistrement en bdd
                - Génération du template en lui passant le formulaire
                    - Afficher le formulaire dans le template
    
    ## Exercice Validation Product
- Configurer la validation serveur de l'entité Product avec :
    - name : obligatoire et maximum 50 caractères
    - description : obligatoire et minimum 10 caractères
    - price : format 4 chiffres virgule 2 chiffres (,00 pas obligatoire)

- Dans le formulaire, afficher tous les messages d'erreur au dessus du formulaire
    