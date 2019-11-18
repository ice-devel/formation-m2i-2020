<?php
    // Les structures itératives :
    // for, while, do while
    // répéter une ou plusieurs instructions un certain nombre
    // for : pour un nombre déterminé d'itération
    // while : quand on ne connait pas le nb d'itération
    // do while : while mais avec au moins une itération

    for ($i=0; $i < 5; $i++) {
        echo "Tour n°".$i."<br>";
    }

    $somme = 1;
    while ($somme < 100) {
        $randomNumber = rand(0, 99);
        $somme = $somme + $randomNumber;
    }

    $somme = 1;
    do {
        $randomNumber = rand(0, 99);
        $somme = $somme + $randomNumber;
    } while ($somme < 100);


    // 1- à partir d'une année de naissance,
    // afficher à l'utilisateur si il est majeur ou mineur
    //  a- initialiser une variable avec l'année en cours
    //  b- initialiser une variable avec l'année de naissance
    //  c- calculer l'âge
    //  d- condition pour tester si majeur ou mineur
    //  e- affichage du message correspondant

    // 2- afficher la table de multiplication de 3
    // 1 * 3 = 3
    // 2 * 3 = 6
    // 9 * 3 = 27

    // exo 1
    $birthday = 2001;
    $currentYear = 2019;
    $age = $currentYear - $birthday;
    if ($age >= 18) {
        echo "Vous êtes majeur<br>";
    }
    else {
        echo "Vous êtes mineur<br>";
    }

    // exo 2
    echo "1 * 3 = 3<br>";
    echo "2 * 3 = 6<br>";
    echo "9 * 3 = 27<br><br>";

    for ($i=1; $i<10; $i++) {
        $resultat = $i * 3;
        echo $i." * 3 = ".$resultat."<br>";
    }


?>

