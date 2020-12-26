			<a class="navbar-brand" href="#"> Data Peminjam </a>
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
            <h4 class="card-title">Data Peminjam</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              <i class="material-icons">note_add</i>
            </button>
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th class="disabled-sorting" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                 $query = mysqli_query($conn, "SELECT * FROM peminjam");
                 $i = 1;
                 while ($data=mysqli_fetch_array($query)) {

                   ?>
                   <tr>
                    <td><?= $i?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['alamat']?></td>
                    <td><?= $data['no_telp']?></td>
                    <td><?= $data['email']?></td>
                    <td style="text-align: center;">
                      <a data-toggle="modal" data-target="#edit<?= $data['id_peminjam']?>" class="btn btn-warning"><i class="material-icons">library_add</i></a>
                      <a onclick="hapus('peminjam/hapus.php?id=<?= $data['id_peminjam']?>')" class="btn btn-danger"><i class="material-icons">close</i></a>
                    </td>
                  </tr>
                  <div class="modal fade" id="edit<?= $data['id_peminjam']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Peminjam</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="peminjam/edit.php" method="POST">
                           <input type="hidden" name="id" value="<?= $data['id_peminjam']?>">
                           <div class="form-group">
                            <label for="exampleFormControlInput1">Nama peminjam</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['nama']?>" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $data['alamat']?>" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Telepon</label>
                            <input type="number" class="form-control" name="no_telp" value="<?= $data['no_telp']?>" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $data['email']?>" required>
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
    <!-- end col-md-12 -->
  </div>
  <!-- end row -->
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peminjam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="peminjam/tambah.php" method="POST">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Peminjam</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat</label>
            <input type="text" class="form-control" name="alamat"required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Telepon</label>
            <input type="number" class="form-control" name="no_telp" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email" required>
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
