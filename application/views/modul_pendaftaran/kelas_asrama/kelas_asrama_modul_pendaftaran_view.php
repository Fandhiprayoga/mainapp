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
        kelas asrama
        <small>Halaman kelola kelas asrama santri</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list kelas asrama</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List kelas asrama</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-danger" style="height:30px;" id="btn_filter" role="button"><i class="fas fa-print"></i>&nbsp;
                        Cetak Data</a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- <a data-toggle="modal" href="#modal_tambah" style="margin-bottom:10px;" class="btn btn-danger" type="button"><i
                        class="fa fa-plus"></i> Tambah data kelas asrama</a> -->
                <div id="filter_row">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cetak Data kelola kelas & asrama</h3>

                            <div class="box-tools pull-right">
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button> -->
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form role="form">
                                <div class="form-group">
                                    <label for="">Pilih Kelas</label>

                                    <select name="" id="kelas_cetak" class="form-control">
                                        <option value="SEMUA">Pilih SEMUA</option>
                                        <?php
                                            $a=$this->db->query('select * from mst_kelas')->result_array();
                                            if(count($a))
                                            {
                                                foreach($a as $a)
                                                {
                                                    echo '<option value="'.$a['id_kelas'].'">'.$a['nama_kelas'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="">Pilih Asrama</label>
                                    <select name="" id="asrama_cetak" class="form-control">
                                        <option value="SEMUA">PILIH SEMUA</option>
                                        <?php
                                            $a=$this->db->query('select * from mst_asrama')->result_array();
                                            if(count($a))
                                            {
                                                foreach($a as $a)
                                                {
                                                    echo '<option value="'.$a['id_asrama'].'">'.$a['nama_asrama'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <a id="btn_cetak_2" type="button" class="btn btn-primary">Cetak kelas & asrama</a>
                                <a id="btn_cetak_kelas" type="button" class="btn btn-primary">Hanya Cetak Kelas</a>
                                <a id="btn_cetak_asrama" type="button" class="btn btn-primary">Hanya Cetak Asrama</a>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table" id="tbl_kelas_asrama" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID SANTRI</th>
                                <th>NAMA SANTRI</th>
                                <TH>KELAS</TH>
                                <th></th>
                                <th>ASRAMA</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($data_kelas_asrama))
                                {
                                    $i=1;
                                    foreach($data_kelas_asrama as $a)
                                    {
                                        
                                             $b=$this->db->query('select * from mst_santri where id_santri ="'.$a['id_santri'].'"')->result_array();
                                             $c=$this->db->query('select * from mst_kelas where id_kelas ="'.$a['id_kelas'].'"')->result_array();
                                             $d=$this->db->query('select * from mst_asrama where id_asrama ="'.$a['id_asrama'].'"')->result_array();        
                                        echo '<tr>
                                                <td class="id_kelas_asrama" id_kelas_asrama="'.$a['id_kelas_asrama'].'">'.$i.'</td>
                                                <td>'.$a['id_santri'].'</td>
                                                <td class="nama_santri" id_santri="'.$a['id_santri'].'">'.$b[0]['n_santri'].'</td>
                                                <td class="kelas" id_kelas="'.$a['id_kelas'].'">'.$c[0]['nama_kelas'].'</td>
                                                <td>
                                                <div class="btn-toolbar" style="width:100%;">
                                                    <div role="group" class="btn-group">
                                                        <a id="btn_edit_kelas" data-toggle="modal" href="#modal_edit_kelas" class="btn btn-default"
                                                            type="button"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                </div>
                                                </td>
                                                <td class="asrama" id_asrama="'.$a['id_asrama'].'">'.$d[0]['nama_asrama'].'</td>
                                                <td>
                                                    <div class="btn-toolbar" style="width:100%;">
                                                        <div role="group" class="btn-group">
                                                            <a id="btn_edit_asrama" data-toggle="modal" href="#modal_edit_asrama" class="btn btn-default"
                                                                type="button"><i class="fa fa-edit"></i></a>
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
<div class="modal fade" id="modal_edit_kelas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">PILIH DATA KELAS</h4>
            </div>
            <div class="modal-body">
                <form id="form_kelas">

                    <input type="text" name="id_kelas_asrama" id="id_kelas_asrama_edit" class="form-control" REQUIRED
                        readonly>

                    <div class="form-group">
                        <label for="">PILIH KELAS</label>

                        <select name="" id="id_kelas_edit" class="form-control">
                            <?php
                                $a=$this->db->query('select * from mst_kelas')->result_array();
                                if(count($a))
                                {
                                    foreach($a as $a)
                                    {
                                        echo '<option value="'.$a['id_kelas'].'">'.$a['nama_kelas'].'</option>';
                                    }
                                }
                            ?>
                        </select>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_edit_kelas">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit_asrama">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">PILIH DATA ASRAMA</h4>
            </div>
            <div class="modal-body">
                <form id="form_asrama">

                    <input type="text" name="id_kelas_asrama2" id="id_kelas_asrama_edit2" class="form-control" REQUIRED
                        readonly>

                    <div class="form-group">
                        <label for="">PILIH ASRAMA</label>
                        <select name="" id="id_asrama_edit" class="form-control">
                            <?php
                                $a=$this->db->query('select * from mst_asrama')->result_array();
                                if(count($a))
                                {
                                    foreach($a as $a)
                                    {
                                        echo '<option value="'.$a['id_asrama'].'">'.$a['nama_asrama'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_edit_asrama">Save changes</button>
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
        $('#tbl_kelas_asrama').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true,
        });
        $('#filter_row').hide();
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



    $('body').on('click', '#btn_edit_kelas', function () {
        var row = $(this).closest("tr"); // Find the row
        var id_kelas_asrama = row.find(".id_kelas_asrama").attr('id_kelas_asrama');
        var id_kelas = row.find(".kelas").attr('id_kelas');

        //alert(id_kelas_asrama+' '+id_kelas);
        $('#id_kelas_asrama_edit').val(id_kelas_asrama);
        $('#id_kelas_edit').val(id_kelas);

    });

    $('body').on('click', '#btn_edit_asrama', function () {
        var row = $(this).closest("tr"); // Find the row
        var id_kelas_asrama = row.find(".id_kelas_asrama").attr('id_kelas_asrama');
        var id_asrama = row.find(".asrama").attr('id_asrama');

        //alert(id_kelas_asrama+' '+id_kelas);
        $('#id_kelas_asrama_edit2').val(id_kelas_asrama);
        $('#id_asrama_edit').val(id_asrama);

    });

    $('#btn_simpan_edit_kelas').on('click', function () {
        var id_kelas_asrama = $("#id_kelas_asrama_edit").val();
        var id_kelas_edit = $("#id_kelas_edit").val();

        if (id_asrama_edit == "") {
            $.alert('form tidak boleh kosong');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/modul_pendaftaran/kelas_asrama/aksi_edit_kelas_asrama_kelas",
                data: {
                    id_kelas_asrama: id_kelas_asrama,
                    id_kelas: id_kelas_edit,
                },
                dataType: "JSON",
                success: function (data) {
                    if (data) {
                        $.alert('edit berhasil');
                        $('#modal_edit_kelas').modal('hide');
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

    $('#btn_simpan_edit_asrama').on('click', function () {
        var id_kelas_asrama = $("#id_kelas_asrama_edit2").val();
        var id_asrama_edit = $("#id_asrama_edit").val();
        //alert(id_kelas_asrama+" "+id_asrama_edit);
        if (id_asrama_edit == "") {
            $.alert('form tidak boleh kosong');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>index.php/modul_pendaftaran/kelas_asrama/aksi_edit_kelas_asrama_asrama",
                data: {
                    id_kelas_asrama: id_kelas_asrama,
                    id_asrama: id_asrama_edit,
                },
                dataType: "JSON",
                success: function (data) {
                    if (data) {
                        $.alert('edit berhasil');
                        $('#modal_edit_asrama').modal('hide');
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

    $("#btn_filter").click(function (e) { 
        e.preventDefault();
        $("#filter_row").toggle(1000);
    });

    $("#btn_cetak_2").click(function (e) { 
        e.preventDefault();
        var kelas=$("#kelas_cetak").val();
        var asrama=$("#asrama_cetak").val();
        //$.alert(kelas+asrama);

        window.open('<?php echo base_url();?>index.php/modul_pendaftaran/kelas_asrama/cetak/dua/'+kelas+'/'+asrama,'cetak data kelola kelas & asrama');
    });

    $("#btn_cetak_kelas").click(function (e) { 
        e.preventDefault();
        var kelas=$("#kelas_cetak").val();
        var asrama=$("#asrama_cetak").val();
        //$.alert(kelas+asrama);
        window.open('<?php echo base_url();?>index.php/modul_pendaftaran/kelas_asrama/cetak/kelas/'+kelas+'/'+asrama,'cetak data kelola kelas & asrama');
    });

     $("#btn_cetak_asrama").click(function (e) { 
        e.preventDefault();
        var kelas=$("#kelas_asrama").val();
        var asrama=$("#asrama_cetak").val();
        //$.alert(kelas+asrama);
        window.open('<?php echo base_url();?>index.php/modul_pendaftaran/kelas_asrama/cetak/asrama/'+kelas+'/'+asrama,'cetak data kelola kelas & asrama');
    });
</script>