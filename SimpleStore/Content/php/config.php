<<<<<<< HEAD
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
=======
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
>>>>>>> 6f232493ba90ce9dca2a9c949e520de3e54e035e
