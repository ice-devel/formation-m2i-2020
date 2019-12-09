<?php
    /**
     * On souhaite pouvoir gérer les produits d’une boutique via une interface web.
     * Chaque produit est représenté par ces données :
    id - Obligatoire
    Date de création - Obligatoire
	Code produit - Obligatoire
	Format : 3 lettres Tiret 3 chiffres
	Exemple : ABC-965
	Nom du produit - Obligatoire
	Description du produit - Obligatoire
	Prix - Obligatoire
	Format : 2 chiffres après la virgule
	Stock restant - Facultatif
	Catégorie (relation n-1) - Obligatoire

	Les catégories doivent se trouver dans une table à part (id, date de création, nom).
	Il faudra créer la bonne clé étrangère dans la base de donnée entre produit et catégorie.

	Exercice :
	Créer les tables mysql correspondantes
	Créer la page ajout de produit : formulaire de création de produit
	Créer la page listing pour afficher tous les produits du plus récent au plus vieux. Vous afficherez toutes les informations (sauf ID et date de création) avec le html et le css que vous souhaitez. Pour chaque produit, il doit y avoir un bouton de modification et un autre de suppression.
	Créer la page de modification de produit
	Créer la page de suppression de produit

	Remarques :
	Pour le prix, il faudra faire attention : sur le site web, il faudra afficher les décimales après une virgule, alors qu’en base, c’est le point qui sépare les décimales. Trouver le type de données MySQL le plus adapté
	Pour les formulaires création et modification, vous devez gérer les erreurs en html5 mais également côté serveur.

    Exos supplémentaires :
	Modifier votre code pour que la suppression d’un produit lors du clic sur le bouton “Supprimer” se fasse en Ajax.
	Créer une page qui affiche le nom de toutes les catégories en affichant à côté  le nombre de produits se trouvant dans chaque catégorie..
	Ajoutez dans cette page un mini-formulaire avec un input number. Quand vous validez ce formulaire, la page doit se recharger mais n’afficher que les catégories où le nombre de produits est égal ou inférieur au nombre saisi dans ce champ.
    */