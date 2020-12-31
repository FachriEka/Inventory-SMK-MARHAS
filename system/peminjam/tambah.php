<?php 
session_start();
include "../../config/koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['no_telp'];
$email = $_POST['email'];

if (mysqli_query($conn, "SELECT * FROM peminjam where nama='$nama'")) {
	$_SESSION['notif'] = 'Data Sudah Ada';
	$_SESSION['icon'] = 'info';
	echo "<script>window.location='../home.php?menu=4';</script>";
}else{
	$sql="INSERT INTO peminjam values ('','$nama','$alamat','$telepon','$email')";
	$query=mysqli_query($conn,$sql);

	if ($query) {
		$_SESSION['notif'] = 'Data Berhasil Ditambah';
		$_SESSION['icon'] = 'success';
	}else{
		$_SESSION['notif'] = 'Data Gagal Ditambah';
		$_SESSION['icon'] = 'error';
	}
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=4';
</script>