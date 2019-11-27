<?php
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "SELECT * FROM player P JOIN team T ON P.team = T.id";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();
    $players = $statement->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
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
    <h2>Liste des players</h2>

    <?php
        if (array_key_exists('userDeleted', $_GET)) {
            $idDeleted = filter_input(INPUT_GET, 'userDeleted');

            echo "L'utilisateur ".$idDeleted." a bien été supprimé<br>";
        }
    ?>

    <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Equipe</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        <?php
            foreach ($players as $player) {
                echo "<tr>
                        <td>".$player[0]."</td>
                        <td>".$player[2]."</td>
                        <td>".$player[10]."</td>
                        <td><a href='6-update.php?id=".$player[0]."'>Modifier</a></td>
                        <td><a href='8-delete.php?id=".$player[0]."' onclick=\"return confirm('Tu veux vraiment supprimer ce joueur ?');\">Supprimer</a></td>
                       </tr>";
            }
        ?>
        </tbody>
    </table>

</body>
</html>


