<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_staff_model extends CI_Model{


    public function tampil_mst_staff_list()
    {
        $query = $this->db->query("select * from mst_staff");
        return $query->result_array();
    }

    public function tambah_mst_staff($id,$id_organisasi,$jabatan)
    {
        $data=array
        (
            'id_staff'=>$id,
            'id_organisasi'=>$id_organisasi,
            'jabatan_staff'=>$jabatan,
           
        );
        $this->db->insert('mst_staff',$data);
    }


    public function edit_mst_staff($id,$id_organisasi,$jabatan)
    {
        $id_mst_staff=$id;
        $data=array
        (
    
            'id_organisasi'=>$id_organisasi,
            'jabatan_staff'=>$jabatan,
        );
        $this->db->where('id_staff',$id_mst_staff);
        $this->db->update('mst_staff',$data);
    }

    

    public function hapus_mst_staff($id_staff)
    {
        
        $this->db->where('id_staff',$id_staff);
        $this->db->delete('mst_staff');
        return $this->db->affected_rows();
    }
    
}

?>