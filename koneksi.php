<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
