<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_org_yayasan_model extends CI_Model{


    public function tampil_mst_org_yayasan_list()
    {
        $query = $this->db->query("select * from mst_org_yayasan ");
        return $query->result_array();
    }

    public function tambah_mst_org_yayasan()
    {
        $data=array
        (
            'id_org_yayasan'=> $this->input->post('id_org_yayasan'),
            'nama'=>$this->input->post('nama'),
            'jk'=>$this->input->post('jk'),
            'tempat_lahir'=>$this->input->post('tempat_lahir'),
            'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
            'jabatan'=>$this->input->post('jabatan'),
            'alamat'=>$this->input->post('alamat'), 

        );
        $this->db->insert('mst_org_yayasan',$data);
        return $this->db->affected_rows();
    }


    public function edit_mst_org_yayasan()
    {
        $id_org_yayasan=$this->input->post('id_org_yayasan');
        $data=array
        (
          'nama'=>$this->input->post('nama'),
          'jk'=>$this->input->post('jk'),
          'tempat_lahir'=>$this->input->post('tempat_lahir'),
          'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
          'jabatan'=>$this->input->post('jabatan'),
          'alamat'=>$this->input->post('alamat'), 
        );
        $this->db->where('id_org_yayasan',$id_org_yayasan);
        $this->db->update('mst_org_yayasan',$data);
    }

    public function hapus_mst_org_yayasan()
    {
      $id_org_yayasan=$this->input->post('id_org_yayasan');
      $this->db->where('id_org_yayasan',$id_org_yayasan);
        $this->db->delete('mst_org_yayasan');
        return $this->db->affected_rows();
    }
    
}

?>