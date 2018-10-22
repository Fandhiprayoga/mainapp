<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model{


    public function tampil_pendaftaran_list()
    {
        $query = $this->db->query("select * from pendaftaran order by dump_pendaftaran desc");
        return $query->result_array();
    }

    public function get_pendaftaran_exist()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $query = $this->db->query("select * from pendaftaran where id_pendaftaran ='".$id_pendaftaran."'");
        return $query->result_array();
    }

    public function tambah_pendaftaran()
    {
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