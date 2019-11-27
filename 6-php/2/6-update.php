<?php
    $id = filter_input(INPUT_GET, 'id');

    // si l'id n'a pas été passé en paramètre, on va considérer que cette page retourne une page d'erreur 404
    if ($id == null || $id == "") {
        header('HTTP/1.0 404 Not Found');
        exit;
    }

    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");

    // récupérer toutes les teams pour les afficher dans la liste déroulante
    // et pour vérifier quand on a soumis le formulaire, côté serveur, que la team sélectionnée existe bien
    $sql = "SELECT id, name FROM team";
    $statement = $pdo->query($sql);
    $teams = $statement->fetchAll(PDO::FETCH_ASSOC);

    // 2 - modifier le player
    // 2a- formulaire soumis ?
    if (isset($_POST['btn_register'])) {
        // 2b- récupération des valeurs
        $name = filter_input(INPUT_POST, 'name');
        $team = filter_input(INPUT_POST, 'team');
        $email = filter_input(INPUT_POST, 'email');
        $zipcode = filter_input(INPUT_POST, 'zipcode');

        // 2c - vérifier si les valeurs sont bonnes
        $errors = [];
        if ($name == null || $name == "") {
            $errors[] = "Veuillez saisir votre nom";
        }

        if ($team == null || $team == "") {
            $errors[] = "Veuillez choisir une équipe";
        }

        // vérifier si la team choisie existe bien en base au moment t
        $teamsIds = array_column($teams, 'id');
        if (!in_array($team, $teamsIds)) {
            $errors[] = "Désolé cette équipe n'existe pas";
        }

        if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Veuillez saisir une adresse email valide";
        }
        //if ($zipcode == null || $zipcode == "" || preg_match('#\d{5}#', $zipcode) == 0) {
        if (!preg_match('#\d{5}#', $zipcode)) {
            $errors[] = "Veuillez saisir un code postal valide";
        }

        // 2d - envoyer en bdd la mise à jour
        // connexion existe déjà
        $sql = "UPDATE player SET name = :name, team = :team, mail = :email, zipcode = :zipcode
                WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $result = $statement->execute([
                        ":name" => $name,
                        ":team" => $team,
                        ":email" => $email,
                        ":zipcode" => $zipcode,
                        ":id" => $id
        ]);

    }

    // 1 - récupérateur le player concerné
    $sql = "SELECT * FROM player WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([':id' => $id]);
    // on peut récupérer uniquement le premier enregistrement grâce à fetch à la place de fetchAll
    $player = $statement->fetch(PDO::FETCH_ASSOC);

    if ($player == false) {
        $unknownPlayer = true;
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
    <h2>Modifier un player</h2>

    <?php
        if (isset($unknownPlayer)) {
            echo "Désolé, cet utilisateur n'existe plus ou pas";
        }

        if (isset($errors)) {
            foreach ($errors as $error) {
                echo $error."<br>";
            }
        }

    ?>
    <form method="post">
        <input type="text" name="name" placeholder="Votre nom" required value="<?php echo $player['name']; ?>"/>

        <select name="team" required>
            <option></option>
            <?php
                foreach ($teams as $team) {
                    /*
                    if ($player['team'] == $team['id']) {
                        $selected = "selected";
                    }
                    else {
                        $selected = "";
                    }
                    */

                    $selected = ($player['team'] == $team['id']) ? "selected" : "";

                    echo '<option value="'.$team['id'].'" '.$selected.'>'.$team['name'].'</option>';
                }
            ?>
            <!--
            <option value="1" <?php if ($player['team'] == 1) { echo "selected"; } ?>>Team rouge</option>
            <option value="2" <?php if ($player['team'] == 2) { echo "selected"; } ?>>Team bleue</option>
            <option value="3" <?php if ($player['team'] == 3) { echo "selected"; } ?>>Team jaune</option>
            <option value="4" <?php if ($player['team'] == 4) { echo "selected"; } ?>>Team orange</option>
            -->
        </select>

        <input type="email" name="email" placeholder="Votre email" value="<?php echo $player['mail']; ?>"/>

        <input type="text" name="zipcode" placeholder="Votre code postal" required pattern="\d{5}" value="<?php echo $player['zipcode']; ?>"/>

        <input type="submit" name="btn_register" />
    </form>
</body>
</html>


