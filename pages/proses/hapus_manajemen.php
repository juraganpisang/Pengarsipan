<?php
include '../../koneksi.php';

$id = $_GET['id'];
$cek=mysqli_query($koneksi, "DELETE FROM tbl_arsip WHERE id='$id'");
if($cek){
	echo 'Berhasil';
}else{
	echo mysqli_error($koneksi);
}

header("location:../manajemen_arsip.php?pesan=berhasil");
?>