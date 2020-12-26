<!DOCTYPE html>
<html>
<head>
	<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
	<title></title>
</head>
<body>
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Barang.xls");
	?>
	<div class="row">
		<div class="col-md-6">
			<table border="1px">
				<tr>
		            <th>Nama Barang</th>
		            <th>Jumlah Rusak</th>
		            <th>Jumlah Bagus</th>
		            <th>Jumlah Dipinjam</th>
		            <th>Jumlah Tersedia</th>
				</tr>
			<?php
			    include '../../config/koneksi.php';
			    $id = $_GET['id'];
			    $query = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' group by id_barang");
			    while ($data=mysqli_fetch_array($query)) {
					$id = $data['id_barang'];
					$qnama = mysqli_query($conn, "SELECT * FROM barang where id_barang='$id'");
					$nama = mysqli_fetch_array($qnama);
					$qrusak = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and kondisi='Rusak'");
					$jrusak = mysqli_num_rows($qrusak);
					$qbagus = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and kondisi='Bagus'");
					$jbagus = mysqli_num_rows($qbagus);
					$qdip = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Dipinjam'");
					$jdip = mysqli_num_rows($qdip);
					$qter = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and status='Tersedia'");
					$jter = mysqli_num_rows($qter);
				?>
					<tr>
						<td><?= $nama['nama']?></td>
						<td><?= $jrusak?></td>
						<td><?= $jbagus?></td>
						<td><?= $jdip?></td>
						<td><?= $jter?></td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
		<div class="col-md-6">
			<table border="1px">
				<tr>
					<th>No</th>
		            <th>Nama Barang</th>
		            <th>Harga</th>
		            <th>Keterangan</th>
				</tr>
				<?php
				    include '../../config/koneksi.php';
				    $id = $_GET['id'];
				    $query = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id'");
				    $i = 1;
				    while($data=mysqli_fetch_array($query)){
				    	$id = $data['id_barang'];
		            	$qnama = mysqli_query($conn, "SELECT * FROM barang where id_barang='$id'");
		            	$nama = mysqli_fetch_array($qnama);
				?>  
				<tr style="text-align: center;">
				    <td><?= $i?></td>
				    <td><?= $nama['nama']?></td>
				    <td><?= $data['kondisi']?></td>
				    <td><?= $data['status']?></td>
				</tr>
				<?php
				    $i++;}
				?>
			</table>
		</div>
	</div>
<script type="text/javascript">
	window.location = "../home.php?menu=2";
</script>
</body>
</html>