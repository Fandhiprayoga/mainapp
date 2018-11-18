<!DOCTYPE html>
<html lang="en">

<head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>CETAK LAPORAN INFAQ</title>
         <style>
                  .grid {
                           padding: 30px;
                  }

                  table {
                           border: 1px solid black;
                           border-collapse: collapse;
                           margin: 0px auto;
                           width:100%;
                  }

                  th {
                           border: 1px solid black;
                           text-align: center;

                  }

                  td {
                           border: 1px solid black;
                           text-align: left;
                           padding-left:10px;
                  }
         </style>
</head>

<body>
         <div class="grid">
                  <span>
                           <div class="logo" style="display: inline;">
                                    <?php
                    $a=$this->db->query('select * from instansi')->result_array();
                    if($a[0]['logo_instansi']!="")
                    {
                        echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/mainapp/assets/upload/'.$a[0]['logo_instansi'].'" alt="logo_instansi" height="115" width="115">';
                    }
                    else
                    {
                        echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/mainapp/assets/upload/index_logo.jpg" alt="logo_instansi" height="115" width="115">';
                    }
                ?>
                           </div>
                           <div class="instansi" style="padding-top:-20px;margin-right:100px;margin-left:20px;float:right;display: inline-block; ">
                                    <?php
                        $b=$this->db->query('select * from instansi')->result_array();
                        if(count($b))
                        {
                            echo '<h3>'.$b[0]['nama_instansi'].'</h3>';
                            echo '<h5>'.$b[0]['alamat_instansi'].'</h5>';
                        }
                    ?>
                           </div>
                  </span>
            <?php
                        if($santri=="0")
                        {
                                    $query='SELECT p.*, bi.* FROM pendaftaran p LEFT JOIN bayar_infaq bi ON p.id_pendaftaran=bi.id_pendaftaran AND bi.id_infaq="'.$infaq.'" WHERE bi.status_bayar_infaq=1 AND SUBSTRING(p.id_pendaftaran,3,4)="'.date('Y').'" ORDER BY p.id_pendaftaran DESC';
                                    $a=$this->db->query($query)->result_array();
                                    if(count($a))
                                    {
                                                $infq=$this->db->query('select nama_infaq from mst_infaq where id_infaq="'.$infaq.'"')->result_array();
                                                echo '<div class="tabel_plate">
                                                                        <hr>
                                                
                                                                        <p align="center" style="font-weight:bold;">
                                                                                    Data Bayar Infaq Calon Santri ('.$infq[0]['nama_infaq'].')</p>
                                                                        <br>
                                                                        <table>
                                                                                    <thead>
                                                                                    <tr>
                                                                                                <th>NO</th>
                                                                                                <th>ID PENDAFTARAN</th>
                                                                                                <th>NAMA LENGKAP</th>
                                                                                                <th>TGL BAYAR</th>
                                                                                                <th>NOMINAL</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>';
                                                $i=1;
                                                $jml_data=count($a);
                                                foreach($a as $a)
                                                {
                                                            $inf=$this->db->query('select nominal_infaq from mst_infaq where id_infaq="'.$a['id_infaq'].'"')->result_array();
                                                            $jml_infaq=$jml_data*intval($inf[0]['nominal_infaq']);
                                                            echo        '<tr>
                                                                                    <td>'.$i.'</td>
                                                                                    <td>'.$a['id_pendaftaran'].'</td>
                                                                                    <td>'.$a['n_pendaftaran'].'</td>
                                                                                    <td>'.$a['tgl_bayar_infaq'].'</td>
                                                                                    <td>Rp.'.$inf[0]['nominal_infaq'].'</td>
                                                                        </tr>';
                                                            $i++;
                                                }
                                                echo        '<tr>
                                                                        <td colspan="4">JUMLAH</td>
                                                                        <td>Rp.'.$jml_infaq.'</td>
                                                            </tr>';        
                                    }
                                    else
                                    {
                                                echo '<hr>';
                                                echo '<br>';
                                                echo 'Tidak ada data yg bisa ditampilkan cek kembali parameter filternya';      
                                    }
                        }
                        else
                        {
                                    $query='SELECT p.*, bi.* FROM mst_santri p LEFT JOIN bayar_infaq bi ON p.id_santri=bi.id_pendaftaran AND bi.id_infaq="'.$infaq.'" WHERE bi.status_bayar_infaq=1 ORDER BY p.id_santri DESC';
                                    $a=$this->db->query($query)->result_array();
                                    if(count($a))
                                    {
                                                $infq=$this->db->query('select nama_infaq from mst_infaq where id_infaq="'.$infaq.'"')->result_array();
                                                echo '<div class="tabel_plate">
                                                                        <hr>
                                                
                                                                        <p align="center" style="font-weight:bold;">
                                                                                    Data Bayar Infaq Santri ('.$infq[0]['nama_infaq'].')</p>
                                                                        <br>
                                                                        <table>
                                                                                    <thead>
                                                                                    <tr>
                                                                                                <th>NO</th>
                                                                                                <th>ID SANTRI</th>
                                                                                                <th>NAMA LENGKAP</th>
                                                                                                <th>KELAS</th>
                                                                                                <th>TGL BAYAR</th>
                                                                                                <th>NOMINAL</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>';
                                                $i=1;
                                                $jml_data=count($a);
                                                foreach($a as $a)
                                                {
                                                            $id_kelas=$this->db->query('select id_kelas from kelas_asrama where id_santri="'.$a['id_santri'].'"')->result_array();
                                                            $n_kelas=$this->db->query('select nama_kelas from mst_kelas where id_kelas="'.$id_kelas[0]['id_kelas'].'"')->result_array();
                                                            $inf=$this->db->query('select nominal_infaq from mst_infaq where id_infaq="'.$a['id_infaq'].'"')->result_array();
                                                            $jml_infaq=$jml_data*intval($inf[0]['nominal_infaq']);
                                                            echo        '<tr>
                                                                                    <td>'.$i.'</td>
                                                                                    <td>'.$a['id_santri'].'</td>
                                                                                    <td>'.$a['n_santri'].'</td>
                                                                                    <td>'.$n_kelas[0]['nama_kelas'].'</td>
                                                                                    <td>'.$a['tgl_bayar_infaq'].'</td>
                                                                                    <td>Rp.'.$inf[0]['nominal_infaq'].'</td>
                                                                        </tr>';
                                                            $i++;
                                                }
                                                echo        '<tr>
                                                                        <td colspan="5">JUMLAH</td>
                                                                        <td>Rp.'.$jml_infaq.'</td>
                                                            </tr>';            
                                    }
                                    else
                                    {
                                                echo '<hr>';
                                                echo '<br>';
                                                echo 'Tidak ada data yg bisa ditampilkan cek kembali parameter filternya';      
                                    }
                        }

                        

            ?>

                  <div class="footer">

                  </div>
         </div>

</body>

</html>