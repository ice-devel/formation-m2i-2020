<?php
    /*
     * Les cookies sont un moyen de transmettre des informations de page en page
     * Ils sont stockées sur le poste client
     * Comparé au transmission GET et POST, il y a une couche de persistance supplémentaire
     * même si sa durée de vie est limitée (date limite du cookie)
     */

    /**
     * On utilise les cookies en PHP grâce à la variable superglobale COOKIE
     */

    if (isset($_POST['btn_login'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if ($username == "admin" && $password == "123") {
            setcookie("username", $username, time() + 3600);
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
