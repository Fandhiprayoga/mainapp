<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN KEGIATAN</title>
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
            <p align="center" style="font-weight:bold;">LAPORAN KEGIATAN <?php if($kegiatan==1){echo "TERDANAI";}else{echo "TIDAK LOLOS PENDANAAN";}?>
            <br> (<?php echo $tgl_awal;?>-<?php echo $tgl_akhir;?>)
            </p>
            <br>
            <table >
                <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA KEGIATAN</th>
                            <th>KATEGORI</th>
                            <th>TGL_PENGAJUAN</th>
                            <th>WAKTU</th>
                            <th>TEMPAT</th>
                            <th>RINCIAN</th>
                            <th>PENANGGUNGJAWAB</th>
                        </tr>
                </thead>
                <tbody>
                        <?php
                                    if($kegiatan==1)
                                    {
                                                $a=$this->db->query("select ra.id_pengajuan,
                                                (select top 1 pj_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as pj_kegiatan,
                                                (select top 1 rincian_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as rincian_kegiatan,
                                                (select top 1 tempat_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as tempat_kegiatan, 
                                                (select top 1 nama_pengajuan from pengajuan where id_pengajuan=ra.id_pengajuan) as nama_pengajuan, 
                                                (select top 1 kategori_pengajuan from pengajuan where id_pengajuan=ra.id_pengajuan) as kategori_pengajuan, 
                                                (select top 1 tgl_pengajuan from pengajuan where id_pengajuan=ra.id_pengajuan) as tgl_pengajuan,
                                                (select top 1 lpj_kegiatan from pengajuan where id_pengajuan = ra.id_pengajuan) as lpj_pengajuan, 
                                                (select top 1 waktu_kegiatan from pengajuan where id_pengajuan=ra.id_pengajuan) as waktu_kegiatan
                                                 from rencana_anggaran ra, pengajuan p 
                                                 where ra.id_pengajuan=p.id_pengajuan and p.lpj_kegiatan is not null and p.tgl_pengajuan between '".$tgl_awal."' and '".$tgl_akhir."' group by ra.id_pengajuan")->result_array();           
                                    }
                                    else
                                    {
                                                $a=$this->db->query("select p.id_pengajuan,
                                                (select top 1 pj_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as pj_kegiatan,
                                                (select top 1 rincian_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as rincian_kegiatan,
                                                (select top 1 tempat_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as tempat_kegiatan, 
                                                (select top 1 nama_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as nama_pengajuan, 
                                                (select top 1 kategori_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as kategori_pengajuan, 
                                                (select top 1 tgl_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as tgl_pengajuan,
                                                (select top 1 lpj_kegiatan from pengajuan where id_pengajuan = p.id_pengajuan) as lpj_pengajuan, 
                                                (select top 1 waktu_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as waktu_kegiatan
                                                 from pengajuan p 
                                                 where p.id_pengajuan not in (select id_pengajuan from pengajuan where lpj_kegiatan is not null) and p.tgl_pengajuan between '".$tgl_awal."' and '".$tgl_akhir."' group by p.id_pengajuan")->result_array();
                                    }
                                    if(count($a))
                                    {           
                                                $i=1;
                                                foreach($a as $ab)
                                                {
                                                            echo        "<tr>
                                                                                    <td>".$i."</td>
                                                                                    <td>".$ab['nama_pengajuan']."</td>
                                                                                    <td>".$ab['kategori_pengajuan']."</td>
                                                                                    <td>".$ab['tgl_pengajuan']."</td>
                                                                                    <td>".$ab['waktu_kegiatan']."</td>
                                                                                    <td>".$ab['tempat_kegiatan']."</td>
                                                                                    <td>".$ab['rincian_kegiatan']."</td>
                                                                                    <td>".$ab['pj_kegiatan']."</td>
                                                                        </tr>";
                                                                        $i++;
                                                }
                                    }
                                    else
                                    {
                                                echo "<tr><td colspan='8' align='center'>TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>";
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