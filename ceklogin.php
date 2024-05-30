<?php
    include "koneksi.php";

    // Mendapatkan username dan password dari request POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Membuat statement yang dipersiapkan
    $stmt = $conn->prepare("SELECT * FROM tb_login WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Eksekusi statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah ada baris yang dikembalikan
    if ($result->num_rows == 0) {
        echo '<script language="javascript">
        alert("Username dan Password Salah! Silahkan Login Kembali."); document.location="login.php";</script>';
    } else {
        echo '<script language="javascript">
        alert("Anda berhasil Login!."); document.location="halaman.php";</script>';
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
?>
