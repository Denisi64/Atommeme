<?php
include '../partials/conectionbdd.php';
include '../partials/timezone.php';

if (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) {

    $conn = connection();
    $sql = "SELECT username FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($donnees = $stmt->fetch()) {
        if ($_POST["pseudo"] == $donnees['username']) {
            header('Location: ../page/register.php');
            exit();
        }
    }
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $role = 2;
    $img = 'default.png';
    $date = date("Y-m-d H:i");
    $update = $date;
    $isDisabled = 0;
    $sql = "INSERT INTO user (username, password, roles, image, created_at, updated_at, is_disabled) VALUES ('$pseudo', '$password', '$role', '$img', '$date', '$update', '$isDisabled')";
    $conn = connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$pseudo, $password]);
    $conn = null;

    header('Location: ../index.php');
} else {
    header('Location: ../page/register.php');
}
exit();
?>