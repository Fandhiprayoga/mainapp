<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_priv extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/group_priv_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['page']='modul_admin/group_priv/group_priv_modul_admin_view';
			$this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }   
     }

    public function get_submenu_param()
    {
            
            $d_sm=$this->group_priv_model->get_submenu();
            echo json_encode($d_sm);
    }

    public function aksi_tambah_group_priv()
    {
        $data=$this->group_priv_model->tambah_group_priv();
		echo json_encode($data);
    }

    public function aksi_edit_group_priv()
    {
        $data=$this->group_priv_model->edit_group_priv();
		echo json_encode($data);
    }

    public function cek_eksis()
    {
        $data=$this->group_priv_model->cek_eksis();
		echo json_encode($data);
    }

} 

?>