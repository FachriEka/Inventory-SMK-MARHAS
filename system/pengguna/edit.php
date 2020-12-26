<?php
	session_start();
	include "../../config/koneksi.php";

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$user = $_POST['user'];
	$pass = $_POST['pass']; 

	$sql = "UPDATE user set nama_user='$nama', jabatan='$jabatan', username='$user', password='$pass' where id_user='$id'";
	$query = mysqli_query($conn,$sql);

	if ($query) {
		$_SESSION['notif'] = 'Data Berhasil Diubah';
		$_SESSION['icon'] = 'success';
	}else{
		$_SESSION['notif'] = 'Data Gagal Diubah';
		$_SESSION['icon'] = 'error';
	}
?>
<script type="text/javascript">
	window.location='../home.php?menu=3';
</script>