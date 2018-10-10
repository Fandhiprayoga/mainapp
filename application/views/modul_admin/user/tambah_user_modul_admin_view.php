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
      user
        <small>Halaman kelola user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="<?php echo base_url();?>index.php/modul_admin/user/">List user</a></li>
        <li><a href="#">Tambah user</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah user</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form>
    <div class="form-group">
        <p class="help-block">Id user (username)</p><input type="text"  class="form-control" id="id" style="text-transform: lowercase;"/></div>
    <div class="form-group">
        <p class="help-block">Nama user</p><input type="text" class="form-control" id="nama" /></div>
    <div class="form-group">
        <p class="help-block">Bagian user</p><input type="text" class="form-control" id="bagian" /></div>
    <div class="form-group">
        <p class="help-block">Group user</p>
        <select class="form-control js-example-basic-single" id="group" style="width:100%;">
        <?php 
            $data_gs=$this->db->query('select * from group_user')->result_array();
            if(count($data_gs))
            {
                foreach($data_gs as $l)
                {
                    echo '<option value="'.$l['id_group_user'].'">'.$l['nama_group_user'].'</option>';
                }
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <p class="help-block">Status Aktif</p>
        <select class="form-control" id="status" style="width:100%;">
            <option value="Aktif">Aktif</option>
            <option value="Tidak">Tidak</option>
        </select>
    </div>
    <div class="form-group">
        <p class="help-block">Password</p>
        <div class="input-group input-group-sm">
                <input class="form-control" id="pass" type="password" style="text-transform: lowercase;">
                <span class="input-group-btn">
                    <a type="button" id="btn_lihat" class="btn btn-danger btn-flat"><i class="far fa-eye"></i></a>
                </span>
        </div>
    </div>
        <button class="btn btn-danger btn-block " type="button" id="btn_simpan">SIMPAN</button>
        <a href="<?php echo base_url();?>index.php/modul_admin/user" class="btn btn-primary btn-block " type="button" id="btn_kembali" >KEMBALI</a>
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
            
    });
var setDefaultActive = function() {
    var url = localStorage.getItem("url");
            $('a[href="'+url+'"]').parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().parent().addClass('active');
            $('a[href="'+url+'"]').parent().parent().show();
}           

setDefaultActive();
//Save product
$('#btn_simpan').on('click',function(){
            var id_user = $('#id').val().split(' ').join('');
            var nama_user = $('#nama').val();
            var bagian_user  = $('#bagian').val();
            var group_user  = $('#group').val();
            var pass_user  = $('#pass').val();
            var status_user  = $('#status').val();
            //console.log(id_user);
            if(id_user ==""||nama_user==""||bagian_user ==""||group_user ==""||pass_user ==""||status_user=="")
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Form tidak boleh ada yg kosong !'});
            }
            else if(pass_user.length>8)
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Panjang PASSWORD lebih dari 8!'});
                $('#pass').parent().parent().addClass('has-error');
            }
            else if(id_user.length>8)
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Panjang ID_USER lebih dari 8!'});
                $('#id').parent().addClass('has-error');
            }
            else if(/^[a-zA-Z0-9- ]*$/.test(id_user) == false)
            {
                $.alert({theme: 'material',
                        type: 'red',
                        title: 'Perhatian !',
                        content: 'Karakter spesial tidak diperbolehkan'});
                
                $('#id').parent().addClass('has-error');
            }
            else
            {
                $.ajax({
                type : "POST",
                url  : "<?php echo base_url();?>index.php/modul_admin/user/get_user_exist",
                dataType : "JSON",
                data : {id_user:id_user},
                success: function(data){
                    if(data.length>0)
                    {
                        $.alert('Username sudah terpakai !');
                    }
                    else
                    {
                        $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url();?>index.php/modul_admin/user/aksi_tambah_user",
                        dataType : "JSON",
                        data : {id_user:id_user,nama_user:nama_user,bagian_user:bagian_user,group_user:group_user,pass_user:pass_user,status_user:status_user},
                        success: function(data){
                            $.alert('Simpan berhasil');
                            window.location.href='<?php echo base_url();?>index.php/modul_admin/user';
                        },
                        error: function(xhr, textStatus, error) {
                            console.log(xhr.responseText);
                            console.log(xhr.statusText);
                            console.log(textStatus);
                            console.log(error);

                        }
                        });
                    }
                },
                error: function(xhr, textStatus, error) {
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

        
 $('body').on('click','#btn_lihat',function(){
    var type= $('#pass').attr('type');
    if(type=="password")
    {
        $('#pass').attr('type','text');
    }
    else
    {
        $('#pass').attr('type','password');
    }
});
</script>