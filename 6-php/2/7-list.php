<?php
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "SELECT * FROM player";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();
    $players = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                        <td>".$player['id']."</td>
                        <td>".$player['name']."</td>
                        <td>".$player['team']."</td>
                        <td><a href='6-update.php?id=".$player['id']."'>Modifier</a></td>
                        <td><a href='8-delete.php?id=".$player['id']."'>Supprimer</a></td>
                       </tr>";
            }
        ?>
        </tbody>
    </table>

</body>
</html>


