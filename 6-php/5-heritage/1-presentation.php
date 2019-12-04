<?php
    /**
     * Héritage
     * Classe A : parent
     * Classe B : enfant : possède toutes les propriétés et méthodes du parent
     */

    class Character
    {
        /* propriété privée : accessible que dans la classe Character */
        private $name;

        /* nouvelle visibilité dans l'héritage : protected */
        protected $strength;

        public function __construct($name, $strength)
        {
            $this->setName($name);
            $this->strength = $strength;
        }

        public function setName($name) {
            if (is_string($name)) {
                $this->name = $name;
            }
        }

        public function getName() {
            return $this->name;
        }

        public function hit($strength) {
            echo "PAF  avec ".$strength." de force : ".$this->name."<br>";
        }

        /*
         * ou heal pour roman parce que pas content
         */
        final public function regenerate() {
            // ici par exemple on dirait que la vie de n'importe quel "Character" augmente
            // quand il ne combat pas
        }

        public function __clone()
        {
            // $this représente l'instance entrain d'être créé
            // $this->weapon = clone $this->weapon;
        }
    }

    /*
     * Wizard hérite de Character : il possède toutes les propriétés/méthodes
     */
    class Wizard extends Character
    {
        protected $mana;

        public function __construct($name, $strength, $mana)
        {
            // on peut rappeler la méthode écrite dans le parent pour éviter d'avoir à réécrire
            // les mêmes lignes (dans le cas où on a besoin)
            parent::__construct($name, $strength);
            $this->mana = $mana;
        }

        public function fireball() {
            echo "Pourrr : ".$this->getName()." : ". $this->strength."<br>";
        }
    }

    /*
     * WhiteWizard hérite de Wizard :
     * il possède toutes les propriétés/méthodes en cascade de Wizard mais
     * aussi de Character
     */
    class WhiteWizard extends Wizard
    {
        public function heal() {
            echo "Ahhh<br>";
        }

        /*
         * Redéfinir une méthode qui existe dans un parent
         * Redéfinition / override
         * On peut modifier la visibilité de la méthode seulement si c'est pour la rendre moins restrictive
         * de privée à publique : ok
         * de public à privée : pas ok
         */
        public function hit($strength) {
            echo "PAF avec ".($strength / 2)." de force : ".$this->getName()."<br>";
        }

        /*
         * Ceci est impossible car dans la classe Character la méthode est finale :
         * On ne peut pas la redéfinir
         */
        /*
        public function regenerate() {
            // t'as pas le droit de réécrire ce que fait cette fonction
        }
         */
    }

    $character = new Character("Toto", 50);
    $character->hit(50);

    $wizard = new Wizard("Gandalf", 30, 100);
    //$wizard->setName("Gandalf");
    $wizard->hit(30);
    $wizard->fireball();

    $whiteWizard = new WhiteWizard("Popo le panda", 30, 100);
    //$whiteWizard->setName("Popo le panda");
    $whiteWizard->hit(30);
    $whiteWizard->fireball();
    $whiteWizard->heal();

    echo "<pre>";
    var_dump($character);
    echo "</pre>";

    echo "<pre>";
    var_dump($wizard);
    echo "</pre>";

    echo "<pre>";
    var_dump($whiteWizard);
    echo "</pre>";

    /*
     * Tester si une variable est un objet appartenant à une classe précise
     */

    if ($character instanceof Character) {
        // la variable $character est bien de type Character
        // on rentre ici
    }
    else {
        // la variable $character n'est pas de type Character
    }


    if ($whiteWizard instanceof WhiteWizard) {
        // la variable $whiteWizard est bien de type WhiteWizard
        // on rentre ici
    }
    else {
        // la variable $whiteWizard n'est pas de type WhiteWizard
    }

    if ($whiteWizard instanceof Character) {
        echo $whiteWizard->getName(). " est de type Character<br>";
        // oui Popo le panda est bien un personnage
        // instanceof vérifie en cascade l'héritage
    }


    // mettons tous nos personnages dans une variable
    $characters = [];
    $characters[] = $character;
    $characters[] = $wizard;
    $characters[] = $whiteWizard;

    foreach ($characters as $c) {
        if ($c instanceof WhiteWizard) {
            echo "Je suis le magicien blanc<br>";
        }
        elseif ($c instanceof Wizard) {
            echo "Je suis le magicien<br>";
        }
        elseif ($c instanceof Character) {
            echo "Je suis le personnage simple<br>";
        }
    }

    /*
     *  PASSAGE PAR REFERENCE / PAR VALEUR
     */

    /* I - passage par valeur */
    $entier = 5;
    // passage par valeur
    $entier2 = $entier;
    $entier = 10;
    echo $entier2; // affiche 5
    echo "<br>";

    function strtoupperPerso($str) {
        $str = strtoupper($str);
        return $str;
    }

    $chaine = "Bonjour";
    $chaine2 = strtoupperPerso($chaine);
    echo $chaine;
    echo "<br>";
    echo $chaine2;
    echo "<br>";

    /* II - passage par référence */
    function ajouterFab(&$str) {
        // ici la variable str est passée par référence
        // donc si on modifie la valeur de cette variable, cela modifie également
        // la vraie variable d'origine
        $str = $str." Fab";
    }
    $coucou = "Coucou";
    ajouterFab($coucou);
    echo $coucou;
    echo "<br>";

    $occurences = [];
    $result = preg_match_all('/\d{3}/', "Bonjour 555 je teste 123", $occurences);
    // ici le tableau occurences a été modifié directement dans la fonction

    /* Comportement avec des objets */
    $defonceMan = new Character("DefonceMan", 199);
    $casseMan = $defonceMan;
    $casseMan->setName("CasseMan");

    echo $casseMan->getName()."<br>";
    echo $defonceMan->getName()."<br>";

    function changeNom($objet, $nom) {
        $objet->setName($nom);
    }

    changeNom($defonceMan, "Toto");
    echo $casseMan->getName()."<br>";

    echo "<pre>";
    var_dump($casseMan);
    echo "</pre>";

    echo "<pre>";
    var_dump($defonceMan);
    echo "</pre>";

    $peteMan = new Character("Toto", 199);

    echo "<pre>";
    var_dump($peteMan);
    echo "</pre>";

    // dupliquer un objet
    $john = new Wizard("John", 50, 99);
    $gerard = clone $john;

    echo "<pre>";
    var_dump($john);
    echo "</pre>";
    echo "<pre>";
    var_dump($gerard);
    echo "</pre>";

