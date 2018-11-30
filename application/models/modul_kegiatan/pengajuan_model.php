<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model{


    public function tampil_pengajuan_list()
    {
        $query = $this->db->query("select * from pengajuan order by tgl_pengajuan, id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_proposal_list()
    {
        $query = $this->db->query("select * from pengajuan where status_pengajuan=1 order by tgl_pengajuan, id_pengajuan desc");
        return $query->result_array();
    }

    public function tampil_lpj_list()
    {
        $query = $this->db->query(" select id_pengajuan from rencana_anggaran where id_pengajuan not in 
        (select id_pengajuan
        from rencana_anggaran 
        where status_rencana_anggaran=0 
        group by id_pengajuan) group by id_pengajuan order by id_pengajuan");
        return $query->result_array();
    }

    public function tambah_pengajuan()
    {
        $data=array
        (
            'nama_pengajuan'=>$this->input->post('nama_pengajuan'),
            'kategori_pengajuan'=>$this->input->post('kategori_pengajuan'),
            'waktu_kegiatan'=>$this->input->post('waktu_kegiatan'),
            'tempat_kegiatan'=>$this->input->post('tempat_kegiatan'),
            'rincian_kegiatan'=>$this->input->post('rincian_kegiatan'),
            'pj_kegiatan'=>$this->input->post('pj_kegiatan'),
            'tgl_pengajuan'=>$this->input->post('tgl_pengajuan'),
            //'status_kegiatan'=>$this->input->post('status_kegiatan'),
            //'tgl_review_kegiatan'=>$this->input->post('tgl_review_kegiatan'),
            //'ket_review_kegiatan'=>$this->input->post('ket_review_kegiatan'),
            //'proposal_kegiatan'=>$this->input->post('proposal_kegiatan'),
            //'lpj_kegiatan'=>$this->input->post('lpj_kegiatan'),
           
        );
        $this->db->insert('pengajuan',$data);
        return $this->db->affected_rows();
    }


    public function edit_pengajuan()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $data=array
        (
    
            'nama_pengajuan'=>$this->input->post('nama_pengajuan'),
            'kategori_pengajuan'=>$this->input->post('kategori_pengajuan'),
            'waktu_kegiatan'=>$this->input->post('waktu_kegiatan'),
            'tempat_kegiatan'=>$this->input->post('tempat_kegiatan'),
            'rincian_kegiatan'=>$this->input->post('rincian_kegiatan'),
            'pj_kegiatan'=>$this->input->post('pj_kegiatan'),
            //'status_kegiatan'=>$this->input->post('status_kegiatan'),
            //'tgl_review_kegiatan'=>$this->input->post('tgl_review_kegiatan'),
            //'ket_review_kegiatan'=>$this->input->post('ket_review_kegiatan'),
            //'proposal_kegiatan'=>$this->input->post('proposal_kegiatan'),
            //'lpj_kegiatan'=>$this->input->post('lpj_kegiatan'),
        );
        $this->db->where('id_pengajuan',$id_pengajuan);
        $this->db->update('pengajuan',$data);
        return $this->db->affected_rows();
    }

    

    public function hapus_pengajuan()
    {
            $id_pengajuan=$this->input->post('id_pengajuan');
            $this->db->where('id_pengajuan',$id_pengajuan);
            $this->db->delete('pengajuan');
            return $this->db->affected_rows();
    }
    
}

?>