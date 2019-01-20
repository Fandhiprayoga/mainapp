<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_satuan_model extends CI_Model{


    public function tampil_mst_satuan_list()
    {
        $query = $this->db->query("select * from mst_satuan");
        return $query->result_array();
    }

    public function tambah_mst_satuan()
    {
        $data=array
        (
            'nama_satuan'=>$this->input->post('nama_satuan'),
           
        );
        $this->db->insert('mst_satuan',$data);
    }


    public function edit_mst_satuan()
    {
        $id_satuan=$this->input->post('id_satuan');
        $data=array
        (
            'nama_satuan'=>$this->input->post('nama_satuan'),
           
        );
        $this->db->where('id_satuan',$id_satuan);
        $this->db->update('mst_satuan',$data);
    }

    

    public function hapus_mst_satuan()
    {
        $id_satuan=$this->input->post('id_satuan');
        $this->db->where('id_satuan',$id_satuan);
        $this->db->delete('mst_satuan');
        return $this->db->affected_rows();
    }
    
}

?>