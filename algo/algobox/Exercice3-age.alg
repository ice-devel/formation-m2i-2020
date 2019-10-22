<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="LIRE jourNaissance"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2para="" F2etat="inactif" F2defaut="" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param maxBoucle="500000" totalAffichages="1000" epaisseurLigne="2" nbDecimales="8" arrondiAuto="vrai" totalBoucles="5000000" epaisseurPoint="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#anneeActuelle" algoitem="anneeActuelle EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#moisActuel" algoitem="moisActuel EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#jourActuel" algoitem="jourActuel EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#anneeNaissance" algoitem="anneeNaissance EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#moisNaissance" algoitem="moisNaissance EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#jourNaissance" algoitem="jourNaissance EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#age" algoitem="age EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="5#anneeActuelle#2019#pasliste" algoitem="anneeActuelle PREND_LA_VALEUR 2019"/>
        <item code="5#moisActuel#10#pasliste" algoitem="moisActuel PREND_LA_VALEUR 10"/>
        <item code="5#jourActuel#22#pasliste" algoitem="jourActuel PREND_LA_VALEUR 22"/>
        <item code="2#anneeNaissance#pasliste" algoitem="LIRE anneeNaissance"/>
        <item code="2#moisNaissance#pasliste" algoitem="LIRE moisNaissance"/>
        <item code="2#jourNaissance#pasliste" algoitem="LIRE jourNaissance"/>
        <item code="5#age#anneeActuelle - anneeNaissance#pasliste" algoitem="age PREND_LA_VALEUR anneeActuelle - anneeNaissance"/>
        <item code="6#moisActuel &lt; moisNaissance OU moisActuel == moisNaissance ET jourActuel &lt; jourNaissance" algoitem="SI (moisActuel &lt; moisNaissance OU moisActuel == moisNaissance ET jourActuel &lt; jourNaissance) ALORS">
            <item code="7#debutsi" algoitem="DEBUT_SI"/>
            <item code="5#age#age - 1#pasliste" algoitem="age PREND_LA_VALEUR age - 1"/>
            <item code="8#finsi" algoitem="FIN_SI"/>
        </item>
        <item code="3#age#0#pasliste" algoitem="AFFICHER age"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
