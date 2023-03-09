<?php

class Dashboard extends CI_Controller
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
        $data['title'] = 'Sistem Pencatatan Data Penduduk Desa Sidomulyo';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard',$data);
        $this->load->view('templates/footer');
    }

    public function print_statistik()
    {
        $data['penduduk'] = $this->model_penduduk->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('print_statistik',$data);
        $this->load->view('templates/footer');

        $this->load->library('Pdf');

        $filename = 'Statistik per '.date('d-m-Y').'.pdf';

        $this->pdf->createPDF($this->load->view('print_statistik', $data, true), $filename, false);
    }
}