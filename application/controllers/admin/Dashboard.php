<?php

class Dashboard extends CI_Controller {

  public function __construct() {
      parent::__construct();

      if($this->session->userdata('hak_akses') !='1') {
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible" role="alert col-4" style="margin-left: 20px; margin-right: 20px;">
						Anda belum login !
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>');
				redirect('welcome');
    }
  }
  
  public function index()
  {
    $data['title'] = "Dashboard";
    //pegawai
    $pegawai = $this->db->query("SELECT * FROM data_pegawai");
    $data['pegawai'] = $pegawai->num_rows();
    //admin
    $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
    $data['admin'] = $admin->num_rows();
    //jabatan
    $jabatan = $this->db->query("SELECT * FROM data_jabatan");
    $data['jabatan'] = $jabatan->num_rows();
    //kehadiran
    $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
    $data['kehadiran'] = $kehadiran->num_rows();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard',$data);
    $this->load->view('templates_admin/footer');
  }
}

?>