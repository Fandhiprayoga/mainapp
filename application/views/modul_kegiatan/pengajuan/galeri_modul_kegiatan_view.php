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
        Galeri
        <small>Halaman upload galeri</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list galeri</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List galeri</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
                <div class="table-responsive">
                <table class="table" id="tbl_pengajuan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>DETAIL</th>
                            <th>NAMA KEGIATAN</th>
                            <th>KATEGORI</th>
                            <th>TGL_PENGAJUAN</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($data_galeri))
                            {
                                        $i=1;
                                foreach($data_galeri as $a)
                                {   
                                            $b=$this->db->query("select * from pengajuan where id_pengajuan='".$a['id_pengajuan']."' and status_lpj='1'")->result_array();
                                    echo        "<tr data-waktu_kegiatan='".$b[0]['waktu_kegiatan']."' data-tempat_kegiatan='".$b[0]['tempat_kegiatan']."' data-rincian_kegiatan='".$b[0]['rincian_kegiatan']."' data-pj_kegiatan='".$b[0]['pj_kegiatan']."'>
                                                            <td id_pengajuan='".$b[0]['id_pengajuan']."' id='id_pengajuan'>".$i."</td>
                                                            <td><a class='btn btn-default' class='btn' id='btn_detail'><i class='fas fa-plus-square'></i></a></td>
                                                            <td>".$b[0]['nama_pengajuan']."</td>
                                                            <td>".$b[0]['kategori_pengajuan']."</td>
                                                            <td>".$b[0]['tgl_pengajuan']."</td>";
                                                            
                                                           
                                                                        if($b[0]['galeri_kegiatan']=="")
                                                                        {
                                                                                    echo        '<td> <form method="post" id="form_galeri" action="aksi_upload_galeri" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="id_pengajuan" value="'.$b[0]['id_pengajuan'].'">
                                                                                                <label class="btn btn-default btn-file">
                                                                                                            Upload ... <input accept=".zip, .rar" name="galeri" id="galeri" type="file" style="display: none;">
                                                                                                </label>
                                                                                    </form></td>';
                                                                        }
                                                                        else
                                                                        {
                                                                                    echo '    <td>   <a href="'.base_url().'assets/upload/galeri/'.$b[0]['galeri_kegiatan'].'" class="btn btn-default">Download galeri</a>
                                                                                                <a href="aksi_hapus_galeri/'.$b[0]['id_pengajuan'].'/'.$b[0]['galeri_kegiatan'].'" class="btn btn-default">Hapus galeri</a>
                                                                                                </td>';     
                                                                        }
                                                                        
                                                            

                                    
                                    echo        "</tr>";
                                    $i++;
                                }
                            }
                            else
                            {
                                echo            '<tr>
                                                            <td colspan="8" align="center" class="warning">TIDAK ADA DATA YANG BISA DITAMPILKAN</td>
                                                           

                                                </tr>';
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
    var table=$('#tbl_pengajuan').DataTable({
       'paging'      : true,
       'lengthChange': true,
       'searching'   : true,
       'ordering'    : false,
       'info'        : true,
       'autoWidth'   : true,
       'destroy': true,
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

$("body").on("change","#galeri", function () {
        var tr = $(this).closest('tr');
	    tr.find("#form_galeri").submit();
    //$("#form_galeri").submit();
});


// $("#galeri").change(function (e) { 
//     e.preventDefault();
//     $("#form_galeri").submit();
// });

function format(a,b,c,d) {
	    return '<tr><td style="width:200px;">waktu kegiatan</td><td style="width:20px;">:</td><td> '+a+'</td></tr>'+
                        '<tr><td style="width:200px;">tempat kegiatan</td><td style="width:20px;">:</td><td> '+b+'</td></tr>'+
                        '<tr><td style="width:200px;">rincian kegiatan</td><td style="width:20px;">:</td><td> '+c+'</td></tr>'+
                        '<tr><td style="width:200px;">pj kegiatan</td><td style="width:20px;">:</td><td> '+d+'</td></tr>';
};


    var table=$('#tbl_pengajuan').DataTable({
       'paging'      : true,
       'lengthChange': true,
       'searching'   : true,
       'ordering'    : false,
       'info'        : true,
       'autoWidth'   : true,
       'destroy': true,
     });
$("tbody").on("click","#btn_detail", function () {
        var tr = $(this).closest('tr');
	    var row = table.row(tr);

	    if (row.child.isShown()) {
	        // This row is already open - close it
	        row.child.hide();
	        tr.removeClass('shown');
	    } else {
	        // Open this row
	        row.child(format(tr.data('waktu_kegiatan'),tr.data('tempat_kegiatan'),tr.data('rincian_kegiatan'),tr.data('pj_kegiatan'))).show();
	        tr.addClass('shown');
	    }
});
</script>