<?php
include("header.php");
include("koneksi.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM penggajian WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Tampilkan informasi gaji
        echo "<div class='detail-container'>";
        echo "<h1>Detail Gaji</h1>";
        echo "<div class='salary-detail'><span class='label'>ID:</span><span class='value'>" . $row['id'] . "</span></div>";
        echo "<div class='salary-detail'><span class='label'>Nama:</span><span class='value'>" . $row['nama'] . "</span></div>";
        echo "<div class='salary-detail'><span class='label'>Gaji Tetap:</span><span class='value'>Rp " . number_format($row['gaji_tetap'], 0, ',', '.') . "</span></div>";
        echo "<div class='salary-detail'><span class='label'>Lembur:</span><span class='value'>Rp " . number_format($row['lembur'], 0, ',', '.') . "</span></div>";
        echo "<div class='salary-detail'><span class='label'>Potongan:</span><span class='value'>Rp " . number_format($row['potongan'], 0, ',', '.') . "</span></div>";
        $jumlah_gaji = $row['gaji_tetap'] + $row['lembur'] - $row['potongan'];
        echo "<div class='salary-detail'><span class='label'>Jumlah Gaji:</span><span class='value'>Rp " . number_format($jumlah_gaji, 0, ',', '.') . "</span></div>";
        echo "<a href='index.php' class='btn'>Kembali</a>";
        echo "</div>";
    } else {
        echo "<div class='detail-container'><p>Tidak ada data gaji.</p></div>";
    }
} else {
    echo "<div class='detail-container'><p>ID tidak ditemukan.</p></div>";
}

include("footer.php");
?>



