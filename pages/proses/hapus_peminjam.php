<?php
include '../../koneksi.php';

$id = $_GET['id'];
$cek=mysqli_query($koneksi, "DELETE FROM tbl_peminjaman WHERE id='$id'");
if($cek){
	echo 'Berhasil';
}else{
	echo mysqli_error($koneksi);
}

header("location:../peminjaman.php?pesan=berhasil");
?>