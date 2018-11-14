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
        Data santri lama
        <small>Halaman santri lama</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran">List pendaftaran</a></li>
        <li><a href="#">Tambah data santri lama</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid" >
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data santri lama</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body" id="tambah_data_santri_lama_form">

                <form id="form_pendaftaran">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>TANGAL MASUK</td>
                                <td>
                                    <input class="form-control" type="date" name="tgl_masuk" id="tgl_masuk">
                                </td>
                            </tr>
                            <tr>
                                <td>ID PENDAFTARAN</td>
                                <td>
                                    <input type="text" name="id_pendaftaran" id="id_pendaftaran" class="form-control"
                                         required="required" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>NAMA LENGKAP</td>
                                <td>
                                    <input type="text" name="n_pendaftaran" id="n_pendaftaran" class="form-control"
                                        value="" required="required" placeholder="Nama Lengkap">
                                </td>
                            </tr>
                            <tr>
                                <td>NAMA PANGGILAN</td>
                                <td>
                                    <input type="text" name="nl_pendaftaran" id="nl_pendaftaran" class="form-control"
                                        value="" required="required" placeholder="Nama Panggilan">
                                </td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td>
                                    <input type="text" name="t_pendaftaran" id="t_pendaftaran" class="form-control"
                                        value="" required="required" placeholder="Tempat Lahir">
                                    <input type="date" name="tl_pendaftaran" id="tl_pendaftaran" class="form-control"
                                        value="" required="required">
                                </td>
                            </tr>
                            <tr>
                                <td>INSTANSI/FAK/JUR</td>
                                <td>
                                    <input type="text" name="instansi_pendaftaran" id="instansi_pendaftaran" class="form-control"
                                        value="" required="required" placeholder="Instansi / Fak / Jur">
                                </td>
                            </tr>
                            <tr>
                                <td>ALAMAT</td>
                                <td>
                                    <textarea name="alamat_pendaftaran" id="alamat_pendaftaran" class="form-control"
                                        rows="3" required="required" placeholder="Alamat Lengkap"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>NO TELP</td>
                                <td>
                                    <input type="text" name="telp_pendaftaran" id="telp_pendaftaran" class="form-control"
                                        value="" required="required" placeholder="No telepon">
                                </td>
                            </tr>
                            <tr>
                                <td>EMAIL / FB</td>
                                <td>
                                    <input type="text" name="email_pendaftaran" id="email_pendaftaran" class="form-control"
                                        value="" required="required" placeholder="Email atau Akun FB" </td> </tr> <tr>
                                <td>PENGALAMAN ORGANISASI</td>
                                <td>
                                    <textarea name="org_pendaftaran" id="org_pendaftaran" class="form-control" rows="3"
                                        required="required" placeholder="Pengalaman Organisasi"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>PRESTASI</td>
                                <td>
                                    <textarea name="prestasi_pendaftaran" id="prestasi_pendaftaran" class="form-control"
                                        rows="3" required="required" placeholder="Prestasi"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>ALASAN</td>
                                <td>
                                    <textarea name="alasan_pendaftaran" id="alasan_pendaftaran" class="form-control"
                                        rows="3" required="required" placeholder="Alasan Mendaftar"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
                    <a href="<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran" class="btn btn-primary btn-block "
                        type="button" id="btn_kembali">KEMBALI</a>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

        <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List pendaftaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
                <div class="table-responsive">
                <table  id="tbl_pendaftaran" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID DAFTAR</th>
                            <th>NAMA LENGKAP</th>
                            <th>TTL</th>
                            <th>ALAMAT</th>
                            <th>TANGGAL DAFTAR</th>
                            <th>FOTO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($data_pendaftaran))
                            {
                                foreach($data_pendaftaran as $a)
                                {   
                                    echo '<tr>
                                            <td class="id_pendaftaran">'.$a['id_pendaftaran'].'</td>
                                            <td>'.$a['n_pendaftaran'].'</td> 
                                            <td>'.$a['t_pendaftaran'].', '.$a['tl_pendaftaran'].'</td> 
                                            <td>'.$a['alamat_pendaftaran'].'</td> 
                                            <td>'.$a['tgl_pendaftaran'].'</td>
                                            <td style="align:center;">';

                                            if($a['foto_pendaftaran']!="")
                                            {
                                                echo '
                                                <img width="100px"  src="'.base_url().'/assets/upload/santri/'.$a['foto_pendaftaran'].'" class="img-responsive" alt="Image">
                                                <a href="'.base_url().'index.php/modul_pendaftaran/pendaftaran/aksi_hapus_foto_lama/'.$a['id_pendaftaran'].'/'.$a['foto_pendaftaran'].'" >Hapus</a>
                                                ';
                                            }
                                            else
                                            {
                                                echo '<form method="post" id="form_foto" action="'.base_url().'index.php/modul_pendaftaran/pendaftaran/aksi_upload_foto_lama" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_pendaftaran" value="'.$a['id_pendaftaran'].'">
                                                        <label class="btn btn-default btn-file">
                                                            Upload ... <input accept=".jpg, .jpeg" name="foto" id="foto" type="file" style="display: none;">
                                                        </label>
                                                      </form>';
                                            }

                                    echo    '</td>
                                            <td>
                                                    <div class="btn-toolbar" style="width:100%;">
                                                        <div role="group" class="btn-group">
                                                            <a id="btn_detail" href="pendaftaran/detail/'.$a['id_pendaftaran'].'" class="btn btn-default" type="button"><i class="fa fa-list"></i></a>
                                                            <a id="btn_cetak" href="'.base_url().'index.php/modul_pendaftaran/pendaftaran/cetak/'.$a['id_pendaftaran'].'" class="btn btn-warning" type="button"><i class="fas fa-print    "></i></a>
                                                            <button id="btn_hapus" class="btn btn-danger" type="button"><i class="far fa-trash-alt"></i></button>
                                                        </div>
                                                    </div>
                                            </td> 
                                        </tr>';
                                }
                            }
                            else
                            {
                                echo '<tr><td colspan="5"align="center">TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>';
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
        //$('.js-example-basic-single').select2();
        //$('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
        CKEDITOR.replace('alamat_pendaftaran', {
            toolbar: []
        });
        CKEDITOR.replace('org_pendaftaran', {
            toolbar: []
        });
        CKEDITOR.replace('prestasi_pendaftaran', {
            toolbar: []
        });
        CKEDITOR.replace('alasan_pendaftaran', {
            toolbar: []
        });
        // $("#tambah_data_santri_lama_form").hide();
        $('#tbl_pendaftaran').DataTable({
       'paging'      : true,
       'lengthChange': true,
       'searching'   : true,
       'ordering'    : false,
       'info'        : true,
       'autoWidth'   : true
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
                        url: "<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/aksi_tambah_pendaftaran_lama",
                        dataType: "JSON",
                        data: {
                            id_pendaftaran          : $("#id_pendaftaran").val(),
                            n_pendaftaran           : $("#n_pendaftaran").val(),
                            nl_pendaftaran          : $("#nl_pendaftaran").val(),
                            t_pendaftaran           : $("#t_pendaftaran").val(),
                            tl_pendaftaran          : $("#tl_pendaftaran").val(),
                            instansi_pendaftaran    : $("#instansi_pendaftaran").val(),
                            alamat_pendaftaran      : CKEDITOR.instances['alamat_pendaftaran'].getData(),
                            telp_pendaftaran        : $("#telp_pendaftaran").val(),
                            email_pendaftaran       : $("#email_pendaftaran").val(),
                            org_pendaftaran         : CKEDITOR.instances['org_pendaftaran'].getData(),
                            prestasi_pendaftaran    : CKEDITOR.instances['prestasi_pendaftaran'].getData(),
                            alasan_pendaftaran      : CKEDITOR.instances['alasan_pendaftaran'].getData(),
                            tgl_pendaftaran          : $("#tgl_masuk").val(),
                        },
                        success: function (data) {
                            console.log(data);
                            if (data == true) {
                                $.alert('Data Tersimpan');
                                window.location.href =
                                    "<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/tambah_santri_lama";
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
    });$("#tgl_masuk").change(function () { 
        var tgl_msk=$("#tgl_masuk").val().replace('-', '').replace('-', '');
        //$("#id_pendaftaran").val(tgl_msk);
        $.ajax({
            type        : "post",
            url         : "<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/get_santri_exist",
            data        : {tgl_masuk:tgl_msk},
            dataType    : "json",
            success: function (data) {
                console.log(data);
                $("#id_pendaftaran").val('SA'+tgl_msk+(data+1))
            },
            error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
            }
        });
    });

$("body").on("click","#btn_hapus", function () {
    var row = $(this).closest("tr");    // Find the row
    var id_pendaftaran = row.find(".id_pendaftaran").text(); // Find the text
    // $.alert(id_pendaftaran);
    $.confirm({
            theme   : 'material',
            type    : 'red',
            title   : 'Confirm!',
            content : 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/aksi_hapus_pendaftaran",
                        data: {id_pendaftaran:id_pendaftaran},
                        dataType: "JSON",
                        success: function (data) {
                            console.log(data);
                            if(data['db']==true)
                            {
                                $.alert('hapus berhasil');
                                location.reload();
                            }
                            else
                            {
                                $.alert('hapus gagal');
                            }
                        },
                        error: function(xhr, textStatus, error) {
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

$("#foto").change(function (e) { 
    e.preventDefault();
    $("#form_foto").submit();
});
</script>