<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi_model extends CI_Model{

    public function get_instansi()
    {
        $query = $this->db->query("select * from instansi");
        return $query->result_array();
    }

    public function edit_instansi($instansi,$alamat,$kepala, $nik, $nama_file)
    {
        
        $data=array
        (
            'nama_instansi'=>$instansi,
            'alamat_instansi'=>$alamat,
            'kepala_instansi'=>$kepala,
            'nik_instansi'=>$nik,
            'logo_instansi'=>$nama_file,
        );
        $this->db->where('id','1');
        $this->db->update('instansi',$data);
    }

    public function edit_instansi_tanpa_foto($instansi,$alamat,$kepala, $nik)
    {
        
        $data=array
        (
            'nama_instansi'=>$instansi,
            'alamat_instansi'=>$alamat,
            'kepala_instansi'=>$kepala,
            'nik_instansi'=>$nik,
        );
        $this->db->where('id','1');
        $this->db->update('instansi',$data);
    }

    
}

?>