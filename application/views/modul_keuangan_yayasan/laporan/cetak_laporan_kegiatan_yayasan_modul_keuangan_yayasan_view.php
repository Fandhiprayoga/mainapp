<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN TRANSAKSI DONATUR YAYASAN</title>
    <style>
        .grid{
            padding:30px;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th {
            border: 1px solid black;
            text-align: center;
            font-size:13px;
            
        }
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
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
            <p align="center" style="font-weight:bold;">LAPORAN DANA KEGIATAN YAYASAN
            <br> (<?php echo $tgl_awal;?> s/d <?php echo $tgl_akhir;?>)
            </p>
            <br>
            <table >
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA KEGIATAN</th>
                            <th>KATEGORI KEGIATAN</th>
                            <th>WAKTU KEGIATAN</th>
                            <th>PENANGGUNG JAWAB</th>
                            <th>TEMPAT KEGIATAN</th>
                            <th>RENCANA ANGGARAN</th>
                        </tr>
                </thead>
                <tbody>
                <?php 
                            $a= $this->db->query("select *,
                            (select sum(qty_rencana_anggaran*harga_rencana_anggaran) from rencana_anggaran where  pengajuan.id_pengajuan=id_pengajuan) as rencana_anggaran,
                            (sum((select sum(qty_rencana_anggaran*harga_rencana_anggaran) from rencana_anggaran where  pengajuan.id_pengajuan=id_pengajuan)) over()) as total 
                            from pengajuan 
                            where status_lpj='1' and kategori_pengajuan='yayasan' and tgl_pengajuan between '".$tgl_awal."' and '".$tgl_akhir."'")->result_array();

                            if(count($a))
                            {
                                $i=1;
                                foreach($a as $a)
                                {
                                    echo "<tr>
                                                <td>".$i."</td>
                                                <td>".$a['nama_pengajuan']."</td>
                                                <td>".$a['kategori_pengajuan']."</td>
                                                <td>".$a['waktu_kegiatan']."</td>
                                                <td>".$a['pj_kegiatan']."</td>
                                                <td>".$a['tempat_kegiatan']."</td>
                                                <td>Rp.".$a['rencana_anggaran']."</td>
                                            </tr>";
                                        $i++;
                                }
                                echo "<tr><td colspan='6'>TOTAL</td><td>Rp.".$a['total']."</td></tr>";
                            }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <br>
            <p>Dicetak oleh <?php echo $this->session->id_user;?> pada <?php echo date("Y/m/d");?></p>
        </div>
    </div>
</body>
</html>