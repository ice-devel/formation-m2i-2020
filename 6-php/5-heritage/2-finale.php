<?php
    /**
     * Héritage
     * Classe finale : classe dont aucune autre classe ne peut hériter
     * C'est le dernier enfant possible dans l'arborescence
     */

    final class MaClasseFinale
    {
        private $attribut;

        public function getAttribut(){

        }

        final public function methodeFinale() {
            echo "pouet";
        }
    }

    /**
     * ça : c'est impossible
     */
    /*
    class AutreClasse extends MaClasseFinale {

    }
    */
