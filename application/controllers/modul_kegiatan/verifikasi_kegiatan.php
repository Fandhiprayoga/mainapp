<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Verifikasi_kegiatan extends CI_Controller
{
            function __construct()
            {
                        parent::__construct();
                        $this->load->model('modul_kegiatan/verifikasi_kegiatan_model');   
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
                                    $data['data_kegiatan_yatim']=$this->verifikasi_kegiatan_model->tampil_verifikasi_pengajuan_kegiatan_yatim_list();
                                    $data['page']='modul_kegiatan/verifikasi_pengajuan_kegiatan/verifikasi_pengajuan_kegiatan_yatim_modul_kegiatan_view';
                                    $this->load->view('modul_keuangan_yatim/dasbor_modul_keuangan_yatim_view', $data);
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
                                    $data['data_kegiatan_yayasan']=$this->verifikasi_kegiatan_model->tampil_verifikasi_pengajuan_kegiatan_yayasan_list();
                                    $data['page']='modul_kegiatan/verifikasi_pengajuan_kegiatan/verifikasi_pengajuan_kegiatan_yayasan_modul_kegiatan_view';
                                    $this->load->view('modul_keuangan_yayasan/dasbor_modul_keuangan_yayasan_view', $data);
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
                                    $data['data_kegiatan_pembangunan']=$this->verifikasi_kegiatan_model->tampil_verifikasi_pengajuan_kegiatan_pembangunan_list();
                                    $data['page']='modul_kegiatan/verifikasi_pengajuan_kegiatan/verifikasi_pengajuan_kegiatan_pembangunan_modul_kegiatan_view';
                                    $this->load->view('modul_pembangunan/dasbor_modul_pembangunan_view', $data);
                        }
                          
            }

            public function aksi_edit_verifikasi_pengajuan_kegiatan()
            {
                        $data  = $this->verifikasi_kegiatan_model->edit_verifikasi_pengajuan_kegiatan();
                        echo json_encode($data);     
            }
}
?>