<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../css/icofont.min.css">
<body>
<div class="container-fluid">
    <?php
    include '../partials/navbar.php';
    include '../partials/imgselect.php';
    $connection = connection();
    $sql = "SELECT meme.id AS id, meme.name AS name, meme.image AS image, meme.description AS description,meme.created_at AS created, meme.is_published AS published, meme.updated AS updated, category.name AS nomCat, user.username AS pseudo
    FROM meme
    LEFT JOIN category
        ON category.id = meme.category_id
    LEFT JOIN user 
        ON user.id = meme.author_id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $donnees = $stmt->fetchAll();
    ?>

    <h1>Gestionaire d'images</h1>
    <table class="table table-hover" id="table_id">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Description</th>
            <th>Is published</th>
            <th>Created at</th>
            <th>Mise à jour le</th>
            <th>Categorie</th>
            <th>Auteur</th>
            <th>Fonction</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($donnees as $meme): ?>
            <tr>
                <td><?= $meme->id ?></td>
                <td><?= $meme->name ?></td>
                <td><img src="../img/meme/<?= $meme->image ?>" alt="<?= $meme->name ?>"></td>
                <td><?= $meme->description ?></td>
                <td><?= $meme->published ?></td>
                <td><?= $meme->created ?></td>
                <td><?= $meme->updated ?></td>
                <td><?= $meme->nomCat ?></td>
                <td><?= $meme->pseudo ?></td>
                <td>
                    <button type="button" class="btn btn-dark"><i class="icofont-pencil"></i></button>
                    <button type="button" class="btn btn-danger"><i class="icofont-trash"></i></button>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
        <i class="icofont-ui-image"></i> Ajouter une image
    </button>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../partials/addimage.php" method="POST">
                    <div class="form-group">
                        <label for="pseudo">Nom :
                        </label>
                        <input type="text" class="form-control" id="pseudo" placeholder="Nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Description :</label>
                        <input type="text" class="form-control" id="description" placeholder="Description"
                               name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Image :
                        </label>
                        <input type="file" class="form-control" id="image" placeholder="Image"
                               name="confirmPassword" required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>


</html>

