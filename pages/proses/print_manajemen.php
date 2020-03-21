<?php
include '../../koneksi.php';

$id = $_GET['id'];
$cek=mysqli_query($koneksi, "SELECT * FROM tbl_arsip WHERE id='$id'");

header("location:../manajemen_arsip.php");
?>
<script>
	window.print();
</script>
<h2>INFO SURAT</h2>
<table>	
	<tr>Dari / Kepada</tr>
	<td><?php echo $cek['dr_kpd']; ?></td>
</table>