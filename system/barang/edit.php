<?php
session_start();
include "../../config/koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$tempat = $_POST['tempat'];
$asal = $_POST['asal'];
$jrusak = $_POST['jrusak'];

$jbagus = $stok - $jrusak;
if ($jbagus < 0){
	$_SESSION['notif'] = 'Jumlah Rusak Berlebihan';
	$_SESSION['icon'] = 'info';
	echo "<script>window.location='../home.php?menu=2';</script>";
}else{
	$sql="UPDATE barang set nama='$nama', stok='$stok', tempat='$tempat' where id_barang='$id'";
	$query=mysqli_query($conn,$sql);

	if ($query) {
		$total = $stok - $asal;

		if ($total > 0) {
			$select = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Tersedia' order by id_detail_barang desc limit $total");
			while ($data=mysqli_fetch_array($select)) {
				$query = mysqli_query($conn, "INSERT INTO detail_barang values ('','$id','Bagus','Tersedia')");
			}
		}else{
			$total = $total * -1;
			$select = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Tersedia' order by id_detail_barang desc limit $total");
			while ($data=mysqli_fetch_array($select)) {
				$did = $data['id_detail_barang'];
				$query = mysqli_query($conn, "DELETE from detail_barang where id_detail_barang='$did'");
			}
		}

		if ($jrusak > 0) {
			$sjr = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Tersedia' order by id_detail_barang desc limit $jrusak");
			while ($rowr=mysqli_fetch_array($sjr)) {
				$rid = $rowr['id_detail_barang'];
				$upr = mysqli_query($conn, "UPDATE detail_barang set kondisi='Rusak' where id_detail_barang='$rid'");
			}
			$sjb = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Tersedia' order by id_detail_barang asc limit $jbagus");
			while ($rowb=mysqli_fetch_array($sjb)) {
				$bid = $rowb['id_detail_barang'];
				$upb = mysqli_query($conn, "UPDATE detail_barang set kondisi='Bagus' where id_detail_barang='$bid'");
			}
		}else{
			$upb = mysqli_query($conn, "UPDATE detail_barang set kondisi='Bagus' where id_barang='$id' and status='Tersedia'");
		}
		$_SESSION['notif'] = 'Data Berhasil Diubah';
		$_SESSION['icon'] = 'success';
	}else{
		$_SESSION['notif'] = 'Data Gagal Diubah';
		$_SESSION['icon'] = 'error';
	}
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=2';
</script>