<?php 

class GantiPassword extends CI_Controller {


  public function index()
  {
    $data['title'] = "Ganti Password";
    $this->load->view('templates_pegawai/header',$data);
    $this->load->view('templates_pegawai/sidebar');
    $this->load->view('pegawai/formGantipassword',$data);
    $this->load->view('templates_pegawai/footer');
  }
  
  public function gantiPasswordAksi()
  {
    $passBaru   = $this->input->post('passBaru');
    $ulangPass  = $this->input->post('ulangPass');

    $this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');
    $this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

    if($this->form_validation->run() != FALSE) {
      $data = array('password' => md5($passBaru));
      $id = array('id_pegawai' => $this->session->userdata('id_pegawai'));
      $this->penggajianModel->update_data('data_pegawai',$data,$id);
      $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible" role="alert col-4" style="margin-left: 20px; margin-right: 20px;">
          Password berhasil diganti !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('welcome');
    } else {
      $data['title'] = "Ganti Password";
      $this->load->view('templates_pegawai/header',$data);
      $this->load->view('templates_pegawai/sidebar');
      $this->load->view('pegawai/formGantipassword',$data);
      $this->load->view('templates_pegawai/footer');
    }
  }

}
?>