<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <h3>pancake</h3>
              </div>
            </div>
            <!-- /Search -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?php echo base_url('assets/photo/').$this->session->userdata('photo') ?>" alt class="w-px-30 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?php echo base_url('assets/photo/').$this->session->userdata('photo') ?>" alt class="w-px-30 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $this->session->userdata('nama_pegawai') ?></span>
                            <small class="text-muted"><?php echo $this->session->userdata('jabatan') ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?php echo base_url('welcome/logout') ?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <h5 class="card-header">Data Pegawai</h5>
              <a href="<?php echo base_url('admin/dataPegawai/tambahData') ?>" class="btn btn-primary col-4 mb-2" style="margin-left: 20px;">Tambah Data</a>
              <?php echo $this->session->flashdata('pesan') ?>
              <div class="table-responsive text-nowrap mt-2">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NIK</th>
                      <th>Nama Pegawai</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>Tanggal Masuk</th>
                      <th>Status</th>
                      <th>Photo</th>
                      <th>Hak Akses</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php $no = 1;
                    foreach ($pegawai as $p) : ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $p->nik ?></td>
                        <td><?php echo $p->nama_pegawai ?></td>
                        <td><?php echo $p->jenis_kelamin ?></td>
                        <td><?php echo $p->jabatan ?></td>
                        <td><?php echo $p->tanggal_masuk ?></td>
                        <td><?php echo $p->status ?></td>
                        <td><img src="<?php echo base_url() . 'assets/photo/' . $p->photo ?>" width="75" height="75"></td>
                        <?php if ($p->hak_akses == '1') { ?>
                          <td>Admin</td>
                        <?php } else { ?>
                          <td>Pegawai</td>
                        <?php } ?>
                        <td>
                          <a class="btn btn-icon btn-primary" href="<?php echo base_url('admin/dataPegawai/updateData/' . $p->id_pegawai) ?>"><i class="bx bx-edit-alt me-1"></i></a>
                          <a onclick="return confirm('Yakin Hapus ?')" class="btn btn-icon btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/' . $p->id_pegawai) ?>"><i class="bx bx-trash me-1"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- / Content -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo base_url() ?>assets/sneat/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo base_url() ?>assets/sneat/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/sneat/assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url() ?>assets/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url() ?>assets/sneat/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->
  <!-- Vendors JS -->
  <script src="<?php echo base_url() ?>assets/sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <!-- Main JS -->
  <script src="<?php echo base_url() ?>assets/sneat/assets/js/main.js"></script>
  <!-- Page JS -->
  <script src="<?php echo base_url() ?>assets/sneat/assets/js/dashboards-analytics.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>