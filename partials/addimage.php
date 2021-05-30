<?php
session_start();
include '../partials/conectionbdd.php';
include '../partials/timezone.php';

if (isset($_POST["nom"]) && ($_POST["nom"] != "")) {
    $connection = connection();
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $image = checkImage();
    $date = date("Y-m-d H:i");
    $update = $date;
    $isDisabled = 0;
    $authorid = $_SESSION['id'];
    $categoryid = 1;
    createImage($connection, $nom , $image, $description, $date, $isDisabled , $update, $authorid, $categoryid);
    header('Location: ../page/gestionimage.php');

}


function checkImage()
{
    if(isset($_POST["image"]) && ($_POST["image"] != "")){
        $image = $_POST["image"];
        return $image;

    }
    else{
        $image = "imh.jpg";
        return $image;

    }
}

function createImage($connection, $nom , $image, $description, $date, $isDisabled , $update, $authorid, $categoryid)
{

    $sql = "INSERT INTO meme (name, image, description, created_at, is_published, updated, author_id, category_id) VALUES ('$nom', '$image', '$description', '$date', '$isDisabled ', '$update', '$authorid', '$categoryid')";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$nom , $image, $description, $date, $isDisabled , $update, $authorid, $categoryid]);
}
exit();

?>
