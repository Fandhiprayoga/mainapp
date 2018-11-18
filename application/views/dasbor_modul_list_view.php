<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?PHP $a=$this->db->query('select * from mst_mainapp')->result_array();?>
  <title><?php echo $a[0]['nama_mainapp'];?> | MODUL LIST</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/skins/skin-red.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red layout-top-nav ">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
   <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
    <a href="<?php echo base_url();?>index.php/modul_list/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class=""><?php echo $a[0]['nama_mainapp'];?></span>
    </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php
                $a=$this->db->query('select * from mst_organisasi where id_organisasi="'.$this->session->id_organisasi.'"')->result_array();
                
                if($a[0]['foto_organisasi']=="")
                {
                    echo '<img src="'.base_url().'assets/dist/img/avatar.png" class="user-image" alt="User Image">';
                }
                else
                {
                  echo '<img src="'.base_url().'assets/upload/'.$a[0]['foto_organisasi'].'" class="user-image" alt="User Image">';
                }
              ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->id_user;?>&nbsp;(<?php $a=$this->db->query('select nama_group_user from group_user where id_group_user="'.$this->session->group_user.'"')->result_array(); echo $a[0]['nama_group_user'];?>)</span>
            </a>
          </li>

          <li>
              <a href="<?php echo base_url();?>index.php/auth/logout"><i class="fa fa-power-off"></i></a>
          </li>
          
          
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php $this->load->view($page);?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    <?PHP $a=$this->db->query('select * from mst_mainapp')->result_array();?>
    <?php echo $a[0]['nama_mainapp'];?> rev 1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo $a[0]['tahun_mainapp'];?> <a href="#"><?php echo $a[0]['instansi_mainapp'];?></a>.</strong> All rights reserved.
  </footer>


      </div>
     
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>