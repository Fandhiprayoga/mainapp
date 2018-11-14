<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar_infaq extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/bayar_infaq_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_bayar_infaq']=$this->bayar_infaq_model->tampil_bayar_infaq_list();
            $data['page']='modul_pendaftaran/bayar_infaq/bayar_infaq_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function santri_lama()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_bayar_infaq']=$this->bayar_infaq_model->tampil_bayar_infaq_list();
            $data['page']='modul_pendaftaran/bayar_infaq/santri_lama_bayar_infaq_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function cetak()
    {
        $this->load->library('pdf');
        $data['id_pendaftaran']=$this->uri->segment('4');
        $data['id_infaq']=$this->uri->segment('5');
        $this->pdf->setPaper(array(0,0,419.53,595.28),'landscape');
        $this->pdf->filename = "data_bayar_infaq_".$data['id_pendaftaran'].".pdf";
        $this->pdf->load_view('modul_pendaftaran/bayar_infaq/cetak_bayar_infaq_modul_pendaftaran_view',$data);
    }

    public function cetak_santri_lama()
    {
        $this->load->library('pdf');
        $data['id_pendaftaran']=$this->uri->segment('4');
        $data['id_infaq']=$this->uri->segment('5');
        $this->pdf->setPaper(array(0,0,419.53,595.28),'landscape');
        $this->pdf->filename = "data_bayar_infaq_".$data['id_pendaftaran'].".pdf";
        $this->pdf->load_view('modul_pendaftaran/bayar_infaq/cetak_bayar_infaq_santri_lama_modul_pendaftaran_view',$data);
    }

    public function cetak2($id_pendaftaran, $id_infaq)
    {
        $this->load->library('pdf');
        $data['id_pendaftaran']=$id_pendaftaran;
        $data['id_infaq']=$id_infaq;
        $this->pdf->setPaper(array(0,0,419.53,595.28),'landscape');
        $this->pdf->filename = "data_bayar_infaq_".$data['id_pendaftaran'].".pdf";
        $this->pdf->cetak_view('modul_pendaftaran/bayar_infaq/cetak_bayar_infaq_modul_pendaftaran_view',$data,'./assets/upload/infaq/'.$data['id_pendaftaran'].'.pdf');
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
//             $data['data_bayar_infaq']=$this->bayar_infaq_model->tampil_bayar_infaq_list();
//             $data['page']='modul_pendaftaran/bayar_infaq/tambah_bayar_infaq_modul_pendaftaran_view';
//             $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
//         }
//     }

//     public function get_bayar_infaq_exist()
//     {
//         $data=$this->bayar_infaq_model->get_bayar_infaq_exist();
// 		echo json_encode($data);
//     }

    public function tampil_bayar_infaq()
    {
        $a=$this->db->query('select p.*, bi.id_infaq, bi.id_infaq, bi.status_bayar_infaq from mst_santri p left join bayar_infaq bi on p.id_santri=bi.id_pendaftaran and bi.id_infaq="'.$this->input->post('id_infaq').'" order by p.id_santri desc')->result_array();
        echo json_encode($a);
    }

    public function aksi_tambah_bayar_infaq()
    {
        $id_pendaftaran    = $this->input->post('id_pendaftaran');
        $id_infaq          = $this->input->post('id_infaq');
        $data              = $this->bayar_infaq_model->tambah_bayar_infaq();

        if($data)
        {
            $chk=$this->db->query('select * from daftar_ulang where id_pendaftaran="'.$id_pendaftaran.'"')->num_rows();
            if($chk>0)
            {
                //edit
                $data   = array(
                    'infaq_daftar_ulang'=>$id_pendaftaran.".pdf",
                );
                    $this->db->where('id_pendaftaran',$id_pendaftaran);
                    $this->db->update('daftar_ulang',$data);
                    if($this->db->affected_rows()>0)    
                    {
                        $data= TRUE;
                        $this->cetak2($id_pendaftaran, $id_infaq);
                    }
                    else {
                        $data= FALSE;
                    }
            }
            else
            {
                //tambah
                $data=array(
                    'id_pendaftaran'=>$id_pendaftaran,
                    'infaq_daftar_ulang'=>$id_pendaftaran.".pdf",
                );
        
                    $this->db->insert('daftar_ulang',$data);
                    if($this->db->affected_rows()>0)    
                    {
                        $data= TRUE;
                        $this->cetak2($id_pendaftaran, $id_infaq);
                    }
                    else {
                        $data= FALSE;
                    }
            }
        }
        else
        {
            //ga ngapa2
        }
        
		echo json_encode($data);
    }

    public function aksi_tambah_bayar_infaq_santri_lama()
    {
        $id_pendaftaran    = $this->input->post('id_pendaftaran');
        $id_infaq          = $this->input->post('id_infaq');
        $data              = $this->bayar_infaq_model->tambah_bayar_infaq_santri_lama();

        if($data)
        {
            $chk=$this->db->query('select * from daftar_ulang where id_pendaftaran="'.$id_pendaftaran.'"')->num_rows();
            if($chk>0)
            {
                //edit
                $data   = array(
                    'infaq_daftar_ulang'=>$id_pendaftaran.".pdf",
                );
                    $this->db->where('id_pendaftaran',$id_pendaftaran);
                    $this->db->update('daftar_ulang',$data);
                    if($this->db->affected_rows()>0)    
                    {
                        $data= TRUE;
                        $this->cetak2($id_pendaftaran, $id_infaq);
                    }
                    else {
                        $data= FALSE;
                    }
            }
            else
            {
                //tambah
                $data=array(
                    'id_pendaftaran'=>$id_pendaftaran,
                    'infaq_daftar_ulang'=>$id_pendaftaran.".pdf",
                );
        
                    $this->db->insert('daftar_ulang',$data);
                    if($this->db->affected_rows()>0)    
                    {
                        $data= TRUE;
                        $this->cetak2($id_pendaftaran, $id_infaq);
                    }
                    else {
                        $data= FALSE;
                    }
            }
        }
        else
        {
            //ga ngapa2
        }
        
		echo json_encode($data);
    }

    public function aksi_edit_bayar_infaq()
    {   
        //$data['data_id']=$this->input->post('id_bayar_infaq');
        $data=$this->bayar_infaq_model->edit_bayar_infaq();
		echo json_encode($data);
    }

    public function aksi_hapus_bayar_infaq()
    {
        $data=$this->bayar_infaq_model->hapus_bayar_infaq();
		echo json_encode($data);
    }
} 

?>