<?php
   /**
    * Opérateur de résolution de portée
    * Constantes et les membres statiques : sont liés à la classe et non à une instance
    *
    * Constantes :
    *   - éviter d'avoir du code : utiliser des noms parlant plutôt des valeurs
    *   - ne pas avoir besoin d'un objet pour accéder à la valeur :
    *     il suffit de passer par la classe
    */
   class Perso
   {
       private $nom;
       static public $count = 0;

       const MULTIPLICATEUR_COUP_CRITIQUE = 2;

       public function __construct($nom)
       {
           $this->nom = $nom;
           self::$count++;
       }

       /**
        * @return mixed
        */
       public function getNom()
       {
           return $this->nom;
       }

       /**
        * @param mixed $nom
        */
       public function setNom($nom)
       {
           $this->nom = $nom;
       }

       public function hit() {
           $force = 50;
           $random = rand(0,10);
           if ($random > 8) {
               $force = $force * self::MULTIPLICATEUR_COUP_CRITIQUE;
           }
           echo "Je frappe avec ".$force." de force";
       }

       /*
        * Méthode statique
        * Utiliser $this dans ce contexte n'a pas de sens : une méthode
        * statique n'est pas appelé par un objet en particulier mais par la classe
        * elle-même
        */
       static public function displayNbPerso() {
           // echo $this->nom; // NO
           echo "Il y a actuellement ".self::$count." perso instanciés<br>";
       }
   }

   $perso = new Perso("toto");
   echo Perso::MULTIPLICATEUR_COUP_CRITIQUE."<br>";

   // impossible de changer la valeur d'une constante :
   // Perso::MULTIPLICATEUR_COUP_CRITIQUE = 3;

    $perso2 = new Perso("toto2");
    $perso3 = new Perso("toto3");

    // accéder à un membre statique
    echo Perso::$count."<br>";
    Perso::displayNbPerso();