Créer un projet symfony 4.4 avec composer dans votre htdocs

Créer un nouveau domaine dans votre fichier host (windows/system32/drivers/etc)
et rediriger le vers votre poste local : mon-symfony-tp.local

Créer un nouveau vhost dans apache qui dirige le nouveau domaine vers la racine web de votre projet (dossier public)

Configurer une nouvelle base dans le fichier .env et créer cette base

Modélisez dans votre application l'objet Personnage et mettez à jour la bdd : 
Nom
Force (entier max 20)
Vie (entier max 100)
Armure (entier max 15)
Description (text)

Ajouter des méthodes dans la classe Personnage :
    Attaquer (un autre personnage, qui retire à ce 2em personnage un nombre de point de vie 
    correspondant à l'attaque du premier moins l'armure du 2éme)

    Regénerer (qui redonne au perso un nombre de points de vie compris entre 1 et 10)

Créer une page pour ajouter un personnage en bdd via un formulaire

Créer une page qui affiche (les propriétés) deux personnages aléatoires (un à  gauche de l'écran, un à droite)

Pour aller plus loin :
Puis deux boutons pour chaque personnage (attaquer et regénerer), qui font chacun un appel au serveur pour effectuer l'action correspondante.
Un appel serveur = une action.

Réafficher donc ensuite la même page avec les deux mêmes perso mais avec leur vie mise à jour.

Servez-vous des sessions (doc symfony 🙂) pour enregistrez les id des perso choisis au début aléatoirement,
jusque ce qu'un personnage n'ait plus de vie) 