<?php
    // vérifier si le formulaire a été soumis
    if (array_key_exists('btn_form_registration', $_GET)) {
        // récupérer les valeurs envoyées par le formulaire
        $name = filter_input(INPUT_GET, 'name');
        $birthday = filter_input(INPUT_GET, 'birthday');
        $email = filter_input(INPUT_GET, 'email');
        $zip = filter_input(INPUT_GET, 'zipcode');
        $phone = filter_input(INPUT_GET, 'phone');

        // vérifier que les données envoyées correspondent au format demandé
        if ($name == null || $name == ""  || preg_match("/.{3,}/", $name) != 1) {
            //echo "Le nom n'est pas correct";
            $error = true;
        }

        if ($birthday == null || $birthday == "" || preg_match("#\d{2}/\d{2}/\d{4}#", $birthday) != 1) {
            //echo "La date n'est pas correcte";
            $error = true;
        }

        if ($email == null || $email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //echo "L'email n'est pas correct";
            $error = true;
        }

        if ($zip != "" && preg_match("/\d{5}/", $zip) != 1) {
            //echo "Le code postal n'est pas correct";
            $error = true;
        }

        if ($phone != "" && preg_match("/0\d{9}/", $phone) != 1) {
            //echo "Le téléphone n'est pas correct";
            $error = true;
        }

        // si pas d'erreur
        if (!isset($error)) {
            // insertion en bdd du nouvel utilisateur

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
        <title>Correction TP PHP1</title>
    </head>

    <body>
        <h1>Correction TP PHP1</h1>

        <?php
            // Exercice 1
            $string = "1";
            $int = 1;
            $bool = true;

            if ($string == $int) {
                echo '"'.$string.'" est équivalent souple à '.$int."<br>";
            }

            if ($string === $int) {

            }
            else {
                echo '"'.$string.'" n\'est pas équivalent strict à '.$int."<br>";
            }

            // déclaration et initialisation en même temps d'un tableau
            $array = array($string, $int, $bool);
            $array = [$string, $int, $bool];

            // déclaration à vide
            $array = [];
            // initialisation de valeurs (push)
            $array[] = $string;
            $array[] = $int;
            $array[] = $bool;

            echo "<pre>";
            var_dump($array);
            echo "</pre>";

            foreach ($array as $value) {
                var_dump($value);
                echo "<br>";
            }

            for ($i=0;$i < count($array); $i++) {
                var_dump($array[$i]);
                echo "<br>";
            }

            // exercice 2
            function getNbMissingChars($chaine, $limit=100) {
                // v1
                $nbCaracteres = strlen($chaine);
                $nbCaracteresManquants = $limit - $nbCaracteres;

                if ($nbCaracteres >= $limit) {
                    return 0;
                }
                else {
                    return $nbCaracteresManquants;
                }

                // v2
                $nbCaracteresManquants = $limit - strlen($chaine);

                if ($nbCaracteres >= $limit) {
                    return 0;
                }
                else {
                    return $nbCaracteresManquants;
                }

                // v3
                $nbCaracteresManquants = $limit - strlen($chaine);
                return ($nbCaracteres >= $limit) ? 0 : $nbCaracteresManquants;

                // v4
                return ($nbCaracteres >= $limit) ? 0 : $limit - strlen($chaine);
            }

            echo "<br>";
            $testedString = "bonjour";

            // v1
            $nb = getNbMissingChars($testedString);
            echo $testedString." ".$nb."<br>";

            // v2
            echo $testedString." ";
            echo getNbMissingChars($testedString)."<br>";

            // v3
            echo $testedString." ".getNbMissingChars($testedString)."<br>";

            // avec une autre limite
            echo $testedString." ".getNbMissingChars($testedString, 150)."<br>";



        ?>

        <a href="?mot=coucou">Lien1</a>
        <a href="?mot=salut">Lien2</a>
        <a href="?mot=bonjour&mot2=momo">Lien3</a>

        <div style="margin-bottom:20px;border:1px solid;">
            <?php
            /*
             * Exercice 3
             */

            //if (array_key_exists("mot", $_GET)) {
            /*
                if (isset($_GET["mot"])) {
                    $mot = $_GET["mot"];
                    echo $mot;
                }

                if (isset($_GET["mot"]) && isset($_GET["mot2"])) {
                    $mot = $_GET["mot"];
                    $mot2 = $_GET['mot2'];
                    echo $mot2;
                }
            */

            if (isset($_GET["mot"]) && isset($_GET["mot2"])) {
                $mot = $_GET["mot"];
                $mot2 = $_GET['mot2'];
                echo $mot." ".$mot2;
            }
            elseif (isset($_GET["mot"])) {
                $mot = $_GET["mot"];
                echo $mot;
            }
            ?>
        </div>

        <h2>Formulaire exo 4</h2>
        <?php
            if (isset($error)) {
                echo "<p>Il y a une ou plusieurs erreurs dans le formulaire.";
            }
            else {
                echo "Vous êtes bien inscrit";

            }
        ?>
        <form>
            <input type="text" placeholder="Votre nom" name="name" required pattern=".{3,}"/>
            <input type="text" placeholder="Date de naissance" name="birthday" required pattern="\d{2}/\d{2}/\d{4}"/>
            <input type="email" placeholder="Votre email" name="email" required/>
            <input type="text" placeholder="Votre code" name="zipcode" pattern="[0-9](\d|A|B)\d{3}"/>
            <input type="text" placeholder="Votre téléphone" name="phone" pattern="0\d{9}"/>
            <input type="submit" value="Envoyer" name="btn_form_registration"/>
        </form>

    </body>
</html>