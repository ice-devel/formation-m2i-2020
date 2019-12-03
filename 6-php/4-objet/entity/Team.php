<?php
    /**
     * Created by PhpStorm.
     * User: Administrateur
     * Date: 02/12/2019
     * Time: 16:22
     */

    class Team
    {
        private $id;
        private $createdAt;
        private $name;
        private $level;

        /**
         * Team constructor.
         * @param $id
         * @param $createdAt
         * @param $name
         * @param $level
         */
        public function __construct($id, $createdAt, $name, $level)
        {
            $this->id = $id;
            $this->createdAt = $createdAt;
            $this->name = $name;
            $this->level = $level;
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
        public function getLevel()
        {
            return $this->level;
        }

        /**
         * @param mixed $level
         */
        public function setLevel($level)
        {
            $this->level = $level;
        }







    }