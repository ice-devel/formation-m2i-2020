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

    Installation :
        - Soit avec Composer : gestionnaire de dépendances
        - Soit avec l'installer "symfony" (qui utilise composer)

        - Installer PHP avec une version compatible pour la version de symfony voulue
        - Installer Composer
        - Télécharger le fichier (installateur) Symfony
        - Créer un vHost (virtual host) : associer un nom de domaine à un répertoire web
            - Ajouter la config
            - Redémarrer Apache
            - Configurer le fichier host du système : C:\Windows\System32\drivers\etc
            - Si vous utilisez apache comme serveur, pensez à installer
                le recipe : apache2-pack
                composer require symfony/apache-pack

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
    
Créer un nouveau controller, puis créer une nouvelle page
qui affiche un doctype html complet, et le mot Hello World!
dans la balise body

Un controller est appelé si le composant routing fait un lien entre une
url et une fonction. Une fonction d'un controller doit obligatoire
retourner une objet Response.

## 2 - Templates
Par défaut avec Symfony, les templates sont générés avec Twig : moteur de template

Avec la méthode $this->render() dans un controller, on peut générer un template
en lui passant des variables.
Il faut indiquer le chemin du template dans le 1er paramètre.
On peut passer des variables dans le 2ème : il faut passer un tableau associatif,
les clés seront les noms de variables à utiliser dans le template.

Dans le template, on peut alors utiliser ces variables.
    - Afficher une variable : {{ nom_variable }}
    - Faire quelquechose (condition, boucle) : {%  %}
    - Commentaires : {# #}

