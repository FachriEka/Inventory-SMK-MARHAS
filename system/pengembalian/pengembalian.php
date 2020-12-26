			<a class="navbar-brand" href="#"> Data Pengembalian </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="separator hidden-lg hidden-md"></li>
      </ul>
    </div>
  </div>
</nav>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">Data Pengembalian</h4>
            <a href="home.php?menu=8" class="btn btn-primary"><i class="material-icons">note_add</i></a>
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Nama User</th>
                    <th class="disabled-sorting" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                 $query = mysqli_query($conn, "SELECT * FROM pengembalian");
                 $i = 1;
                 while ($data=mysqli_fetch_array($query)) {
                      $idu = $data['id_user'];
                      $qnu = mysqli_query($conn, "SELECT nama_user from user where id_user='$idu'");
                      $fnu = mysqli_fetch_array($qnu);
                   ?>
                   <tr>
                    <td><?= $i?></td>
                    <td><?= $data['id_peminjaman']?></td>
                    <td><?= $data['tgl_pengembalian']?></td>
                    <td><?= $fnu['nama_user']?></td>
                    <td>
                        <a href="home.php?menu=6&id=<?= $data['id_pengembalian']?>" class="btn btn-success"><i class="material-icons">assignment</i></a>
                    </td>
                  </tr>
                <?php
                $i++;}

                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- end content-->
      </div>
    </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">Data Detail Pengembalian</h4>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang Bagus</th>
                    <th>Jumlah Barang Rusak</th>
                    <th>Total Jumlah Barang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (isset($_GET['id'])) {
                      $idp = $_GET['id'];
                       $query = mysqli_query($conn, "SELECT * FROM detail_pengembalian where id_pengembalian='$idp'");
                       $i = 1;
                       while ($data=mysqli_fetch_array($query)) {
                            $idb = $data['id_barang'];
                            $qnb = mysqli_query($conn, "SELECT nama from barang where id_barang='$idb'");
                            $fnb = mysqli_fetch_array($qnb);
                         ?>
                         <tr>
                          <td><?= $i?></td>
                          <td><?= $fnb['nama']?></td>
                          <td><?= $data['bagus']?></td>
                          <td><?= $data['rusak']?></td>
                          <td><?= $data['jumlah']?></td>
                        </tr>
                      <?php
                      $i++;}

                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>
</div>