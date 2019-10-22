<?xml version="1.0" encoding="UTF-8"?>
<Algo>
    <description texte="" courant="AFFICHER nbTour"/>
    <extension extnom="inactif"/>
    <fonction fctcode="" fctetat="inactif"/>
    <F2 F2para="" F2etat="inactif" F2defaut="" F2lignes=""/>
    <repere repetat="inactif" repcode="-10#10#-10#10#2#2"/>
    <param maxBoucle="500000" totalAffichages="1000" epaisseurLigne="2" nbDecimales="8" arrondiAuto="vrai" totalBoucles="5000000" epaisseurPoint="2"/>
    <item code="200#declarationfonctions" algoitem="FONCTIONS_UTILISEES"/>
    <item code="100#declarationsvariables" algoitem="VARIABLES">
        <item code="1#NOMBRE#saisie" algoitem="saisie EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#chiffreAleatoire" algoitem="chiffreAleatoire EST_DU_TYPE NOMBRE"/>
        <item code="1#NOMBRE#nbTour" algoitem="nbTour EST_DU_TYPE NOMBRE"/>
    </item>
    <item code="101#debutalgo" algoitem="DEBUT_ALGORITHME">
        <item code="2#saisie#pasliste" algoitem="LIRE saisie"/>
        <item code="5#nbTour#1#pasliste" algoitem="nbTour PREND_LA_VALEUR 1"/>
        <item code="5#chiffreAleatoire#ALGOBOX_ALEA_ENT(0,100)#pasliste" algoitem="chiffreAleatoire PREND_LA_VALEUR ALGOBOX_ALEA_ENT(0,100)"/>
        <item code="15#saisie != chiffreAleatoire" algoitem="TANT_QUE (saisie != chiffreAleatoire) FAIRE">
            <item code="16#debuttantque" algoitem="DEBUT_TANT_QUE"/>
            <item code="6#saisie > chiffreAleatoire" algoitem="SI (saisie > chiffreAleatoire) ALORS">
                <item code="7#debutsi" algoitem="DEBUT_SI"/>
                <item code="4#Trop grand#1" algoitem="AFFICHER &quot;Trop grand&quot;"/>
                <item code="8#finsi" algoitem="FIN_SI"/>
                <item code="9#sinon" algoitem="SINON">
                    <item code="10#debutsinon" algoitem="DEBUT_SINON"/>
                    <item code="4#Trop petit#1" algoitem="AFFICHER &quot;Trop petit&quot;"/>
                    <item code="11#finsinon" algoitem="FIN_SINON"/>
                </item>
            </item>
            <item code="2#saisie#pasliste" algoitem="LIRE saisie"/>
            <item code="5#nbTour#nbTour + 1#pasliste" algoitem="nbTour PREND_LA_VALEUR nbTour + 1"/>
            <item code="17#fintantque" algoitem="FIN_TANT_QUE"/>
        </item>
        <item code="4#Gagné#1" algoitem="AFFICHER &quot;Gagné&quot;"/>
        <item code="4#Vous avez joué #0" algoitem="AFFICHER &quot;Vous avez joué &quot;"/>
        <item code="3#nbTour#0#pasliste" algoitem="AFFICHER nbTour"/>
    </item>
    <item code="102#finalgo" algoitem="FIN_ALGORITHME"/>
</Algo>
