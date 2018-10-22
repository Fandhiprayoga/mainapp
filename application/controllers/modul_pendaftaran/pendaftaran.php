<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/pendaftaran_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pendaftaran']=$this->pendaftaran_model->tampil_pendaftaran_list();
            $data['page']='modul_pendaftaran/pendaftaran/pendaftaran_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function cetak()
    {
           $this->load->library('pdf');
        $data['id_pendaftaran']=$this->uri->segment('4');
        $data['data_barcode']= $this->barcode($this->uri->segment('4'));
           $this->pdf->setPaper('A4', 'potrait');
           $this->pdf->filename = "data_pendaftar.pdf";
           $this->pdf->load_view('modul_pendaftaran/pendaftaran/cetak_pendaftaran_modul_pendaftaran_view',$data);
        //$this->load->view('modul_pendaftaran/pendaftaran/cetak_pendaftaran_modul_pendaftaran_view', $data);
    }

    public function barcode($kode)
    {
        //$kode=$this->uri->segment('4');
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $file = Zend_Barcode::draw('code128', 'image', array('text' => $kode), array());
        //$kode = time().$kode;
        
        $store_image = imagejpeg($file,"./assets/upload/barcode/{$kode}.jpg");
        return $kode.'.jpg';
    }

    public function detail()
    {
        $data['id_pendaftaran']=$this->uri->segment('4');
        $data['page']='modul_pendaftaran/pendaftaran/detail_pendaftaran_modul_pendaftaran_view';
        $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
    
    }

    public function tambah()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pendaftaran']=$this->pendaftaran_model->tampil_pendaftaran_list();
            $data['page']='modul_pendaftaran/pendaftaran/tambah_pendaftaran_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function get_pendaftaran_exist()
    {
        $data=$this->pendaftaran_model->get_pendaftaran_exist();
		echo json_encode($data);
    }

    public function aksi_tambah_pendaftaran()
    {
        $data=$this->pendaftaran_model->tambah_pendaftaran();
        
		echo json_encode($data);
    }

    public function aksi_edit_pendaftaran()
    {   
        //$data['data_id']=$this->input->post('id_pendaftaran');
        $data['data_esp']=$this->pendaftaran_model->edit_pendaftaran();
		echo json_encode($data);
    }

    public function aksi_hapus_pendaftaran()
    {
        $data=$this->pendaftaran_model->hapus_pendaftaran();
		echo json_encode($data);
    }
} 

?>