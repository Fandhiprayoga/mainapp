<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_tukang_model extends CI_Model{


    public function tampil_gaji_tukang_list()
    {
        $id_pengajuan=$this->input->post('id_pengajuan');
        $query = $this->db->query("select (select nama_tukang from mst_tukang where id_tukang=gt.id_tukang) as nama_tukang, (select alamat from mst_tukang where id_tukang=gt.id_tukang) as alamat, (select no_telp from mst_tukang where id_tukang=gt.id_tukang) as no_telp, *, sum(nominal_gaji_tukang) over() as total   from gaji_tukang gt where id_pengajuan='".$id_pengajuan."' order by id_gaji_tukang desc ");
        return $query->result_array();
    }

    public function tampil_mst_tukang_list()
    {
        $query = $this->db->query("select * from mst_tukang ");
        return $query->result_array();
    }

    public function tampil_pengajuan_list()
    {
        $query = $this->db->query("select * from pengajuan where kategori_pengajuan='pembangunan' and status_lpj='1' order by id_pengajuan desc");
        return $query->result_array();
    }

    public function tambah_gaji_tukang()
    {
        $data=array
        (
            'id_tukang'=>$this->input->post('id_tukang'),
            'id_pengajuan'=>$this->input->post('id_pengajuan'),
            'nominal_gaji_tukang'=>$this->input->post('nominal_gaji_tukang'),
            'tgl_gaji_tukang'=>$this->input->post('tgl_gaji_tukang'), 

        );
        $this->db->insert('gaji_tukang',$data);
        return $this->db->affected_rows();
    }


    public function edit_gaji_tukang()
    {
        $id_gaji_tukang=$this->input->post('id_gaji_tukang');
        $data=array
        (
            'id_tukang'=>$this->input->post('id_tukang'),
            'id_pengajuan'=>$this->input->post('id_pengajuan'),
            'nominal_gaji_tukang'=>$this->input->post('nominal_gaji_tukang'),
            'tgl_gaji_tukang'=>$this->input->post('tgl_gaji_tukang'), 

        );
        $this->db->where('id_gaji_tukang',$id_gaji_tukang);
        $this->db->update('gaji_tukang',$data);
    }

    public function hapus_gaji_tukang()
    {
        $id_gaji_tukang=$this->input->post('id_gaji_tukang');
        $this->db->where('id_gaji_tukang',$id_gaji_tukang);
        $this->db->delete('gaji_tukang');
        return $this->db->affected_rows();
    }
    
}

?>