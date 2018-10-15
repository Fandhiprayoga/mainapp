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
        submenu
        <small>Halaman kelola submenu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list submenu</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List submenu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_admin/submenu/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah submenu</a>
                
                <div class="table-responsive">
                <table class="table" id="tbl_submenu" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID SUBMENU</th>
                            <th>MENU | (MODUL)</th>
                            <th>NAMA SUBMENU</th>
                            <th>LINK SUBMENU</th>
                            <th>ORDER</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            if(count($data_submenu))
                            {
                                foreach($data_submenu as $list)
                                {
                                    $data_modul=$this->db->query('select nama_modul from modul where id="'.$list['id_modul'].'"')->result_array();
                                    $data_menu=$this->db->query('select nama_menu from menu where id="'.$list['id_menu'].'"')->result_array();
                                    echo '<tr>';
                                    echo '<td class="id">'.$list['id'].'</td>';
                                    echo '<td id="menu" id_menu="'.$list['id_menu'].'">';
                                    echo  $data_menu[0]['nama_menu'].' | ('.$data_modul[0]['nama_modul'].')';
                                    echo '</td>';
                                    
                                    echo '<td class="nama">'.$list['nama_submenu'].'</td>';
                                    echo '<td class="link">'.$list['link_submenu'].'</td>';
                                    echo '<td class="order">'.$list['order_submenu'].'</td>';
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
                <h4 class="modal-title">Edit submenu</h4>
              </div>
              <div class="modal-body">
              <form>
    <div class="form-group">
        <p class="help-block">Id submenu</p><input type="text" readonly class="form-control" id="id_edit" /></div>
    <div class="form-group">
        <p class="help-block">Menu</p>
        <select class="form-control js-example-basic-single" id="menu_edit" style="width:100%;">
        <?php 
            $data_modul=$this->db->query('select * from modul')->result_array();
            $d_menu=$this->db->query('select * from menu order by order_menu asc')->result_array();
            if(count($d_menu))
            {
                foreach($d_menu as $l)
                {
                    foreach($data_modul as $a)
                    {
                        if($a['id']==$l['id_modul'])
                        {
                            echo '<option value="'.$l['id'].'">'.$l['nama_menu'].' | ('.$a['nama_modul'].')</option>';
                        }
                    }
                    
                }
            }
        ?>
          </select>
    </div>
    <div class="form-group">
        <p class="help-block">Nama submenu</p><input type="text" class="form-control" id="nama_edit" /></div>
    <div class="form-group">
        <p class="help-block">Link submenu</p><input type="text" class="form-control" id="link_edit" /></div>
    <div class="form-group">
        <p class="help-block">Order submenu</p><input type="number" class="form-control" id="order_edit" /></div>
    
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
    //$('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
    $('.js-example-basic-single').select2();
    $('#tbl_submenu').DataTable({
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

            //console.log($('ul  li a[href="'+url+'"]').parent().parent().parent());
}           

setDefaultActive();

$('body').on('click','#btn_edit',function(){
        
        var row = $(this).closest("tr");    // Find the row
        var id = row.find(".id").text(); // Find the text
        var id_menu = row.find("#menu").attr('id_menu'); // Find the text
        var nama_submenu = row.find('.nama').text();
        var link_submenu  = row.find('.link').text();
        var order = row.find('.order').text();
        
        
        $('#id_edit').val(id);
        $('#menu_edit').val(id_menu).trigger('change.select2');;
        $('#nama_edit').val(nama_submenu);
        $('#link_edit').val(link_submenu);
        $('#order_edit').val(order);
       
});

$('body').on('click','#btn_hapus',function(){
        var row = $(this).closest("tr");    // Find the row
        var id_submenu = row.find(".id").text(); // Find the text
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
                        url  : "<?php echo base_url();?>index.php/modul_admin/submenu/aksi_hapus_submenu",
                        dataType : "JSON",
                        data : {id_submenu:id_submenu},
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
            var id_submenu = $('#id_edit').val();
            var id_menu = $('#menu_edit').val();
            var nama_submenu = $('#nama_edit').val();
            var link_submenu  = $('#link_edit').val();
            var order_submenu= $('#order_edit').val();

            if(id_submenu==""||id_menu==""||nama_submenu==""||link_submenu ==""||order_submenu=="")
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
                url  : "<?php echo base_url();?>index.php/modul_admin/submenu/aksi_edit_submenu",
                dataType : "JSON",
                data : {id_submenu:id_submenu,id_menu:id_menu,nama_submenu:nama_submenu,link_submenu:link_submenu,order_submenu},
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