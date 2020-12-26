      <a class="navbar-brand" href="#"> Data Pengguna </a>
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
            <h4 class="card-title">Data Pengguna</h4>
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
                    <th>Nama Pengguna</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th class="disabled-sorting" style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 <?php

                 $query = mysqli_query($conn, "SELECT * FROM user");
                 $i = 1;
                 while ($data=mysqli_fetch_array($query)) {

                   ?>
                   <tr>
                    <td><?= $i?></td>
                    <td><?= $data['nama_user']?></td>
                    <td><?= $data['jabatan']?></td>
                    <td><?= $data['username']?></td>
                    <td><?= $data['password']?></td>
                    <td style="text-align: center;">
                      <a data-toggle="modal" data-target="#edit<?= $data['id_user']?>" class="btn btn-warning"><i class="material-icons">library_add</i></a>
                      <a href="pengguna/hapus.php?id=<?= $data['id_user']?>" class="btn btn-danger"><i class="material-icons">close</i></a>
                    </td>
                  </tr>
                <div class="modal fade" id="edit<?= $data['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="pengguna/edit.php" method="POST">
                          <input type="hidden" name="id" value="<?= $data['id_user']?>">
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Pengguna</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['nama_user']?>" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Jabatan</label>
                            <select class="form-control" data-style="btn btn-primary" name="jabatan" required>
                              <option value="<?= $data['jabatan']?>">---</option>
                              <option value="Admin">Admin</option>
                              <option value="Kepala Sekolah">Kepala Sekolah</option>
                              <option value="Petugas">Petugas</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Username</label>
                            <input type="text" class="form-control" name="user" value="<?= $data['username']?>" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" class="form-control" name="pass" value="<?= $data['password']?>" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="pengguna/tambah.php" method="POST">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Pengguna</label>
            <input type="text" class="form-control" name="nama" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Jabatan</label>
            <select class="selectpicker" data-style="btn btn-primary" data-size="7" name="jabatan" required>
              <option disabled selected>Jabatan</option>
              <option value="Admin">Admin</option>
              <option value="Kepala Sekolah">Kepala Sekolah</option>
              <option value="Petugas">Petugas</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" class="form-control" name="user" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" name="pass" required>
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
