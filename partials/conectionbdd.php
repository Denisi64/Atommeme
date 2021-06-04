<?php
function connection()
{
    $servername = "localhost";
    $dns = "mysql:host=$servername;dbname=atommeme;charset=utf8";
    $username = "root";
    $password = "";
    $conn = null;
    $options = [ // remplace le setAttribute
        PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    try {
        $conn = new PDO($dns, $username, $password, $options);
        // set the PDO error mode to exception
    } catch (Exception $e) {
        echo 'Exception reçue : ', $e->getMessage(), "\n";
    }

    return $conn;
}

?>
