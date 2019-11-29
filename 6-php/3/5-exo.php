<?php
    /**
     *
     * Dans la BDD, créer une table "client" avec 3 champs : id, username, password
     *
     * Créer une page avec en html un formulaire pour enregistrer un client, le code PHP
     * pour envoyer la requête
     *
     * Une autre page avec une formulaire d'identification (identifiant + mdp)
     *
     * Et vous devez créer une variable de session username
     * quand un client tape ses bons identifiants, et lui dire "Vous êtes connecté"
     * Quand le client revient sur la page, le message "Vous êtes connecté" doit se réafficher
     * automatiquement sans qu'il ait à saisir à nouveau ses id
     *
     */

    if (isset($_POST['btn_register'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if ($username != "" && $password != "") {
            // inscription
            $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
            $query = "INSERT INTO client (username, password) VALUES (:u, :p)";
            $statement = $pdo->prepare($query);
            $result = $statement->execute([':u' => $username, ':p' => $password]);
            $success = true;
        }
        else {
            $error = true;
        }
    }
?>

<?php
    if (isset($error)) {
        echo "Veuillez saisir un identifiant et un mot de passe";
    }

    if (isset($success)) {
        echo "Inscription réussie";
    }
?>
<form action="" method="post">
    <input type="text" name="username" />
    <input type="password" name="password" />

    <input type="submit" name="btn_register"/>
</form>
