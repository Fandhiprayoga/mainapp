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
        infaq
        <small>Halaman Tambah besaran infaq</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_daftar_ulang/daftar_ulang">List infaq</a></li>
        <li><a href="#">Tambah infaq</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah nominal infaq</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">

                <form id="form_infaq">

                    <div class="form-group">
                        <label for="">NAMA/KET INFAQ</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama / keterangan nominal infaq">
                    </div>

                    <div class="form-group">
                        <label for="">NOMINAL INFAQ</label>

                        <div class="input-group">
                            <div class="input-group-addon">Rp.</div>
                            <input type="text" class="form-control" id="nominal" placeholder="Nominal infaq">
                        </div>

                    </div>


                    <button type="button" class="btn btn-danger btn-block" id="btn_simpan">SIMPAN</button>
                </form>


                <a href="<?php echo base_url();?>index.php/modul_pendaftaran/infaq" class="btn btn-primary btn-block "
                    type="button" id="btn_kembali">KEMBALI</a>
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
        // CKEDITOR.replace('alamat_daftar_ulang',{
        // toolbar: []});
        // CKEDITOR.replace('org_daftar_ulang',{
        // toolbar: []});
        // CKEDITOR.replace('prestasi_daftar_ulang',{
        // toolbar: []});
        // CKEDITOR.replace('alasan_daftar_ulang',{
        // toolbar: []});

    });
    var setDefaultActive = function () {
        var url = localStorage.getItem("url");
        $('a[href="' + url + '"]').parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().show();
    }

    setDefaultActive();



    // $("#btn_simpan").click(function (e) { 
    //     $.confirm({
    //             theme: 'material',
    //             type: 'red',
    //             title: 'Confirm!',
    //             content: 'Anda yakin akan menyimpan ?',
    //             buttons: {
    //                 confirm: function () {

    //                     $.ajax({
    //                         type : "POST",
    //                         url  : "<?php echo base_url();?>index.php/modul_pendaftaran/daftar_ulang/aksi_tambah_daftar_ulang",
    //                         dataType : "JSON",
    //                         data : {

    //                         },
    //                         success: function(data){
    //                             console.log(data);
    //                             if(data==true)
    //                             {
    //                                 $.alert('Data Tersimpan');
    //                                 window.location.href="<?php echo base_url();?>index.php/modul_pendaftaran/daftar_ulang";
    //                             }
    //                             else
    //                             {
    //                                 $.alert('Data Gagal Tersimpan');
    //                             }

    //                         },
    //                         error: function(xhr, textStatus, error) {
    //                             console.log(xhr.responseText);
    //                             console.log(xhr.statusText);
    //                             console.log(textStatus);
    //                             console.log(error);

    //                         }
    //                     });
    //                 },
    //                 cancel: function () {

    //                 },
    //             }
    //         });
    // });

    $('#btn_simpan').click(function (e) {
        e.preventDefault();

        if ($('#nama').val() == "" || $('#nominal').val()=="") {
            $.alert('form tidak boleh kosong !');
        } else {
            $.ajax({
                type: "post",
                url: "<?php echo base_url();?>index.php/modul_pendaftaran/infaq/aksi_tambah_infaq",
                data: {
                    nama_infaq: $('#nama').val(),
                    nominal_infaq: $('#nominal').val(),
                },
                dataType: "json",
                success: function (data) {
                    if (data) {
                        $.alert('simpan berhasil');
                        location.href = '<?php echo base_url()?>index.php/modul_pendaftaran/infaq';
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
        }

    });
</script>