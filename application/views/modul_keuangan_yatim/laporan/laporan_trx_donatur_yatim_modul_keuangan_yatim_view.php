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
        Laporan transaksi donatur
        <small>Halaman laporan transaksi donatur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">Laporan transaksi donatur</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan transaksi donatur</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <span><label for="">Filter Tanggal transaksi :</label>    
                        <table>
                                    <tr>
                                                <td>
                                                            <input type="date" name="" id="tgl_awal" class="form-control" value="" required="required" title="">
                                                </td>
                                                <td>&nbsp;-&nbsp;</td>
                                                <td>
                                                            <input type="date" name="" id="tgl_akhir" class="form-control" value="" required="required" title="">
                                                </td>
                                    </tr>
                        </table>
            </span>
            <br>
            <br>
                <a class="btn btn-default" id="btn_tampil">TAMPIL</a>
                <a class="btn btn-default" id="btn_cetak" >CETAK</a>
            <br>
            <hr>
                <div class="table-responsive">
                <table class="table" id="tbl_laporan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA DONATUR</th>
                            <th>TELP DONATUR</th>
                            <th>ALAMAT DONATUR</th>
                            <th>TGL DONASI</th>
                            <th>NOMINAL</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        
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
    $('.js-example-basic-single').select2();
    // var table=$('#tbl_laporan').DataTable({
    //    'paging'      : true,
    //    'lengthChange': true,
    //    'searching'   : true,
    //    'ordering'    : false,
    //    'info'        : true,
    //    'autoWidth'   : true,
    //    'destroy': true,
    //  });
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


// function format(a,b,c,d) {
// 	    return '<tr><td style="width:200px;">waktu kegiatan</td><td style="width:20px;">:</td><td> '+a+'</td></tr>'+
//                         '<tr><td style="width:200px;">tempat kegiatan</td><td style="width:20px;">:</td><td> '+b+'</td></tr>'+
//                         '<tr><td style="width:200px;">rincian kegiatan</td><td style="width:20px;">:</td><td> '+c+'</td></tr>'+
//                         '<tr><td style="width:200px;">pj kegiatan</td><td style="width:20px;">:</td><td> '+d+'</td></tr>';
// };


    

// $("tbody").on("click","#btn_detail", function () {
//         var tr = $(this).closest('tr');
// 	    var row = table.row(tr);

// 	    if (row.child.isShown()) {
// 	        // This row is already open - close it
// 	        row.child.hide();
// 	        tr.removeClass('shown');
// 	    } 
//         else {
// 	        // Open this row
// 	        row.child(format(tr.data('waktu_kegiatan'),tr.data('tempat_kegiatan'),tr.data('rincian_kegiatan'),tr.data('pj_kegiatan'))).show();
// 	        tr.addClass('shown');
// 	    }
// });

$("#btn_tampil").click(function (e) { 
            e.preventDefault();
            //alert('tampil');
            var tgl_awal= $("#tgl_awal").val();
            var tgl_akhir=$("#tgl_akhir").val();
            //lert(kegiatan+tgl_awal+tgl_akhir);

            if(tgl_awal == "" || tgl_akhir=="")
            {
                $.alert('pilih filter tgl awal dan tgl akhir terlebih dahulu !');
            }
            else if(tgl_awal>tgl_akhir)
            {
                $.alert('setting filter tanggal salah !');
            }
            else
            {
                $.ajax({
                        type: "post",
                        url: "<?php echo base_url();?>index.php/modul_keuangan_yatim/laporan/tampil_donatur",
                        data: {tgl_awal:tgl_awal,tgl_akhir:tgl_akhir},
                        dataType: "json",
                        success: function (data) {
                                    console.log(data);
                                    var html = '';
                                    var i;
                                    if(data.length>0)
                                    {
                                        for(i=0;i<data.length;i++)
                                        {
                                            html += "<tr>"+
                                                        "<td id_pengajuan='"+data[i].id_trx_donatur_yatim+"' id='id_pengajuan'>"+(i+1)+"</td>"+
                                                        "<td>"+data[i].nama_donatur+"</td>"+
                                                        "<td>"+data[i].telp_donatur+"</td>"+
                                                        "<td>"+data[i].alamat_donatur+"</td>"+
                                                        "<td>"+data[i].tgl_trx_donatur_yatim+"</td>"+
                                                        "<td>Rp."+data[i].nominal_trx_donatur_yatim+"</td>"+
                                                    "</tr>";
                                        }
                                        html +="<tr class='warning'><td colspan='5' align='center'><b>TOTAL</b></td><td>Rp."+data[0].total+"</td></tr>";
                                    }
                                    else
                                    {
                                        html+="<tr class='warning'><td colspan='8' align='center'>TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>";
                                    }
                                    
                                    $('#show_data').html(html);
                        }, error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);
                        }        
                });
            }
            
});
$("#btn_cetak").click(function (e) { 
            e.preventDefault();
            var tgl_awal= $("#tgl_awal").val();
            var tgl_akhir=$("#tgl_akhir").val();


            if(tgl_awal == "" || tgl_akhir=="")
            {
                $.alert('pilih filter tgl awal dan tgl akhir terlebih dahulu !');
            }
            else if(tgl_awal>tgl_akhir)
            {
                $.alert('setting filter tanggal salah !');
            }
            else
            { 
                location.href="<?php echo base_url();?>index.php/modul_keuangan_yatim/laporan/cetak_laporan_donatur/"+tgl_awal+"/"+tgl_akhir;
            }


});
</script>