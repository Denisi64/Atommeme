<?php
session_start();
include '../partials/conectionbdd.php';
include '../partials/timezone.php';

if (isset($_POST["nom"]) && ($_POST["nom"] != "")) {
    $connection = connection();
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    checkImage();
    $date = date("Y-m-d H:i");
    $update = $date;
    $isDisabled = 0;
    $authorid = $_SESSION['id'];
    $categoryid = 1;
    createImage($connection, $nom , $description, $date, $isDisabled , $update, $authorid, $categoryid);

}


function checkImage()
{
    if(isset($_POST["image"]) && ($_POST["image"] != "")){
        $image = $_POST["image"];
        return $image;

    }
    else{
        $image = "img.jpg";
        return $image;

    }
}

function createImage($connection, $nom , $image, $description, $date, $isDisabled , $update, $authorid, $categoryid)
{

    $sql = "INSERT INTO meme (name, image, description, created_at, is_published, updated_at, author_id, category_id) VALUES ('$nom', '$image', '$description', '$date', '$isDisabled ', '$update', '$authorid', '$categoryid')";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$connection, $nom , $image, $description, $date, $isDisabled , $update, $authorid, $categoryid]);
}
exit();

?>
