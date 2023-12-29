<?php

class SlipGaji extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('hak_akses') != '1') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert col-4" style="margin-left: 20px; margin-right: 20px;">
          Anda belum login !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('welcome');
    }
  }

  public function index()
  {
    $data['title'] = "Filter Slip Gaji Pegawai";
    $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/filterSlipGaji', $data);
    $this->load->view('templates_admin/footer');
  }

  public function cetakSlipGaji()
  {
    $data['title'] = 'Cetak Slip Gaji';
    $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
    $nama = $this->input->post('nama_pegawai');
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
      $bulan = $_GET['bulan'];
      $tahun = $_GET['tahun'];
      $bulantahun = $bulan . $tahun;
    } else {
      $bulan = date('m');
      $tahun = date('Y');
      $bulantahun = $bulan . $tahun;
    }
    $bulantahun = $bulan . $tahun;

    $data['print_slip'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_jabatan.nama_jabatan,
    data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan 
    FROM data_pegawai
    INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik 
    INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
    WHERE data_kehadiran.bulan = '$bulantahun' AND data_kehadiran.nama_pegawai = '$nama'
    ")->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('admin/cetakSlipGaji', $data);
  }
}
