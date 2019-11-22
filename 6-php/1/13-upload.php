<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Upload</title>
    </head>

    <body>
        <h1>Upload d'un fichier avec un formulaire</h1>

        <?php
            // formulaire soumis ?
            if (isset($_POST['btn_upload'])) {
                /*
                echo "<pre>";
                var_dump($_FILES);
                echo "</pre>";
                */

                // on a besoin de la variable superglobale $_FILES pour gérer les fichiers uploadés en PHP
                // tmp_name contient le chemin sur le serveur du fichier temporaire
                $tmpFile = $_FILES['cv']['tmp_name'];

                // déplacer le fichier vers un dossier de notre site
                move_uploaded_file($tmpFile, "test.png");
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="cv"/>
            <input type="submit" name="btn_upload"/>
        </form>

        <h2>Exercice</h2>
        <p>
            Créer un formulaire avec deux champs :<br>
            Un champ pour le nom, et une liste déroulante pour le pays
            Le formulaire doit être soumis en POST.<br>
            Quand on recharge la page, les champ doivent reprendre les valeurs envoyées
            de la page précédente :<br>
            si "toto" avait été saisi dans le champ nom, il faut par défaut afficher "toto" dans
            ce champ au rechargement de la page.
        </p>
    </body>
</html>