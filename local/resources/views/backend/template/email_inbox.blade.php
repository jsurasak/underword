<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Inbox (10)</title>
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
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
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
					<li class="has-sub active">
						<a href="javascript:;">
							<span class="badge pull-right">10</span>
							<i class="fa fa-inbox"></i> 
							<span>Email</span>
						</a>
						<ul class="sub-menu">
						    <li class="active"><a href="email_inbox">Inbox v1</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_inbox_v2">Inbox v2</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_compose">Compose</a></li>
						    <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=email_detail">Detail</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-suitcase"></i>
						    <span>UI Elements</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_general">General</a></li>
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
		<div id="content" class="content content-full-width">
			<div class="p-20">
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-2 -->
			    <div class="col-md-2">
			        <form>
			            <div class="input-group m-b-15">
                            <input type="text" class="form-control input-sm input-white" placeholder="Search Mail" />
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-inverse" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
			        </form>
			        <div class="hidden-sm hidden-xs">
                        <h5 class="m-t-20">Email</h5>
                        <ul class="nav nav-pills nav-stacked nav-inbox">
                            <li class="active">
                                <a href="#">
                                    <i class="fa fa-inbox fa-fw m-r-5"></i> Inbox (10)
                                </a>
                            </li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-inbox fa-fw m-r-5"></i> Sent</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-pencil fa-fw m-r-5"></i> Draft</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-trash-o fa-fw m-r-5"></i> Trash</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-star fa-fw m-r-5"></i> Archive</a></li>
                        </ul>
                        <h5 class="m-t-20">Folders</h5>
                        <ul class="nav nav-pills nav-stacked nav-inbox">
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-folder fa-fw m-r-5"></i> Newsletter</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-folder fa-fw m-r-5"></i> Friend</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-folder fa-fw m-r-5"></i> Company</a></li>
                            <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#"><i class="fa fa-folder fa-fw m-r-5"></i> Downloaded</a></li>
                        </ul>
                    </div>
                </div>
			    <!-- end col-2 -->
			    <!-- begin col-10 -->
			    <div class="col-md-10">
                    <div class="email-btn-row hidden-xs">
                        <a href="#" class="btn btn-sm btn-inverse"><i class="fa fa-plus m-r-5"></i> New</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Reply</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Delete</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Archive</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Junk</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Swwep</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Move to</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Categories</a>
                    </div>
			        <div class="email-content">
                        <table class="table table-email">
                            <thead>
                                <tr>
                                    <th class="email-select"><a href="#" data-click="email-select-all"><i class="fa fa-square-o fa-fw"></i></a></th>
                                    <th colspan="2">
                                        <div class="dropdown">
                                            <a href="#" class="email-header-link" data-toggle="dropdown">View All <i class="fa fa-angle-down m-l-5"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="active"><a href="#">All</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Unread</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Contacts</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Groups</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Newsletters</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Social updates</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Everything else</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="dropdown">
                                            <a href="#" class="email-header-link" data-toggle="dropdown">Arrange by <i class="fa fa-angle-down m-l-5"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="active"><a href="#">Date</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">From</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Subject</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Size</a></li>
                                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=#">Conversation</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Leap Motion
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Maecenas ultrices interdum leo, eu aliquam diam mattis sed.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Leap Motion
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Ut tristique dapibus nibh, sed scelerisque magna vehicula a.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Stefie Chin
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Etiam pretium neque vitae vulputate fermentum.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Alan Tan
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Duis et justo in nisl tristique lobortis id at ligula.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Yu Ming Tan
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Sed dapibus nec velit eget pulvinar. Etiam id erat in eros imperdiet tempus.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Harvinder Signh
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Aliquam diam risus, condimentum ut diam in, fermentum euismod sem.
                                    </td>
                                    <td class="email-date">12/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Fiona Loh
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Praesent dapibus ultricies magna, ac laoreet ante pellentesque nec. 
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Derrick Tew
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Nullam eget nibh et dui vestibulum aliquam vitae a lacus.
                                    </td>
                                    <td class="email-date">10/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Terry Dew
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Nulla eget placerat ante, sed hendrerit felis. Praesent vitae convallis erat.
                                    </td>
                                    <td class="email-date">09/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        John Doe
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Sed dapibus nec velit eget pulvinar. Etiam id erat in eros imperdiet tempus.
                                    </td>
                                    <td class="email-date">08/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Leap Motion
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Ut tristique dapibus nibh, sed scelerisque magna vehicula a.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Stefie Chin
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Etiam pretium neque vitae vulputate fermentum.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Alan Tan
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Duis et justo in nisl tristique lobortis id at ligula.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Yu Ming Tan
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Sed dapibus nec velit eget pulvinar. Etiam id erat in eros imperdiet tempus.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Fiona Loh
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Praesent dapibus ultricies magna, ac laoreet ante pellentesque nec. 
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Derrick Tew
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Nullam eget nibh et dui vestibulum aliquam vitae a lacus.
                                    </td>
                                    <td class="email-date">10/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Terry Dew
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Nulla eget placerat ante, sed hendrerit felis. Praesent vitae convallis erat.
                                    </td>
                                    <td class="email-date">09/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        John Doe
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Sed dapibus nec velit eget pulvinar. Etiam id erat in eros imperdiet tempus.
                                    </td>
                                    <td class="email-date">08/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Leap Motion
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Ut tristique dapibus nibh, sed scelerisque magna vehicula a.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                                <tr>
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        Stefie Chin
                                    </td>
                                    <td class="email-subject">
                                        <a href="#" class="email-btn" data-click="email-archive"><i class="fa fa-folder-open"></i></a>
                                        <a href="#" class="email-btn" data-click="email-remove"><i class="fa fa-trash-o"></i></a>
                                        <a href="#" class="email-btn" data-click="email-highlight"><i class="fa fa-flag"></i></a> 
                                        Etiam pretium neque vitae vulputate fermentum.
                                    </td>
                                    <td class="email-date">11/4/2014</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="email-footer clearfix">
                            737 messages
                            <ul class="pagination pagination-sm m-t-0 m-b-0 pull-right">
                                <li class="disabled"><a href="javascript:;"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="disabled"><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=javascript:;"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
			        </div>
			    </div>
			    <!-- end col-10 -->
			</div>
			<!-- end row -->
			</div>
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
	<script src="assets/js/inbox.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Inbox.init();
		});
	</script>
</body>
</html>
