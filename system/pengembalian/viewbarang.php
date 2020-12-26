			<a class="navbar-brand" href="#"> Data Pengembalian </a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="separator hidden-lg hidden-md"></li>
      </ul>
    </div>
  </div>
</nav>
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengembalian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pengembalian/tambahpengembalian.php" method="POST">
          <div class="form-group">
           <?php
             $query = mysqli_query($conn, "SELECT * FROM peminjaman where status='Dipinjam'"); 
           ?>
              <label for="exampleFormControlSelect1">ID Peminjaman</label>
              <select class="selectpicker" data-style="btn btn-primary" title="Single Select" data-size="7" name="idpem" required>
                  <option disabled selected>List ID Peminjaman</option>
                  <?php
                      while($row=mysqli_fetch_array($query)){
                  ?>
                  <option value="<?= $row['id_peminjaman']?>"><?= $row['id_peminjaman']?></option>
                  <?php               
                      }
                  ?>
              </select>
          </div>
          <div class="form-group">
            <?php
              $query = mysqli_query($conn, "SELECT sum(jumlah) as jumlah FROM detail_pengembalian where id_pengembalian='0'");
              $count = mysqli_fetch_array($query);
            ?>
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" value="<?= $count['jumlah']?>" readonly required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">List Barang</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              <span>Tambah Barang</span>
            </button>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang Bagus</th>
                    <th>Jumlah Barang Rusak</th>
                    <th>Jumlah </th>
                    <th class="disabled-sorting" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                 $query = mysqli_query($conn, "SELECT * FROM detail_pengembalian where id_pengembalian='0'");
                 $i = 1;
                 while ($data=mysqli_fetch_array($query)) {
                      $id = $data['id_barang'];
                      $qnb = mysqli_query($conn, "SELECT nama from barang where id_barang='$id'");
                      $fnb = mysqli_fetch_array($qnb);
                   ?>
                   <tr>
                    <td><?= $i?></td>
                    <td><?= $fnb['nama']?></td>
                    <td><?= $data['bagus']?></td>
                    <td><?= $data['rusak']?></td>
                    <td><?= $data['jumlah']?></td>
                    <td style="text-align: center;">
                      <a data-toggle="modal" data-target="#edit<?= $data['id_detail_pengembalian']?>" class="btn btn-warning"><i class="material-icons">library_add</i></a>
                      <a class="btn btn-danger" onclick="hapus('pengembalian/hapusbarang.php?id=<?= $id?>')"><i class="material-icons">close</i></a>
                    </td>
                  </tr>
                  <div class="modal fade" id="edit<?= $data['id_detail_pengembalian']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah Data barang</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="pengembalian/ubahbarang.php" method="POST">
                            <input type="hidden" name="id" value="<?= $data['id_detail_pengembalian']?>">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nama Barang</label>
                              <input type="text" class="form-control" value="<?= $fnb['nama']?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Jumlah Barang Bagus</label>
                              <input type="number" class="form-control" name="bagus" value="<?= $data['bagus']?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Jumlah Barang Rusak</label>
                              <input type="number" class="form-control" name="rusak" value="<?= $data['rusak']?>">
                            </div>        
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
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
    </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">Konfirmasi Pengembalian</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalConfirm">
              <span>Konfirmasi</span>
            </button>
          </div>
        </div>
        <!-- end content-->
      </div>
      <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pengembalian/tambahbarang.php" method="POST">
          <div class="form-group">
           <?php
             $query = mysqli_query($conn, "SELECT * FROM barang"); 
           ?>
              <label for="exampleFormControlSelect1">Nama Barang</label>
              <select class="selectpicker" data-style="btn btn-primary" title="Single Select" data-size="7" name="id" required="">
                  <option disabled selected>Nama Barang</option>
                  <?php
                      while($row=mysqli_fetch_array($query)){
                  ?>
                  <option value="<?= $row['id_barang']?>"><?= $row['nama']?></option>
                  <?php               
                      }
                  ?>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah Barang Bagus</label>
            <input type="number" class="form-control" name="bagus" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah Barang Rusak</label>
            <input type="number" class="form-control" name="rusak" required>
          </div>        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

