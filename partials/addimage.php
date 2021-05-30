<?php
session_start();
include '../partials/conectionbdd.php';
include '../partials/timezone.php';
$connection = connection();

if (isset($_POST["nom"]) && ($_POST["nom"] != "")) {
    $date = date("Y-m-d H:i:s");
    $updated = $date;
    $isDisabled = 0;
    $categoryid = 1;

    $sql = "INSERT INTO meme (name, image, description, created_at, is_published, updated, author_id, category_id)
      VALUES ( :name, :image, :description, :created, :isDisabled ,:updated, :authorid, :categoryid)";
    $stmt = $connection->prepare($sql);

//    var_dump('nom' .$_POST['nom']. '<br>');
//    var_dump('image' .$_FILES['image']['name']. '<br>');
//    var_dump('description' .$_POST["description"]. '<br>');
//    var_dump('date' .$date. '<br>');
//    var_dump('isDisabled' .$isDisabled. '<br>');
//    var_dump('updated' .$updated. '<br>');
//    var_dump('id' .$_SESSION['id']. '<br>');
//    var_dump('cat' .$categoryid. '<br>');
//    die();

    $stmt->bindValue('name', $_POST["nom"], PDO::PARAM_STR);
    $stmt->bindValue('image', !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : 'default.jpg', PDO::PARAM_STR);
    $stmt->bindValue('description', $_POST["description"], PDO::PARAM_STR);
    $stmt->bindValue('created', $date, PDO::PARAM_STR);
    $stmt->bindValue('isDisabled', $isDisabled, PDO::PARAM_BOOL);
    $stmt->bindValue('updated', $updated, PDO::PARAM_STR);
    $stmt->bindValue('authorid', $_SESSION['id'], PDO::PARAM_INT);
    $stmt->bindValue('categoryid', $categoryid, PDO::PARAM_INT);
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
