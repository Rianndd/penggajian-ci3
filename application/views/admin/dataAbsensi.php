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
                    <img src="<?php echo base_url('assets/photo/') . $this->session->userdata('photo') ?>" alt class="w-px-30 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?php echo base_url('assets/photo/') . $this->session->userdata('photo') ?>" alt class="w-px-30 h-auto rounded-circle" />
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
            <div class="col-md-6 col-lg-12 mb-3">
              <div class="card">
                <div class="card-header bg-primary text-white mb-3">Filter Data Absensi Pegawai</div>
                <div class="card-body">
                  <form class="row g-3">
                    <div class="col-auto">
                      <label for="staticEmail2" class="">Bulan : </label>
                      <select name="bulan" class="form-control">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                    <div class="col-auto">
                      <label for="staticEmail2" class="">Tahun : </label>
                      <select name="tahun" class="form-control">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i = 2023; $i < $tahun + 5; $i++) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary m-lg-4">Tampilkan Data</button>
                      <a href="<?php echo base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success">Input Kehadiran</a>
                    </div>
                  </form>
                </div>
              </div>
              <?php
              if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan . $tahun;
              } else {
                $bulan = date('M');
                $tahun = date('Y');
                $bulantahun = $bulan . $tahun;
              }
              ?>
              <div class="alert alert-info text-black mt-3">
                Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun : <span class="font-weight-bold"><?php echo $tahun ?></span>
              </div>
              <?php
              $jml_data = count($absensi);
              if ($jml_data > 0) {
              ?>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive text-nowrap mt-2">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>NIK</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <?php $no = 1;
                          foreach ($absensi as $a) : ?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $a->nik ?></td>
                              <td><?php echo $a->nama_pegawai ?></td>
                              <td><?php echo $a->jenis_kelamin ?></td>
                              <td><?php echo $a->jabatan ?></td>
                              <td><?php echo $a->hadir ?></td>
                              <td><?php echo $a->sakit ?></td>
                              <td><?php echo $a->alpha ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php } else { ?>
                      <span class="badge bg-danger col-12">Data masih kosong, silahkan input data kehadiran</span>
                    <?php } ?>
                    </div>
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