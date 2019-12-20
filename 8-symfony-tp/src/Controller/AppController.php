<?php
    namespace App\Controller;

    use App\Entity\Character;
    use App\Entity\Weapon;
    use App\Form\CharacterType;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class AppController extends AbstractController
    {
         /**
          * @Route("/create", name="create_character")
          */
         public function createCharacter(Request $request) {
             // nouvelle instance qu'on va lier à un formulaire
             $character = new Character();

             // créer le formulaire CharacterType
             $form = $this->createForm(CharacterType::class, $character);

             // associer au form la Request (pour récupérer les params POST)
             $form->handleRequest($request);

             // si le formulaire est soumis
             if ($form->isSubmitted()) {
                 // si le formulaire est valide
                 if ($form->isValid()) {
                     // enregistrement en bdd
                     $em = $this->getDoctrine()->getManager();
                     $em->persist($character);
                     $em->flush();

                     // on peut rediriger vers la même page
                     // mais avec un formulaire réinitialisé
                     return $this->redirectToRoute('create_character');
                 }
             }

             return $this->render('app/index.html.twig', [
                 'formCharacter' => $form->createView()
             ]);
         }

        /**
         * @Route("/play", name="play_the_game")
         */
        public function play() {
            $em = $this->getDoctrine()->getManager();

            $characters = $em->getRepository("App:Character")->findAll();

            // choix aléatoire des personnages qui vont jouer
            $nbCharacters = count($characters) - 1;

            // y a-t-il assez de personnages en bdd ?
            if ($nbCharacters >= 1) {
                // perso 1
                $indice1 = rand(0, $nbCharacters);
                $firstCharacter = $characters[$indice1];

                // perso 2
                /*
                $indice2 = rand(0, $nbCharacters);
                while ($indice1 == $indice2) {
                    $indice2 = rand(0, $nbCharacters);
                }
                */

                do {
                    $indice2 = rand(0, $nbCharacters);
                } while($indice1 == $indice2);

                $secondCharacter = $characters[$indice2];
            }
            else {
                $firstCharacter = null;
                $secondCharacter = null;
            }

            return $this->render('app/play.html.twig', [
                'fCharacter' => $firstCharacter,
                'sCharacter' => $secondCharacter
            ]);
        }

        /**
         * @Route("/testMTO", name="test_many_to_one")
         */
        public function testManyToOne() {
            $character = new Character();
            $character->setName('Proutman');
            $character->setArmor(10);
            $character->setDescription('Je pète donc je suinte');
            $character->setHealth(100);
            $character->setStrength(50);

            $weapon = new Weapon();
            $weapon->setName('Prout');
            $weapon->setIsZoneDamaged(true);
            $weapon->setStrengh(18);

            $character->setWeapon($weapon);

            $em = $this->getDoctrine()->getManager();
            $em->persist($character);
            // il faut informer doctrine qu'il y a une relationship à enregistrer
            // ça peut se faire de façon explicite avec un autre persist
            // $em->persist($weapon);
            // ou alors on peut configurer l'entité Character pour déclencher en cascade l'enregistrement
            $em->flush();

            return $this->render('app/character_weapon.html.twig', [
                'character' => $character
            ]);
        }
    }