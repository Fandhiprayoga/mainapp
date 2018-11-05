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
        pendaftaran
        <small>Halaman kelola pendaftaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list pendaftaran</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List pendaftaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/tambah"style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah pendaftaran</a>
                
                <div class="table-responsive">
                <table class="table" id="tbl_pendaftaran" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID DAFTAR</th>
                            <th>NAMA LENGKAP</th>
                            <th>TTL</th>
                            <th>ALAMAT</th>
                            <th>TANGGAL DAFTAR</th>
                            <th>FOTO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($data_pendaftaran))
                            {
                                foreach($data_pendaftaran as $a)
                                {   
                                    echo '<tr>
                                            <td class="id_pendaftaran">'.$a['id_pendaftaran'].'</td>
                                            <td>'.$a['n_pendaftaran'].'</td> 
                                            <td>'.$a['t_pendaftaran'].', '.$a['tl_pendaftaran'].'</td> 
                                            <td>'.$a['alamat_pendaftaran'].'</td> 
                                            <td>'.$a['tgl_pendaftaran'].'</td>
                                            <td style="align:center;">';

                                            if($a['foto_pendaftaran']!="")
                                            {
                                                echo '
                                                <img width="100px"  src="'.base_url().'/assets/upload/santri/'.$a['foto_pendaftaran'].'" class="img-responsive" alt="Image">
                                                <a href="pendaftaran/aksi_hapus_foto/'.$a['id_pendaftaran'].'/'.$a['foto_pendaftaran'].'" >Hapus</a>
                                                ';
                                            }
                                            else
                                            {
                                                echo '<form method="post" id="form_foto" action="pendaftaran/aksi_upload_foto" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_pendaftaran" value="'.$a['id_pendaftaran'].'">
                                                        <label class="btn btn-default btn-file">
                                                            Upload ... <input accept=".jpg, .jpeg" name="foto" id="foto" type="file" style="display: none;">
                                                        </label>
                                                      </form>';
                                            }

                                    echo    '</td>
                                            <td>
                                                    <div class="btn-toolbar" style="width:100%;">
                                                        <div role="group" class="btn-group">
                                                            <a id="btn_detail" href="pendaftaran/detail/'.$a['id_pendaftaran'].'" class="btn btn-default" type="button"><i class="fa fa-list"></i></a>
                                                            <a id="btn_cetak" href="pendaftaran/cetak/'.$a['id_pendaftaran'].'" class="btn btn-warning" type="button"><i class="fas fa-print    "></i></a>
                                                            <button id="btn_hapus" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                                                        </div>
                                                    </div>
                                            </td> 
                                        </tr>';
                                }
                            }
                            else
                            {
                                echo '<tr><td colspan="5"align="center">TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>';
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
    // $('.js-example-basic-single').select2();
    $('#tbl_pendaftaran').DataTable({
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

$("body").on("click","#btn_hapus", function () {
    var row = $(this).closest("tr");    // Find the row
    var id_pendaftaran = row.find(".id_pendaftaran").text(); // Find the text
    // $.alert(id_pendaftaran);
    $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/aksi_hapus_pendaftaran",
                        data: {id_pendaftaran:id_pendaftaran},
                        dataType: "JSON",
                        success: function (data) {
                            if(data==true)
                            {
                                $.alert('hapus berhasil');
                                location.reload();
                            }
                            else if(data=='gagal hapus data')
                            {
                                $.alert('gagal hapus data2');
                            }
                            else
                            {
                                $.alert('hapus gagal');
                            }
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


$("#foto").change(function (e) { 
    e.preventDefault();
    $("#form_foto").submit();
});
</script>