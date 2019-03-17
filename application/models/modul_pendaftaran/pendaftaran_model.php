<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model{


    public function tampil_pendaftaran_list()
    {
        $query = $this->db->query("select *, (select nama_status from mst_status where id_status=pendaftaran.id_status) as nama_status from pendaftaran where id_pendaftaran not in (select id_santri from mst_santri) order by id_pendaftaran desc");
        return $query->result_array();
    }

    public function tampil_pendaftaran_list_lama()
    {
        $query = $this->db->query("select *,(select nama_status from mst_status where id_status=pendaftaran.id_status) as nama_status from pendaftaran   where id_pendaftaran in (select id_pendaftaran from daftar_ulang where status_daftar_ulang='1') order by id_pendaftaran asc");
        return $query->result_array();
    }

    public function get_pendaftaran_exist()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $query = $this->db->query("select * from pendaftaran where id_pendaftaran ='".$id_pendaftaran."'");
        return $query->result_array();
    }

    public function get_santri_exist()
    {
        $tgl_msk=$this->input->post('tgl_masuk');
        $query = $this->db->query("select * from mst_santri where substring(id_santri,3,8)='.$tgl_msk.'");
        return $query->num_rows();
    }

    public function tambah_pendaftaran()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y/m/d');
        $data=array
        (
            'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
            'n_pendaftaran'=>$this->input->post('n_pendaftaran'),
            'nl_pendaftaran'=>$this->input->post('nl_pendaftaran'),
            't_pendaftaran'=>$this->input->post('t_pendaftaran'),
            'tl_pendaftaran'=>$this->input->post('tl_pendaftaran'),
            'instansi_pendaftaran'=>$this->input->post('instansi_pendaftaran'),
            'alamat_pendaftaran'=>$this->input->post('alamat_pendaftaran'),
            'telp_pendaftaran'=>$this->input->post('telp_pendaftaran'),
            'email_pendaftaran'=>$this->input->post('email_pendaftaran'),
            'org_pendaftaran'=>$this->input->post('org_pendaftaran'),
            'prestasi_pendaftaran'=>$this->input->post('prestasi_pendaftaran'),
            'alasan_pendaftaran'=>$this->input->post('alasan_pendaftaran'),
            'tgl_pendaftaran'=>$date,
            'id_status'=>$this->input->post('id_status'),
        );
        $this->db->insert('pendaftaran',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function tambah_pendaftaran_lama()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y/m/d');
        $data=array
        (
            'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
            'n_pendaftaran'=>$this->input->post('n_pendaftaran'),
            'nl_pendaftaran'=>$this->input->post('nl_pendaftaran'),
            't_pendaftaran'=>$this->input->post('t_pendaftaran'),
            'tl_pendaftaran'=>$this->input->post('tl_pendaftaran'),
            'instansi_pendaftaran'=>$this->input->post('instansi_pendaftaran'),
            'alamat_pendaftaran'=>$this->input->post('alamat_pendaftaran'),
            'telp_pendaftaran'=>$this->input->post('telp_pendaftaran'),
            'email_pendaftaran'=>$this->input->post('email_pendaftaran'),
            'org_pendaftaran'=>$this->input->post('org_pendaftaran'),
            'prestasi_pendaftaran'=>$this->input->post('prestasi_pendaftaran'),
            'alasan_pendaftaran'=>$this->input->post('alasan_pendaftaran'),
            'tgl_pendaftaran'=>$this->input->post('tgl_pendaftaran'),
            'id_status'=>$this->input->post('id_status'),
        );
        $this->db->insert('pendaftaran',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function edit_pendaftaran()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $data=array
        (
            
            'n_pendaftaran'=>$this->input->post('n_pendaftaran'),
            'nl_pendaftaran'=>$this->input->post('nl_pendaftaran'),
            't_pendaftaran'=>$this->input->post('t_pendaftaran'),
            'tl_pendaftaran'=>$this->input->post('tl_pendaftaran'),
            'instansi_pendaftaran'=>$this->input->post('instansi_pendaftaran'),
            'alamat_pendaftaran'=>$this->input->post('alamat_pendaftaran'),
            'telp_pendaftaran'=>$this->input->post('telp_pendaftaran'),
            'email_pendaftaran'=>$this->input->post('email_pendaftaran'),
            'org_pendaftaran'=>$this->input->post('org_pendaftaran'),
            'prestasi_pendaftaran'=>$this->input->post('prestasi_pendaftaran'),
            'alasan_pendaftaran'=>$this->input->post('alasan_pendaftaran'),
            'id_status'=>$this->input->post('id_status'),
        );
        $this->db->where('id_pendaftaran',$id_pendaftaran);
        $this->db->update('pendaftaran',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }

    public function hapus_pendaftaran()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $this->db->where('id_pendaftaran',$id_pendaftaran);
        $this->db->delete('pendaftaran');
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