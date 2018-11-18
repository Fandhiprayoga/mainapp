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
                Pembayaran Infaq
                <small>Halaman kelola Pemabayaran infaq calon santri</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="#">list bayar infaq</a></li>

         </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

         <div class="container-fluid">
                  <div class="box box-danger">
                           <div class="box-header with-border">
                                    <h3 class="box-title">List bayar infaq</h3>
            
                                    <div class="box-tools pull-right">
                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>  </button>
                                    </div>
                                    <!-- /.box-tools -->
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                                    <br>
                                    <div>

                                             <div>
                                                      <!-- Nav tabs -->
                                                      <ul class="nav nav-tabs">
                                                               <li ><a href="<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq#">INFAQ CALON SANTRI</a></li>
                                                               <li class="active"><a href="#">INFAQ SANTRI</a></li>
                                                               <li ><a href="<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/laporan#">CETAK LAPORAN</a></li>
                                                      </ul>
                                             </div>
                                             <br>
                    
                     
                <br>
                <hr>  
                
                

                                    </div class="container-fluid">
                                    <br>
                                    <select  style="width:100%;" name="" id="data_infaq" class="form-control js-example-basic-single" required="required">
                                            <option value="">PILIH PERIODE/TAHUN INFAQ</option>
                                            <?php
                                                $a=$this->db->query('select * from mst_infaq order by id_infaq desc')->result_array();
                                                if(count($a))
                                                {
                                                    foreach($a as $a)
                                                    {
                                                        echo '<option value="'.$a['id_infaq'].'">'.$a['nama_infaq'].' | nominal : '.$a['nominal_infaq'].'</option>';
                                                    }
                                                }
                                            ?>
                                    </select>
                                    <br>
                                    <br>
                                    <div class="table-responsive">
                                             <table class="table" id="tbl_bayar_infaq" class="table table-bordered table-hover">
                                                      <thead>
                                                               <tr>
                                                                        <th>NO</th>
                                                                        <th>ID SANTRI</th>
                                                                        <th>NAMA SANTRI</th>
                                                                        <th>DETAIL SANTRI</th>
                                                                        <th>STATUS BAYAR</th>
                                                               </tr>
                                                      </thead>
                                                      <tbody id="show_data">
                                                               <tr>
                                                                   <td align="center" colspan="5">tidak ada data</td>
                                                               </tr>
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
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal_edit'>Trigger modal</a> -->
<div class="modal fade" id="modal_edit">
         <div class="modal-dialog">
                  <div class="modal-content">
                           <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Edit data</h4>
                           </div>
                           <div class="modal-body">
                                    <form id="form_bayar_infaq">

                                             <input type="hidden" name="id_bayar_infaq_edit" id="id_bayar_infaq_edit"
                                                      class="form-control" REQUIRED readonly>

                                             <div class="form-group">
                                                      <label for="">NAMA/KET bayar_infaq</label>
                                                      <input type="text" class="form-control" id="nama_edit"
                                                               placeholder="nama / keterangan nominal bayar_infaq"
                                                               REQUIRED>
                                             </div>

                                             <div class="form-group">
                                                      <label for="">NOMINAL bayar_infaq</label>

                                                      <div class="input-group">
                                                               <div class="input-group-addon">Rp.</div>
                                                               <input type="text" class="form-control" id="nominal_edit"
                                                                        placeholder="Nominal bayar_infaq" REQUIRED>
                                                      </div>

                                             </div>
                                    </form>
                           </div>
                           <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btn_simpan_edit">Save changes</button>
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
         $(document).ready(function () {
                  //$('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
                  $('.js-example-basic-single').select2();

                //   $('#tbl_bayar_infaq').DataTable({
                //            'paging': true,
                //            'lengthChange': true,
                //            'searching': true,
                //            'ordering': false,
                //            'info': true,
                //            'autoWidth': true,
                //   });
                $("#filter_row").hide();
         });

         $("#btn_filter").click(function (e) { 
            e.preventDefault();
            $("#filter_row").toggle(1000);
        }); 

         var setDefaultActive = function () {
                  var url = localStorage.getItem("url");
                  $('a[href="' + url + '"]').parent().addClass('active');
                  $('a[href="' + url + '"]').parent().parent().parent().addClass('active');
                  $('a[href="' + url + '"]').parent().parent().show();
         }

         setDefaultActive();

         // $("body").on("click", "#btn_hapus", function () {
         //     var row = $(this).closest("tr"); // Find the row
         //     var id_bayar_infaq = row.find(".id_bayar_infaq").attr('id_bayar_infaq');

         //     // $.alert(id_bayar_infaq);
         //     $.confirm({
         //         theme: 'material',
         //         type: 'red',
         //         title: 'Confirm!',
         //         content: 'Anda yakin akan menghapusnya ?',
         //         buttons: {
         //             confirm: function () {
         //                 $.ajax({
         //                     type: "POST",
         //                     url: "<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/aksi_hapus_bayar_infaq",
         //                     data: {
         //                         id_bayar_infaq: id_bayar_infaq,
         //                     },
         //                     dataType: "JSON",
         //                     success: function (data) {
         //                         if (data) {
         //                             $.alert('hapus berhasil');
         //                             location.reload();
         //                         } else {
         //                             $.alert('hapus gagal');
         //                         }
         //                     },
         //                     error: function (xhr, textStatus, error) {
         //                         console.log(xhr.responseText);
         //                         console.log(xhr.statusText);
         //                         console.log(textStatus);
         //                         console.log(error);
         //                     }
         //                 });
         //             },
         //             cancel: function () {

         //             },
         //         }
         //     });

         // });

         // $('body').on('click', '#btn_edit', function () {
         //     var row = $(this).closest("tr"); // Find the row
         //     var id_bayar_infaq = row.find(".id_bayar_infaq").attr('id_bayar_infaq');
         //     var nama_bayar_infaq = row.find(".nama_bayar_infaq").text();
         //     var nominal_bayar_infaq = row.find(".nominal_bayar_infaq").text();
         //     $('#id_bayar_infaq_edit').val(id_bayar_infaq);
         //     $('#nama_edit').val(nama_bayar_infaq);
         //     $('#nominal_edit').val(nominal_bayar_infaq);
         // });

