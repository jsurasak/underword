<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Coming Soon Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<base href="{{ asset('') }}">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="assets/plugins/jquery.countdown/jquery.countdown.css" rel="stylesheet" />
	<!-- ================== END PAGE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="bg-white p-t-0 pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin coming-soon -->
        <div class="coming-soon">
            <div class="coming-soon-header">
                <div class="bg-cover"></div>
                <div class="brand">
                    <span class="logo"></span> Color Admin
                </div>
                <div class="timer">
                    <div id="timer"></div>
                </div>
                <div class="desc">
                    Our website is almost there and it’s rebuilt from scratch! A lot of great new features <br />and improvements are coming.
                </div>
            </div>
            <div class="coming-soon-content">
                <div class="desc">
                    We are launching a closed <b>beta</b> soon!<br /> Sign up to try it before others and be the first to know when we <b>launch</b>.
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email Address" />
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-success">Notify Me</button>
                    </div>
                </div>
                <p class="help-block m-b-25"><i>We don't spam. Your email address is secure with us.</i></p>
                <p>
                    Follow us on 
                    <a href="#"><i class="fa fa-twitter fa-fw"></i> Twitter</a> and 
                    <a href="#"><i class="fa fa-facebook fa-fw"></i> Facebook</a>
                </p>
            </div>
        </div>
        <!-- end coming-soon -->
        
        <!-- begin theme-panel -->
		@include('backend.inc.theme-panel')
        <!-- end theme-panel -->
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
    <script src="assets/plugins/jquery.countdown/jquery.plugin.js"></script>
    <script src="assets/plugins/jquery.countdown/jquery.countdown.js"></script>
	<script src="assets/js/coming-soon.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			ComingSoon.init();
		});
	</script>
</body>
</html>
