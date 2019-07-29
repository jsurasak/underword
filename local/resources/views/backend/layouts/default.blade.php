<!DOCTYPE html>
<html lang="th">

<head>
    <title>ระบบจัดการหลังบ้าน</title>
        <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<base href="{{ asset('') }}">
	<!-- <link rel="icon" href="{{ url('../') }}/img/favicon.png" sizes="32x32"> -->
    <!-- Favicon icon -->
    <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
        <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/plugin/bootstrap/css/bootstrap.min.css">
    <!-- Material Icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/material-design/css/material-design-iconic-font.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="assets/plugin/select2/css/select2.min.css" />
    <link rel="stylesheet" href="assets/plugin/jquery-confirm/jquery-confirm.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="assets/plugin/bootstrap-datepicker/css/bootstrap-datepicker3.css">

    <link rel="stylesheet" type="text/css" href="assets/plugin/summernote-master/dist/summernote-bs4.css">

    <link rel="stylesheet" type="text/css" href="assets/plugin/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugin/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    
    <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert.css">
    @stack('css')
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>

    @include('backend.inc.header')


    <div class="idr-background">
        <div class="ids-background pcoded-main-container">
            <div class="pcoded-wrapper">


            @include('backend.inc.sidebar')

                
            <div class="pcoded-content">
                <div class="pcoded-inner-content">

                @yield('content')
            
            
                </div>
            </div>

            </div>
        </div>
    </div>
    </div>
    </div>

    
     @include('backend.inc.footer')


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
                to access this website.</p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (9 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

     
    <!-- Required Jquery -->
        <script  src="assets/plugin/jquery/js/jquery.min.js"></script>
        <script  src="assets/plugin/jquery-ui/js/jquery-ui.min.js"></script>
        <script  src="assets/plugin/popper.js/js/popper.min.js"></script>
        <script  src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
        <!-- jquery slimscroll js -->
        <script  src="assets/plugin/jquery-slimscroll/js/jquery.slimscroll.js"></script>
        <!-- modernizr js -->
        <script  src="assets/plugin/modernizr/js/modernizr.js"></script>
        <script  src="assets/plugin/modernizr/js/css-scrollbars.js"></script>
        <script src="assets/js/pcoded.min.js"></script>
        <script src="assets/js/vertical/vertical-layout.js"></script>
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/plugin/jquery-validation/js/jquery.validate.js"></script>
        <!-- Select 2 js -->
        <script  src="assets/plugin/select2/js/select2.full.min.js"></script>

        <script src="assets/plugin/chart.js/js/Chart.js"></script>
        <script src="assets/js/moment.js"></script>
        <script src="assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        
        <script src="assets/plugin/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugin/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/pages/data-table/js/jszip.min.js"></script>
        <!-- <script src="assets/pages/data-table/js/pdfmake.min.js"></script> -->
        <script src="assets/pages/data-table/js/vfs_fonts.js"></script>
        <script src="assets/plugin/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/plugin/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/plugin/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/plugin/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/plugin/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <!-- Custom js -->
        <script src="assets/plugin/summernote-master/dist/summernote-bs4.js">


        <script  src="assets/js/jquery.form-cache.js"></scr>
        <script  src="assets/js/html2canvas.min.js"></script>
        <script  src="assets/plugin/jquery-confirm/jquery-confirm.min.js"></script>
        
        <!-- Custom js -->
        <script src="assets/js/script.js"></script>
        <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
        @include('sweet::alert')
        <script>
		$(document).ready(function() {
			
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            
            // $('.summernote').summernote({
            //     toolbar: [
            //     // [groupName, [list of button]]
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']]
            //     ],
            // });
        
        });
        </script>
        @stack('scripts')
        
</body>

</html>