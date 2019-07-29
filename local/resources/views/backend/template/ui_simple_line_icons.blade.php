<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Simple Line Icons</title>
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
	<link href="assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" />
    <!--[if lte IE 7]><script src="assets/plugins/simple-line-icons/icons-lte-ie7.js"></script><![endif]-->
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	
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
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_general">General</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_typography">Typography</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_tabs_accordions">Tabs & Accordions</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_unlimited_tabs">Unlimited Nav Tabs</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_modal_notification">Modal & Notification</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_widget_boxes">Widget Boxes</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_media_object">Media Object</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_buttons">Buttons</a></li>
							<li><a href="{{asset(Config::get('app.admin_path'))}}/template/?file=ui_icons">Icons</a></li>
							<li class="active"><a href="ui_simple_line_icons">Simple Line Icons</a></li>
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
				<li class="active">Simple Line Icons</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Simple Line Icons <small>162 beautifully crafted webfont icons</small></h1>
			<!-- end page-header -->
            
            <!-- begin row -->
            <div class="row text-center">
                <!-- begin col-2 -->
                <div class="col-md-2">
                    <h3><i class="icon-user"></i><br /><small>icon-user</small></h3>
                    <h3><i class="icon-user-female"></i><br /><small>icon-user-female</small></h3>
                    <h3><i class="icon-users"></i><br /><small>icon-users</small></h3>
                    <h3><i class="icon-user-follow"></i><br /><small>icon-user-follow</small></h3>
                    <h3><i class="icon-user-following"></i><br /><small>icon-user-following</small></h3>
                    <h3><i class="icon-user-unfollow"></i><br /><small>icon-user-unfollow</small></h3>
                    <h3><i class="icon-trophy"></i><br /><small>icon-trophy</small></h3>
                    <h3><i class="icon-speedometer"></i><br /><small>icon-speedometer</small></h3>
                    <h3><i class="icon-social-youtube"></i><br /><small>icon-social-youtube</small></h3>
                    <h3><i class="icon-social-twitter"></i><br /><small>icon-social-twitter</small></h3>
                    <h3><i class="icon-social-tumblr"></i><br /><small>icon-social-tumblr</small></h3>
                    <h3><i class="icon-social-facebook"></i><br /><small>icon-social-facebook</small></h3>
                    <h3><i class="icon-social-dropbox"></i><br /><small>icon-social-dropbox</small></h3>
                    <h3><i class="icon-social-dribbble"></i><br /><small>icon-social-dribbble</small></h3>
                    <h3><i class="icon-shield"></i><br /><small>icon-shield</small></h3>
                    <h3><i class="icon-screen-tablet"></i><br /><small>icon-screen-tablet</small></h3>
                    <h3><i class="icon-screen-smartphone"></i><br /><small>icon-screen-smartphone</small></h3>
                    <h3><i class="icon-screen-desktop"></i><br /><small>icon-screen-desktop</small></h3>
                    <h3><i class="icon-plane"></i><br /><small>icon-plane</small></h3>
                    <h3><i class="icon-notebook"></i><br /><small>icon-notebook</small></h3>
                    <h3><i class="icon-moustache"></i><br /><small>icon-moustache</small></h3>
                    <h3><i class="icon-mouse"></i><br /><small>icon-mouse</small></h3>
                    <h3><i class="icon-magnet"></i><br /><small>icon-magnet</small></h3>
                    <h3><i class="icon-magic-wand"></i><br /><small>icon-magic-wand</small></h3>
                    <h3><i class="icon-hourglass"></i><br /><small>icon-hourglass</small></h3>
                    <h3><i class="icon-graduation"></i><br /><small>icon-graduation</small></h3>
                    <h3><i class="icon-ghost"></i><br /><small>icon-ghost</small></h3>
                </div>
                <!-- end col-2 -->
                <!-- begin col-2 -->
                <div class="col-md-2">
                    <h3><i class="icon-game-controller"></i><br /><small>icon-game-controller</small></h3>
                    <h3><i class="icon-fire"></i><br /><small>icon-fire</small></h3>
                    <h3><i class="icon-eyeglasses"></i><br /><small>icon-eyeglasses</small></h3>
                    <h3><i class="icon-envelope-open"></i><br /><small>icon-envelope-open</small></h3>
                    <h3><i class="icon-envelope-letter"></i><br /><small>icon-envelope-letter</small></h3>
                    <h3><i class="icon-energy"></i><br /><small>icon-energy</small></h3>
                    <h3><i class="icon-emoticon-smile"></i><br /><small>icon-emoticon-smile</small></h3>
                    <h3><i class="icon-disc"></i><br /><small>icon-disc</small></h3>
                    <h3><i class="icon-cursor-move"></i><br /><small>icon-cursor-move</small></h3>
                    <h3><i class="icon-crop"></i><br /><small>icon-crop</small></h3>
                    <h3><i class="icon-credit-card"></i><br /><small>icon-credit-card</small></h3>
                    <h3><i class="icon-chemistry"></i><br /><small>icon-chemistry</small></h3>
                    <h3><i class="icon-bell"></i><br /><small>icon-bell</small></h3>
                    <h3><i class="icon-badge"></i><br /><small>icon-badge</small></h3>
                    <h3><i class="icon-anchor"></i><br /><small>icon-anchor</small></h3>
                    <h3><i class="icon-action-redo"></i><br /><small>icon-action-redo</small></h3>
                    <h3><i class="icon-action-undo"></i><br /><small>icon-action-undo</small></h3>
                    <h3><i class="icon-bag"></i><br /><small>icon-bag</small></h3>
                    <h3><i class="icon-basket"></i><br /><small>icon-basket</small></h3>
                    <h3><i class="icon-basket-loaded"></i><br /><small>icon-basket-loaded</small></h3>
                    <h3><i class="icon-book-open"></i><br /><small>icon-book-open</small></h3>
                    <h3><i class="icon-briefcase"></i><br /><small>icon-briefcase</small></h3>
                    <h3><i class="icon-bubbles"></i><br /><small>icon-bubbles</small></h3>
                    <h3><i class="icon-calculator"></i><br /><small>icon-calculator</small></h3>
                    <h3><i class="icon-call-end"></i><br /><small>icon-call-end</small></h3>
                    <h3><i class="icon-call-in"></i><br /><small>icon-call-in</small></h3>
                    <h3><i class="icon-call-out"></i><br /><small>icon-call-out</small></h3>
                </div>
                <!-- end col-2 -->
                <!-- begin col-2 -->
                <div class="col-md-2">
                    <h3><i class="icon-compass"></i><br /><small>icon-compass</small></h3>
                    <h3><i class="icon-cup"></i><br /><small>icon-cup</small></h3>
                    <h3><i class="icon-diamond"></i><br /><small>icon-diamond</small></h3>
                    <h3><i class="icon-direction"></i><br /><small>icon-direction</small></h3>
                    <h3><i class="icon-directions"></i><br /><small>icon-directions</small></h3>
                    <h3><i class="icon-docs"></i><br /><small>icon-docs</small></h3>
                    <h3><i class="icon-drawer"></i><br /><small>icon-drawer</small></h3>
                    <h3><i class="icon-drop"></i><br /><small>icon-drop</small></h3>
                    <h3><i class="icon-earphones"></i><br /><small>icon-earphones</small></h3>
                    <h3><i class="icon-earphones-alt"></i><br /><small>icon-earphones-alt</small></h3>
                    <h3><i class="icon-feed"></i><br /><small>icon-feed</small></h3>
                    <h3><i class="icon-film"></i><br /><small>icon-film</small></h3>
                    <h3><i class="icon-folder-alt"></i><br /><small>icon-folder-alt</small></h3>
                    <h3><i class="icon-frame"></i><br /><small>icon-frame</small></h3>
                    <h3><i class="icon-globe"></i><br /><small>icon-globe</small></h3>
                    <h3><i class="icon-globe-alt"></i><br /><small>icon-globe-alt</small></h3>
                    <h3><i class="icon-handbag"></i><br /><small>icon-handbag</small></h3>
                    <h3><i class="icon-layers"></i><br /><small>icon-layers</small></h3>
                    <h3><i class="icon-map"></i><br /><small>icon-map</small></h3>
                    <h3><i class="icon-picture"></i><br /><small>icon-picture</small></h3>
                    <h3><i class="icon-pin"></i><br /><small>icon-pin</small></h3>
                    <h3><i class="icon-playlist"></i><br /><small>icon-playlist</small></h3>
                    <h3><i class="icon-present"></i><br /><small>icon-present</small></h3>
                    <h3><i class="icon-printer"></i><br /><small>icon-printer</small></h3>
                    <h3><i class="icon-puzzle"></i><br /><small>icon-puzzle</small></h3>
                    <h3><i class="icon-speech"></i><br /><small>icon-speech</small></h3>
                    <h3><i class="icon-vector"></i><br /><small>icon-vector</small></h3>
                </div>
                <!-- end col-2 -->
                <!-- begin col-2 -->
                <div class="col-md-2">
                    <h3><i class="icon-wallet"></i><br /><small>icon-wallet</small></h3>
                    <h3><i class="icon-arrow-down"></i><br /><small>icon-arrow-down</small></h3>
                    <h3><i class="icon-arrow-left"></i><br /><small>icon-arrow-left</small></h3>
                    <h3><i class="icon-arrow-right"></i><br /><small>icon-arrow-right</small></h3>
                    <h3><i class="icon-arrow-up"></i><br /><small>icon-arrow-up</small></h3>
                    <h3><i class="icon-bar-chart"></i><br /><small>icon-bar-chart</small></h3>
                    <h3><i class="icon-bulb"></i><br /><small>icon-bulb</small></h3>
                    <h3><i class="icon-calendar"></i><br /><small>icon-calendar</small></h3>
                    <h3><i class="icon-control-end"></i><br /><small>icon-control-end</small></h3>
                    <h3><i class="icon-control-forward"></i><br /><small>icon-control-forward</small></h3>
                    <h3><i class="icon-control-pause"></i><br /><small>icon-control-pause</small></h3>
                    <h3><i class="icon-control-play"></i><br /><small>icon-control-play</small></h3>
                    <h3><i class="icon-control-rewind"></i><br /><small>icon-control-rewind</small></h3>
                    <h3><i class="icon-control-start"></i><br /><small>icon-control-start</small></h3>
                    <h3><i class="icon-cursor"></i><br /><small>icon-cursor</small></h3>
                    <h3><i class="icon-dislike"></i><br /><small>icon-dislike</small></h3>
                    <h3><i class="icon-equalizer"></i><br /><small>icon-equalizer</small></h3>
                    <h3><i class="icon-graph"></i><br /><small>icon-graph</small></h3>
                    <h3><i class="icon-grid"></i><br /><small>icon-grid</small></h3>
                    <h3><i class="icon-home"></i><br /><small>icon-home</small></h3>
                    <h3><i class="icon-like"></i><br /><small>icon-like</small></h3>
                    <h3><i class="icon-list"></i><br /><small>icon-list</small></h3>
                    <h3><i class="icon-login"></i><br /><small>icon-login</small></h3>
                    <h3><i class="icon-logout"></i><br /><small>icon-logout</small></h3>
                    <h3><i class="icon-loop"></i><br /><small>icon-loop</small></h3>
                    <h3><i class="icon-microphone"></i><br /><small>icon-microphone</small></h3>
                    <h3><i class="icon-music-tone"></i><br /><small>icon-music-tone</small></h3>
                </div>
                <!-- end col-2 -->
                <!-- begin col-2 -->
                <div class="col-md-2">
                    <h3><i class="icon-music-tone-alt"></i><br /><small>icon-music-tone-alt</small></h3>
                    <h3><i class="icon-note"></i><br /><small>icon-note</small></h3>
                    <h3><i class="icon-pencil"></i><br /><small>icon-pencil</small></h3>
                    <h3><i class="icon-pie-chart"></i><br /><small>icon-pie-chart</small></h3>
                    <h3><i class="icon-question"></i><br /><small>icon-question</small></h3>
                    <h3><i class="icon-rocket"></i><br /><small>icon-rocket</small></h3>
                    <h3><i class="icon-share"></i><br /><small>icon-share</small></h3>
                    <h3><i class="icon-share-alt"></i><br /><small>icon-share-alt</small></h3>
                    <h3><i class="icon-shuffle"></i><br /><small>icon-shuffle</small></h3>
                    <h3><i class="icon-size-actual"></i><br /><small>icon-size-actual</small></h3>
                    <h3><i class="icon-size-fullscreen"></i><br /><small>icon-size-fullscreen</small></h3>
                    <h3><i class="icon-support"></i><br /><small>icon-support</small></h3>
                    <h3><i class="icon-tag"></i><br /><small>icon-tag</small></h3>
                    <h3><i class="icon-trash"></i><br /><small>icon-trash</small></h3>
                    <h3><i class="icon-umbrella"></i><br /><small>icon-umbrella</small></h3>
                    <h3><i class="icon-wrench"></i><br /><small>icon-wrench</small></h3>
                    <h3><i class="icon-ban"></i><br /><small>icon-ban</small></h3>
                    <h3><i class="icon-bubble"></i><br /><small>icon-bubble</small></h3>
                    <h3><i class="icon-camcorder"></i><br /><small>icon-camcorder</small></h3>
                    <h3><i class="icon-camera"></i><br /><small>icon-camera</small></h3>
                    <h3><i class="icon-check"></i><br /><small>icon-check</small></h3>
                    <h3><i class="icon-clock"></i><br /><small>icon-clock</small></h3>
                    <h3><i class="icon-close"></i><br /><small>icon-close</small></h3>
                    <h3><i class="icon-cloud-download"></i><br /><small>icon-cloud-download</small></h3>
                    <h3><i class="icon-cloud-upload"></i><br /><small>icon-cloud-upload</small></h3>
                    <h3><i class="icon-doc"></i><br /><small>icon-doc</small></h3>
                    <h3><i class="icon-envelope"></i><br /><small>icon-envelope</small></h3>
                </div>
                <!-- end col-2 -->
                <!-- begin col-2 -->
                <div class="col-md-2">
                    <h3><i class="icon-eye"></i><br /><small>icon-eye</small></h3>
                    <h3><i class="icon-flag"></i><br /><small>icon-flag</small></h3>
                    <h3><i class="icon-folder"></i><br /><small>icon-folder</small></h3>
                    <h3><i class="icon-heart"></i><br /><small>icon-heart</small></h3>
                    <h3><i class="icon-info"></i><br /><small>icon-info</small></h3>
                    <h3><i class="icon-key"></i><br /><small>icon-key</small></h3>
                    <h3><i class="icon-link"></i><br /><small>icon-link</small></h3>
                    <h3><i class="icon-lock"></i><br /><small>icon-lock</small></h3>
                    <h3><i class="icon-lock-open"></i><br /><small>icon-lock-open</small></h3>
                    <h3><i class="icon-magnifier"></i><br /><small>icon-magnifier</small></h3>
                    <h3><i class="icon-magnifier-add"></i><br /><small>icon-magnifier-add</small></h3>
                    <h3><i class="icon-magnifier-remove"></i><br /><small>icon-magnifier-remove</small></h3>
                    <h3><i class="icon-paper-clip"></i><br /><small>icon-paper-clip</small></h3>
                    <h3><i class="icon-paper-plane"></i><br /><small>icon-paper-plane</small></h3>
                    <h3><i class="icon-plus"></i><br /><small>icon-plus</small></h3>
                    <h3><i class="icon-pointer"></i><br /><small>icon-pointer</small></h3>
                    <h3><i class="icon-power"></i><br /><small>icon-power</small></h3>
                    <h3><i class="icon-refresh"></i><br /><small>icon-refresh</small></h3>
                    <h3><i class="icon-reload"></i><br /><small>icon-reload</small></h3>
                    <h3><i class="icon-settings"></i><br /><small>icon-settings</small></h3>
                    <h3><i class="icon-star"></i><br /><small>icon-star</small></h3>
                    <h3><i class="icon-symbol-female"></i><br /><small>icon-symbol-female</small></h3>
                    <h3><i class="icon-symbol-male"></i><br /><small>icon-symbol-male</small></h3>
                    <h3><i class="icon-target"></i><br /><small>icon-target</small></h3>
                    <h3><i class="icon-volume-1"></i><br /><small>icon-volume-1</small></h3>
                    <h3><i class="icon-volume-2"></i><br /><small>icon-volume-2</small></h3>
                    <h3><i class="icon-volume-off"></i><br /><small>icon-volume-off</small></h3>
                </div>
                <!-- end col-2 -->
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
