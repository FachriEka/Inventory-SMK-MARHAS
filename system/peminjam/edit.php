<?php
session_start();
include "../../config/koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['no_telp'];
$email = $_POST['email']; 

$sql="UPDATE peminjam set nama='$nama', alamat='$alamat', no_telp='$telepon', email='$email' where id_peminjam='$id'";
$query=mysqli_query($conn,$sql);

if ($query) {
	$_SESSION['notif'] = 'Data Berhasil Diubah';
	$_SESSION['icon'] = 'success';
}else{
	$_SESSION['notif'] = 'Data Gagal Diubah';
	$_SESSION['icon'] = 'error';
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=4';
</script>