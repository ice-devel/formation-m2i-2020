<?php
    // Les structures condionnelles : if et le switch
    // on va comparer des valeurs : condition
    // on peut assembler plusieurs conditions
    //      le and : &&
    //      le or : ||
    // On peut inverser une condition : !

    // le IF
    if (1 == 1) {
       // on rentre ici car 1 est bien égal à 1
    }

    $entier1 = 15;
    $entier2 = 30;

    if ($entier1 < $entier2) {
        // on rentre ici
    }
    else {
        // on ne rentre pas ici
    }

    // if ($entier >= $entier2) {
    if (! $entier1 < $entier2) {
        // on ne rentre pas ici
    }
    else {
        // on rentre ici
    }

    if (5 == 5 && 3 < 4 && 9 > 10) {
        // on ne rentre pas car le && attend que toutes les
        // conditions soient vraies or 9 < 10 est faux
    }

    if (5 == 5 && 3 < 4 || 9 > 10) {
        // on rentre ici grâce au OR
        // même si 9 n'est pas inférieur à 10
    }

    // le elseif
    if (5 == 4) {
        // on rentre pas
    }
    elseif (5 == 6) {
        // on rentre pas
    }
    else if (5 == 5) {
        // on rentre
    }
    else {
        // on rentre pas
    }

    // le SELON
    $age = 18;
    switch ($age) {
        case 5:
            echo "Vous avez un très jeune âge<br>";
            break;
        case 18:
            echo "Vous venez d'être majeur(e)<br>";
            break;
        case 30:
            echo "La trentaine quoi<br>";
            break;
        default:
            echo "Vous n'avez ni 5, ni 18, ni 30 ans<br>";
    }

    // equivalent avec elseif :
    if ($age == 5) {
        echo "Vous avez un très jeune âge<br>";
    }
    elseif ($age == 18) {
        echo "Vous venez d'être majeur(e)<br>";
    }
    elseif ($age == 30) {
        echo "La trentaine quoi<br>";
    }
    else {
        echo "Vous n'avez ni 5, ni 18, ni 30 ans<br>";
    }

    // conversion de type automatique
    $chaine = "toto";
    if ($chaine >= 5) {
        // on rentre pas
        echo "Toto est supérieur ou égal à 5<br>";
    }

    if ($chaine >= 0) {
        // on rentre
        echo "Toto est supérieur ou égal à 0<br>";
    }

    $dateStr = "2009-10-10";
    $date = new DateTime();

    $isLegalAge = true;
    if ($isLegalAge == true) {

    }

    if ($isLegalAge) {

    }

    // écriture réduite :
    if ($age >= 18) {
        $isLegalAge = true;
    }
    else {
        $isLegalAge = false;
    }

    // remplaçable par :
    $isLegalAge = $age >= 18;


    if ($age >= 18) {
        $isLegalAge = "majeur";
    }
    else {
        $isLegalAge = "mineur";
    }

    // remplaçable par : (une ternaire)
    $isLegalAge = $age >= 18 ? "majeur" : "mineur";

    /*
     * Comparaison stricte
     * Opérateur de comparaison : == et !=
     * Pour comparer des valeurs
     *
     * Opérateur de comparaison stricte : === et !==
     * Pour comparer les valeurs et les types
     */
    if (1 == 1) {
        // ok
    }

    if (1 == true) {
        // ok
    }

    if ("test" == true) {
        // ok
    }

    if (0 == true) {
        // pas ok
    }

    if ("" == true) {
        // pas ok
    }

    // avec les stricts
    if (1 === true) {
        // pas ok
    }

    if ("test" === true) {
        // pas ok
    }

    if (1 !== true) {
        // ok
    }

    if ("test" !== true) {
        // ok
    }

    $chaine = "bonjour";
    echo $chaine[0];

    $pos = strpos($chaine, "b");
    if ($pos !== false) {
        echo "la lettre b existe dans ".$chaine;
    }
    else {
        echo "la lettre b n'existe pas dans ".$chaine;
    }
?>