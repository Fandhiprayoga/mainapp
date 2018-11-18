<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_priv_model extends CI_Model{

    public function get_submenu()
    {
        $id=$this->input->post('id_group_user');
        $query = $this->db->query("SELECT
                            (SELECT id_modul FROM menu WHERE id=sm.id_menu) AS id_modul,
                            (SELECT nama_modul FROM modul WHERE id=(SELECT id_modul FROM menu WHERE id=sm.id_menu)) AS nama_modul,
                            sm.id_menu,
                            (SELECT nama_menu FROM menu WHERE id=sm.id_menu ) AS nama_menu,
                            sm.id AS id_submenu,
                            sm.nama_submenu,
                            gp.id_group_user,
                            gp.is_priv 
                            FROM submenu sm LEFT JOIN group_priv gp ON sm.id=gp.id_submenu AND gp.id_group_user='".$id."' ORDER BY id_modul, id_menu, sm.order_submenu ASC");
        return $query->result_array();
    }

    public function tambah_group_priv()
    {
        $data=array
        (
            'id_group_user'=>$this->input->post('id_group_user'),
            'id_submenu'=>$this->input->post('id_submenu'),
            'is_priv'=>$this->input->post('is_priv'),
        );
        $this->db->insert('group_priv',$data);
    }

    public function edit_group_priv()
    {
        $id_group_user=$this->input->post('id_group_user');
        $id_submenu=$this->input->post('id_submenu');
        $data=array
        (
            'is_priv'=>$this->input->post('is_priv'),
        );
        $this->db->where('id_group_user',$id_group_user);
        $this->db->where('id_submenu',$id_submenu);
        $this->db->update('group_priv',$data);
    }

    public function cek_eksis()
    {
        $id_group_user=$this->input->post('id_group_user');
        $id_submenu=$this->input->post('id_submenu');
        return $this->db->query("select * from group_priv where id_group_user='".$id_group_user."' and id_submenu='".$id_submenu."'")->result_array();
    }
}

?>