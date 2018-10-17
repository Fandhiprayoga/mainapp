<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <p align="center" style="font-weight:bold;">DAFTAR KEPENGURUSAN</p>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>NAMA  LENGKAP</th>
                        <th>JENIS KELAMIN</th>
                        <th>TTL</th>
                        <th>JABATAN</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $b=$this->db->query('select * from mst_organisasi  where id_organisasi!="OR999999999"')->result_array();
                        if(count($b))
                        {
                            $i=1;
                            foreach($b as $bl)
                            {
                                echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$bl['id_organisasi'].'</td>
                                            <td>'.$bl['nama_organisasi'].'</td>
                                            <td>'.$bl['jk_organisasi'].'</td>
                                            <td>'.$bl['t_organisasi'].', '.$bl['tl_organisasi'].'</td>
                                            <td>'.$bl['jabatan_organisasi'].'</td>
                                            <td>'.$bl['alamat_organisasi'].'</td>
                                        </tr>';
                                $i++;
                            }
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