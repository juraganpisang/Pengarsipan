<?php 
include '../../koneksi.php';

$id = $_GET['id'];
$status = $_POST['status'];
$dariKepada = $_POST['dariKepada'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$noSurat = $_POST['noSurat'];
$noUrut = $_POST['noUrut'];
$indeks = $_POST['indeks'];
$kodeSurat = $_POST['kodeSurat'];
$tanggalSurat = $_POST['tanggalSurat'];
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
if($scanArsip == "") {
	$query = mysqli_query($koneksi, "UPDATE tbl_arsip SET
		status='".$status."',
		dr_kpd='".$dariKepada."',
		alamat='".$alamat."',
		kota='".$kota."',
		no_surat='".$noSurat."',
		no_urut='".$noUrut."',
		indeks='".$indeks."',
		kode_surat='".$kodeSurat."',
		tanggal_surat='".$tanggalSurat."',
		perihal='".$perihal."',
		jenis_surat='".$jenisSurat."',
		b_s_sr='".$bssr."',
		no_laci='".$noLaci."',
		sistem_simpan='".$sistemSimpan."',
		unit='".$unit."',
		isi_ringkas='".$isiRingkas."',
		scan_arsip='".$scanArsip."',
		arsiparis='".$arsiparis."'
		WHERE id='".$id."'");
		if($query){
			echo 'FILE BERHASIL DI UPLOAD';
		}else{
			echo mysqli_error($koneksi);;
		}
} else {
	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, '../../images/'.$scanArsip);
			$query = mysqli_query($koneksi, "UPDATE tbl_arsip SET
			status='".$status."',
			dr_kpd='".$dariKepada."',
			alamat='".$alamat."',
			kota='".$kota."',
			no_surat='".$noSurat."',
			no_urut='".$noUrut."',
			indeks='".$indeks."',
			kode_surat='".$kodeSurat."',
			tanggal_surat='".$tanggalSurat."',
			perihal='".$perihal."',
			jenis_surat='".$jenisSurat."',
			b_s_sr='".$bssr."',
			no_laci='".$noLaci."',
			sistem_simpan='".$sistemSimpan."',
			unit='".$unit."',
			isi_ringkas='".$isiRingkas."',
			scan_arsip='".$scanArsip."',
			arsiparis='".$arsiparis."'
			WHERE id='".$id."'");
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
}
header("location:../manajemen_arsip.php?pesan=berhasil");
?>