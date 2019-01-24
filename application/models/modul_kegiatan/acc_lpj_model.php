<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class acc_lpj_model extends CI_Model{


    public function tampil_acc_lpj_kegiatan_yayasan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yayasan' and lpj_kegiatan is not null order by id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_acc_lpj_kegiatan_yatim_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yatim' and lpj_kegiatan is not null order by id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_acc_lpj_kegiatan_pembangunan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='pembangunan' and lpj_kegiatan is not null order by id_pengajuan desc");
        return $query->result_array();
    }

    public function edit_acc_lpj_kegiatan()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $data=array
        (
            'status_lpj'=>$this->input->post('status_pengajuan'),
            'tgl_review_lpj_kegiatan'=>$this->input->post('tgl_review_pengajuan'),
            'ket_review_lpj_kegiatan'=>$this->input->post('ket_review_pengajuan'),

        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        return $this->db->affected_rows();
    }


}

?>