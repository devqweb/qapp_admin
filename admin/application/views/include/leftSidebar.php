            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                        <div class="dropdown">
                            <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"  aria-expanded="false">Vimal Vincent</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>
    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>
    
                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">
                                    <i class="mdi mdi-cog"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="<?php echo base_url("home")?>">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-th-large"></i>
                                    <span> Apps </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url("new_app") ?>"><i class="fas fa-plus"></i>  New App</a></li>
                                    <li><a href="<?php echo base_url("manage_app") ?>"><i class="fas fa-sliders-h"></i> Manage Apps</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-view-list"></i>
                                    <span> Categories </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url("new_category")?>"><i class="fas fa-plus"></i>  New Category</a></li>
                                    <li><a href="<?php echo base_url("manage_category")?>"><i class="fas fa-sliders-h"></i> Manage Categories</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-images"></i>
                                    <span> Home Slider </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url("new_home_slider")?>"><i class="fas fa-plus"></i>  New Slider</a></li>
                                    <li><a href="<?php echo base_url("manage_home_slider")?>"><i class="fas fa-sliders-h"></i> Manage Sliders</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-image"></i>
                                    <span> Trending Technologies </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url("new_trending_banner")?>"><i class="fas fa-plus"></i>  New Trending Banner</a></li>
                                    <li><a href="<?php echo base_url("manage_trending_banner")?>"><i class="fas fa-sliders-h"></i> Manage Trending Banners</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-ribbon"></i>
                                    <span> Subscription </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url("new_subscription")?>"><i class="fas fa-plus"></i> New Subscription</a></li>
                                    <li><a href="<?php echo base_url("manage_subscription")?>"><i class="fas fa-sliders-h"></i> Manage Subscription</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-bullhorn"></i>
                                    <span> Promotion </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url("new_promotion")?>"><i class="fas fa-plus"></i>  New Promotion</a></li>
                                    <li><a href="<?php echo base_url("manage_promotion")?>"><i class="fas fa-sliders-h"></i> Manage Promotion</a></li>
                                    <li><a href="<?php echo base_url("manage_promotion")?>">New Requests</a></li>
                                    <li><a href="<?php echo base_url("manage_promotion")?>"><i class=" fas fa-table"></i> View All Promotions</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?php echo base_url("calendar")?>">
                                    <i class="fas fa-th-large"></i>
                                    <span> Calender </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("manage_trending_banner")?>">
                                    <i class="fas fa-th-large"></i>
                                    <span> App of the month </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("manage_trending_banner")?>">
                                    <i class="fas fa-th-large"></i>
                                    <span> App of the week </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url("manage_trending_banner")?>">
                                    <i class="fas fa-th-large"></i>
                                    <span> Featured Apps </span>
                                </a>                                
                            </li>

                            <li>
                                <a href="<?php echo base_url("manage_trending_banner")?>">
                                    <i class="fas fa-th-large"></i>
                                    <span> Latest Release </span>
                                </a>                                
                            </li>

                            <li>
                                <a href="<?php echo base_url("manage_trending_banner")?>">
                                    <i class="fas fa-th-large"></i>
                                    <span> Usefull Apps </span>
                                </a>                                
                            </li>
                            
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>