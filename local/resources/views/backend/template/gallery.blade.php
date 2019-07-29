<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Gallery</title>
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
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  	<link href="assets/plugins/isotope/isotope.css" rel="stylesheet" />
  	<link href="assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
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
					<li class="has-sub active">
					    <a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-camera"></i>
						    <span>Gallery</span>
						</a>
					    <ul class="sub-menu">
					        <li class="active"><a href="gallery">Gallery v1</a></li>
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
				<li class="active">Gallery</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Gallery <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
            <div id="options" class="m-b-10">
                <span class="gallery-option-set" id="filter" data-option-key="filter">
                    <a href="#show-all" class="btn btn-default btn-xs active" data-option-value="*">
                        Show All
                    </a>
                    <a href="#gallery-group-1" class="btn btn-default btn-xs" data-option-value=".gallery-group-1">
                        Gallery Group 1
                    </a>
                    <a href="#gallery-group-2" class="btn btn-default btn-xs" data-option-value=".gallery-group-2">
                        Gallery Group 2
                    </a>
                    <a href="#gallery-group-3" class="btn btn-default btn-xs" data-option-value=".gallery-group-3">
                        Gallery Group 3
                    </a>
                    <a href="#gallery-group-4" class="btn btn-default btn-xs" data-option-value=".gallery-group-4">
                        Gallery Group 4
                    </a>
                </span>
            </div>
            <div id="gallery" class="gallery">
                <div class="image gallery-group-1">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-1.jpg" data-lightbox="gallery-group-1">
                            <img src="assets/img/gallery/gallery-1.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #1382 - 3D Arch
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Lorem ipsum dolor sit amet</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Sean Ngu</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Nunc velit urna, aliquam at interdum sit amet, lacinia sit amet ligula. Quisque et erat eros. Aenean auctor metus in tortor placerat, non luctus justo blandit.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-1">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-2.jpg" data-lightbox="gallery-group-1">
                            <img src="assets/img/gallery/gallery-2.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #2343 - Madness Arch
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Fusce aliquet ac quam at tincidunt</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Camryn Wong</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Fusce eu rutrum nisi, ut pretium mi. Sed mollis nisi sed auctor molestie. Vestibulum dictum pharetra leo sed euismod.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-1">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-3.jpg" data-lightbox="gallery-group-1">
                            <img src="assets/img/gallery/gallery-3.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #3452 - Scottwills Arch
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Etiam lobortis egestas nisl</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Lelouch Wong</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                        </div>
                        <div class="desc">
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus eget ultricies arcu.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-2">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-4.jpg" data-lightbox="gallery-group-2">
                            <img src="assets/img/gallery/gallery-4.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #4123 - Scottwills Pinecone
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Donec mi quis volutpat ornare</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Richard Leong</a>
                        </div>
                        <div class="rating">
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut et augue luctus libero dignissim sodales, sapien consequat lacinia fringilla.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-2">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-5.jpg" data-lightbox="gallery-group-2">
                            <img src="assets/img/gallery/gallery-5.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #9200 Kariminal Rider
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Donec pretium volutpat ornare</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Derrick Wong</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut et augue luctus libero, feugiat sapien consequat lacinia fringilla.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-3">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-6.jpg" data-lightbox="gallery-group-3">
                            <img src="assets/img/gallery/gallery-6.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #1832 Scottwills Autumn
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Mi quis volutpat ornare sodales</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Apple Tong</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Ut et augue luctus libero dignissim sodales. Fusce feugiat sapien consequat lacinia fringilla. Vivamus eget ultricies arcu.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-3">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-7.jpg" data-lightbox="gallery-group-3">
                            <img src="assets/img/gallery/gallery-7.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #0229 Scottwills Autumn 2
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Vestibulum ante ipsum primis</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Thomas Wong</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut et augue luctus libero dignissim sodales, sapien consequat lacinia fringilla.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-4">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-8.jpg" data-lightbox="gallery-group-4">
                            <img src="assets/img/gallery/gallery-8.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #5721 Scottwills Snow
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Nunc eget hendrerit nisi sodales</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">Andy Wong</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star active"></span>
                        </div>
                        <div class="desc">
                            Ut et augue nisi sodales luctus libero dignissim sodales. Fusce feugiat nisi sodales sapien consequat lacinia fringilla.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-4">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-9.jpg" data-lightbox="gallery-group-4">
                            <img src="assets/img/gallery/gallery-9.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #9921 Scottwills Riverbank
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Nunc eget hendrerit nisi dignissim</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">William Tan</a>
                        </div>
                        <div class="rating">
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Ut et augue luctus libero dignissim sodales. Fusce feugiat sapien consequat libero dignissim lacinia fringilla.
                        </div>
                    </div>
                </div>
                <div class="image gallery-group-4">
                    <div class="image-inner">
                        <a href="assets/img/gallery/gallery-10.jpg" data-lightbox="gallery-group-4">
                            <img src="assets/img/gallery/gallery-10.jpg" alt="" />
                        </a>
                        <p class="image-caption">
                            #6436 Scottwills Buss
                        </p>
                    </div>
                    <div class="image-info">
                        <h5 class="title">Sed mollis nisi sed auctor</h5>
                        <div class="pull-right">
                            <small>by</small> <a href="javascript:;">David King</a>
                        </div>
                        <div class="rating">
                            <span class="star active"></span>
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </div>
                        <div class="desc">
                            Vestibulum dictum pharetra leo sed euismod. Lorem ipsum dolor sit amet, consectetur adipiscing feugiat sapien elit.
                        </div>
                    </div>
                </div>
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
	<script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
  	<script src="assets/plugins/lightbox/js/lightbox-2.6.min.js"></script>
	<script src="assets/js/gallery.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Gallery.init();
		});
	</script>
</body>
</html>
