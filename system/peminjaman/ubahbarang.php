<?php
	session_start();
	include '../../config/koneksi.php';
	
	$id = $_POST['id'];
	$jumlah = $_POST['jumlah'];

	$query = mysqli_query($conn, "UPDATE detail_peminjaman set jumlah='$jumlah' where id_barang='$id' and id_peminjaman='0'");

	if ($query) {
		$_SESSION['notif'] = 'Data Berhasil Diubah';
		$_SESSION['icon'] = 'success'; 
	}else{
		$_SESSION['notif'] = 'Data Gagal Diubah';
		$_SESSION['icon'] = 'error';
	}
?>
<script type="text/javascript">
	window.location='../home.php?menu=7';
</script>