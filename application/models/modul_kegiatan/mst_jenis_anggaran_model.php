<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_jenis_anggaran_model extends CI_Model{


    public function tampil_mst_jenis_anggaran_list()
    {
        $query = $this->db->query("select * from mst_jenis_anggaran");
        return $query->result_array();
    }

    public function tambah_mst_jenis_anggaran()
    {
        $data=array
        (
            'nama_jenis_anggaran'=>$this->input->post('nama_jenis_anggaran'),
           
        );
        $this->db->insert('mst_jenis_anggaran',$data);
    }


    public function edit_mst_jenis_anggaran()
    {
        $id_jenis_anggaran=$this->input->post('id_jenis_anggaran');
        $data=array
        (
            'nama_jenis_anggaran'=>$this->input->post('nama_jenis_anggaran'),
           
        );
        $this->db->where('id_jenis_anggaran',$id_jenis_anggaran);
        $this->db->update('mst_jenis_anggaran',$data);
    }

    

    public function hapus_mst_jenis_anggaran()
    {
        $id_jenis_anggaran=$this->input->post('id_jenis_anggaran');
        $this->db->where('id_jenis_anggaran',$id_jenis_anggaran);
        $this->db->delete('mst_jenis_anggaran');
        return $this->db->affected_rows();
    }
    
}

?>