<?php
session_start();
if (isset($_POST['id'])) {
	include '../../config/koneksi.php';
	
	$idb = $_POST['id'];
	$rusak = $_POST['rusak'];
	$bagus = $_POST['bagus'];

	$jumlah = $rusak + $bagus;

	$query = mysqli_query($conn, "INSERT INTO detail_pengembalian values ('','$idb','$bagus','$rusak','$jumlah','0')");

	if ($query) {
		$_SESSION['notif'] = "Barang Berhasil Ditambah";
		$_SESSION['icon'] = "success";
	}else{
		$_SESSION['notif'] = "Barang Gagal Ditambah";
		$_SESSION['icon'] = "error";
	}
}else{
	$_SESSION['notif'] = "Barang Belum Dipilih";
	$_SESSION['icon'] = "info";
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=8';
</script>
