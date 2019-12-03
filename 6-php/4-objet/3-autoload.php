<?php
   /**
    * Chargement automatiquement des classes nécessaires
    * (Ou un des intérets à appeler son fichier comme le nom de la classe qu'il contient)
    */

    function loadEntity($className) {
        // on créer la chaine contenant le chemin du fichier
        $filename = 'entity/'.$className.".php";
        // on teste si le fichier existe
        if (file_exists($filename)) {
            // on inclut le fichier
            require $filename;
        }
    }

    function loadModel($className) {
        $filename = 'model/'.$className.".php";
        if (file_exists($filename)) {
            require $filename;
        }
    }

    /*
     * Enregistrer des fonctions à appeler automatiquement
     * lorsqu'on instancie un objet et que la classe n'a pas encore été incluse dans le code
     */
    spl_autoload_register('loadEntity');
    spl_autoload_register('loadModel');

    $player = new Player(15, new DateTime(), "Thor", 1, 50, "thor@asgarde.space", "62000", true);

    var_dump($player);