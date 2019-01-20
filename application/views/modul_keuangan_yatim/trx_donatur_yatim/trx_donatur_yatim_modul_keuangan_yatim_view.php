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
        transaksi donatur yatim
        <small>Halaman kelola trx donatur yatim</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fas fa-home"></i>
                Beranda</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_trx_donatur_yatim">Data trx donatur yatim</a>
        </li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah data trx donatur yatim</h3>

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
                    <p class="help-block">TGL TRANSAKSI</p><input value="<?php echo date(" Y-m-d")?>" name="nama"
                    type="text" class="form-control" id="tgl_trx_donatur_yatim" readonly/>
                </div>

                <div class="form-group">
                    <p class="help-block">PILIH DONATUR</p>
                    <select name="" id="mst_donatur" class="form-control js-example-basic-single" style="width:100%">
                        <option value="">-- Select One --</option>
                        <?php
                        if(count($data_donatur))
                        {
                            foreach($data_donatur as $d)
                            {
                                echo "<option value='".$d['id_donatur']."'>".$d['nama_donatur']." (".$d['telp_donatur'].")</option>";
                            }
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <p class="help-block">NOMINAL DONASI</p>
                    <div class="input-group">
                        <div class="input-group-addon">Rp.</div>
                        <input type="text" class="form-control" id="nominal_trx_donatur_yatim" placeholder="Amount">
                    </div>
                </div>

                <button class="btn btn-danger btn-block " id="btn_simpan">SIMPAN</button>
                <!-- <a href="<?php echo base_url();?>index.php/modul_admin/mst_trx_donatur_yatim"
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
                <h3 class="box-title">List data trx donatur yatim</h3>

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

                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table_trx_donatur_yatim">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>DONATUR</th>
                                <th>NOMINAL</th>
                                <th>TANGGAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        if(count($data_trx_donatur_yatim))
                        {
                            $i=1;
                            foreach($data_trx_donatur_yatim as $d)
                            {
                                $a=$this->db->query("select * from mst_donatur_yatim where id_donatur='".$d['id_donatur']."'")->result_array();
                                echo '<tr>
                                        <td id_trx_donatur_yatim="'.$d['id_trx_donatur_yatim'].'" class="id_trx_donatur_yatim">'.$i.'</td>
                                        <td class="id_donatur" id_donatur="'.$d['id_donatur'].'">'.$a[0]['nama_donatur'].' ('.$a[0]['telp_donatur'].')</td>
                                        <td class="nominal_trx_donatur_yatim">'.$d['nominal_trx_donatur_yatim'].'</td>
                                        <td class="tgl_trx_donatur_yatim">'.$d['tgl_trx_donatur_yatim'].'</td>
                                        <td><a class="btn btn-danger" id="btn_hapus">hapus</a><a id="btn_edit" class="btn btn-default" data-toggle="modal" href="#modal-id">edit</a></td>
                                      </tr>';  
                                $i++;
                            }
                        }
                        else
                        {
                            echo '<tr><td colpan="5">TIDAK ADA DATA YG BISA DITAMPILKAN</td></tr>';
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

<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger
modal</a> -->
<div class="modal fade" id="modal-id" style="margin: 0 auto;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit trx donatur yatim</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input name="id_trx_donatur_yatim_edit"
                    type="text" class="form-control" id="id_trx_donatur_yatim_edit" readonly/>
                </div>
                <div class="form-group">
                    <p class="help-block">TGL TRANSAKSI</p><input value="<?php echo date(" Y-m-d")?>" name="tgl_trx_donatur_yatim_edit"
                    type="text" class="form-control" id="tgl_trx_donatur_yatim_edit" readonly/>
                </div>

                <div class="form-group">
                    <p class="help-block">PILIH DONATUR</p>
                    <select name="" id="mst_donatur_edit" class="form-control js-example-basic-single">
                        <option value="">-- Select One --</option>
                        <?php
                        if(count($data_donatur))
                        {
                            foreach($data_donatur as $d)
                            {
                                echo "<option value='".$d['id_donatur']."'>".$d['nama_donatur']." (".$d['telp_donatur'].")</option>";
                            }
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <p class="help-block">NOMINAL DONASI</p>
                    <div class="input-group">
                        <div class="input-group-addon">Rp.</div>
                        <input type="text" class="form-control" id="nominal_trx_donatur_yatim_edit" placeholder="Amount">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_edit">Save changes</button>
            </div>
        </div>
    </div>
</div>

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
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        // $('#icon').iconpicker({ hideOnSelect: true,selected: true, });; var hari=new
        // Date().getDate(); var bulan=new Date().getMonth(); var tahun=new
        // Date().getFullYear(); console.log(hari+''+bulan+''+tahun);
        $('#table_trx_donatur_yatim').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
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

    // Save product
    $('#btn_simpan').on('click', function () {
        var tgl_trx_donatur_yatim = $('#tgl_trx_donatur_yatim ').val();
        var id_donatur = $('#mst_donatur').val();
        var nominal_trx_donatur_yatim = $('#nominal_trx_donatur_yatim').val();

        if (tgl_trx_donatur_yatim == "" || id_donatur == "" || nominal_trx_donatur_yatim == "") {
            $.alert({
                theme: 'material',
                type: 'red',
                title: 'Perhatian !',
                content: 'Form tidak boleh ada yg kosong!'
            });
        } else {
            $.ajax({
                type: "post",
                url: "<?php echo base_url();?>/index.php/modul_keuangan_yatim/trx_donatur_yatim/aksi_tambah_trx_donatur_yatim",
                data: {
                    tgl_trx_donatur_yatim: tgl_trx_donatur_yatim,
                    id_donatur: id_donatur,
                    nominal_trx_donatur_yatim: nominal_trx_donatur_yatim
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
        var id_trx_donatur_yatim = row
            .find(".id_trx_donatur_yatim")
            .attr('id_trx_donatur_yatim'); // Find the text
        // alert(id_trx_donatur_yatim);
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_keuangan_yatim/trx_donatur_yatim/aksi_hapus_trx_donatur_yatim",
            data: {
                id_trx_donatur_yatim: id_trx_donatur_yatim
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

    $("body").on("click", "#btn_edit", function () {
        var row = $(this).closest("tr"); // Find the row
        var id_trx_donatur_yatim = row
            .find(".id_trx_donatur_yatim")
            .attr('id_trx_donatur_yatim'); // Find the text
        var tgl_trx_donatur_yatim = row.find(".tgl_trx_donatur_yatim").text();
        var nominal_trx_donatur_yatim = row.find(".nominal_trx_donatur_yatim").text();
        var id_donatur = row.find(".id_donatur").attr('id_donatur');

        // alert(id_trx_donatur_yatim+nama_trx_donatur_yatim+telp_trx_donatur_yatim+alamat_trx_donatur_yatim);
        $("#id_trx_donatur_yatim_edit").val(id_trx_donatur_yatim);
        $("#nominal_trx_donatur_yatim_edit").val(nominal_trx_donatur_yatim );
        $("#tgl_trx_donatur_yatim_edit").val(tgl_trx_donatur_yatim);
        $("#mst_donatur_edit").val(id_donatur).trigger('change');

    });

    $("body").on("click", "#btn_simpan_edit", function () {
        var id_trx_donatur_yatim = $("#id_trx_donatur_yatim_edit").val();
        var nominal_trx_donatur_yatim = $('#nominal_trx_donatur_yatim_edit').val();
        var tgl_trx_donatur_yatim = $('#tgl_trx_donatur_yatim_edit').val();
        var id_donatur= $('#mst_donatur_edit').val();
        // alert(nama_trx_donatur_yatim+telp_trx_donatur_yatim+alamat_trx_donatur_yatim+id);

        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_keuangan_yatim/trx_donatur_yatim/aksi_edit_trx_donatur_yatim",
            data: {
                id_trx_donatur_yatim: id_trx_donatur_yatim,
                nominal_trx_donatur_yatim: nominal_trx_donatur_yatim,
                tgl_trx_donatur_yatim: tgl_trx_donatur_yatim,
                id_donatur: id_donatur,
            },
            dataType: "json",
            success: function (response) {
                $.alert('edit berhasil');
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
</script>