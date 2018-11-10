<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model{


    public function tampil_santri_list()
    {
        $query = $this->db->query("select * from mst_santri order by id_santri desc");
        return $query->result_array();
    }

//     public function get_santri_exist()
//     {
//         $id_santri=$this->input->post('id_santri');
//         $query = $this->db->query("select * from mst_santri where id_santri ='".$id_santri."'");
//         return $query->result_array();
//     }

//     public function tambah_santri()
//     {
//         $data=array
//         (
//             'nama_santri'=>$this->input->post('nama_santri'),
//             'nominal_santri'=>$this->input->post('nominal_santri'),
            
//         );
//         $this->db->insert('mst_santri',$data);
//         if($this->db->affected_rows()>0)    
//         {
//             return TRUE;
//         }
//         else {
//             return FALSE;
//         }
//     }

    public function edit_santri()
    {
        $id_santri=$this->input->post('id_santri');
        $data=array
        (
            'n_santri'=>$this->input->post('n_santri'),
            'nl_santri'=>$this->input->post('n_santri'),
            't_santri'=>$this->input->post('t_santri'),
            'tl_santri'=>$this->input->post('tl_santri'),
            'telp_santri'=>$this->input->post('telp_santri'),
            'email_santri'=>$this->input->post('email_santri'),
            'instansi_santri'=>$this->input->post('instansi_santri'),
            'alamat_santri'=>$this->input->post('alamat_santri'),
            'status_santri'=>$this->input->post('status_santri'),
        );
        $this->db->where('id_santri',$id_santri);
        $this->db->update('mst_santri',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function edit_status_santri()
    {
        $id_santri=$this->input->post('id_santri');
        $data=array
        (
            'status_santri'=>$this->input->post('status_santri'),
        );
        $this->db->where('id_santri',$id_santri);
        $this->db->update('mst_santri',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

//     public function hapus_santri()
//     {
//         $id_santri=$this->input->post('id_santri');
//         $this->db->where('id_santri',$id_santri);
//         $this->db->delete('mst_santri');
//         if($this->db->affected_rows()>0)    
//         {
//             return TRUE;
//         }
//         else {
//             return FALSE;
//         }
//     }
    


}

?>