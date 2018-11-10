<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu_model extends CI_Model{


    public function tampil_submenu_list()
    {
        $query = $this->db->query("SELECT (SELECT id_modul FROM menu WHERE id=sm.id_menu) AS id_modul, sm.* FROM submenu sm ORDER BY id_modul, sm.id_menu,  sm.order_submenu ASC");
        return $query->result_array();
    }

    // public function tampil_menu_list()
    // {
    //     $query = $this->db->query("select * from menu order by order_menu asc");
    //     return $query->result_array();
    // }
    
    public function tambah_submenu()
    {
        $data=array
        (
            'id_menu'=>$this->input->post('id_menu'),
            'nama_submenu'=>$this->input->post('nama_submenu'),
            'link_submenu'=>$this->input->post('link_submenu'),
            'order_submenu '=>$this->input->post('order_submenu'),
        );
        $this->db->insert('submenu',$data);
    }

    public function edit_submenu()
    {
        $id_submenu=$this->input->post('id_submenu');
        $data=array
        (
            'id_menu'=>$this->input->post('id_menu'),
            'nama_submenu'=>$this->input->post('nama_submenu'),
            'link_submenu'=>$this->input->post('link_submenu'),
            'order_submenu '=>$this->input->post('order_submenu'),
        );
        $this->db->where('id',$id_submenu);
        $this->db->update('submenu',$data);
    }

    public function hapus_submenu()
    {
        $id_submenu=$this->input->post('id_submenu');
        $this->db->where('id',$id_submenu);
        $this->db->delete('submenu');
    }
    


}

?>