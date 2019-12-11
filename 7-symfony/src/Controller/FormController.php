<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form/create", name="form_create")
     */
    public function create() {
        // 1- créer une entité
        $product = new Product();

        // 2- créer le formulaire, et associer l'entité qui devra être hydratée automatiquement
        $form = $this->createForm(ProductType::class, $product);

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
     * @Route("/form/update", name="form_update")
     */
    public function update() {

    }

    /**
     * @Route("/form/delete", name="form_delete")
     */
    public function delete() {

    }
}
