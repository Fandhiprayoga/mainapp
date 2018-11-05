<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title>bukti bayar infaq</title>
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <style>
                  .grid {
                           padding: 30px;
                  }

                  table {
                           border: 0px solid black;
                           border-collapse: collapse;
                  }

                  th {
                           border: 0px solid black;
                           text-align: center;

                  }

                  td {
                           border: 0px solid black;
                           text-align: left;
                           vertical-align: top;
                  }

                  td p {
                           margin-top: 1px;
                           margin-bottom: 5px;
                  }

                  tr {
                           margin-bottom: 100px;
                  }
         </style>
</head>

<body>
         <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

         <div class="grid">
                  <span>
                           <div class="logo" style="display: inline;">
                                    <?php
                    $a=$this->db->query('select * from instansi')->result_array();
                    if($a[0]['logo_instansi']!="")
                    {
                        echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/mainapp/assets/upload/'.$a[0]['logo_instansi'].'" alt="logo_instansi" height="100" width="100">';
                    }
                    else
                    {
                        echo '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/mainapp/assets/upload/index_logo.jpg" alt="logo_instansi" height="100" width="100">';
                    }
                ?>
                           </div>
                           <div class="instansi" style="padding-top:-20px;margin-right:100px;margin-left:20px;float:right;display: inline-block; ">
                                    <?php
                        $b=$this->db->query('select * from instansi')->result_array();
                        if(count($b))
                        {
                            echo '<h5>'.$b[0]['nama_instansi'].'</h5>';
                            echo '<h6>'.$b[0]['alamat_instansi'].'</h6>';
                        }
                    ?>
                           </div>
                  </span>
                  <div class="tabel_plate">
                           <hr>
                           
                           <p align="center" style="font-weight:bold;display:inline;margin-left:25%;margin-top:-10px;">
                                    BUKTI PENERIMAAN UANG INFAQ </p>
                           <br>
                           <table>
                            <?php $p=$this->db->query('select * from pendaftaran where id_pendaftaran="'.$id_pendaftaran.'"')->result_array();?>
                            <?php $i=$this->db->query('select * from mst_infaq where id_infaq="'.$id_infaq.'"')->result_array();?>
                            <?php $bi=$this->db->query('select * from bayar_infaq where id_pendaftaran="'.$id_pendaftaran.'"')->result_array();?>
                                    <tbody>
                                    <tr>
                                             <td>Sudah diterima dari </td>
                                    </tr>
                                    <tr>
                                             <td>Nama</td>
                                             <td>:</td>
                                             <td>&nbsp;<?php echo $p[0]['n_pendaftaran']?></td>
                                    </tr>
                                    <tr>
                                             <td>Jumlah</td>
                                             <td>:</td>
                                             <td>&nbsp;Rp. <?php echo $i[0]['nominal_infaq']?>,-</td>
                                    </tr>
                                    <tr>
                                             <td>Keterangan</td>
                                             <td>:</td>
                                             <td>&nbsp;Lunas</td>
                                    </tr>
                                    </tbody>
                           </table>
                  </div>
                  <div class="footer">
                           <br>
                           <p style="margin-top:-0px;margin-bottom:70px;margin-left:400px;">Pamulang,&nbsp;
                                    <?php echo $bi[0]['tgl_bayar_infaq'];?>
                           </p>
                           
                           <p style="margin-left:400px;">Pengurus Infaq
                           </p>
                           
                  </div>
         </div>
         <script src="" async defer></script>
</body>

</html>