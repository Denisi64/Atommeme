<?php

if(isset($_POST["pseudo"]) && ($_POST["pseudo"] !="")) {
    $_POST["pseudo"];
    echo "<p>Bonjour !</p>";

echo "<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles !";
    echo $_POST['pseudo'];
    echo "</p>";
}
else{
    echo "<p> Tu n'as pas de pseudo :p</p>";
}
?>



