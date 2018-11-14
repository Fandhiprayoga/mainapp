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
         <title></title>
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="">
         <style>
                  #header{
                           margin-top:-200px;
                           margin-left:10px;
                           width:321.25984252px;   
                           margin-bottom:1px;
                           float:left;
                  }
                  #id_front{
                           width:321.25984252px; 
                           
                  }
                  #id_back{
                           margin-top:-200px;
                           float:right;
                           width:321.25984252px;  
                  }
         </style>
</head>

<body>
         <!--[if lt IE 7]>
                           <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
                  <![endif]-->
<?php
         
         if(count($id_pendaftaran))
         {
                sort($id_pendaftaran);
                  foreach($id_pendaftaran as $a)
                  {
                           $i=$this->db->query('select * from instansi')->result_array();
                           $n=$this->db->query('select * from pendaftaran where id_pendaftaran="'.$a.'"')->result_array();
                           echo '<img width="642.51968504px" height="204.09448819px" src="./assets/upload/idcard.png" alt="" style="margin-bottom:5px;margin-top:5px;" ><br>';   
                           //instansi header front
                           echo     '<div id="header">
                                             <img style="float:left;" height="50px" src="./assets/upload/'.$i[0]['logo_instansi'].'">
                                             <p style="margin-left:70px;margin-top:-5px;margin-bottom:1px;font-size:15px;" id="nama_instansi">'.$i[0]['nama_instansi'].'</p>
                                             <p style="margin-left:70px;margin-top:0px;font-size:10px;" id="alamat_instansi">'.$i[0]['alamat_instansi'].'</p>';
                                               if($n[0]['foto_pendaftaran']!="")
                                               {
                                                      echo       '<div style="margin-top:30px;margin-left:20px;" id="id_front">
                                                               <img style="margin-right:50px;" height="90px" width="70px" src="./assets/upload/santri/'.$n[0]['foto_pendaftaran'].'">
                                                               <p style="margin-top:-110px;margin-left:120px;text-transform: capitalize;"><b>'.$n[0]['n_pendaftaran'].'</b></p>
                                                               <img style="margin-top:-70px;margin-left:120px;"height="50px" src="./assets/upload/barcode/'.$a.'.jpg">
                                                      </div>';
                                               }
                                               else
                                               {
                                                      echo       '<div style="margin-top:30px;margin-left:20px;" id="id_front">
                                                               <img style="margin-right:50px;" height="90px" width="70px" src="./assets/upload/santri/index.png">
                                                               <p style="margin-top:-110px;margin-left:120px;text-transform: capitalize;"><b>'.$n[0]['n_pendaftaran'].'</b></p>
                                                               <img style="margin-top:-70px;margin-left:120px;"height="50px" src="./assets/upload/barcode/'.$a.'.jpg">
                                                      </div>';
                                               
                                             }
                           echo       '</div>';
                           echo     '<div id="id_back" >
                                             <p style="margin-bottom:35px;margin-left:-100px;" align="center">BIODATA</p>
                                             <table style="margin-left:-30px;font-size:10px;">
                                                      <tbody>
                                                               <tr>
                                                                        <td>Nama</td>
                                                                        <td>:</td>
                                                                        <td>'.$n[0]['n_pendaftaran'].'</td>
                                                               </tr>
                                                               <tr>
                                                                        <td>No Santri</td>
                                                                        <td>:</td>
                                                                        <td>'.$n[0]['id_pendaftaran'].'</td>
                                                               </tr>
                                                               <tr>
                                                                        <td>TTL</td>
                                                                        <td>:</td>
                                                                        <td>'.$n[0]['t_pendaftaran'].','.$n[0]['tl_pendaftaran'].'</td>
                                                               </tr>
                                                               <tr>
                                                                        <td style="vertical-align:top;">Alamat</td>
                                                                        <td style="vertical-align:top;">:</td>
                                                                        <td style="vertical-align:top;margin-top:-100px;">'.strip_tags($n[0]['alamat_pendaftaran']).'</td>
                                                               </tr>
                                                      </tbody>
                                             </table>
                                    </div>';
                  }
         }      
?>
</body>

</html>