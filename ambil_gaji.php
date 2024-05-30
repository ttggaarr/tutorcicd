
<!DOCTYPE html>
<html>
<head>
    <title>Pengambilan Gaji melalui E-Wallet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pengambilan Gaji melalui E-Wallet</h1>
        <form action="ambil_gaji.php" method="POST">
            <label for="id">ID Karyawan:</label>
            <input type="text" id="id" name="id" required><br>

            <label for="nama">Nama Karyawan:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="jumlah_gaji">Jumlah Gaji:</label>
            <input type="number" id="jumlah_gaji" name="jumlah_gaji" required><br>

            <label for="ewallet_number">Nomor E-Wallet:</label>
            <input type="text" id="ewallet_number" name="ewallet_number" required><br>

            <input type="submit" value="Ambil Gaji">
        </form>
    </div>
</body>
</html>

<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jumlah_gaji = $_POST['jumlah_gaji'];
    $ewallet_number = $_POST['ewallet_number'];

    // Panggil fungsi untuk mengambil gaji dari e-wallet
    $response = ambilDariEwallet($ewallet_number, $jumlah_gaji);

    if ($response['status'] == 'success') {
        // Simpan data pengambilan gaji ke database
        $sql = "INSERT INTO pengambilan_gaji (id_karyawan, nama_karyawan, jumlah_gaji, ewallet_number, status)
                VALUES ('$id', '$nama', '$jumlah_gaji', '$ewallet_number', 'Terkirim')";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='container'><p>Gaji berhasil diambil dari E-Wallet.</p></div>";
        } else {
            echo "<div class='container'><p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p></div>";
        }
    } else {
        echo "<div class='container'><p>Gagal mengambil gaji: " . $response['message'] . "</p></div>";
    }
}

// Fungsi untuk mengambil gaji dari e-wallet
function ambilDariEwallet($number, $amount) {
    // URL endpoint API e-wallet
    $url = 'https://api.ewallet.com/withdraw';

    // Data yang akan dikirim ke API
    $data = array(
        'ewallet_number' => $number,
        'amount' => $amount
    );

    // Inisialisasi cURL
    $ch = curl_init($url);

    // Set opsi cURL
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Eksekusi request dan tangkap respons
    $response = curl_exec($ch);

    // Tutup cURL
    curl_close($ch);

    // Mengembalikan hasil response
    return json_decode($response, true);
}
?>
