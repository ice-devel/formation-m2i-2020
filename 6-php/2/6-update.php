<?php
    $id = filter_input(INPUT_GET, 'id');

    // si l'id n'a pas été passé en paramètre, on va considérer que cette page retourne une page d'erreur 404
    if ($id == null || $id == "") {
        header('HTTP/1.0 404 Not Found');
        exit;
    }

    // 1 - récupérateur le player concerné
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "SELECT * FROM player WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([':id' => $id]);
    // on peut récupérer uniquement le premier enregistrement grâce à fetch à la place de fetchAll
    $player = $statement->fetch(PDO::FETCH_ASSOC);

    if ($player == false) {
        $unknownPlayer = true;
    }

    // 2 - modifier le player

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
    ?>
    <form method="post">
        <input type="text" name="name" placeholder="Votre nom" required value="<?php echo $player['name']; ?>"/>

        <select name="team" required>
            <option></option>
            <option value="1" <?php if ($player['team'] == 1) { echo "selected"; } ?>>Team rouge</option>
            <option value="2" <?php if ($player['team'] == 2) { echo "selected"; } ?>>Team bleue</option>
            <option value="3" <?php if ($player['team'] == 3) { echo "selected"; } ?>>Team jaune</option>
            <option value="4" <?php if ($player['team'] == 4) { echo "selected"; } ?>>Team orange</option>
        </select>

        <input type="email" name="email" placeholder="Votre email" value="<?php echo $player['mail']; ?>"/>

        <input type="text" name="zipcode" placeholder="Votre code postal" required pattern="\d{5}" value="<?php echo $player['zipcode']; ?>"/>

        <input type="submit" name="btn_register" />
    </form>
</body>
</html>


