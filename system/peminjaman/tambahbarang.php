<?php
session_start();
if (isset($_POST['id'])) {
	include '../../config/koneksi.php';
	$idb = $_POST['id'];
	$jumlah = $_POST['jumlah'];

	$tersedia = mysqli_query($conn, "SELECT count(id_detail_barang) as tersedia FROM detail_barang where id_barang='$idb' and status='Tersedia'");
	$data=mysqli_fetch_array($tersedia);

	$ijum = $data['tersedia'] - $jumlah;

	if ($ijum < 0) {
		$_SESSION['notif'] = 'Stok Tidak Cukup';
		$_SESSION['icon'] = 'error';
	}else{
		$query = mysqli_query($conn, "INSERT INTO detail_peminjaman values ('','$idb','$jumlah','0')");
		if ($query) {
			$_SESSION['notif'] = 'Data Berhasil Ditambah';
			$_SESSION['icon'] = 'success';
		}else{
			$_SESSION['notif'] = 'Data Gagal Ditambah';
			$_SESSION['icon'] = 'error';
		}
	}
}else{
	$_SESSION['notif'] = 'Barang Belum Dipilih';
	$_SESSION['icon'] = 'info';
}
?>
<script type="text/javascript">
	window.location= '../home.php?menu=7';
</script>
