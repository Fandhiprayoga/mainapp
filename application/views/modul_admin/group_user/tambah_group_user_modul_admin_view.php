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
      group_user
        <small>Halaman kelola group_user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_admin/group_user">List group_user</a></li>
        <li><a href="#">Tambah group_user</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah group_user</h3>

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
        <p class="help-block">Nama group_user</p><input type="text" class="form-control" id="nama" /></div>
    <div class="form-group">
        <p class="help-block">keterangan group_user</p><input type="text" class="form-control" id="ket" /></div>
   
        <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
        <a href="<?php echo base_url();?>index.php/modul_admin/group_user" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
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
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
            //$('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
            
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
            var nama_group_user = $('#nama').val();
            var keterangan_group_user  = $('#ket').val();
            
            
            if(nama_group_user==""||keterangan_group_user =="")
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
                url  : "<?php echo base_url();?>index.php/modul_admin/group_user/aksi_tambah_group_user",
                dataType : "JSON",
                data : {nama_group_user:nama_group_user,keterangan_group_user:keterangan_group_user},
                success: function(data){
                    $.alert('Simpan berhasil');
                    window.location.href='<?php echo base_url();?>index.php/modul_admin/group_user';
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