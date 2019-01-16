<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class acc_proposal_model extends CI_Model{


    public function tampil_acc_proposal_yayasan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yayasan' and proposal_kegiatan is not null order by  id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_acc_proposal_yatim_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='yatim' and proposal_kegiatan is not null order by id_pengajuan desc");
        return $query->result_array();
    }

    public function edit_acc_proposal()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $data=array
        (
            'status_proposal'=>$this->input->post('status_proposal'),
            'tgl_review_proposal_kegiatan'=>$this->input->post('tgl_review_proposal'),
            'ket_review_proposal_kegiatan'=>$this->input->post('ket_review_proposal'),

        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        return $this->db->affected_rows();
    }


}

?>