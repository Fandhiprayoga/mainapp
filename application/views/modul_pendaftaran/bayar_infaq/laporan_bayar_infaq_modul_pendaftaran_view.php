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
                Pembayaran Infaq
                <small>Halaman kelola Pemabayaran infaq calon santri</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="#">list bayar infaq</a></li>

         </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

         <div class="container-fluid">
                  <div class="box box-danger">
                           <div class="box-header with-border">
                                    <h3 class="box-title">List bayar infaq</h3>
            
                                    <div class="box-tools pull-right">
                                             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>  </button>
                                    </div>
                                    <!-- /.box-tools -->
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                                    <br>
                                    <div>

                                             <div>
                                                      <!-- Nav tabs -->
                                                      <ul class="nav nav-tabs">
                                                               <li ><a href="<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq#">INFAQ CALON SANTRI</a></li>
                                                               <li ><a href="<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/santri_lama#">INFAQ SANTRI</a></li>
                                                               <li class="active" ><a href="#">CETAK LAPORAN</a></li>
                                                      </ul>
                                             </div>
                                             
                    
                     
                
                <hr>  
                
                

                                    </div class="container-fluid">
                                    
                                    <select  style="width:100%;" name="" id="data_infaq" class="form-control js-example-basic-single" required="required">
                                            <option value="">-- PILIH PERIODE/TAHUN INFAQ --</option>
                                            <?php
                                                $a=$this->db->query('select * from mst_infaq order by id_infaq desc')->result_array();
                                                if(count($a))
                                                {
                                                    foreach($a as $a)
                                                    {
                                                        echo '<option value="'.$a['id_infaq'].'">'.$a['nama_infaq'].' | nominal : '.$a['nominal_infaq'].'</option>';
                                                    }
                                                }
                                            ?>
                                    </select>
                                    <br>
                                    <br>
                                    
                                    <select style="width:100%;" name="" id="data_santri" class="form-control js-example-basic-single">
                                                <option value="">-- PILIH STATUS SANTRI --</option>
                                                <option value="0">CALON SANTRI</option>
                                                <option value="1">SANTRI LAMA</option>
                                    </select>
                                    <br>
                                    <br>
                                    
                                    <select style="width:100%;" name="" id="data_bayar" class="form-control js-example-basic-single">
                                                <option value="">-- PILIH STATUS BAYAR --</option>
                                                <option value="0">BELUM BAYAR</option>
                                                <option value="1">SUDAH BAYAR</option>
                                    </select>
                                    
                                    <br>
                                    <br>
                                    <a class="btn btn-large btn-block btn-warning" href="#" role="button" id="btn_cetak_laporan">Cetak</a>
                                    <br>
                                    <br>

                           </div>
                           <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
         </div>


</section>
<!-- /.content -->
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal_edit'>Trigger modal</a> -->
<div class="modal fade" id="modal_edit">
         <div class="modal-dialog">
                  <div class="modal-content">
                           <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Edit data</h4>
                           </div>
                           <div class="modal-body">
                                    <form id="form_bayar_infaq">

                                             <input type="hidden" name="id_bayar_infaq_edit" id="id_bayar_infaq_edit"
                                                      class="form-control" REQUIRED readonly>

                                             <div class="form-group">
                                                      <label for="">NAMA/KET bayar_infaq</label>
                                                      <input type="text" class="form-control" id="nama_edit"
                                                               placeholder="nama / keterangan nominal bayar_infaq"
                                                               REQUIRED>
                                             </div>

                                             <div class="form-group">
                                                      <label for="">NOMINAL bayar_infaq</label>

                                                      <div class="input-group">
                                                               <div class="input-group-addon">Rp.</div>
                                                               <input type="text" class="form-control" id="nominal_edit"
                                                                        placeholder="Nominal bayar_infaq" REQUIRED>
                                                      </div>

                                             </div>
                                    </form>
                           </div>
                           <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btn_simpan_edit">Save changes</button>
                           </div>
                  </div>
         </div>
</div>


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
                  $('.js-example-basic-single').select2();

         });



         var setDefaultActive = function () {
                  var url = localStorage.getItem("url");
                  $('a[href="' + url + '"]').parent().addClass('active');
                  $('a[href="' + url + '"]').parent().parent().parent().addClass('active');
                  $('a[href="' + url + '"]').parent().parent().show();
         }

         setDefaultActive();

$("#btn_cetak_laporan").click(function (e) { 
            e.preventDefault();
            var infaq = $("#data_infaq").val();
            var santri = $("#data_santri").val();
            var bayar = $("#data_bayar").val();

            if(infaq=="")
            {
                        $.alert('silahkan pilih periode infaq');
            }
            else if(santri=="")
            {
                        $.alert('silahkan pilih status santri');
            }
            else if(bayar=="")
            {
                        $.alert('silahkan pilih status bayar');
            }
            else
            {
                        if(bayar=="0")
                        {
                                    //alert('ini laporan belum bayar');
                                    window.open('<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/cetak_laporan_blm_byr/'+infaq+'/'+santri,'cetak data bayar infaq');
                        }
                        else
                        {
                                    //alert('ini laporan sudah bayar');
                                    window.open('<?php echo base_url();?>index.php/modul_pendaftaran/bayar_infaq/cetak_laporan_sdh_byr/'+infaq+'/'+santri,'cetak data bayar infaq');
                        }
            }
});         

</script>