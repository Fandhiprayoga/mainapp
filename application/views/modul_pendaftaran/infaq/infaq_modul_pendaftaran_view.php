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
        Infaq
        <small>Halaman kelola besaran infaq</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list infaq</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List infaq</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="<?php echo base_url();?>index.php/modul_pendaftaran/infaq/tambah" style="margin-bottom:10px;"
                    class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah data infaq</a>
                <div class="pull-right">

                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table" id="tbl_infaq" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA/KET INFAQ</th>
                                <th>NOMINAL INFAQ</th>
                                <th>TIMESTAMP INFAQ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($data_infaq))
                                {
                                    $i=1;
                                    foreach($data_infaq as $a)
                                    {
                                        echo '<tr>
                                                <td class="id_infaq" id_infaq="'.$a['id_infaq'].'">'.$i.'</td>
                                                <td class="nama_infaq">'.$a['nama_infaq'].'</td>
                                                <td class="nominal_infaq">'.$a['nominal_infaq'].'</td>
                                                <td>'.$a['dump_infaq'].'</td>
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
                <form id="form_infaq">

                    <input type="hidden" name="id_infaq_edit" id="id_infaq_edit" class="form-control" REQUIRED readonly>

                    <div class="form-group">
                        <label for="">NAMA/KET INFAQ</label>
                        <input type="text" class="form-control" id="nama_edit" placeholder="nama / keterangan nominal infaq" REQUIRED>
                    </div>

                    <div class="form-group">
                        <label for="">NOMINAL INFAQ</label>

                        <div class="input-group">
                            <div class="input-group-addon">Rp.</div>
                            <input type="text" class="form-control" id="nominal_edit" placeholder="Nominal infaq" REQUIRED  > 
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
        // $('.js-example-basic-single').select2();
        $('#tbl_infaq').DataTable({
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
        var id_infaq = row.find(".id_infaq").attr('id_infaq');

        // $.alert(id_infaq);
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_pendaftaran/infaq/aksi_hapus_infaq",
                        data: {
                            id_infaq: id_infaq,
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
        var id_infaq = row.find(".id_infaq").attr('id_infaq');
        var nama_infaq = row.find(".nama_infaq").text();
        var nominal_infaq = row.find(".nominal_infaq").text();
        $('#id_infaq_edit').val(id_infaq);
        $('#nama_edit').val(nama_infaq);
        $('#nominal_edit').val(nominal_infaq);
    });

    $('#btn_simpan_edit').on('click', function () {
        var id_infaq        = $("#id_infaq_edit").val();
        var nama_infaq      = $("#nama_edit").val();
        var nominal_infaq   = $("#nominal_edit").val();
        // $.alert(id_infaq+nama_infaq+nominal_infaq);
        if (nama_infaq == "" || nominal_infaq == "") {
            $.alert('form tidak boleh kosong');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/modul_pendaftaran/infaq/aksi_edit_infaq",
                data: {
                    id_infaq        : id_infaq,
                    nama_infaq      : nama_infaq,
                    nominal_infaq   : nominal_infaq,
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
</script>