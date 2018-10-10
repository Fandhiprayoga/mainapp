<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{


    public function tampil_menu_list()
    {
        $query = $this->db->query("select * from menu order by order_menu asc");
        return $query->result_array();
    }

    public function tampil_modul_list()
    {
        $query = $this->db->query("select * from modul order by order_modul asc");
        return $query->result_array();
    }
    
    public function tambah_menu()
    {
        $data=array
        (
            'id_modul'=>$this->input->post('id_modul'),
            'nama_menu'=>$this->input->post('nama_menu'),
            'icon_menu'=>$this->input->post('icon_menu'),
            'order_menu '=>$this->input->post('order_menu'),
        );
        $this->db->insert('menu',$data);
    }

    public function edit_menu()
    {
        $id_menu=$this->input->post('id_menu');
        $data=array
        (
            'id_modul'=>$this->input->post('id_modul'),
            'nama_menu'=>$this->input->post('nama_menu'),
            'icon_menu'=>$this->input->post('icon_menu'),
            'order_menu '=>$this->input->post('order_menu'),
        );
        $this->db->where('id',$id_menu);
        $this->db->update('menu',$data);
    }

    public function hapus_menu()
    {
        $id_menu=$this->input->post('id_menu');
        $this->db->where('id',$id_menu);
        $this->db->delete('menu');
    }
    


}

?>