<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asrama_model extends CI_Model{


    public function tampil_asrama_list()
    {
        $query = $this->db->query("select * from mst_asrama where id_asrama !=0");
        return $query->result_array();
    }

    public function get_asrama_exist()
    {
        $id_asrama=$this->input->post('id_asrama');
        $query = $this->db->query("select * from mst_asrama where id_asrama ='".$id_asrama."'");
        return $query->result_array();
    }

    public function tambah_asrama()
    {
        $data=array
        (
            'nama_asrama'=>$this->input->post('nama_asrama'),
        );
        $this->db->insert('mst_asrama',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function edit_asrama()
    {
        $id_asrama=$this->input->post('id_asrama');
        $data=array
        (
            'nama_asrama'=>$this->input->post('nama_asrama'),
        );
        $this->db->where('id_asrama',$id_asrama);
        $this->db->update('mst_asrama',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function hapus_asrama()
    {
        $id_asrama=$this->input->post('id_asrama');
        $this->db->where('id_asrama',$id_asrama);
        $this->db->delete('mst_asrama');
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