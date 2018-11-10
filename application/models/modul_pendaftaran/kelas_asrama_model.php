<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_asrama_model extends CI_Model{


    public function tampil_kelas_asrama_list()
    {
        $query = $this->db->query("select * from kelas_asrama");
        return $query->result_array();
    }

    // public function get_kelas_asrama_exist()
    // {
    //     $id_kelas_asrama=$this->input->post('id_kelas_asrama');
    //     $query = $this->db->query("select * from kelas_asrama where id_kelas_asrama ='".$id_kelas_asrama."'");
    //     return $query->result_array();
    // }

    // public function tambah_kelas_asrama()
    // {
    //     $data=array
    //     (
    //         'nama_kelas_asrama'=>$this->input->post('nama_kelas_asrama'),
    //     );
    //     $this->db->insert('kelas_asrama',$data);
    //     if($this->db->affected_rows()>0)    
    //     {
    //         return TRUE;
    //     }
    //     else {
    //         return FALSE;
    //     }
    // }

    public function edit_kelas_asrama_kelas()
    {
        $id_kelas_asrama=$this->input->post('id_kelas_asrama');
        $data=array
        (
            'id_kelas'=>$this->input->post('id_kelas'),
        );
        $this->db->where('id_kelas_asrama',$id_kelas_asrama);
        $this->db->update('kelas_asrama',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function edit_kelas_asrama_asrama()
    {
        $id_kelas_asrama=$this->input->post('id_kelas_asrama');
        $data=array
        (
            'id_asrama'=>$this->input->post('id_asrama'),
        );
        $this->db->where('id_kelas_asrama',$id_kelas_asrama);
        $this->db->update('kelas_asrama',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    // public function hapus_kelas_asrama()
    // {
    //     $id_kelas_asrama=$this->input->post('id_kelas_asrama');
    //     $this->db->where('id_kelas_asrama',$id_kelas_asrama);
    //     $this->db->delete('kelas_asrama');
    //     if($this->db->affected_rows()>0)    
    //     {
    //         return TRUE;
    //     }
    //     else {
    //         return FALSE;
    //     }
    // }
    


}

?>