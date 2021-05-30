<?php


include '../partials/conectionbdd.php';
include '../partials/timezone.php';
$connection = connection();

if (isset($_POST["nom"]) && ($_POST["nom"] != "")) {
    $updated = date("Y-m-d H:i:s");
    $sql = "UPDATE meme SET (name, image, description, updated) VALUES ( :name, :image, :description, :updated)";

    $stmt = $connection->prepare($sql);

    $stmt->bindValue('name', $_POST["nom"], PDO::PARAM_STR);
    $stmt->bindValue('image', !empty($_FILES['image']['name']), PDO::PARAM_STR);
    $stmt->bindValue('description', $_POST["description"], PDO::PARAM_STR);
    $stmt->bindValue('updated', $updated, PDO::PARAM_STR);
    $stmt->execute();

    if (!empty($_FILES['image']['name'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../img/meme/' . $_FILES['image']['name'])) {
            header('Location: ../page/gestionimage.php');
        }
        echo '<h3>Une erreur a eu lieu lors de l\'upload</h3>';
    } else {
        header('Location: ../page/gestionimage.php');
    }
}
?>
