<?php
    if (isset($_COOKIE['username'])) {
        echo "Bonjour ".$_COOKIE['username'];
    }
    else {
        echo "Vous n'êtes pas connecté.";
    }

    /**
     *
     * Dans la BDD, créer une table "client" avec 3 champs : id, username, password
     * Créer une page avec en html un formulaire pour enregistrer un client, le code PHP
     * pour envoyer la requête
     *
     * Une autre page avec une formulaire d'identification (identifiant + mdp)
     *
     * Et vous devez créer une variable de session username
     * quand un client tape ses bons identifiants, et lui dire "Vous êtes connecté"
     * Quand le client revient sur la page, le message "Vous êtes connecté" doit se réafficher
     * automatiquement sans qu'il ait à saisir à nouveau ses id
     *
     */
?>

