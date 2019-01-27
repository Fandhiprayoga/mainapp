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
        Master Donatur
        <small>Halaman kelola donatur</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fas fa-home"></i>
                Beranda</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_donatur">Data donatur</a>
        </li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah data donatur</h3>

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
                    <p class="help-block">NAMA LENGKAP DONATUR</p><input name="nama" type="text" class="form-control" id="nama"/></div>
                <div class="form-group">
                    <p class="help-block">NOMOR TELEPON</p><input name="nama" type="text" class="form-control" id="telp"/></div>

                <div class="form-group">
                    <p class="help-block">ALAMAT</p>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                </div>
                <button class="btn btn-danger btn-block " id="btn_simpan">SIMPAN</button>
                <!-- <a href="<?php echo base_url();?>index.php/modul_admin/mst_donatur"
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
                <h3 class="box-title">List data donatur</h3>

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
                    <table class="table table-hover table-bordered" id="table_donatur">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA DONATUR</th>
                                <th>TELP</th>
                                <th>ALAMAT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        if(count($data_mst_donatur))
                        {
                            $i=1;
                            foreach($data_mst_donatur as $d)
                            {
                                echo '<tr>
                                        <td id_donatur="'.$d['id_donatur'].'" class="id_donatur">'.$i.'</td>
                                        <td class="nama_donatur">'.$d['nama_donatur'].'</td>
                                        <td class="telp_donatur">'.$d['telp_donatur'].'</td>
                                        <td class="alamat_donatur">'.$d['alamat_donatur'].'</td>
                                        <td><a class="btn btn-danger" id="btn_hapus">hapus</a><a id="btn_edit" class="btn btn-default" data-toggle="modal" href="#modal-id">edit</a></td>
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

<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger
modal</a> -->
<div class="modal fade" id="modal-id" style="margin: 0 auto;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Donatur</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <p class="help-block"></p><input name="nama" type="hidden" class="form-control" id="id_edit"/></div>
                <div class="form-group">
                    <p class="help-block">NAMA LENGKAP DONATUR</p><input name="nama" type="text" class="form-control" id="nama_edit"/></div>
                <div class="form-group">
                    <p class="help-block">NOMOR TELEPON</p><input name="nama" type="text" class="form-control" id="telp_edit"/></div>

                <div class="form-group">
                    <p class="help-block">ALAMAT</p>
                    <textarea name="alamat" id="alamat_edit" class="form-control"></textarea>
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
        $('#table_donatur').DataTable({
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
        var nama_donatur = $('#nama').val();
        var telp_donatur = $('#telp').val();
        var alamat_donatur = $('#alamat').val();

        if (nama_donatur == "" || telp_donatur == "" || alamat_donatur == "") {
            $.alert(
                {theme: 'material', type: 'red', title: 'Perhatian !', content: 'Form tidak boleh ada yg kosong!'}
            );
        } else {
            $.ajax({
                type: "post",
                url: "<?php echo base_url();?>/index.php/modul_pembangunan/mst_donatur/aksi_tam" +
                        "bah_mst_donatur",
                data: {
                    nama_donatur: nama_donatur,
                    telp_donatur: telp_donatur,
                    alamat_donatur: alamat_donatur
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
        var id_donatur = row
            .find(".id_donatur")
            .attr('id_donatur'); // Find the text
        // alert(id_donatur);
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_pembangunan/mst_donatur/aksi_hapu" +
                    "s_mst_donatur",
            data: {
                id_donatur: id_donatur
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

    $("body").on("click","#btn_edit", function () {
      var row = $(this).closest("tr"); // Find the row
        var id_donatur = row
            .find(".id_donatur")
            .attr('id_donatur'); // Find the text
        var nama_donatur=row.find(".nama_donatur").text();
        var telp_donatur=row.find(".telp_donatur").text();
        var alamat_donatur=row.find(".alamat_donatur").text();

        // alert(id_donatur+nama_donatur+telp_donatur+alamat_donatur);
        $("#id_edit").val(id_donatur);
        $("#nama_edit").val(nama_donatur);
        $("#telp_edit").val(telp_donatur);
        $("#alamat_edit").val(alamat_donatur);

    });

    $("body").on("click","#btn_simpan_edit", function () {
        var id_donatur= $("#id_edit").val();
        var nama_donatur = $('#nama_edit').val();
        var telp_donatur = $('#telp_edit').val();
        var alamat_donatur = $('#alamat_edit').val();
        // alert(nama_donatur+telp_donatur+alamat_donatur+id);
        
        $.ajax({
          type: "post",
          url: "<?php echo base_url();?>index.php/modul_pembangunan/mst_donatur/aksi_edit_mst_donatur",
          data: {id_donatur:id_donatur,nama_donatur:nama_donatur,telp_donatur:telp_donatur,alamat_donatur:alamat_donatur,},
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