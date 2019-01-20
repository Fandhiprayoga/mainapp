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
        Master organisasi yayasan
        <small>Halaman kelola yayasan</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fas fa-home"></i>
                Beranda</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>index.php/modul_admin/mst_donatur">Data organisasi yayasan</a>
        </li>

    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="container-fluid">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah data organisasi yayasan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php $a=$this->db->query("select * from mst_org_yayasan where substring(id_org_yayasan,1,8)='".date('Y')."".date('m')."".date('d')."'")->num_rows();
                    $b=$a+1;
            ?>
                <div class="form-group">
                    <p class="help-block">ID</p><input name="ID" type="text" class="form-control" id="id" value="<?php echo date('Y').''.date('m').''.date('d').''.$b;?>" readonly/></div>
                <div class="form-group">
                    <p class="help-block">NAMA LENGKAP</p><input name="nama" type="text" class="form-control" id="nama"/></div>
                <div class="form-group">
                    <p class="help-block">JENIS KELAMIN</p>
                    
                    <select name="" id="jk" class="form-control">
                      <option value="">-- Select One --</option>
                      <option value="Laki-laki">LAKI-LAKI</option>
                      <option value="Perempuan">PEREMPUAN</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <p class="help-block">TEMPAT TANGGAL LAHIR</p><input name="nama" type="text" class="form-control" id="t"/></div>
                    <input class="form-control" type="date" id="tl"/>
                <div class="form-group">
                
                <div class="form-group">
                    <p class="help-block">JABATAN</p><input name="nama" type="text" class="form-control" id="jabatan"/></div>
                
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
                                <th>ID </th>
                                <th>NAMA LENGKAP</th>
                                <th>JK</th>
                                <th>TEMPAT LAHIR</th>
                                <th>TANGGAL LAHIR</th>
                                <th>JABATAN</th>
                                <th>ALAMAT</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                        if(count($data_mst_org_yayasan))
                        {
                            $i=1;
                            foreach($data_mst_org_yayasan as $d)
                            {
                                echo '<tr>
                                        <td id_org_yayasan="'.$d['id_org_yayasan'].'" class="id_org_yayasan">'.$i.'</td>
                                        <td>'.$d['id_org_yayasan'].'</td>
                                        <td class="nama">'.$d['nama'].'</td>
                                        <td class="jk">'.$d['jk'].'</td>
                                        <td class="ttl" t="'.$d['tempat_lahir'].'" tl="'.$d['tanggal_lahir'].'">'.$d['tempat_lahir'].', '.$d['tanggal_lahir'].'</td>
                                        <td class="jabatan" jabatan="'.$d['jabatan'].'">'.$d['jabatan'].'</td>
                                        <td class="alamat" alamat="'.$d['alamat'].'">'.$d['alamat'].'</td>
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
                <h4 class="modal-title">Edit data org yayasan</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                    <p class="help-block">ID</p><input name="ID" type="text" class="form-control" id="id_edit" value="" readonly/></div>
                <div class="form-group">
                    <p class="help-block">NAMA LENGKAP</p><input name="nama" type="text" class="form-control" id="nama_edit"/></div>
                <div class="form-group">
                    <p class="help-block">JENIS KELAMIN</p>
                    
                    <select name="" id="jk_edit" class="form-control">
                      <option value="">-- Select One --</option>
                      <option value="Laki-laki">LAKI-LAKI</option>
                      <option value="Perempuan">PEREMPUAN</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <p class="help-block">TEMPAT TANGGAL LAHIR</p><input name="nama" type="text" class="form-control" id="t_edit"/></div>
                    <input class="form-control" type="date" id="tl_edit"/>
                <div class="form-group">
                
                <div class="form-group">
                    <p class="help-block">JABATAN</p><input name="nama" type="text" class="form-control" id="jabatan_edit"/></div>
                
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
        var id = $('#id').val();
        var nama = $('#nama').val();
        var jk = $('#jk').val();
        var tempat_lahir = $('#t').val();
        var tanggal_lahir = $('#tl').val();
        var jabatan = $('#jabatan').val();
        var alamat = $('#alamat').val();

        if (nama == "" || jk == "" || tempat_lahir == ""||tanggal_lahir == ""||jabatan==""||alamat=="") {
            $.alert(
                {theme: 'material', type: 'red', title: 'Perhatian !', content: 'Form tidak boleh ada yg kosong!'}
            );
        } else {
            $.ajax({
                type: "post",
                url: "<?php echo base_url();?>/index.php/modul_keuangan_yayasan/mst_org_yayasan/aksi_tam" +
                        "bah_mst_org_yayasan",
                data: {
                    id_org_yayasan: id,
                    nama: nama,
                    jk: jk,
                    tempat_lahir:tempat_lahir,
                    tanggal_lahir:tanggal_lahir,
                    jabatan:jabatan,
                    alamat:alamat,
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
        var id_org_yayasan = row
            .find(".id_org_yayasan")
            .attr('id_org_yayasan'); // Find the text
        // alert(id_donatur);
        $.ajax({
            type: "post",
            url: "<?php echo base_url();?>index.php/modul_keuangan_yayasan/mst_org_yayasan/aksi_hapu" +
                    "s_mst_org_yayasan",
            data: {
                id_org_yayasan: id_org_yayasan
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
        var id_org_yayasan= row .find(".id_org_yayasan").attr('id_org_yayasan'); // Find the text
        var nama=row.find(".nama").text();
        var jk=row.find(".jk").text();
        var tempat_lahir=row.find(".ttl").attr('t');
        var tanggal_lahir=row.find(".ttl").attr('tl');
        var jabatan=row.find(".jabatan").text();
        var alamat=row.find(".alamat").text();

        // alert(id_donatur+nama_donatur+telp_donatur+alamat_donatur);
        $("#id_edit").val(id_org_yayasan);
        $("#nama_edit").val(nama);
        $("#jk_edit").val(jk);
        $("#t_edit").val(tempat_lahir);
        $("#tl_edit").val(tanggal_lahir);
        $("#jabatan_edit").val(jabatan);
        $("#alamat_edit").val(alamat);

    });

    $("body").on("click","#btn_simpan_edit", function () {
        var id_org_yayasan= $("#id_edit").val();
        var nama = $('#nama_edit').val();
        var jk = $('#jk_edit').val();
        var alamat = $('#alamat_edit').val();
        var tempat_lahir=$('#t_edit').val();
        var tanggal_lahir=$('#tl_edit').val();
        var jabatan=$("#jabatan_edit").val();
        // alert(nama_donatur+telp_donatur+alamat_donatur+id);
        
        $.ajax({
          type: "post",
          url: "<?php echo base_url();?>index.php/modul_keuangan_yayasan/mst_org_yayasan/aksi_edit_mst_org_yayasan",
          data: {id_org_yayasan:id_org_yayasan,nama:nama,jk:jk,alamat:alamat,tempat_lahir:tempat_lahir,tanggal_lahir:tanggal_lahir,jabatan:jabatan},
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