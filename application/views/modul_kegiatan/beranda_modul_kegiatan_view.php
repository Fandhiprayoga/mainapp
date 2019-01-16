<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/select2/dist/css/select2.min.css">
<link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Beranda
    <small>modul kegiatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
  <div class="callout callout-danger">
    <h4><i class="fa fa-info-circle"></i> Perhatian</h4>
    <p>Selamat datang di modul kegiatan.</p>
  </div>

<div class="col-md-12 container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">LIST KEGIATAN LOLOS PENDANAAN</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="table-responsive">
                <table class="table table-hover" id="tabel_beranda">
                  <thead>
                    <tr>
                            <th>NO</th>
                            <th>NAMA KEGIATAN</th>
                            <th>KATEGORI</th>
                            <th>TGL_PENGAJUAN</th>
                            <th>WAKTU</th>
                            <th>TEMPAT</th>
                            <th>RINCIAN</th>
                            <th>PJ</th>
                            <th>PROPOSAL</th>
                            <th>LPJ</th>
                            <th>GALERI</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $q="select p.id_pengajuan,
                      (select top 1 pj_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as pj_kegiatan,
                      (select top 1 rincian_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as rincian_kegiatan,
                      (select top 1 tempat_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as tempat_kegiatan, 
                      (select top 1 nama_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as nama_pengajuan, 
                      (select top 1 kategori_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as kategori_pengajuan, 
                      (select top 1 tgl_pengajuan from pengajuan where id_pengajuan=p.id_pengajuan) as tgl_pengajuan,
                      (select top 1 lpj_kegiatan from pengajuan where id_pengajuan = p.id_pengajuan) as lpj_kegiatan,
                      (select top 1 proposal_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as  proposal_kegiatan,
                      (select top 1 galeri_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as galeri_kegiatan,
                      (select top 1 waktu_kegiatan from pengajuan where id_pengajuan=p.id_pengajuan) as waktu_kegiatan
                       from pengajuan p 
                       where p.id_pengajuan  in (select id_pengajuan from pengajuan where lpj_kegiatan is not null) group by p.id_pengajuan order by p.id_pengajuan";
                    
                      $a=$this->db->query($q)->result_array();
                      if(count($a))
                      {
                        $i=1;
                          foreach($a as $a)
                          {
                              echo  "<tr>
                                        <td align='center'>".$i."</td>
                                        <td>".$a['nama_pengajuan']."</td>
                                        <td>".$a['kategori_pengajuan']."</td>
                                        <td>".$a['tgl_pengajuan']."</td>
                                        <td>".$a['waktu_kegiatan']."</td>
                                        <td align='center'>".$a['tempat_kegiatan']."</td>
                                        <td>".$a['rincian_kegiatan']."</td>
                                        <td>".$a['pj_kegiatan']."</td>
                                        <td><a href='".base_url()."assets/upload/proposal/".$a['proposal_kegiatan']."'class='btn btn-block btn-default'><i class='fas fa-download'></i></a></td>
                                        <td><a href='".base_url()."assets/upload/lpj/".$a['lpj_kegiatan']."' class='btn btn-block btn-default'><i class='fas fa-download'></i></a></td>
                                        <td><a href='".base_url()."assets/upload/galeri/".$a['galeri_kegiatan']."' class='btn btn-block btn-default'><i class='fas fa-download'></i></a></td>
                                        
                                        
                                    </tr>";
                                    $i++;

                          }
                      }
                      else
                      {
                        echo "<tr class='warning'><td colspan='11' align='center'>TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>";
                      }

                    ?>
                  </tbody>
                </table>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
<!-- DataTables -->
<script src="<?php echo base_url();?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/fontawesome-iconpicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>
<script>
  $(document).ready(function () {

    var url = window.location;
    $('ul li a[href="' + url + '"]').parent().addClass('active');
  });
</script>