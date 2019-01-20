<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trx_donatur_yayasan_model extends CI_Model{


    public function tampil_mst_donatur_list()
    {
        $query = $this->db->query("select * from mst_donatur ");
        return $query->result_array();
    }

    public function tampil_trx_donatur_yayasan_list()
    {
        $query = $this->db->query("select * from trx_donatur_yayasan order by id_trx_donatur_yayasan desc ");
        return $query->result_array();
    }

    public function tambah_trx_donatur_yayasan()
    {
        $data=array
        (
            'id_donatur'=>$this->input->post('id_donatur'),
            'nominal_trx_donatur_yayasan'=>$this->input->post('nominal_trx_donatur_yayasan'),
            'tgl_trx_donatur_yayasan'=>$this->input->post('tgl_trx_donatur_yayasan'),

        );
        $this->db->insert('trx_donatur_yayasan',$data);
        return $this->db->affected_rows();
    }


    public function edit_trx_donatur_yayasan()
    {
        $id_trx_donatur_yayasan=$this->input->post('id_trx_donatur_yayasan');
        $data=array
        (
            'id_donatur'=>$this->input->post('id_donatur'),
            'nominal_trx_donatur_yayasan'=>$this->input->post('nominal_trx_donatur_yayasan'),
            'tgl_trx_donatur_yayasan'=>$this->input->post('tgl_trx_donatur_yayasan'),
        );
        $this->db->where('id_trx_donatur_yayasan',$id_trx_donatur_yayasan);
        $this->db->update('trx_donatur_yayasan',$data);
    }

    public function hapus_trx_donatur_yayasan()
    {
        $id_trx_donatur_yayasan=$this->input->post('id_trx_donatur_yayasan');
        $this->db->where('id_trx_donatur_yayasan',$id_trx_donatur_yayasan);
        $this->db->delete('trx_donatur_yayasan');
        return $this->db->affected_rows();
    }
    
}

?>