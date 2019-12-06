<?php
    /**
     * Interface : techniquement , une classe avec que des méthodes abstraites
     * Une classe peut implémenter une ou plusieurs interfaces :
     *  - elle devra donc redéfinir obligatoirement toutes les méthodes se trouvant dans chaque interface
     *  - il faut simplement qu'il n'y ait pas de méthodes ayant dans le même nom dans ces différentes interfaces
     *  - elle peut bien-sûr avoir d'autres méthodes
     *  - on peut utiliser l'héritage entre interface
     *
     */

     interface Poilue {
         public function brosser();
         public function secher();
     }

    interface Coureur extends Marcheur {
        public function courir();
        public function sprinter();
    }

    interface Marcheur {
         public function marcher();
    }

 require '3-abstraite.php';

 class Human extends Animal implements Poilue, Coureur {
     public function brosser()
     {
         // TODO: Implement brosser() method.
     }

     public function secher()
     {
         // TODO: Implement secher() method.
     }

     public function courir()
     {
         // TODO: Implement courir() method.
     }

     public function sprinter()
     {
         // TODO: Implement sprinter() method.
     }

     public function marcher()
     {
         // TODO: Implement marcher() method.
     }

 }