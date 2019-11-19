<?php
    // Les tableaux (array):
    // des variables qui contiennent plusieurs valeurs
    // accessibles soit à un indice, soit à une clé
    // - tableaux numériques : avec un indice
    // - tableaux associatifs : avec une clé

    /*
     * Déclarer un tableau
     */
    $tableauNumerique = array(); // notation longue
    $tableauNumerique = []; // nouvelle notation : notation courte

    /*
     * ajouter un élément dans un tableau
     */
    array_push($tableauNumerique, "toto"); // notation longue
    $tableauNumerique[] = "arthur";

    echo "<pre>";
    var_dump($tableauNumerique);
    echo "</pre>";

    /*
     * Déclarer un tableau avec des valeurs déjà présentes
     */
    $tableauNum2 = array("toto", 50, "arthur", true);
    $tableauNum2 = ["toto", 50, "arthur", true];
    echo "<pre>";
    var_dump($tableauNum2);
    echo "</pre>";

    /*
     * Tableau associatif
     */
    $tableauAssociatif = [];
    $tableauAssociatif["nom"] = "Toto";
    $tableauAssociatif["cp"] = "59000";
    $tableauAssociatif["tel"] = "0666554433";

    echo "<pre>";
    var_dump($tableauAssociatif);
    echo "</pre>";
    /*
     * Déclarer un tableau associatif avec des valeurs déjà présentes
     */
    $tab = ["nom" => "coucou", "date" => "10-10-2000"];

    /*
     * Accéder à un élément en particulier
     */
    echo $tableauNum2[1]."<br>";
    echo $tableauAssociatif["tel"]."<br><br>";

    /*
     * Parcourir un tableau numérique
     */
    for ($i=0; $i < count($tableauNum2); $i++) {
        echo $tableauNum2[$i]."<br>";
    }

    /*
     * Parcourir un tableau associatif
     */
    // avec à chaque itération uniquement la valeur
    echo "<br>";
    foreach ($tableauAssociatif as $value) {
        echo $value."<br>";
    }

    // avec à chaque itération la valeur et la clé
    echo "<br>";
    foreach ($tableauAssociatif as $key => $value) {
        echo $key." : ".$value."<br>";
    }

    /*
     * Rechercher dans un tableau
     */
    $cityTab = ["Lille", "Arras", "Valenciennes", "Armentières"];

    // chercher si une valeur se trouve dans un tableau in_array
    if (in_array("Lille", $cityTab)) {
        echo "Lille se trouve dans le tableau des villes<br>";
    }
    else {
        echo "Lille ne se trouve pas dans le tableau des villes<br>";
    }

    $ville = "Paris";
    if (in_array($ville, $cityTab)) {
        echo $ville." se trouve dans le tableau des villes<br>";
    }
    else {
        echo $ville." ne se trouve pas dans le tableau des villes<br>";
    }


    // chercher si une clé existe dans un tableau
    $tabAssoc = ["nom" => "toto", "mail" => "toto@mail.fr", "age" => 39];
    if (array_key_exists("mail", $tabAssoc)) {
        echo "La clé mail existe dans le tableau tabAssoc<br>";
    }
    else {
        echo "La clé mail n'existe pas dans le tableau tabAssoc<br>";
    }

    // chercher si une valeur existe dans un tableau et si oui
    // récupérer la clé/l'indice où elle se trouve
    $cle = array_search("toto", $tabAssoc);
    if ($cle) {
        echo "La valeur toto se trouve à la clé ".$cle."<br>";
    }
    else {
        echo "La valeur toto n'existe pas dans le tableau<br>";
    }

    $cle = array_search("pouet", $tabAssoc);
    if ($cle) {
        echo "La valeur pouet se trouve à la clé ".$cle."<br>";
    }
    else {
        echo "La valeur pouet n'existe pas dans le tableau<br>";
    }

    $tabNum = ["coucou", "salut", "bonjour"];
    $indice = array_search("salut", $tabNum);
    if ($indice) {
        echo "salut se trouve à la position ".$indice."<br>";
    }
    else {
        echo "La valeur salut n'existe pas dans le tableau<br>";
    }

    $indice = array_search("coucou", $tabNum);
    if ($indice !== false) {
        echo "coucou se trouve à la position ".$indice."<br>";
    }
    else {
        echo "La valeur coucou n'existe pas dans le tableau<br>";
    }

    if (array_search("tchouss", $tabNum) !== false) {

    }
    else {
        echo "La valeur tchouss n'existe pas dans le tableau<br>";
    }
?>

