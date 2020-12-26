<?php
session_start();
if (isset($_POST['idpem']) && $_POST['jumlah'] != "") {
	include '../../config/koneksi.php';

	$jumlah = $_POST['jumlah'];
	$idpeminjam = $_POST['idpem'];
	$iduser = $_SESSION['id'];
	$query = mysqli_query($conn, "INSERT INTO pengembalian values ('','$idpeminjam',now(),'$jumlah','$iduser')");

	if ($query) {
		$nid = mysqli_query($conn, "SELECT * FROM pengembalian order by id_pengembalian desc limit 1");
		$fid= mysqli_fetch_array($nid);
		$idpem = $fid['id_pengembalian'];

		$sid = mysqli_query($conn, "SELECT * FROM detail_pengembalian where id_pengembalian='0'");
		while ($data=mysqli_fetch_array($sid)) {
			$id = $data['id_barang'];
			$jumlah = $data['jumlah'];
			$qidd = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Dipinjam' order by id_detail_barang desc limit $jumlah");
			while ($row=mysqli_fetch_array($qidd)) {
				$idd = $row['id_detail_barang'];

				$ud = mysqli_query($conn, "UPDATE detail_barang set status='Tersedia' where id_detail_barang='$idd'");
			}

			$qb = mysqli_query($conn, "SELECT * FROM detail_pengembalian where id_barang='$id' and id_pengembalian='0'");
			$fb = mysqli_fetch_array($qb);
			$br = $fb['rusak'];
			if ($br > 0) {
				$qbr = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and kondisi='Bagus'order by id_detail_barang desc limit $br");
				while ($wbr=mysqli_fetch_array($qbr)) {
					$idbr = $wbr['id_detail_barang'];
					$ubr = mysqli_query($conn, "UPDATE detail_barang set kondisi='Rusak'where id_detail_barang='$idbr' ");
				}
			}
		}
		$update = mysqli_query($conn, "UPDATE detail_pengembalian set id_pengembalian='$idpem' where id_pengembalian='0'");
		$dikembalikan = mysqli_query($conn, "UPDATE peminjaman set status='Dikembalikan' where id_peminjaman='$idpeminjam'");
		$_SESSION['notif'] = "Pengembalian Berhasil";
		$_SESSION['icon'] = "success";
	}else{
		$_SESSION['notif'] = "Pengembalian Gagal";
		$_SESSION['icon'] = "error";
	}
}else{
	$_SESSION['notif'] = "Data Tidak Lengkap";
	$_SESSION['icon'] = "info";
}
?>
<script type="text/javascript">
	window.location='../home.php?menu=6';
</script>