<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model{


    public function tampil_trx_donatur_pembangunan_list()
    {
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');

        $query = $this->db->query("select *, 
                (sum(nominal_trx_donatur_pembangunan) over()) as total,
                (select nama_donatur from mst_donatur_pembangunan where id_donatur=trx_donatur_pembangunan.id_donatur) as nama_donatur,
                (select telp_donatur from mst_donatur_pembangunan where id_donatur=trx_donatur_pembangunan.id_donatur) as telp_donatur,
                (select alamat_donatur from mst_donatur_pembangunan where id_donatur=trx_donatur_pembangunan.id_donatur) as alamat_donatur 
                from trx_donatur_pembangunan 
                where tgl_trx_donatur_pembangunan between '".$tgl_awal."' and '".$tgl_akhir."'  ");
        return $query->result_array();
    }

    
    public function tampil_pengajuan_list()
    {
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');

        $query = $this->db->query("select *,
        (select sum(qty_rencana_anggaran*harga_rencana_anggaran) from rencana_anggaran where  pengajuan.id_pengajuan=id_pengajuan) as rencana_anggaran,
        (sum((select sum(qty_rencana_anggaran*harga_rencana_anggaran) from rencana_anggaran where  pengajuan.id_pengajuan=id_pengajuan)) over()) as total 
        from pengajuan 
        where status_lpj='1' and kategori_pengajuan='pembangunan' and tgl_pengajuan between '".$tgl_awal."' and '".$tgl_akhir."'");
        return $query->result_array();
    }

    public function tampil_gaji_tukang_list()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');

        $query = $this->db->query("select (select nama_tukang from mst_tukang where id_tukang=gt.id_tukang) as nama_tukang, (select alamat from mst_tukang where id_tukang=gt.id_tukang) as alamat, (select no_telp from mst_tukang where id_tukang=gt.id_tukang) as no_telp, *, sum(nominal_gaji_tukang) over() as total   from gaji_tukang gt where id_pengajuan='".$id_pengajuan."' order by id_gaji_tukang desc ");
        return $query->result_array();
    }
    
}

?>