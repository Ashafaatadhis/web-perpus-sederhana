<?php

require_once 'functions.php';

$buku = query("SELECT judul FROM buku");
if (isset($_POST['submit'])) {

    if (ubah($_POST) > 0) {

        echo "<script>
                            alert('Berhasil ubah');
                            location.href = 'admin.php';
              	     	</script>";
    } else {
        echo "<script>
                            alert('gagal ubah');
                            location.href = 'admin.php';
              	     	</script>";
    }
}

$id = $_GET['id'];
$data = query("SELECT * FROM nama_peminjam WHERE id = $id ")[0];

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-5 text-center">Ubah data</h2>
        <form method="post" action="">
            <input type="hidden" name="id" id="id" value="<?= $_GET['id']; ?>">
            <div class="border-0 bg-white shadow p-3 mb-5 bg-white rounded p-5">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $data['nama']; ?>">
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" class="form-control form-control-sm" id="kelas" name="kelas" value="<?= $data['kelas']; ?>">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                            <option value="Elektronika Industri">Elektronika Industri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <select class="form-control" id="judul" name="judul">
                            <?php foreach ($buku as $b) : ?>
                                <option value="<?= $b["judul"]; ?>"><?= $b["judul"]; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <label for="tgl_pinjam">Tgl pinjam</label><br>
                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['tgl_meminjam']; ?>"><br><br>
                    <label for="tgl_pengembalian">Tgl pengembalian</label><br>
                    <input type="date" id="tgl_pengembalian" name="tgl_pengembalian" value="<?= $data['tgl_pengembalian']; ?>"><br><br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>