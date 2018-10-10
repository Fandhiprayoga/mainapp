<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/modul_model');
        $this->load->model('modul_admin/menu_model');
    }

    public function index()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_modul']=$this->modul_model->tampil_modul();
            $data['page']='modul_admin/modul/modul_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    public function tambah()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['page']='modul_admin/modul/tambah_modul_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    

    public function aksi_tambah_modul()
    {
        $data=$this->modul_model->tambah_modul();
		echo json_encode($data);
    }

    public function aksi_edit_modul()
    {
        $data=$this->modul_model->edit_modul();
		echo json_encode($data);
    }

    public function aksi_hapus_modul()
    {
        $data=$this->modul_model->hapus_modul();
		echo json_encode($data);
    }
} 

?>