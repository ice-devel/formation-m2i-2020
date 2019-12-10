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
    public function app()
    {
        /* ici on utilise twig pour génerer un template, et mettre créer une response automatiqument */
        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/app1", name="app1")
     */
    public function app1()
    {
        /* ici on crée nous-même l'objet Response */
        $response = new Response();
        $response->setContent(0);
        return $response;
    }

    /**
     * Pour créer une route, deux paramètres : le premier c'est l'URL de la route (ici : /app2)
     * le deuxième, c'est le nom de la route (ici app2_variables)
     * @Route("/app2", name="app2_variables")
     */
    public function app2()
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
