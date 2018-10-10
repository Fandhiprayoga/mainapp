<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_user extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/group_user_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_group_user']=$this->group_user_model->tampil_group_user_list();
            $data['page']='modul_admin/group_user/group_user_modul_admin_view';
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
            $data['data_group_user']=$this->group_user_model->tampil_group_user_list();
            $data['page']='modul_admin/group_user/tambah_group_user_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    

    public function aksi_tambah_group_user()
    {
        $data=$this->group_user_model->tambah_group_user();
		echo json_encode($data);
    }

    public function aksi_edit_group_user()
    {
        $data=$this->group_user_model->edit_group_user();
		echo json_encode($data);
    }

    public function aksi_hapus_group_user()
    {
        $data=$this->group_user_model->hapus_group_user();
		echo json_encode($data);
    }
} 

?>