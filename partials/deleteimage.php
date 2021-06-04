<?php
include '../partials/conectionbdd.php';
$connection = connection();
$memeId = $_GET['memeId'];
$sql = "DELETE FROM meme WHERE id= '$memeId' ";
$stmt = $connection->prepare($sql);
$stmt->execute();
header('Location: ../page/gestionimage.php');
?>