<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_anggaran extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_kegiatan/rencana_anggaran_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['page']='modul_kegiatan/rencana_anggaran/rencana_anggaran_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function cek_status_rencana_anggaran()
    {
        $data=$this->rencana_anggaran_model->cek_status_rencana_anggaran();
        echo json_encode($data);
    }
    public function tampil_rencana_anggaran()
    {
        $data=$this->rencana_anggaran_model->tampil_rencana_anggaran_list();
        echo json_encode($data);
    }

    public function cetak()
    {
        $data['id_pengajuan']=$this->uri->segment('4');
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "data_rab.pdf";
        $this->pdf->load_view('modul_kegiatan/rencana_anggaran/cetak_rencana_anggaran_modul_kegiatan_view',$data);
        //$this->load->view('modul_admin/rencana_anggaran/cetak_rencana_anggaran_modul_admin_view');
    }

    public function aksi_tambah_rencana_anggaran()
    {

            $data             = $this->rencana_anggaran_model->tambah_rencana_anggaran();
            echo json_encode($data);
    }

    public function aksi_edit_rencana_anggaran()
    {   
            $data             = $this->rencana_anggaran_model->edit_rencana_anggaran($id,$id_organisasi,$jabatan);
            echo json_encode($data);
    }

    public function aksi_hapus_rencana_anggaran()
    {
            $data=$this->rencana_anggaran_model->hapus_rencana_anggaran();
        
            echo json_encode($data);
    }
} 

?>