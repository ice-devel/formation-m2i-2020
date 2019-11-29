<?php
    // démarrer les sessions pour pouvoir les utiliser dans ce fichier
    session_start();

    // supprimer entièrement la session
    session_destroy();

    header("Location: 5-exo-bis.php");
?>