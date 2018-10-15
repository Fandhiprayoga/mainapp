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
      Menu
        <small>Halaman kelola Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_admin/menu">List Menu</a></li>
        <li><a href="#">Tambah Menu</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Menu</h3>

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
        <p class="help-block">Modul</p>
        <select class="form-control js-example-basic-single" id="modul" style="width:100%;">
        <?php 
            if(count($data_modul))
            {
                foreach($data_modul as $l)
                {
                    echo '<option value="'.$l['id'].'">'.$l['nama_modul'].'</option>';
                }
            }
        ?>
          </select>
    </div>
    <div class="form-group">
        <p class="help-block">Nama Menu</p><input type="text" class="form-control" id="nama" /></div>
    <div class="form-group">
        <p class="help-block">Icon Menu</p><input type="text" class="form-control" id="icon" /></div>
    <div class="form-group">
        <p class="help-block">Order Menu</p><input type="number" class="form-control" id="order" /></div>
    
        <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
        <a href="<?php echo base_url();?>index.php/modul_admin/menu" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
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
            var nama_menu = $('#nama').val();
            var id_modul = $('#modul').val();
            var icon_menu  = $('#icon').val();
            var order_menu = $('#order').val();
            
            if(nama_menu==""||id_modul==""||icon_menu ==""||order_menu=="")
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
                url  : "<?php echo base_url();?>index.php/modul_admin/menu/aksi_tambah_menu",
                dataType : "JSON",
                data : {nama_menu:nama_menu,id_modul:id_modul,icon_menu:icon_menu,order_menu:order_menu},
                success: function(data){
                    $.alert('Simpan berhasil');
                    window.location.href='<?php echo base_url();?>index.php/modul_admin/menu';
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