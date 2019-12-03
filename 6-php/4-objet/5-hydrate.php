<?php
 /*
  * Hydratation : récupérer des valeurs en bdd pour créer les objets dans le code
  */
    function loadModel($className) {
        $filename = 'model/'.$className.".php";
        if (file_exists($filename)) {
            require $filename;
        }
    }

    spl_autoload_register('loadModel');

    /* version intermédiaire : on ne profite encore totalement de la POO
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");
    $sql = "SELECT * FROM player WHERE id = 2";
    $statement = $pdo->query($sql);
    $playerTab = $statement->fetch(PDO::FETCH_ASSOC);
    if ($playerTab != false) {
        // $player = new Player($playerTab['id'], $playerTab['created_at'],  $playerTab['name'],
        $playerTab['team'], $playerTab['points'], $playerTab['mail'], $playerTab['zipcode'],
            $playerTab['is_enabled']);

        $player = new Player();
        $player->hydrate($playerTab);

        echo "<pre>";
        var_dump($player);
        echo "</pre>";
    }
    */

    /*
     * Quand tout est objet, le code "controller" est plus propre, compréhensible, ne contenant que le principal
     * Controller "thin"
     */
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=UTF8", "root", "");
    $playerManager = new PlayerManager($pdo);
    $player = $playerManager->find(3);


    /* sélectionner tous les players :
    players est un array
    dont chaque élément est une instance de Player
    */
    $players = $playerManager->findAll();

    /*
     * Insérer un player
     */
    // formulaire soumis ?
    if (isset($_POST['btn_register'])) {
        // récupérer les valeurs
        $name = filter_input(INPUT_POST, 'name');
        $team = filter_input(INPUT_POST, 'team');
        $email = filter_input(INPUT_POST, 'email');
        $zipcode = filter_input(INPUT_POST, 'zipcode');

        // vérifier si les valeurs sont ok
        $errors = [];
        if ($name == null || $name == "") {
            $errors[] = "Veuillez saisir un nom";
        }

        if ($team == null || $team == "") {
            $errors[] = "Veuillez choisir une équipe";
        }

        if ($email == null || ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = "Veuillez saisir une adresse correcte";
        }

        if (!preg_match("@\d{5}@", $zipcode)) {
            $errors[] = "Veuillez saisir une code postal valide";
        }

        if (count($errors) == 0) {
            // pas d'erreur : insert into
            // utilisation du manager pour enregistrer le player

            // on instancie un player et lui sette les valeurs récupérées du form
            $playerToInsert = new Player();
            $playerToInsert->setName($name);
            $playerToInsert->setTeam($team);
            $playerToInsert->setZipcode($zipcode);
            $playerToInsert->setMail($email);

            // on passe l'objet player au playerManager pour qu'il l'enregistre
            $result = $playerManager->insert($playerToInsert);
        }
    }

    /**
     * Exercice : Gérer en objet les intéractions avec la bdd
     * pour l'entité Utilisateur : create/read one/read all
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
            border:1px solid purple;
        }
    </style>
</head>
<body>
    <h1>Objet / BDD</h1>
    <h2>Récupérer un player</h2>
    Nom du joueur 3 : <?php echo $player->getName(); ?>

    <h2>Récupérer tous les players</h2>
    <table>
        <?php
            foreach ($players as $p) {
                echo "<tr>
                        <td>".$p->getId()."</td>
                        <td>".$p->getName()."</td>
                        <td>".$p->getPoints()."</td>
                    </tr>";
            }
        ?>
    </table>

    <h2>Ajouter un player</h2>

    <?php
        // afficher un message de validation ou d'erreur
        if (isset($result)) {
            if ($result) {
                echo "Player bien enregistré";
            }
            else {
                echo "Erreur lors de l'enregistrement";
            }
        }

    ?>
    <form method="post">
        <input type="text" name="name" placeholder="Votre nom" required/>

        <select name="team" required>
            <option></option>
            <option value="1">Team rouge</option>
            <option value="2">Team bleue</option>
            <option value="3">Team jaune</option>
            <option value="4">Team orange</option>
        </select>

        <input type="email" name="email" placeholder="Votre email" />

        <input type="text" name="zipcode" placeholder="Votre code postal" required pattern="\d{5}"/>

        <input type="submit" name="btn_register" />
    </form>
</body>
</html>
