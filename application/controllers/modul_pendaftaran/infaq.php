<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/infaq_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_infaq']=$this->infaq_model->tampil_infaq_list();
            $data['page']='modul_pendaftaran/infaq/infaq_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

//     public function cetak()
//     {
//            $this->load->library('pdf');
//         $data['id_infaq']=$this->uri->segment('4');
//         $data['data_barcode']= $this->barcode($this->uri->segment('4'));
//            $this->pdf->setPaper('A4', 'potrait');
//            $this->pdf->filename = "data_infaq.pdf";
//            $this->pdf->load_view('modul_infaq/infaq/cetak_infaq_modul_pendaftaran_view',$data);
//         //$this->load->view('modul_infaq/infaq/cetak_infaq_modul_infaq_view', $data);
//     }

//     public function barcode($kode)
//     {
//         //$kode=$this->uri->segment('4');
//         $this->load->library('zend');
//         $this->zend->load('Zend/Barcode');
//         $file = Zend_Barcode::draw('code128', 'image', array('text' => $kode), array());
//         //$kode = time().$kode;
        
//         $store_image = imagejpeg($file,"./assets/upload/barcode/{$kode}.jpg");
//         return $kode.'.jpg';
//     }


    public function tambah()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_infaq']=$this->infaq_model->tampil_infaq_list();
            $data['page']='modul_pendaftaran/infaq/tambah_infaq_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

//     public function get_infaq_exist()
//     {
//         $data=$this->infaq_model->get_infaq_exist();
// 		echo json_encode($data);
//     }

    public function aksi_tambah_infaq()
    {
        $data=$this->infaq_model->tambah_infaq();
        
		echo json_encode($data);
    }

    public function aksi_edit_infaq()
    {   
        //$data['data_id']=$this->input->post('id_infaq');
        $data=$this->infaq_model->edit_infaq();
		echo json_encode($data);
    }

    public function aksi_hapus_infaq()
    {
        $data=$this->infaq_model->hapus_infaq();
		echo json_encode($data);
    }
} 

?>