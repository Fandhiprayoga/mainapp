<!DOCTYPE html>
<html>

<head>
    <meta charset = "utf-8">
    <meta name    = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>MAINAPP</title>
    <link rel = "stylesheet" href = "<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Ionicons -->
    <link rel = "stylesheet" href = "<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel = "stylesheet" href = "<?php echo base_url();?>/assets/login/styles.min.css">
    <link href="<?php echo base_url();?>/assets/css/jquery-confirm.min.css" rel="stylesheet">
</head>

<body style="width:100%;height:100%;">
    <div class="login-clean" style="height:100%;width:100%;padding-top:84px;padding-bottom:50px;background-color:#ffe5e1;">
        <form method="post" action="<?php echo base_url();?>index.php/auth/login">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate" style="color:#dd4b39;"></i></div><p class="text-center">MAIN APP<br>Jl. lorem ipsum dorlot sit amet</p>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:#dd4b39;">Log In</button></div><a href="#" class="forgot">mainapp&nbsp;<i class="glyphicon glyphicon-copyright-mark"></i>&nbsp;2018</a></form>
    </div>
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/jquery-confirm.min.js"></script>
</body>

</html>