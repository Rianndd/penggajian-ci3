<?php

class PotonganGaji extends CI_Controller
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
    $data['title'] = "Setting Potongan Gaji";
    $data['pot_gaji'] = $this->penggajianModel->get_data('potongan_gaji')->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/potonganGaji', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambahData()
  {
    $data['title'] = "Tambah Potongan Gaji";
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/formPotonganGaji', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambahDataAksi()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->tambahData();
    } else {
      $potongan           = $this->input->post('potongan');
      $jml_potongan       = $this->input->post('jml_potongan');

      $data = array(
        'potongan'        => $potongan,
        'jml_potongan'    => $jml_potongan
      );

      $this->penggajianModel->insert_data($data, 'potongan_gaji');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert col-4" style="margin-left: 20px; margin-right: 20px;">
          Data berhasil ditambahkan !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('admin/potonganGaji');
    }
  }

  public function updateData($id)
  {
    $where = array('id' => $id);
    $data['title'] = "Update Potongan Gaji";
    $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = '$id'")->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/updatePotonganGaji', $data);
    $this->load->view('templates_admin/footer');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('potongan', 'jenis potongan', 'required');
    $this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
  }

  public function updateDataAksi()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->updateData();
    } else {
      $id             = $this->input->post('id');
      $potongan       = $this->input->post('potongan');
      $jml_potongan   = $this->input->post('jml_potongan');

      $data = array(
        'potongan'       => $potongan,
        'jml_potongan'   => $jml_potongan,
      );

      $where = array(
        'id' => $id
      );

      $this->penggajianModel->update_data('potongan_gaji', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert col-4" style="margin-left: 20px; margin-right: 20px;">
          Data berhasil diupdate !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
      redirect('admin/potonganGaji');
    }
  }

  public function deleteData($id)
  {
    $where = array('id' => $id);
    $this->penggajianModel->delete_data($where, 'potongan_gaji');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert col-4" style="margin-left: 20px; margin-right: 20px;">
          Data berhasil dihapus !
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
    redirect('admin/potonganGaji');
  }
}
