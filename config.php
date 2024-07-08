<?php
$servername = "localhost";
$username = "arte_bd";
$password = "";
$dbname = "arte_com_carinho";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
