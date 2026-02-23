<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bd_aej";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>