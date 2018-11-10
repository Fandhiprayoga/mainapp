<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_asrama extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/kelas_asrama_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_kelas_asrama']=$this->kelas_asrama_model->tampil_kelas_asrama_list();
            $data['page']='modul_pendaftaran/kelas_asrama/kelas_asrama_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

     public function cetak()
     {
            $this->load->library('pdf');
            $data['tipe_cetak']=$this->uri->segment('4');
            $data['id_kelas']=$this->uri->segment('5');
            $data['id_asrama']=$this->uri->segment('6');

            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "data_kelas_asrama.pdf";
            $this->pdf->load_view('modul_pendaftaran/kelas_asrama/cetak_kelas_asrama_modul_pendaftaran_view',$data);
         //$this->load->view('modul_kelas_asrama/kelas_asrama/cetak_kelas_asrama_modul_kelas_asrama_view', $data);
     }

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


    // public function tambah()
    // {
    //     if($this->session->id_user=="")
    //     {
    //         redirect(base_url('index.php/auth'), 'refresh');
    //     }
    //     else
    //     {
    //         $data['data_kelas_asrama']=$this->kelas_asrama_model->tampil_kelas_asrama_list();
    //         $data['page']='modul_pendaftaran/kelas_asrama/tambah_kelas_asrama_modul_pendaftaran_view';
    //         $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
    //     }
    // }

//     public function get_kelas_asrama_exist()
//     {
//         $data=$this->kelas_asrama_model->get_kelas_asrama_exist();
// 		echo json_encode($data);
//     }

    // public function aksi_tambah_kelas_asrama()
    // {
    //     $data=$this->kelas_asrama_model->tambah_kelas_asrama();
        
	// 	echo json_encode($data);
    // }

    public function aksi_edit_kelas_asrama_kelas()
    {   
        //$data['data_id']=$this->input->post('id_kelas_asrama');
        $data=$this->kelas_asrama_model->edit_kelas_asrama_kelas();
		echo json_encode($data);
    }

    public function aksi_edit_kelas_asrama_asrama()
    {   
        //$data['data_id']=$this->input->post('id_kelas_asrama');
        $data=$this->kelas_asrama_model->edit_kelas_asrama_asrama();
		echo json_encode($data);
    }

    // public function aksi_hapus_kelas_asrama()
    // {
    //     $data=$this->kelas_asrama_model->hapus_kelas_asrama();
	// 	echo json_encode($data);
    // }
} 

?>