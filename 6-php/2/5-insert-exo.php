<?php
    if (isset($_POST['btn_register'])) {
        // récupérer les valeurs
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');

        // vérifier si les valeurs sont ok
        $errors = [];
        if ($name == null || $name == "") {
            $errors[] = "Veuillez saisir un nom";
        }

        if ($email == null || ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = "Veuillez saisir une adresse correcte";
        }

        // enregistrer en bdd le nouvel utilisateur
        if (count($errors) == 0) {
            // 1- connexion serveur bdd et choix de la base
            $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
            $sql = "INSERT INTO utilisateur(name, email, is_enabled)
                    VALUES (:name, :mail, :isEnabled)";
            $statement = $pdo->prepare($sql);
            $result = $statement->execute([
                ':name' => $name,
                ':mail' => $email,
                ':isEnabled' => 1
            ]);

            if ($result) {
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
    <h2>Créer un nouveau utilisateur</h2>

    <p>
    Créer le formulaire html qui permet d'enregister un utilisateur en lui demandant son nom, son email.

    Pour le nom : minimum 3 caractères
    Pour l'email : format email valide
    Faire la vérif client en html5, et les vérifs serveur en PHP

    En PHP, récup les données, les vérifier, les enregister
    Laisser mysql mettre sa date de création par défaut
    Activer le compte utilisateur par défaut : donc is_enabled à 1</p>

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
        <input type="email" name="email" placeholder="Votre email" />

        <input type="submit" name="btn_register" />
    </form>
</body>
</html>


