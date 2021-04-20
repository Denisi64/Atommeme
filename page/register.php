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
<h1>Register</h1>
<br>
</div>
<div class="container-sm">
    <form>
        <div class="form-group">
            <label for="formGroupExampleInput">Pseudo</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
</div>



</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</html>


