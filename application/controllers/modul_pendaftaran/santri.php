<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class santri extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/santri_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_santri']=$this->santri_model->tampil_santri_list();
            $data['page']='modul_pendaftaran/santri/santri_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function aksi_edit_status()
    {
        $data=$this->santri_model->edit_status_santri();
		echo json_encode($data);
    }

     public function cetak()
     {
            $this->load->library('pdf');
            $data['status_yatim']=$this->uri->segment('4');
            $data['status_santri']=$this->uri->segment('5');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "data_santri.pdf";
            $this->pdf->load_view('modul_pendaftaran/santri/cetak_santri_modul_pendaftaran_view',$data);
         //$this->load->view('modul_santri/santri/cetak_santri_modul_santri_view', $data);
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


//     public function tambah()
//     {
//         if($this->session->id_user=="")
//         {
//             redirect(base_url('index.php/auth'), 'refresh');
//         }
//         else
//         {
//             $data['data_santri']=$this->santri_model->tampil_santri_list();
//             $data['page']='modul_pendaftaran/santri/tambah_santri_modul_pendaftaran_view';
//             $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
//         }
//     }

//     public function get_santri_exist()
//     {
//         $data=$this->santri_model->get_santri_exist();
// 		echo json_encode($data);
//     }

//     public function aksi_tambah_santri()
//     {
//         $data=$this->santri_model->tambah_santri();
        
// 		echo json_encode($data);
//     }

    public function aksi_edit_santri()
    {   
        //$data['data_id']=$this->input->post('id_santri');
        $data=$this->santri_model->edit_santri();
		echo json_encode($data);
    }

//     public function aksi_hapus_santri()
//     {
//         $data=$this->santri_model->hapus_santri();
// 		echo json_encode($data);
//     }
} 

?>