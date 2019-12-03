<?php

    class Player
    {
        /*
         * Portée
         * private : veut dire que l'on ne peut accéder à ces propriétés que dans la classe elle-même
         * public : on peut accéder aux propriétés/méthodes dans la classe et en dehors de la classe
         */
        private $id;
        private $createdAt;
        private $name;
        private $team;
        private $points;
        private $mail;
        private $zipcode;
        private $isEnabled;

        /**
         * Player constructor.
         * @param $id
         * @param $createdAt
         * @param $name
         * @param $team
         * @param $points
         * @param $mail
         * @param $zipcode
         * @param $isEnabled
         */
        public function __construct($id=null, $createdAt=null, $name=null, $team=null, $points=null, $mail=null, $zipcode=null, $isEnabled=null)
        {
            /*
            $this->id = $id;
            $this->createdAt = $createdAt;
            $this->name = $name;
            $this->team = $team;
            $this->points = $points;
            $this->mail = $mail;
            $this->zipcode = $zipcode;
            $this->isEnabled = $isEnabled;
            */

            /*
             * Même dans le constructor c'est bien vu quand même
             * de passer par les setters pour modifier les valeurs des propriétés
             * plutôt que d'attaquer les propriétés directement
             */
            $this->setId($id);
            $this->setCreatedAt($createdAt);
            $this->setName($name);
            $this->setTeam($team);
            $this->setPoints($points);
            $this->setMail($mail);
            $this->setZipcode($zipcode);
            $this->setIsEnabled($isEnabled);
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->createdAt;
        }

        /**
         * @param mixed $createdAt
         */
        public function setCreatedAt($createdAt)
        {
            $this->createdAt = $createdAt;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getTeam()
        {
            return $this->team;
        }

        /**
         * @param mixed $team
         */
        public function setTeam($team)
        {
            $this->team = $team;
        }

        /**
         * @return mixed
         */
        public function getPoints()
        {
            return $this->points;
        }

        /**
         * @param mixed $points
         */
        public function setPoints($points)
        {
            $this->points = $points;
        }

        /**
         * @return mixed
         */
        public function getMail()
        {
            return $this->mail;
        }

        /**
         * @param mixed $mail
         */
        public function setMail($mail)
        {
            $this->mail = $mail;
        }

        /**
         * @return mixed
         */
        public function getZipcode()
        {
            return $this->zipcode;
        }

        /**
         * @param mixed $zipcode
         */
        public function setZipcode($zipcode)
        {
            $this->zipcode = $zipcode;
        }

        /**
         * @return mixed
         */
        public function getIsEnabled()
        {
            return $this->isEnabled;
        }

        /**
         * @param mixed $isEnabled
         */
        public function setIsEnabled($isEnabled)
        {
            $this->isEnabled = $isEnabled;
        }
    }