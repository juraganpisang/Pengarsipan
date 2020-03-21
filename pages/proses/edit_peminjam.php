<?php
include '../../koneksi.php';

$id = $_POST['id'];
$nama_peminjam = $_POST['nama_peminjam'];
$indeks = $_POST['indeks'];
$kode_surat = $_POST['kode_surat'];
$no_surat = $_POST['no_surat'];
$no_laci = $_POST['no_laci'];
$perihal = $_POST['perihal'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = mysqli_query($koneksi, "UPDATE tbl_peminjaman SET
	nama_peminjam = '".$nama_peminjam."', 
	indeks = '".$indeks."', 
	kode_surat = '".$kode_surat."', 
	no_surat = '".$no_surat."', 
	no_laci = '".$no_laci."', 
	perihal = '".$perihal."', 
	tanggal_pinjam = '".$tanggal_pinjam."', 
	tanggal_kembali = '".$tanggal_kembali."'
	WHERE id='".$id."'");
if($query){
	echo 'DATA BERHASIL';
}else{
	echo mysqli_error($koneksi);;
}
header("location:../peminjaman.php?pesan=berhasil");
?>