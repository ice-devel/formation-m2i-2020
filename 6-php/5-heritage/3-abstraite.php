<?php
    /**
     * Héritage
     * Classe abstraite : classe qu'on ne peut pas instancier
     * On crée des classes abstraites qui n'ont pas lieu d'être utilisée directement
     * Mais qui sera hérité par d'autres classes, afin de centraliser des propriétés/méthodes communes
     * à toutes les classes enfant
     */

    abstract class Being
    {
        private $dna;

        // une méthode abstraite ne contient pas de corps, uniquement une signature
        // ce qui veut dire qu'elle doit obligatoire être redéfinie dans chaque enfant de cette classe
        abstract public function breath();
    }

    class Animal extends Being {
        private $blood;

        public function breath()
        {
            // TODO: Implement breath() method.
        }
    }

    class Vegetal extends Being {
        private $photosynthesis;

        public function breath()
        {
            // TODO: Implement breath() method.
        }
    }

    class Mushroom extends Being {
        public function breath()
        {
            // TODO: Implement breath() method.
        }
    }

    // impossible de faire ça :
    //$being = new Being();

    $animal = new Animal();
    $animal->breath();
