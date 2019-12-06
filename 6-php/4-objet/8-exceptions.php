<?php
    /*
     * Exception
     */
    function add($a, $b) {
        if (is_numeric($a) == false || is_numeric($b) == false) {
            throw new Exception("Il faut deux nombres pour faire une addition");
        }

        return $a + $b;
    }

    try {
        echo add(50, 10);
        add('coucou', false);
    }
    catch(Exception $e) {
        echo "Erreur boulet";
    }

    try {
        $pdo = new PDO("ieofjesiofjesio");
        add('coucou', false);
    }
    catch (PDOException $e) {
        echo "Erreur connexion bdd";
    }
    catch (Exception $e) {
        echo "Erreur inconnue";
    }


