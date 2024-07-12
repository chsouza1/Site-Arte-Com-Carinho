<?php
$servername = "localhost";
$username = "root";
$password = "#Runeterra.7894@!";
$dbname = "arte_com_carinho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
