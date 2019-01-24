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
        rencana anggaran
        <small>Halaman kelola rencana anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list rencana anggaran</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List rencana anggaran</h3>

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
                                                    $a=$this->db->query("select * from pengajuan where status_proposal='1' order by id_pengajuan desc")->result_array();
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
            <a id="btn_show_tambah" style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> TAMBAH ITEM ANGGARAN </a>
            <a id="btn_cetak_rab" style="margin-bottom:10px;"class="btn btn-danger" type="button"><i class="fa fa-plus"></i> CETAK RAB </a>
            <div id="div_tambah_item">
            <table class="table" id="tbl_pengajuan" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NAMA ITEM</th>
                            <th>SATUAN ITEM</th>
                            <th>JENIS ANGGARAN</th>
                            <th>HARGA ITEM</th>
                            <th>QTY</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                    <td>
                                        
                                        <input type="text" name="" id="nama_item" class="form-control" value="" required="required">
                                        
                                    </td>
                                    <td style="width:150px;">
                                        
                                        <select style="width:100%;" name="" id="satuan_item" class="form-control js-example-basic-single" required="required">
                                            <option value="">-- Select One --</option>
                                            <?php
                                                $a=$this->db->query("select * from mst_satuan")->result_array();
                                                if(count($a))
                                                {
                                                    foreach($a as $a)
                                                    {
                                                        echo "<option value='".$a['id_satuan']."'>".$a['nama_satuan']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                        
                                    </td>
                                    <td style="width:150px;">
                                    
                                        <select style="width:100%;" name="" id="jenis_anggaran_item" class="form-control js-example-basic-single" required="required">
                                            <option value="">-- Select One --</option>
                                            <?php
                                                $b=$this->db->query("select * from mst_jenis_anggaran")->result_array();
                                                if(count($b))
                                                {
                                                    foreach($b as $b)
                                                    {
                                                        echo "<option value='".$b['id_jenis_anggaran']."'>".$b['nama_jenis_anggaran']."</option>";
                                                    }
                                                }
                                            ?>
                                        </select>

                                    </td>
                                    <td >
                                            
                                            <div class="input-group">
                                                <div class="input-group-addon">Rp.</div>
                                                <input type="text" id="harga_item" class="form-control"  placeholder="Amount" value="0" required="required">
                                            </div>
                                            
                                    </td>
                                    <td style="width:70px;">
                                            <input style="width:100%;" type="number" name="" id="qty_item" value="0" required="required">
                                    </td>
                                    <td>
                                        <button id="btn_simpan" type="button" class="btn btn-large btn-block btn-success"><i class="fas fa-save"></i></button>
                                    </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
$('#btn_show_tambah').hide();
$('#btn_cetak_rab').hide();
$('#div_tambah_item').hide();
$("#btn_show_tambah").click(function (e) { 
        e.preventDefault();
        $("#div_tambah_item").toggle(1000);
});

function bersih()
{
    $("#nama_item").val("");
    $("#harga_item").val("0");
    $("#qty_item").val("0");
}
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
                        if(data[i].tgl_review_rencana_anggaran==null)
                        {
                            html += '<td>BLM REVIEW</td>';
                        }
                        else
                        {
                            if(data[i].status_rencana_anggaran==1)
                            {
                                html += '<td class="success">DITERIMA</td>';
                            }
                            else
                            {
                                html += '<td class="danger">DITOLAK</td>';
                            }
                        }
                        
                        if(data[i].tgl_review_rencana_anggaran==null)
                        {
                            html += '<td>BLM REVIEW</td>';
                        }
                        else
                        {
                            html += '<td>'+data[i].ket_review_rencana_anggaran+'<br>(direview tgl :'+data[i].tgl_review_rencana_anggaran+')</td>';
                        }
                        
                        
                           
                               if(data[i].status_review>0)
                               {
                                    html +=     '<td>'+
                                            '</td>'+
                                        '</tr>';
                               }
                               else
                               {
                                    html +=         '<td>'+
                                                        '<button type="button" id="btn_hapus" class="btn btn-large btn-block btn-danger">HAPUS</button>'+
                                                    '</td>'+
                                                '</tr>';
                               }
                               
                           
                        

                   
                }
                html+='<tr class="warning"><td align="center" colspan="6"><b>TOTAL</b></td><td>Rp.'+data[0].total+'</td></tr>';
                html += '<tr><td><a href="<?php echo base_url();?>index.php/modul_kegiatan/rencana_anggaran/cetak/'+data[0].id_pengajuan+'" class="btn btn-large btn-block btn-danger" >CETAK</a></td></tr>';
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

function cek_status_rencana_anggaran(id_pengajuan)
{
    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/modul_kegiatan/rencana_anggaran/cek_status_rencana_anggaran",
        data: {id_pengajuan:id_pengajuan},
        dataType: "json",
        success: function (data) {
            if(data.length>0)
            {
                //$("#btn_cetak_rab").show(1000);
                $("#btn_show_tambah").hide(1000);
                $("#div_tambah_item").hide(1000);
                
            }
            else
            {
                $("#btn_show_tambah").show(1000);
            }
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
        cek_status_rencana_anggaran(id_pengajuan);
    }

});

$("#btn_simpan").click(function (e) { 
    e.preventDefault();
    var nama_rencana_anggaran   = $("#nama_item").val();
    var harga_rencana_anggaran  = $("#harga_item").val();
    var qty_rencana_anggaran    = $("#qty_item").val();
    var id_jenis_anggaran       = $("#jenis_anggaran_item").val();
    var id_satuan               = $("#satuan_item").val();
    var id_pengajuan            = $("#pilih_id_pengajuan").val();
    $.ajax({
        type: "post",
        url: "<?php echo base_url();?>index.php/modul_kegiatan/rencana_anggaran/aksi_tambah_rencana_anggaran",
        data: {
            nama_rencana_anggaran   : nama_rencana_anggaran,
            harga_rencana_anggaran  : harga_rencana_anggaran,
            qty_rencana_anggaran    : qty_rencana_anggaran,
            id_jenis_anggaran       : id_jenis_anggaran,
            id_satuan               : id_satuan,
            id_pengajuan            : id_pengajuan,
        },
        dataType: "json",
        success: function (data) {
            if(data>0)
            {
                $.alert('Simpan item berhasil');
                bersih();
                tampil_rencana_anggaran(id_pengajuan);
            }
            else
            {
                $.alert('Simpan item gagal !');
            }
        },
        error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);

        }
    });
});

$("body").on("click","#btn_hapus", function () {
    var row = $(this).closest("tr");    // Find the row
    var id_rencana_anggaran = row.find("#rencana_anggaran").attr("id_rencana_anggaran"); // Find the text
    var id_pengajuan            = $("#pilih_id_pengajuan").val();

        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url();?>index.php/modul_kegiatan/rencana_anggaran/aksi_hapus_rencana_anggaran",
                        data: {id_rencana_anggaran:id_rencana_anggaran},
                        dataType: "json",
                        success: function (data) {
                            if(data>0)
                            {
                                $.alert('hapus berhasil !');
                                tampil_rencana_anggaran(id_pengajuan);
                            }
                            else
                            {
                                $.alert('hapus gagal !')
                            }
                        }
                    });
                },
                cancel: function () {
                    
                },
            }
        });

});
</script>