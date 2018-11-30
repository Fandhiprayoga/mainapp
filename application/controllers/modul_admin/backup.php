<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller{

    function __construct() {
        parent::__construct();
        //$this->load->model('modul_admin/menu_model');
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
            $data['page']='modul_admin/backup/backup_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    public function aksi_backup()
    {
            $backup_file = "C:\db_backups\\".date('Y').date('m').date('d').random_int(0,100).".bak";
            sqlsrv_configure( "WarningsReturnAsErrors", 0 );
            usleep(600);
            set_time_limit(2000);
            
            $sql = "BACKUP DATABASE mainapp TO DISK = '".$backup_file."' WITH NOINIT;";
            $stmt = $this->db->query($sql);
            if(!$stmt)
            {
                $data=false;
            }
            else
            {
                $data=true;
            }
            echo json_encode($data);
    }
} 

?>