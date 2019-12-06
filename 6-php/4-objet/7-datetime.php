<?php
    /*
     * L'objet DateTime : facilité d'utilisation des dates
     */

    $now = date("d/m/Y");
    echo $now."<br>";

    $yesterday = strtotime("2019-12-05");
    echo date("d/m/Y", $yesterday)."<br>";


    // déclarer des objets datetime avec des dates précises
    $now = new DateTime();
    $yesterday = new DateTime('2019-12-05');
    echo $now->format("d/m/Y")."<br>";

    // ajouter un interval à une date
    $interval30j = new DateInterval("P30D");
    $now->add($interval30j);
    echo $now->format("d/m/Y")."<br>";

    // soustraire un interval pour modifier une date
    $interval1m = new DateInterval("P1M");
    $fev1 = new DateTime("2019-02-01");
    $fev1->sub($interval1m);
    echo $fev1->format("d/m/Y")."<br>";

    // différence entre deux dates donne un interval
    $date1 = new DateTime("1990-10-01");
    $date2 = new DateTime("1995-03-25");
    $intervalBetween1And2 = $date1->diff($date2);

    // afficher la différence
    echo $intervalBetween1And2->y.' années<br>';
    echo $intervalBetween1And2->m.' mois<br>';
    echo $intervalBetween1And2->d.' jours<br>';

    echo $intervalBetween1And2->days.'<br>';

    // on peut comparer des datetime entre eux
    if ($date1 > $date2) {

    }
