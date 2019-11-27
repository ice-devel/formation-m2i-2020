<?php
    /**
     * Les sessions sont un moyen de transmettre des informations de page en page
     * Elles sont stockées sur le serveur
     * Comparé au transmission GET et POST, il y a une couche de persistance supplémentaire
     * même si sa durée de vie est limitée (à la fermeture du navigateur par défaut)
     */

    /**
     * On utilise les sessions en PHP grâce à la variable superglobale SESSION
     * il faut obligatoirement initialiser les sessions avant de les utiliser
     */

    // cette fonction doit appelée obligatoire avant le moindre affichage
    session_start();

    if (isset($_POST['btn_login'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if ($username == "admin" && $password == "123") {
            $_SESSION['username'] = $username;
        }
        else {
            echo "Mauvais identifiants.";
        }
    }

 ?>

<form method="post">
    <input type="text" name="username"/>
    <input type="password" name="password" />
    <input type="submit" name="btn_login"/>
</form>
