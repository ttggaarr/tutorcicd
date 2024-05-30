<?php 
include("header.php");
include("koneksi.php"); 
?>
<?php
$sukses = "";
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM halaman WHERE id = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}
?>
<h1>Dashboard</h1>
<p>
    <a href="add_karyawan.php">
        <input type="button" class="btn btn-success" value="Tambah Karyawan" />
    </a>
</p>
<?php
if ($sukses) {
?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
<?php
}
?>
<form class="row g-3" method="get">
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci" value="<?php echo $katakunci ?>" />
    </div>
    <div class="col-auto">
        <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>ID</th>
            <th>Nama</th>
            <th class="col-2">Total Gaji</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sqltambahan = "";
        $per_halaman = 2;
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            for ($x = 0; $x < count($array_katakunci); $x++) {
                $sqlcari[] = "(judul LIKE '%" . $array_katakunci[$x] . "%' OR kutipan LIKE '%" . $array_katakunci[$x] . "%' OR isi LIKE '%" . $array_katakunci[$x] . "%')";
            }
            $sqltambahan = " WHERE " . implode(" OR ", $sqlcari);
        }
        $sql1 = "SELECT * FROM halaman $sqltambahan";
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
        $q1 = mysqli_query($conn, $sql1);
        if (!$q1) {
            die("Query gagal: " . mysqli_error($conn));
        }
        $total = mysqli_num_rows($q1);
        $pages = ceil($total / $per_halaman);
        $nomor = $mulai + 1;
        $sql1 = $sql1 . " ORDER BY id DESC LIMIT $mulai, $per_halaman";
        $q1 = mysqli_query($conn, $sql1);
        if (!$q1) {
            die("Query gagal: " . mysqli_error($conn));
        }
        while ($r1 = mysqli_fetch_array($q1)) {
        ?>
            <tr>
                <td><?php echo $nomor++ ?></td>
                <td><?php echo $r1['judul'] ?></td>
                <td><?php echo $r1['kutipan'] ?></td>
                <td>
                    <a href="halaman_input.php?id=<?php echo $r1['id'] ?>">
                        <span class="badge bg-warning text-dark">Edit</span>
                    </a>
                    <a href="halaman.php?op=delete&id=<?php echo $r1['id'] ?>" onclick="return confirm('Apakah yakin mau hapus data bro?')">
                        <span class="badge bg-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $cari = isset($_GET['cari']) ? $_GET['cari'] : "";
        for ($i = 1; $i <= $pages; $i++) {
        ?>
            <li class="page-item">
                <a class="page-link" href="halaman.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>

<header>
    <h1>Halaman Utama</h1>
</header>
<div class="slider"></div>
<div class="content">
    <div class="container">
        <h2>Content Title</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum tortor id urna consequat, ut tincidunt est vehicula. Fusce tempor leo a massa malesuada, sit amet mollis justo convallis.</p>
        <p>Integer dapibus mi id elit lacinia, et interdum turpis tempor. Sed sollicitudin, sapien vel eleifend sodales, turpis felis congue enim, ac cursus tellus mi in tortor.</p>
    </div>
</div>
    <?php include("footer.php") ?>
</body>
</html>
