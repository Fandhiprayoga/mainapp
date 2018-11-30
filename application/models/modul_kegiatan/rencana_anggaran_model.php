<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana_anggaran_model extends CI_Model{


    public function tampil_rencana_anggaran_list()
    {
            $id_pengajuan=$this->input->post('id_pengajuan');
            $query = $this->db->query("select ra.*, ms.nama_satuan, ja.nama_jenis_anggaran, (ra.qty_rencana_anggaran*ra.harga_rencana_anggaran) as jumlah, sum((ra.qty_rencana_anggaran*ra.harga_rencana_anggaran)) over() as total, p.nama_pengajuan , (select count(*) from rencana_anggaran where tgl_review_rencana_anggaran is not null and id_pengajuan='".$id_pengajuan."') as status_review from rencana_anggaran ra, mst_satuan ms, mst_jenis_anggaran ja, pengajuan p where ra.id_pengajuan='".$id_pengajuan."' and ra.id_satuan=ms.id_satuan and ra.id_jenis_anggaran=ja.id_jenis_anggaran and ra.id_pengajuan=p.id_pengajuan");
            return $query->result_array();
    }

    public function cek_status_rencana_anggaran()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $query = $this->db->query("select * from rencana_anggaran where id_pengajuan='".$id_pengajuan."' and  tgl_review_rencana_anggaran is not null");
        return $query->result_array();
    }

    public function tambah_rencana_anggaran()
    {
        $data=array
        (
            'nama_rencana_anggaran'=>$this->input->post('nama_rencana_anggaran'),
            'harga_rencana_anggaran'=>$this->input->post('harga_rencana_anggaran'),
            'qty_rencana_anggaran'=>$this->input->post('qty_rencana_anggaran'),
            'id_jenis_anggaran'=>$this->input->post('id_jenis_anggaran'),
            'id_satuan'=>$this->input->post('id_satuan'),
            'id_pengajuan'=>$this->input->post('id_pengajuan'),

        );
        $this->db->insert('rencana_anggaran',$data);
        return $this->db->affected_rows();
    }


    public function edit_rencana_anggaran()
    {
        $id_rencana_anggaran=$this->input->post('id_rencana_anggaran');
        $data=array
        (
    
            'nama_rencana_anggaran'=>$this->input->post('nama_rencana_anggaran'),
            'harga_rencana_anggaran'=>$this->input->post('harga_rencana_anggaran'),
            'qty_rencana_anggaran'=>$this->input->post('qty_rencana_anggaran'),
            'id_jenis_anggaran'=>$this->input->post('id_jenis_anggaran'),
            'id_satuan'=>$this->input->post('id_satuan'),
            'id_pengajuan'=>$this->input->post('id_pengajuan'),

        );
        $this->db->where('id_rencana_anggaran',$id_rencana_anggaran);
        $this->db->update('rencana_anggaran',$data);
        return $this->db->affected_rows();
    }

    

    public function hapus_rencana_anggaran()
    {
            $id_rencana_anggaran=$this->input->post('id_rencana_anggaran');
            $this->db->where('id_rencana_anggaran',$id_rencana_anggaran);
            $this->db->delete('rencana_anggaran');
            return $this->db->affected_rows();
    }
    
}

?>