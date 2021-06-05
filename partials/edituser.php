<?php
session_start();
include '../partials/conectionbdd.php';
include '../partials/timezone.php';

$connection = connection();

if (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) {

    $pseudo = $_POST["pseudo"];
    checkUsername($connection,  $pseudo);
    checkPassword();
    $id = $_SESSION['id'];
    $updated = date("Y-m-d H:i:s");
    $sql = "UPDATE user SET username = :username, password = :password, updated_at = :updated WHERE id= :id";
    $stmt = $connection->prepare($sql);


    $stmt->bindValue('id', $_SESSION['id'], PDO::PARAM_INT);
    $stmt->bindValue('username', $_POST["pseudo"], PDO::PARAM_STR);
    $stmt->bindValue('password', $_POST["password"], PDO::PARAM_STR);
    $stmt->bindValue('updated', $updated, PDO::PARAM_STR);
    $stmt->execute();
    session_destroy();
    header('Location: ../page/login.php?suc=1');




}

function checkUsername($connection, $pseudo)
{
    $sql = "SELECT user.username AS username FROM user";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    while ($donnees = $stmt->fetch()) {
        if ($pseudo == $donnees->username) {
            header('Location: ../page/myaccount.php?err=1');
            exit();
        }
    }

}
function checkPassword()
{
    if ($_POST["password"] != $_POST["confirmPassword"]) {
        header('Location: ../page/myaccount.php?err=2');
        exit();
    }
}
?>