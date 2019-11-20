<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Paramètre GET</title>
    </head>

    <body>
        <h1>Transmettre des paramètres de page en page avec GET</h1>

        Bonjour
        <?php
            // récupérer un paramètre GET
            // on va récupérer la valeur grâce à la clé

            if (array_key_exists('nom', $_GET)) {
                echo $_GET['nom'];
            }
            else {
                echo "bel inconnu";
            }
        ?>

        <h2>Passer des paramètres GET grâce à un lien html</h2>
        <a href="9-transmission-get.php?nom=john">Vous êtes John ?</a>
        <a href="9-transmission-get.php?nom=le pape">Vous êtes le pape ?</a>

        <h2>Passer des paramètres GET grâce à un formulaire</h2>
        <form action="" method="get">
            <input type="text" name="firstname" placeholder="Ton petit nom ?"/>
            <input type="text" name="city" placeholder="T'habites où ?"/>
            <input type="password" name="pass" placeholder="Mot de passe"/>
            <input type="submit"/>
        </form>

        <h2>Exercice</h2>
        <p>
            Créer un formulaire avec deux champs : identifiant et mot de passe<br>
            Ce formulaire doit être soumis vers la même page serveur en GET<br>
            En PHP, il faut récupérer les deux valeurs.<br>
            <br>
            Puis il faut afficher le message "Bienvenue",
            si l'identifiant correspond à toto et le mot de passe à test.<br>
            Sinon il faut afficher le message "Identifiants incorrects"
        </p>
    </body>
</html>