<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Modul
        <small>Halaman kelola modul</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_admin/modul">List Modul</a></li>
        <li><a href="#">Tambah Modul</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Modul</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form>
    <div class="form-group">
        <p class="help-block">Nama Modul</p><input required  id="nama_modul" type="text" class="form-control" /></div>
    <div class="form-group">
        <p class="help-block">Link Modul</p><input required  id="link_modul"  type="text" class="form-control" value="#"/></div>
    <div class="form-group">
        <p class="help-block">Icon Modul</p><input required  class="form-control" value="" type="text" id="icon"></div>
    <div class="form-group">
        <p class="help-block">Order Modul</p><input required  id="order_modul" type="number" class="form-control" /></div>
    <div class="form-group">
        <p class="help-block">Status Aktif Modul</p><select required  id="status_aktif" class="form-control"><option value="Aktif" selected>Aktif</option><option value="Tidak">Tidak</option></select></div>
        <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
        <a href="<?php echo base_url();?>index.php/modul_admin/modul" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
        </form>
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
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>
<script>
$(document).ready(function() {
            $('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
 
    });
    
var setDefaultActive = function() {
    var url = localStorage.getItem("url");
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();
}           

setDefaultActive();
//Save product
$('#btn_simpan').on('click',function(){
            var nama_modul = $('#nama_modul').val();
            var link_modul = $('#link_modul').val();
            var icon  = $('#icon').val();
            var order = $('#order_modul').val();
            var status_aktif  = $('#status_aktif').val();

            if(nama_modul==""||link_modul==""||icon ==""||order==""||status_aktif =="")
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Form tidak boleh ada yg kosong !'});
            }
            else
            {
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url();?>index.php/modul_admin/modul/aksi_tambah_modul",
                dataType : "JSON",
                data : {nama_modul:nama_modul,link_modul:link_modul,icon:icon ,order:order ,status_aktif:status_aktif},
                success: function(data){
                    $.alert('Simpan Berhasil');
                    window.location.href='<?php echo base_url();?>index.php/modul_admin/modul';
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);

                  }
                });
            }
            
			//alert('tombol kepencet');
            return false;
        });
</script>