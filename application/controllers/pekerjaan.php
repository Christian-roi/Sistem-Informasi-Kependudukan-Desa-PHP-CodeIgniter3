<?php


class Pekerjaan extends CI_Controller
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
        $data['title'] = 'Data Pekerjaan';
        $data['pekerjaan'] = $this->model_pekerjaan->tampil_data('tb_pekerjaan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pekerjaan/data_pekerjaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Form Input Data Pekerjaan';
        $this->form_validation->set_rules('nama', 'Nama Pekerjaan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pekerjaan/tambah_data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis')
            );
            $this->model_pekerjaan->tambah_data($data, 'tb_pekerjaan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pekerjaan Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('pekerjaan');
        }
    }

    public function edit_data($id)
    {
        $data['title'] = 'Form Edit Data Pekerjaan';
        $where = array('id' => $id);
        $this->form_validation->set_rules('nama', 'Nama Pekerjaan', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Pekerjaan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pekerjaan/edit_data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis')
            );
            $where = array('id' => $id);
            $this->model_pekerjaan->update_data($where, $data, 'tb_pekerjaan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pekerjaan Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('pekerjaan');
        }
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_pekerjaan->hapus_data($where, 'tb_pekerjaan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pekerjaan Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('pekerjaan');
    }
}
