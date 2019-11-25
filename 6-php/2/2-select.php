<?php
    // 1ère connexion au serveur et choix de la base (et choix encodage)
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");

    /* récupérer les joueurs de la team 1 */
    $sql = "SELECT * FROM player P WHERE team = 1";
    $statement = $pdo->query($sql);
    $players = $statement->fetchAll(PDO::FETCH_ASSOC);

    /* récupérer le nombre de joueurs par équipe */
    $sql = "SELECT team, COUNT(id) AS nb_players FROM player GROUP BY team";
    $statement = $pdo->query($sql);
    $nbPlayersByTeam = $statement->fetchAll(PDO::FETCH_ASSOC);

    /*
     * récupérer les joueurs d'une team dynamique
     */
    $team = 1;
    $sql = "SELECT * FROM player P WHERE team = ".$team;
    $statement = $pdo->query($sql);
    $players2 = $statement->fetchAll(PDO::FETCH_ASSOC);

    /*
     * Exercice :
     * 1 - créer le formulaire avec deux champs : 1 pour l'équipe, 1 pour le nom
     * 2 - lorsque le formulaire est soumis, la page doit afficher les utilisateurs
     * correspondants à l'équipe choisi et au nom choisi
     * SELECT * FROM players
     * SELECT id FROM players WHERE team = ? AND name = ?
     * SELECT * FROM players WHERE team = ?
     */
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
    <h2>Liste des joueurs de la team 1</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Date de création</th>
            <th>Nom</th>
            <th>Team</th>
            <th>Points</th>
            <th>Mail</th>
            <th>CP</th>
            <th>Compte activé</th>
        </tr>
        <?php
        foreach ($players as $player) {
            echo "<tr>
                        <td>".$player['id']."</td>
                        <td>".$player['created_at']."</td>
                        <td>".$player['name']."</td>
                        <td>".$player['team']."</td>
                        <td>".$player['points']."</td>
                        <td>".$player['mail']."</td>
                        <td>".$player['zipcode']."</td>
                        <td>".$player['is_enabled']."</td>
                      </tr>";
        }
        ?>
    </table>

    <h2>Liste des joueurs de la team 1</h2>
    <table>
        <tr>
            <th>Team</th>
            <th>Nombre de joueurs</th>
        </tr>
        <?php
            foreach ($nbPlayersByTeam as $nb) {
                echo "<tr>
                        <td>".$nb['team']."</td>
                        <td>".$nb['nb_players']."</td>
                    </tr>";
            }
        ?>
    </table>
</body>
</html>


