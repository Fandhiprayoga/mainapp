<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RENCANA ANGGARAN BELANJA</title>
    <style>
        .grid{
            padding:30px;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width:100%;
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
            <?php $a=$this->db->query("select ra.*, p.nama_pengajuan, sum((ra.qty_rencana_anggaran*ra.harga_rencana_anggaran)) over() as total from rencana_anggaran ra, pengajuan p where ra.id_pengajuan='".$id_pengajuan."' and ra.id_pengajuan=p.id_pengajuan order by ra.id_jenis_anggaran asc")->result_array(); ?>
            <p align="center" style="font-weight:bold;text-transform: uppercase;">RENCANA ANGGARAN BELANJA KEGIATAN<br><?php echo $a[0]['nama_pengajuan']?></p>

            <br>
            <table >
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>URAIAN</th>
                        <th>QTY</th>
                        <th>SATUAN</th>
                        <th>HARGA SATUAN</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        if(count($a))
                        {
                                    
                                    $no=0;
                                    $j='';
                                    foreach($a as $a)
                                    {
                                                $jenis=$this->db->query("select * from mst_jenis_anggaran where id_jenis_anggaran='".$a['id_jenis_anggaran']."' order by id_jenis_anggaran asc")->result_array();
                                                $satuan=$this->db->query("select * from mst_satuan where id_satuan='".$a['id_satuan']."' order by id_satuan asc")->result_array();

                                                
                                                if($j==$jenis[0]['nama_jenis_anggaran'])
                                                {
                                                            
                                                }
                                                else
                                                {
                                                            echo "<tr><td colspan='6'><b>".$jenis[0]['nama_jenis_anggaran']."</b></td></tr>";
                                                }
                                                            echo        "<tr>
                                                                                    <td>".($no+1)."</td>
                                                                                    <td>".$a['nama_rencana_anggaran']."</td>
                                                                                    <td>".$a['qty_rencana_anggaran']."</td>
                                                                                    <td>".$satuan[0]['nama_satuan']."</td>
                                                                                    <td>Rp.".$a['harga_rencana_anggaran']."</td>
                                                                                    <td>Rp.".($a['harga_rencana_anggaran']*$a['qty_rencana_anggaran'])."</td>
                                                                        </tr>";
                                                $no++;
                                                $j=$jenis[0]['nama_jenis_anggaran'];
                                    }
                                    echo '<tr><td colspan="5"><b>SUBTOTAL</b></td><td>Rp.'.$a['total'].'</td></tr>';
                        }
                        else
                        {
                                    echo "<tr><td colspan='6'>TIDAK ADA DATA YG BISA DITAMPILKAN</td></tr>";
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