<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acc_rencana_anggaran_model extends CI_Model{


    public function tampil_rencana_anggaran_yayasan_list()
    {
            $id_pengajuan=$this->input->post('id_pengajuan');
            $query = $this->db->query("select ra.*, ms.nama_satuan, ja.nama_jenis_anggaran, (ra.qty_rencana_anggaran*ra.harga_rencana_anggaran) as jumlah, sum((ra.qty_rencana_anggaran*ra.harga_rencana_anggaran)) over() as total, p.nama_pengajuan from rencana_anggaran ra, mst_satuan ms, mst_jenis_anggaran ja, pengajuan p where ra.id_pengajuan='".$id_pengajuan."' and ra.id_satuan=ms.id_satuan and ra.id_jenis_anggaran=ja.id_jenis_anggaran and ra.id_pengajuan=p.id_pengajuan");
            return $query->result_array();
    }

    public function tampil_rencana_anggaran_yatim_list()
    {
            $id_pengajuan=$this->input->post('id_pengajuan');
            $query = $this->db->query("select ra.*, ms.nama_satuan, ja.nama_jenis_anggaran, (ra.qty_rencana_anggaran*ra.harga_rencana_anggaran) as jumlah, sum((ra.qty_rencana_anggaran*ra.harga_rencana_anggaran)) over() as total, p.nama_pengajuan from rencana_anggaran ra, mst_satuan ms, mst_jenis_anggaran ja, pengajuan p where ra.id_pengajuan='".$id_pengajuan."' and ra.id_satuan=ms.id_satuan and ra.id_jenis_anggaran=ja.id_jenis_anggaran and ra.id_pengajuan=p.id_pengajuan");
            return $query->result_array();
    }


    public function edit_acc_rencana_anggaran()
    {
        $id_rencana_anggaran=$this->input->post('id_rencana_anggaran');
        $data=array
        (
    
            'status_rencana_anggaran'=>$this->input->post('status_rencana_anggaran'),
            'tgl_review_rencana_anggaran'=>$this->input->post('tgl_review_rencana_anggaran'),
            'ket_review_rencana_anggaran'=>$this->input->post('ket_review_rencana_anggaran'),

        );
        $this->db->where('id_rencana_anggaran',$id_rencana_anggaran);
        $this->db->update('rencana_anggaran',$data);
        return $this->db->affected_rows();
    }
}

?>