<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Modul
        <small>Halaman kelola modul</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list Modul</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List Modul</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_admin/modul/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah Modul</a>
                
                <div class="table-responsive">
                <table class="table" id="tbl_modul" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID MODUL</th>
                            <th>NAMA MODUL</th>
                            <th>ICON</th>
                            <th>LINK MODUL</th>
                            <th>ORDER</th>
                            <th>AKTIF</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            if(count($data_modul))
                            {
                                foreach($data_modul as $list)
                                {
                                    echo '<tr>';
                                    echo '<td class="id">'.$list['id'].'</td>';
                                    echo '<td class="nama">'.$list['nama_modul'].'</td>';
                                    echo '<td class="icon"><i class="'.$list['icon'].'" style="font-size:33px;"></i><br>'.$list['icon'].'</td>';
                                    echo '<td class="link">'.$list['link_modul'].'</td>';
                                    echo '<td class="order">'.$list['order_modul'].'</td>';
                                    echo '<td class="status">'.$list['status_aktif'].'</td>';
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
                <h4 class="modal-title">Edit Modul</h4>
              </div>
              <div class="modal-body">
              <form>
    <div class="form-group">
        <p class="help-block">Id Model</p><input type="text" readonly required class="form-control" id="id_edit" /></div>
    <div class="form-group">
        <p class="help-block">Nama Modul</p><input type="text" required  class="form-control" id="nama_edit" /></div>
    <div class="form-group">
        <p class="help-block">Link Modul</p><input type="text" required  class="form-control" id="link_edit" /></div>
    <div class="form-group">
        <p class="help-block">Icon Modul</p><input type="text" required  class="form-control" id="icon_edit" /></div>
    <div class="form-group">
        <p class="help-block">Order Modul</p><input type="number" required  class="form-control" id="order_edit" /></div>
    <div class="form-group">
        <p class="help-block">Status Aktif Modul</p><select id="status_edit" required  class="form-control"><option value="Aktif" selected>Aktif</option><option value="Tidak">Tidak</option></select></div>
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
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>
<script>
$(document).ready(function() {
    $('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
    $('#tbl_modul').DataTable({
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
        var nama_modul = row.find('.nama').text();
        var link_modul = row.find('.link').text();
        var icon  = row.find('.icon').text();
        var order = row.find('.order').text();
        var status_aktif  = row.find('.status').text();

        $('#id_edit').val(id);
        $('#nama_edit').val(nama_modul);
        $('#link_edit').val(link_modul);
        $('#icon_edit').val(icon);
        $('#order_edit').val(order);
        $('#status_edit').val(status_aktif );
       
});

$('body').on('click','#btn_hapus',function(){
    var row = $(this).closest("tr");    // Find the row
    var id_modul = row.find(".id").text(); // Find the text
    
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
                url  : "<?php echo base_url();?>index.php/modul_admin/modul/aksi_hapus_modul",
                dataType : "JSON",
                data : {id_modul:id_modul},
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
            var id_modul = $('#id_edit').val();
            var nama_modul = $('#nama_edit').val();
            var link_modul = $('#link_edit').val();
            var icon  = $('#icon_edit').val();
            var order = $('#order_edit').val();
            var status_aktif  = $('#status_edit').val();

            if(id_modul==""||nama_modul==""||link_modul==""||icon==""||order ==""||status_aktif=="")
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
                url  : "<?php echo base_url();?>index.php/modul_admin/modul/aksi_edit_modul",
                dataType : "JSON",
                data : {id_modul:id_modul,nama_modul:nama_modul,link_modul:link_modul,icon:icon ,order:order ,status_aktif:status_aktif},
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