<?php
    require 'entity/UtilisateurManager.php';
    require 'entity/Utilisateur.php';

    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");

    $utilisateurManager = new UtilisateurManager($pdo);

    // récupérer un utilisateur
    $idUserToDisplay = filter_input(INPUT_GET, 'id');
    $userToDisplay = $utilisateurManager->find($idUserToDisplay);

    // modifier un utilisateur
    $idUserToUpdate = filter_input(INPUT_GET, 'idUpdate');
    // si la clé idUserToUpdate existe dans l'url, c'est que l'on vient de cliquer sur un bouton "Modifier"
    $userToUpdate = new Utilisateur();
    if ($idUserToUpdate != null) {
        $userToUpdate = $utilisateurManager->find($idUserToUpdate);

        // formulaire de mise à jour soumis ?
        if (isset($_POST['btn_update'])) {
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
                $userToUpdate->setName($name);
                $userToUpdate->setEmail($email);
                $ok = $utilisateurManager->update($userToUpdate);
            }
        }
    }

    // supprimer un utilisateur
    $idUserToDelete = filter_input(INPUT_GET, 'idDelete');
    if ($idUserToDelete != null) {
        $userDeleted = $utilisateurManager->delete($idUserToDelete);
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
    <h2>Afficher un utilisateur</h2>
    <?php
        if ($userToDisplay == null) {
            echo "Pas d'utilisateur";
        }
        else {
            echo $userToDisplay->getName();
        }
    ?>

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
                        <td><a href='?idUpdate=".$util->getId()."'>Modifier</a></td>
                        <td><a href='?idDelete=".$util->getId()."'>Supprimer</a></td>
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


    <h2>Modifier un utilisateur</h2>

    <form method="post" action="">
        <input type="text" name="name" placeholder="Votre nom" required value="<?php echo $userToUpdate->getName(); ?>"/>
        <input type="email" name="email" placeholder="Votre email" value="<?php echo $userToUpdate->getEmail(); ?>"/>

        <input type="submit" name="btn_update" />
    </form>

    <h2>Supprimer un utilisateur (confirmation)</h2>
    <?php
        if (isset($userDeleted) && $userDeleted) {
            echo "Utilisateur bien supprimé";
        }
    ?>
</body>
</html>

