<link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/select2/dist/css/select2.min.css">
<link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/iCheck/all.css">
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        group_priv
        <small>Halaman kelola group_priv</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
        <li><a href="#">list group_priv</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="container-fluid">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">List group_priv</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <!---------select group user---------->
            <div class="input-group">
                <select class="form-control js-example-basic-single" id="group_user" style="width:100%;">
                    <option></option>
                    <?php
                        $dgu=$this->db->query('select * from group_user')->result_array();
                        if(count($dgu))
                        {
                            foreach($dgu as $a)
                            {
                                echo '<option value="'.$a['id_group_user'].'">'.$a['nama_group_user'].'</option>';
                            }
                        }
                    ?>
                </select>
                <div class="input-group-btn">
                    <button id="btn_pilih_gu" type="button" class="btn btn-danger" style="height:28px;">PILIH</button>
                </div>
                <!-- /btn-group -->
            </div>
            <!---------/select group user---------->
            <hr >
            <!---------div modul2---------->
            <body>
                <div class="table-responsive">
                    <table class="table" class="table table-bordered table-hover" id="tbl_modul_priv">
                        <thead>
                            <tr>
                                <th align="center">NO</th>
                                <th style="display: none;width:0px;">ID</th>
                                <th align="center"style="display: none;width:0px;">ID MODUL</th>
                                <th align="center">NAMA MODUL</th>
                                <th style="display: none;width:0px;">ID MENU</th>
                                <th>NAMA MENU</th>
                                <th>NAMA SUBMENU</th>
                                <th align="center">HAK AKSES</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            <?php
                                $ds=$this->group_priv_model->get_submenu();
                                $hide_modul='';
                                $hide_menu='';
                               

                                if(count($ds))
                                {
                                    $i=1;
                                    foreach($ds as $x)
                                    {
                                                if($hide_modul==$x['nama_modul'])
                                                {
                                                    echo '<tr>';
                                                }
                                                else
                                                {
                                                    echo '<tr bgcolor="#FEFAFA">';
                                                }
                                        
                                        echo   '<td >'.$i.'</td>
                                                <td style="display: none;width:0px;">'.$x['id_submenu'].'</td>
                                                <td style="display: none;width:0px;">'.$x['id_modul'].'</td>';
                                                if($hide_modul==$x['nama_modul'])
                                                {
                                                    echo   '<td style="visibility: hidden;">'.$x['nama_modul'].'</td>';
                                                }
                                                else
                                                {
                                                    echo   '<td>'.$x['nama_modul'].'</td>';
                                                }
                                        
                                        echo   '<td style="display: none;width:0px;">'.$x['id_menu'].'</td>';
                                                if($hide_menu==$x['nama_menu'])
                                                {
                                                    echo   '<td style="visibility: hidden;">'.$x['nama_menu'].'</td>';
                                                }
                                                else
                                                {
                                                    echo   '<td>'.$x['nama_menu'].'</td>';
                                                }
                                        
                                        echo   '<td>'.$x['nama_submenu'].'</td>
                                                <td >
                                                    <label>
                                                        <input type="checkbox" class="minimal-red" id="#is_priv" disabled>
                                                    </label>
                                                </td>
                                            </tr>';
                                            $i++;
                                            $hide_modul=$x['nama_modul'];
                                            $hide_menu=$x['nama_menu'];
                                    }
                                }
                            ?>
                           
                        </tbody>
                    </table>
                </div>
            </body>
            <!---------/div modul2---------->
            
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
<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>

<script>
$(document).ready(function() {
    //$('#icon_edit').iconpicker({ hideOnSelect: true,selected: true, });
    $('.js-example-basic-single').select2();

    $('#tbl_modul_priv').DataTable({
      'paging'      : false,
      'scrollY'     : 230,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'retrieve'    : true,
      
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    });
});

