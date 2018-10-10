<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{


    public function tampil_user_list()
    {
        $query = $this->db->query("select * from user");
        return $query->result_array();
    }

    public function get_user_exist()
    {
        $id_user=$this->input->post('id_user');
        $query = $this->db->query("select * from user where id_user ='".$id_user."'");
        return $query->result_array();
    }

    public function tambah_user()
    {
        $data=array
        (
            'id_user'=>$this->input->post('id_user'),
            'nama_user'=>$this->input->post('nama_user'),
            'bagian_user'=>$this->input->post('bagian_user'),
            'group_user'=>$this->input->post('group_user'),
            'pass_user'=>$this->input->post('pass_user'),
            'status_user'=>$this->input->post('status_user'),
            
        );
        $this->db->insert('user',$data);
    }

    public function edit_user()
    {
        $id_user=$this->input->post('id_user');
        $data=array
        (
            'nama_user'=>$this->input->post('nama_user'),
            'bagian_user'=>$this->input->post('bagian_user'),
            'group_user'=>$this->input->post('group_user'),
            'pass_user'=>$this->input->post('pass_user'),
            'status_user'=>$this->input->post('status_user'),
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('user',$data);
    }

    public function hapus_user()
    {
        $id_user=$this->input->post('id_user');
        $this->db->where('id_user',$id_user);
        $this->db->delete('user');
    }
    


}

?>