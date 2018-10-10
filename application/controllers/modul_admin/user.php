<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/user_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_user']=$this->user_model->tampil_user_list();
            $data['page']='modul_admin/user/user_modul_admin_view';
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
            $data['data_user']=$this->user_model->tampil_user_list();
            $data['page']='modul_admin/user/tambah_user_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    public function get_user_exist()
    {
        $data=$this->user_model->get_user_exist();
		echo json_encode($data);
    }

    public function aksi_tambah_user()
    {
        $data=$this->user_model->tambah_user();
		echo json_encode($data);
    }

    public function aksi_edit_user()
    {
        $data=$this->user_model->edit_user();
		echo json_encode($data);
    }

    public function aksi_hapus_user()
    {
        $data=$this->user_model->hapus_user();
		echo json_encode($data);
    }
} 

?>