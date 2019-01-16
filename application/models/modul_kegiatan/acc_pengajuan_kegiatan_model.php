<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class acc_pengajuan_kegiatan_model extends CI_Model{


    public function tampil_acc_pengajuan_kegiatan_yayasan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yayasan' order by id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_acc_pengajuan_kegiatan_yatim_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yatim' order by id_pengajuan desc");
        return $query->result_array();
    }

    public function edit_acc_pengajuan_kegiatan()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $data=array
        (
            'status_pengajuan'=>$this->input->post('status_pengajuan'),
            'tgl_review_pengajuan_kegiatan'=>$this->input->post('tgl_review_pengajuan'),
            'ket_review_pengajuan_kegiatan'=>$this->input->post('ket_review_pengajuan'),

        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        return $this->db->affected_rows();
    }


}

?>