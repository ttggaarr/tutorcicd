<?php 
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container">
    <main>
        <h1>Detail Karyawan</h1>
        <a href="add_karyawan.php" class="btn btn-primary mb-3">Add Karyawan</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Gaji</th>
                    <th class="col-2">Lainnya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM karyawan";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['posisi'] . "</td>";
                            echo "<td>" . $row['gaji'] . "</td>";
                            echo "<td>";
                            echo "<a href='ambil_gaji.php?id=" . $row['id'] . "' class='btn btn-secondary btn-sm'>Pengambilan Gaji</a>";
                            echo "<a href='tambah_penggajian.php?id=" . $row['id'] . "' class='btn btn-secondary btn-sm'>Tambah Penggajian</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Error: " . mysqli_error($conn) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer class="text-center mt-4">
        <p>&copy; 2024 Pengajian Karyawan. All Rights Reserved.</p>
    </footer>
</body>
</html>
