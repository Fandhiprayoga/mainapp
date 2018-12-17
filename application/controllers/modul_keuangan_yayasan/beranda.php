<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/menu_model');
    }

    public function index()
    {
        //$data['data_menu']=$this->menu_model->tampil_menu(5);
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['page']='modul_keuangan_yayasan/beranda_modul_keuangan_yayasan_view';
			$this->load->view('modul_keuangan_yayasan/dasbor_modul_keuangan_yayasan_view', $data);
        }
    }
} 

?>