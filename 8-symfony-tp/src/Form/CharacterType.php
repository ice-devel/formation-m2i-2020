<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Weapon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, ['label' => 'Nom du perso'])
            ->add('strength')
            ->add('health')
            ->add('armor')
            ->add('description')
            //->add('weapon', null, ['choice_label' => 'getNameListederoulante'])

            ->add('weapon')
            //->add('weapon', EntityType::class, ['class' => Weapon::class])

            //->add('items')

            ->add('items', CollectionType::class, [
                'entry_type' => ItemType::class,
                'allow_add' => true,
            ])

            ->add('avatar', FileType::class, [
                'mapped' => false,
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'maxSizeMessage' => 'Votre photo doit faire max. 1M.',
                        'mimeTypesMessage' => 'Veuillez choisir un fichier .jpg ou .png',
                    ])
                ]
            ])

            ->add('submit', SubmitType::class, ['label' => 'Valider le personnage'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
