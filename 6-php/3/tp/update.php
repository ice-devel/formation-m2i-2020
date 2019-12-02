<?php
    $id = filter_input(INPUT_GET, 'id');

    // si l'id n'a pas été passé en paramètre, on va considérer que cette page retourne une page d'erreur 404
    if ($id == null || $id == "") {
        header('HTTP/1.0 404 Not Found');
        exit;
    }

    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "SELECT * FROM category";
    $statement = $pdo->query($sql);
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

    // formulaire soumis ?
    if (isset($_POST['btn_update'])) {
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
            $sql = "UPDATE product SET name=:n,description=:d,price=:p,
                    stock=:s,code=:c, category_id=:cat";

            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':n' => $name,
                ':d' => $description,
                ':p' => $price,
                ':s' => $stock,
                ':cat' => $category,
                ':c' => $code
            ]);
            $message = "Produit bien modifié";
        } else {
            $message = "Il y a des erreurs dans le formulaire";
        }
    }

    // 1 - récupérateur le produit concerné
    $sql = "SELECT * FROM product WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([':id' => $id]);
    // on peut récupérer uniquement le premier enregistrement grâce à fetch à la place de fetchAll
    $product = $statement->fetch(PDO::FETCH_ASSOC);

    // aucun produit ne correspond à cet id
    if ($product == false) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
    ?>

<h1>Modifier un produit</h1>
<?php
    if (isset($message)) {
        echo $message."<br>";

        foreach ($errors as $error) {
            echo $error."<br>";
        }
    }
?>
<form method="post">
    <input type="text" name="code" required pattern="[A-Z]{3}-\d{3}" placeholder="Code" value="<?php echo $product['code']; ?>"/>
    <input type="text" name="name" required placeholder="Nom du produit" value="<?php echo $product['name']; ?>"/>
    <textarea name="description" required placeholder="Description"><?php echo $product['description']; ?></textarea>
    <input type="number" name="price" pattern="\d{1,4}(,\d{1,2})?" required placeholder="Prix" step="0.01" value="<?php echo $product['price']; ?>"/>
    <input type="number" name="stock" pattern="\d{1,5}" max="65535" placeholder="stock" value="<?php echo $product['stock']; ?>"/>
    <select name="category" >
        <option>Sélectionner une catégorie</option>
        <?php
            foreach ($categories as $category) {
                $selected = $product['category_id'] == $category['id'] ? "selected" : "";

                echo "<option value='".$category['id']."' ".$selected.">".$category['name']."</option>";
            }
        ?>
    </select>

    <input type="submit" name="btn_update" />
</form>
