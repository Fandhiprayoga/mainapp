<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_list extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/modul_model');
    }

    public function index()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_modul']=$this->modul_model->tampil_modul_list();
            $data['page']='beranda_modul_list_view';
			$this->load->view('dasbor_modul_list_view', $data);
        }
            
    }
} 

?>