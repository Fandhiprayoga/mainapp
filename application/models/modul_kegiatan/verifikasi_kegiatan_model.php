<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi_kegiatan_model extends CI_Model{


    public function tampil_verifikasi_pengajuan_kegiatan_yayasan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yayasan' and status_pengajuan=1 order by id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_verifikasi_pengajuan_kegiatan_yatim_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yatim' and status_pengajuan=1 order by  id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_verifikasi_pengajuan_kegiatan_pembangunan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='pembangunan' and status_pengajuan=1 order by  id_pengajuan desc");
        return $query->result_array();
    }


    public function edit_verifikasi_pengajuan_kegiatan()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $data=array
        (
            'status_verifikasi_kegiatan'=>$this->input->post('status_pengajuan'),
            'tgl_verifikasi_kegiatan'=>$this->input->post('tgl_review_pengajuan'),
            'ket_verifikasi_kegiatan'=>$this->input->post('ket_review_pengajuan'),

        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        return $this->db->affected_rows();
    }


}

?>