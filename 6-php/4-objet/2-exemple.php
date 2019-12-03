<?php
    require 'entity/Utilisateur.php';

    $utilisateur = new Utilisateur(1, "Toto", "toto@mail.fr", true);
    //$utilisateur->name = "toto"; // interdit


    $utilisateur->setName("toto");

    /*
     * Modéliser la classe Player en vous
     * basant sur la table correspondante dans
     * la bdd
     *
     * Propriétés
     * Constructeur
     * Getters/setter
     *
     * Dans un script, instanciez un player
     * Puis modifiez son nom à la ligne suivante
     */
    require 'model/Player.php';
    require 'entity/Team.php';

    /*
     * créer un objet
     */
    $player = new Player(15, new DateTime(), "Thor", 1, 50, "thor@asgarde.space", "62000", true);
    $player->setName("New Thor");

    /*
     * modifier un objet
     */
    $player->setPoints("toto");

    /*
     * obtenir la valeur d'une propriété
     */
    echo $player->getName();

    /*
     * Lier deux objets entre eux
     *
     */
    $toto = new Team(2, new DateTime(), "Team rouge", 3);
    $player2 = new Player(15, new DateTime(), "Thor", $toto, 50, "thor@asgarde.space", "62000", true);

    $team = $player2->getTeam();
    echo $team->getName();