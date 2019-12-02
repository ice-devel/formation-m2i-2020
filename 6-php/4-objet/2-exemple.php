<?php
    require 'entity/Utilisateur.php';

    $utilisateur = new Utilisateur(1, "Toto", "toto@mail.fr", true);
    //$utilisateur->name = "toto"; // interdit


    $utilisateur->setName("toto");


