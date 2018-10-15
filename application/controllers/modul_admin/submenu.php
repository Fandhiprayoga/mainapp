<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class submenu extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/submenu_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            // $data['data_menu']=$this->submenu_model->tampil_menu_list();
            $data['data_submenu']=$this->submenu_model->tampil_submenu_list();
            $data['page']='modul_admin/submenu/submenu_modul_admin_view';
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
            // $data['data_menu']=$this->submenu_model->tampil_menu_list();
            $data['data_submenu']=$this->submenu_model->tampil_submenu_list();
            $data['page']='modul_admin/submenu/tambah_submenu_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    

    public function aksi_tambah_submenu()
    {
        $data=$this->submenu_model->tambah_submenu();
		echo json_encode($data);
    }

    public function aksi_edit_submenu()
    {
        $data=$this->submenu_model->edit_submenu();
		echo json_encode($data);
    }

    public function aksi_hapus_submenu()
    {
        $data=$this->submenu_model->hapus_submenu();
		echo json_encode($data);
    }
} 

?>