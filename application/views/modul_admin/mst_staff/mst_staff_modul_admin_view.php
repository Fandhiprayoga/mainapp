<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/select2/dist/css/select2.min.css">
<link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
<style>
    th {
       vertical-align:middle !important;
       align:center !important; 
    }
    td {
        vertical-align:middle !important;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Manajemen data ustadz & staff
        <small>Halaman kelola ustadz & staff</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list data ustadz & staff</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List ustadz & staff</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_staff/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah data staff</a>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_staff/cetak" style="margin-bottom:10px;"class="btn btn-danger pull-right" type="button" id="btn_cetak"><i class="fas fa-print"></i> Cetak</a>
        
            <br>
          
            
                <div class="table-responsive">
                <table class="table" id="tbl_mst_staff" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID staff</th>
                            <th>ID anggota organisasi</th>
                            <th>FOTO anggota</th>
                            <th>NAMA LENGKAP</th>
                            <th>JENIS KELAMIN</th>
                            <th>TTL</th>
                            <th>JABATAN STAFF</th>
                            <th>ALAMAT</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            
                            if(count($data_mst_staff))
                            {
                                
                                foreach($data_mst_staff as $list)
                                {
                                    $a=$this->db->query("select * from mst_organisasi where id_organisasi='".$list['id_organisasi']."'")->result_array(); 
                                    echo '<tr>';
                                    echo '<td class="id_staff">'.$list['id_staff'].'</td>';
                                    echo '<td class="id_organisasi">'.$list['id_organisasi'].'</td>';
                                    if($a[0]['foto_organisasi']=="")
                                    {
                                        echo '<td class="foto" file_foto="'.$a[0]['foto_organisasi'].'"><img style="width:100px;height:100px;" src="'.base_url().'/assets/upload/index.png"></td>';
                                    }
                                    else
                                    {
                                        echo '<td class="foto" file_foto="'.$a[0]['foto_organisasi'].'"><img style="width:100px;height:100px;" src="'.base_url().'/assets/upload/'.$a[0]['foto_organisasi'].'"></td>';
                                    }
                                    
                                    echo '<td class="nama_staff">'.$a[0]['nama_organisasi'].'</td>';
                                    echo '<td class="jk_staff">'.$a[0]['jk_organisasi'].'</td>';
                                    echo '<td class="ttl">'.$a[0]['t_organisasi'].', '.$a[0]['tl_organisasi'].'</td>';
                                    echo '<td class="jabatan_staff">'.$list['jabatan_staff'].'</td>';
                                    echo '<td class="alamat_staff">'.$a[0]['alamat_organisasi'].'</td>';
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
                <h4 class="modal-title">Edit staff</h4>
              </div>
        <div class="modal-body">
    <form id="submit_edit">
    <div class="form-group">
        <p class="help-block">ID staff</p><input name="id" type="text" readonly class="form-control" id="id_edit" /></div>
    
    <div class="form-group">
        <p class="help-block">PILIH ANGGOTA</p>
        <select name="id_organisasi" id="organisasi_edit" class="form-control js-example-basic-single" >
            <?php
                $a=$this->db->query('select * from mst_organisasi')->result_array();
                if(count($a))
                {
                    foreach($a as $b)
                    {
                        echo '<option value="'.$b['id_organisasi'].'">'.$b['nama_organisasi'].' ('.$b['jabatan_organisasi'].')</option>';
                    }
                }
            ?>
        </select> 
    </div>

   <div class="form-group">
        <p class="help-block">JABATAN STAFF</p>
        <select name="jabatan" id="jabatan_edit" class="form-control" >
            <option value="SUPER ADMINISTRATOR">SUPER ADMINISTRATOR</option>
            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
            <option value="USTADZ">USTADZ</option>
            <option value="SYAFII">SYAFII</option>
            <option value="NASI">NASI</option>
            <option value="MIA">MIA</option>
            <option value="FARMASI">FARMASI</option>
            <option value="MAHIL">MAHIL</option>
        </select> 
    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button id="btn_simpan_edit" type="submit" class="btn btn-primary">Simpan perubahan</button>
              </div>
              </form>
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
    $('#tbl_mst_staff').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : false,
     'info'        : true,
     'autoWidth'   : true
    });
    $('#import_row').hide();
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
        
        var row             = $(this).closest("tr");    // Find the row
        var id_staff        = row.find(".id_staff").text(); // Find the text
        var id_organisasi      = row.find(".id_organisasi").text(); // Find the text
        var jabatan_staff      = row.find(".jabatan_staff").text(); // Find the text
        
        // alert(id_staff+' '+nama_staff+' '+jk_staff+' '+jabatan_staff+' '+t_staff +' '+tl_staff );
        $('#id_edit').val(id_staff);
        $('#organisasi_edit').val(id_organisasi);
        $('#jabatan_edit').val(jabatan_staff);
       
});


$('body').on('click','#btn_hapus',function(){
        var row = $(this).closest("tr");    // Find the row
        var id_mst_staff = row.find(".id_staff").text(); // Find the text
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url();?>index.php/modul_admin/mst_staff/aksi_hapus_mst_staff",
                        dataType : "JSON",
                        data : {id_mst_staff:id_mst_staff},
                        success: function(data){
                            $.alert('Data terhapus !');
                            console.log(data);
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

$('#submit_edit').submit(function(e){
    e.preventDefault(); 
    $.ajax({
                     url:'<?php echo base_url();?>index.php/modul_admin/mst_staff/aksi_edit_mst_staff',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          $.alert('Tersimpan');
                          console.log(data);
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

// $('#submit_import').submit(function(e){
//     e.preventDefault(); 
//     $.ajax({
//                      url:'<?php echo base_url();?>index.php/modul_admin/mst_staff/import',
//                      type:"post",
//                      data:new FormData(this),
//                      processData:false,
//                      contentType:false,
//                      cache:false,
//                      async:false,
//                       success: function(data){
//                           $.alert('Tersimpan');
//                           console.log(data);
//                             location.reload();
//                         },
//                         error: function(xhr, textStatus, error) {
//                             console.log(xhr.responseText);
//                             console.log(xhr.statusText);
//                             console.log(textStatus);
//                             console.log(error);

//                         }
//                  });
        
// });
</script>