<?php
session_start()
?>
<?php
include '../partials/conectionbdd.php';
include '../partials/timezone.php';
if (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) {


    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    $conn = connection();
    $sql = "SELECT roles FROM user WHERE username=$pseudo AND password=$password";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$pseudo, $password]);
    $conn = null;
    $donnees = $stmt->fetch();
    $_SESSION['pseudo']=$pseudo;
    $_SESSION['roles']=$donnees['roles'];
    header('Location: ../index.php');
} else {
    header('Location: ../page/login.php');
}
exit();
?>