<?php
session_start();
?>

<form action="../partials/edituser.php" method="POST">
    <div class="modal-body">
        <label>
            Nom:
            <input id="nom" value="<?= $meme->name ?>" type="text" name="nom" required>
        </label>
        <label>
            Description:
            <input id="description" value="<?= $meme->description ?>" type="text" name="description" required>
        </label>
        Image:
        <input type="file" class="form-control" id="image" placeholder="Image"
               name="image" accept=".jpg, .png, .gif, .jpeg">
    </div>
    <div class="modal-footer">
        <button type="submit" value="Edit" class="btn btn-primary">Oui</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
    </div>
</form>
