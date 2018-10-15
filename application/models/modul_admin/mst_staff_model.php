<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_staff_model extends CI_Model{


    public function tampil_mst_staff_list()
    {
        $query = $this->db->query("select * from mst_staff");
        return $query->result_array();
    }

    public function tambah_mst_staff($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat)
    {
        $data=array
        (
            'id_staff'=>$id,
            'nama_staff'=>$nama,
            'jk_staff'=>$jk,
            't_staff'=>$t,
            'tl_staff'=>$tl,
            'jabatan_staff'=>$jabatan,
            'alamat_staff'=>$alamat,
            'foto_staff'=>$nama_file,
        );
        $this->db->insert('mst_staff',$data);
    }


    public function edit_mst_staff($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat)
    {
        $id_mst_staff=$id;
        $data=array
        (
    
            'nama_staff'=>$nama,
            'jk_staff'=>$jk,
            't_staff'=>$t,
            'tl_staff'=>$tl,
            'jabatan_staff'=>$jabatan,
            'alamat_staff'=>$alamat,
            'foto_staff'=>$nama_file,
        );
        $this->db->where('id_staff',$id_mst_staff);
        $this->db->update('mst_staff',$data);
    }

    

    public function edit_mst_staff_tanpa_foto($id,$nama,$jk,$t,$tl,$jabatan, $alamat)
    {
        $id_mst_staff=$id;
        $data=array
        (
    
            'nama_staff'=>$nama,
            'jk_staff'=>$jk,
            't_staff'=>$t,
            'tl_staff'=>$tl,
            'jabatan_staff'=>$jabatan,
            'alamat_staff'=>$alamat,
        );
        $this->db->where('id_staff',$id_mst_staff);
        $this->db->update('mst_staff',$data);
    }

    

    public function hapus_mst_staff($id_staff)
    {
        
        $this->db->where('id_staff',$id_staff);
        $this->db->delete('mst_staff');
        return $this->db->affected_rows();
    }
    
}

?>