<?php

class Dusun extends CI_Controller
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
        $data['title'] = 'Dusun';
        $data['dusun'] = $this->model_dusun->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dusun/data_dusun', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $nama_dusun = $this->input->post('nama_dusun');
        $nama_kadus = $this->input->post('nama_kadus');
        $foto = $_FILES['foto']['name'];

        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_dusun' => $nama_dusun,
            'nama_kadus' => $nama_kadus,
            'foto' => $foto
        );

        $this->model_dusun->tambah_data($data, 'tb_dusun');

        redirect('dusun/index');
        
    }

    public function edit($id)
    {
        $where = array('id_dusun' => $id);
        $data['title'] = 'Edit Dusun';
        $data['dusun'] = $this->model_dusun->edit_data($where, 'tb_dusun')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dusun/edit_dusun', $data);
        $this->load->view('templates/footer');
    }

    public function update_data()
    {
        $id_dusun = $this->input->post('id_dusun');
        $nama_dusun = $this->input->post('nama_dusun');
        $nama_kadus = $this->input->post('nama_kadus');

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')){
            $data = array(
                'nama_dusun' => $nama_dusun,
                'nama_kadus' => $nama_kadus
            );

            $where = array(
                'id_dusun' => $id_dusun
            );

            $this->model_dusun->update_data($where, $data, 'tb_dusun');
            redirect('dusun/index');

        }else{
            $data = array(
                'nama_dusun' => $nama_dusun,
                'nama_kadus' => $nama_kadus,
                'foto' => $this->upload->data('file_name')
            );

            $where = array(
                'id_dusun' => $id_dusun
            );

            $this->model_dusun->update_data($where, $data, 'tb_dusun');
            redirect('dusun/index');
        }

    }

    public function hapus($id)
    {
        $where = array('id_dusun' => $id);
        $this->model_dusun->hapus_data($where, 'tb_dusun');
        redirect('dusun/index');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Dusun';
        $data['dusun'] = $this->model_dusun->detail_data($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dusun/detail_dusun', $data);
        $this->load->view('templates/footer');
    }
}