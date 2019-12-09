<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        $response = new Response();
        $response->setContent("<p>coucou</p>");
        return $response;
    }

    /**
     * @Route("/produit", name="produit")
     */
    public function produit()
    {
        return $this->render('app/produit.html.twig');
    }

    /**
     * @Route("/produit-dynamique", name="produit_dynamique")
     */
    public function produitDynamique()
    {
        $chiffre = rand(10, 50);
        // afficher quelquechose : echo NON, on passe par un template

        $tab = [5, 15, 49, 650, 45, 89 ,20, 15];

        /*
         * On passe des variables à la vue dans le 2eme paramètre de la fonction render
         * Il faut passer un tableau associatif : les clés seront les noms
         * de variables à utiliser dans le template
         */
        return $this->render('app/produit_dynamique.html.twig', [
            'chiffre' => $chiffre,
            'tabChiffres' => $tab
        ]);
    }
}
