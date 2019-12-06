<?php
    /**
     * Created by PhpStorm.
     * User: Administrateur
     * Date: 04/12/2019
     * Time: 09:58
     */
    class UtilisateurManager
    {
        private $pdo;

        public function __construct($pdo)
        {
            $banane = 10;
            //$this->pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");
            $this->pdo = $pdo;
        }

        public function find($id) {
            $sql = "SELECT * FROM utilisateur WHERE id = :id";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([':id' => $id]);

            $utilisateurTab = $statement->fetch(PDO::FETCH_ASSOC);

            if ($utilisateurTab == false) {
                return null;
            }

            $utilisateur = new Utilisateur();
            $utilisateur->setId($utilisateurTab['id']);
            $utilisateur->setCreatedAt($utilisateurTab['created_at']);
            $utilisateur->setName($utilisateurTab['name']);
            $utilisateur->setEmail($utilisateurTab['email']);
            $utilisateur->setIsEnabled($utilisateurTab['is_enabled']);

            return $utilisateur;
        }

        public function findAll() {
            $sql = "SELECT * FROM utilisateur";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();

            $utilisateursTab = $statement->fetchAll(PDO::FETCH_ASSOC);

            $users = [];
            foreach ($utilisateursTab as $u) {
                $utilisateur = new Utilisateur();
                $utilisateur->setId($u['id']);
                $utilisateur->setCreatedAt($u['created_at']);
                $utilisateur->setName($u['name']);
                $utilisateur->setEmail($u['email']);
                $utilisateur->setIsEnabled($u['is_enabled']);
                $users[] = $utilisateur;
            }

            return $users;
        }

        public function insert(Utilisateur $user) {
            $sql = "INSERT INTO utilisateur(name, email) VALUES (:name, :email)";
            $statement = $this->pdo->prepare($sql);
            $result = $statement->execute([
                ':name' => $user->getName(),
                ':email' => $user->getEmail()
            ]);

            return $result;
        }

        public function update(Utilisateur $user) {
            $sql = "UPDATE utilisateur SET name=:name, email=:email WHERE id=:id";
            $statement = $this->pdo->prepare($sql);
            $result = $statement->execute([
                ':name' => $user->getName(),
                ':email' => $user->getEmail(),
                ':id' => $user->getId()
            ]);

            return $result;
        }

        public function delete($id) {
            $sql = "DELETE FROM utilisateur WHERE id=:id";
            $statement = $this->pdo->prepare($sql);
            $result = $statement->execute([
                ':id' => $id
            ]);

            return $result;
        }
    }