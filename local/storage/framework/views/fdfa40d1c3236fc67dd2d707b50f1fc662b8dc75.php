
<!DOCTYPE html>
<html lang="th">

<head>
    <title>เข้าสู่ระบบ</title>
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
    <base href="<?php echo e(asset('')); ?>">
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
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="assets/plugin/select2/css/select2.min.css" />
    <link rel="stylesheet" href="assets/plugin/jquery-confirm/jquery-confirm.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>


<body class="fix-menu" style="background-color: #f3f3f3;">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div class="login idr-background">
        <section class="login p-fixed d-flex text-center common-img-bg ids-background">
            <!-- Container-fluid starts -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Authentication card start -->
                        <div class="login-card card-block auth-body mr-auto ml-auto">
                            <form action="login" method="post" class="md-float-material">
                            <?php echo e(csrf_field()); ?>

                                <div class="text-center">
                                    <!-- <img src="assets/images/logo-orange.png" alt="logo.png"> -->
                                </div>
                                <div class="auth-box">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-left txt-primary">Sign In</h3>
                                            <?php if($errors->any()){ ?>
                                            <span style="float: left;color: red;font-size: 11px;"><sup>*****</sup>Username or Password not found<sup>*****</sup></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <hr/>

                                    <div class="input-group">
                                        <input type="text" name="username" class="form-control" placeholder="Your User ID">
                                        <span class="md-line"></span>
                                    </div>

                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <span class="md-line"></span>
                                    </div>

                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" name="remember" value="true">
                                                    <span class="cr">
                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                    
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-10" style="font-size:9px;">
                                            <p class="text-inverse text-left m-b-0">COPYRIGHT ©
                                                <?php echo date('Y') ?>
                                            </p>
                                            <p class="text-inverse text-left">
                                                
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <!-- <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png"> -->
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!-- end of form -->
                        </div>
                        <!-- Authentication card end -->
                    </div>
                    <!-- end of col-sm-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container-fluid -->
        </section>
    </div>
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

        <script  src="assets/js/jquery.form-cache.js"></script>
        <script  src="assets/js/html2canvas.min.js"></script>
        <script  src="assets/plugin/jquery-confirm/jquery-confirm.min.js"></script>
        
        <!-- Custom js -->
        <script src="assets/js/script.js"></script>
        
</body>

</html>