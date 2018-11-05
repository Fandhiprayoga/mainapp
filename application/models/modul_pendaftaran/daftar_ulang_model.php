<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_ulang_model extends CI_Model{


    public function tampil_daftar_ulang_list()
    {
        $query = $this->db->query("SELECT
                                    p.*,
                                    du.id_daftar_ulang,
                                    du.ijazah_daftar_ulang,
                                    du.kk_daftar_ulang,
                                    du.yatim_daftar_ulang,
                                    du.infaq_daftar_ulang
                                    FROM pendaftaran p
                                    LEFT JOIN daftar_ulang du
                                    ON p.id_pendaftaran = du.id_pendaftaran where du.status_daftar_ulang='0' order by p.id_pendaftaran desc");
        return $query->result_array();
    }

    public function tampil_histori_daftar_ulang_list()
    {
        $query = $this->db->query("SELECT
                                    p.*,
                                    du.id_daftar_ulang,
                                    du.ijazah_daftar_ulang,
                                    du.kk_daftar_ulang,
                                    du.yatim_daftar_ulang,
                                    du.infaq_daftar_ulang
                                    FROM pendaftaran p
                                    LEFT JOIN daftar_ulang du
                                    ON p.id_pendaftaran = du.id_pendaftaran where du.status_daftar_ulang='1' order by p.id_pendaftaran desc");
        return $query->result_array();
    }

    public function get_daftar_ulang_exist()
    {
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');
        $query = $this->db->query("select * from daftar_ulang where id_daftar_ulang ='".$id_daftar_ulang."'");
        return $query->result_array();
    }

    // public function tambah_daftar_ulang()
    // {
    //     $data=array
    //     (
    //         'id_pendaftara'=>$this->input->post('id_pendaftaran'),
    //         'ijazah_daftar_ulang'=>$this->input->post('ijazah_daftar_ulang'),
    //         'kk_daftar_ulang'=>$this->input->post('kk_daftar_ulang'),
    //         'yatim_daftar_ulang'=>$this->input->post('yatim_daftar_ulang'),
    //         'infaq_daftar_ulang'=>$this->input->post('infaq_daftar_ulang'),
    //         'status_daftar_ulang'=>$this->input->post('status_daftar_ulang'),
            
    //     );
    //     $this->db->insert('daftar_ulang',$data);
    //     if($this->db->affected_rows()>0)    
    //     {
    //         return TRUE;
    //     }
    //     else {
    //         return FALSE;
    //     }
    // }
    public function tambah_daftar_ulang_ijazah($id_pendaftaran,$nama_file)
    {
        $data=array(
            'id_pendaftaran'=>$id_pendaftaran,
            'ijazah_daftar_ulang'=>$nama_file,
        );

             $this->db->insert('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                return TRUE;
             }
             else {
                 return FALSE;
             }
    }

    public function tambah_daftar_ulang_kk($id_pendaftaran,$nama_file)
    {
        $data=array(
            'id_pendaftaran'=>$id_pendaftaran,
            'kk_daftar_ulang'=>$nama_file,
        );

             $this->db->insert('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                return TRUE;
             }
             else {
                 return FALSE;
             }
    }

    public function tambah_daftar_ulang_infaq($id_pendaftaran,$nama_file)
    {
        $data=array(
            'id_pendaftaran'=>$id_pendaftaran,
            'infaq_daftar_ulang'=>$nama_file,
        );

             $this->db->insert('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                return TRUE;
             }
             else {
                 return FALSE;
             }
    }

    public function tambah_daftar_ulang_yatim($id_pendaftaran,$nama_file)
    {
        $data=array(
            'id_pendaftaran'=>$id_pendaftaran,
            'yatim_daftar_ulang'=>$nama_file,
        );

             $this->db->insert('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                return TRUE;
             }
             else {
                 return FALSE;
             }
    }

    public function tambah_daftar_ulang_status()
    {
        $data=array(
            'id_pendaftaran'=>$this->input->post('id_pendaftaran'),
            'status_daftar_ulang'=>'1',
        );

             $this->db->insert('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                return TRUE;
             }
             else {
                 return FALSE;
             }
    }

    public function edit_daftar_ulang_status()
    {
        $id_pendaftaran=$this->input->post('id_pendaftaran');
        $data=array(
            'status_daftar_ulang'=>'1',
        );
            $this->db->where('id_pendaftaran', $id_pendaftaran);
             $this->db->update('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                return TRUE;
             }
             else {
                 return FALSE;
             }
    }
    // public function edit_daftar_ulang()
    // {
    //     $id_daftar_ulang=$this->input->post('id_daftar_ulang');
    //     $data=array
    //     (
            
    //         'id_pendaftara'=>$this->input->post('id_pendaftaran'),
    //         'ijazah_daftar_ulang'=>$this->input->post('ijazah_daftar_ulang'),
    //         'kk_daftar_ulang'=>$this->input->post('kk_daftar_ulang'),
    //         'yatim_daftar_ulang'=>$this->input->post('yatim_daftar_ulang'),
    //         'infaq_daftar_ulang'=>$this->input->post('infaq_daftar_ulang'),
    //         'status_daftar_ulang'=>$this->input->post('status_daftar_ulang'),
    //     );
    //     $this->db->where('id_daftar_ulang',$id_daftar_ulang);
    //     $this->db->update('daftar_ulang',$data);
    //     if($this->db->affected_rows()>0)    
    //     {
    //         return TRUE;
    //     }
    //     else {
    //         return FALSE;
    //     }
        
    // }
    public function edit_daftar_ulang_ijazah($id_pendaftaran,$nama_file)
    {
        $data   = array(
           'ijazah_daftar_ulang'=>$nama_file,
        );

             $this->db->where('id_pendaftaran',$id_pendaftaran);
             $this->db->update('daftar_ulang',$data);
             if($this->db->affected_rows()>0)    
             {
                 return TRUE;
             }
             else {
                 return FALSE;
             }
    }

    public function edit_daftar_ulang_kk($id_pendaftaran,$nama_file)
    {
        $data   = array(
            'kk_daftar_ulang'=>$nama_file,
         );
 
              $this->db->where('id_pendaftaran',$id_pendaftaran);
              $this->db->update('daftar_ulang',$data);
              if($this->db->affected_rows()>0)    
              {
                  return TRUE;
              }
              else {
                  return FALSE;
              }
    }

    public function edit_daftar_ulang_infaq($id_pendaftaran,$nama_file)
    {
        $data   = array(
            'infaq_daftar_ulang'=>$nama_file,
         );
 
              $this->db->where('id_pendaftaran',$id_pendaftaran);
              $this->db->update('daftar_ulang',$data);
              if($this->db->affected_rows()>0)    
              {
                  return TRUE;
              }
              else {
                  return FALSE;
              }
    }

    public function edit_daftar_ulang_yatim($id_pendaftaran,$nama_file)
    {
        $data   = array(
            'yatim_daftar_ulang'=>$nama_file,
         );
 
              $this->db->where('id_pendaftaran',$id_pendaftaran);
              $this->db->update('daftar_ulang',$data);
              if($this->db->affected_rows()>0)    
              {
                  return TRUE;
              }
              else {
                  return FALSE;
              }
    }

    public function hapus_daftar_ulang()
    {
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');
        $this->db->where('id_daftar_ulang',$id_daftar_ulang);
        $this->db->delete('daftar_ulang');
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function hapus_daftar_ulang_ijazah()
    {
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');
        $data=array
        (
            'ijazah_daftar_ulang'=>null,
        );
        $this->db->where('id_daftar_ulang',$id_daftar_ulang);
        $this->db->update('daftar_ulang',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function hapus_daftar_ulang_kk()
    {
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');
        $data=array
        (
            'kk_daftar_ulang'=>null,
        );
        $this->db->where('id_daftar_ulang',$id_daftar_ulang);
        $this->db->update('daftar_ulang',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function hapus_daftar_ulang_infaq()
    {
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');
        $data=array
        (
            'infaq_daftar_ulang'=>null,
        );
        $this->db->where('id_daftar_ulang',$id_daftar_ulang);
        $this->db->update('daftar_ulang',$data);
        if($this->db->affected_rows()>0)    
        {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function hapus_daftar_ulang_yatim()
    {
        $id_daftar_ulang=$this->input->post('id_daftar_ulang');
        $data=array
        (
            'yatim_daftar_ulang'=>null,
        );
        $this->db->where('id_daftar_ulang',$id_daftar_ulang);
        $this->db->update('daftar_ulang',$data);
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