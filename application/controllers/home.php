<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Home | Sistem Pencatatan Data Penduduk Desa Sidomulyo';
        $this->load->view('templates/header', $data);
        $this->load->view('frontpage/home', $data);
        $this->load->view('templates/footer');
    }

    public function pesan()
    {
        $data['title'] = 'Pesan | Sistem Pencatatan Data Penduduk Desa Sidomulyo';
        $this->load->view('templates/header', $data);
        $this->load->view('frontpage/pesan', $data);
        $this->load->view('templates/footer');
    }

    public function kirim_pesan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $nohp = $this->input->post('nohp');
        $isi = $this->input->post('isi');
        $jenis = $this->input->post('jenis');
        $tanggal = date('Y-m-d H:i:s');

        $data = array(
            'nama' => $nama,
            'nohp' => $nohp,
            'isi' => $isi,
            'jenis' => $jenis,
            'tgl_kirim' => $tanggal
        );

        $this->db->insert('tb_pengaduan', $data);
        // Make closeable alert
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Pesan anda telah terkirim. Petugas kami akan segera memproses pesan anda dan akan segera menghubungi anda. <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div>');
        redirect('home/pesan');
    }
}
