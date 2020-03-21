<?php
include '../../koneksi.php';

$nama_peminjam = $_POST['nama_peminjam'];
$indeks = $_POST['indeks'];
$kode_surat = $_POST['kode_surat'];
$no_surat = $_POST['no_surat'];
$no_laci = $_POST['no_laci'];
$perihal = $_POST['perihal'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];

$query = mysqli_query($koneksi, "INSERT INTO tbl_peminjaman (nama_peminjam, indeks, kode_surat, no_surat, no_laci, perihal, tanggal_pinjam, tanggal_kembali) VALUES (
	'".$nama_peminjam."',
	'".$indeks."',
	'".$kode_surat."',
	'".$no_surat."',
	'".$no_laci."',
	'".$perihal."',
	'".$tanggal_pinjam."',
	'".$tanggal_kembali."'
	)");
if($query){
	echo 'DATA BERHASIL';
}else{
	echo mysqli_error($koneksi);;
}
header("location:../peminjaman.php?pesan=berhasil");
?>