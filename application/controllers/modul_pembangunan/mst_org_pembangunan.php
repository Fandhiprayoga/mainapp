<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_org_pembangunan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('modul_pembangunan/mst_org_pembangunan_model');
    }

    public function index()
    {       
        if($this->session->id_user=="")
        {
            redirect(base_url('index.php/auth'), 'refresh');
        }
        else
        {
            $data['data_mst_org_pembangunan']=$this->mst_org_pembangunan_model->tampil_mst_org_pembangunan_list();
            $data['page']='modul_pembangunan/mst_org_pembangunan/mst_org_pembangunan_modul_pembangunan_view';
            $this->load->view('modul_pembangunan/dasbor_modul_pembangunan_view', $data);
        }
    }

    public function aksi_tambah_mst_org_pembangunan()
    {
        $data=$this->mst_org_pembangunan_model->tambah_mst_org_pembangunan();
        echo json_encode($data);
    } 

    public function aksi_edit_mst_org_pembangunan()
    {
      $data=$this->mst_org_pembangunan_model->edit_mst_org_pembangunan();
      echo json_encode($data);
    }
    public function aksi_hapus_mst_org_pembangunan()
    {
      $data=$this->mst_org_pembangunan_model->hapus_mst_org_pembangunan();
      echo json_encode($data);
    }

    // public function export()
    // {
    //     $file_name = 'mst_org_pembangunan_'.date("Y-m-d h-i-s").'.csv';
    //     $query = $this->db->query("select id_donatur, nama_donatur, jk_donatur, t_donatur, tl_donatur, jabatan_donatur, alamat_donatur from mst_org_pembangunan where id_donatur!='OR999999999'");
    //     $delimiter = ";";
    //     $newline = "\n";
    //     $enclosure = '"';
    //     $this->load->dbutil();
    //     $data = $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
    //     $this->load->helper('download');
    //     force_download($file_name, $data);  
    //     exit();
    // }

    // public function import()
    // {
    //     /*Upload csv file into uploads folder*/    
    //     $config['upload_path'] ='./assets/upload/data';
    //     $config['allowed_types'] = 'xls|xlsx|csv';
    //     $config['encrypt_name']   = TRUE; //enkripsi file name upload
        
    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);
        
    //     if (!$this->upload->do_upload('attachment_data'))
    //     {
    //         echo $this->upload->display_errors();
    //         echo $this->input->post('attachment_data');
    //     }
    //     else
    //     {
    //         $upload_data = $this->upload->data();
    //         $attachment = $upload_data['full_path']; 
    //         $this->load->library('CSVReader');

    //         $csvData = $this->csvreader->parse_file($attachment);

    //         // echo "<pre>"; 
    //         // print_r($csvData);
    //         // echo "</pre>";

    //         foreach($csvData as $a)
    //         {
    //             $ex=$this->db->query("select * from mst_org_pembangunan where id_donatur='".$a['id_donatur']."'")->num_rows();
    //             if($ex>0)
    //             {
    //                 //engga ngapa-ngapain mhank
    //             }
    //             else
    //             {
    //                 $db=array(
    //                     'id_donatur'=>$a['id_donatur'],
    //                     'nama_donatur'=>$a['nama_donatur'],
    //                     'jk_donatur'=>$a['jk_donatur'],
    //                     't_donatur'=>$a['t_donatur'],
    //                     'tl_donatur'=>$a['tl_donatur'],
    //                     'jabatan_donatur'=>$a['jabatan_donatur'],
    //                     'alamat_donatur'=>$a['alamat_donatur'],
    //                 );
    //                 $c=$this->db->insert('mst_org_pembangunan',$db);
    //                 // $cx=$this->db->affected_rows();
    //                 // echo json_encode($cx);
    //             }
    //         }
    //         unlink($upload_data['full_path']);
    //         header("Location:".base_url()."index.php/modul_admin/mst_org_pembangunan");
    //     }
    // }

    // public function cetak()
    // {
        
        
    
    //     $this->load->library('pdf');
    
    //     $this->pdf->setPaper('A4', 'potrait');
    //     $this->pdf->filename = "data_donatur.pdf";
    //     $this->pdf->load_view('modul_admin/mst_org_pembangunan/cetak_mst_org_pembangunan_modul_admin_view');

    //     //$this->load->view('modul_admin/mst_org_pembangunan/cetak_mst_org_pembangunan_modul_admin_view');
    // }

//     public function tambah()
//     {
//         if($this->session->id_user=="")
//         {
//             redirect(base_url('index.php/auth'), 'refresh');
//         }
//         else
//         {
//             $data['data_mst_org_pembangunan']=$this->mst_org_pembangunan_model->tampil_mst_org_pembangunan_list();
//             $data['page']='modul_pembangunan/mst_org_pembangunan/tambah_mst_org_pembangunan_pembangunan_view';
//             $this->load->view('pembangunan/dasbor_pembangunan_view', $data);
//         }
//     }

