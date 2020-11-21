<?php

$conn = mysqli_connect("sql108.epizy.com", "epiz_26394636", "JAAOSB94otFw", "epiz_26394636_perpus");

function query($query)
{

    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    return $rows;
}
function pinjam($data)
{
    global $conn;

    $nama = $data["nama"];
    $kelas =  $data["kelas"];
    $jurusan  = $data["jurusan"];
    $tgl_meminjam = $data["tgl_meminjam"];
    $tgl_pengembalian = $data["tgl_pengembalian"];
    $judul_buku = $data["judul"];


    $query = "INSERT INTO nama_peminjam 
                      VALUES
                    ('', '$nama', '$kelas', '$jurusan', '$judul_buku', '$tgl_meminjam', '$tgl_pengembalian')";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($query)
{

    global $conn;
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data)
{

    global $conn;



    $id = $data['id'];
    $nama =  htmlspecialchars($data['nama']);
    $kelas =  htmlspecialchars($data['kelas']);
    $jurusan =  htmlspecialchars($data['jurusan']);
    $query = "UPDATE nama_peminjam 
                    SET
              nama = '$nama',
              kelas = '$kelas',
              jurusan = '$jurusan'
              WHERE
              id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah_buku($data)
{

    global $conn;



    $id = $data['id'];
    $judul = htmlspecialchars($data['judul']);
    $penulis =  htmlspecialchars($data['penulis']);
    $penerbit =  htmlspecialchars($data['penerbit']);
    $gambarLama = $data["gambarLama"];

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE buku 
                    SET
              judul = '$judul',
              penulis = '$penulis',
              penerbit = '$penerbit',
              gambar = '$gambar'
              WHERE
              id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function tambah_buku($data)
{
    global $conn;
    $gambar = upload();
    $judul = $data["judul"];
    $penulis =  $data["penulis"];
    $penerbit  = $data["penerbit"];
    $query = "INSERT INTO buku 
                      VALUES
                    ('', '$judul', '$penulis', '$penerbit', '$gambar')";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{


    $namaFile = $_FILES["gambar"]["name"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];

    // cek gambar

    if ($error === 4) {
        echo "<script>
                            alert('harap masukkan gambar');
                            
                           </script>";
        return false;
    }

    $extensiGambarValid = ["jpg", "jpeg", "png"];
    $extensiGambar = explode(".", $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if (!in_array($extensiGambar, $extensiGambarValid)) {

        echo "<script>
        alert('yang anda masukkan bukan gambar');
        
       </script>";
        return false;
    }

    if ($size > 2200430) {
        echo "<script>
        alert('harap masukkan gambar');
      
       </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $extensiGambar;
    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);
    return $namaFileBaru;
}

function regist($data)
{

    global $conn;
    $username = strtolower($data["username"]);
    $password = $data["password"];
    $password2 = $data["password2"];

    if ($password !== $password2) {
        echo "<script>
          alert('password tidak sesuai');
        </script>";
        return false;
    }

    $query = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_fetch_assoc($result)) {

        echo "<script>
        alert ('username sudah ada');
        </script>";
        return false;
    }



    $password = password_hash($password, PASSWORD_DEFAULT);


    $query = "INSERT INTO user
                    VALUES
            ('','$username','$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah_siswa($data)
{
    global $conn;
    $nama = $data["nama"];
    $kelas =  $data["kelas"];
    $jurusan  = $data["jurusan"];
    $tgl_meminjam = $data["tgl_meminjam"];
    $tgl_pengembalian = $data["tgl_pengembalian"];
    $judul = $data["judul"];
    $query = "INSERT INTO nama_peminjam
                      VALUES
                    ('', '$nama', '$kelas', '$jurusan', '$judul', '$tgl_meminjam', '$tgl_pengembalian')";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function search($keyword)
{

    global $conn;

    $query = "SELECT * FROM buku WHERE
                    judul LIKE '%$keyword%' OR
                    penerbit LIKE '%$keyword%' OR
                    penulis LIKE '%$keyword%'";

    return query($query);
}

function search_namaPeminjam($keyword)
{

    global $conn;

    $query = "SELECT * FROM nama_peminjam WHERE
                    nama LIKE '%$keyword%'OR
                    kelas LIKE '%$keyword%'OR
                    jurusan LIKE '%$keyword%'OR
                    judul LIKE '%$keyword%'OR
                    tgl_meminjam LIKE '%$keyword%'OR
                    tgl_pengembalian LIKE '%$keyword%'";

    return query($query);
}
