<?php 
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_karyawan = isset($_POST["id_karyawan"]) ? $_POST["id_karyawan"] : "";
    $gaji_tetap = isset($_POST["gaji_tetap"]) ? $_POST["gaji_tetap"] : "";
    $lembur = isset($_POST["lembur"]) ? $_POST["lembur"] : "";
    $potongan = isset($_POST["potongan"]) ? $_POST["potongan"] : "";

    $sql = "INSERT INTO penggajian (id_karyawan, gaji_tetap, lembur, potongan) VALUES ('$id_karyawan', '$gaji_tetap', '$lembur', '$potongan')";
    if (mysqli_query($conn, $sql)) {
        header("Location: riwayat_penggajian.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head content -->
</head>

<body class="container">
    <header>
        <!-- header content -->
    </header>
    <main>
        <h1>Tambah Penggajian</h1>
        <form method="post">
            <div class="mb-3">
                <label for="id_karyawan" class="form-label">ID Karyawan</label>
                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="gaji_tetap" class="form-label">Gaji Tetap</label>
                <input type="number" class="form-control" id="gaji_tetap" name="gaji_tetap" required>
            </div>
            <div class="mb-3">
                <label for="lembur" class="form-label">Lembur</label>
                <input type="number" class="form-control" id="lembur" name="lembur" required>
            </div>
            <div class="mb-3">
                <label for="potongan" class="form-label">Potongan</label>
                <input type="number" class="form-control" id="potongan" name="potongan" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <footer class="text-center mt-4">
        <p>&copy; 2024 Pengajian Karyawan. All Rights Reserved.</p>
    </footer>
</body>

</html>
