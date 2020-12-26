<?php 
session_start();
if (isset($_POST['jabatan'])) {
	include "../../config/koneksi.php";

	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql="INSERT INTO user values ('','$nama','$jabatan','$user','$pass')";
	$query=mysqli_query($conn,$sql);

	if ($query) {
		$_SESSION['notif'] = 'Data Berhasil Ditambah';
		$_SESSION['icon'] = 'success';
	}else{
		$_SESSION['notif'] = 'Data Gagal Ditambah';
		$_SESSION['icon'] = 'error';
	}
}else{
	$_SESSION['notif'] = 'Jabatan Belum Dipilih';
	$_SESSION['icon'] = 'info';
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=3';
</script>