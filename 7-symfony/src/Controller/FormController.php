<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form/create", name="form_create")
     */
    public function create(Request $request) {
        // 1- créer une entité
        $product = new Product();
        /*
         * Mettre des valeurs par défaut dans l'objet (on préférera le faire dans le constructeur de la classe)
        $product->setIsAvailable(true);
        $product->setCreatedAt(new \DateTime());
        */

        // 2- créer le formulaire, et associer l'entité qui devra être hydratée automatiquement
        $form = $this->createForm(ProductType::class, $product);

        // 3- associer le formulaire à la requête http
        $form->handleRequest($request);

        // 4- vérifier que le formulaire a été envoyé
        if ($form->isSubmitted()) {
            // 5- vérifier qu'il n'y a pas d'erreur
            if ($form->isValid()) {
                // 6- on peut enregistrer en bdd l'entité
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();
            }
        }

        // générer la vue en lui passant le formulaire
        return $this->render('form/create.html.twig', [
            'formProduct' => $form->createView()
        ]);
    }

    /**
     * @Route("/form/read", name="form_read")
     */
    public function read() {

    }

    /**
     * @Route("/form/update/{id}", name="form_update")
     */
    public function update(Request $request, $id) {
        // 1- récupérer une entité
        $em = $this->getDoctrine()->getManager();

        // on récupère l'entité dont l'id a été passé dans l'URL
        $product = $em->getRepository('App:Product')->find($id);

        if ($product == null) {
            throw new NotFoundHttpException();
        }

        // 2- créer le formulaire, et associer l'entité qui devra être hydratée automatiquement
        $form = $this->createForm(ProductType::class, $product);

        // 3- associer le formulaire à la requête http
        $form->handleRequest($request);

        // 4- vérifier que le formulaire a été envoyé
        if ($form->isSubmitted()) {
            // 5- vérifier qu'il n'y a pas d'erreur
            if ($form->isValid()) {
                // 6- on peut enregistrer en bdd l'entité
                // $em->persist($product); // pas besoin de persist car le manager connait déjà cette entité : c'est lui qui l'a récupérée
                $em->flush();
            }
        }

        // générer la vue en lui passant le formulaire
        return $this->render('form/update.html.twig', [
            'formProduct' => $form->createView()
        ]);
    }

    /**
     * @Route("/form/delete", name="form_delete")
     */
    public function delete() {

    }
}
