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
?>

