<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Horrorism</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<base href="{{ asset('') }}">
	<link rel="icon" href="{{ url('../') }}/img/favicon.png" sizes="32x32">
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets/css/font/fonts.css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet" />
	<link href="assets/css/style.min.css" rel="stylesheet" />
	<link href="assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="assets/css/theme/red.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" />
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
  <link href="assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
  <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
	<link href="assets/plugins/bootstrap-datetimepicker-master 3/build/css/bootstrap-datetimepicker.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
	
	<link rel="stylesheet" href="assets/summernote/summernote.css" >
	
	<link href="assets/crop-select-js-master/crop-select-js.min.css" rel="stylesheet" type="text/css" />

		@stack('css')

	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		@include('backend.inc.header')
		<!-- end #header -->

		<!-- begin #sidebar -->
		@include('backend.inc.sidebar')
		<!-- @include('backend.inc.theme-panel') -->

		<!-- end #sidebar -->

		<!-- begin #content -->
		@yield('content')
		<!-- end #content -->

		<!-- begin #footer -->
		@include('backend.inc.footer')
		<!-- end #footer -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

	</div>
	<!-- end page container -->



	<!-- begin #modal-alert -->
	<div class="modal fade" id="modal-alert">
		<div class="modal-dialog">
			<div class="modal-content" style="margin-top: 15%;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Message Alert</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-success m-b-0">
						<h4><i class="fa fa-info-circle"></i> Detailed</h4>
						<div><b id="status">{{ ucfirst(session('alert.status')) }},</b> <span id="msg">{{ session('alert.msg') }}</span></div>
					</div>
				</div>
				<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end #modal-alert -->


	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/ckeditor/ckeditor.js"></script>
	<script src="assets/summernote/summernote.min.js"></script>
	
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	<script src="assets/plugins/fullcalendar/fullcalendar.js"></script>
	<script src="assets/js/calendar.demo.min.js"></script>
	<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"><script> 
	<script src="assets/crop-select-js-master/crop-select-js.min.js"></script>


	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<script src="assets/plugins/bootstrap-datetimepicker-master 3/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		});
	</script>
	@stack('scripts')
</body>
</html>
