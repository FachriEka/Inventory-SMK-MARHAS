<?php
	include '../../config/koneksi.php';

	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT * FROM peminjaman where id_peminjaman='$id'");
	$fetch = mysqli_fetch_array($query);

	$idp = $fetch['id_peminjam'];
	$qnp = mysqli_query($conn, "SELECT * FROM peminjam where id_peminjam='$idp'");
	$fnp = mysqli_fetch_array($qnp);

	function tglsurat($tgl){
		$splitdate = explode("-", $tgl); //split tanggal
		if ($splitdate[1] == 1) { //set bulan
			$bulan = "Januari";
		}else if ($splitdate[1] == 2) {
			$bulan = "Februari";
		}else if ($splitdate[1] == 3) {
			$bulan = "Maret";
		}else if ($splitdate[1] == 4) {
			$bulan = "April";
		}else if ($splitdate[1] == 5) {
			$bulan = "Mei";
		}else if ($splitdate[1] == 6) {
			$bulan = "Juni";
		}else if ($splitdate[1] == 7) {
			$bulan = "Juli";
		}else if ($splitdate[1] == 8) {
			$bulan = "Agustus";
		}else if ($splitdate[1] == 9) {
			$bulan = "September";
		}else if ($splitdate[1] == 10) {
			$bulan = "Oktober";
		}else if ($splitdate[1] == 11) {
			$bulan = "November";
		}else if ($splitdate[1] == 12) {
			$bulan = "Desember";
		}

		$chari = date_create($tgl);
		if (date_format($chari, "D") == "Mon") {
			$hari = "Senin";
		}else if (date_format($chari, "D") == "Tue") {
			$hari = "Selasa";
		}else if (date_format($chari, "D") == "Wed") {
			$hari = "Rabu";
		}else if (date_format($chari, "D") == "Thu") {
			$hari = "Kamis";
		}else if (date_format($chari, "D") == "Fri") {
			$hari = "Jumat";
		}else if (date_format($chari, "D") == "Sat") {
			$hari = "Sabtu";
		}else if (date_format($chari, "D") == "Sun") {
			$hari = "Minggu";
		}

		return $hari.", ".$splitdate[2]." ".$bulan." ".$splitdate[0];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
	<title></title>
</head>
<style type="text/css">
body{
	padding-top: 20px;
}
img	{
	width: 125px;
	height: 120px;
}
.header-content {
	color: darkblue;
	text-align: center;
	padding-top: 15px;
}

.mail-content {
	font-size: 13px;
	text-align: justify;
}
thead td {
	padding: 5px;
	background-color: cyan;
}
tbody td {
	padding: 5px;
}
tfoot td {
	padding: 5px;
}
</style>
<body onload="window.print()">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="../../assets/img/logo smkmarhas.png"><br>
				<b style="color: darkblue;">TERAKREDITASI "A"</b>
			</div>
			<div class="col-md-9 header-content">
				<b style="font-size: 18px;">YAYASAN PENDIDIKAN MARHAMAH HASANAH</b><br>
				<b style="font-size: 24px;">SEKOLAH MENENGAH KEJURUAN MARHAS MARGAHAYU</b><br>
				<b style="font-size: 16px;">PROGRAM STUDI KEAHLIAN : TEKNIK MESIN - TEKNIK KOMPUTER DAN INFORMATIKA</b><br>
				<strong>Ijin Operasional No.421/.5/1114-Disdik/2004, Ijin Pendirian </strong><br>
				<strong style="font-size: 11px;">Jl. Terusan Kopo 385/299 Margahayu Kabupaten Bandung 40226 022-540926 Email,smkmarhasmargahayu2004@gmail.com</strong>
			</div>
			
		</div>
		<hr style="border: 3px solid darkblue;margin-bottom: 0px;">
		<hr style="border: 1px solid darkblue;margin-top: 4px;">
		<div class="mail-content">
			<center><b style="font-size: 18px;">PEMINJAMAN BARANG di SMK MARHAS</b></center><br>
			<table>
				<tr>
					<td>Hari / Tanggal</td>
					<td>:</td>
					<td><?= tglsurat($fetch['tgl_pinjam'])?></td>
				</tr>
				<tr>
					<td>Nama Peminjam</td>
					<td>:</td>
					<td><?= $fnp['nama']?></td>
				</tr>
				<tr>
					<td>ID Peminjaman</td>
					<td>:</td>
					<td><?= $id?></td>
				</tr>
			</table><br>
			<table style="width: 100%;text-align: center;" border="1px">
				<thead >
					<td>Nomor</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>
				</thead>
				<tbody>
					<?php
						$qdp = mysqli_query($conn, "SELECT * FROM Detail_peminjaman where id_peminjaman='$id'");
						$i = 1;
						while ($data=mysqli_fetch_array($qdp)) {
							$idb = $data['id_barang'];
							$qb = mysqli_query($conn, "SELECT * FROM barang where id_barang='$idb'");
							$fnb = mysqli_fetch_array($qb);
					?>
						<tr>
							<td><?= $i?></td>
							<td><?= $fnb['nama']?></td>
							<td><?= $data['jumlah']?></td>
						</tr>
					<?php
						$i++;}
					?>
				</tbody>
				<tfoot>
					<td colspan="2">Total Barang</td>
					<td>
					<?php
						$qtp = mysqli_query($conn, "SELECT sum(jumlah) as totalp from Detail_peminjaman where id_peminjaman='$id'");
						$ftp = mysqli_fetch_array($qtp);
						echo $ftp['totalp'];
					?>
					</td>
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>

