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
        daftar ulang
        <small>Halaman tambah file
            <?php echo $kolom;?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_daftar_ulang/daftar_ulang">List daftar ulang</a></li>
        <li><a href="#">Tambah file
                <?php echo $kolom;?></a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah / upload file
                    <?php echo $kolom;?>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">

                <form id="form_daftar_ulang" method="post" action="/daftar_ulang/aksi_tambah_daftar_ulang" enctype="multipart/form-data">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Tipe File</td>
                                <td>
                                    <input type="text" name="kolom" id="kolom" class="form-control" value="<?php echo $kolom;?>"
                                        required="required" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>No Pendaftaran</td>
                                <td>
                                    <input type="text" name="id_pendaftaran" id="id_pendaftaran" class="form-control"
                                        value="<?php echo $id_pendaftaran ?>" required="required" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Pilih File</td>
                                <td>
                                    <input type="file" name="file" id="file" class="form-control" value="" required="required"
                                        accept=".pdf">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-danger btn-block " type="submit" id="btn_simpan">SIMPAN</button>
                </form>
                <a href="<?php echo base_url();?>index.php/modul_pendaftaran/daftar_ulang" class="btn btn-primary btn-block "
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

    $("#form_daftar_ulang").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_pendaftaran/daftar_ulang/aksi_tambah_daftar_ulang",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                if (data) {
                    $.alert('Simpan berhasil');
                    location.href =
                        "<?php echo base_url()?>index.php/modul_pendaftaran/daftar_ulang";
                } else {
                    $.alert('Simpan Gagal');
                }
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