<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Staff/Karyawan</title>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<br>
    <div>
        <div class="container">
            <div class="row">
            <?php
                $a=$this->db->query('select * from instansi')->result_array();
                if($a[0]['logo_instansi']=="")
                {
                    echo '<div class="col-md-6 col-sm-6 col-xs-6" style="width:237px;text-align:center;" ><img src="'.base_url().'assets/upload/index_logo.png" style="width:120px;margin:auto;" /></div>';
                }
                else
                {
                    echo '<div class="col-md-6 col-sm-6 col-xs-6" style="width:237px;text-align:center;"><img src="'.base_url().'assets/upload/'.$a[0]['logo_instansi'].'" style="width:120px;" /></div>';
                }
                
                    echo '<div class="col-md-6 col-sm-6 col-xs-6" style="">
                                <h3>'.$a[0]['nama_instansi'].'</h3>
                            </div>';
                    echo '<div class="col-md-6 col-sm-6 col-xs-6">
                            <h5>'.$a[0]['alamat_instansi'].'<br /></h5>
                        </div>';
            ?>
            </div>
        </div>
    </div>
    
    <hr />
    <div class="container" id="ini_tabel">
        <div class="table-responsive">
        <p align="center" style="font-weight:bold;">DAFTAR STAFF / KARYAWAN</p>
        <br>
            <table class="table table-bordered" id="itu_tabel">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID STAFF</th>
                        <th>NAMA  LENGKAP</th>
                        <th>JENIS KELAMIN</th>
                        <th>TTL</th>
                        <th>JABATAN</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $b=$this->db->query('select * from mst_staff')->result_array();
                        if(count($b))
                        {
                            $i=1;
                            foreach($b as $bl)
                            {
                                echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$bl['id_staff'].'</td>
                                            <td>'.$bl['nama_staff'].'</td>
                                            <td>'.$bl['jk_staff'].'</td>
                                            <td>'.$bl['t_staff'].', '.$bl['tl_staff'].'</td>
                                            <td>'.$bl['jabatan_staff'].'</td>
                                            <td>'.$bl['alamat_staff'].'</td>
                                        </tr>';
                                $i++;
                            }
                        }
                    ?>
                   
                </tbody>
            </table>
        </div>
<hr />
        <p>Dicetak oleh <?php echo $this->session->id_user;?> pada <?php echo date("Y/m/d");?></p>
    </div>
</body>
</html>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
$(document).ready(function () {
    window.print();
});
</script>