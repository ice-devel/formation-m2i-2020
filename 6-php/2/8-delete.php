<?php
    $id = filter_input(INPUT_GET, 'id');

    // si l'id n'a pas été passé en paramètre, on va considérer que cette page retourne une page d'erreur 404
    if ($id == null || $id == "") {
        header('HTTP/1.0 404 Not Found');
        exit;
    }

    $pdo = new PDO("mysql:host=localhost;dbname=formation_m2i;charset=utf8", "root", "");
    $sql = "DELETE FROM player WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([':id' => $id]);

    // une fois qu'on a supprimé une entrée, on redirige vers la page listing
    header('Location: 7-list.php?userDeleted='.$id);
?>
