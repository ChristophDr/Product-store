<?php

$servername = 'mysql:dbname=store;host=127.0.0.1';
$username = "root";
$password = "";


try {
    $conn = new PDO($servername, $username, $password);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
?>
