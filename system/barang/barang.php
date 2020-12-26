			<a class="navbar-brand" href="#"> Data Barang </a>
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
                  <h4 class="card-title">Data Barang</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="material-icons">note_add</i>
                  </button>
                  <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Barang</th>
                                  <th>Stok Barang</th>
                                  <th>Tempat</th>
                                  <th class="disabled-sorting" style="text-align: center;">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php

                         $query = mysqli_query($conn, "SELECT * FROM barang");
                         $i = 1;
                         while ($data=mysqli_fetch_array($query)) {
                           $id = $data['id_barang'];
                           
                           ?>
                           <tr>
                            <td><?= $i?></td>
                            <td><?= $data['nama']?></td>
                            <td><?= $data['stok']?></td>
                            <td><?= $data['tempat']?></td>
                            <td style="text-align: center;">
                              <a data-toggle="modal" data-target="#edit<?= $data['id_barang']?>" class="btn btn-warning"><i class="material-icons">library_add</i></a>
                              <a class="btn btn-danger" onclick="hapus('barang/hapus.php?id=<?= $id?>')"><i class="material-icons">close</i></a>
                              <a href="home.php?menu=2&idb=<?= $data['id_barang']?>" class="btn btn-success"><i class="material-icons">assignment</i></a>
                            </td>
                          </tr>
                          <div class="modal fade" id="edit<?= $data['id_barang']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="barang/edit.php" method="POST">
                                   <input type="hidden" name="id" value="<?= $data['id_barang']?>">
                                   <input type="hidden" name="asal" value="<?= $data['stok']?>">
                                   <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $data['nama']?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Stok Barang</label>
                                    <input type="number" class="form-control" name="stok" value="<?= $data['stok']?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Tempat</label>
                                    <input type="text" class="form-control" name="tempat" value="<?= $data['tempat']?>" required>
                                  </div>
                                  <?php
                                    $qrusak = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$id' and kondisi='Rusak'");
                                    $jrusak = mysqli_num_rows($qrusak);
                                  ?>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Jumlah Barang Rusak</label>
                                    <input type="text" class="form-control" name="jrusak" value="<?= $jrusak?>" required>
                                  </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                  </form>
                                </div>
                            </div>
                          </div>
                        <?php
                        $i++;}
                        ?>
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- end content-->
          </div>
          <!--  end card  -->
      </div>
      <div class="col-md-12">
          <div class="card">
              <div class="card-header card-header-icon" data-background-color="purple">
                  <i class="material-icons">assignment</i>
              </div>
              <div class="card-content">
                  <h4 class="card-title">Data Detail Barang</h4>
                  <div class="material-datatables">
                      <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Barang</th>
                                  <th>Rusak</th>
                                  <th>Bagus</th>
                                  <th>Dipinjam</th>
                                  <th>Tersedia</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php

                               if (isset($_GET['idb'])) {
                                 $idb = $_GET['idb'];
                                 $query = mysqli_query($conn, "SELECT * FROM detail_barang where id_barang='$idb' group by id_barang asc");
                                 $i = 1;
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
                                    <td><?= $i?></td>
                                    <td><?= $nama['nama']?></td>
                                    <td><?= $jrusak?></td>
                                    <td><?= $jbagus?></td>
                                    <td><?= $jdip?></td>
                                    <td><?= $jter?></td>
                                    <td>
                                      <a href="barang/ebarang.php?id=<?= $id?>" class="btn btn-info"><i class="material-icons">note_add</i></a>
                                    </td>
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
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="barang/tambah.php" method="POST">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Barang</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Stok Barang</label>
            <input type="number" class="form-control" name="stok" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tempat</label>
            <input type="text" class="form-control" name="tempat" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>