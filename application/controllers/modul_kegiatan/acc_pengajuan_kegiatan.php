<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Acc_pengajuan_kegiatan extends CI_Controller
{
            function __construct()
            {
                        parent::__construct();
                        $this->load->model('modul_kegiatan/acc_pengajuan_kegiatan_model');   
            }

            public function index()
            {

            }

            public function yatim()
            {
                        if($this->session->id_user=="")
                        {
                                    redirect(base_url('index.php/auth'), 'refresh');
                        }
                        else
                        {
                                    $data['data_kegiatan_yatim']=$this->acc_pengajuan_kegiatan_model->tampil_acc_pengajuan_kegiatan_yatim_list();
                                    $data['page']='modul_kegiatan/acc_pengajuan_kegiatan/acc_pengajuan_kegiatan_yatim_modul_kegiatan_view';
                                    $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
                        }
                                
            }

            public function yayasan()
            {
                        if($this->session->id_user=="")
                        {
                                    redirect(base_url('index.php/auth'), 'refresh');
                        }
                        else
                        {
                                    $data['data_kegiatan_yayasan']=$this->acc_pengajuan_kegiatan_model->tampil_acc_pengajuan_kegiatan_yayasan_list();
                                    $data['page']='modul_kegiatan/acc_pengajuan_kegiatan/acc_pengajuan_kegiatan_yayasan_modul_kegiatan_view';
                                    $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data); 
                        }
                          
            }

            public function aksi_edit_acc_pengajuan_kegiatan()
            {
                        $data  = $this->acc_pengajuan_kegiatan_model->edit_acc_pengajuan_kegiatan();
                        echo json_encode($data);     
            }
}
?>