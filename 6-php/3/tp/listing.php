<?php
    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "SELECT * FROM product";
    $statement = $pdo->query($sql);
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Liste des produits</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Date de création</th>
            <th>Code</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Catégorie</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
            foreach ($products as $product) {

                echo "<tr>
                        <td>".$product['id']."</td>
                        <td>".$product['created_at']."</td>
                        <td>".$product['code']."</td>
                        <td>".$product['name']."</td>
                        <td>".str_replace(".", ",", $product['price'])."€</td>
                        <td>".$product['stock']."</td>
                        <td>".$product['category_id']."</td>
                        <td><a href='update.php?id=".$product['id']."' >Modifier</a></td>
                        <td>
                            <a href='delete.php?id=".$product['id']."' onclick=\"return confirm('Tu veux vraiment supprimer ce produit ?');\"
                            >Supprimer</a>
                        </td>
                    </tr>";
            }
        ?>
    </table>
</body>
</html>
