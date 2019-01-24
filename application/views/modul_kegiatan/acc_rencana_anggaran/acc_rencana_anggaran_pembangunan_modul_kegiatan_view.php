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
        Acc rencana anggaran pembangunan
        <small>Halaman kelola Acc rencana anggaran pembangunan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list Acc rencana anggaran pembangunan</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List Acc rencana anggaran pembangunan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <span>
                <select style="width:90%;" name="" id="pilih_id_pengajuan" class="form-control js-example-basic-single">
                    <option value="">-- PILIH KEGIATAN --</option>
                    <?php
                                                    $a=$this->db->query("select * from pengajuan where status_proposal='1' and kategori_pengajuan='pembangunan' order by id_pengajuan desc")->result_array();
                                                    if(count($a))
                                                    {
                                                        foreach($a as $a)
                                                        {
                                                            echo "<option value='".$a['id_pengajuan']."'>".$a['nama_pengajuan']."  (PJ : ".$a['pj_kegiatan'].")  (waktu kegiatan :".$a['waktu_kegiatan'].") (tgl pengajuan : ".$a['tgl_pengajuan'].")</option>";
                                                        }
                                                    }
                    ?>
                </select>
                <a style="margin-top:4px;"class="btn btn-danger" type="button" id="btn_pilih_kegiatan"> PILIH </a>
            </span>
            <hr>
                <div class="table-responsive">
                <table class="table" id="tbl_pengajuan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA ITEM</th>
                            <th>SATUAN ITEM</th>
                            <th>JENIS ANGGARAN</th>
                            <th>HARGA ITEM</th>
                            <th>QTY</th>
                            <th>JUMLAH</th>
                            <th>STATUS</th>
                            <th>KETERANGAN REVIEW</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <tr>
                            <td colspan="10" class="warning" align="center" >SILAHKAN PILIH KEGIATAN TERLEBIH DAHULU</td>
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
// var table=$('#tbl_pengajuan').DataTable({
//        'paging'      : true,
//        'lengthChange': true,
//        'searching'   : true,
//        'ordering'    : false,
//        'info'        : true,
//        'autoWidth'   : true
//      });


$(document).ready(function() {
    //$('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
    $('.js-example-basic-single').select2();
    
});

var setDefaultActive = function() 
{
            var url = String(window.location);
            var url = url.replace('#', '');
            localStorage.setItem("url", url);
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();

            //console.log($('ul  li a[href="'+url+'"]').parent().parent().parent());
}           

setDefaultActive();

function tampil_rencana_anggaran(id_pengajuan)
{
    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/modul_kegiatan/rencana_anggaran/tampil_rencana_anggaran",
        data: {id_pengajuan:id_pengajuan},
        dataType: "json",
        success: function (data) {
            console.log(data);
            var html = '';
	var i;
            if(data.length<1)
            {
                html +='<tr>'+
                            '<td colspan="10" class="warning" align="center" >BELUM ADA ITEM YANG DITAMBAHKAN</td>'+
                        '</tr>';
            }
            else
            {
                for(i=0; i<data.length; i++)
                {
                    html +='<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td id="rencana_anggaran" id_rencana_anggaran="'+data[i].id_rencana_anggaran+'">'+data[i].nama_rencana_anggaran+'</td>'+
                                '<td id="satuan" id_satuan="'+data[i].id_satuan+'">'+data[i].nama_satuan+'</td>'+
                                '<td id="jenis_anggaran" id_jenis_anggaran="'+data[i].id_jenis_anggaran+'">'+data[i].nama_jenis_anggaran+'</td>'+
                                '<td>Rp.'+data[i].harga_rencana_anggaran+'</td>'+
                                '<td>'+data[i].qty_rencana_anggaran+'</td>'+
                                '<td>Rp.'+data[i].jumlah+'</td>';
                    html += "<td style='width:200px;'><select style='width:100%;' name='' id='status_rencana_anggaran' class='form-control'>";
                        html += "<option>--Select One--</option>";
                        if(data[i].status_rencana_anggaran==1 && data[i].tgl_review_rencana_anggaran!=null)
                        {
                            html += "<option selected value='1'>DITERIMA</option>";
                        }
                        else
                        {
                            html += "<option value='1'>DITERIMA</option>";
                        }

                        if(data[i].status_rencana_anggaran==0 && data[i].tgl_review_rencana_anggaran!=null)
                        {
                            html += "<option selected value='0'>DITOLAK</option>";
                        }
                        else
                        {
                            html += "<option value='0'>DITOLAK</option>";
                        }
                    html += "</select></td>";
                    if(data[i].ket_review_rencana_anggaran==null)
                    {
                        html += "<td><textarea class='form-control' id='ket_review_rencana_anggaran' cols='20' rows='2' placeholder='BELUM DIREVIEW'></textarea></td>";
                    }
                    else
                    {
                        html += "<td><textarea class='form-control' id='ket_review_rencana_anggaran' cols='20' rows='2'>"+data[i].ket_review_rencana_anggaran+"</textarea></td>";
                    } 
                    html += "<td><button class='btn btn-block btn-warning' id='btn_simpan'>SIMPAN</button></td>";
                   
                }
                html+='<tr class="warning"><td align="center" colspan="6"><b>TOTAL</b></td><td>Rp.'+data[0].total+'</td></tr>';
            }

            $('#show_data').html(html);
        },
        error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);

        }
    });
}


$("#btn_pilih_kegiatan").click(function (e) 
{ 
    e.preventDefault();
    var id_pengajuan = $("#pilih_id_pengajuan").val();
    if(id_pengajuan=="")
    {
        $.alert('pilih kegiatan terlebih dahulu !');
    }
    else
    {
        tampil_rencana_anggaran(id_pengajuan);
    }

});

$("body").on("click","#btn_simpan", function () {
    var row = $(this).closest("tr");    // Find the row
    var id_rencana_anggaran = row.find("#rencana_anggaran").attr('id_rencana_anggaran'); // Find the text
    var status_rencana_anggaran= row.find("#status_rencana_anggaran").val();
    var ket_review_rencana_anggaran= row.find("#ket_review_rencana_anggaran").val();
    var tgl_review_rencana_anggaran="<?php echo date('Y-m-d');?>";
    //$.alert(id_rencana_anggaran+status_rencana_anggaran+ket_review_rencana_anggaran+tgl_review_rencana_anggaran);

    $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin  ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_kegiatan/acc_rencana_anggaran/aksi_edit_acc_rencana_anggaran",
                        data: {
                            id_rencana_anggaran:id_rencana_anggaran, 
                            status_rencana_anggaran:status_rencana_anggaran, 
                            ket_review_rencana_anggaran:ket_review_rencana_anggaran, 
                            tgl_review_rencana_anggaran:tgl_review_rencana_anggaran},
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            if(data>0)
                            {
                                $.alert('simpan berhasil');
                                //location.reload();
                                var id_pengajuan = $("#pilih_id_pengajuan").val();
                                tampil_rencana_anggaran(id_pengajuan)
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