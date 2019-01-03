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

    public function get_history_lpj()
    {
        $id_pengajuan= $this->input->post('id_pengajuan');
        $query = $this->db->query("select * from history_lpj where id_pengajuan=".$id_pengajuan." order by date_history desc");
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
    
    public function tampil_laporan()
    {
        $kegiatan=$this->input->post('kegiatan');
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');
        if($kegiatan==0)
        {
            $query="select p.id_pengajuan,
            (select top 1 pj_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as pj_kegiatan,
            (select top 1 rincian_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as rincian_kegiatan,
            (select top 1 tempat_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as tempat_kegiatan, 
            (select top 1 nama_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as nama_pengajuan, 
            (select top 1 kategori_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as kategori_pengajuan, 
            (select top 1 tgl_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as tgl_pengajuan,
            (select top 1 lpj_kegiatan from pengajuan where id_pengajuan = p.id_pengajuan) as lpj_pengajuan, 
            (select top 1 waktu_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as waktu_kegiatan
             from pengajuan p 
             where p.id_pengajuan not in (select id_pengajuan from pengajuan where lpj_kegiatan is not null) and p.tgl_pengajuan between '".$tgl_awal."' and '".$tgl_akhir."' group by p.id_pengajuan";
        }
        else
        {
            $query="select ra.id_pengajuan,
            (select top 1 pj_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as pj_kegiatan,
            (select top 1 rincian_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as rincian_kegiatan,
            (select top 1 tempat_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as tempat_kegiatan, 
            (select top 1 nama_pengajuan from pengajuan where id_pengajuan=ra.id_pengajuan) as nama_pengajuan, 
            (select top 1 kategori_pengajuan from pengajuan where id_pengajuan=ra.id_pengajuan) as kategori_pengajuan, 
            (select top 1 tgl_pengajuan from pengajuan where id_pengajuan=ra.id_pengajuan) as tgl_pengajuan,
            (select top 1 lpj_kegiatan from pengajuan where id_pengajuan = ra.id_pengajuan) as lpj_pengajuan, 
            (select top 1 waktu_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as waktu_kegiatan
             from rencana_anggaran ra, pengajuan p 
             where ra.id_pengajuan=p.id_pengajuan and p.lpj_kegiatan is not null and p.tgl_pengajuan between '".$tgl_awal."' and '".$tgl_akhir."' group by ra.id_pengajuan";
        }
        return $this->db->query($query)->result_array();
    }
}

?>