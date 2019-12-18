<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdvancedDoctrineController extends AbstractController
{
    /**
     * @Route("/doctrine-avance/findBy", name="doctrine_findby")
     */
    public function doctrineFindBy() {
        $em = $this->getDoctrine()->getManager();
        // le findBy permet de récupérer des entités en fonction de paramètre
        $onlineArticles = $em->getRepository('App:Article')->findBy([
            'isOnline' => true
        ]);

        echo "<pre>";
        var_dump($onlineArticles);
        echo "</pre>";

        $onlineSalutArticles = $em->getRepository('App:Article')->findBy([
            'isOnline' => true,
            'name' => 'salut'
        ]);

        echo "<pre>";
        var_dump($onlineSalutArticles);
        echo "</pre>";

        /*
         * Intégrer des "IN" pour une propriété
         */
        $onlineArticles = $em->getRepository('App:Article')->findBy([
            'isOnline' => true,
            'name' => ['salut', 'Bonjour'],
        ]);

        echo "<pre>";
        var_dump($onlineArticles);
        echo "</pre>";

        /*
         * Trier par propriété (alphabétique / croissant, etc.)
         */
        $onlineArticles = $em->getRepository('App:Article')
                        ->findBy(['isOnline' => true], ['name' => 'ASC', 'createdAt' => 'ASC']);


        /*
         * findOne : récupérer une seule entité
         */
        $onlineArticle = $em->getRepository('App:Article')->findOneBy([
            'name' => "La drogue c'est bien ?"
        ]);

        echo "<pre>";
        var_dump($onlineArticle);
        echo "</pre>";

        /*
         * Si il n'y aucun enregistrement correspondant en bdd
         * findOneBy renvoie null
         */
        $onlineArticle = $em->getRepository('App:Article')->findOneBy([
            'name' => "La drogue c'est mal ?"
        ]);

        echo "<pre>";
        var_dump($onlineArticle);
        echo "</pre>";

        return new Response("<body>coucou</body>");
    }

    /**
     * @Route("/doctrine-avance/custom-repo", name="doctrine_custom_repo")
     */
    public function customRepo() {
        $em = $this->getDoctrine()->getManager();
        $repoArticle = $em->getRepository('App:Article');
        $articles = $repoArticle->findByToday();

        $stats = $repoArticle->getStatsGroupByName();

        return $this->render('advanced_doctrine/custom_repo.html.twig', [
            'stats' => $stats
        ]);
    }
}
