                <?php

                $path = explode('/',Request::path());
    

                ?>
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigation-label" menu-title-theme="theme1">ระบบจัดการหลังบ้าน</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="{{ (($path[0] == '')?'active':'') }}">
                                <a href="{{ action('DashboardController@index') }}">
                                    <span class="pcoded-micon"><i class="fas fa-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext">ภาพรวม</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ (($path[0] == 'banner')?'active':'') }}">
                                <a href="{{ action('BannerController@index') }}">
                                    <span class="pcoded-micon"><i class="fas fa-images"></i><b>B</b></span>
                                    <span class="pcoded-mtext">จัดการแบนเนอร์</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ (($path[0] == 'new')?'active':'') }}">
                                <a href="{{ action('NewController@index') }}">
                                    <span class="pcoded-micon"><i class="fas fa-newspaper"></i><b>N</b></span>
                                    <span class="pcoded-mtext">หน้าข่าวสาร</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ (($path[0] == 'catalogs')?'active':'') }}">
                                <a href="{{ action('CatalogsController@index') }}">
                                    <span class="pcoded-micon"><i class="fas fa-layer-group"></i><b>T</b></span>
                                    <span class="pcoded-mtext">จัดการหมวดหมู่สินค้า</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ (($path[0] == 'product')?'active':'') }}">
                                <a href="{{ action('ProductsController@index') }}">
                                    <span class="pcoded-micon"><i class="fab fa-product-hunt"></i><b>P</b></span>
                                    <span class="pcoded-mtext">จัดการสินค้า</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ (($path[0] == 'order')?'active':'') }}">
                                <a href="{{ action('OrderController@index') }}">
                                    <span class="pcoded-micon"><i class="fas fa-box"></i><b>O</b></span>
                                    <span class="pcoded-mtext">รายการสั่งซื้อ</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <!-- <li class="pcoded-hasmenu active pcoded-trigger" dropdown-icon="style3" subitem-icon="style7">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="active">
                                        <a href="index.html">
                                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                            <span class="pcoded-mtext">Default</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>                                        
                                </ul>
                            </li> -->
                        </ul>
                        <div class="pcoded-navigation-label" menu-title-theme="theme1">ระบบจัดการผู้ดูแลระบบ</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ action('AdminController@index') }}">
                                    <span class="pcoded-micon"><i class="far fa-user"></i><b>A</b></span>
                                    <span class="pcoded-mtext">จัดการผู้ดูแล</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>