<?php
defined('BASEPATH') or exit('No direct script access allowed');

Use PhpOffice\PhpWord\PhpWord;
Use PhpOffice\PhpWord\IOFactory;
Use PhpOffice\PhpWord\TemplateProcessor;

class Word extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') != '1' && $this->session->userdata('role') != '2'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
        error_reporting(0);
        $this->load->library("session");
        $this->load->helper('url');
    }

    public function index($id)
    {
        $templateProcessor = new TemplateProcessor('assets/word/template.docx');
        // get data from database where id = $id
        $data = $this->db->get_where('tb_penduduk', ['id' => $id])->row_array();
        $templateProcessor->setValue('nik', $data['nik']);
        $templateProcessor->setValue('nama_lengkap', $data['nama_lengkap']);
        $templateProcessor->setValue('no_kk', $data['no_kk']);

        // $templateProcessor->saveAs('assets/word/hasil_' . $data['nik'] . '.docx');
        
        // if file already created, then download it and redirect to dashboard
        // if (file_exists('assets/word/hasil_' . $data['nik'] . '.docx')) {
        //     $this->load->helper('download');
        //     force_download('assets/word/hasil_' . $data['nik'] . '.docx', NULL);
        //     redirect('dashboard');
        // }

        // download file without saving it to folder assets/word and redirect to dashboard
        header("Content-Disposition: attachment; filename=hasil_" . $data['nik'] . ".docx");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Cache-Control: private", false);
        // $templateProcessor->saveAs('php://output');
        if($templateProcessor->saveAs('php://output')){
            // redirect to http referer
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function permohonan_ktp($id)
    {
        $templateProcessor = new TemplateProcessor('assets/word/template_ktp.docx');
        // get data from database where id = $id
        $data = $this->db->get_where('tb_penduduk', ['id' => $id])->row_array();
        $templateProcessor->setValue('nik', $data['nik']);
        $templateProcessor->setValue('nama_lengkap', $data['nama_lengkap']);
        $templateProcessor->setValue('no_kk', $data['no_kk']);
        $templateProcessor->setValue('alamat', $data['alamat']);
        $date = date('Y-m-d');
        $templateProcessor->setValue('date', $this->tgl_indo($date));

        header("Content-Disposition: attachment; filename=Surat-Permohonan-KTP-" . $data['nama_lengkap'] . ".docx");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Cache-Control: private", false);
        if($templateProcessor->saveAs('php://output')){
            // redirect to http referer
            redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function permohonan_kk($id)
    {
        $templateProcessor = new TemplateProcessor('assets/word/template_kk.docx');
        // get data from database where id = $id
        $data = $this->db->get_where('tb_penduduk', ['id' => $id])->row_array();
        $templateProcessor->setValue('nik', $data['nik']);
        $templateProcessor->setValue('nama_lengkap', $data['nama_lengkap']);
        $templateProcessor->setValue('no_kk', $data['no_kk']);
        $templateProcessor->setValue('alamat', $data['alamat']);
        $templateProcessor->setValue('status_perkawinan', $data['status_perkawinan']);
        $templateProcessor->setValue('kewarganegaraan', $data['kewarganegaraan']);
        $date = date('Y-m-d');
        $templateProcessor->setValue('date', $this->tgl_indo($date));

        header("Content-Disposition: attachment; filename=Surat-Permohonan-KK-" . $data['nama_lengkap'] . ".docx");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Cache-Control: private", false);
        if ($templateProcessor->saveAs('php://output')) {
            // redirect to http referer
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function surat_pindah($id)
    {
        $templateProcessor = new TemplateProcessor('assets/word/template_pindah.docx');
        // get data from database where id = $id
        $data = $this->db->get_where('tb_penduduk', ['id' => $id])->row_array();
        $templateProcessor->setValue('nik', $data['nik']);
        $templateProcessor->setValue('nama_lengkap', $data['nama_lengkap']);
        $templateProcessor->setValue('no_kk', $data['no_kk']);
        $templateProcessor->setValue('alamat', $data['alamat']);
        $sql = "SELECT * FROM tb_penduduk WHERE no_kk = '" . $data['no_kk'] . "' AND status_dalam_keluarga = 'Kepala Keluarga'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        $templateProcessor->setValue('kepala_keluarga', $result['nama_lengkap'] ?? '');
        $date = date('Y-m-d');
        $templateProcessor->setValue('date', $this->tgl_indo($date));

        header("Content-Disposition: attachment; filename=Surat-Permohonan-Pindah-" . $data['nama_lengkap'] . ".docx");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Cache-Control: private", false);
        if ($templateProcessor->saveAs('php://output')) {
            // redirect to http referer
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function surat_kematian($id)
    {
        $templateProcessor = new TemplateProcessor('assets/word/template_kematian.docx');
        // get data from database where id = $id
        $data = $this->db->get_where('tb_penduduk', ['id' => $id])->row_array();
        $templateProcessor->setValue('nik', $data['nik']);
        $templateProcessor->setValue('nama_lengkap', $data['nama_lengkap']);
        $templateProcessor->setValue('alamat', $data['alamat']);
        $templateProcessor->setValue('ttl', $data['tempat_lahir'] . ', ' . $this->tgl_indo($data['tanggal_lahir']));
        $templateProcessor->setValue('jenis_kelamin', $data['jenis_kelamin']);
        $templateProcessor->setValue('agama', $data['agama']);
        $templateProcessor->setValue('status_perkawinan', $data['status_perkawinan']);
        $templateProcessor->setValue('pekerjaan', $data['pekerjaan']);
        $templateProcessor->setValue('kewarganegaraan', $data['kewarganegaraan']);
        $templateProcessor->setValue('nama_ayah', $data['nama_ayah']);
        $date = date('Y-m-d');
        $templateProcessor->setValue('date', $this->tgl_indo($date));

        header("Content-Disposition: attachment; filename=Surat-Kematian-" . $data['nama_lengkap'] . ".docx");
        header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Cache-Control: private", false);
        if ($templateProcessor->saveAs('php://output')) {
            // redirect to http referer
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

