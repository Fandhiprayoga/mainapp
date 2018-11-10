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
        santri
        <small>Halaman kelola data santri</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list santri</a></li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List santri</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-danger" style="height:30px;" id="btn_filter" role="button"><i
                            class="fas fa-print"></i>&nbsp; Cetak Data</a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- <a href="<?php echo base_url();?>index.php/modul_pendaftaran/santri/tambah" style="margin-bottom:10px;"
                    class="btn btn-danger" type="button"><i class="fa fa-plus"></i> Tambah data santri</a> -->
                <div id="filter_row">
                        <div class="box box-default box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Cetak Data Santri</h3>

                                <div class="box-tools pull-right">
                                    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button> -->
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                
                                <form  role="form">
                                    <div class="form-group">
                                        <label for="">Status Yatim</label>
                                        
                                        <select name="" id="status_yatim_cetak" class="form-control">
                                            <option value="SEMUA">Pilih Semua</option>
                                            <option value="YA">Ya</option>
                                            <option value="TIDAK">Tidak</option>
                                        </select>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="">Status Santri</label>
                                        <select name="" id="status_santri_cetak" class="form-control">
                                            <option value="SEMUA">Pilih Semua</option>
                                            <option value="AKTIF">Aktif</option>
                                            <option value="KELUAR">Keluar</option>
                                            <option value="LULUS">Lulus</option>
                                        </select>
                                    </div>
                                
                                    <a id="btn_cetak" type="button" class="btn btn-primary">Cetak</a>
                                </form>
                                
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table" id="tbl_santri" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA SANTRI</th>
                                <th>TTL</th>
                                <th>STATUS YATIM</th>
                                <th>DETAIL SANTRI</th>
                                <th>STATUS SANTRI</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($data_santri))
                                {
                                    
                                    $i=1;
                                    foreach($data_santri as $a)
                                    {
                                             $yatim=$this->db->query('select * from daftar_ulang where id_pendaftaran="'.$a['id_santri'].'"')->result_array();
                                        echo '<tr>
                                                <td class="id_santri" id_santri="'.$a['id_santri'].'">'.$i.'</td>
                                                <td class="nama_santri">'.$a['n_santri'].'</td>
                                                <td class="ttl_santri">'.$a['t_santri'].', '.$a['tl_santri'].'</td>';
                                                if($yatim[0]['yatim_daftar_ulang']!="")
                                                {
                                                    echo '<td>Ya</td>';
                                                }
                                                else
                                                {
                                                    echo '<td>Tidak</td>';
                                                }
                                        echo '<td> <a href="'.base_url().'index.php/modul_pendaftaran/pendaftaran/cetak/'.$a['id_santri'].'" type="button" class="btn btn-large btn-block btn-default"><i class="fas fa-list-alt"></i></a> </td>
                                                <td>
                                                <input type="hidden" name="txt_id_santri" id="txt_id_santri" value="'.$a['status_santri'].'">
                                                <select style="width:100%;" name="" id="status_santri" class="form-control" disabled="disabled">';
                                                if($a['status_santri']=="AKTIF")
                                                {
                                                    echo        '<option selected value="AKTIF">AKTIF</option>';
                                                }
                                                else
                                                {
                                                    echo        '<option value="AKTIF">AKTIF</option>';
                                                }

                                                if($a['status_santri']=="KELUAR")
                                                {
                                                    echo        '<option selected value="KELUAR">KELUAR</option>';
                                                }
                                                else
                                                {
                                                    echo        '<option value="KELUAR">KELUAR</option>';
                                                }

                                                if($a['status_santri']=="LULUS")
                                                {
                                                    echo        '<option selected value="LULUS">LULUS</option>';
                                                }
                                                else
                                                {
                                                    echo        '<option value="LULUS">LULUS</option>';
                                                }
                                        echo    '</select>
                                                </td>
                                                
                                                <td>
                                                    <div class="btn-toolbar" style="width:100%;">
                                                        <div role="group" class="btn-group">
                                                            <a id="btn_edit" class="btn btn-default"
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
        $('#tbl_santri').DataTable({
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


    $('body').on('click', '#btn_edit', function () {
        var row = $(this).closest("tr"); // Find the row
        $("[id='status_santri']").attr("disabled", true);
        var t = row.find("#status_santri").attr('disabled', false);

    });

    $("body").on("change", "#status_santri", function () {
        var row = $(this).closest("tr"); // Find the row
        var id_santri = row.find('.id_santri').attr('id_santri');
        var t = row.find("#status_santri").val();

        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_pendaftaran/santri/aksi_edit_status",
            data: {
                id_santri: id_santri,
                status_santri: t
            },
            dataType: "json",
            success: function (data) {
                if (data) {
                    $.alert('Status berhasil berubah');
                    location.reload();
                } else {
                    $.alert('status gagal diubah');
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

    $("#btn_filter").click(function (e) { 
        e.preventDefault();
        $("#filter_row").toggle(1000);
    });

    $("#btn_cetak").click(function (e) { 
        e.preventDefault();
        var status_yatim=$("#status_yatim_cetak").val();
        var status_santri=$("#status_santri_cetak").val();

        window.open('<?php echo base_url();?>index.php/modul_pendaftaran/santri/cetak/'+status_yatim+'/'+status_santri, 'Cetak data santri'); 
    });
</script>