<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_staff extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_admin/mst_staff_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_mst_staff']=$this->mst_staff_model->tampil_mst_staff_list();
            $data['page']='modul_admin/mst_staff/mst_staff_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    public function export()
    {
        $file_name = 'mst_staff_'.date("Y-m-d h-i-s").'.csv';
        $query = $this->db->query('select id_staff, nama_staff, jk_staff, t_staff, tl_staff, jabatan_staff, alamat_staff from mst_staff');

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
                $ex=$this->db->query('select * from mst_staff where id_staff="'.$a['id_staff'].'"')->num_rows();
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
                    $c=$this->db->insert('mst_staff',$db);
                    // $cx=$this->db->affected_rows();
                    // echo json_encode($cx);
                }
            }
            unlink($upload_data['full_path']);
            header("Location:".base_url()."index.php/modul_admin/mst_staff");
        }
    }

    public function cetak()
    {
        
        
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "data_staff.pdf";
        $this->pdf->load_view('modul_admin/mst_staff/cetak_mst_staff_modul_admin_view');

        //$this->load->view('modul_admin/mst_staff/cetak_mst_staff_modul_admin_view');
    }

    public function tambah()
    {
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_mst_staff']=$this->mst_staff_model->tampil_mst_staff_list();
            $data['page']='modul_admin/mst_staff/tambah_mst_staff_modul_admin_view';
            $this->load->view('modul_admin/dasbor_modul_admin_view', $data);
        }
    }

    public function aksi_tambah_mst_staff()
    {

        $config['upload_path']    = "./assets/upload"; //path folder file upload
        $config['allowed_types']  = 'gif|jpg|png'; //type file yang boleh di upload
        $config['encrypt_name']   = TRUE; //enkripsi file name upload
         
       
        $this->load->library('upload',$config); //call library upload 
        if($this->upload->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $jk         = $this->input->post('jk');
            $t          = strtoupper($this->input->post('t'));
            $tl         = $this->input->post('tl');
            $jabatan    = strtoupper($this->input->post('jabatan'));
            $alamat     = $this->input->post('alamat');
           
            $jabatan2   = substr($jabatan,0,1);
            $id2         = $jabatan2.''.$id;
            $id=$id2;
            $nama_file  = $data['upload_data']['file_name']; //set file name ke variable image
            $data       = $this->mst_staff_model->tambah_mst_staff($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat);
            echo json_encode($data);
    }
    else
    {
            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $jk         = $this->input->post('jk');
            $t          = $this->input->post('t');
            $tl         = $this->input->post('tl');
            $jabatan    = $this->input->post('jabatan');
            $alamat     = $this->input->post('alamat');
        
            $jabatan2   = substr($jabatan,0,1);
            $id2         = $jabatan2.''.$id;
            $id=$id2;
            $nama_file  = $data['upload_data']['file_name']; //set file name ke variable image
            $data       = $this->mst_staff_model->tambah_mst_staff($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat);
            echo json_encode($data);
    }
}

    public function aksi_edit_mst_staff()
    {
        $config['upload_path']    = "./assets/upload"; //path folder file upload
        $config['allowed_types']  = 'gif|jpg|png'; //type file yang boleh di upload
        $config['encrypt_name']   = TRUE; //enkripsi file name upload
         
       
        $this->load->library('upload',$config); //call library upload 
        if($this->upload->do_upload("file")){ //upload file
            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $jk         = $this->input->post('jk');
            $t          = $this->input->post('t');
            $tl         = $this->input->post('tl');
            $jabatan    = $this->input->post('jabatan');
            $alamat     = $this->input->post('alamat');
           
            // hapus data foto eksis
            $z            = $this->db->query('select foto_staff from mst_staff where id_staff="'.$id.'"')->result_array();
            unlink('assets/upload/'.$z[0]['foto_staff']);

            $nama_file    = $data['upload_data']['file_name']; //set file name ke variable image
            $data         = $this->mst_staff_model->edit_mst_staff($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat);
            echo json_encode($data);
        // $data=$this->mst_staff_model->edit_mst_staff();
		// echo json_encode($data);
    }
    else
    {
            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $jk         = $this->input->post('jk');
            $t          = $this->input->post('t');
            $tl         = $this->input->post('tl');
            $jabatan    = $this->input->post('jabatan');
            $alamat    = $this->input->post('alamat');

        $data=$this->mst_staff_model->edit_mst_staff_tanpa_foto($id,$nama,$jk,$t,$tl,$jabatan,$alamat);
        echo json_encode($data);
    }
}

    public function aksi_hapus_mst_staff()
    {
        $id_staff=$this->input->post('id_mst_staff');
        // hapus data foto eksis
        $x= $this->db->query('select foto_staff from mst_staff where id_staff="'.$id_staff.'"')->result_array();
        

        $data=$this->mst_staff_model->hapus_mst_staff($id_staff);
        if($data>0)
        {
            if($x[0]['foto_staff']!=null)
            {
                $filename = $x[0]['foto_staff'];
                $ifile ='./assets/upload/'. $filename; // this is the actual path to the file you want to delete.
                //$file=base_url().'assets/upload/'.$x[0]['foto_staff'].'';
                unlink($ifile); // use server document root
               
            }
        }
		echo json_encode($data);
    }
} 

?>