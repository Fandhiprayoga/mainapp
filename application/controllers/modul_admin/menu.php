<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{

    function __construct() {
        parent::__construct();
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
            $data['data_modul']=$this->menu_model->tampil_modul_list();
            $data['data_menu']=$this->menu_model->tampil_menu_list();
            $data['page']='modul_admin/menu/menu_modul_admin_view';
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
            $data['data_modul']=$this->menu_model->tampil_modul_list();
            $data['data_menu']=$this->menu_model->tampil_menu_list();
            $data['page']='modul_admin/menu/tambah_menu_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    

    public function aksi_tambah_menu()
    {
        $data=$this->menu_model->tambah_menu();
		echo json_encode($data);
    }

    public function aksi_edit_menu()
    {
        $data=$this->menu_model->edit_menu();
		echo json_encode($data);
    }

    public function aksi_hapus_menu()
    {
        $data=$this->menu_model->hapus_menu();
		echo json_encode($data);
    }
} 

?>