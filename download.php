<?php
require('C:\xampp\htdocs\login\fpdf.php');
include("koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM penggajian WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Buat objek PDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Tambahkan informasi gaji ke PDF
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Bukti Gaji', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'ID: ' . $row['id'], 0, 1);
        $pdf->Cell(0, 10, 'Nama: ' . $row['nama'], 0, 1);
        $pdf->Cell(0, 10, 'Gaji Tetap: ' . $row['gaji_tetap'], 0, 1);
        $pdf->Cell(0, 10, 'Lembur: ' . $row['lembur'], 0, 1);
        $pdf->Cell(0, 10, 'Potongan: ' . $row['potongan'], 0, 1);
        $jumlah_gaji = $row['gaji_tetap'] + $row['lembur'] - $row['potongan'];
        $pdf->Cell(0, 10, 'Jumlah Gaji: ' . $jumlah_gaji, 0, 1);

        // Output PDF ke browser
        $pdf->Output('D', 'BuktiGaji.pdf');
    } else {
        echo "Tidak ada data gaji.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
