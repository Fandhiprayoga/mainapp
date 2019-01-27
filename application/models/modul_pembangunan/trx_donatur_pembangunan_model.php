<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trx_donatur_pembangunan_model extends CI_Model{


    public function tampil_mst_donatur_list()
    {
        $query = $this->db->query("select * from mst_donatur_pembangunan");
        return $query->result_array();
    }

    public function tampil_trx_donatur_pembangunan_list()
    {
        $query = $this->db->query("select * from trx_donatur_pembangunan order by id_trx_donatur_pembangunan desc ");
        return $query->result_array();
    }

    public function tambah_trx_donatur_pembangunan()
    {
        $data=array
        (
            'id_donatur'=>$this->input->post('id_donatur'),
            'nominal_trx_donatur_pembangunan'=>$this->input->post('nominal_trx_donatur_pembangunan'),
            'tgl_trx_donatur_pembangunan'=>$this->input->post('tgl_trx_donatur_pembangunan'),

        );
        $this->db->insert('trx_donatur_pembangunan',$data);
        return $this->db->affected_rows();
    }


    public function edit_trx_donatur_pembangunan()
    {
        $id_trx_donatur_pembangunan=$this->input->post('id_trx_donatur_pembangunan');
        $data=array
        (
            'id_donatur'=>$this->input->post('id_donatur'),
            'nominal_trx_donatur_pembangunan'=>$this->input->post('nominal_trx_donatur_pembangunan'),
            'tgl_trx_donatur_pembangunan'=>$this->input->post('tgl_trx_donatur_pembangunan'),
        );
        $this->db->where('id_trx_donatur_pembangunan',$id_trx_donatur_pembangunan);
        $this->db->update('trx_donatur_pembangunan',$data);
    }

    public function hapus_trx_donatur_pembangunan()
    {
        $id_trx_donatur_pembangunan=$this->input->post('id_trx_donatur_pembangunan');
        $this->db->where('id_trx_donatur_pembangunan',$id_trx_donatur_pembangunan);
        $this->db->delete('trx_donatur_pembangunan');
        return $this->db->affected_rows();
    }
    
}

?>