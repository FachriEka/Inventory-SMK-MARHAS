<?php 
session_start();
include "../../config/koneksi.php";

$nama = $_POST['nama'];
$stok = $_POST['stok'];
$tempat = $_POST['tempat'];

if (mysqli_query($conn, "SELECT * FROM barang where nama='$nama'")) {
	$_SESSION['notif'] = 'Data Sudah Ada';
	$_SESSION['icon'] = 'info';
	echo "<script>window.location='../home.php?menu=2';</script>";
}else{
	$sql="INSERT INTO barang values ('','$nama','$stok','$tempat')";
	$query=mysqli_query($conn,$sql);

	if ($query) {
		$sid = mysqli_query($conn, "SELECT id_barang from barang where nama='$nama' and stok='$stok' and tempat='$tempat'");
		$fid = mysqli_fetch_array($sid);
		$id = $fid['id_barang'];
		for ($i=1; $i <= $stok; $i++) { 
			$query = mysqli_query($conn, "INSERT into detail_barang values ('','$id','Bagus','Tersedia')");
		}
		$_SESSION['notif'] = 'Data Berhasil Ditambah';
		$_SESSION['icon'] = 'success';
	}else{
		$_SESSION['notif'] = 'Data Gagal Ditambah';
		$_SESSION['icon'] = 'error';
	}
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=2';
</script>