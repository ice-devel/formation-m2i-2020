<?php
    /**
     * Interface : techniquement , une classe avec que des méthodes abstraites
     * Une classe peut impàlément une ou plusieurs interface : elle devra donc redéfinir
     * obligatoirement toutes les méthodes se trouvant dans l'interface
     */

     interface Poilue {
         public function brosser();
         public function secher();
     }

    interface Coureur {
        public function courir();
        public function sprinter();
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


 }