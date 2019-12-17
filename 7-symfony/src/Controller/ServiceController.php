<?php

namespace App\Controller;

use App\Service\SlugGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Router;

/**
 * @Route("/service")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("/without", name="service_without")
     */
    public function without(Request $request) {
        $title = "Bonjour je suis Monsieur connard éééhhh!";

        /*
        $slugGenerator = new SlugGenerator();
        $slug = $slugGenerator->slugify($title);
        */

        return new Response(0);
    }

    /**
     * @Route("/with", name="service_with")
     * Symfony 4 : tout ce qu'il y a des le dossier src est déclaré comme un service
     * Et on peut injecter un service dans une action de controller
     */
    public function with(SlugGenerator $sg) {
        $title = "Bonjour je suis Monsieur enfoiré éééhhh!";

        // symfony : obligation déclaration service
        // $slugGenerator = $this->get("slug_generator");

        $slug = $sg->slugify($title);

        return new Response($slug);
    }

    /**
     * @Route("/slug-route", name="service_slug_route")
     * Symfony 4 : tout ce qu'il y a des le dossier src est déclaré comme un service
     * Et on peut injecter un service dans une action de controller
     */
    public function slugRoute(SlugGenerator $sg) {
        $title = "Bonjour je suis Monsieur enfoiré éééhhh!";

        $url = $sg->slugifyAndGenerateURL('article_read', $title, 'id');

        return new Response($url);
    }
}
