<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pendaftaran/pendaftaran_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pendaftaran']=$this->pendaftaran_model->tampil_pendaftaran_list();
            $data['page']='modul_pendaftaran/pendaftaran/pendaftaran_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function cetak()
    {
           $this->load->library('pdf');
        $data['id_pendaftaran']=$this->uri->segment('4');
        $data['data_barcode']= $this->barcode($this->uri->segment('4'));
           $this->pdf->setPaper('A4', 'potrait');
           $this->pdf->filename = "data_pendaftar.pdf";
           $this->pdf->load_view('modul_pendaftaran/pendaftaran/cetak_pendaftaran_modul_pendaftaran_view',$data);
        //$this->load->view('modul_pendaftaran/pendaftaran/cetak_pendaftaran_modul_pendaftaran_view', $data);
    }

    public function barcode($kode)
    {
        //$kode=$this->uri->segment('4');
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $file = Zend_Barcode::draw('code128', 'image', array('text' => $kode), array());
        //$kode = time().$kode;
        
        $store_image = imagejpeg($file,"./assets/upload/barcode/{$kode}.jpg");
        return $kode.'.jpg';
    }

    public function detail()
    {
        $data['id_pendaftaran']=$this->uri->segment('4');
        $data['page']='modul_pendaftaran/pendaftaran/detail_pendaftaran_modul_pendaftaran_view';
        $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
    
    }

    public function tambah()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pendaftaran']=$this->pendaftaran_model->tampil_pendaftaran_list();
            $data['page']='modul_pendaftaran/pendaftaran/tambah_pendaftaran_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function get_pendaftaran_exist()
    {
        $data=$this->pendaftaran_model->get_pendaftaran_exist();
		echo json_encode($data);
    }

    public function aksi_tambah_pendaftaran()
    {

        $this->barcode($this->input->post('id_pendaftaran'));
        $data=$this->pendaftaran_model->tambah_pendaftaran();
        
		echo json_encode($data);
    }

    public function aksi_edit_pendaftaran()
    {   
        //$data['data_id']=$this->input->post('id_pendaftaran');
        $data['data_esp']=$this->pendaftaran_model->edit_pendaftaran();
		echo json_encode($data);
    }

    public function aksi_hapus_pendaftaran()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $du=$this->db->query('select * from daftar_ulang where id_pendaftaran="'.$id_pendaftaran.'"')->result_array();
        if(count($du))
        {
            
            if($du[0]['ijazah_daftar_ulang']!="")
            {
                unlink('./assets/upload/ijazah/'.$du[0]['ijazah_daftar_ulang']);
            }else
            {
                $data='gagal hapus data';
            }
             if($du[0]['kk_daftar_ulang']!="")
            {
                unlink('./assets/upload/kk/'.$du[0]['kk_daftar_ulang']);
            }else
            {
                $data='gagal hapus data';
            }
             if($du[0]['infaq_daftar_ulang']!="")
            {
                unlink('./assets/upload/infaq/'.$du[0]['infaq_daftar_ulang']);
            }else
            {
                $data='gagal hapus data';
            }
             if($du[0]['yatim_daftar_ulang']!="")
            {
                unlink('./assets/upload/yatim/'.$du[0]['yatim_daftar_ulang']);
            }else
            {
                $data='gagal hapus data';
            }
             if(file_exists('./assets/upload/barcode/'.$id_pendaftaran.'.jpg'))
            {
                unlink('./assets/upload/barcode/'.$id_pendaftaran.'.jpg');
            }
            else
            {
                $data='gagal hapus data';
            }
        }
        else
        {
            //gak ngapa-ngapa
        }
        $data=$this->pendaftaran_model->hapus_pendaftaran();
		echo json_encode($data);
    }


    public function aksi_upload_foto()
    {
        $id_pendaftaran= $this->input->post('id_pendaftaran');
        
        $config['upload_path']    = "./assets/upload/santri"; //path folder file upload
        $config['allowed_types']  = 'jpg|jpeg|png'; //type file yang boleh di upload
        $config['encrypt_name']   = TRUE; //enkripsi file name upload

        $this->load->library('upload',$config); //call library upload
        if($this->upload->do_upload("foto"))
        {
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
            $nama_file  = $data['upload_data']['file_name'];
            $data_ins=array(
                'foto_pendaftaran'=>$nama_file,
            );

            $this->db->where('id_pendaftaran',$id_pendaftaran);
            $this->db->update('pendaftaran', $data_ins);
            if($this->db->affected_rows()>0)    
             {
                header('Location:'.base_url().'index.php/modul_pendaftaran/pendaftaran');
             }
             else 
             {
                 echo 'Data gagal tersimpan !';
             }
        }
        else
        {
            echo 'Upload file gagal !';
        }

    }

    public function aksi_hapus_foto()
    {
        $id_pendaftaran=$this->uri->segment('4');
        $foto_pendaftaran=$this->uri->segment('5');
        $data=array(
            'foto_pendaftaran'=>'',
        );
        $this->db->where('id_pendaftaran',$id_pendaftaran);
        $this->db->update('pendaftaran',$data);
        if($this->db->affected_rows()>0)    
        {
            if(unlink('./assets/upload/santri/'.$foto_pendaftaran))
            {
                header('Location:'.base_url().'index.php/modul_pendaftaran/pendaftaran');
            }
            else
            {
                echo 'Gagal hapus foto';
            }
            
        }
        else 
        {
            echo 'Data gagal tersimpan !';
        }
    }
} 

?>