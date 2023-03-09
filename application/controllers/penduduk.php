<?php

class Penduduk extends CI_Controller
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
        $data['title'] = 'Penduduk';
        $data['penduduk'] = $this->model_penduduk->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('penduduk/data_penduduk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data()
    {
        $nik = $this->input->post('nik');
        $no_kk = $this->input->post('no_kk');
        $nama_lengkap = strtoupper($this->input->post('nama_lengkap'));
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $agama = $this->input->post('agama');
        $pendidikan_akhir = $this->input->post('pendidikan_akhir');
        $pekerjaan = $this->input->post('pekerjaan');
        $gol_darah = $this->input->post('gol_darah');
        $status_perkawinan = $this->input->post('status_perkawinan');
        $status_dalam_keluarga = $this->input->post('status_dalam_keluarga');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $status_hidup = $this->input->post('status_hidup');
        $nama_ayah = strtoupper($this->input->post('nama_ayah'));
        $nama_ibu = strtoupper($this->input->post('nama_ibu'));
        $dusun = $this->input->post('dusun');
        $alamat = $this->input->post('alamat');
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
            'nik' => $nik,
            'no_kk' => $no_kk,
            'nama_lengkap' => $nama_lengkap,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'pendidikan_akhir' => $pendidikan_akhir,
            'pekerjaan' => $pekerjaan,
            'gol_darah' => $gol_darah,
            'status_perkawinan' => $status_perkawinan,
            'status_dalam_keluarga' => $status_dalam_keluarga,
            'kewarganegaraan' => $kewarganegaraan,
            'status_hidup' => $status_hidup,
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'dusun' => $dusun,
            'alamat' => $alamat,
            'foto' => $foto
        );

        $this->model_penduduk->tambah_data($data, 'tb_penduduk');
        redirect('penduduk/index');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Data Penduduk';
        $where = array('id' => $id);
        $data['penduduk'] = $this->model_penduduk->edit_data($where, 'tb_penduduk')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('penduduk/edit_penduduk', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('foto')){
            $data = array(
                'nik' => $this->input->post('nik'),
                'no_kk' => $this->input->post('no_kk'),
                'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'agama' => $this->input->post('agama'),
                'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'gol_darah' => $this->input->post('gol_darah'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'status_dalam_keluarga' => $this->input->post('status_dalam_keluarga'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                'status_hidup' => $this->input->post('status_hidup'),
                'nama_ayah' => strtoupper($this->input->post('nama_ayah')),
                'nama_ibu' => strtoupper($this->input->post('nama_ibu')),
                'dusun' => $this->input->post('dusun'),
                'alamat' => $this->input->post('alamat'),
            );

            $where = array('id' => $id);
            $this->model_penduduk->update_data($where, $data, 'tb_penduduk');
            redirect('penduduk/index');
        }else{
            $data = array(
                'nik' => $this->input->post('nik'),
                'no_kk' => $this->input->post('no_kk'),
                'nama_lengkap' => strtoupper($this->input->post('nama_lengkap')),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'agama' => $this->input->post('agama'),
                'pendidikan_akhir' => $this->input->post('pendidikan_akhir'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'gol_darah' => $this->input->post('gol_darah'),
                'status_perkawinan' => $this->input->post('status_perkawinan'),
                'status_dalam_keluarga' => $this->input->post('status_dalam_keluarga'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                'status_hidup' => $this->input->post('status_hidup'),
                'nama_ayah' => strtoupper($this->input->post('nama_ayah')),
                'nama_ibu' => strtoupper($this->input->post('nama_ibu')),
                'dusun' => $this->input->post('dusun'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $this->upload->data('file_name')
            );

            $where = array('id' => $id);
            $this->model_penduduk->update_data($where, $data, 'tb_penduduk');
            redirect('penduduk/index');
        }

    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_penduduk->hapus_data($where, 'tb_penduduk');
        redirect('penduduk/index');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Penduduk';
        $this->load->model('model_penduduk');
        $data['penduduk'] = $this->model_penduduk->detail_data($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('penduduk/detail_penduduk', $data);
        $this->load->view('templates/footer');
    }

    public function data_keluarga()
    {
        $data['title'] = 'Data Keluarga';
        $data['penduduk'] = $this->model_penduduk->tampil_data('tb_penduduk')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('penduduk/data_keluarga', $data);
        $this->load->view('templates/footer');
    }

    public function detail_keluarga($id)
    {
        $data['title'] = 'Detail Data Keluarga';
        $array = array('no_kk' => md5($id));
        $data['penduduk'] = $id;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('penduduk/detail_keluarga', $data);
        $this->load->view('templates/footer');
    }

}
