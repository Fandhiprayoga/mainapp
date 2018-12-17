<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Beranda
        <small>Modul Keuangan Yayasan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="callout callout-danger">
                <h4><i class="fa fa-info-circle"></i> Perhatian</h4>
                <p>Selamat datang di modul keuangan yayasan.</p>
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