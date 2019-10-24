<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="POUR i ALLANT_DE 0 A notes.length - 1"/>
    <extension extnom="inactif"/>
    <fonction fctetat="inactif" fctcode=""/>
    <F2 F2etat="inactif" F2para="" F2lignes="" F2defaut=""/>
    <repere repcode="-10#10#-10#10#2#2" repetat="inactif"/>
    <param arrondiAuto="vrai" totalBoucles="5000000" totalAffichages="1000" epaisseurPoint="2" maxBoucle="500000" nbDecimales="8" epaisseurLigne="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#LISTE#notes" algoitem="notes EST_DU_TYPE LISTE"/>
        <item code="1#NOMBRE#note" algoitem="note EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#i" algoitem="i EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#somme" algoitem="somme EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#moyenne" algoitem="moyenne EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="2#note#pasliste" algoitem="LIRE note"/>
        <item code="5#i#0#pasliste" algoitem="i PREND_LA_VALEUR 0"/>
        <item code="15#note != -1" algoitem="TANT_QUE (note != -1) FAIRE">
            <item code="16#debuttantque" algoitem="DEBUT_TANT_QUE"/>
            <item code="5#notes#note#i" algoitem="notes[i] PREND_LA_VALEUR note"/>
            <item code="5#i#i + 1#pasliste" algoitem="i PREND_LA_VALEUR i + 1"/>
            <item code="2#note#pasliste" algoitem="LIRE note"/>
            <item code="17#fintantque" algoitem="FIN_TANT_QUE"/>
        </item>
        <item code="5#somme#0#pasliste" algoitem="somme PREND_LA_VALEUR 0"/>
        <item code="12#i#0#notes.length - 1" algoitem="POUR i ALLANT_DE 0 A notes.length - 1">
            <item code="13#debutpour" algoitem="DEBUT_POUR"/>
            <item code="5#somme#somme + notes[i]#pasliste" algoitem="somme PREND_LA_VALEUR somme + notes[i]"/>
            <item code="14#finpour" algoitem="FIN_POUR"/>
        </item>
        <item code="5#moyenne#somme / notes.length#pasliste" algoitem="moyenne PREND_LA_VALEUR somme / notes.length"/>
        <item code="3#moyenne#0#pasliste" algoitem="AFFICHER moyenne"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
