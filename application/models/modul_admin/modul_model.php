<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul_model extends CI_Model{

    public function tampil_modul()
    {
        $query = $this->db->query("select * from modul");
        return $query->result_array();
    }

    public function tampil_modul_list()
    {
        $query = $this->db->query("select * from modul where status_aktif='Aktif' order by order_modul asc");
        return $query->result_array();
    }

    public function tambah_modul()
    {
        $data=array
        (
            'nama_modul'=>$this->input->post('nama_modul'),
            'link_modul'=>$this->input->post('link_modul'),
            'icon'=>$this->input->post('icon'),
            'order_modul'=>$this->input->post('order'),
            'status_aktif'=>$this->input->post('status_aktif'),
        );
        $this->db->insert('modul',$data);
    }

    public function edit_modul()
    {
        $id_modul=$this->input->post('id_modul');
        $data=array
        (
            'nama_modul'=>$this->input->post('nama_modul'),
            'link_modul'=>$this->input->post('link_modul'),
            'icon'=>$this->input->post('icon'),
            'order_modul'=>$this->input->post('order'),
            'status_aktif'=>$this->input->post('status_aktif'),
        );
        $this->db->where('id',$id_modul);
        $this->db->update('modul',$data);
    }

    public function hapus_modul()
    {
        $id_modul=$this->input->post('id_modul');
        $this->db->where('id',$id_modul);
        $this->db->delete('modul');
    }
}
?>