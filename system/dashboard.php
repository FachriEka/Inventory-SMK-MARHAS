		<a class="navbar-brand" href="#"> Dashboard </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="separator hidden-lg hidden-md"></li>
      </ul>
    </div>
  </div>
</nav>
<?php 
	$qb = mysqli_query($conn, "SELECT * FROM Barang");
	$barang = mysqli_num_rows($qb);
	$qp = mysqli_query($conn, "SELECT * FROM Peminjaman");
	$peminjaman = mysqli_num_rows($qp);
	$qp1 = mysqli_query($conn, "SELECT * FROM Peminjam");
	$peminjam = mysqli_num_rows($qp1);

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">redeem</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Jumlah Barang</p>
                        <h3 class="card-title"><?= $barang?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Jumlah Peminjaman</p>
                        <h3 class="card-title"><?= $peminjaman?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Jumlah Peminjam</p>
                        <h3 class="card-title"><?= $peminjam?></h3>
                    </div>
                </div>
            </div>
            <?php 
              if ($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Kepala Sekolah") {
            ?>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">equalizer</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Grafik Data Peminjaman</h4>
                        <canvas id="pemChart"></canvas>
                  </div>                  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                  <div class="card-header card-header-icon" data-background-color="purple">
                      <i class="material-icons">assignment</i>
                  </div>
                  <div class="card-content">
                      <h4 class="card-title">Peminjaman Terbaru</h4>
                      <div class="material-datatables">
                      <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Peminjam</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $q = mysqli_query($conn, "SELECT * FROM peminjaman order by id_peminjaman desc limit 5");
                              while ($data=mysqli_fetch_array($q)) {
                                $idp = $data['id_peminjam'];
                                $datap = mysqli_fetch_array(mysqli_query($conn, "SELECT * from peminjam where id_peminjam='$idp'"));
                            ?>
                            <tr>
                                <td><?= $datap['nama']?></td>
                                <td><?= $data['tgl_pinjam']?></td>
                                <td><?= $data['jumlah']?></td>
                            </tr>
                            <?php
                              }
                            ?>
                        </tbody>
                      </table>
                      </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">pie_chart</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title" id="jrusak">Grafik Data Semua Barang</h4>
                        <div class="col-lg-6">
                          <canvas id="brskChart"></canvas> 
                        </div>
                        <div class="col-lg-6">
                          <table id="customtables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Terpeminjam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  if (isset($_POST['brng'])) {
                                    $id = $_POST['idbrng'];
                                    if ($id == "all") {
                                      $qbj = mysqli_query($conn, "SELECT *,sum(jumlah) as total FROM detail_peminjaman group by id_barang limit 5");
                                    }else{
                                      $qbj = mysqli_query($conn, "SELECT *,sum(jumlah) as total FROM detail_peminjaman where id_barang='$id' group by id_barang");
                                    }
                                  }else{
                                    $qbj = mysqli_query($conn, "SELECT *,sum(jumlah) as total FROM detail_peminjaman group by id_barang limit 5");
                                  }
                                  $i = 1;
                                  while ($dbj=mysqli_fetch_array($qbj)) {
                                    $id = $dbj['id_barang'];
                                    $qnb = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Barang where id_barang='$id'"));
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $qnb['nama']?></td>
                                    <td><?= $dbj['total']?></td>
                                </tr>
                                <?php
                                  $i++;}
                                ?>
                            </tbody>
                          </table>
                        </div>
                        <hr">                      
                        <form action="" method="POST">
                          <div class="form-group col-lg-4">
                            <select class="selectpicker" name="idbrng" data-style="btn btn-success">
                              <option value="all">Semua</option>
                              <?php 
                                $qb = mysqli_query($conn, "SELECT * FROM Barang");
                                while ($data=mysqli_fetch_array($qb)) {
                              ?>
                                <option value="<?= $data['id_barang']?>"><?= $data['nama']?></option>
                              <?php
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group col-lg-2">
                            <button class="btn btn-success" type="submit" name="brng" value="ada">Submit</button>
                          </div>
                        </form>                        
                  </div>                  
                </div>
            </div>
            <?php
            }else if ($_SESSION['level'] == "Petugas"){
            ?>
              <div class="col-lg-12">
                <div class="card btn btn-primary">
                  <div class="card-content">
                    <center><h1><b>Selamat Datang </b></h1></center>
                    <center><h3>di Program Inventory SMK MARHAS Margahayu</h3></center>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>