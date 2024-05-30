<?php 
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $posisi = $_POST["posisi"];
    $gaji = $_POST["gaji"];

    $sql = "INSERT INTO karyawan (nama, posisi, gaji) VALUES ('$nama', '$posisi', '$gaji')";
    if (mysqli_query($conn, $sql)) {
        header("Location: karyawan.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Pengajian Karyawan</a>
                <!-- Navbar content -->
            </div>
        </nav>
    </header>
    <main>
        <h1>Add Karyawan</h1>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" required>
            </div>
            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control" id="gaji" name="gaji" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <footer class="text-center mt-4">
        <p>&copy; 2024 Pengajian Karyawan. All Rights Reserved.</p>
    </footer>
</body>

</html>
