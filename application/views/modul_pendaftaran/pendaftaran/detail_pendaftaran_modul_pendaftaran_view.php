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
      pendaftaran
        <small>Halaman detail Pendaftaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran">List pendaftaran</a></li>
        <li><a href="#">Detail pendaftaran</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Pendaftaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                
            <div class="pull-right">
                    
                    <button type="button" id="btn_editable"  class="btn btn-large btn-block btn-success"> <i class="fas fa-edit    "></i> Ijinkan Pengeditan</button>
                    <br>
            </div>
            <form id="form_pendaftaran">
                <table class="table table-hover">
                    <tbody>
                        <?php 
                            $a=$this->db->query("select * from pendaftaran where id_pendaftaran='".$id_pendaftaran."'")->result_array();
                        ?>
                        <tr>
                            <td>ID PENDAFTARAN</td>
                            <td>
                                <input type="text" name="id_pendaftaran" id="id_pendaftaran" class="form-control" value="<?php echo $id_pendaftaran;?>" required="required"  disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>NAMA LENGKAP</td>
                            <td>
                                <input type="text" name="n_pendaftaran" id="n_pendaftaran" class="form-control" value="<?php echo $a[0]['n_pendaftaran']?>" required="required"  disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>NAMA PANGGILAN</td>
                            <td>
                                <input type="text" name="nl_pendaftaran" id="nl_pendaftaran" class="form-control" value="<?php echo $a[0]['nl_pendaftaran']?>" required="required"  disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td>
                                <input type="text" name="t_pendaftaran" id="t_pendaftaran" class="form-control" value="<?php echo $a[0]['t_pendaftaran']?>" required="required"  disabled>
                                <input type="date" name="tl_pendaftaran" id="tl_pendaftaran" class="form-control" value="<?php echo $a[0]['tl_pendaftaran']?>" required="required" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>INSTANSI/FAK/JUR</td>
                            <td>
                                <input type="text" name="instansi_pendaftaran" id="instansi_pendaftaran" class="form-control" value="<?php echo $a[0]['instansi_pendaftaran']?>" required="required"  disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td>
                                <textarea name="alamat_pendaftaran" id="alamat_pendaftaran" class="form-control" rows="3" required="required" disabled><?php echo $a[0]['alamat_pendaftaran']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>NO TELP</td>
                            <td>
                                <input type="text" name="telp_pendaftaran" id="telp_pendaftaran" class="form-control" value="<?php echo $a[0]['telp_pendaftaran']?>" required="required"  disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>EMAIL / FB</td>
                            <td>
                                <input type="text" name="email_pendaftaran" id="email_pendaftaran" class="form-control" value="<?php echo $a[0]['email_pendaftaran']?>" required="required"  disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>PENGALAMAN ORGANISASI</td>
                            <td>
                                <textarea name="org_pendaftaran" id="org_pendaftaran" class="form-control" rows="3" required="required" disabled><?php echo $a[0]['org_pendaftaran']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>PRESTASI</td>
                            <td>
                                <textarea name="prestasi_pendaftaran" id="prestasi_pendaftaran" class="form-control" rows="3" required="required" disabled><?php echo $a[0]['prestasi_pendaftaran']?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>ALASAN</td>
                            <td>
                            <textarea name="alasan_pendaftaran" id="alasan_pendaftaran" class="form-control" rows="3" required="required" disabled><?php echo $a[0]['alasan_pendaftaran']?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <button class="btn btn-danger btn-block " type="button" id="btn_simpan" disabled>SIMPAN PERUBAHAN DATA</button>
                <a href="<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
            </form>
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
$(document).ready(function() {
    // $('.js-example-basic-single').select2();
    //$('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
    CKEDITOR.replace('alamat_pendaftaran',{
    toolbar: []});
    CKEDITOR.replace('org_pendaftaran',{
    toolbar: []});
    CKEDITOR.replace('prestasi_pendaftaran',{
    toolbar: []});
    CKEDITOR.replace('alasan_pendaftaran',{
    toolbar: []});
});
var setDefaultActive = function() {
    var url = localStorage.getItem("url");
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();
}           

setDefaultActive();


$("#btn_editable").click(function (e) { 
    e.preventDefault();
    editable();
});

function editable()
{
    $("#btn_editable").attr("disabled", "disabled");
    $("#btn_simpan").removeAttr("disabled");

    $("#n_pendaftaran").removeAttr("disabled");
    $("#nl_pendaftaran").removeAttr("disabled");
    $("#t_pendaftaran").removeAttr("disabled");
    $("#tl_pendaftaran").removeAttr("disabled");
    $("#instansi_pendaftaran").removeAttr("disabled");
    $("#alamat_pendaftaran").removeAttr("disabled");
    $("#telp_pendaftaran").removeAttr("disabled");
    $("#email_pendaftaran").removeAttr("disabled");
    $("#org_pendaftaran").removeAttr("disabled");
    $("#prestasi_pendaftaran").removeAttr("disabled");
    $("#alasan_pendaftaran").removeAttr("disabled");

    CKEDITOR.instances['alamat_pendaftaran'].setReadOnly(false);
    CKEDITOR.instances['org_pendaftaran'].setReadOnly(false);
    CKEDITOR.instances['prestasi_pendaftaran'].setReadOnly(false);
    CKEDITOR.instances['alasan_pendaftaran'].setReadOnly(false);
}

$("#btn_simpan").click(function (e) { 
    $.confirm({
            theme: 'material',
            type: 'red',
            title: 'Confirm!',
            content: 'Anda yakin akan menyimpan perubahan ?',
            buttons: {
                confirm: function () {
                    
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url();?>index.php/modul_pendaftaran/pendaftaran/aksi_edit_pendaftaran",
                        dataType : "JSON",
                        data : {
                            id_pendaftaran:$("#id_pendaftaran").val(),
                            n_pendaftaran:$("#n_pendaftaran").val(),
                            nl_pendaftaran:$("#nl_pendaftaran").val(),
                            t_pendaftaran:$("#t_pendaftaran").val(),
                            tl_pendaftaran:$("#tl_pendaftaran").val(),
                            instansi_pendaftaran:$("#instansi_pendaftaran").val(),
                            alamat_pendaftaran:CKEDITOR.instances['alamat_pendaftaran'].getData(),
                            telp_pendaftaran:$("#telp_pendaftaran").val(),
                            email_pendaftaran:$("#email_pendaftaran").val(),
                            org_pendaftaran:CKEDITOR.instances['org_pendaftaran'].getData(),
                            prestasi_pendaftaran:CKEDITOR.instances['prestasi_pendaftaran'].getData(),
                            alasan_pendaftaran:CKEDITOR.instances['alasan_pendaftaran'].getData(),
                        },
                        success: function(data){
                            console.log(data);
                            if(data)
                            {
                                $.alert('Data Tersimpan');
                                history.back();
                            }
                            else
                            {
                                $.alert('Data Gagal Tersimpan');
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

</script>