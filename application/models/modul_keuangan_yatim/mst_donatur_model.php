<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_donatur_model extends CI_Model{


    public function tampil_mst_donatur_list()
    {
        $query = $this->db->query("select * from mst_donatur_yatim ");
        return $query->result_array();
    }

    public function tambah_mst_donatur()
    {
        $data=array
        (
            'nama_donatur'=>$this->input->post('nama_donatur'),
            'telp_donatur'=>$this->input->post('telp_donatur'),
            'alamat_donatur'=>$this->input->post('alamat_donatur'),

        );
        $this->db->insert('mst_donatur_yatim',$data);
        return $this->db->affected_rows();
    }


    public function edit_mst_donatur()
    {
        $id_donatur=$this->input->post('id_donatur');
        $data=array
        (
          'nama_donatur'=>$this->input->post('nama_donatur'),
          'telp_donatur'=>$this->input->post('telp_donatur'),
          'alamat_donatur'=>$this->input->post('alamat_donatur'),
        );
        $this->db->where('id_donatur',$id_donatur);
        $this->db->update('mst_donatur_yatim',$data);
    }

    public function hapus_mst_donatur()
    {
        $id_donatur=$this->input->post('id_donatur');
        $this->db->where('id_donatur',$id_donatur);
        $this->db->delete('mst_donatur_yatim');
        return $this->db->affected_rows();
    }
    
}

?>