<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_kegiatan/pengajuan_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pengajuan']=$this->pengajuan_model->tampil_pengajuan_list();
            $data['page']='modul_kegiatan/pengajuan/pengajuan_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function export()
    {
        $file_name = 'pengajuan_'.date("Y-m-d h-i-s").'.csv';
        $query = $this->db->query('select id_staff, nama_staff, jk_staff, t_staff, tl_staff, jabatan_staff, alamat_staff from pengajuan');

        $this->load->dbutil();
        $data = $this->dbutil->csv_from_result($query);
        $this->load->helper('download');
        force_download($file_name, $data);  
        exit();
    }

    public function import()
    {
        /*Upload csv file into uploads folder*/    
        $config['upload_path'] ='./assets/upload/data';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['encrypt_name']   = TRUE; //enkripsi file name upload
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('attachment_data'))
        {
            echo $this->upload->display_errors();
            echo $this->input->post('attachment_data');
        }
        else
        {
            $upload_data = $this->upload->data();
            $attachment = $upload_data['full_path']; 
            $this->load->library('CSVReader');

            $csvData = $this->csvreader->parse_file($attachment);

            // echo "<pre>"; 
            // print_r($csvData);
            // echo "</pre>";

            foreach($csvData as $a)
            {
                $ex=$this->db->query("select * from pengajuan where id_staff='".$a['id_staff']."'")->num_rows();
                if($ex>0)
                {
                    //engga ngapa-ngapain mhank
                }
                else
                {
                    $db=array(
                        'id_staff'=>$a['id_staff'],
                        'nama_staff'=>$a['nama_staff'],
                        'jk_staff'=>$a['jk_staff'],
                        't_staff'=>$a['t_staff'],
                        'tl_staff'=>$a['tl_staff'],
                        'jabatan_staff'=>$a['jabatan_staff'],
                        'alamat_staff'=>$a['alamat_staff'],
                    );
                    $c=$this->db->insert('pengajuan',$db);
                    // $cx=$this->db->affected_rows();
                    // echo json_encode($cx);
                }
            }
            unlink($upload_data['full_path']);
            header("Location:".base_url()."index.php/modul_admin/pengajuan");
        }
    }

    public function cetak()
    {
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "data_staff.pdf";
        $this->pdf->load_view('modul_admin/pengajuan/cetak_pengajuan_modul_admin_view');
        //$this->load->view('modul_admin/pengajuan/cetak_pengajuan_modul_admin_view');
    }
    
    public function cetak_laporan()
    {
        $data['kegiatan']=$this->uri->segment('4');
        $data['tgl_awal']=$this->uri->segment('5');
        $data['tgl_akhir']=$this->uri->segment('6');
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "data_laporan.pdf";
        $this->pdf->load_view('modul_kegiatan/pengajuan/cetak_laporan_modul_kegiatan_view',$data);
        //$this->load->view('modul_admin/pengajuan/cetak_pengajuan_modul_admin_view');
    }


    public function tambah()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_pengajuan']=$this->pengajuan_model->tampil_pengajuan_list();
            $data['page']='modul_kegiatan/pengajuan/tambah_pengajuan_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function proposal()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_proposal']=$this->pengajuan_model->tampil_proposal_list();
            $data['page']='modul_kegiatan/pengajuan/proposal_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function lpj()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_lpj']=$this->pengajuan_model->tampil_lpj_list();
            $data['page']='modul_kegiatan/pengajuan/lpj_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function get_history_lpj()
    {
        $data             = $this->pengajuan_model->get_history_lpj();
        echo json_encode($data);
    }   

    public function galeri()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_galeri']=$this->pengajuan_model->tampil_lpj_list();
            $data['page']='modul_kegiatan/pengajuan/galeri_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function laporan()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_galeri']=$this->pengajuan_model->tampil_lpj_list();
            $data['page']='modul_kegiatan/pengajuan/laporan_modul_kegiatan_view';
            $this->load->view('modul_kegiatan/dasbor_modul_kegiatan_view', $data);
        }
    }

    public function aksi_upload_proposal()
    {
        $id_pengajuan= $this->input->post('id_pengajuan');
        
        $config['upload_path']    = "./assets/upload/proposal"; //path folder file upload
        $config['allowed_types']  = 'pdf'; //type file yang boleh di upload
        $config['encrypt_name']   = TRUE; //enkripsi file name upload

        $this->load->library('upload',$config); //call library upload
        if($this->upload->do_upload("proposal"))
        {
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
            $nama_file  = $data['upload_data']['file_name'];
            $data_ins=array(
                'proposal_kegiatan'=>$nama_file,
            );

            $this->db->where('id_pengajuan',$id_pengajuan);
            $this->db->update('pengajuan', $data_ins);
            if($this->db->affected_rows()>0)    
             {
                header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/proposal');
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

    public function aksi_upload_lpj()
    {
        $id_pengajuan= $this->input->post('id_pengajuan');
        $date_history =  date("Y-m-d H:i:s");
        $config['upload_path']    = "./assets/upload/lpj"; //path folder file upload
        $config['allowed_types']  = 'pdf'; //type file yang boleh di upload
        $config['encrypt_name']   = TRUE; //enkripsi file name upload

        $this->load->library('upload',$config); //call library upload
        if($this->upload->do_upload("lpj"))
        {
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
            $nama_file  = $data['upload_data']['file_name'];
            $data_ins=array(
                'lpj_kegiatan'=>$nama_file,
            );

            $this->db->where('id_pengajuan',$id_pengajuan);
            $this->db->update('pengajuan', $data_ins);
            if($this->db->affected_rows()>0)    
             {
                 $dataHistory=array(
                     'id_pengajuan'=>$id_pengajuan,
                     'nama_file'=>$nama_file,
                     'date_history'=>$date_history,
                 );
                 $this->db->insert('history_lpj', $dataHistory);
                 if($this->db->affected_rows()>0)
                 {
                    header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/lpj');
                 }
                 else
                 {
                    echo 'Data gagal tersimpan !';
                 }
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

    public function aksi_upload_galeri()
    {
        $id_pengajuan= $this->input->post('id_pengajuan');
        
        $config['upload_path']    = "./assets/upload/galeri"; //path folder file upload
        $config['allowed_types']  = 'zip|rar'; //type file yang boleh di upload
        $config['encrypt_name']   = TRUE; //enkripsi file name upload

        $this->load->library('upload',$config); //call library upload
        if($this->upload->do_upload("galeri"))
        {
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
            $nama_file  = $data['upload_data']['file_name'];
            $data_ins=array(
                'galeri_kegiatan'=>$nama_file,
            );

            $this->db->where('id_pengajuan',$id_pengajuan);
            $this->db->update('pengajuan', $data_ins);
            if($this->db->affected_rows()>0)    
             {
                header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/galeri');
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

    public function aksi_hapus_proposal()
    {
        $id_pengajuan=$this->uri->segment('4');
        $proposal_kegiatan=$this->uri->segment('5');
        $data=array(
            'proposal_kegiatan'=>null,
        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        if($this->db->affected_rows()>0)    
        {
            if(unlink('./assets/upload/proposal/'.$proposal_kegiatan))
            {
                header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/proposal');
            }
            else
            {
                echo 'Gagal hapus proposal';
            }
            
        }
        else 
        {
            echo 'Data gagal tersimpan !';
        }
    }

    public function aksi_hapus_lpj()
    {
        $id_pengajuan=$this->uri->segment('4');
        $lpj_kegiatan=$this->uri->segment('5');
        $data=array(
            'lpj_kegiatan'=>null,
        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        if($this->db->affected_rows()>0)    
        {
            header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/lpj');
            // if(unlink('./assets/upload/lpj/'.$lpj_kegiatan))
            // {
            //     header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/lpj');
            // }
            // else
            // {
            //     echo 'Gagal hapus proposal';
            // }
            
        }
        else 
        {
            echo 'Data gagal tersimpan !';
        }
    }

    public function aksi_hapus_galeri()
    {
        $id_pengajuan=$this->uri->segment('4');
        $galeri_kegiatan=$this->uri->segment('5');
        $data=array(
            'galeri_kegiatan'=>null,
        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        if($this->db->affected_rows()>0)    
        {
            if(unlink('./assets/upload/lpj/'.$galeri_kegiatan))
            {
                header('Location:'.base_url().'index.php/modul_kegiatan/pengajuan/galeri');
            }
            else
            {
                echo 'Gagal hapus proposal';
            }
            
        }
        else 
        {
            echo 'Data gagal tersimpan !';
        }
    }

    public function aksi_tambah_pengajuan()
    {

            $data             = $this->pengajuan_model->tambah_pengajuan();
            echo json_encode($data);
    }

    public function aksi_edit_pengajuan()
    {   
            $data             = $this->pengajuan_model->edit_pengajuan($id,$id_organisasi,$jabatan);
            echo json_encode($data);
    }

    public function aksi_hapus_pengajuan()
    {
            $data=$this->pengajuan_model->hapus_pengajuan();
        
            echo json_encode($data);
    }

    public function tampil_laporan()
    {
        $data=$this->pengajuan_model->tampil_laporan();
        echo json_encode($data);
    }
} 

?>