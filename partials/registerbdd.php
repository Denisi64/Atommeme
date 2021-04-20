<?php
include '../partials/conectionbdd.php';
if (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) {


    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $sql = "INSERT INTO user (username, password) VALUES ('$pseudo', '$password')";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$pseudo, $password]);
    $conn = null;

    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../page/register.php');
    exit();
}
?>