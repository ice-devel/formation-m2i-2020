<?php
    // commentaire de ligne

    /*
     * Commentaire
     * de
     * bloc
     */

    /*
     * PHP est un langage serveur
     * Le code source n'est pas renvoyé au navigateur : on renvoie
     * uniquement le texte généré (html, css, js, xml, json, etc.)
     * Cela permet donc de faire des sites dynamiques (à la différence des sites
     * dynamiques) ou API, ou application web
     *
     * Echanges client/serveur :
     *  - un navigateur appelle une page (une url)
     *  - un serveur web (apache) reçoit la demande
     *  - php interprète les fichiers php et génère du texte
     *  - apache renvoie ce texte généré au navigateur
     *
     * Autre techno serveur : Java, ASP .NET, NodeJS
     * SGBD comme mysql : Postgresql, SQL serveur, mariaDB, oracle
     */

    echo "Coucou<br>";
    echo "Coucou2<br>";
    echo date("d/m/Y");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Coucou 3<br>
    Nous sommes le <?php print date('d/m/Y'); ?>
</body>
</html>
