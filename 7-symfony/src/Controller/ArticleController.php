<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/new", name="article_new")
     */
    public function create(Request $request) {
        // une nouvelle instance
        $article = new Article();
        // on crée un formulaire et on l'associe à l'instance
        $form = $this->createForm(ArticleType::class, $article);

        // demander au formulaire d'aller chercher les données envoyées dans la requête
        $form->handleRequest($request);

        // est-ce que le formulaire est soumis ?
        if ($form->isSubmitted()) {
            // est-ce qu'il est valide
            if ($form->isValid()) {
                // enregistrer en bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
            }
        }

        // on affiche la vue, en lui passant le formulaire à afficher
        return $this->render("article/new_article.html.twig", [
            'formArticle' => $form->createView(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="article_read")
     */
    public function read($id) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('App:Article')->find($id);

        return $this->render('article/read_article.html.twig', [
            'article' => $article
        ]);
    }
}
