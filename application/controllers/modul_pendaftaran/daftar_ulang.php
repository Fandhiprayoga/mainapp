<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_ulang extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/daftar_ulang_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_daftar_ulang']=$this->daftar_ulang_model->tampil_daftar_ulang_list();
            $data['page']='modul_pendaftaran/daftar_ulang/daftar_ulang_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

     public function cetak()
     {
            $this->load->library('pdf');
            $data=$this->input->post('id_pendaftaran');
            $data['id_pendaftaran']=json_decode($data[0]);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "cetak_idcard.pdf";
            $this->pdf->load_view('modul_pendaftaran/daftar_ulang/cetak_idcard_daftar_ulang_modul_pendaftaran_view',$data);
         //$this->load->view('modul_daftar_ulang/daftar_ulang/cetak_daftar_ulang_modul_daftar_ulang_view', $data);
     }

    // public function barcode($kode)
    // {
    //     //$kode=$this->uri->segment('4');
    //     $this->load->library('zend');
    //     $this->zend->load('Zend/Barcode');
    //     $file = Zend_Barcode::draw('code128', 'image', array('text' => $kode), array());
    //     //$kode = time().$kode;
        
    //     $store_image = imagejpeg($file,"./assets/upload/barcode/{$kode}.jpg");
    //     return $kode.'.jpg';
    // }

    // public function detail()
    // {
    //     $data['id_daftar_ulang']=$this->uri->segment('4');
    //     $data['page']='modul_daftar_ulang/daftar_ulang/detail_daftar_ulang_modul_daftar_ulang_view';
    //     $this->load->view('modul_daftar_ulang/dasbor_modul_daftar_ulang_view', $data);
    
    // }
    public function histori_daftar_ulang()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_daftar_ulang']=$this->daftar_ulang_model->tampil_histori_daftar_ulang_list();
            $data['page']='modul_pendaftaran/daftar_ulang/histori_daftar_ulang_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
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
            $data['id_pendaftaran']=$this->uri->segment('4');
            $data['kolom']=$this->uri->segment('5');
            //$data['data_daftar_ulang']=$this->daftar_ulang_model->tampil_daftar_ulang_list();
            $data['page']='modul_pendaftaran/daftar_ulang/tambah_daftar_ulang_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function get_daftar_ulang_exist()
    {
        $data=$this->daftar_ulang_model->get_daftar_ulang_exist();
		echo json_encode($data);
    }

    public function aksi_tambah_daftar_ulang()
    {
        $kolom            = $this->input->post('kolom');
        $id_pendaftaran   = $this->input->post('id_pendaftaran');
        $check            = $this->db->query('select * from daftar_ulang where id_pendaftaran="'.$id_pendaftaran.'"')->num_rows();
        
            $config['allowed_types'] = 'pdf';
            $config['encrypt_name']   = TRUE; //enkripsi file name upload
        
            if($kolom=='ijazah')
            {
                $config['upload_path'] ='./assets/upload/ijazah'; 
            }
            else if($kolom=='kk')
            {
                $config['upload_path'] ='./assets/upload/kk';
            }
            else if($kolom=='infaq')
            {
                $config['upload_path'] ='./assets/upload/infaq';
            }
            else if($kolom=='yatim')
            {
                $config['upload_path'] ='./assets/upload/yatim';
            }
            else
            {
               echo $data='tipe tidak dikenal';
            }
        
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('file'))
            {
                $data= $this->upload->display_errors();
            }
            else
            {
                $datanama = array('upload_data' => $this->upload->data());
                $nama_file  = $datanama['upload_data']['file_name'];

                if($check>0)
                {
                    if($kolom=='ijazah')
                    {
                        $data=$this->daftar_ulang_model->edit_daftar_ulang_ijazah($id_pendaftaran,$nama_file);
                    }
                    else if($kolom=='kk')
                    {
                        $data=$this->daftar_ulang_model->edit_daftar_ulang_kk($id_pendaftaran,$nama_file);
                    }
                    else if($kolom=='infaq')
                    {
                        $data=$this->daftar_ulang_model->edit_daftar_ulang_infaq($id_pendaftaran,$nama_file);
                    }
                    else if($kolom=='yatim')
                    {
                        $data=$this->daftar_ulang_model->edit_daftar_ulang_yatim($id_pendaftaran,$nama_file);
                    }
                    else
                    {
                        $data='akhir edit';
                    }
                }
                else
                {
                    if($kolom=='ijazah')
                    {
                        $data=$this->daftar_ulang_model->tambah_daftar_ulang_ijazah($id_pendaftaran,$nama_file);
                    }
                    else if($kolom=='kk')
                    {
                        $data=$this->daftar_ulang_model->tambah_daftar_ulang_kk($id_pendaftaran,$nama_file);
                    }
                    else if($kolom=='infaq')
                    {
                        $data=$this->daftar_ulang_model->tambah_daftar_ulang_infaq($id_pendaftaran,$nama_file);
                    }
                    else if($kolom=='yatim')
                    {
                        $data=$this->daftar_ulang_model->tambah_daftar_ulang_yatim($id_pendaftaran,$nama_file);
                    }
                    else
                    {
                        $data='akhir simpan';
                    }
                }
                echo json_encode($data);
            }
        
    }

    public function aksi_tambah_daftar_ulang_status()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');

        if($id_daftar_ulang=="")
        {
            $data=$this->daftar_ulang_model->tambah_daftar_ulang_status();
        }
        else
        {
            $data=$this->daftar_ulang_model->edit_daftar_ulang_status();
        }
        // integrasi daftar_ulang ke mst_santri
        if($data)
        {
            $a=$this->db->query('select * from pendaftaran where id_pendaftaran="'.$id_pendaftaran.'"')->result_array();
            $n_santri         = $a[0]['n_pendaftaran']; //nama lengkap santri
            $nl_santri        = $a[0]['nl_pendaftaran']; // nama panggilan santri
            $t_santri         = $a[0]['t_pendaftaran']; //tempat lahir santri
            $tl_santri        = $a[0]['tl_pendaftaran']; //tanggal lahir santri
            $alamat_santri    = $a[0]['alamat_pendaftaran']; // alamat_santri
            $telp_santri      = $a[0]['telp_pendaftaran']; //no telp santri
            $email_santri     = $a[0]['email_pendaftaran']; //email atau fb santri
            $instansi_santri  = $a[0]['instansi_pendaftaran']; //instansi/sekolah asal santri
           
            $obj=array(
                'id_santri'=>$id_pendaftaran,
                'n_santri'=>$n_santri,
                'nl_santri'=>$nl_santri,
                't_santri'=>$t_santri,
                'tl_santri'=>$tl_santri,
                'alamat_santri'=>$alamat_santri,
                'telp_santri'=>$telp_santri,
                'email_santri'=>$email_santri,
                'instansi_santri'=>$instansi_santri,
            );
            $this->db->insert('mst_santri', $obj);
            if($this->db->affected_rows()>0)    
             {
                $data=TRUE;
             }
             else {
                 $data= FALSE;
             }
        }
        else
        {
            $data=FALSE;
        }
        echo json_encode($data);
    }

    public function aksi_edit_daftar_ulang()
    {   
        //$data['data_id']=$this->input->post('id_daftar_ulang');
        $data['data_esp']=$this->daftar_ulang_model->edit_daftar_ulang();
		echo json_encode($data);
    }

    public function aksi_hapus_daftar_ulang()
    {
        $kolom=$this->input->post('kolom');
        $file=$this->input->post('file');
        if($kolom=='ijazah')
        {
            $data=$this->daftar_ulang_model->hapus_daftar_ulang_ijazah();
            if($data==true)
            {
                unlink('./assets/upload/ijazah/'.$file);
            }
        }
        else if ($kolom=='kk')
        {
            $data=$this->daftar_ulang_model->hapus_daftar_ulang_kk();
            if($data==true)
            {
                unlink('./assets/upload/kk/'.$file);
            }
        }
        else if($kolom=='infaq')
        {
            $data=$this->daftar_ulang_model->hapus_daftar_ulang_infaq();
            if($data==true)
            {
                unlink('./assets/upload/infaq/'.$file);
            }
        }
        else if($kolom=='yatim')
        {
            $data=$this->daftar_ulang_model->hapus_daftar_ulang_yatim();
            if($data==true)
            {
                unlink('./assets/upload/yatim/'.$file);
            }
        }
        else
        {
            $data=false;
        }
        // $data=$this->daftar_ulang_model->hapus_daftar_ulang();
		echo json_encode($data);
    }
} 

?>