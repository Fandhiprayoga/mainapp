<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq_model extends CI_Model{


    public function tampil_infaq_list()
    {
        $query = $this->db->query("select * from mst_infaq ");
        return $query->result_array();
    }

    public function get_infaq_exist()
    {
        $id_infaq=$this->input->post('id_infaq');
        $query = $this->db->query("select * from mst_infaq where id_infaq ='".$id_infaq."'");
        return $query->result_array();
    }

    public function tambah_infaq()
    {
        $data=array
        (
            'nama_infaq'=>$this->input->post('nama_infaq'),
            'nominal_infaq'=>$this->input->post('nominal_infaq'),
            
        );
        $this->db->insert('mst_infaq',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function edit_infaq()
    {
        $id_infaq=$this->input->post('id_infaq');
        $data=array
        (
            'nama_infaq'=>$this->input->post('nama_infaq'),
            'nominal_infaq'=>$this->input->post('nominal_infaq'),
        );
        $this->db->where('id_infaq',$id_infaq);
        $this->db->update('mst_infaq',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function hapus_infaq()
    {
        $id_infaq=$this->input->post('id_infaq');
        $this->db->where('id_infaq',$id_infaq);
        $this->db->delete('mst_infaq');
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