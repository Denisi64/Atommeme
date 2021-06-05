<?php

$errlogin = "";
$errlogin2 = "";
if (isset($_GET['err'])) {
    if ($_GET['err'] == 1) {
        $errlogin = "<div class='error'>
 <p>Le pseudo est déja pris</p>
</div>";
    }
    if ($_GET['err'] == 2) {
        $errlogin2 = "<div class='error'>
 <p>le mot de passe n'est pas pareil dans les deux champs</p>
</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<div class="container-fluid">
    <?php
    include '../partials/navbar.php'
    ?>
</div>
<div class="container-sm">
    <form action="../partials/edituser.php" method="POST">
        <div class="form-group">
            <label for="pseudo">Pseudo*
                <?= $errlogin ?>
            </label>
            <input type="text" class="form-control" id="pseudo" value="<?=$_SESSION['pseudo']?>" placeholder="Pseudo" name="pseudo" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe*</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmer le mot de passe*
            </label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"
                   name="confirmPassword" required>
        </div>
        <button type="submit" value="OK" class="btn btn-secondary">Sauvegarder les modifications</button>
    </form>
</div>
