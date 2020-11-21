<?php

require_once 'functions.php';

$id = $_GET['id'];

if (hapus("DELETE FROM nama_peminjam WHERE id = $id ") > 0) {
    echo "<script>
                            alert('data berhasil dihapus');
                            location.href = 'admin.php';
              	     	</script>";
} else {
    echo "<script>
    alert('data gagal dihapus');
    location.href = 'admin.php';
   </script>";
}
