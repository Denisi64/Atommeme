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
<link rel="stylesheet" href="../css/icofont.min.css">
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
    <button type="button" class="btn btn-danger" data-toggle="modal"
            data-target="#modalDelete">
        <i class="icofont-trash"></i> Supprimer le compte
    </button>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez vous vraiment supprimer le compte.</p>
            </div>
            <div class="modal-footer">
                <a href="../partials/deleteuser.php">Oui</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>