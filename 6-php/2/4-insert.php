<?php
    // formulaire soumis ?
    if (isset($_POST['btn_register'])) {
        // récupérer les valeurs
        $name = filter_input(INPUT_POST, 'name');
        $team = filter_input(INPUT_POST, 'team');
        $email = filter_input(INPUT_POST, 'email');
        $zipcode = filter_input(INPUT_POST, 'zipcode');

        // vérifier si les valeurs sont ok
        $errors = [];
        if ($name == null || $name == "") {
            $errors[] = "Veuillez saisir un nom";
        }

        if ($team == null || $team == "") {
            $errors[] = "Veuillez choisir une équipe";
        }

        if ($email == null || ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = "Veuillez saisir une adresse correcte";
        }

        //if ($zipcode == null || $zipcode == "" || preg_match("@\d{5}@", $zipcode) == 0) {
        //if (preg_match("@\d{5}@", $zipcode) == 0) {
        if (!preg_match("@\d{5}@", $zipcode)) {
            $errors[] = "Veuillez saisir une code postal valide";
        }

        // enregistrer en bdd le nouveau player
        if (count($errors) == 0) {
            // pas d'erreur : insert into
            // 1- connexion serveur bdd et choix de la base
            $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");

            // préparation de la requête sql
            $sql = "INSERT INTO player(name, team, mail, zipcode)
                    VALUES (:nameParam, :teamParam, :mailParam, :zipcodeParam)";
            $statement = $pdo->prepare($sql);
            $result = $statement->execute([
                ':nameParam' => $name,
                ':teamParam' => $team,
                ':mailParam' => $email,
                ':zipcodeParam' => $zipcode
            ]);

            if ($result == true) {
                $success = true;
            }
        }
        else {

        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table td {
            border:1px solid pink;
        }
    </style>
</head>
<body>
    <h2>Créer un nouveau player</h2>

    <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                echo $error."<br>";
            }
        }

        if (isset($success)) {
            echo "Merci pour votre inscription";
        }
    ?>

    <form method="post">
        <input type="text" name="name" placeholder="Votre nom" required/>

        <select name="team" required>
            <option></option>
            <option value="1">Team rouge</option>
            <option value="2">Team bleue</option>
            <option value="3">Team jaune</option>
            <option value="4">Team orange</option>
        </select>

        <input type="email" name="email" placeholder="Votre email" />

        <input type="text" name="zipcode" placeholder="Votre code postal" required pattern="\d{5}"/>

        <input type="submit" name="btn_register" />
    </form>
</body>
</html>


