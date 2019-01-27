<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN GAJI TUKANG</title>
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
            <p align="center" style="font-weight:bold; text-transform: uppercase;" >LAPORAN PENGGAJIAN TUKANG
            <br> PEMBANGUNAN <?php $a=$this->db->query("select nama_pengajuan from pengajuan where id_pengajuan='".$id_pengajuan."'")->result_array(); echo $a[0]['nama_pengajuan'];?>
            </p>
            <br>
            <table >
                <thead>
                        <tr>
                                <th>NO</th>
                                <th>NAMA TUKANG</th>
                                <th>TELP</th>
                                <th>ALAMAT</th>
                                <th>NOMINAL GAJI</th>
                                <th>TANGGAL</th>
                        </tr>
                </thead>
                <tbody>
                <?php 
                            $a= $this->db->query("select (select nama_tukang from mst_tukang where id_tukang=gt.id_tukang) as nama_tukang, (select alamat from mst_tukang where id_tukang=gt.id_tukang) as alamat, (select no_telp from mst_tukang where id_tukang=gt.id_tukang) as no_telp, *, sum(nominal_gaji_tukang) over() as total   from gaji_tukang gt where id_pengajuan='".$id_pengajuan."' order by id_gaji_tukang desc ")->result_array();

                            if(count($a))
                            {
                                $i=1;
                                foreach($a as $a)
                                {
                                    echo "<tr>
                                                <td>".$i."</td>
                                                <td>".$a['nama_tukang']."</td>
                                                <td>".$a['no_telp']."</td>
                                                <td>".$a['alamat']."</td>
                                                <td>".$a['nominal_gaji_tukang']."</td>
                                                <td>".$a['tgl_gaji_tukang']."</td>
                                            </tr>";
                                        $i++;
                                }
                                echo "<tr><td colspan='4'>TOTAL</td><td>Rp.".$a['total']."</td><td></td></tr>";
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