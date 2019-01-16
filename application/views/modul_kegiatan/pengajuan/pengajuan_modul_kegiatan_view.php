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
        pengajuan kegiatan
        <small>Halaman kelola pengajuan kegiatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list pengajuan kegiatan</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List pengajuan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <a href="<?php echo base_url();?>index.php/modul_kegiatan/pengajuan/tambah" style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah pengajuan kegiatan</a>
                <div class="table-responsive">
                <table class="table" id="tbl_pengajuan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>DETAIL</th>
                            <th>NAMA KEGIATAN</th>
                            <th>KATEGORI</th>
                            <th>TGL_PENGAJUAN</th>
                            <th>STATUS ACC</th>
                            <th>KETERANGAN ACC</th>
                            <th>STATUS VERIFIKASI</th>
                            <th>KETERANGAN VERIFIKASI</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($data_pengajuan))
                            {
                                        $i=1;
                                foreach($data_pengajuan as $a)
                                {   
                                    echo        "<tr data-waktu_kegiatan='".$a['waktu_kegiatan']."' data-tempat_kegiatan='".$a['tempat_kegiatan']."' data-rincian_kegiatan='".$a['rincian_kegiatan']."' data-pj_kegiatan='".$a['pj_kegiatan']."'>
                                                            <td id_pengajuan='".$a['id_pengajuan']."' id='id_pengajuan'>".$i."</td>
                                                            <td><a class='btn' id='btn_detail'><i class='fas fa-plus-square'></i></a></td>
                                                            <td>".$a['nama_pengajuan']."</td>
                                                            <td>".$a['kategori_pengajuan']."</td>
                                                            <td>".$a['tgl_pengajuan']."</td>";
                                                            // STATUS PENGAJUAN
                                                            if($a['tgl_review_pengajuan_kegiatan']!="")
                                                            {
                                                                        if($a['status_pengajuan']==1)
                                                                        {
                                                                                    echo "<td class='success'>DITERIMA</td>";
                                                                        }
                                                                        else
                                                                        {
                                                                                    echo "<td class='danger'>DITOLAK</td>";
                                                                        }
                                                            }
                                                            else
                                                            {
                                                                        echo "<td>BLM DIREVIEW</td>";
                                                            }
                                                            
                                                            if($a['tgl_review_pengajuan_kegiatan']!="")
                                                            {
                                                                       echo "<td>".$a['ket_review_pengajuan_kegiatan']." (direview tgl : ".$a['tgl_review_pengajuan_kegiatan'].")</td>";
                                                            }
                                                            else
                                                            {
                                                                        echo "<td>BLM DIREVIEW</td>";
                                                            }
                                                            
                                                            // STATUS REVIEW KEGIATAN
                                                            if($a['tgl_verifikasi_kegiatan']!="")
                                                            {
                                                                        if($a['status_verifikasi_kegiatan']==1)
                                                                        {
                                                                                    echo "<td class='success'>DITERIMA</td>";
                                                                        }
                                                                        else
                                                                        {
                                                                                    echo "<td class='danger'>DITOLAK</td>";
                                                                        }
                                                            }
                                                            else
                                                            {
                                                                        echo "<td>BLM DIREVIEW</td>";
                                                            }
                                                            
                                                            if($a['tgl_verifikasi_kegiatan']!="")
                                                            {
                                                                       echo "<td>".$a['ket_verifikasi_kegiatan']." (direview tgl : ".$a['tgl_verifikasi_kegiatan'].")</td>";
                                                            }
                                                            else
                                                            {
                                                                        echo "<td>BLM DIREVIEW</td>";
                                                            }

                                                            if($a['tgl_review_pengajuan_kegiatan']!="")
                                                            {
                                                                        echo   "<td><button class='btn btn-block btn-danger' id='' disabled>HAPUS</button></td>";
                                                            }
                                                            else
                                                            {
                                                                        echo   "<td><button class='btn btn-block btn-danger' id='btn_hapus'>HAPUS</button></td>";
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
    $('#tbl_pengajuan').DataTable({
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

$("body").on("click","#btn_hapus", function () {
    var row = $(this).closest("tr");    // Find the row
    var id_pengajuan = row.find("#id_pengajuan").attr('id_pengajuan'); // Find the text
    // $.alert(id_pengajuan);
    $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_kegiatan/pengajuan/aksi_hapus_pengajuan",
                        data: {id_pengajuan:id_pengajuan},
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            if(data>0)
                            {
                                $.alert('hapus berhasil');
                                location.reload();
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