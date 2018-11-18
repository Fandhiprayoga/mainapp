<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Beranda
    <small>Modul Pendaftaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="callout callout-danger">
    <h4><i class="fa fa-info-circle"></i> Perhatian</h4>
    <p>Selamat datang di modul pendaftaran.</p>
  </div>

<div class="col-md-12 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fas fa-recycle"></i></span>
      <?php $a=$this->db->query('select count(id_pendaftaran) as jml_pendaftaran from pendaftaran where id_pendaftaran not in (select id_santri from mst_santri)')->result_array();?>
      <div class="info-box-content">
        <span class="info-box-text">Daftar ulang menunggu Proses </span>
        <span class="info-box-number">
          <?php echo $a[0]['jml_pendaftaran']?> proses</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fas fa-user-plus"></i></span>
      <?php $b=$this->db->query("select count(id_pendaftaran) as jml_santri_baru from pendaftaran where SUBSTRING(id_pendaftaran,3,4)='".date('Y')."' ")->result_array();?>
      <div class="info-box-content">
        <span class="info-box-text">Jml Pendaftaran santri baru tahun ini (<?php echo date('Y');?>)</span>
        <span class="info-box-number">
        <?php echo $b[0]['jml_santri_baru']?> orang</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fas fa-users"></i></span>
      <?php $c=$this->db->query('select count(id_santri) as jml_santri from mst_santri')->result_array();?>
      <div class="info-box-content">
        <span class="info-box-text">Jml Santri terdaftar</span>
        <span class="info-box-number">
        <?php echo $c[0]['jml_santri']?> orang</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fas fa-chalkboard-teacher"></i></span>
      <?php $d=$this->db->query('select count(id_kelas) as jml_kelas from mst_kelas')->result_array();?>
      <div class="info-box-content">
        <span class="info-box-text">Jml kelas</span>
        <span class="info-box-number">
        <?php echo $d[0]['jml_kelas']?> kelas</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

   <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fas fa-home"></i></span>
      <?php $e=$this->db->query('select count(id_asrama) as jml_asrama from mst_asrama')->result_array();?>
      <div class="info-box-content">
        <span class="info-box-text">Jml Asrama</span>
        <span class="info-box-number">
        <?php echo $e[0]['jml_asrama']?> asrama</span>
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
  $(document).ready(function () {

    var url = window.location;
    $('ul li a[href="' + url + '"]').parent().addClass('active');
  });
</script>