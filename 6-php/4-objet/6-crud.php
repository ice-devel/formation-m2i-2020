<?php
    require 'entity/UtilisateurManager.php';
    require 'entity/Utilisateur.php';

    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");

    $utilisateurManager = new UtilisateurManager($pdo);

    // récupérer un utilisateur
    $idUserToDisplay = filter_input(INPUT_GET, 'id');
    $user = $utilisateurManager->find($idUserToDisplay);

    if ($user == null) {
        echo "Pas d'utilisateur";
    }
    else {
        echo $user->getName();
    }

    // récupérer tous les utilisateurs
    $users = $utilisateurManager->findAll();

    // créer un utilisateur
    if (isset($_POST['btn_register'])) {
        // récupérer les valeurs
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');

        // vérifier si il y a des erreurs
        $errors = [];
        if ($name == "") {
            $errors[] = "Veuillez saisir votre nom";
        }

        //if ($email != "" && filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez saisir une adresse email valide";
        }

        // si pas d'erreurs, enregistrement bdd
        if (count($errors) == 0) {
            $user = new Utilisateur();
            $user->setName($name);
            $user->setEmail($email);
            $ok = $utilisateurManager->insert($user);
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
</head>
<body>
    <h2>Liste des utilisateurs</h2>
    <table>
        <?php
            foreach ($users as $util) {
                echo "<tr>
                        <td>".$util->getId()."</td>
                        <td>".$util->getName()."</td>
                        <td>".$util->getCreatedAt()."</td>
                        <td>".$util->getIsEnabled()."</td>
                        <td>".$util->getEmail()."</td>
                        <td><a href='?id=".$util->getId()."'>Voir</a></td>
                    </tr>";
            }
        ?>
    </table>

    <h2>Créer un utilisateur</h2>

    <form method="post" action="">
        <input type="text" name="name" placeholder="Votre nom" required/>
        <input type="email" name="email" placeholder="Votre email" />

        <input type="submit" name="btn_register" />
    </form>
</body>
</html>

