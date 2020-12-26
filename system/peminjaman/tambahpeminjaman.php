<?php
session_start();
if (isset($_POST['idpem']) && $_POST['jumlah'] != "") {
	include '../../config/koneksi.php';

	$jumlah = $_POST['jumlah'];
	$idpeminjam = $_POST['idpem'];
	$iduser = $_SESSION['id'];
	$i = 1;
	$query = mysqli_query($conn, "INSERT INTO peminjaman values ('',now(),'$idpeminjam','$jumlah','Dipinjam','$iduser')");

	if ($query) {
		$nid = mysqli_query($conn, "SELECT * FROM peminjaman order by id_peminjaman desc limit 1");
		$fid = mysqli_fetch_array($nid);
		$idpem = $fid['id_peminjaman'];

		$sid = mysqli_query($conn, "SELECT * FROM detail_peminjaman where id_peminjaman='0'");
		while ($data=mysqli_fetch_array($sid)) {
			$id = $data['id_barang'];
			$jumlah = $data['jumlah'];
			$qidd = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Tersedia' and kondisi='Bagus' order by id_detail_barang desc limit $jumlah");
			while ($row=mysqli_fetch_array($qidd)) {
				$idd = $row['id_detail_barang'];

				$ud = mysqli_query($conn, "UPDATE detail_barang set status='Dipinjam' where id_detail_barang='$idd'");
			}
		}
		$update = mysqli_query($conn, "UPDATE detail_peminjaman set id_peminjaman='$idpem' where id_peminjaman='0'");
		$_SESSION['notif'] = "Peminjaman Berhasil Ditambah";
		$_SESSION['icon'] = "success";
	}else{
		$_SESSION['notif'] = "Peminjaman Gagal Ditambah";
		$_SESSION['icon'] = "error";
	}
}else{
	$_SESSION['notif'] = "Data Belum Lengkap";
	$_SESSION['icon'] = "info";
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=5';
</script>