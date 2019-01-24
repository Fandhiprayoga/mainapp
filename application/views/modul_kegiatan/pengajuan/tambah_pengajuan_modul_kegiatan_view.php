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
        pengajuan
        <small>Halaman tambah pengajuan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_pengajuan/pengajuan">List pengajuan</a></li>
        <li><a href="#">Tambah data pengajuan</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data pengajuan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">

                <form id="form_pengajuan">
                    <table class="table table-hover">
                        <tbody>
                           
                            <tr>
                                <td>NAMA KEGIATAN</td>
                                <td>
                                    <input type="text" name="nama_pengajuan" id="nama_pengajuan" class="form-control"
                                        value="" required="required" placeholder="Nama kegiatan">
                                </td>
                            </tr>

                            <tr>
                                <td>KATEGORI KEGIATAN</td>
                                <td>
                                    
                                    <select name="kategori_pengajuan" id="kategori_pengajuan" class="form-control">
                                                <option value="">-- pilih kategori kegiatan --</option>
                                                <option value="yayasan">KEGIATAN YAYASAN</option>
                                                <option value="yatim">KEGIATAN YATIM</option>
                                                <option value="pembangunan">KEGIATAN PEMBANGUNAN</option>
                                    </select>
                                    
                                </td>
                            </tr>

                            <tr>
                                <td>WAKTU KEGIATAN</td>
                                <td>
                                    <input type="date" name="waktu_kegiatan" id="waktu_kegiatan" class="form-control"
                                        value="" required="required" placeholder="Nama kegiatan">
                                </td>
                            </tr>

                            <tr>
                                <td>TEMPAT KEGIATAN</td>
                                <td>
                                    
                                    <textarea name="tempat_kegiatan" id="tempat_kegiatan" class="form-control" rows="3" required="required"></textarea>
                                    
                                </td>
                            </tr>

                            <tr>
                                <td>RINCIAN KEGIATAN</td>
                                <td>
                                    
                                    <textarea name="rincian_kegiatan" id="rincian_kegiatan" class="form-control" rows="3" required="required"></textarea>
                                    
                                </td>
                            </tr>

                            <tr>
                                <td>PENANGGUNGJAWAB KEGIATAN</td>
                                <td>
                                    <input type="text" name="pj_kegiatan" id="pj_kegiatan" class="form-control"
                                                            value="" required="required" placeholder="Penanggungjawab Kegiatan">
                                </td>
                            </tr>

                            <tr>
                                <td>TANGGAL PENGAJUAN</td>
                                <td>
                                    <input type="text" name="tgl_pengajuan" id="tgl_pengajuan" class="form-control"
                                                            value="<?php echo date('Y-m-d');?>" required="required" placeholder="tanggal pengajuan" readonly>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
                    <a href="<?php echo base_url();?>index.php/modul_kegiatan/pengajuan" class="btn btn-primary btn-block "
                        type="button" id="btn_kembali">KEMBALI</a>
                </form>
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
<!-- CK Editor -->
<script src="<?php echo base_url();?>/assets/bower_components/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        // $('.js-example-basic-single').select2();
        //$('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
        CKEDITOR.replace('tempat_kegiatan', {
            toolbar: []
        });
        CKEDITOR.replace('rincian_kegiatan', {
            toolbar: []
        });
    });
    var setDefaultActive = function () {
        var url = localStorage.getItem("url");
        $('a[href="' + url + '"]').parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().show();
    }

    setDefaultActive();



    $("#btn_simpan").click(function (e) {
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menyimpan ?',
            buttons: {
                confirm: function () {

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_kegiatan/pengajuan/aksi_tambah_pengajuan",
                        dataType: "JSON",
                        data: {
                            nama_pengajuan        : $("#nama_pengajuan").val(),
                            kategori_pengajuan    : $("#kategori_pengajuan").val(),
                            waktu_kegiatan        : $("#waktu_kegiatan").val(),
                            tempat_kegiatan       : CKEDITOR.instances['tempat_kegiatan'].getData(),
                            rincian_kegiatan      : CKEDITOR.instances['rincian_kegiatan'].getData(),
                            pj_kegiatan           : $("#pj_kegiatan").val(),
                            tgl_pengajuan         : $("#tgl_pengajuan").val(),
                        },
                        success: function (data) {
                            console.log(data);
                            if (data>0) {
                                $.alert('Data Tersimpan');
                                history.back();
                            } else {
                                $.alert('Data Gagal Tersimpan');
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
                cancel: function () {

                },
            }
        });
    });
</script>