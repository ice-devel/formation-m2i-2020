<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Exo html php</title>
    </head>

    <body>
        <?php
            /*
             * Créer une page web html (doctype, html, head, body)
             * Dans le body vous ouvrez la balise php, vous déclarez et initialiser un array avec 5 valeurs
             * Ensuite, vous affichez les valeurs de cet array dans un table html, une valeur = une cellule/ligne
             *
             * Faire un deuxième array php : chaque élément de cet array et lui-même un array :
             * $users qui contient des tableaux ['toto', '59000', '0666666666']
             * Afficher dans un table html un user par ligne, avec donc trois cellules par ligne
             *
             */
        ?>

        <table>
        <?php
            $villes = ["Lille", "Calais", "Dunkerque", "Valenciennes", "Wattignies", "Loos"];
            foreach ($villes as $value) {
                echo "<tr><td>".$value."</td></tr>";
            }
        ?>
        </table>

        <?php
            // créer un tableau d'utilisateurs
            $users = [];
            // ajouter des utilisateurs dans ce tableau : chaque utilisateur est lui-même un tableau
            $users[] = ['nom' => 'toto', 'cp' => "59000", 'tel' => "0666666666"];
            $users[] = ['nom' => 'greg', 'cp' => "62000", 'tel' => "0666666667"];
        ?>

        <table>
            <?php
                // on affiche les utilisateurs un par un
                foreach ($users as $user) {
                    // chaque utilisateur étant un tableau associatif, on récupère chaque clé pour chaque user
                    echo "<tr>
                            <td>".$user['nom']."</td>
                            <td>".$user['cp']."</td>
                            <td>".$user['tel']."</td>
                          </tr>";
                }
            ?>
        </table>

        <?php
            // on a un tableau de users
            $users = [];
            // ajouter des utilisateurs dans ce tableau : chaque utilisateur est lui-même un tableau
            $users[] = ['nom' => 'toto', 'birthday' => "1990"];
            $users[] = ['nom' => 'jean', 'birthday' => "1986"];

            //afficher avec php ces users dans un table html
            // dans le tableau, les deuxièmes cellules de chaque ligne ne doivent pas afficher l'année de naissance
            // mais l'âge du user
            // Pour ça vous allez utiliser une fonction getAge, qui retourne un âge grâce à une année de naissance
            // passée en paramètre

            // créer la fonction
            // parcourir le tableau users pour afficher le nom et l'age
            // utiliser cette fonction pour déterminer l'âge de chaque user grâce à son année de naissance
        ?>

    </body>
</html>