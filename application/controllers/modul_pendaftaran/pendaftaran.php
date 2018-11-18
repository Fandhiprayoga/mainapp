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

    public function tambah_santri_lama()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pendaftaran']=$this->pendaftaran_model->tampil_pendaftaran_list_lama();
            $data['page']='modul_pendaftaran/pendaftaran/tambah_santri_lama_pendaftaran_modul_pendaftaran_view';
            $this->load->view('modul_pendaftaran/dasbor_modul_pendaftaran_view', $data);
        }
    }

    public function get_pendaftaran_exist()
    {
        $data=$this->pendaftaran_model->get_pendaftaran_exist();
		echo json_encode($data);
    }

    public function get_santri_exist()
    {
        $data=$this->pendaftaran_model->get_santri_exist();
		echo json_encode($data);
    }

    public function aksi_tambah_pendaftaran()
    {

        $this->barcode($this->input->post('id_pendaftaran'));
        $data=$this->pendaftaran_model->tambah_pendaftaran();
        
		echo json_encode($data);
    }

    public function aksi_tambah_pendaftaran_lama()
    {
        //insert pendaftaran
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $this->barcode($this->input->post('id_pendaftaran'));
        $data=$this->pendaftaran_model->tambah_pendaftaran_lama();
        
        if($data)
        {
            //insert daftar_ulang
            $du=array
            (
                'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
                'infaq_daftar_ulang'=>'santri_lama',
                'status_daftar_ulang'=>'1',
            );
            $this->db->insert('daftar_ulang',$du);
            if($this->db->affected_rows()>0)    
             {
                $data=TRUE;
             }
             else {
                 $data= FALSE;
             }

             //insert mst_santri
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

              //insert kelas_asrama
            $obj_kelas_asrm=array('id_santri'=>$id_pendaftaran,);
             $kls_asrm=$this->db->insert('kelas_asrama', $obj_kelas_asrm);
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
            $data=false;
        }
		echo json_encode($data);
    }

    public function aksi_edit_pendaftaran()
    {   
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $data['data_esp']=$this->pendaftaran_model->edit_pendaftaran();
        if($data)
        {
            $a=$this->db->query('select * from mst_santri where id_santri="'.$id_pendaftaran.'"')->num_rows();
            if($a>0)
            {
                   //edit mst_santri
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
                        'n_santri'=>$n_santri,
                        'nl_santri'=>$nl_santri,
                        't_santri'=>$t_santri,
                        'tl_santri'=>$tl_santri,
                        'alamat_santri'=>$alamat_santri,
                        'telp_santri'=>$telp_santri,
                        'email_santri'=>$email_santri,
                        'instansi_santri'=>$instansi_santri,
                    );
                    $this->db->where('id_santri',$id_pendaftaran);
                    $this->db->update('mst_santri', $obj);
                    if($this->db->affected_rows()>0)    
                    {
                        $data=TRUE;
                    }
                    else {
                        $data= FALSE;
                    }
            }
        }
		echo json_encode($data);
    }

    public function aksi_hapus_pendaftaran()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $du=$this->db->query('select * from daftar_ulang where id_pendaftaran="'.$id_pendaftaran.'"')->result_array();
        $p=$this->db->query('select * from pendaftaran where id_pendaftaran="'.$id_pendaftaran.'"')->result_array();
        if(count($du))
        {
            
            if($du[0]['ijazah_daftar_ulang']!="")
            {
                if(file_exists('./assets/upload/ijazah/'.$du[0]['ijazah_daftar_ulang']))
                {
                    unlink('./assets/upload/ijazah/'.$du[0]['ijazah_daftar_ulang']);
                }
            }else
            {
                $data['ijazah']='gagal hapus data';
            }
             if($du[0]['kk_daftar_ulang']!="")
            {
                if(file_exists('./assets/upload/kk/'.$du[0]['kk_daftar_ulang']))
                {
                    unlink('./assets/upload/kk/'.$du[0]['kk_daftar_ulang']);
                }
                
            }else
            {
                $data['kk']='gagal hapus data';
            }
             if($du[0]['infaq_daftar_ulang']!="")
            {
                if(file_exists('./assets/upload/infaq/'.$du[0]['infaq_daftar_ulang']))
                {
                    unlink('./assets/upload/infaq/'.$du[0]['infaq_daftar_ulang']);
                } 
            }else
            {
                $data['infaq']='gagal hapus data';
            }
             if($du[0]['yatim_daftar_ulang']!="")
            {
                if(file_exists('./assets/upload/yatim/'.$du[0]['yatim_daftar_ulang']))
                {
                    unlink('./assets/upload/yatim/'.$du[0]['yatim_daftar_ulang']);
                } 
            }
            else
            {
                $data['yatim']='gagal hapus data';
            }

        }
        if(count($p))
        {
            if($p[0]['foto_pendaftaran']!="")
            {
                if(file_exists('./assets/upload/santri/'.$p[0]['foto_pendaftaran']))
                {
                    unlink('./assets/upload/santri/'.$p[0]['foto_pendaftaran']);
                }
                
            }
            else
            {
                $data['santri']='gagal hapus data';
            }
             if(file_exists('./assets/upload/barcode/'.$id_pendaftaran.'.jpg'))
            {
                unlink('./assets/upload/barcode/'.$id_pendaftaran.'.jpg');
            }
            else
            {
                $data['barcode']='gagal hapus data';
            }
        }
        $data['db']=$this->pendaftaran_model->hapus_pendaftaran();
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

    public function aksi_upload_foto_lama()
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
                header('Location:'.base_url().'index.php/modul_pendaftaran/pendaftaran/tambah_santri_lama');
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

    public function aksi_hapus_foto_lama()
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
                header('Location:'.base_url().'index.php/modul_pendaftaran/pendaftaran/tambah_santri_lama');
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