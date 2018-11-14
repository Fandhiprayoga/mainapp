<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar_infaq_model extends CI_Model{


    public function tampil_bayar_infaq_list()
    {
        $query = $this->db->query("select p.*, bi.id_infaq, bi.status_bayar_infaq from pendaftaran p left join bayar_infaq bi on p.id_pendaftaran=bi.id_pendaftaran where P.id_pendaftaran not in (select id_santri from mst_santri) order by p.dump_pendaftaran desc");
        return $query->result_array();
    }

    public function get_bayar_infaq_exist()
    {
        $id_bayar_infaq=$this->input->post('id_bayar_infaq');
        $query = $this->db->query("select * from bayar_infaq where id_bayar_infaq ='".$id_bayar_infaq."'");
        return $query->result_array();
    }

    public function tambah_bayar_infaq()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y/m/d');
        $data=array
        (
            'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
            'id_infaq'=>$this->input->post('id_infaq'),
            'status_bayar_infaq'=>$this->input->post('status_bayar_infaq'),
            'tgl_bayar_infaq'=>$date,
        );
        $this->db->insert('bayar_infaq',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function tambah_bayar_infaq_santri_lama()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y/m/d');
        $data=array
        (
            'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
            'id_infaq'=>$this->input->post('id_infaq'),
            'status_bayar_infaq'=>$this->input->post('status_bayar_infaq'),
            'tgl_bayar_infaq'=>$date,
        );
        $this->db->insert('bayar_infaq',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function edit_bayar_infaq()
    {
        $id_bayar_infaq=$this->input->post('id_bayar_infaq');
        $data=array
        (
            'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
            'id_infaq'=>$this->input->post('id_infaq'),
            'status_bayar_infaq'=>$this->input->post('status_bayar_infaq'),
        );
        $this->db->where('id_bayar_infaq',$id_bayar_infaq);
        $this->db->update('bayar_infaq',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function hapus_bayar_infaq()
    {
        $id_bayar_infaq=$this->input->post('id_bayar_infaq');
        $this->db->where('id_bayar_infaq',$id_bayar_infaq);
        $this->db->delete('bayar_infaq');
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    


}

?>