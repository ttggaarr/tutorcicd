<?php 
include("header.php");
include("koneksi.php"); 
?>

<h1>Riwayat Penggajian</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Gaji Tetap</th>
            <th>Lembur</th>
            <th>Potongan</th>
            <th>Jumlah Gaji</th>
            <th class="col-2">Lainnya</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM penggajian";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
                $jumlah_gaji = $row['gaji_tetap'] + $row['lembur'] - $row['potongan'];
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['gaji_tetap'] . "</td>";
                echo "<td>" . $row['lembur'] . "</td>";
                echo "<td>" . $row['potongan'] . "</td>";
                echo "<td>" . $jumlah_gaji . "</td>";
                echo "<td>";
                echo "<a href='detail_gaji.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Detail</a> ";
                echo "<a href='cetak_bukti.php?id=" . $row['id'] . "' class='btn btn-secondary btn-sm'>Cetak Bukti</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>Tidak ada data</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include("footer.php") ?>
