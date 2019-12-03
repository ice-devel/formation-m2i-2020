<?php

    class PlayerManager
    {
        private $db;

        public function __construct($toto)
        {
            $this->db = $toto;
        }

        public function find($id) {
            $sql = "SELECT * FROM player WHERE id = :id";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([':id' => $id]);
            $tabPlayer = $statement->fetch(PDO::FETCH_ASSOC);

            //if ($result == false || $tabPlayer == false) {
            if (!$result || !$tabPlayer) {
                return null;
            }

            $player = new Player();
            $this->hydrate($player, $tabPlayer);

            return $player;
        }

        public function findAll() {
            $sql = "SELECT * FROM player";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute();
            $tabPlayers = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result == false) {
                return null;
            }

            $players = [];
            foreach ($tabPlayers as $tabPlayer) {
                $player = new Player();
                $this->hydrate($player, $tabPlayer);
                $players[] = $player;
            }

            return $players;
        }

        /*
         * setter les propriétés du player avec des données provenant de la bdd
         */
        public function hydrate($p, $tab) {
            $p->setId($tab['id']);
            $p->setName($tab['name']);
            $p->setMail($tab['mail']);
            $p->setTeam($tab['team']);
            $p->setCreatedAt($tab['created_at']);
            $p->setIsEnabled($tab['is_enabled']);
            $p->setZipcode($tab['zipcode']);
            $p->setPoints($tab['points']);
        }

        public function insert(Player $player) {
            // préparation de la requête sql
            $sql = "INSERT INTO player(name, team, mail, zipcode)
                    VALUES (:nameParam, :teamParam, :mailParam, :zipcodeParam)";
            $statement = $this->db->prepare($sql);
            $result = $statement->execute([
                ':nameParam' => $player->getName(),
                ':teamParam' => $player->getTeam(),
                ':mailParam' => $player->getMail(),
                ':zipcodeParam' => $player->getZipcode()
            ]);

            return $result;
        }
    }