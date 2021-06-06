<?php
include '../partials/conectionbdd.php';
include '../partials/timezone.php';

if (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) {
    $connection = connection();
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $role = 2;
    $img = 'default.png';
    $date = date("Y-m-d H:i");
    $update = $date;
    $isDisabled = 0;

    checkUsername($connection);
    checkPassword();
    createUser($connection,$pseudo,$password,$role,$img,$date,$update,$isDisabled);

    $connection = null;

    header('Location: ../page/index.php');
} else {
    header('Location: ../page/register.php?err=2');
}

function checkUsername($connection)
{
    $sql = "SELECT user.username AS username FROM user";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    while ($donnees = $stmt->fetch()) {
        if ($_POST["pseudo"] == $donnees->username) {
            header('Location: ../page/register.php?err=1');
            exit();
        }
    }
}

function  checkPassword()
{
    if ($_POST["password"] != $_POST["confirmPassword"]) {
        header('Location: ../page/register.php?err=2');
        exit();
    }

}

function createUser($connection,$pseudo,$password,$role,$img,$date,$update,$isDisabled)
{

    $sql = "INSERT INTO user (username, password, roles, image, created_at, updated_at, is_disabled) VALUES ('$pseudo', '$password', '$role', '$img', '$date', '$update', '$isDisabled')";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$pseudo, $password]);
}
exit();
?>