<!DOCTYPE html>
<html lang="en">

<head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>Cetak data kelola data kelas & asrama</title>
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
                           if($tipe_cetak=="dua")
                           {
                                    if($id_kelas=="SEMUA" && $id_asrama=="SEMUA")
                                    {
                                             $a="select * from kelas_asrama ";
                                    }

                                    else if($id_asrama=="SEMUA")
                                    {
                                             $a="select * from kelas_asrama where id_kelas='".$id_kelas."'";
                                    }
                                    else
                                    {
                                             $a="select * from kelas_asrama where id_asrama='".$id_asrama."'";
                                    }

                                    

                                    $b=$this->db->query($a)->result_array();

                                    if(count($b))
                                    {

                                             echo '<div class="tabel_plate">
                                                               <hr>
                                    
                                                               <p align="center" style="font-weight:bold;">
                                                                        Data kelola Kelas & asrama </p>
                                                               <br>
                                                               <table>
                                                                        <thead>
                                                                                 <tr>
                                                                                          <th>NO</th>
                                                                                          <th>ID SANTRI</th>
                                                                                          <th>NAMA SANTRI</th>
                                                                                          <th>KELAS</th>
                                                                                          <th>ASRAMA</th>
                                                                                 </tr>
                                                                        </thead>
                                                                        <tbody>';
                                             $i=1;
                                             foreach($b as $b)
                                             {
                                                      $kelas=$this->db->query("select * from mst_kelas where id_kelas='".$b['id_kelas']."'")->result_array();
                                                      $asrama=$this->db->query("select * from mst_asrama where id_asrama='".$b['id_asrama']."'")->result_array();
                                                      $santri=$this->db->query("select * from mst_santri where id_santri='".$b['id_santri']."'")->result_array();
                                                      echo '                              <tr>
                                                                                                   <td>'.$i.'</td>
                                                                                                   <td>'.$b['id_santri'].'</td>
                                                                                                   <td>'.$santri[0]['n_santri'].'</td>
                                                                                                   <td>'.$kelas[0]['nama_kelas'].'</td>
                                                                                                   <td>'.$asrama[0]['nama_asrama'].'</td>
                                                                                          </tr>
                                                                                 ';
                                                               $i++;
                                             }
                                             echo '</tbody>
                                                               </table>
                                                      </div>';
                                    }
                                    else
                                    {
                                             echo '<hr>';
                                             echo '<br>';
                                             echo 'Tidak ada data yg bisa ditampilkan cek kembali parameter filternya';
                                    }
                           }
                           else if($tipe_cetak=="kelas")
                           {
                                    if($id_kelas=="SEMUA")
                                    {
                                             $a="select * from kelas_asrama ";
                                    }
                                    else
                                    {
                                             $a="select * from kelas_asrama where id_kelas='".$id_kelas."'";
                                    }
                                    

                                    $b=$this->db->query($a)->result_array();

                                    if(count($b))
                                    {
                                            
                                                     
                                                      echo ' <div class="tabel_plate">
                                                                        <hr>
                                             
                                                                        <p align="center" style="font-weight:bold;">
                                                                                 Data kelola Kelas</p>
                                                                        <br>
                                                                        <table>
                                                                                 <thead>
                                                                                          <tr>
                                                                                                   <th>NO</th>
                                                                                                   <th>ID SANTRI</th>
                                                                                                   <th>NAMA SANTRI</th>
                                                                                          
                                                                                                   <th>KELAS</th>
                                                                                          </tr>
                                                                                 </thead>
                                                                                 <tbody>';
                                                                                 $i=1;
                                                                                 foreach($b as $b)
                                                                                 {
                                                                                          $kelas=$this->db->query("select * from mst_kelas where id_kelas='".$b['id_kelas']."'")->result_array();
                                                                                          //$asrama=$this->db->query('select * from mst_asrama where id_kelas="'.$b['id_asrama'].'"')->result_array();
                                                                                          $santri=$this->db->query("select * from mst_santri where id_santri='".$b['id_santri']."'")->result_array();
                                                                                          echo     '<tr>
                                                                                                            <td>'.$i.'</td>
                                                                                                            <td>'.$b['id_santri'].'</td>
                                                                                                            <td>'.$santri[0]['n_santri'].'</td>
                                                                                                            
                                                                                                            <td>'.$kelas[0]['nama_kelas'].'</td>
                                                                                                   </tr>';
                                                                                          $i++;
                                                                                  }
                                                          


                                                          echo                   '</tbody>
                                                                        </table>
                                                               </div>';
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
                  
                                    if($id_asrama=="SEMUA")
                                    {
                                             $a="select * from kelas_asrama ";
                                    }
                                    else
                                    {
                                             $a="select * from kelas_asrama where id_asrama='".$id_asrama."'";
                                    }
                                    

                                    $b=$this->db->query($a)->result_array();

                                    if(count($b))
                                    {
                                            
                                                      
                                                      echo ' <div class="tabel_plate">
                                                                        <hr>
                                             
                                                                        <p align="center" style="font-weight:bold;">
                                                                                 Data kelola Asrama</p>
                                                                        <br>
                                                                        <table>
                                                                                 <thead>
                                                                                          <tr>
                                                                                                   <th>NO</th>
                                                                                                   <th>ID SANTRI</th>
                                                                                                   <th>NAMA SANTRI</th>
                                                                                          
                                                                                                   <th>ASRAMA</th>
                                                                                          </tr>
                                                                                 </thead>
                                                                                 <tbody>';
                                                                                 $i=1;
                                                                                 foreach($b as $b)
                                                                                 {
                                                                                          //$kelas=$this->db->query('select * from mst_kelas where id_kelas="'.$b['id_kelas'].'"')->result_array();
                                                                                          $asrama=$this->db->query("select * from mst_asrama where id_asrama='".$b['id_asrama']."'")->result_array();
                                                                                          $santri=$this->db->query("select * from mst_santri where id_santri='".$b['id_santri']."'")->result_array();
                                                                                          echo     '<tr>
                                                                                                            <td>'.$i.'</td>
                                                                                                            <td>'.$b['id_santri'].'</td>
                                                                                                            <td>'.$santri[0]['n_santri'].'</td>
                                                                                                            
                                                                                                            <td>'.$asrama[0]['nama_asrama'].'</td>
                                                                                                   </tr>';
                                                                                          $i++;
                                                                                  }
                                                          


                                                          echo                   '</tbody>
                                                                        </table>
                                                               </div>';
                                                               
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