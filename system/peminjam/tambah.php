<?php 
session_start();
include "../../config/koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['no_telp'];
$email = $_POST['email'];

$check = mysqli_query($conn, "SELECT * FROM peminjam where nama='$nama'");

if (mysqli_num_rows($check) == 1) {
	$_SESSION['notif'] = 'Peminjam Sudah Terdaftar';
	$_SESSION['icon'] = 'warning';
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