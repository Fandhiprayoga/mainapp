<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Beranda
        <small>Modul Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="callout callout-danger">
                <h4><i class="fa fa-info-circle"></i> Perhatian</h4>
                <p>Selamat datang di modul admin.</p>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-folder-open"></i></span>

            <div class="info-box-content">
            <?php
              $m_aktif=count($this->db->query("select * from modul where status_aktif='Aktif'")->result_array());
              $m_tidak=count($this->db->query("select * from modul where status_aktif='Tidak'")->result_array());
            ?>
              <span class="info-box-text">Modul Aktif</span>
              <span class="info-box-number"><?php echo $m_aktif;?></span>
              <span class="info-box-text">Modul Nonaktif</span>
              <span class="info-box-number"><?php echo $m_tidak;?></span>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
            <?php
              $u_aktif=count($this->db->query("select * from pengguna where status_user='Aktif'")->result_array());
              $u_tidak=count($this->db->query("select * from pengguna where status_user='Tidak'")->result_array());
            ?>
              <span class="info-box-text">User Aktif</span>
              <span class="info-box-number"><?php echo $u_aktif;?></span>
              <span class="info-box-text">User Nonaktif</span>
              <span class="info-box-number"><?php echo $u_tidak;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
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