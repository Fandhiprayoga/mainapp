<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN TRANSAKSI DONATUR YATIM</title>
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
            <p align="center" style="font-weight:bold;">LAPORAN TRANSAKSI DONATUR YATIM
            <br> (<?php echo $tgl_awal;?> s/d <?php echo $tgl_akhir;?>)
            </p>
            <br>
            <table >
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA DONATUR</th>
                            <th>TELP DONATUR</th>
                            <th>ALAMAT DONATUR</th>
                            <th>TGL DONASI</th>
                            <th>NOMINAL</th>
                        </tr>
                </thead>
                <tbody>
                <?php 
                            $a= $this->db->query("select *, 
                            (sum(nominal_trx_donatur_yatim) over()) as total,
                            (select nama_donatur from mst_donatur where id_donatur=trx_donatur_yatim.id_donatur) as nama_donatur,
                            (select telp_donatur from mst_donatur where id_donatur=trx_donatur_yatim.id_donatur) as telp_donatur,
                            (select alamat_donatur from mst_donatur where id_donatur=trx_donatur_yatim.id_donatur) as alamat_donatur 
                            from trx_donatur_yatim 
                            where tgl_trx_donatur_yatim between '".$tgl_awal."' and '".$tgl_akhir."'")->result_array();

                            if(count($a))
                            {
                                $i=1;
                                foreach($a as $a)
                                {
                                    echo "<tr style='width:100%;'>
                                            <td>".$i."</td>
                                            <td>".$a['nama_donatur']."</td>
                                            <td>".$a['telp_donatur']."</td>
                                            <td>".$a['alamat_donatur']."</td>
                                            <td>".$a['tgl_trx_donatur_yatim']."</td>
                                            <td>Rp.".$a['nominal_trx_donatur_yatim']."</td>
                                        </tr>";
                                        $i++;
                                }
                                echo "<tr><td colspan='5'>TOTAL</td><td>Rp.".$a['total']."</td></tr>";
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