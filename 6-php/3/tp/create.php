<?php
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "SELECT * FROM category";
    $statement = $pdo->query($sql);
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

    // formulaire soumis ?
    if (isset($_POST['btn_create'])) {
        // récupérer les données envoyées depuis le formulaire
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description');
        $price = filter_input(INPUT_POST, 'price');
        $stock = filter_input(INPUT_POST, 'stock');
        $category = filter_input(INPUT_POST, 'category');

        // vérifier si les valeurs sont correctes
        $errors = [];
        //if ($code == null || $code == "" || preg_match("/[A-Z]{3}-\d{3}/", $code)) {
        if (!preg_match("/[A-Z]{3}-\d{3}/", $code)) {
            $errors[] = "Le code produit n'est pas valide";
        }

        if ($name == "") {
            $errors[] = "Le nom du produit est obligatoire";
        }

        if ($description == "") {
            $errors[] = "La description est obligatoire";
        }

        if (!preg_match("/\d{1,4}(,\d{1,2})?/", $price)) {
            $errors[] = "Le prix n'est pas valide";
        }

        if ($stock != "" && !preg_match("/\d{1,5}/", $stock)) {
            $errors[] = "Le stock n'est pas valide";
        }

        $categoriesIds = array_column($categories, "id");
        if (!in_array($category, $categoriesIds)) {
            $errors[] = "La catégorie n'est pas valide";
        }

        if (count($errors) == 0) {
            // enregistrement en bdd
            $sql = "INSERT INTO product(name,description,price,stock,code,category_id,created_at)
                    VALUES (:n, :d, :p, :s, :c, :cat, :created)";

            $createdAt = date("Y-m-d H:i:s");

            $statement = $pdo->prepare($sql);
            $statement->execute([
                    ':n' => $name,
                    ':d' => $description,
                    ':p' => $price,
                    ':s' => $stock,
                    ':cat' => $category,
                    ':c' => $code,
                    ':created' => $createdAt,
            ]);
            $message = "Produit bien enregistré";
        }
        else {
            $message = "Il y a des erreurs dans le formulaire";
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
    <title>Document</title>
</head>
<body>
    <h1>Ajout de produit</h1>

    <?php
        if (isset($message)) {
            echo $message."<br>";

            foreach ($errors as $error) {
                echo $error."<br>";
            }
        }
    ?>
    <form method="post">
        <input type="text" name="code" required pattern="[A-Z]{3}-\d{3}" placeholder="Code"/>
        <input type="text" name="name" required placeholder="Nom du produit"/>
        <textarea name="description" required placeholder="Description"></textarea>
        <input type="number" name="price" pattern="\d{1,4}(,\d{1,2})?" required placeholder="Prix" step="0.01"/>
        <input type="number" name="stock" pattern="\d{1,5}" max="65535" placeholder="stock" />
        <select name="category" >
            <option>Sélectionner une catégorie</option>
            <?php
                foreach ($categories as $category) {
                    echo "<option value='".$category['id']."'>".$category['name']."</option>";
                }
            ?>
        </select>

        <input type="submit" name="btn_create" />
    </form>
</body>
</html>