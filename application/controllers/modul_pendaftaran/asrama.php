<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asrama extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/asrama_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_asrama']=$this->asrama_model->tampil_asrama_list();
            $data['page']='modul_pendaftaran/asrama/asrama_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

//     public function cetak()
//     {
//            $this->load->library('pdf');
//         $data['id_asrama']=$this->uri->segment('4');
//         $data['data_barcode']= $this->barcode($this->uri->segment('4'));
//            $this->pdf->setPaper('A4', 'potrait');
//            $this->pdf->filename = "data_asrama.pdf";
//            $this->pdf->load_view('modul_asrama/asrama/cetak_asrama_modul_pendaftaran_view',$data);
//         //$this->load->view('modul_asrama/asrama/cetak_asrama_modul_asrama_view', $data);
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
            $data['data_asrama']=$this->asrama_model->tampil_asrama_list();
            $data['page']='modul_pendaftaran/asrama/tambah_asrama_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

//     public function get_asrama_exist()
//     {
//         $data=$this->asrama_model->get_asrama_exist();
// 		echo json_encode($data);
//     }

    public function aksi_tambah_asrama()
    {
        $data=$this->asrama_model->tambah_asrama();
        
		echo json_encode($data);
    }

    public function aksi_edit_asrama()
    {   
        //$data['data_id']=$this->input->post('id_asrama');
        $data=$this->asrama_model->edit_asrama();
		echo json_encode($data);
    }

    public function aksi_hapus_asrama()
    {
        $data=$this->asrama_model->hapus_asrama();
		echo json_encode($data);
    }
} 

?>