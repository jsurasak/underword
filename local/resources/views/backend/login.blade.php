<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Admin Control Panel</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<base href="{{ asset('') }}">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets/css/font/fonts.css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<?php
	//echo public_path();
	//echo asset('');
	$bgRandom = rand(1,6);
?>
<body class="pace-top">
<?php
print_r($errors);
?>
@if( $errors->any() )
	<!-- begin #modal-alert -->
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Login Alert</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger m-b-0">
						@foreach ($errors->all() as $error)
						  <div>{{ $error }}</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end #modal-alert -->
@endif

	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<div class="login-cover">
	    <div class="login-cover-image"><img src="assets/img/login-bg/bg-<?php echo $bgRandom;?>.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg" style="opacity: 0;"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade" style="padding-top:200px;">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated fadeIn" style="margin:0px auto;background: rgba(232, 243, 242, 0.15);">
            <!-- begin brand -->
            <div class="login-header">
                <div style="background-image: url('assets/img/www1.png');height: 60px;width: 150px;display: block;float: left;position: relative;margin-left: -45px;margin-right: 14px;"></div>
                <div class="brand" style="color: #78D3D2;">
                   backoffice
                    <small>After you sign in, Go to Admin console.</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="login" method="POST" class="margin-bottom-0" autocomplete="off">
                    <div class="form-group m-b-20">
                        <input type="text" name="username" class="form-control input-lg" placeholder="Username" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password"/>
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="remember" /> Remember Me
                        </label>
                    </div>
                    <div class="login-buttons">
			{!! csrf_field() !!}
                        <button type="submit" class="btn btn-success btn-block btn-lg" style="background: rgba(0,172,172,0.52);">Sign me in</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
        
        <ul class="login-bg-list">
            <li<?php echo ($bgRandom==1)?' class="active"':'';?>><a data-click="change-bg"><img src="assets/img/login-bg/bg-1.jpg" alt="" /></a></li>
            <li<?php echo ($bgRandom==3)?' class="active"':'';?>><a data-click="change-bg"><img src="assets/img/login-bg/bg-3.jpg" alt="" /></a></li>
            <li<?php echo ($bgRandom==4)?' class="active"':'';?>><a data-click="change-bg"><img src="assets/img/login-bg/bg-4.jpg" alt="" /></a></li>
            <li<?php echo ($bgRandom==5)?' class="active"':'';?>><a data-click="change-bg"><img src="assets/img/login-bg/bg-5.jpg" alt="" /></a></li>
            <li<?php echo ($bgRandom==6)?' class="active"':'';?>><a data-click="change-bg"><img src="assets/img/login-bg/bg-6.jpg" alt="" /></a></li>
        </ul>
	</div>
	<!-- end page container -->

	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/login-v2.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
			$('#modal-alert').modal('show');
		});
	</script>
	
	
	
</body>
</html>