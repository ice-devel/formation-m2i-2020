<?php
    // démarrer les sessions pour pouvoir les utiliser dans ce fichier
    session_start();

    // formulaire soumis ?
    if (isset($_POST['btn_login'])) {
        // récupérer les valeurs du formulaire
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        if ($username != "" && $password != "") {
            // vérifier un compte correspondant aux identifiants existe en base
            $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
            $sql = "SELECT * FROM client WHERE username = :u AND password = :p";
            $statement = $pdo->prepare($sql);
            $result = $statement->execute([':u' => $username, ':p' => $password]);

            // si la requête retourne un enregistrement, c'est qu'un compte correspond
            // si la requete retourne 0 enregistrement, c'est qu'aucun ne correspond

            //if ($statement->fetch() == false) {
            if ($statement->rowCount() == 0) {
                $message = "Mauvais identifiant/mot de passe";

            }
            else {
                $message = "Connexion réussie";

                // créer une session
                $_SESSION['connected'] = true;
                $_SESSION['username'] = $username;
            }
        }
        else {
            $error = true;
        }
    }
?>

<?php
    if (isset($error)) {
        echo "Veuillez saisir vos identifiants pour vous connecter";
    }

    if (isset($message)) {
        echo $message;
    }

    // est-ce qu'on est connecté ?
    if (isset($_SESSION['username'])) {
        echo "Vous êtes connecté. <a href='5-exo-logout.php'>Se déconnecter</a>";
    }
?>

<form action="" method="post">
    <input type="text" name="username" />
    <input type="password" name="password" />

    <input type="submit" name="btn_login"/>
</form>
