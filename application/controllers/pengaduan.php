<?php

class Pengaduan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('role') != '1' && $this->session->userdata('role') != '2') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('auth/login');
    }
  }
  public function index()
  {
    $data['title'] = 'Pengaduan';
    $data['pengaduan'] = $this->model_pengaduan->tampil_data()->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('pengaduan/data_pengaduan', $data);
    $this->load->view('templates/footer');
  }

  public function hapus($id)
  {
    $where = array('id' => $id);
    $this->model_pengaduan->hapus($where, 'tb_pengaduan');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('pengaduan/index');
  }
}
