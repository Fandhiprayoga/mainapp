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
        Asrama
        <small>Halaman kelola asrama</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list asrama</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List asrama</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a data-toggle="modal" href="#modal_tambah" style="margin-bottom:10px;"
                    class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah data asrama</a>
                <div class="pull-right">

                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table" id="tbl_asrama" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA ASRAMA</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($data_asrama))
                                {
                                    $i=1;
                                    foreach($data_asrama as $a)
                                    {
                                        echo '<tr>
                                                <td class="id_asrama" id_asrama="'.$a['id_asrama'].'">'.$i.'</td>
                                                <td class="nama_asrama">'.$a['nama_asrama'].'</td>
                                                <td>
                                                    <div class="btn-toolbar" style="width:100%;">
                                                        <div role="group" class="btn-group">
                                                            <a id="btn_edit" data-toggle="modal" href="#modal_edit" class="btn btn-default"
                                                                type="button"><i class="fa fa-edit"></i></a>
                                                            <button id="btn_hapus" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>';
                                            $i++;
                                    }
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
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal_edit'>Trigger modal</a> -->
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit data</h4>
            </div>
            <div class="modal-body">
                <form id="form_asrama">

                    <input type="hidden" name="id_asrama_edit" id="id_asrama_edit" class="form-control" REQUIRED readonly>

                    <div class="form-group">
                        <label for="">NAMA asrama</label>
                        <input type="text" class="form-control" id="nama_edit" placeholder="nama asrama" REQUIRED>
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

<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah data</h4>
            </div>
            <div class="modal-body">
                <form id="form_asrama">
                    <div class="form-group">
                        <label for="">NAMA asrama</label>
                        <input type="text" class="form-control" id="nama_tambah" placeholder="nama asrama" REQUIRED>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_tambah">Save</button>
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
        // $('.js-example-basic-single').select2();
        $('#tbl_asrama').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true,
        });
    });

    var setDefaultActive = function () {
        var url = String(window.location);
        var url = url.replace('#', '');
        localStorage.setItem("url", url);
        $('a[href="' + url + '"]').parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().show();

        //console.log($('ul  li a[href="'+url+'"]').parent().parent().parent());
    }

    setDefaultActive();

    $("body").on("click", "#btn_hapus", function () {
        var row = $(this).closest("tr"); // Find the row
        var id_asrama = row.find(".id_asrama").attr('id_asrama');

        // $.alert(id_asrama);
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_pendaftaran/asrama/aksi_hapus_asrama",
                        data: {
                            id_asrama: id_asrama,
                        },
                        dataType: "JSON",
                        success: function (data) {
                            if (data) {
                                $.alert('hapus berhasil');
                                location.reload();
                            } else {
                                $.alert('hapus gagal');
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

    $('body').on('click', '#btn_edit', function () {
        var row = $(this).closest("tr"); // Find the row
        var id_asrama = row.find(".id_asrama").attr('id_asrama');
        var nama_asrama = row.find(".nama_asrama").text();

        $('#id_asrama_edit').val(id_asrama);
        $('#nama_edit').val(nama_asrama);

    });

    $('#btn_simpan_edit').on('click', function () {
        var id_asrama        = $("#id_asrama_edit").val();
        var nama_asrama      = $("#nama_edit").val();
        // $.alert(id_asrama+nama_asrama+nominal_asrama);
        if (nama_asrama == "") {
            $.alert('form tidak boleh kosong');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/modul_pendaftaran/asrama/aksi_edit_asrama",
                data: {
                    id_asrama        : id_asrama,
                    nama_asrama      : nama_asrama,
                },
                dataType: "JSON",
                success: function (data) {
                    if (data) {
                        $.alert('edit berhasil');
                        $('#modal_edit').modal('hide');
                        location.reload();
                    } else {
                        $.alert('edit gagal');
                    }

                },
                error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
            });
        }
    });

    $('#btn_simpan_tambah').on('click', function () {
        var nama_asrama      = $("#nama_tambah").val();
        // $.alert(id_asrama+nama_asrama+nominal_asrama);
        if (nama_asrama == "") {
            $.alert('form tidak boleh kosong');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/modul_pendaftaran/asrama/aksi_tambah_asrama",
                data: {
                    nama_asrama      : nama_asrama,
                },
                dataType: "JSON",
                success: function (data) {
                    if (data) {
                        $.alert('simpan berhasil');
                        $('#modal_tambah').modal('hide');
                        location.reload();
                    } else {
                        $.alert('simpan gagal');
                    }

                },
                error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
            });
        }
    });
</script>