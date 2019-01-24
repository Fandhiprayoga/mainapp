<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Acc_proposal extends CI_Controller
{
            function __construct()
            {
                        parent::__construct();
                        $this->load->model('modul_kegiatan/acc_proposal_model');   
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
                                    $data['data_kegiatan_yatim']=$this->acc_proposal_model->tampil_acc_proposal_yatim_list();
                                    $data['page']='modul_kegiatan/acc_proposal/acc_proposal_yatim_modul_kegiatan_view';
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
                                    $data['data_kegiatan_yayasan']=$this->acc_proposal_model->tampil_acc_proposal_yayasan_list();
                                    $data['page']='modul_kegiatan/acc_proposal/acc_proposal_yayasan_modul_kegiatan_view';
                                    $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data); 
                        }
                          
            }

            public function pembangunan()
            {
                        if($this->session->id_user=="")
                        {
                                    redirect(base_url('index.php/auth'), 'refresh');
                        }
                        else
                        {
                                    $data['data_kegiatan_pembangunan']=$this->acc_proposal_model->tampil_acc_proposal_pembangunan_list();
                                    $data['page']='modul_kegiatan/acc_proposal/acc_proposal_pembangunan_modul_kegiatan_view';
                                    $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data); 
                        }
                          
            }

            public function aksi_edit_acc_proposal()
            {
                        $data  = $this->acc_proposal_model->edit_acc_proposal();
                        echo json_encode($data);     
            }
}
?>