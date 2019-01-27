<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_org_pembangunan_model extends CI_Model{


    public function tampil_mst_org_pembangunan_list()
    {
        $query = $this->db->query("select * from mst_org_pembangunan ");
        return $query->result_array();
    }

    public function tambah_mst_org_pembangunan()
    {
        $data=array
        (
            'id_org_pembangunan'=> $this->input->post('id_org_pembangunan'),
            'nama'=>$this->input->post('nama'),
            'jk'=>$this->input->post('jk'),
            'tempat_lahir'=>$this->input->post('tempat_lahir'),
            'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
            'jabatan'=>$this->input->post('jabatan'),
            'alamat'=>$this->input->post('alamat'), 

        );
        $this->db->insert('mst_org_pembangunan',$data);
        return $this->db->affected_rows();
    }


    public function edit_mst_org_pembangunan()
    {
        $id_org_pembangunan=$this->input->post('id_org_pembangunan');
        $data=array
        (
          'nama'=>$this->input->post('nama'),
          'jk'=>$this->input->post('jk'),
          'tempat_lahir'=>$this->input->post('tempat_lahir'),
          'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
          'jabatan'=>$this->input->post('jabatan'),
          'alamat'=>$this->input->post('alamat'), 
        );
        $this->db->where('id_org_pembangunan',$id_org_pembangunan);
        $this->db->update('mst_org_pembangunan',$data);
    }

    public function hapus_mst_org_pembangunan()
    {
      $id_org_pembangunan=$this->input->post('id_org_pembangunan');
      $this->db->where('id_org_pembangunan',$id_org_pembangunan);
        $this->db->delete('mst_org_pembangunan');
        return $this->db->affected_rows();
    }
    
}

?>