<?php

require_once 'functions.php';

$id = $_GET['id'];

if (hapus("DELETE FROM buku WHERE id = $id ") > 0) {
    echo "<script>
                            alert('data berhasil dihapus');
                            location.href = 'buku.php';
              	     	</script>";
} else {

    echo "<script>
    alert('data gagal dihapus');
    location.href = 'buku.php';
   </script>";
}
