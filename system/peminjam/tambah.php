<?php 
session_start();
include "../../config/koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['no_telp'];
$email = $_POST['email'];

$sql="INSERT INTO peminjam values ('','$nama','$alamat','$telepon','$email')";
$query=mysqli_query($conn,$sql);

if ($query) {
	$_SESSION['notif'] = 'Data Berhasil Ditambah';
	$_SESSION['icon'] = 'success';
}else{
	$_SESSION['notif'] = 'Data Gagal Ditambah';
	$_SESSION['icon'] = 'error';
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=4';
</script>