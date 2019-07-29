                <?php

                $path = explode('/',Request::path());
    

                ?>
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
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