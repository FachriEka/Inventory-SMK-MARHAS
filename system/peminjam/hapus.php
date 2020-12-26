<?php 
session_start();
include "../../config/koneksi.php";

$id=$_GET['id'];


$sql="DELETE FROM peminjam where id_peminjam ='$id'";
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
	window.location='../home.php?menu=4';
</script>