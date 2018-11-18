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
    <br>
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
            <br>
            <p align="center" style="font-weight:bold;display:inline;margin-left:150px;margin-top:-10px;">FORMULIR
                PENDAFTARAN SANTRI BARU </p>
            <img style="display: inline;margin-left:500px;margin-top:-40px;" src="./assets/upload/barcode/<?php echo $data_barcode;?>"
                alt="">
            <br>
            <br>
            <table>
                <?php $a=$this->db->query("select * from pendaftaran where id_pendaftaran='".$id_pendaftaran."'")->result_array();?>
                <tbody>
                    <tr>
                        <td style="width:45%;">NAMA LENGKAP </td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td style="width:60%;">
                            <?php echo $a[0]['n_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>NAMA PANGGILAN </td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['nl_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>TEMPAT TANGGAL LAHIR </td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['t_pendaftaran'];?>,
                            <?php echo $a[0]['tl_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>INSTANSI / FAK / JUR </td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['instansi_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>ALAMAT </td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['alamat_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>NO TELP </td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['telp_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>EMAIL / FB</td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['email_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>PENGALAMAN ORGANISASI</td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['org_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>DAFTAR PRESTASI</td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['prestasi_pendaftaran'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>ALASAN MASUK</td>
                        <td style="width:5px;">:&nbsp; </td>
                        <td>
                            <?php echo $a[0]['alasan_pendaftaran'];?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <div class="footer">
            <br>
            <img src="./assets/upload/santri/<?php if($a[0]['foto_pendaftaran']!=""){echo $a[0]['foto_pendaftaran'];}else{echo 'index.png';}?>" alt="" width="100px;">
            <div style="margin-top:-170px;">
                <p style="margin-bottom:90px;margin-left:400px;">Pamulang,&nbsp;
                    <?php echo $a[0]['tgl_pendaftaran'];?>
                </p>
                <p style="margin-left:400px;">(
                    <?php echo $a[0]['n_pendaftaran'];?>)</p>
            </div>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>