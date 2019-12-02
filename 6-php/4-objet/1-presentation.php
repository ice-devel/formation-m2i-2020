<?php
    /**
     * POO : programmation orientée objet
     * On structure son code grâce à des classes d'objets
     * 1- Modélisation des entités métiers
     *  - créer de classes
     *  - instance de classe
     *
     * Pourquoi objet :
     *  - meilleure structure du code
     *  - meilleure évolutivité / maintenance
     */

    /*
     * Un personnage en procédural :
     */

    $nameChar1 = "Batman";
    $strengthChar1 = 60;
    $healthChar1 = 100;

    $nameChar2 = "Superman";
    $strengthChar2 = 85;
    $healthChar2 = 100;

    function hit($strength, $health) {
        $health = $health - $strength;

        return $health;
    }

    $healthChar2 = hit($strengthChar1, $healthChar2);

    /*
     * Version objet
     */
    require 'entity/Character.php';

    $char1 = new Character("Batman", 60);
    $char2 = new Character("Superman", 85, 120);
    $char3 = new Character("Ironman", 75, 100);

    // batman frappe ironman
    $char1->hit($char3);

    // superman frappe
    $char2->hit($char1);

