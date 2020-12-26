<?php 
session_start();
include "../../config/koneksi.php";

$id=$_GET['id'];


$sql="DELETE FROM barang where id_barang ='$id'";
$query=mysqli_query($conn,$sql);

if ($query) {
	$query = mysqli_query($conn, "DELETE FROM detail_barang where id_barang='$id'");
	$_SESSION['notif'] = 'Data Berhasil Dihapus';
	$_SESSION['icon'] = 'success';
}else{
	$_SESSION['notif'] = 'Data Gagal Dihapus';
	$_SESSION['icon'] = 'error';
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=2';
</script>