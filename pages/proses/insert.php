<?php 
include '../../koneksi.php';

$status = $_POST['status'];
$dariKepada = $_POST['dariKepada'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$noSurat = $_POST['noSurat'];
$noUrut = $_POST['noUrut'];
$indeks = $_POST['indeks'];
$kodeSurat = $_POST['kodeSurat'];
$tanggalSurat = $_POST['tanggalSurat'];
$tanggalSimpan = $_POST['tanggalSimpan'];
$perihal = $_POST['perihal'];
$jenisSurat = $_POST['jenisSurat'];
$bssr = $_POST['bssr'];
$noLaci = $_POST['noLaci'];
$sistemSimpan = $_POST['sistemSimpan'];
$unit = $_POST['unit'];
$isiRingkas = $_POST['isiRingkas'];
$arsiparis = $_POST['arsiparis'];


$ekstensi_diperbolehkan	= array('png','jpg');
$scanArsip = $_FILES['scanArsip']['name'];
$x = explode('.', $scanArsip);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['scanArsip']['size'];
$file_tmp = $_FILES['scanArsip']['tmp_name'];
if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 1044070){			
		move_uploaded_file($file_tmp, '../../images/'.$scanArsip);
		$query = mysqli_query($koneksi, "INSERT INTO tbl_arsip (status, dr_kpd, alamat, kota, no_surat, no_urut, indeks, kode_surat, tanggal_surat, tanggal_simpan, perihal, jenis_surat, b_s_sr, no_laci, sistem_simpan, unit, isi_ringkas, scan_arsip, arsiparis) VALUES (
		'".$status."',
		'".$dariKepada."',
		'".$alamat."',
		'".$kota."',
		'".$noSurat."',
		'".$noUrut."',
		'".$indeks."',
		'".$kodeSurat."',
		'".$tanggalSurat."',
		'".$tanggalSimpan."',
		'".$perihal."',
		'".$jenisSurat."',
		'".$bssr."',
		'".$noLaci."',
		'".$sistemSimpan."',
		'".$unit."',
		'".$isiRingkas."',
		'".$scanArsip."',
		'".$arsiparis."'
		)");
		if($query){
			echo 'FILE BERHASIL DI UPLOAD';
		}else{
			echo mysqli_error($koneksi);;
		}
	}else{
		echo 'UKURAN FILE TERLALU BESAR';
	}
}else{
	echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}
header("location:../arsip_baru.php?pesan=berhasil");
?>