<?php
include("koneksi.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM penggajian WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Tampilkan informasi gaji
        echo "<h1>Bukti Gaji</h1>";
        echo "<p>ID: " . $row['id'] . "</p>";
        echo "<p>Nama: " . $row['nama'] . "</p>";
        echo "<p>Gaji Tetap: " . $row['gaji_tetap'] . "</p>";
        echo "<p>Lembur: " . $row['lembur'] . "</p>";
        echo "<p>Potongan: " . $row['potongan'] . "</p>";
        $jumlah_gaji = $row['gaji_tetap'] + $row['lembur'] - $row['potongan'];
        echo "<p>Jumlah Gaji: " . $jumlah_gaji . "</p>";

        // Tombol untuk mengunduh bukti gaji
        echo "<a href='download.php?id=" . $row['id'] . "' class='btn btn-primary'>Download</a>";
        // Tombol untuk kembali
        echo "<a href='riwayat_penggajian.php' class='btn btn-secondary'>Kembali</a>";
    } else {
        echo "Tidak ada data gaji.";
    }
} else {
    echo "ID tidak ditemukan.";
}

include("footer.php");
?>
