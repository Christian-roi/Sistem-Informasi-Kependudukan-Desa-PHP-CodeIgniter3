<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }

    public function sampah()
    {
        $data['title'] = 'Data Sampah Penduduk';
        $data['penduduk'] = $this->model_penduduk->tampil_sampah()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('penduduk/sampah_penduduk', $data);
        $this->load->view('templates/footer');
    }

    public function restore($id)
    {
        $where = array('id' => $id);
        $this->model_penduduk->restore_data($where, 'tb_penduduk');
        redirect('admin/sampah');
    }

    public function hapus_permanen($id)
    {
        $where = array('id' => $id);
        $this->model_penduduk->hapus_permanen($where, 'tb_penduduk');
        redirect('admin/sampah');
    }

    public function user()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->model_user->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('user');
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $role = $this->input->post('role');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data = array(
                'nama' => $nama,
                'role' => $role,
                'username' => $username,
                'password' => $password
            );

            $this->model_user->tambah_data($data, 'tb_user');

            redirect('admin/user');
        }
    }

    public function edit_data_user($id)
    {
       $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama'),
            'role' => $this->input->post('role'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $where = array(
            'id' => $id
        );

        $this->model_user->update_data($where, $data, 'tb_user');
        redirect('admin/user');
    }

    public function hapus_user($id)
    {
        $where = array('id' => $id);
        $this->model_user->hapus_data($where, 'tb_user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Pengguna Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/user');
    }
}