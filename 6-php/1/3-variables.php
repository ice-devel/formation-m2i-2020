<?php
    // Les variables
    // php est un langage non typé (faiblement typé)

    $chaine = 'Je suis une chaine de caractères';
    $entier = 5;
    $decimal = 42.69;
    $booleen = true;

    echo $chaine."<br>";
    echo $entier."<br>";
    echo $decimal."<br>";
    echo $booleen."<br>";

    // changer la valeur d'une variable existante
    $chaine = "Nouvel chaine";
    echo $chaine."<br>";

    // var_dump : pour debugger une variable, afficher son type et sa valeur
    var_dump($chaine);
    echo "<br>";
    var_dump($entier);
    echo "<br>";
    var_dump($decimal);
    echo "<br>";
    var_dump($booleen);
    echo "<br>";

    $varSansTypeNiValeur = null;

    // opérateur de concaténation
    $chaine = "chaine1";
    $chaine2 = "chaine2";
    $chaine3 = $chaine." ".$chaine2;
    echo $chaine3."<br>";

    // opérateur arithmétique
    $somme = 5 + 10;
    echo $somme."<br>";

    $somme2 = $somme + 3;
    echo $somme2."<br>";

    $difference = 18 - 5.5;
    $produit = 18 * 5;
    $quotient = 18 / 5;

    // conversion automatique des types
    $difference = "125" - 5.5; // ok
    echo $difference."<br>";

    $difference = "toto" - 5.5; // warning : toto remplacé par 0
    echo $difference."<br>";
    $difference = "toto123" - 5.5; // warning : toto123 remplacé par 0
    echo $difference."<br>";
    $difference = "123toto" - 5.5; // ok mais warning : php prend 123
    echo $difference."<br>";

    // le modulo : le reste
    $modulo = 50 % 3; // modulo vaut 2

    // les priorités
    $calcul = 5 * 3 + 6 * 4 - 8; // calcul prend 31
    $calcul2 = 5 * (3 + 6) * 4 - 8; // calcul prend 172


?>