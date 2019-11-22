<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Paramètre POST</title>
    </head>

    <body>
        <h1>Transmettre des paramètres de page en page avec POST</h1>

        <h2>Passer des paramètres POST grâce à un formulaire</h2>
        <form action="" method="post">
            <input type="text" name="firstname" placeholder="Ton petit nom ?"/>
            <input type="text" name="city" placeholder="T'habites où ?"/>
            <input type="password" name="pass" placeholder="Mot de passe"/>
            <input type="submit" name="btn_submit"/>
        </form>

        <?php
        // récupérer un paramètre POST
        // on va récupérer la valeur grâce à la clé
        // dans une requête POST, les paramètres ne sont pas passés dans l'URL

        // avantage GET : on peut partager les urls avec les paramètres déjà entrés
        // avantage POST : les données envoyées ne sont pas affichées dans l'URL et il n'y pas
        // de taille maximum pour les données envoyées (contrairement à GET à 2048chars)

        if (array_key_exists('btn_submit', $_POST)) {
            // le form a été soumis
            echo $_POST['firstname']." ".$_POST['city']." ".$_POST['pass'];
            $firstname = filter_input(INPUT_POST, 'firstname');
        }
        ?>

        <h2>Exercice</h2>
        <p>
        </p>
    </body>
</html>