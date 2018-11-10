<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model{


    public function tampil_kelas_list()
    {
        $query = $this->db->query("select * from mst_kelas where id_kelas !=0");
        return $query->result_array();
    }

    public function get_kelas_exist()
    {
        $id_kelas=$this->input->post('id_kelas');
        $query = $this->db->query("select * from mst_kelas where id_kelas ='".$id_kelas."'");
        return $query->result_array();
    }

    public function tambah_kelas()
    {
        $data=array
        (
            'nama_kelas'=>$this->input->post('nama_kelas'),
        );
        $this->db->insert('mst_kelas',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function edit_kelas()
    {
        $id_kelas=$this->input->post('id_kelas');
        $data=array
        (
            'nama_kelas'=>$this->input->post('nama_kelas'),
        );
        $this->db->where('id_kelas',$id_kelas);
        $this->db->update('mst_kelas',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function hapus_kelas()
    {
        $id_kelas=$this->input->post('id_kelas');
        $this->db->where('id_kelas',$id_kelas);
        $this->db->delete('mst_kelas');
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    


}

?>