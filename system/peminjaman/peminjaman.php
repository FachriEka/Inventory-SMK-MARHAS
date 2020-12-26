			<a class="navbar-brand" href="#"> Data Peminjaman </a>
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
            <h4 class="card-title">Data Peminjaman</h4>
            <a href="home.php?menu=7" class="btn btn-primary"><i class="material-icons">note_add</i></a>
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>ID Peminjaman</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Jumlah Barang</th>
                    <th>Status</th>
                    <th>Nama User</th>
                    <th class="disabled-sorting" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                 $query = mysqli_query($conn, "SELECT * FROM peminjaman");
                 while ($data=mysqli_fetch_array($query)) {
                      $idp = $data['id_peminjam'];
                      $qnp = mysqli_query($conn, "SELECT nama from peminjam where id_peminjam='$idp'");
                      $fnp = mysqli_fetch_array($qnp);
                      $idu = $data['id_user'];
                      $qnu = mysqli_query($conn, "SELECT nama_user from user where id_user='$idu'");
                      $fnu = mysqli_fetch_array($qnu);
                   ?>
                   <tr>
                    <td><?= $data['id_peminjaman']?></td>
                    <td><?= $fnp['nama']?></td>
                    <td><?= $data['tgl_pinjam']?></td>
                    <td><?= $data['jumlah']?></td>
                    <td><?= $data['status']?></td>
                    <td><?= $fnu['nama_user']?></td>
                    <td>
                        <a href="home.php?menu=5&id=<?= $data['id_peminjaman']?>" class="btn btn-success"><i class="material-icons">assignment</i></a>
                    </td>
                  </tr>
                <?php
                  }
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
            <h4 class="card-title">Data Detail Peminjaman</h4>
            <div class="material-datatables">
              <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                  </tr>
                </thead>
                <tbody>
                 <?php  
                    if (isset($_GET['id'])) {
                      $idpem = $_GET['id'];

                     $query = mysqli_query($conn, "SELECT * FROM detail_peminjaman where id_peminjaman='$idpem'");
                     $i = 1;
                     while ($data=mysqli_fetch_array($query)) {
                          $idb = $data['id_barang'];
                          $qnb = mysqli_query($conn, "SELECT nama from barang where id_barang='$idb'");
                          $fnb = mysqli_fetch_array($qnb);
                       ?>
                       <tr>
                        <td><?= $i?></td>
                        <td><?= $fnb['nama']?></td>
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
<?php


                ?>