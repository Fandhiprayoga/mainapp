<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_tukang_model extends CI_Model{


    public function tampil_mst_tukang_list()
    {
        $query = $this->db->query("select * from mst_tukang ");
        return $query->result_array();
    }

    public function tambah_mst_tukang()
    {
        $data=array
        (
            'nama_tukang'=>$this->input->post('nama_tukang'),
            'alamat'=>$this->input->post('alamat'),
            'no_telp'=>$this->input->post('no_telp'), 

        );
        $this->db->insert('mst_tukang',$data);
        return $this->db->affected_rows();
    }


    public function edit_mst_tukang()
    {
        $id_tukang=$this->input->post('id_tukang');
        $data=array
        (
            'nama_tukang'=>$this->input->post('nama_tukang'),
            'alamat'=>$this->input->post('alamat'),
            'no_telp'=>$this->input->post('no_telp'), 

        );
        $this->db->where('id_tukang',$id_tukang);
        $this->db->update('mst_tukang',$data);
    }

    public function hapus_mst_tukang()
    {
      $id_tukang=$this->input->post('id_tukang');
      $this->db->where('id_tukang',$id_tukang);
        $this->db->delete('mst_tukang');
        return $this->db->affected_rows();
    }
    
}

?>