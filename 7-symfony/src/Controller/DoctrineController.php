<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DoctrineController extends AbstractController
{
    /**
     * @Route("/product/create", name="product_create")
     */
    public function create() {
        /* On instancie une entité pour pouvoir l'enregistrer en bdd */
        $product = new Product();
        $product->setName("Processeur 1");
        $product->setDescription("Description proc 1");
        $product->setIsAvailable(true);
        $product->setPrice(150.99);
        $now = new \DateTime();
        $product->setCreatedAt($now);

        /* récupérer l'entity manager de doctrine */
        $em = $this->getDoctrine()->getManager();

        /* dire au manager qu'il doit persister cette entité */
        $em->persist($product);

        /* executer les requetes */
        $em->flush();

        return new Response("<body>Ok</body>");
    }

    /**
     * @Route("/product/read", name="product_read")
     */
    public function read() {
        /* récupérer une entité en bdd */
        // 1 - récupérer le manager de doctrine
        $em = $this->getDoctrine()->getManager();

        // informer le manager quel type d'objet on veut récupérer
        $product = $em->getRepository('App:Product')->find(3);

        // générer une 404 si aucun produit ne correspond
        if ($product == null) {
            throw new NotFoundHttpException();
        }

        return new Response("<body>ok : ".$product->getName()."</body>");
    }

    /**
     * @Route("/product/update", name="product_update")
     */
    public function update() {
        // récupérer le manager de doctrine
        $em = $this->getDoctrine()->getManager();

        // récupérer l'entité à modifier
        $product = $em->getRepository('App:Product')->find(1);

        // modifier l'entité
        $product->setName("RAM 4");
        $product->setIsAvailable(true);

        // pas nécessaire d'informer le manager de prendre en compte l'entité
        // car c'est le manager qui l'a récupéré
        // $em->persist($product);

        // enregistrer les modifs en bdd
        $em->flush();

        return new Response("<body>ok</body>");
    }

    /**
     * @Route("/product/delete", name="product_delete")
     */
    public function delete() {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('App:Product')->find(2);

        $em->remove($product);

        $em->flush();

        return new Response("<body>ok</body>");
    }
}
