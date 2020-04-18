<?php 
include 'koneksi.php';

$id_buku = $_GET['id_buku'];

mysqli_query($kon,"DELETE FROM buku WHERE id_buku = '$id_buku'");

echo "<script> alert('Data have deleted!');document.location='index.php'</script>"
 ?>