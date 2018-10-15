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
      Master data staff
        <small>Halaman kelola staff</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_admin/mst_staff">List data staff</a></li>
        <li><a href="#">Tambah data staff</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah data staff</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form id="submit_tambah">
            <div class="form-group" >
            <?php $a=$this->db->query('select * from mst_staff where substring(id_staff,2,8)="'.date('Y').''.date('m').''.date('d').'"')->num_rows();
                    $b=$a+1;
            ?>
        <p class="help-block">ID STAFF</p><input name="id" type="text" readonly class="form-control" id="id_edit" value="<?php echo date('Y').''.date('m').''.date('d').''.$b;?>" /></div>
   
    <div class="form-group">
        <p class="help-block">NAMA LENGKAP STAFF</p><input name="nama" type="text" class="form-control" id="nama_edit" /></div>
    <div class="form-group">
        <p class="help-block">JENIS KELAMIN</p>
        
        <select name="jk" id="jk_edit" class="form-control" >
            <option value="LAKI-LAKI">LAKI-LAKI</option>
            <option value="PEREMPUAN">PEREMPUAN</option>
        </select>
        
    </div>
    <div class="form-group">
        <p class="help-block">TEMPAT TANGGAL LAHIR</p>
        <input type="text" class="form-control" id="t_edit" name="t"  style="text-transform:uppercase"/>
        <input type="date" class="form-control" id="tl_edit" name="tl">
    </div>
    <div class="form-group">
        <p class="help-block">JABATAN</p>
        <input type="text" class="form-control" id="jabatan_edit" name="jabatan" style="text-transform:uppercase" />
    </div>
    <div class="form-group">
        <p class="help-block">FOTO STAFF</p>
        <input type="file" class="form-control" name="file" id="foto_edit" accept="image/*"/>
    </div>
    <div class="form-group">
        <p class="help-block">ALAMAT</p>
        <textarea name="alamat" id="alamat_edit" class="form-control"></textarea>
    </div>
        <button class="btn btn-danger btn-block " type="submit" id="btn_simpan">SIMPAN</button>
        <a href="<?php echo base_url();?>index.php/modul_admin/mst_staff" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
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

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
            //$('#icon').iconpicker({ hideOnSelect: true,selected: true, });;
            // var hari=new Date().getDate();
            // var bulan=new Date().getMonth();
            // var tahun=new Date().getFullYear(); 
            // console.log(hari+''+bulan+''+tahun);

    });
var setDefaultActive = function() {
    var url = localStorage.getItem("url");
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();
}           

setDefaultActive();


// //Save product
// $('#btn_simpan').on('click',function(){
//         var id_staff        = $("#id_edit").val(); // Find the text
//         var nama_staff      = $('#nama_edit').val();
//         var jk_staff        = $('#jk_edit').val();
//         var jabatan_staff   = $('#jabatan_edit').val();
//         var alamat_staff    = $('#alamat_edit').val();
//         var t_staff         = $('#t_edit').val()
//         var tl_staff        = $('#tl_edit').val();
//         var foto            = $('#foto_edit').val();
//         var id_staff_jabatan=jabatan_staff.substr(0,1)+id_staff;
        
//         // alert(id_staff +nama_staff +jk_staff  +jabatan_staff +alamat_staff +t_staff +tl_staff  +foto );
//             //console.log(id_mst_staff);
//             if(nama_staff ==""||jk_staff ==""||jabatan_staff ==""||alamat_staff ==""||t_staff ==""||tl_staff =="")
//             {
//                 $.alert({theme: 'material',
//                         type: 'red',
//                         title: 'Perhatian !',
//                         content: 'Form tidak boleh ada yg kosong (kecuali foto)!'});
//             }
//             else
//             {
//                 $.ajax({
//                     type: "post",
//                     url: "<?php echo base_url();?>/index.php/modul_admin/mst_staff/aksi_tambah_mst_staf",
//                     data:
//                     dataType: "JSON",
//                     success: function (data) {
//                         $.alert('Simpan berhasil');
//                     },ajax
//                 });
//             }
// 			//alert('tombol kepencet');
//             return false;
//         });
$('#submit_tambah').submit(function(e){
    e.preventDefault(); 
    $.ajax({
                     url:'<?php echo base_url();?>index.php/modul_admin/mst_staff/aksi_tambah_mst_staff',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          $.alert('Tersimpan');
                          console.log(data);
                          window.location.href='<?php echo base_url();?>index.php/modul_admin/mst_staff';
                        },
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);

                        }
                 });
        
});

</script>