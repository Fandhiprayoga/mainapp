<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
     
</section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="container" style="">
      <h1 align="center">
        Selamat Datang
        <small>Silahkan Pilih Modul</small>
      </h1>
      <br>
          <?php

            if(count($data_modul))
            {
                $i=1;
                foreach($data_modul as $list)
                {
                    echo '<div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>'.$i.'</h3>

                                    <p>'.$list['nama_modul'].'</p>
                                </div>
                                <div class="icon">
                                    <i class="'.$list['icon'].'"></i>
                                </div>
                                    <a href="'.base_url().''.$list['link_modul'].'" class="small-box-footer">
                                    Masuk Modul <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                            </div>
                        </div>';
                        $i++;
                }
            }
            
          ?>
      </div>
    </section>
    <!-- /.content -->

    <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.min.js"></script>
<script>
$(document).ready(function() {
			
            var url = window.location;
            $('ul li a[href="'+url+'"]').parent().addClass('active');
    });
</script>