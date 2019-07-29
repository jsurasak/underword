<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | General UI Elements</title>
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
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-header-fixed page-sidebar-fixed">
		<!-- begin #header -->
		@include('backend.inc.header')
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							Sean Ngu
							<small>Front end developer</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=index">Dashboard v1</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=index_v2">Dashboard v2</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<span class="badge pull-right">10</span>
							<i class="fa fa-inbox"></i> 
							<span>Email</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_inbox">Inbox v1</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_inbox_v2">Inbox v2</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_compose">Compose</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_detail">Detail</a></li>
						</ul>
					</li>
					<li class="has-sub active">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-suitcase"></i>
						    <span>UI Elements</span> 
						</a>
						<ul class="sub-menu">
							<li class="active"><a href="ui_general">General</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_typography">Typography</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_tabs_accordions">Tabs & Accordions</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_unlimited_tabs">Unlimited Nav Tabs</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_modal_notification">Modal & Notification</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_widget_boxes">Widget Boxes</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_media_object">Media Object</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_buttons">Buttons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_icons">Icons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_simple_line_icons">Simple Line Icons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_ionicons">Ionicons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_tree">Tree View</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_language_bar_icon">Language Bar & Icon</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-file-o"></i>
						    <span>Form Stuff</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_elements">Form Elements</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_plugins">Form Plugins</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_slider_switcher">Form Slider + Switcher</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_validation">Form Validation</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_wizards">Wizards</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_wizards_validation">Wizards + Validation</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_wysiwyg">WYSIWYG</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_editable">X-Editable</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=form_multiple_upload">Multiple File Upload</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-th"></i>
						    <span>Tables  <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_basic">Basic Tables</a></li>
							<li class="has-sub">
							    <a href="javascript:;"><b class="caret pull-right"></b> Managed Tables</a>
							    <ul class="sub-menu">
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage">Default</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_autofill">Autofill</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_buttons">Buttons</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_colreorder">ColReorder</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_fixed_columns">Fixed Column</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_fixed_header">Fixed Header</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_keytable">KeyTable</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_responsive">Responsive</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_rowreorder">RowReorder <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_scroller">Scroller</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_select">Select</a></li>
							        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=table_manage_combine">Extension Combination</a></li>
							    </ul>
							</li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-envelope"></i>
					        <span>Email Template</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_system">System Template</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_newsletter">Newsletter Template</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
					        <i class="fa fa-area-chart"></i>
						    <span>Chart <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-flot">Flot Chart</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-morris">Morris Chart</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-js">Chart JS</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=chart-d3">d3 Chart <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
						</ul>
					</li>
					<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=calendar"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-map-marker"></i>
					        <span>Map</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=map_vector">Vector Map</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=map_google">Google Map</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-camera"></i>
						    <span>Gallery</span>
						</a>
					    <ul class="sub-menu">
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=gallery">Gallery v1</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=gallery_v2">Gallery v2</a></li>
					    </ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-cogs"></i>
						    <span>Page Options <span class="label label-theme m-l-5">NEW</span></span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_blank">Blank Page</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_footer">Page with Footer</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_without_sidebar">Page without Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_right_sidebar">Page with Right Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_minified_sidebar">Page with Minified Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_two_sidebar">Page with Two Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_line_icons">Page with Line Icons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_ionicons">Page with Ionicons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_full_height">Full Height Content</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_wide_sidebar">Page with Wide Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_light_sidebar">Page with Light Sidebar</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_mega_menu">Page with Mega Menu</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_top_menu">Page with Top Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_boxed_layout">Page with Boxed Layout <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_mixed_menu">Page with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_boxed_layout_with_mixed_menu">Boxed Layout with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=page_with_transparent_sidebar">Page with Transparent Sidebar <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-gift"></i>
						    <span>Extra</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_timeline">Timeline</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_coming_soon">Coming Soon Page</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_search_results">Search Results</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_invoice">Invoice</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_404_error">404 Error Page</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=extra_profile">Profile Page</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-key"></i>
					        <span>Login & Register</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=login">Login</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=login_v2">Login v2</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=login_v3">Login v3</a></li>
					        <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=register_v3">Register v3</a></li>
					    </ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret pull-right"></b>
					        <i class="fa fa-medkit"></i>
					        <span>Helper</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=helper_css">Predefined CSS Classes</a></li>
					    </ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-align-left"></i> 
						    <span>Menu Level</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
						            <b class="caret pull-right"></b>
						            Menu 1.1
						        </a>
								<ul class="sub-menu">
									<li class="has-sub">
										<a href="javascript:;">
										    <b class="caret pull-right"></b>
										    Menu 2.1
										</a>
										<ul class="sub-menu">
											<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 3.1</a></li>
											<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 3.2</a></li>
										</ul>
									</li>
									<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 2.2</a></li>
									<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 2.3</a></li>
								</ul>
							</li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 1.2</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Menu 1.3</a></li>
						</ul>
					</li>
			        <!-- begin sidebar minify button -->
					<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Home</a></li>
				<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">UI Elements</a></li>
				<li class="active">General</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">General UI Elements <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-general-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Alerts</h4>
                        </div>
                        <div class="panel-body">
							<div class="alert alert-success fade in m-b-15">
								<strong>Success!</strong>
								Vivamus vestibulum posuere est eu tincidunt.
								<span class="close" data-dismiss="alert">&times;</span>
							</div>
							<div class="alert alert-info fade in m-b-15">
								<strong>Info!</strong>
								Morbi sed nibh ac tortor laoreet blandit sed eu ligula.
								<span class="close" data-dismiss="alert">&times;</span>
							</div>
                            <div class="alert alert-warning fade in m-b-15">
								<strong>Warning!</strong>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit.
								<span class="close" data-dismiss="alert">&times;</span>
							</div>
							<div class="alert alert-danger fade in m-b-15">
								<strong>Error!</strong>
								Morbi vitae arcu in neque luctus elementum.
								<span class="close" data-dismiss="alert">&times;</span>
							</div>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-general-2">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Notes</h4>
                        </div>
                        <div class="panel-body">
							<div class="note note-success">
								<h4>Some header text here!</h4>
								<p>
								    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Maecenas id gravida libero. Etiam semper id sem a ultricies. Donec id consequat magna.
                                    Suspendisse tincidunt blandit metus, eu pretium nibh tincidunt eget.
                                </p>
							</div>
							<div class="note note-info">
								<h4>Some header text here!</h4>
								<p>
								    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Maecenas id gravida libero. Etiam semper id sem a ultricies. Donec id consequat magna.
                                    Suspendisse tincidunt blandit metus, eu pretium nibh tincidunt eget.
                                </p>
							</div>
                        </div>
                    </div>
                    <!-- end panel -->
			    </div>
			    <!-- end col-6 -->
			    <!-- begin col-6 -->
			    <div class="col-md-6">
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-general-3">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Labels & Badges</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Labels</th>
                                        <th>Badges</th>
                                        <th>Square Badges</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Default</td>
                                        <td><span class="label label-default">Default</span></td>
                                        <td><span class="badge badge-default">6</span></td>
                                        <td><span class="badge badge-default badge-square">6</span></td>
                                    </tr>
                                    <tr>
                                        <td>Danger</td>
                                        <td><span class="label label-danger">Danger</span></td>
                                        <td><span class="badge badge-danger">4</span></td>
                                        <td><span class="badge badge-danger badge-square">4</span></td>
                                    </tr>
                                    <tr>
                                        <td>Warning</td>
                                        <td><span class="label label-warning">Warning</span></td>
                                        <td><span class="badge badge-warning">7</span></td>
                                        <td><span class="badge badge-warning badge-square">7</span></td>
                                    </tr>
                                    <tr>
                                        <td>Success</td>
                                        <td><span class="label label-success">Success</span></td>
                                        <td><span class="badge badge-success">8</span></td>
                                        <td><span class="badge badge-success badge-square">8</span></td>
                                    </tr>
                                    <tr>
                                        <td>Info</td>
                                        <td><span class="label label-info">Info</span></td>
                                        <td><span class="badge badge-info">2</span></td>
                                        <td><span class="badge badge-info badge-square">2</span></td>
                                    </tr>
                                    <tr>
                                        <td>Primary</td>
                                        <td><span class="label label-primary">Primary</span></td>
                                        <td><span class="badge badge-primary">5</span></td>
                                        <td><span class="badge badge-primary badge-square">5</span></td>
                                    </tr>
                                    <tr>
                                        <td>Inverse</td>
                                        <td><span class="label label-inverse">Inverse</span></td>
                                        <td><span class="badge badge-inverse">12</span></td>
                                        <td><span class="badge badge-inverse badge-square">12</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
			        <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-general-4">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Pagination & Pager</h4>
                        </div>
                        <div class="panel-body">
                            <h5 class="m-t-0 m-b-15">Pagination</h5>
                            <div>
                                <ul class="pagination pagination-lg m-t-0 m-b-10">
                                    <li class="disabled"><a href="javascript:;">«</a></li>
                                    <li class="active"><a href="javascript:;">1</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">2</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">3</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">4</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">5</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">»</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="pagination m-t-0 m-b-10">
                                    <li class="disabled"><a href="javascript:;">«</a></li>
                                    <li class="active"><a href="javascript:;">1</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">2</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">3</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">4</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">5</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">»</a></li>
                                </ul>
                            </div>
                            <div>
                                <ul class="pagination pagination-sm m-t-0 m-b-10">
                                    <li class="disabled"><a href="javascript:;">«</a></li>
                                    <li class="active"><a href="javascript:;">1</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">2</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">3</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">4</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">5</a></li>
                                    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">»</a></li>
                                </ul>
                            </div>
                            <h5>Pager (Default & Aligned links)</h5>
                            <ul class="pager">
                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Previous</a></li>
                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;">Next</a></li>
                            </ul>
                            <ul class="pager">
                                <li class="previous disabled"><a href="javascript:;">&larr; Older</a></li>
                                <li class="next"><a href="javascript:;">Newer &rarr;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end panel -->
			    </div>
			    <!-- end col-6 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
                    <!-- begin panel -->
			        <div class="panel panel-inverse" data-sortable-id="ui-general-5">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Progress bar</h4>
                        </div>
                        <div class="panel-body">
							<div class="alert alert-info m-b-0">
								<h4 class="block">Cross-browser compatibility</h4>
								<p>
									 Progress bars use CSS3 transitions and animations to achieve some of their effects. These features are not supported in Internet Explorer 9 and below or older versions of Firefox. Opera 12 does not support animations.
								</p>
							</div>
							<div class="row">
							    <div class="col-md-3">
                                    <h4>Basic</h4>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 80%">Default</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" style="width: 70%">Success</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" style="width: 60%">Info</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%">Warning</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" style="width: 40%">Danger</div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse" style="width: 30%">Inverse</div>
                                    </div>
                                </div>
							    <div class="col-md-3">
                                    <h4>Striped</h4>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar" style="width: 80%">Default</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" style="width: 70%">Success</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" style="width: 60%">Info</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%">Warning</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" style="width: 40%">Danger</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-inverse" style="width: 30%">Inverse</div>
                                    </div>
							    </div>
							    <div class="col-md-3">
                                    <h4>Animated</h4>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" style="width: 80%">Default</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 70%">Success</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" style="width: 60%">Info</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%">Warning</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" style="width: 40%">Danger</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-inverse" style="width: 30%">Inverse</div>
                                    </div>
							    </div>
							    <div class="col-md-3">
                                    <h4>Stacked</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" style="width: 25%">25%</div>
                                        <div class="progress-bar progress-bar-info" style="width: 25%">25%</div>
                                        <div class="progress-bar progress-bar-success" style="width: 25%">25</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-primary" style="width: 25%">25%</div>
                                        <div class="progress-bar progress-bar-info" style="width: 25%">25%</div>
                                        <div class="progress-bar progress-bar-success" style="width: 25%">25</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 25%">25%</div>
                                        <div class="progress-bar progress-bar-info" style="width: 25%">25%</div>
                                        <div class="progress-bar progress-bar-success" style="width: 25%">25</div>
                                    </div>
							    </div>
							</div>
						</div>
					</div>
					<!-- end panel -->
			    </div>
			    <!-- end col-12 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		
        <!-- begin theme-panel -->
		@include('backend.inc.theme-panel')
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
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
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
