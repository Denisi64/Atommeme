<?php
session_start();
if(isset($_SESSION["pseudo"])){
    $pseudoHtml = $_SESSION["pseudo"];
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../page/index.php">Atommeme</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../page/allimage.php">Image
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php
            if (isset($_SESSION['roles']) && $_SESSION['roles'] == 2) {
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false">Bonjour, 
                            <?= $pseudoHtml ?> 
                            </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../page/myaccount.php">Mon Compte</a>
                    <a class="dropdown-item" href="../partials/sessiondown.php">Déconexion</a>
                </div>
            </li>';

            } else {
                echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false">Connexion</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../page/register.php">Inscrivez vous</a>
                    <a class="dropdown-item" href="../page/login.php">Connectez vous</a>
                </div>
            </li>';
            }
            ?>

        </ul>
    </div>
</nav>
<?php
//if (session_status() == PHP_SESSION_NONE) {
//    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
//    <a class="navbar-brand" href="../index.php">Atommeme</a>
//    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
//            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
//        <span class="navbar-toggler-icon"></span>
//    </button>
//    <div class="collapse navbar-collapse" id="navbarColor02">
//        <ul class="navbar-nav mr-auto">
//            <li class="nav-item active">
//                <a class="nav-link" href="../page/allimage.php">Image
//                    <span class="sr-only">(current)</span>
//                </a>
//            </li>
//            <li class="nav-item dropdown">
//                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
//                   aria-expanded="false">Connexion</a>
//                <div class="dropdown-menu">
//                    <a class="dropdown-item" href="../page/register.php">Inscrivez vous</a>
//                    <a class="dropdown-item" href="../page/login.php">Connectez vous</a>
//                </div>
//            </li>
//        </ul>
//    </div>
//</nav>';
//} else {
//    if ($_SESSION['roles'] == 2) {
//        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
//    <a class="navbar-brand" href="../index.php">Atommeme</a>
//    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
//            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
//        <span class="navbar-toggler-icon"></span>
//    </button>
//    <div class="collapse navbar-collapse" id="navbarColor02">
//        <ul class="navbar-nav mr-auto">
//            <li class="nav-item active">
//                <a class="nav-link" href="../page/allimage.php">Image
//                    <span class="sr-only">(current)</span>
//                </a>
//            </li>
//            <li class="nav-item dropdown">
//                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
//                   aria-expanded="false">Bonjour</a>';
//        echo $_SESSION["pseudo"];
//        echo '<div class="dropdown-menu">
//                    <a class="dropdown-item" href="../page/register.php">Mon compte</a>
//                    <a class="dropdown-item" href="../page/login.php">Se deconecter</a>
//                </div>
//            </li>
//        </ul>
//    </div>
//</nav>';
//
//    } elseif ($_SESSION['roles'] == 1) {
//        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
//    <a class="navbar-brand" href="../index.php">Atommeme</a>
//    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
//            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
//        <span class="navbar-toggler-icon"></span>
//    </button>
//    <div class="collapse navbar-collapse" id="navbarColor02">
//        <ul class="navbar-nav mr-auto">
//            <li class="nav-item active">
//                <a class="nav-link" href="../page/allimage.php">Image
//                    <span class="sr-only">(current)</span>
//                </a>
//            </li>
//            <li class="nav-item dropdown">
//                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
//                   aria-expanded="false">Bonjour</a>';
//        echo $_SESSION["pseudo"];
//        echo '<div class="dropdown-menu">
//                    <a class="dropdown-item" href="../page/register.php">Mon compte</a>
//                    <a class="dropdown-item" href="../page/login.php">Se deconecter</a>
//                </div>
//            </li>
//        </ul>
//    </div>
//</nav>';
//    } elseif ($_SESSION['roles'] == 0) {
//        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
//    <a class="navbar-brand" href="../index.php">Atommeme</a>
//    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
//            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
//        <span class="navbar-toggler-icon"></span>
//    </button>
//    <div class="collapse navbar-collapse" id="navbarColor02">
//        <ul class="navbar-nav mr-auto">
//            <li class="nav-item active">
//                <a class="nav-link" href="../page/allimage.php">Image
//                    <span class="sr-only">(current)</span>
//                </a>
//            </li>
//            <li class="nav-item dropdown">
//                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
//                   aria-expanded="false">Bonjour</a>';
//        echo $_SESSION["pseudo"];
//        echo '<div class="dropdown-menu">
//                    <a class="dropdown-item" href="../page/register.php">Mon compte</a>
//                    <a class="dropdown-item" href="../page/login.php">Se deconecter</a>
//                </div>
//            </li>
//        </ul>
//    </div>
//</nav>';
//    }
//}

?>

