<?php

    namespace App\Listener;

    use App\Entity\Character;
    use App\Entity\Item;
    use App\Entity\Weapon;
    use App\Form\WeaponType;
    use Doctrine\ORM\Event\LifecycleEventArgs;
    use Symfony\Component\Routing\RouterInterface;

    /**
     * EntityListener
     */
    class EntityListener
    {
        private $router;

        public function __construct(RouterInterface $router)
        {
            $this->router = $router;
        }

        public function prePersist(LifecycleEventArgs $args)
        {
            $entity = $args->getEntity();
            $em = $args->getEntityManager();

            if (method_exists($entity, 'setCreatedAt')) {
                $entity->setCreatedAt(new \DateTime());
            }

            if ($entity instanceof Character) {
                $entity->setHealth(1000);
            }

            if ($entity instanceof Item) {

            }

            if ($entity instanceof Weapon) {

            }
        }


        public function preUpdate(LifecycleEventArgs $args)
        {
            $entity = $args->getEntity();
            $em = $args->getEntityManager();


            if (method_exists($entity, 'setUpdatedAt')) {
                $entity->setUpdatedAt(new \DateTime());
            }
        }

        public function postPersist(LifecycleEventArgs $args)
        {
            $entity = $args->getEntity();
            $em = $args->getEntityManager();
        }
    }