$('body').on('click','#btn_pilih_gu',function(){
    var id_group_user                           = $('#group_user').val();
    
    $.ajax({
                type                            : "POST",
                url                             : "<?php echo base_url();?>index.php/modul_admin/group_priv/get_submenu_param",
                dataType                        : "JSON",
                data                            : {id_group_user:id_group_user},
                success: function(data){
                    //console.log(data);
                    var html                    = '';
		            var i;
                    var x;
                    var hide_modul;
                    var hide_menu;
		            for(i=0; i<data.length; i++){
                        if(hide_modul==data[i].nama_modul)
                        {
                            html                += '<tr>';
                        }
                        else
                        {
                            html                += '<tr bgcolor="#FEFAFA">';
                        }
		                
                            html                += '<td>'+(i+1)+'</td>';
                            html                += '<td id="id_submenu" style="display: none;width:0px;">'+data[i].id_submenu+'</td>';
                            html                += '<td id="id_modul" style="display: none;width:0px;">'+data[i].id_modul+'</td>';
                            if(hide_modul==data[i].nama_modul)
                            {
                                html            += '<td style="visibility:hidden;width:0px;">'+data[i].nama_modul+'</td>';
                            }
                            else
                            {
                                html            += '<td>'+data[i].nama_modul+'</td>';
                            }
                            
                            html                += '<td id="id_menu" style="display: none;width:0px;">'+data[i].id_menu+'</td>';
                            if(hide_menu==data[i].nama_menu)
                            {
                                html            += '<td style="visibility:hidden;width:0px;">'+data[i].nama_menu+'</td>';
                            }
                            else
                            {
                                html            += '<td>'+data[i].nama_menu+'</td>';
                            }
                            
                            html                += '<td>'+data[i].nama_submenu+'</td>';
                            html                += '<td >';
                                if(data[i].is_priv==1)
                                {
                                    html        += '<label><input type="checkbox" class="minimal-red" id="is_priv" checked></label>';
                                }
                                else
                                {
                                    html        += '<label><input type="checkbox" class="minimal-red" id="is_priv"></label>';
                                }                  
                            html                += '</td>';
                        html                    += '</tr>';
                        hide_modul              = data[i].nama_modul;
                        hide_menu               = data[i].nama_menu;
		            }
		            $('#show_data').html(html);
                    $('#tbl_modul_priv').DataTable({
                        'paging'                : false,
                        'scrollY'               : 230,
                        'lengthChange'          : true,
                        'searching'             : false,
                        'ordering'              : false,
                        'info'                  : true,
                        'autoWidth'             : true,
                        'retrieve'              : true,
                        
                    });

                     $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                        checkboxClass           : 'icheckbox_minimal-red',
                    });
                    
                        $('input').on('ifChecked', function(event){
                            var row           = $(this).closest("tr");
                            var is_priv       = 1;
                            var id_group_user = $('#group_user').val();
                            var id_submenu    = row.find("#id_submenu").text();
                            //$.alert(chk+' '+id_group_user+' '+id_submenu);
                            proses_cek(id_group_user,id_submenu,is_priv);
                        });

                        $('input').on('ifUnchecked', function(event){
                            var row           = $(this).closest("tr");
                            var is_priv       = 0;
                            var id_group_user = $('#group_user').val();
                            var id_submenu    = row.find("#id_submenu").text();
                            //$.alert(chk+' '+id_group_user+' '+id_submenu);
                            proses_cek(id_group_user,id_submenu,is_priv);
                        });
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);

                  }
                });
});

function proses_cek(id_group_user,id_submenu,is_priv)
{
    $.ajax({
                                type        : "POST",
                                url         : "<?php echo base_url();?>index.php/modul_admin/group_priv/cek_eksis",
                                dataType    : "JSON",
                                data        : {id_group_user:id_group_user,id_submenu:id_submenu},
                                success : function(data){
                                        console.log(data);
                                        if(data.length<1)
                                        {
                                            //$.alert('data belum ada');
                                            $.ajax({
                                                    type        : "POST",
                                                    url         : "<?php echo base_url();?>index.php/modul_admin/group_priv/aksi_tambah_group_priv",
                                                    dataType    : "JSON",
                                                    data        : {id_group_user:id_group_user,id_submenu:id_submenu,is_priv},
                                                    success : function(data){
                                                            $.alert('Data tersimpan');
                                                    },
                                                    error: function(xhr, textStatus, error){
                                                        console.log(xhr.responseText);
                                                        console.log(xhr.statusText);
                                                        console.log(textStatus);
                                                        console.log(error);
                                                        $.alert('Data gagal tersimpan');
                                                    }
                                            });
                                        }
                                        else
                                        {
                                             //$.alert('data  sudah ada');
                                             $.ajax({
                                                    type        : "POST",
                                                    url         : "<?php echo base_url();?>index.php/modul_admin/group_priv/aksi_edit_group_priv",
                                                    dataType    : "JSON",
                                                    data        : {id_group_user:id_group_user,id_submenu:id_submenu,is_priv},
                                                    success : function(data){
                                                            $.alert('Data tersimpan');
                                                    },
                                                    error: function(xhr, textStatus, error){
                                                        console.log(xhr.responseText);
                                                        console.log(xhr.statusText);
                                                        console.log(textStatus);
                                                        console.log(error);
                                                        $.alert('Data gagal tersimpan');
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


</script>