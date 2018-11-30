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
        acc proposal
        <small>Halaman acc proposal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list acc proposal</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List acc proposal</h3>

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
                            <th>STATUS PROPOSAL</th>
                            <th>KETERANGAN REVIEW PROPOSAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($data_kegiatan_yatim))
                            {
                                        $i=1;
                                foreach($data_kegiatan_yatim as $a)
                                {   
                                    echo        "<tr data-waktu_kegiatan='".$a['waktu_kegiatan']."' data-tempat_kegiatan='".$a['tempat_kegiatan']."' data-rincian_kegiatan='".$a['rincian_kegiatan']."' data-pj_kegiatan='".$a['pj_kegiatan']."'>
                                    <td id_pengajuan='".$a['id_pengajuan']."' id='id_pengajuan'>".$i."</td>
                                    <td><a class='btn' id='btn_detail'><i class='fas fa-plus-square'></i></a></td>
                                    <td>".$a['nama_pengajuan']."</td>
                                    <td>".$a['kategori_pengajuan']."</td>
                                    <td>".$a['tgl_pengajuan']."</td>";
            echo                    "<td>
                                                <select name='' id='status_proposal' class='form-control'>
                                                            <option value=''>-- Select One --</option>";
                                                            
                                                                        if($a['status_proposal']==1 and $a['tgl_review_proposal_kegiatan']!="")
                                                                        {
                                                                                    echo "<option selected value='1'>DITERIMA</option>";
                                                                        }
                                                                        else
                                                                        {
                                                                                    echo "<option  value='1'>DITERIMA</option>";     
                                                                        }
                                                                        
                                                                        if($a['status_proposal']==0 and $a['tgl_review_proposal_kegiatan']!="")
                                                                        {
                                                                                    echo   "<option selected value='0'>DITOLAK</option>";
                                                                        }
                                                                        else
                                                                        {
                                                                                    echo   "<option value='0'>DITOLAK</option>";
                                                                        }

                                                            
                                                            
            echo                                "</select>
                                    </td>";
                                    
            echo                    "<td><textarea  class='form-control' id='ket_review_proposal' cols='20' rows='2'>".$a['ket_review_proposal_kegiatan']."</textarea></td>";
                                    
            echo                    "<td><a href='".base_url().'assets/upload/proposal/'.$a['proposal_kegiatan']."' class='btn btn-block btn-warning'>LIHAT</a><button class='btn btn-block btn-success' id='btn_simpan'>SIMPAN</button></td>";

            
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

$("#proposal").change(function (e) { 
    e.preventDefault();
    $("#form_proposal").submit();
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

$("body").on("click","#btn_simpan", function () {
    var row = $(this).closest("tr");    // Find the row
    var id_pengajuan = row.find("#id_pengajuan").attr('id_pengajuan'); // Find the text
    var status_proposal= row.find("#status_proposal").val();
    var ket_review_proposal= row.find("#ket_review_proposal").val();
    var tgl_review_proposal="<?php echo date('Y-m-d');?>";
    //$.alert(id_pengajuan+status_pengajuan+ket_review_pengajuan+tgl_review_pengajuan);
    $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin  ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_kegiatan/acc_proposal/aksi_edit_acc_proposal",
                        data: {id_pengajuan:id_pengajuan, status_proposal:status_proposal, ket_review_proposal:ket_review_proposal, tgl_review_proposal:tgl_review_proposal},
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            if(data>0)
                            {
                                $.alert('simpan berhasil');
                                location.reload();
                            }
                            else
                            {
                                $.alert('simpan gagal');
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
</script>