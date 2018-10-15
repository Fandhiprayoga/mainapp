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
        <li><a href="#">list Menu</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List Menu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_admin/menu/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah Menu</a>
                
                <div class="table-responsive">
                <table class="table" id="tbl_menu" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID MENU</th>
                            <th>MODUL</th>
                            <th>NAMA MENU</th>
                            <th>ICON MENU</th>
                            <th>ORDER</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        
                            if(count($data_menu))
                            {
                                foreach($data_menu as $list)
                                {
                                    $modul=$this->db->query('select max(nama_modul) as nama_modul from modul where id="'.$list['id_modul'].'"')->result_array();
                                    echo '<tr>';
                                    echo '<td class="id">'.$list['id'].'</td>';
                                    echo '<td id="modul" id_modul="'.$list['id_modul'].'" >';
                                    echo    $modul[0]['nama_modul'];
                                    echo '</td>';
                                    
                                    echo '<td class="nama">'.$list['nama_menu'].'</td>';
                                    echo '<td class="icon"><i class="'.$list['icon_menu'].'" style="font-size:33px;"></i><br>'.$list['icon_menu'].'</td>';
                                    echo '<td class="order">'.$list['order_menu'].'</td>';
                                    echo '<td style="width:170px;">';
                                    echo    '<div class="btn-toolbar" style="width:100%;">';
                                    echo        '<div role="group" class="btn-group"><button id="btn_edit" data-toggle="modal" data-target="#modal-default" class="btn btn-default" type="button"><i class="fa fa-edit"></i> Edit</button><button id="btn_hapus" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i> Hapus</button></div>';
                                    echo    '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
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
    <div class="modal fade" id="modal-default" style="margin: 0 auto;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Menu</h4>
              </div>
              <div class="modal-body">
              <form>
    <div class="form-group">
        <p class="help-block">Id Menu</p><input type="text" readonly class="form-control" id="id_edit" /></div>
    <div class="form-group">
        <p class="help-block">Modul</p>
        <select class="form-control js-example-basic-single" id="modul_edit" style="width:100%;">
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
        <p class="help-block">Nama Menu</p><input type="text" class="form-control" id="nama_edit" /></div>
    <div class="form-group">
        <p class="help-block">Icon Menu</p><input type="text" class="form-control" id="icon_edit" /></div>
    <div class="form-group">
        <p class="help-block">Order Menu</p><input type="number" class="form-control" id="order_edit" /></div>
    
</form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button id="btn_simpan_edit"type="button" class="btn btn-primary">Simpan perubahan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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
    $('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
    $('.js-example-basic-single').select2();
    $('#tbl_menu').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    });
    
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

$('body').on('click','#btn_edit',function(){
        
        var row = $(this).closest("tr");    // Find the row
        var id = row.find(".id").text(); // Find the text
        var id_modul = row.find("#modul").attr('id_modul'); // Find the text
        var nama_menu = row.find('.nama').text();
        var icon  = row.find('.icon').text();
        var order = row.find('.order').text();
        
        
        $('#id_edit').val(id);
        $('#modul_edit').val(id_modul).trigger('change.select2');
        $('#nama_edit').val(nama_menu);
        $('#icon_edit').val(icon);
        $('#order_edit').val(order);
       
});

$('body').on('click','#btn_hapus',function(){
        var row = $(this).closest("tr");    // Find the row
        var id_menu = row.find(".id").text(); // Find the text
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.alert('Confirmed!');
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url();?>index.php/modul_admin/menu/aksi_hapus_menu",
                        dataType : "JSON",
                        data : {id_menu:id_menu},
                        success: function(data){

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

$('#btn_simpan_edit').on('click',function(){
            var id_menu = $('#id_edit').val();
            var id_modul = $('#modul_edit').val();
            var nama_menu = $('#nama_edit').val();
            var icon_menu  = $('#icon_edit').val();
            var order_menu= $('#order_edit').val();

            if(id_menu==""||id_modul==""||nama_menu==""||icon_menu ==""||order_menu=="")
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
                url  : "<?php echo base_url();?>index.php/modul_admin/menu/aksi_edit_menu",
                dataType : "JSON",
                data : {id_menu:id_menu,id_modul:id_modul,nama_menu:nama_menu,icon_menu:icon_menu,order_menu},
                success: function(data){
                    $.alert('Edit berhasil...');
                    $('#modal-default').modal('hide');
                    
                    location.reload();
                    setDefaultActive();
                    
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