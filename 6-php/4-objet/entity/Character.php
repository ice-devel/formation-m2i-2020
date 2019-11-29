<?php
    class Character
    {
        /*
         * Propriété
         */
        public $name;
        public $health;
        public $strength;

        /*
         * Méthodes
         */

        /*
         * Contructeur : cette méthode est appelée automatiquement
         * lors de l'instanciation d'une classe
         */
        public function __construct($nameParam, $strengthParam, $health=100)
        {
            // initialiser les valeurs par défaut de cette instance
            $this->name = $nameParam;
            $this->strength = $strengthParam;
            $this->health = $health;
        }

        public function hit($attackedChar) {
            echo $this->name." frappe avec ".$this->strength. " de force ".$attackedChar->name."<br>";
            $attackedChar->health = $attackedChar->health - $this->strength;

            $random = rand(0,10);
            if ($random > 8) {
                echo "Contre attaque";
                $attackedChar->hit($this);
            }
        }
    }