<?php
function connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = null;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=atommeme", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Exception reçue : ', $e->getMessage(), "\n";
    }

    return $conn;
}

?>
