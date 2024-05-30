<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Lakukan validasi data (sama seperti sebelumnya)

    // Jika data valid, lakukan penyimpanan ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil. Redirect ke halaman login...";
        // Misalnya, redirect ke halaman login setelah registrasi berhasil
        // header("Location: login.php");
        // exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