$('body').on('click', '#btn_bayar', function () {
    var row               = $(this).closest("tr"); // Find the row
    var id_pendaftaran    = row.find(".id_santri").text();
    var id_infaq          = $("#data_infaq").val();
    var status_infaq      = 1;
    $.confirm({
        theme: 'material',
        type: 'red',
        title: 'Confirm!',
        content: 'Anda yakin ?',
        buttons: {
            confirm: function () {
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/aksi_tambah_bayar_infaq_santri_lama",
                    data: {
                        id_pendaftaran: id_pendaftaran,
                        id_infaq: id_infaq,
                        status_bayar_infaq: status_infaq
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $.alert('simpan berhasil');
                            reset_table();
                        } else {
                            $.alert('simpan gagal');
                        }
                    },
                    error: function (xhr, textStatus, error) {
                        console.log(xhr.responseText);
                        console.log(xhr.statusText);
                        console.log(textStatus);
                        console.log(error);
                    }
                });
            },
            cancel: function () {}
        }
    });
});

         $('body').on('click', '#btn_cetak', function () {
                  // $.alert('ini cetak');
                  var row               = $(this).closest("tr"); // Find the row
                  var id_pendaftaran    = row.find(".id_santri").text();
                  var id_infaq          = $("#data_infaq").val();
                  location.href         = "<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/cetak/" +
                           id_pendaftaran + "/" + id_infaq;
         });
         
         function reset_table()
         {
            var id_infaq          = $("#data_infaq").val();
            $.ajax({
                 type       : "post",
                 url        : "<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/tampil_bayar_infaq",
                 data       : {id_infaq:id_infaq},
                 dataType   : "json",
                 success: function (data) {
                     //console.log(data);
                    var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
                        html+='<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td class="id_santri">'+data[i]['id_santri']+'</td>'+
                                '<td class="n_santri">'+data[i]['n_santri']+'</td>'+
                                '<td><a href="<?php echo base_url();?>/index.php/modul_pendaftaran/pendaftaran/cetak/'+data[i]['id_santri']+'" type="button" class="btn btn-large btn-block btn-default"><i class="fas fa-list-alt"></i></a></td>';
                                if(data[i]['status_bayar_infaq']!=1)
                                {
                                    html+=  '<td class="status_bayar">'+
                                                '<a class="btn btn-large btn-block btn-warning" id="btn_bayar" role="button">BAYAR</a>'+
                                            '</td>';
                                }
                                else
                                {
                                    html+=  '<td class="status_bayar">'+
                                                '<a class="btn btn-large btn-block btn-success" id="btn_cetak" role="button">CETAK BUKTI BAYAR</a>'+
                                            '</td>';
                                }
                        html+='</tr>';
                    }
                    $('#show_data').html(html);
                    $('#tbl_bayar_infaq').DataTable({
                           'paging': true,
                           'lengthChange': true,
                           'searching': true,
                           'ordering': false,
                           'info': true,
                           'autoWidth': true,
                           'destroy': true,
                           'retrieve': true,
                  });
                 },
                 error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
             });
         }

         $("#data_infaq").change(function (e) { 
             e.preventDefault();
             var id_infaq=$("#data_infaq").val();
             $.ajax({
                 type       : "post",
                 url        : "<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/tampil_bayar_infaq",
                 data       : {id_infaq:id_infaq},
                 dataType   : "json",
                 success: function (data) {
                     //console.log(data);
                    var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
                        html+='<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td class="id_santri">'+data[i]['id_santri']+'</td>'+
                                '<td class="n_santri">'+data[i]['n_santri']+'</td>'+
                                '<td><a href="<?php echo base_url();?>/index.php/modul_pendaftaran/pendaftaran/cetak/'+data[i]['id_santri']+'" type="button" class="btn btn-large btn-block btn-default"><i class="fas fa-list-alt"></i></a></td>';
                                if(data[i]['status_bayar_infaq']!=1)
                                {
                                    html+=  '<td class="status_bayar">'+
                                                '<a class="btn btn-large btn-block btn-warning" id="btn_bayar" role="button">BAYAR</a>'+
                                            '</td>';
                                }
                                else
                                {
                                    html+=  '<td class="status_bayar">'+
                                                '<a class="btn btn-large btn-block btn-success" id="btn_cetak" role="button">CETAK BUKTI BAYAR</a>'+
                                            '</td>';
                                }
                        html+='</tr>';
                    }
                    $('#show_data').html(html);
                    $('#tbl_bayar_infaq').DataTable({
                           'paging': true,
                           'lengthChange': true,
                           'searching': true,
                           'ordering': false,
                           'info': true,
                           'autoWidth': true,
                           'retrieve': true,
                  });
                 },
                 error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
             });
         });
</script>