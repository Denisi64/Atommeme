<?php

$errlogin = "";
$errlogin2 = "";
if (isset($_GET['err'])) {
    if ($_GET['err'] == 1) {
        $errlogin = "<div class='error'>
 <p>Le pseudo n'est pas inscris</p>
</div>";
    }
    if ($_GET['err'] == 2) {
        $errlogin2 = "<div class='error'>
 <p>le mot de passe est incorrect</p>
</div>";
    }
}
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<body>
<div class="container-fluid">
    <?php
    include '../partials/navbar.php';
    ?>
    <br>
    <h1>Login</h1>
    <br>
</div>

<div class="container-sm">
    <form action="../partials/loginbdd.php" method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput">Pseudo*
                <?= $errlogin ?>
            </label>
            <input type="text" class="form-control" id="pseudo" placeholder="Pseudo" name="pseudo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe*</label>
            <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
        </div>
        <button type="submit" value="OK" class="btn btn-secondary">Submit</button>
    </form>
    <?= $errlogin2 ?>
</div>

<div class="container-fluid">
    <p>*: Champs obligatoires</p>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</html>





