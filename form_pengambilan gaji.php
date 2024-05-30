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
