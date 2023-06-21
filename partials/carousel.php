<?php
include 'conectionbdd.php';

$connection = connection();
$sql = "SELECT meme.id AS id, meme.name AS name, meme.image FROM meme
        ORDER BY id DESC LIMIT 3";
$stmt = $connection->prepare($sql);
$stmt->execute();
$donnees = $stmt->fetchAll();
?>

<h5>Dernières images</h5>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($donnees); $i++) { ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
        <?php } ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($donnees as $key => $meme) { ?>
            <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
                <img class="d-block w-100" src="../img/meme/<?= $meme->image ?>" alt="<?= $meme->name ?>" style="max-height: 750px; object-fit: contain;">
            </div>
        <?php } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
