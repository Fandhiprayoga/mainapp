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
        History Daftar Ulang
        <small>Halaman kelola daftar ulang yg telah terdaftar sebagai santri</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list daftar ulang</a></li>
        <li><a href="#">list Histori daftar ulang</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">List History daftar ulang</h3>

                <div class="box-tools pull-right">
                    <a class="btn btn-danger" style="height:30px;" href="javascript:history.back()" role="button"><i
                            class="ion-android-arrow-back"></i>&nbsp; Kembali</a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="pull-right">

                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table" id="tbl_daftar_ulang" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID DAFTAR</th>
                                <th>NAMA LENGKAP</th>
                                <th>FILE IJAZAH TERAKHIR</th>
                                <th>FILE KK</th>
                                <th>FILE BUKTI BAYAR INFAK</th>
                                <th>FILE SURAT YATIM</th>
                                <th>DETAIL PENDAFTAR</th>
                                <th>STATUS CETAK</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            if(count($data_daftar_ulang))
                            {
                                $i=1;
                                foreach($data_daftar_ulang as $a)
                                {
                                    echo '<tr>
                                            <td style="" class="id_daftar_ulang" id_du="'.$a['id_daftar_ulang'].'">'.$i.'</td>
                                            <td class="id_pendaftaran" >'.$a['id_pendaftaran'].'</td>
                                            <td>'.$a['n_pendaftaran'].'</td>';

                                            if($a['ijazah_daftar_ulang']=="")
                                            {
                                                echo    '<td class="ijazah"><a href="'.base_url().'index.php/modul_pendaftaran/daftar_ulang/tambah/'.$a['id_pendaftaran'].'/ijazah" id="btn_upload" type="button" class="btn btn-large btn-block btn-warning" >UPLOAD...</a></td>';
                                            }
                                            else
                                            {
                                                echo    '<td class="ijazah">
                                                <a type="button" class="btn btn-large btn-block btn-success" file="'.$a['ijazah_daftar_ulang'].'" href="'.base_url().'assets/upload/ijazah/'.$a['ijazah_daftar_ulang'].'">LIHAT</a>
                                                <button type="button" id="btn_hapus" class="btn btn-large btn-block btn-danger" href="">HAPUS</button>
                                                </td>';
                                            }

                                            if($a['kk_daftar_ulang']=="")
                                            {
                                                echo    '<td class="kk"><a href="'.base_url().'index.php/modul_pendaftaran/daftar_ulang/tambah/'.$a['id_pendaftaran'].'/kk" id="btn_upload" type="button" class="btn btn-large btn-block btn-warning" href="#">UPLOAD...</a></td>';
                                            }
                                            else
                                            {
                                                echo    '<td class="kk">
                                                <a type="button" class="btn btn-large btn-block btn-success" file="'.$a['kk_daftar_ulang'].'" href="'.base_url().'assets/upload/kk/'.$a['kk_daftar_ulang'].'">LIHAT</a>
                                                <button type="button" id="btn_hapus" class="btn btn-large btn-block btn-danger" href="">HAPUS</button>
                                                </td>';
                                            }
                                            
                                            if($a['infaq_daftar_ulang']=="")
                                            {
                                                echo    '<td class="infaq"><a href="javascript:void(0)" id="btn_upload" type="button" class="btn btn-large  btn-block btn-warning" href="#" >BELUM BAYAR</a></td>';
                                            }
                                            else if($a['infaq_daftar_ulang']=="santri_lama")
                                            {
                                                echo    '<td class="infaq"><a href="javascript:void(0)" id="btn_upload" type="button" class="btn btn-large  btn-block btn-success" href="#" >SANTRI LAMA</a></td>';
                                            }
                                            else
                                            {
                                                echo    '<td class="infaq">
                                                <a type="button" class="btn btn-large btn-block btn-success" file="'.$a['infaq_daftar_ulang'].'" href="'.base_url().'assets/upload/infaq/'.$a['infaq_daftar_ulang'].'">LIHAT</a>
                                                
                                                </td>';
                                            }

                                            if($a['yatim_daftar_ulang']=="")
                                            {
                                                echo    '<td class="yatim"><a href="'.base_url().'index.php/modul_pendaftaran/daftar_ulang/tambah/'.$a['id_pendaftaran'].'/yatim" id="btn_upload" type="button" class="btn btn-large btn-block btn-warning" href="#">UPLOAD...</button></td>';
                                            }
                                            else
                                            {
                                                echo    '<td class="yatim">
                                                <a type="button" class="btn btn-large btn-block btn-success" file="'.$a['yatim_daftar_ulang'].'" href="'.base_url().'assets/upload/yatim/'.$a['yatim_daftar_ulang'].'">LIHAT</a>
                                                <button type="button" id="btn_hapus" class="btn btn-large btn-block btn-danger" href="">HAPUS</button>
                                                </td>';
                                            }
                        
                                    echo    '<td>
                                                
                                                <a href="'.base_url().'index.php/modul_pendaftaran/pendaftaran/cetak/'.$a['id_pendaftaran'].'" type="button" class="btn btn-large btn-block btn-default"><i class="fas fa-list-alt"></i></a>
                                                
                                            </td>
                                            <td class="cetak" align="center"><input type="checkbox" name="cetak" id="cetak2"></td>';
                                    
                                    echo    '</tr>';
                                    $i++;
                                }

                            }
                            else
                            {
                                echo '<tr><td colspan="9"align="center">TIDAK ADA DATA YANG BISA DITAMPILKAN</td></tr>';
                            }
                        ?>

                        </tbody>
                    </table>
                    <br>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Perhatian !</strong>
                        <p>Cheklis dahulu diatas pada kolom status cetak yang akan dicetakkan idcardnya</p>
                    </div>
                    <form action="cetak" method="post" id="form_id_pendaftaran">
                    <input type="hidden" name="id_pendaftaran" id="id_pendaftaran">
                    <span><button id="btn_cetak" class="btn btn-danger" stype="submit">CETAK IDCARD</button> <b>&nbsp; <span id="jml_cetak">0</span>
                            data siap cetak idcard</b></span>
                    </form>
                    

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
        $('#tbl_daftar_ulang').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true,

        });
    });

    var setDefaultActive = function () {
        var url = localStorage.getItem("url");
        $('a[href="' + url + '"]').parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().parent().addClass('active');
        $('a[href="' + url + '"]').parent().parent().show();
    }

    setDefaultActive();

    $("body").on("click", "#btn_hapus", function () {
        var row = $(this).closest("tr"); // Find the row
        var id_pendaftaran = row.find(".id_pendaftaran").text();
        var id_daftar_ulang = row.find(".id_daftar_ulang").attr('id_du');
        var cl = $(this).closest("td");
        var kolom = cl.attr('class');
        var file = cl.find('a').attr('file');

        // $.alert(id_daftar_ulang);
        $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menghapusnya ?',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>index.php/modul_pendaftaran/daftar_ulang/aksi_hapus_daftar_ulang",
                        data: {
                            id_pendaftaran: id_pendaftaran,
                            kolom: kolom,
                            file: file,
                            id_daftar_ulang: id_daftar_ulang
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

    $("body").on("click", "#btn_status", function () {
        var row               = $(this).closest("tr"); // Find the row
        var id_pendaftaran    = row.find(".id_pendaftaran").text();
        var id_daftar_ulang   = row.find(".id_daftar_ulang").text();
        var btn               = row.find('#btn_status').attr('disabled');
        // $.alert(id_pendaftaran+' '+id_daftar_ulang);

        if (btn == 'disabled') {
            // gak ngapa-ngapa mhank
        } else {
            $.confirm({
                theme: 'material',
                type: 'red',
                title: 'Confirm!',
                content: 'Anda yakin ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url();?>index.php/modul_pendaftaran/daftar_ulang/aksi_tambah_daftar_ulang_status",
                            data: {
                                id_daftar_ulang: id_daftar_ulang,
                                id_pendaftaran: id_pendaftaran
                            },
                            dataType: "json",
                            success: function (data) {
                                if (data) {
                                    $.alert('Data tersimpan');
                                    location.reload();
                                } else {
                                    $.alert('Data gagal tersimpan');
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
        }

    });

    $('body').on('change', '#cetak', function () {
        var values = [];
        $("#tbl_daftar_ulang input[name=cetak]:checked").each(function () {
            row = $(this).closest("tr");
            values.push({
                id_pendaftaran: row.find(".id_pendaftaran").text(),
            });
        });
        //console.log(values);
        $("#jml_cetak").text(values.length);
        $('[name="id_pendaftaran[]"]').val(JSON.stringify(values));
        console.log(values);
        //!lalalalalalallala akhirnya fix X'
    });

    var values = [];
    $('body').on('change', '#cetak2', function () {
        var row = $(this).closest("tr");
        var id_pendaftaran= row.find(".id_pendaftaran").text();
        if(jQuery.inArray(id_pendaftaran,values)== -1)
        {
            //id tidak ada di array
            values.push(
                id_pendaftaran
            );
        }
        else
        {
            values.splice(jQuery.inArray(id_pendaftaran,values), 1);
        }
    
        //console.log(values);
        $("#jml_cetak").text(values.length);

        $('[name="id_pendaftaran"]').val(values);
        //console.log(jQuery.inArray( id_pendaftaran, values ));
        console.log(values);
        //!lalalalalalallala akhirnya fix X'
    });

    
</script>