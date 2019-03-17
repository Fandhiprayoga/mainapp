<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak data santri</title>
    <style>
        .grid {
            padding: 30px;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            border: 1px solid black;
            text-align: center;

        }

        td {
            border: 1px solid black;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
                  if($status_yatim=="SEMUA")
                  {
                           if($status_santri=="SEMUA")
                           {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status from mst_santri";
                           }
                           else if($status_santri=="AKTIF")
                           {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri WHERE status_santri='AKTIF'";
                           }
                           else if($status_santri=="LULUS")
                           {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri WHERE status_santri='LULUS'";
                           }
                           else
                           {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri WHERE status_santri='KELUAR'"; 
                           }
                           
                  }
                  else
                  {
                            if($status_santri=="SEMUA")
                            {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri where id_status='".$status_yatim."'";
                            }
                            else if($status_santri=="AKTIF")
                            {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri WHERE status_santri='AKTIF' and id_status='".$status_yatim."'";
                            }
                            else if($status_santri=="LULUS")
                            {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri WHERE status_santri='LULUS' and id_status='".$status_yatim."'";
                            }
                            else
                            {
                                    $sy="select *, (select nama_status from mst_status where id_status=mst_santri.id_status) AS nama_status  from mst_santri WHERE status_santri='KELUAR' and id_status='".$status_yatim."'"; 
                            }       
                  }
         ?>

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
        <div class="tabel_plate">
            <hr>

            <p align="center" style="font-weight:bold;">
                DAFTAR SANTRI </p>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID SANTRI</th>
                        <th>NAMA SANTRI</th>
                        <th>TTL</th>
                        <th>STATUS SANTRI</th>
                        <th>STATUS AKTIF</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                                      $a=$this->db->query($sy)->result_array();
                                                      if(count($a))
                                                      {
                                                               $i=1;
                                                               foreach($a as $a)
                                                               {
                                                                        $yatim=$this->db->query("select * from daftar_ulang where id_pendaftaran='".$a['id_santri']."'")->result_array();
                                                                        echo     '<tr>
                                                                                          <td>'.$i.'</td>
                                                                                          <td>'.$a['id_santri'].'</td>
                                                                                          <td>'.$a['n_santri'].'</td>
                                                                                          <td>'.$a['t_santri'].', '.$a['tl_santri'].'</td>';
                                                                        echo               '<td>'.$a['nama_status'].'</td>';    
                                                                          echo            '<td>'.$a['status_santri'].'</td>
                                                                                          <td>'.$a['alamat_santri'].'</td>
                                                                                 </tr>';
                                                                                 $i++;
                                                               }
                                                      }
                                                      else
                                                      {
                                                               echo '<td colspan="7" align="center">TIDAK ADA DATA</td>';
                                                               
                                                      }
                                             ?>
                </tbody>
            </table>

        </div>
        <div class="footer">

        </div>
    </div>

</body>

</html>