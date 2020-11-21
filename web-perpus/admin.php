<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login_admin.php");
}
require 'functions.php';

$jumlahDataPerHalaman = 2;
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$next = $halamanAktif + 1;
$previous = $halamanAktif - 1;
$jumlahData = count(query("SELECT * FROM nama_peminjam"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$awalData = $halamanAktif * $jumlahDataPerHalaman - $jumlahDataPerHalaman;


$peminjam = query("SELECT * FROM nama_peminjam LIMIT $awalData, $jumlahDataPerHalaman");

if (isset($_POST["cari"])) {

    $peminjam = search_namaPeminjam($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Halaman admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="logout_admin.php">Logout <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="buku.php">Daftar buku</a>
                            <a class="dropdown-item" href="tambah_siswa.php">Tambah siswa</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="" method="post">
                    <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="cari" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
 
    <!-- table -->

    <div class="container mt-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($halamanAktif == 1) : ?>

                <?php endif; ?>
                <?php if ($halamanAktif > 1) : ?>


                    <li class="page-item"><a class="page-link" href="?halaman=<?= $previous; ?>">Previous</a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                <?php if ($halamanAktif == $jumlahHalaman) : ?>

                <?php endif; ?>
                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $next; ?>">Next</a></li>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="container">
        <table style=”*”class="table table-bordered mt-5 shadow p-3 mb-5 bg-white rounded">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Judul buku</th>
                    <th scope="col">Tgl meminjam</th>
                    <th scope="col">Tgl pengembalian</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($peminjam as $p) : ?>
                    <tr>

                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p["nama"]; ?></td>
                        <td><?= $p["kelas"]; ?></td>
                        <td><?= $p["jurusan"]; ?></td>
                        <td><?= $p["judul"]; ?></td>
                        <td><?= $p["tgl_meminjam"]; ?></td>
                        <td><?= $p["tgl_pengembalian"]; ?></td>
                        <td><a href="ubah.php?id=<?= $p['id']; ?>">Ubah</a> | <a onclick="return confirm('yakin?');" href="hapus.php?id=<?= $p['id']; ?>">Hapus</a></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>