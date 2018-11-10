<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/kelas_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_kelas']=$this->kelas_model->tampil_kelas_list();
            $data['page']='modul_pendaftaran/kelas/kelas_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

//     public function cetak()
//     {
//            $this->load->library('pdf');
//         $data['id_kelas']=$this->uri->segment('4');
//         $data['data_barcode']= $this->barcode($this->uri->segment('4'));
//            $this->pdf->setPaper('A4', 'potrait');
//            $this->pdf->filename = "data_kelas.pdf";
//            $this->pdf->load_view('modul_kelas/kelas/cetak_kelas_modul_pendaftaran_view',$data);
//         //$this->load->view('modul_kelas/kelas/cetak_kelas_modul_kelas_view', $data);
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
            $data['data_kelas']=$this->kelas_model->tampil_kelas_list();
            $data['page']='modul_pendaftaran/kelas/tambah_kelas_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

//     public function get_kelas_exist()
//     {
//         $data=$this->kelas_model->get_kelas_exist();
// 		echo json_encode($data);
//     }

    public function aksi_tambah_kelas()
    {
        $data=$this->kelas_model->tambah_kelas();
        
		echo json_encode($data);
    }

    public function aksi_edit_kelas()
    {   
        //$data['data_id']=$this->input->post('id_kelas');
        $data=$this->kelas_model->edit_kelas();
		echo json_encode($data);
    }

    public function aksi_hapus_kelas()
    {
        $data=$this->kelas_model->hapus_kelas();
		echo json_encode($data);
    }
} 

?>