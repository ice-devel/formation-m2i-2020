<?php
    function  dumpFab($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
    /**
     * RegExp : expressions régulières
     *
     * Système permettant de faire des recherches dans les chaines de caractères
     * grâce à un pattern
     */

    /*
     * preg_match : s'arrête à la première occurence trouvée
     * preg_match_all : cherchent toutes les occurences
     * preg_replace : rechercher les occurences et les retourner
     */

    $chaine = "Bonjour salut les loulous comment ça va bien";

    // est-ce que le mot salut se trouve dans cette chaine ?
    $result = preg_match("/salut/", $chaine);
    echo $result."<br>";

    // remplacer tous les "s" par des chaines vides :
    $nouvelleChaine = preg_replace("/s/", "", $chaine);
    echo $nouvelleChaine."<br>";

    // remplacer les 2 premiers "s" par des chaines vides :
    $nouvelleChaine = preg_replace("/s/", "", $chaine, 2);

    // remplacer maximum les 4 premiers "s" par des chaines vides
    // et savoir combien de "s" ont été remplacés
    $nouvelleChaine = preg_replace("/s/", "", $chaine, 4, $nbSReplaced);
    echo $nouvelleChaine." : nombre de s remplacés : ".$nbSReplaced."<br>";


    // générer un format plus avancé : chercher dans une chaine toutes les adresses emails
    $chaine = "Salut mon adresse c'est fab@mail.fr, sinon tu peux utiliser fab2@mail.fr, tchouss";

    $result = preg_match("/[a-z0-9_\.]{3,}@[a-z0-9_\.]{2,}\.[a-z]{2,}/", $chaine, $matches);
    echo $result."<br>";
    dumpFab($matches);

    $result = preg_match_all("/[a-z0-9_\.]{3,}@[a-z0-9_\.]{2,}\.[a-z]{2,}/", $chaine, $matches);
    echo $result."<br>";
    dumpFab($matches);

    $nouvelleChaine = preg_replace("/[a-z0-9_\.]{3,}@[a-z0-9_\.]{2,}\.[a-z]{2,}/", "NON", $chaine);
    echo $nouvelleChaine."<br>";


    // remplacer en reprenant la valeur elle-même : parenthèses capturantes
    $chaine = "Coucou va voir mon site : www.topachat.com, c'est cool ! Sinon va voir sur ldlc.fr";
    echo $chaine."<br>";

    /*
     * www.topachat.com
     * <a href="www.topachat.com">www.topachat.com</a>
     */

    $regex = "/(www\.)?([a-z0-9]{1,}\.[a-z]{2,})/";
    $replacement = "<a href='http://$2'>$0</a>";
    $nouvelleChaine = preg_replace($regex, $replacement,$chaine);
    echo $nouvelleChaine."<br>";
    dumpFab($matches);

    /*
     * Les parenthèses capturantes servent à pouvoir récupérer la valeur qui matche
     * avec le pattern, et ainsi réutiliser ces valeurs par exemple
     * dans le preg_replace gr$ace à des variables :
     * le $0 correspond à l'occurence en entier trouvé
     * le $1 correspond à la partie de l'occurence dans les premières parenthèses capturantes
     * le $2 correspond à la partie de l'occurence dans les deuxièmes parenthèses capturantes
     *
     * https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/918834-memento-des-expressions-regulieres
     */
?>
