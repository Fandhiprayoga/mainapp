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
        Laporan Pertanggung Jawaban (LPJ)
        <small>Halaman upload LPJ</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list LPJ</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List LPJ</h3>

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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($data_lpj))
                            {
                                        $i=1;
                                foreach($data_lpj as $a)
                                {   
                                            $b=$this->db->query("select * from pengajuan where id_pengajuan='".$a['id_pengajuan']."'")->result_array();
                                    echo        "<tr data-waktu_kegiatan='".$b[0]['waktu_kegiatan']."' data-tempat_kegiatan='".$b[0]['tempat_kegiatan']."' data-rincian_kegiatan='".$b[0]['rincian_kegiatan']."' data-pj_kegiatan='".$b[0]['pj_kegiatan']."'>
                                                            <td id_pengajuan='".$b[0]['id_pengajuan']."' class='id_pengajuan' id='id_pengajuan'>".$i."</td>
                                                            <td><a class='btn btn-default' class='btn' id='btn_detail'><i class='fas fa-plus-square'></i></a></td>
                                                            <td>".$b[0]['nama_pengajuan']."</td>
                                                            <td>".$b[0]['kategori_pengajuan']."</td>
                                                            <td>".$b[0]['tgl_pengajuan']."</td>";
                                                            
                                                           
                                                                        if($b[0]['lpj_kegiatan']=="")
                                                                        {
                                                                                    echo        '<td> <form method="post" id="form_lpj" action="aksi_upload_lpj" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="id_pengajuan" value="'.$b[0]['id_pengajuan'].'">
                                                                                                <label class="btn btn-default btn-file">
                                                                                                            Upload ... <input accept=".pdf" name="lpj" id="lpj" type="file" style="display: none;">
                                                                                                </label>
                                                                                    </form></td>';
                                                                        }
                                                                        else
                                                                        {
                                                                            if($b[0]['status_lpj']==1)
                                                                            {
                                                                                echo '    <td>   <a href="'.base_url().'assets/upload/lpj/'.$b[0]['lpj_kegiatan'].'" class="btn btn-default">Lihat LPJ</a>
                                                                                                
                                                                                                </td>';   
                                                                            }
                                                                            else
                                                                            {
                                                                                echo '    <td>   <a href="'.base_url().'assets/upload/lpj/'.$b[0]['lpj_kegiatan'].'" class="btn btn-default">Lihat LPJ</a>
                                                                                                <a href="aksi_hapus_lpj/'.$b[0]['id_pengajuan'].'/'.$b[0]['lpj_kegiatan'].'" class="btn btn-default">Hapus LPJ</a>
                                                                                                </td>';     
                                                                            }
                                                                                    
                                                                        }
                                                                       
                                    echo                  '<td><a id="btn_history_modal" data-toggle="modal" href="#modal_history" class="btn btn-default">history</a></td>';
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
    

    <div class="modal fade" id="modal_history">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">History upload LPJ</h4>
                </div>
                <div class="modal-body">
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>FILE NAME</th>
                                <th>LAST DATE MODIFY</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="show_history">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a class='btn btn-default'>show</a></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
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

$("body").on("change","#lpj", function () {
        var tr = $(this).closest('tr');
	    tr.find("#form_lpj").submit();
    //$("#form_lpj").submit();
});


// $("#lpj").change(function (e) { 
//     e.preventDefault();
//     $("#form_lpj").submit();
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

$("body").on("click", "#btn_history_modal", function () {
    var row = $(this).closest("tr"); // Find the row
    var id_pengajuan = row
        .find(".id_pengajuan")
        .attr('id_pengajuan');

    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/modul_kegiatan/pengajuan/get_history_lpj",
        data: {
            id_pengajuan: id_pengajuan
        },
        dataType: "json",
        success: function (data) {
                // alert(JSON.stringify(data))
                var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td>'+data[i]['nama_file']+'</td>'+
                                '<td>'+data[i]['date_history']+'</td>'+
                                '<td><a href="<?php echo base_url();?>assets/upload/lpj/'+data[i]['nama_file']+'" class="btn btn-default">show</a></td>'+
                            '</tr>';
		            }
		            $('#show_history').html(html);
        },
        error: function (xhr, textStatus, error) {
            console.log(xhr.responseText);
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        }
    });
});
</script>