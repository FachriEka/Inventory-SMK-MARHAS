<?php
	include '../../config/koneksi.php';
	
	$id = $_POST['id'];
	$rusak = $_POST['rusak'];
	$bagus = $_POST['bagus'];

	$jumlah = $rusak + $bagus;

	$query = mysqli_query($conn, "UPDATE detail_pengembalian set bagus='$bagus', rusak='$rusak', jumlah='$jumlah' where id_detail_pengembalian='$id'");

	if ($query) {
		echo "<script>alert('Barang Berhasil Diubah');window.location='../home.php?menu=8'</script>";
	}else{
		echo "<script>alert('Barang Gagal Diubah');window.location='../home.php?menu=8'</script>";
	}
?>
