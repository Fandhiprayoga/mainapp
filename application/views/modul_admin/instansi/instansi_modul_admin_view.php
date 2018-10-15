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
        instansi
        <small>Halaman kelola instansi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">Data instansi</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data instansi</h3>
                
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="container-fluid">
            <form id="submit">
                <div class="form-group">
                    <p class="help-block">Nama Instansi :</p><input name="instansi" class="form-control" type="text" style="width:100%;" value="<?php echo $d_i[0]['nama_instansi'];?>"/></div>
                <div class="form-group">
                    <p class="help-block">Logo Instansi :</p>

                    <?php
                        if($d_i[0]['logo_instansi']=='')
                        {
                            echo '<input class="form-control" type="file" name="file" accept="image/*" />';
                        }
                        else
                        {
                            echo '<div class="callout callout-info">
                                    <img id="img_logo" nama_logo="'.$d_i[0]['logo_instansi'].'" src="'.base_url().'/assets/upload/'.$d_i[0]['logo_instansi'].'" class="user-image" alt="User Image" style="height:100%; width:50px;">
                                    <div class="pull-right" style="margin-top:1.5%;">
                                    <a id="btn_hapus" href="javascript:void(0)" >Hapus</a>
                                    </div>
                                    </div>';
                            echo '<input disabled class="form-control" type="file" name="file" accept="image/*" />';
                        }
                    ?>
                    
                    
                    
                </div>
                <div class="form-group">
                    <p class="help-block">Alamat Instansi :</p><textarea name="alamat" class="form-control" style="width:100%;"><?php echo $d_i[0]['alamat_instansi'];?></textarea></div>
                <div class="form-group">
                    <p class="help-block">Nama Kepala Instansi :</p><input name="kepala" class="form-control" type="text" style="  width:100%;" value="<?php echo $d_i[0]['kepala_instansi'];?>"/></div>
                <div class="form-group">
                    <p class="help-block">NIK/NIP Kepala Instansi :</p><input name="nik" class="form-control" type="text" style="width:100%;" value="<?php echo $d_i[0]['nik_instansi'];?>"/>
                    </div>
                        <button id="btn_simpan" class="btn btn-default" type="submit">SIMPAN</button>
            </form>
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
$(document).ready(function() {

});

var setDefaultActive = function() {
            var url = String(window.location);
            var url = url.replace('#', '');
            localStorage.setItem("url", url);
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();
}

setDefaultActive();

$('#submit').submit(function(e){
        //alert('pencet');
        e.preventDefault(); 
        $.ajax({
                     url:'<?php echo base_url();?>index.php/modul_admin/instansi/aksi_edit_instansi',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          $.alert('Tersimpan');
                         location.reload();
                        },
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);

                        }
                 });
});

 $('body').on('click','#btn_hapus',function()
{
    var link=$('#img_logo').attr('nama_logo');
    console.log(link);
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                  
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url();?>index.php/modul_admin/instansi/hapus_logo",
                        dataType : "JSON",
                        data : {link:link},
                        success: function(data){
                            $.alert('Logo berhasil dihapus');
                            location.reload();
                            
                        },
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);

                        }
                    });
                },
                cancel: function () {
                    
                },
            }
        });
    });

</script>