<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
<body>
<div class="container-fluid">
    <?php
    include '../partials/navbar.php';
    include '../partials/imgselect.php';

    $connection = connection();
    $sql = "SELECT meme.id AS id, meme.name AS name, meme.image FROM meme";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $donnees = $stmt->fetchAll();
    ?>
    <h1 class="m-3 mb-4">Images</h1>
    <div class="row">

        <?php foreach ($donnees as $meme): ?>
            <div class="col-sm-6 col-md-4 mb-3">
                <img src="../img/meme/<?= $meme->image ?>" alt="<?= $meme->name ?>" class="resize fluid img-thumbnail">
                <h4><?= $meme->name ?></h4>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</html>

