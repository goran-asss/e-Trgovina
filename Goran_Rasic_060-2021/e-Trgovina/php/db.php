<?php
// Podaci za povezivanje sa bazom
$servername = "localhost";
$username = "root";
$password = "";
$database = "e-trgovina";

// Povezivanje sa bazom
$conn = new mysqli($servername, $username, $password, $database);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška prilikom povezivanja sa bazom: " . $conn->connect_error);
}
?>
