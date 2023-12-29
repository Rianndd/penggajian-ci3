<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
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
            <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Update Data Jabatan</h5>
                    </div>
                    <div class="card-body">
                      <?php foreach($jabatan as $j) : ?>
                      <form action="<?php echo base_url('admin/dataJabatan/updateDataAksi') ?>" method="POST" >
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Jabatan</label>
                          <div class="col-sm-10">
                            <input type="hidden" name="id_jabatan" class="form-control" id="basic-default-name" value="<?php echo $j->id_jabatan ?>" placeholder="Masukkan Jabatan">
                            <input type="text" name="nama_jabatan" class="form-control" id="basic-default-name" value="<?php echo $j->nama_jabatan ?>" placeholder="Masukkan Jabatan">
                            <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Gaji Pokok</label>
                          <div class="col-sm-10">
                            <input type="number" name="gaji_pokok" class="form-control" id="basic-default-name" value="<?php echo $j->gaji_pokok ?>" placeholder="Masukkan Gaji Pokok">
                            <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tunjangan Transport</label>
                          <div class="col-sm-10">
                            <input type="number" name="tj_transport" class="form-control" id="basic-default-name" value="<?php echo $j->tj_transport ?>" placeholder="Masukkan Tunjangan Transport">
                            <?php echo form_error('tj_transport','<div class="text-small text-danger"></div>') ?>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Uang Makan</label>
                          <div class="col-sm-10">
                            <input type="number" name="uang_makan" class="form-control" id="basic-default-name" value="<?php echo $j->uang_makan ?>" placeholder="Masukkan Uang Makan">
                            <?php echo form_error('uang_makan','<div class="text-small text-danger"></div>') ?>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                      <?php endforeach; ?>
                    </div>
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
