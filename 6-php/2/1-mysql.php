<?php
    /*
    // old version : on n'utilise plus
    // 1ère étape : connexion au serveur bdd
    mysql_connect("localhost", "root", "");
    // 2éme étape : choix de la bdd
    mysql_select_db("formation_m2i");
    // 3éme étape : envoi des requêtes sql
    $sql = "SELECT * FROM player";
    $result = mysql_query($sql);
    */

    /*
     * v2 version intermédiaire
     */
    // 1ère : connexion au serveur et choix de la bdd / et config utf8
    $bdd = mysqli_connect("localhost", "root", "", "formation_m2i");
    mysqli_set_charset($bdd, "utf8");

    // 2éme : envoi de la requête sql
    $sql = "SELECT * FROM player";
    $result = mysqli_query($bdd, $sql);

    // 3ème : récupérer les enregistrements pour les mettre dans un tableau associatif/numérique
    // numérique
    //$players = mysqli_fetch_all($result);
    // associatif
    $players = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // 4éme étape : faire ce qu'on veut de ces players

    /*
     * V3 : PDO - PHP Data Object
     */
    // 1ère connexion au serveur et choix de la base (et choix encodage)
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");
    // 2: envoi d'une requete
    $sql = "SELECT * FROM player";
    $statement = $pdo->query($sql);

    // 3ème : récupérer les enregistrements pour les mettre dans un tableau associatif/numérique
    $players = $statement->fetchAll(PDO::FETCH_ASSOC);


    /*
     * CRUD en SQL
     */
    /*
     * SELECT * FROM table (WHERE ...)
     * GROUP BY (HAVING )
     * ORDER BY
     * LIMIT
     *
     */
    /*
     * INSERT INTO table (champ1, champ2) VALUES ('valeur1', 'valeur2')
     */

    /*
     * UPDATE table SET champ1 = 'nouvelle valeur', champ2 = 'nouvelle valeur 2'
     * (WHERE ...)
     */

    /*
     * DELETE FROM table (WHERE ...)
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
    <table>
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
</body>
</html>


