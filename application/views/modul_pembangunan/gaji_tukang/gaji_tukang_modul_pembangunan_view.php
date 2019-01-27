<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link
    href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css"
    rel="stylesheet">
<!-- DataTables -->
<link
    rel="stylesheet"
    href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Select2 -->
<link
    rel="stylesheet"
    href="<?php echo base_url();?>/assets/bower_components/select2/dist/css/select2.min.css">
<link
    href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css"
    rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Master gaji_tukang
        <small>Halaman kelola gaji_tukang</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fas fa-home"></i>
                Beranda</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_gaji_tukang">Data gaji_tukang</a>
        </li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah data gaji_tukang</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <p class="help-block">TANGGAL</p><input name="nama" type="text" class="form-control" value="<?php echo date(" Y-m-d")?>" id="tgl_gaji_tukang" readonly/></div>

                <div class="form-group">
                    <p class="help-block">PILIH TUKANG</p>
                    <select name="" id="id_tukang" class="form-control js-example-basic-single" style="width:100%">
                        <option value="">-- Select One --</option>
                        <?php
                            if(count($data_mst_tukang))
                            {
                                foreach($data_mst_tukang as $t)
                                {
                                    echo '<option value="'.$t['id_tukang'].'">'.$t['nama_tukang'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <p class="help-block">PILIH KEGIATAN PEMBANGUNAN</p>
                    <select name="" id="id_pengajuan" class="form-control js-example-basic-single" style="width:100%">
                        <option value="">-- Select One --</option>
                        <?php
                            if(count($data_pengajuan))
                            {
                                foreach($data_pengajuan as $p)
                                {
                                    echo '<option value="'.$p['id_pengajuan'].'">'.$p['nama_pengajuan'].'(TGL KEGIATAN :'.$p['waktu_kegiatan'].') (TEMPAT :'.$p['tempat_kegiatan'].') (PJ :'.$p['pj_kegiatan'].')</option>';
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <p class="help-block">NOMINAL</p>
                    
                    <div class="input-group">
                        <div class="input-group-addon">Rp.</div>
                        <input type="text" class="form-control" id="nominal_gaji_tukang" placeholder="Amount">
                    </div>
                    
                </div>

                <button class="btn btn-danger btn-block " id="btn_simpan">SIMPAN</button>
                <!-- <a href="<?php echo base_url();?>index.php/modul_admin/mst_gaji_tukang"
                class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
                -->

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List data gaji_tukang</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- isi disini -->
                <div class="form-group">
                    <p class="help-block">PILIH KEGIATAN PEMBANGUNAN</p>
                    <select name="" id="id_pengajuan_pilih" class="form-control js-example-basic-single" style="width:100%">
                        <option value="">-- Select One --</option>
                        <?php
                            if(count($data_pengajuan))
                            {
                                foreach($data_pengajuan as $p)
                                {
                                    echo '<option value="'.$p['id_pengajuan'].'">'.$p['nama_pengajuan'].'(TGL KEGIATAN :'.$p['waktu_kegiatan'].') (TEMPAT :'.$p['tempat_kegiatan'].') (PJ :'.$p['pj_kegiatan'].')</option>';
                                }
                            }
                        ?>
                    </select>  
                </div>
                <button type="button" class="btn btn-danger" id="btn_pilih">PILIH</button>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table_gaji_tukang">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA TUKANG</th>
                                <th>TELP</th>
                                <th>ALAMAT</th>
                                <th>NOMINAL GAJI</th>
                                <th>TANGGAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            <tr>
                                <td colspan="6" style="text-align:center;">PILIH KEGIATAN TERLEBIH DAHULU</td>
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

<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger
modal</a> -->

<!-- /.content -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script
    src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script
    src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script
    src="<?php echo base_url();?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script
    src="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/fontawesome-iconpicker.min.js"></script>
<!-- Select2 -->
<script
    src="<?php echo base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>

<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        // $('#icon').iconpicker({ hideOnSelect: true,selected: true, });; var hari=new
        // Date().getDate(); var bulan=new Date().getMonth(); var tahun=new
        // Date().getFullYear(); console.log(hari+''+bulan+''+tahun);
        $('#table_gaji_tukang').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
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

    // Save product
    $('#btn_simpan').on('click', function () {
        var id_tukang = $('#id_tukang').val();
        var id_pengajuan = $('#id_pengajuan').val();
        var nominal_gaji_tukang= $('#nominal_gaji_tukang').val();
        var tgl_gaji_tukang= $('#tgl_gaji_tukang').val();
        // alert(id_tukang+id_pengajuan+nominal_gaji_tukang+tgl_gaji_tukang);
        if (id_tukang == "" || id_pengajuan == "" || nominal_gaji_tukang == "") {
            $.alert(
                {theme: 'material', type: 'red', title: 'Perhatian !', content: 'Form tidak boleh ada yg kosong!'}
            );
        } else {
            $.ajax({
                type: "post",
                url: "<?php echo base_url();?>/index.php/modul_pembangunan/gaji_tukang/aksi_tam" +
                        "bah_gaji_tukang",
                data: {
                    id_tukang: id_tukang,
                    id_pengajuan: id_pengajuan,
                    nominal_gaji_tukang: nominal_gaji_tukang,
                    tgl_gaji_tukang:tgl_gaji_tukang,
                },
                dataType: "JSON",
                success: function (data) {
                    $.alert('Simpan berhasil');
                    location.reload();
                },
                error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }

            });
        }
        //alert('tombol kepencet');
        return false;
    });

    $("body").on("click", "#btn_hapus", function () {
        var row = $(this).closest("tr"); // Find the row
        var id_gaji_tukang = row
            .find(".id_gaji_tukang")
            .attr('id_gaji_tukang'); // Find the text
        // alert(id_gaji_tukang);
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_pembangunan/gaji_tukang/aksi_hapu" +
                    "s_gaji_tukang",
            data: {
                id_gaji_tukang: id_gaji_tukang
            },
            dataType: "json",
            success: function (data) {
                $.alert('Hapus berhasil');
                location.reload();
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.responseText);
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    });
    
    $("#btn_pilih").click(function (e) { 
        e.preventDefault();
        var id_pengajuan=$("#id_pengajuan_pilih").val();
        // $.alert('klik gan'+id_pengajuan);
        if(id_pengajuan=="")
        {
            $.alert('pilih dahulu kegiatannya');
        }
        else
        {
            $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/modul_pembangunan/gaji_tukang/aksi_tampil_gaji_tukang_list",
            data: {id_pengajuan:id_pengajuan},
            dataType: "json",
            success: function (data) {
                                    var html = '';
                                    var i;
                                    if(data.length>0)
                                    {
                                        for(i=0;i<data.length;i++)
                                        {
                                            html += "<tr>"+
                                                        "<td id_gaji_tukang='"+data[i].id_gaji_tukang+"' class='id_gaji_tukang'>"+(i+1)+"</td>"+
                                                        "<td>"+data[i].nama_tukang+"</td>"+
                                                        "<td>"+data[i].no_telp+"</td>"+
                                                        "<td>"+data[i].alamat+"</td>"+
                                                        "<td>"+data[i].nominal_gaji_tukang+"</td>"+
                                                        "<td>"+data[i].tgl_gaji_tukang+"</td>"+
                                                        "<td><button id='btn_hapus'>HAPUS</button></td>"+
                                                    "</tr>";
                                        }
                                        html +="<tr class='warning'><td colspan='4' align='center'><b>TOTAL</b></td><td>"+data[0].total+"</td></tr>";
                                    }
                                    else
                                    {
                                        html+="<tr class='warning'><td colspan='7' align='center'>TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>";
                                    }
                                    
                                    $('#show_data').html(html);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.responseText);
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
        }
        
    });
    // $("body").on("click","#btn_edit", function () {
    //   var row = $(this).closest("tr"); // Find the row
    //     var id_gaji_tukang = row
    //         .find(".id_gaji_tukang")
    //         .attr('id_gaji_tukang'); // Find the text
    //     var nama_gaji_tukang=row.find(".nama_gaji_tukang").text();
    //     var telp_gaji_tukang=row.find(".telp_gaji_tukang").text();
    //     var alamat_gaji_tukang=row.find(".alamat_gaji_tukang").text();

    //     // alert(id_gaji_tukang+nama_gaji_tukang+telp_gaji_tukang+alamat_gaji_tukang);
    //     $("#id_edit").val(id_gaji_tukang);
    //     $("#nama_edit").val(nama_gaji_tukang);
    //     $("#telp_edit").val(telp_gaji_tukang);
    //     $("#alamat_edit").val(alamat_gaji_tukang);

    // });

    // $("body").on("click","#btn_simpan_edit", function () {
    //     var id_gaji_tukang= $("#id_edit").val();
    //     var nama_gaji_tukang = $('#nama_edit').val();
    //     var telp_gaji_tukang = $('#telp_edit').val();
    //     var alamat_gaji_tukang = $('#alamat_edit').val();
    //     // alert(nama_gaji_tukang+telp_gaji_tukang+alamat_gaji_tukang+id);
        
    //     $.ajax({
    //       type: "post",
    //       url: "<?php echo base_url();?>index.php/modul_pembangunan/mst_gaji_tukang/aksi_edit_mst_gaji_tukang",
    //       data: {id_gaji_tukang:id_gaji_tukang,nama_gaji_tukang:nama_gaji_tukang,no_telp:telp_gaji_tukang,alamat:alamat_gaji_tukang,},
    //       dataType: "json",
    //       success: function (response) {
    //             $.alert('edit berhasil');
    //             location.reload();
    //       },
    //         error: function (xhr, textStatus, error) {
    //             console.log(xhr.responseText);
    //             console.log(xhr.statusText);
    //             console.log(textStatus);
    //             console.log(error);
    //         }
    //     });

    // });
</script>