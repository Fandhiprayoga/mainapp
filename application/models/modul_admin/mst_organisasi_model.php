<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mst_organisasi_model extends CI_Model{


    public function tampil_mst_organisasi_list()
    {
        $query = $this->db->query("select * from mst_organisasi  where id_organisasi!='OR999999999'");
        return $query->result_array();
    }

    public function tambah_mst_organisasi($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat)
    {
        $data=array
        (
            'id_organisasi'=>$id,
            'nama_organisasi'=>$nama,
            'jk_organisasi'=>$jk,
            't_organisasi'=>$t,
            'tl_organisasi'=>$tl,
            'jabatan_organisasi'=>$jabatan,
            'alamat_organisasi'=>$alamat,
            'foto_organisasi'=>$nama_file,
        );
        $this->db->insert('mst_organisasi',$data);
    }


    public function edit_mst_organisasi($id,$nama,$jk,$t,$tl,$jabatan,$nama_file, $alamat)
    {
        $id_mst_organisasi=$id;
        $data=array
        (
    
            'nama_organisasi'=>$nama,
            'jk_organisasi'=>$jk,
            't_organisasi'=>$t,
            'tl_organisasi'=>$tl,
            'jabatan_organisasi'=>$jabatan,
            'alamat_organisasi'=>$alamat,
            'foto_organisasi'=>$nama_file,
        );
        $this->db->where('id_organisasi',$id_mst_organisasi);
        $this->db->update('mst_organisasi',$data);
    }

    

    public function edit_mst_organisasi_tanpa_foto($id,$nama,$jk,$t,$tl,$jabatan, $alamat)
    {
        $id_mst_organisasi=$id;
        $data=array
        (
    
            'nama_organisasi'=>$nama,
            'jk_organisasi'=>$jk,
            't_organisasi'=>$t,
            'tl_organisasi'=>$tl,
            'jabatan_organisasi'=>$jabatan,
            'alamat_organisasi'=>$alamat,
        );
        $this->db->where('id_organisasi',$id_mst_organisasi);
        $this->db->update('mst_organisasi',$data);
    }

    

    public function hapus_mst_organisasi($id_organisasi)
    {
        
        $this->db->where('id_organisasi',$id_organisasi);
        $this->db->delete('mst_organisasi');
        return $this->db->affected_rows();
    }
    
}

?>