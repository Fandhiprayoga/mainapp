<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Backup & restore
        <small>Modul Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#"> Backup & restore</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <!-- <div class="callout callout-danger">
                <h4><i class="fa fa-info-circle"></i> Perhatian</h4>
                <p>Selamat datang di modul admin.</p>
    </div> -->

<div class="box box-default collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Backup</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        
        <button type="button" id="btn_aksi_backup" class="btn btn-lg btn-block btn-default">MULAI BACKUP</button>
        
    </div>
    <!-- /.btn-block box-body -->
</div>

<div class="box box-default collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Restore</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        The body of the box
    </div>
    <!-- /.box-body -->
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
			
});

var setDefaultActive = function() {
            var url = String(window.location);
            var url = url.replace('#', '');
            localStorage.setItem("url", url);
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();

            //console.log($('ul  li a[href="'+url+'"]').parent().parent().parent());
}           

setDefaultActive();

$("#btn_aksi_backup").click(function (e) { 
            e.preventDefault();
            $.ajax({
                        type: "post",
                        url: "<?php echo base_url();?>index.php/modul_admin/backup/aksi_backup",
                        data: {},
                        dataType: "json",
                        success: function (data) {
                                    if(data)
                                    {
                                                alert('backup berhasil');
                                    }
                                    else
                                    {
                                                alert('backup gagal');
                                    }
                        },
                        error: function(xhr, textStatus, error) {
                                    console.log(xhr.responseText);
                                    console.log(xhr.statusText);
                                    console.log(textStatus);
                                    console.log(error);

                        }

            });
});
</script>