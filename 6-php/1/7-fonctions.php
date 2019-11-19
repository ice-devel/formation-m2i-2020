<?php
    /* Les Fonctions
     Une fonction permet de centraliser un traitement
     pour pouvoir l'utiliser à plusieurs endroits du code
     sans devoir réécrire à chaque fois ce code
     une fonction c'est :
        - une signature (nom, paramètres ou non (facultatifs ou non))
        - une corps
    */

    function in_array_perso($needle, $haystack, $strict = false) {
        foreach ($haystack as $val) {
            if ($strict == false) {
                if ($needle == $val) {
                    return true;
                }
            }
            else {
                if ($needle === $val) {
                    return true;
                }
            }
        }

        return false;
    }

    $tab = ['paris', 'lille', 'valenciennes'];
    if (in_array_perso("cambrai", $tab)) {

    }
    else {
        // on passe ici
    }

    if (in_array_perso(true, $tab, true)) {
        echo "true se trouve dans le tableau";
    }
    else {

    }

    function getRoundNumber($limit=100) {
        $somme = 1;
        $i = 0;
        while ($somme < $limit) {
            $randomNumber = rand(1 ,15);
            $somme = $somme + $randomNumber;
            $i++;
        }

        return $i;
    }


    echo getRoundNumber()."<br>";
    echo getRoundNumber(200)."<br>";
    echo getRoundNumber(1100)."<br>";

    /*
     * Exercice : écrire une fonction qui calcule
     * et retourne l'age
     * d'une personne grâce à une date passée
     * en 3 paramètres : année, mois, jour
     *
     * Vous utilisez dans le script principal
     * pour afficher un age
     *
     * Pour récupérer la date actuelle:
     * anneeActuelle = date('Y')
     * moisActuel = date('m')
     * jourActuel = date('d')
     *
     * Exercices :
     * 1- Créer une fonction qui prend deux paramètres (entier),
     * et retourner le plus petit des deux
     *
     * 1bis- Créer une fonction qui prend un paramètre (entier) et qui retourne
     * la valeur de cet entier au carré
     *
     * 2- Créer une fonction qui prend un paramètre : un tableau de string
     * Et qui retourne une chaine correspondant à tous les éléments
     * du tableau concaténés ensemble les uns après les autres
     *
     * 3- Créer une fonction qui prend un paramètre : un tableau d'entier
     * et qui retourne la somme de tous les entiers présents dans le tableau
     *
     * 4- Créer une fonction prend un paramètre : un tableau (d'entiers)
     * Et qui retourne la valeur la plus grande présente dans le tableau
     *
     * Modifier cette fonction pour ajouter un paramètre boolean facultatif ,
     * par défaut ce paramètre indique qu'il faut retourner la valeur grande
     * et dans l'autre que la fonction doit retourner la valeur la plus petite
     */

    /*
     * 1
     */
    function smallest($nb1, $nb2) {
        // v1
        if ($nb1 < $nb2) {
            return $nb1;
        }
        else {
            return $nb2;
        }

        // v2
        $smallest = $nb1 < $nb2 ? $nb1 : $nb2;
        return $smallest;

        // v3
        return ($nb1 < $nb2) ? $nb1 : $nb2;
    }

    /*
     * 1bis
     */
    function carre($number) {
        // v1
        $carre = $number * $number;
        return $carre;

        // v2 : pas d'intéret de passer par une variable intermédiaire
        // donc autant renvoyé tout le calcul
        return $number * $number;
    }

    echo carre(12);

    $chiffre = 9;
    echo carre($chiffre);

    echo carre(10);

    function direBonjour($name) {
        echo "Bonjour ".$name;
    }

    direBonjour("Toto");
    direBonjour("Fab");
    echo "<br>";

    /*
     * 2 ['coucou', 'salut', 'bonjour']
     */
    function concat($tabStrings) {
        $totalString = "";
        foreach ($tabStrings as $robespierre) {
            $totalString = $totalString.$robespierre;
        }

        return $totalString;
    }

    $tab = ['coucou', 'salut', 'bonjour'];
    echo concat($tab);
    echo "<br>";

    /*
     * 3
     * [1,5,9]
     */
    function sumTab($tabInts) {
        $somme = 0;
        for ($i=0;$i < count($tabInts); $i++) {
            $somme = $somme + $tabInts[$i];
        }

        return $somme;
    }

    $integers = [5, 98, 45, 3];
    echo sumTab($integers);
    echo "<br>";

    /*
     * 4
     * [5,3,9,10]
     */
    function getBiggest($ints) {
        $biggest = $ints[0];
        foreach ($ints as $jdlf) {
            if ($jdlf > $biggest) {
                $biggest = $jdlf;
            }
        }

        return $biggest;
    }

?>

