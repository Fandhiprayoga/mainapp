<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/instansi_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['d_i']=$this->instansi_model->get_instansi();
            $data['page']='modul_admin/instansi/instansi_modul_admin_view';
			$this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }   
     }

    public function aksi_edit_instansi()
    {
        $config['upload_path']="./assets/upload"; //path folder file upload
        $config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
         
        $this->load->library('upload',$config); //call library upload 
        if($this->upload->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
 
            $instansi= $this->input->post('instansi');
            $alamat= $this->input->post('alamat');
            $kepala= $this->input->post('kepala');
            $nik= $this->input->post('nik');
               
            $nama_file= $data['upload_data']['file_name']; //set file name ke variable image
            echo '<script>alert("'.$nama_file.'");</script>';
            $data=$this->instansi_model->edit_instansi($instansi,$alamat,$kepala, $nik, $nama_file);
            echo json_encode($data);
        
        }   
    }

    public function hapus_logo()
    {
        $link=$this->input->post('link');
        $link='assets/upload/'.$link;
        if(unlink($link))
        {
           $data= $this->db->query('update instansi set logo_instansi="" where id="1"');
        }
        else
        {
            $data=false;
        }
        echo json_encode($data);

    }
} 

?>