//     public function aksi_tambah_mst_org_pembangunan()
//     {

//         $config['upload_path']    = "./assets/upload"; //path folder file upload
//         $config['allowed_types']  = 'gif|jpg|png'; //type file yang boleh di upload
//         $config['encrypt_name']   = TRUE; //enkripsi file name upload
         
       
//         $this->load->library('upload',$config); //call library upload 
//         if($this->upload->do_upload("file")){ //upload file
//             $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
//             $id         = $this->input->post('id');
//             $nama       = $this->input->post('nama');
//             $jk         = $this->input->post('jk');
//             $t          = strtoupper($this->input->post('t'));
//             $tl         = $this->input->post('tl');
//             $jabatan    = strtoupper($this->input->post('jabatan'));
//             $alamat     = $this->input->post('alamat');
           
//             $jabatan2   = substr($jabatan,0,1);
//             $id2         = $jabatan2.''.$id;
//             $id=$id2;
//             $nama_file  = $data['upload_data']['file_name']; //set file name ke variable image
//             $data       = $this->mst_org_pembangunan_model->tambah_mst_org_pembangunan($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat);
//             echo json_encode($data);
//     }
//     else
//     {
//             $id         = $this->input->post('id');
//             $nama       = $this->input->post('nama');
//             $jk         = $this->input->post('jk');
//             $t          = $this->input->post('t');
//             $tl         = $this->input->post('tl');
//             $jabatan    = $this->input->post('jabatan');
//             $alamat     = $this->input->post('alamat');
        
//             $jabatan2   = substr($jabatan,0,1);
//             $id2         = $jabatan2.''.$id;
//             $id=$id2;
//             $nama_file  = $data['upload_data']['file_name']; //set file name ke variable image
//             $data       = $this->mst_org_pembangunan_model->tambah_mst_org_pembangunan($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat);
//             echo json_encode($data);
//     }
// }

    // public function aksi_edit_mst_org_pembangunan()
    // {
    //     $config['upload_path']    = "./assets/upload"; //path folder file upload
    //     $config['allowed_types']  = 'gif|jpg|png'; //type file yang boleh di upload
    //     $config['encrypt_name']   = TRUE; //enkripsi file name upload
         
       
    //     $this->load->library('upload',$config); //call library upload 
    //     if($this->upload->do_upload("file")){ //upload file
    //         $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
            
    //         $id         = $this->input->post('id');
    //         $nama       = $this->input->post('nama');
    //         $jk         = $this->input->post('jk');
    //         $t          = $this->input->post('t');
    //         $tl         = $this->input->post('tl');
    //         $jabatan    = $this->input->post('jabatan');
    //         $alamat     = $this->input->post('alamat');
           
    //         // hapus data foto eksis
    //         $z            = $this->db->query("select foto_donatur from mst_org_pembangunan where id_donatur='".$id."'")->result_array();
            
    //             unlink('./assets/upload/'.$z[0]['foto_donatur']);
           
            

    //         $nama_file    = $data['upload_data']['file_name']; //set file name ke variable image
    //         $data         = $this->mst_org_pembangunan_model->edit_mst_org_pembangunan($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat);
    //         echo json_encode($data);
    //     // $data=$this->mst_org_pembangunan_model->edit_mst_org_pembangunan();
		// // echo json_encode($data);
    // }
    // else
    // {
    //         $id         = $this->input->post('id');
    //         $nama       = $this->input->post('nama');
    //         $jk         = $this->input->post('jk');
    //         $t          = $this->input->post('t');
    //         $tl         = $this->input->post('tl');
    //         $jabatan    = $this->input->post('jabatan');
    //         $alamat    = $this->input->post('alamat');

    //     $data=$this->mst_org_pembangunan_model->edit_mst_org_pembangunan_tanpa_foto($id,$nama,$jk,$t,$tl,$jabatan,$alamat);
    //     echo json_encode($data);
    // }
//}

    // public function aksi_hapus_mst_org_pembangunan()
    // {
    //     $id_donatur=$this->input->post('id_mst_org_pembangunan');
    //     // hapus data foto eksis
    //     $x= $this->db->query("select foto_donatur from mst_org_pembangunan where id_donatur='".$id_donatur."'")->result_array();
        

    //     $data=$this->mst_org_pembangunan_model->hapus_mst_org_pembangunan($id_donatur);
    //     if($data>0)
    //     {
    //         if($x[0]['foto_donatur']!=null)
    //         {
    //             $filename = $x[0]['foto_donatur'];
    //             $ifile ='./assets/upload/'. $filename; // this is the actual path to the file you want to delete.
    //             //$file=base_url().'assets/upload/'.$x[0]['foto_donatur'].'';
    //             unlink($ifile); // use server document root
               
    //         }
    //     }
		// echo json_encode($data);
    // }
} 

?>