<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{


    public function tampil_user_list()
    {
        $query = $this->db->query("select u.*, (select nama_organisasi from mst_organisasi where id_organisasi=u.id_organisasi) as nama_user, (select jabatan_organisasi from mst_organisasi where id_organisasi=u.id_organisasi) as bagian_user from pengguna u");
        return $query->result_array();
    }

    public function get_user_exist()
    {
        $id_user=$this->input->post('id_user');
        $query = $this->db->query("select * from pengguna where id_user ='".$id_user."'");
        return $query->result_array();
    }

    public function tambah_user()
    {
        $data=array
        (
            'id_user'=>$this->input->post('id_user'),
            'id_organisasi'=>$this->input->post('id_organisasi'),
            'group_user'=>$this->input->post('group_user'),
            'pass_user'=>$this->input->post('pass_user'),
            'status_user'=>$this->input->post('status_user'),
            
        );
        $this->db->insert('pengguna',$data);
    }

    public function edit_user()
    {
        $id_user=$this->input->post('id_user');
        $data=array
        (
            'id_organisasi'=>$this->input->post('id_organisasi'),
            'group_user'=>$this->input->post('group_user'),
            'pass_user'=>$this->input->post('pass_user'),
            'status_user'=>$this->input->post('status_user'),
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('pengguna',$data);
    }

    public function hapus_user()
    {
        $id_user=$this->input->post('id_user');
        $this->db->where('id_user',$id_user);
        $this->db->delete('pengguna');
    }
    


}

?>