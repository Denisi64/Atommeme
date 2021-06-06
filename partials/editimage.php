<?php
session_start();
include '../partials/conectionbdd.php';
include '../partials/timezone.php';
$connection = connection();
if (isset($_POST["nom"]) && ($_POST["nom"] != "")) {
    if (!empty($_FILES['image']['name'])) {
        $updated = date("Y-m-d H:i:s");
        $sql = "UPDATE meme SET name = :name, image = :image, description = :description, updated = :updated WHERE id= :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue('id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue('name', $_POST["nom"], PDO::PARAM_STR);
        $stmt->bindValue('image', !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : 'default.jpg', PDO::PARAM_STR);
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
    } else {
        $updated = date("Y-m-d H:i:s");
        $sql = "UPDATE meme SET name = :name, description = :description, updated = :updated WHERE id= :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindValue('id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue('name', $_POST["nom"], PDO::PARAM_STR);
        $stmt->bindValue('description', $_POST["description"], PDO::PARAM_STR);
        $stmt->bindValue('updated', $updated, PDO::PARAM_STR);
        $stmt->execute();

        header('Location: ../page/gestionimage.php');
    }

}
?>
