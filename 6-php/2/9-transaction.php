<?php
    if (isset($_POST['btn_register'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $zipcode = filter_input(INPUT_POST, 'zipcode');
        $city = filter_input(INPUT_POST, 'city');

        // on utilise les transactions pour s'assurer qu'un ensemble de requête
        // fonctionne, et éviter qu'une requête sur deux par exemple plante


        // insertion des données du client
        $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");

        // débute la transaction
        $pdo->beginTransaction();

        $query = "INSERT INTO client (username, password) VALUES (:u, :p)";
        $statement = $pdo->prepare($query);
        $result = $statement->execute([':u' => $username, ':p' => $password]);

        // récupérer l'auto increment qui vient d'être généré :
        $idClient = $pdo->lastInsertId();

        // insertion de sa première adresse
        $query2 = "INSERT INTO adresse (zipcode, city) VALUES (:z, :c, :i)";
        $statement = $pdo->prepare($query2);
        $result2 = $statement->execute([':z' => $zipcode, ':c' => $city, ':i' => $idClient]);

        // valider ou annuler la transaction
        //if ($result == true && $result2 == true) {
        if ($result && $result2) {
            // on commit la transaction si toutes les requêtes vont fonctionner : envoyer réellement
            // les requêtes
            $pdo->commit();
            $success = true;
        }
        else {
            // annuler la transaction si au moins une des requêtes a planté : aucune requête
            // ne sera vraiment exécutée
            $pdo->rollBack();
        }
    }
?>

<form method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur"/>
    <input type="password" name="password" placeholder="Mot de passe"/>

    <input type="text" name="zipcode" placeholder="Code postal"/>
    <input type="text" name="city" placeholder="Ville"/>

    <input type="submit" name="btn_register"/>
</form>