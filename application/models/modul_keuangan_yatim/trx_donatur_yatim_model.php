<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trx_donatur_yatim_model extends CI_Model{


    public function tampil_mst_donatur_list()
    {
        $query = $this->db->query("select * from mst_donatur_yatim ");
        return $query->result_array();
    }

    public function tampil_trx_donatur_yatim_list()
    {
        $query = $this->db->query("select * from trx_donatur_yatim order by id_trx_donatur_yatim desc ");
        return $query->result_array();
    }

    public function tambah_trx_donatur_yatim()
    {
        $data=array
        (
            'id_donatur'=>$this->input->post('id_donatur'),
            'nominal_trx_donatur_yatim'=>$this->input->post('nominal_trx_donatur_yatim'),
            'tgl_trx_donatur_yatim'=>$this->input->post('tgl_trx_donatur_yatim'),

        );
        $this->db->insert('trx_donatur_yatim',$data);
        return $this->db->affected_rows();
    }


    public function edit_trx_donatur_yatim()
    {
        $id_trx_donatur_yatim=$this->input->post('id_trx_donatur_yatim');
        $data=array
        (
            'id_donatur'=>$this->input->post('id_donatur'),
            'nominal_trx_donatur_yatim'=>$this->input->post('nominal_trx_donatur_yatim'),
            'tgl_trx_donatur_yatim'=>$this->input->post('tgl_trx_donatur_yatim'),
        );
        $this->db->where('id_trx_donatur_yatim',$id_trx_donatur_yatim);
        $this->db->update('trx_donatur_yatim',$data);
    }

    public function hapus_trx_donatur_yatim()
    {
        $id_trx_donatur_yatim=$this->input->post('id_trx_donatur_yatim');
        $this->db->where('id_trx_donatur_yatim',$id_trx_donatur_yatim);
        $this->db->delete('trx_donatur_yatim');
        return $this->db->affected_rows();
    }
    
}

?>