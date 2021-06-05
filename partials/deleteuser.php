<?php
session_start();
include '../partials/conectionbdd.php';
$connection = connection();
$userId = $_SESSION['id'];
$sql = "DELETE FROM user WHERE id= '$userId' ";
$stmt = $connection->prepare($sql);
$stmt->execute();
header('Location: ../page/index.php');
?>
