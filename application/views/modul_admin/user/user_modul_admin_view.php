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
        user
        <small>Halaman kelola user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list user</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List user</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_admin/user/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah user</a>
                
                <div class="table-responsive">
                <table class="table" id="tbl_user" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA LENGKAP KARYAWAN</th>
                            <th>BAGIAN</th>
                            <th>STATUS USER</th>
                            <th>GROUP USER</th>
                            <th>PASSWORD</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                            $data_group_user=$this->db->query('select * from group_user')->result_array();
                            if(count($data_user))
                            {
                                foreach($data_user as $list)
                                {
                                    echo '<tr>';
                                    echo '<td class="id">'.$list['id_user'].'</td>';
                                    echo '<td class="nama">'.$list['nama_user'].'</td>';
                                    echo '<td class="bagian">'.$list['bagian_user'].'</td>';
                                    echo '<td class="status">'.$list['status_user'].'</td>';

                                    echo '<td class="group">';
                                    echo '<select class="form-control"  id="group" disabled style="width:100%;">';
                                    foreach($data_group_user as $d)
                                    {
                                        if($d['id_group_user']==$list['group_user'])
                                        {
                                            echo '<option value="'.$list['group_user'].'">'.$d['nama_group_user'].'</option>';
                                        }
                                    }
                                    echo '</select>';
                                    echo '</td>';
                                    

                                    echo '<td>';
                                    echo    '<div class="input-group input-group-sm">';
                                    echo            '<input class="form-control" id="pass" type="password" value="'.$list['pass_user'].'" readonly>';
                                    echo                '<span class="input-group-btn">';
                                    echo                    '<a type="button" id="btn_lihat" class="btn btn-danger btn-flat"><i class="far fa-eye"></i></a>';
                                    echo               '</span>';
                                    echo        '</div>';
                                    echo '</td>';

                                    
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
                <h4 class="modal-title">Edit user</h4>
              </div>
              <div class="modal-body">
              <form>
    <div class="form-group">
        <p class="help-block">Id user</p><input type="text" readonly class="form-control" id="id_edit" /></div>
    <div class="form-group">
        <p class="help-block">Nama user</p><input type="text" class="form-control" id="nama_edit" /></div>
    <div class="form-group">
        <p class="help-block">Bagian user</p><input type="text" class="form-control" id="bagian_edit" /></div>
    <div class="form-group">
        <p class="help-block">Group user</p>
        <select class="form-control js-example-basic-single" id="group_edit" style="width:100%;">
        <?php 
            $data_gs=$this->db->query('select * from group_user')->result_array();
            if(count($data_gs))
            {
                foreach($data_gs as $l)
                {
                    echo '<option value="'.$l['id_group_user'].'">'.$l['nama_group_user'].'</option>';
                }
            }
        ?>
        </select>
    
    </div>
    <div class="form-group">
        <p class="help-block">Status</p>
        <select class="form-control" id="status_edit" style="width:100%;">
            <option value="Aktif">Aktif</option>
            <option value="Tidak">Tidak</option>
        </select>
    </div>
    
    <div class="form-group">
        <p class="help-block">Password</p>
        <div class="input-group input-group-sm">
                <input class="form-control" id="pass_edit" type="password">
                <span class="input-group-btn">
                    <a type="button" id="btn_lihat_edit" class="btn btn-danger btn-flat"><i class="far fa-eye"></i></a>
                </span>
        </div>
    </div>
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
    $('#tbl_user').DataTable({
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
        var nama_user = row.find('.nama').text();
        var bagian_user  = row.find('.bagian').text();
        var group_user  = row.find('#group').val();
        var pass_user  = row.find('#pass').val();
        var status_user  = row.find('.status').text();
        
        
        $('#id_edit').val(id);
        $('#nama_edit').val(nama_user);
        $('#bagian_edit').val(bagian_user);
        $('#group_edit').val(group_user).trigger('change.select2');
        $('#status_edit').val(status_user);
        $('#pass_edit').val(pass_user);
       
});

$('body').on('click','#btn_lihat',function(){
    var row = $(this).closest("tr");    // Find the row
    var type = row.find("#pass").attr('type'); // Find the text
    if(type=="password")
    {
        row.find("#pass").attr('type','text');
    }
    else
    {
        row.find("#pass").attr('type','password');
    }
});

$('body').on('click','#btn_lihat_edit',function(){
    var type= $('#pass_edit').attr('type');
    if(type=="password")
    {
        $('#pass_edit').attr('type','text');
    }
    else
    {
        $('#pass_edit').attr('type','password');
    }
});

$('body').on('click','#btn_hapus',function(){
        var row = $(this).closest("tr");    // Find the row
        var id_user = row.find(".id").text(); // Find the text
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
                        url  : "<?php echo base_url();?>index.php/modul_admin/user/aksi_hapus_user",
                        dataType : "JSON",
                        data : {id_user:id_user},
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
            var id_user = $('#id_edit').val().split(' ').join('');
            var nama_user = $('#nama_edit').val();
            var bagian_user  = $('#bagian_edit').val();
            var group_user  = $('#group_edit').val();
            var status_user  = $('#status_edit').val();
            var pass_user  = $('#pass_edit').val();
            
            

            if(id_user==""||nama_user==""||bagian_user ==""||group_user==""||status_user ==""||pass_user =="")
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Form tidak boleh ada yg kosong !'});
            }
            else if(pass_user.length>8)
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Panjang PASSWORD lebih dari 8!'});
                $('#pass_edit').parent().parent().addClass('has-error');
            }
            else
            {
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url();?>index.php/modul_admin/user/aksi_edit_user",
                dataType : "JSON",
                data : {id_user:id_user,nama_user:nama_user,bagian_user:bagian_user,group_user:group_user,status_user:status_user,pass_user:pass_user},
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