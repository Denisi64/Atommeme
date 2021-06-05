<?php
session_start()
?>
<?php
include '../partials/conectionbdd.php';
include '../partials/timezone.php';
if (isset($_POST["pseudo"]) && ($_POST["pseudo"] != "")) {
    $conn = connection();
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];
    checkUsername($conn, $pseudo);
    checkPassword($conn, $pseudo, $password);

    $connection = null;


    $sql = "SELECT user.id AS id, user.roles AS roles FROM user WHERE username='$pseudo' AND password='$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$pseudo, $password]);
    $donnees = $stmt->fetch();
    $_SESSION['id'] = $donnees->id;
    $_SESSION['roles'] = $donnees->roles;
    $_SESSION['pseudo']= $pseudo;

    header('Location: ../page/index.php');
} else {
    header('Location: ../page/login.php');
}
exit();
?>
<?php
function checkUsername($conn, $pseudo)
{
    $isIndatabase = false;
    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($donnees = $stmt->fetch()) {
        if ($pseudo == $donnees->username) {
            $isIndatabase = true;
        }
    }
    if (!$isIndatabase) {
        header('Location: ../page/login.php?err=1');
        exit();
    }
}

function checkPassword($conn, $pseudo, $password)
{
    $sql = "SELECT password FROM user WHERE username='$pseudo'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $donnees = $stmt->fetch();
    if ($password != $donnees->password) {
        header('Location: ../page/login.php?err=2');
        exit();
    }

}
?>