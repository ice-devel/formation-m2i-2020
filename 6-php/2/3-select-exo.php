<?php
    /*
     * Exercice :
     * 1 - créer le formulaire avec deux champs : 1 pour l'équipe, 1 pour le nom
     * 2 - lorsque le formulaire est soumis, la page doit afficher les utilisateurs
     * correspondants à l'équipe choisie et au nom choisi
     * SELECT * FROM players
     * SELECT id FROM players WHERE team = ? AND name = ?
     * SELECT * FROM players WHERE team = ?
     */

    $players = [];
    if (isset($_GET['btn_player'])) {
        // v1
        /*
        $team = filter_input(INPUT_GET, 'team');
        $name = filter_input(INPUT_GET, 'name');
        $name = str_replace("'", "\'", $name);

        $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");

        $sql = "SELECT * FROM player";
        if ($team != "" && $name != "") {
            $sql = $sql." WHERE team = ".$team." AND name = '".$name."'";
        }
        elseif ($team != "") {
            $sql = $sql." WHERE team = ".$team;
        }
        else if ($name != "") {
            $sql = $sql." WHERE name = '".$name."'";
        }
        else {
            //$sql = $sql."";
        }

        $statement = $pdo->query($sql);
        $players = $statement->fetchAll(PDO::FETCH_ASSOC);
        */

        // v2
        $team = filter_input(INPUT_GET, 'team');
        $name = filter_input(INPUT_GET, 'name');

        $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");

        // se protéger des attaques, notamment injections sql
        $sql = "SELECT * FROM player";
        if ($team != "" && $name != "") {
            $sql = $sql." WHERE team = :team AND name = :name";
        }
        elseif ($team != "") {
            $sql = $sql." WHERE team = :team";
        }
        else if ($name != "") {
            $sql = $sql." WHERE name = :name";
        }
        else {
            //$sql = $sql."";
        }

        $statement = $pdo->prepare($sql);

        // lier les valeurs aux paramètres en les protégeant
        if ($team != "" && $name != "") {
            $statement->bindParam(":team", $team);
            $statement->bindParam(":name", $name);
        }
        elseif ($team != "") {
            $statement->bindParam(":team", $team);
        }
        else if ($name != "") {
            $statement->bindParam(":name", $name);
        }

        $statement->execute();
        $players = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <form action="" method="get">
        <select name="team">
            <option></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>

        <input type="text" name="name" placeholder="Nom du joueur"/>

        <input type="submit" name="btn_player" />
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Team</th>
        </tr>
        <?php
            foreach ($players as $player) {
                echo "<tr>
                     <td>".$player['id']."</td>   
                     <td>".$player['name']."</td>   
                     <td>".$player['team']."</td>   
                  </tr>";
            }
        ?>
    </table>
</body>
</html>


