    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Search -->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
            </li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600 small"><?= ucfirst($this->fungsi->user_login()->username) ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('uploads/gambar/' .  $this->fungsi->user_login()->gambar) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <!-- Content Row -->
          <div class="container">
            <div class="row">
              <div class="col-md">
                <div class="card">
                  <div class="card-header text-center">
                    Data User
                  </div>
                  <?php $this->view('message'); ?>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm- p-2">
                        <a class="btn btn-primary" href="<?= base_url('user/add') ?>"><i class="fas fa-user-plus"></i> Tambah Data</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Adress</th>
                            <th>Level</th>
                            <th>Gambar</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1 ?>
                          <?php foreach ($row->result() as $key => $data) : ?>
                            <tr>
                              <td><?= $no++ ?>.</td>
                              <td><?= $data->username ?></td>
                              <td><?= $data->name ?></td>
                              <td><?= $data->address ?></td>
                              <td><?= $data->level == 1 ? "Admin" : "Member" ?></td>
                              <td>
                                <?php if ($data->gambar != null) : ?>
                                  <img src="<?= base_url('uploads/gambar/' . $data->gambar) ?>" width="50" height="50">
                                <?php endif; ?>
                              </td>
                              <td>
                                <form action="<?= base_url('user/del') ?>" method="post">
                                  <a class="badge badge-warning" href="<?= base_url('user/edit/' . $data->user_id) ?>">Ubah</a>
                                  <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                  <?php if ($this->fungsi->user_login()->username != $data->username) { ?>
                                    <button onclick="return confirm('Apakah anda yakin?');" class="badge badge-danger">Hapus</button>
                                  <?php } ?>
                                </form>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; jhon_grsng <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Tekan Logout di bawah jika anda ingin keluar.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>