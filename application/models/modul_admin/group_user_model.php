<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_user_model extends CI_Model{


    public function tampil_group_user_list()
    {
        $query = $this->db->query("select * from group_user");
        return $query->result_array();
    }

    public function tambah_group_user()
    {
        $data=array
        (
            
            'nama_group_user'=>$this->input->post('nama_group_user'),
            'keterangan_group_user'=>$this->input->post('keterangan_group_user'),
            
        );
        $this->db->insert('group_user',$data);
    }

    public function edit_group_user()
    {
        $id_group_user=$this->input->post('id_group_user');
        $data=array
        (
            'nama_group_user'=>$this->input->post('nama_group_user'),
            'keterangan_group_user'=>$this->input->post('keterangan_group_user'),
        );
        $this->db->where('id_group_user',$id_group_user);
        $this->db->update('group_user',$data);
    }

    public function hapus_group_user()
    {
        $id_group_user=$this->input->post('id_group_user');
        $this->db->where('id_group_user',$id_group_user);
        $this->db->delete('group_user');
    }
    


}

?>