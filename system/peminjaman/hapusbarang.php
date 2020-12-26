<?php 
	session_start();
	include "../../config/koneksi.php";

	$id=$_GET['id'];

	$sql="DELETE FROM detail_peminjaman where id_barang='$id' and id_peminjaman='0'";
	$query=mysqli_query($conn,$sql);

	if ($query) {
		$_SESSION['notif'] = 'Data Berhasil Dihapus';
		$_SESSION['icon'] = 'success';
	}else{
		$_SESSION['notif'] = 'Data Gagal Dihapus';
		$_SESSION['icon'] = 'error';
	}
?>
<script type="text/javascript">
	window.location='../home.php?menu=7';
</script>