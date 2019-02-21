<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo e(asset('CoolAdmin/css/font-face.css')); ?>"                                                  rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css')); ?>"                   rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>"                  rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css')); ?>"            rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo e(asset('CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.css')); ?>"                             rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo e(asset('CoolAdmin/vendor/animsition/animsition.min.css')); ?>"                               rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')); ?>"   rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/wow/animate.css')); ?>"                                             rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/css-hamburgers/hamburgers.min.css')); ?>"                           rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/slick/slick.css')); ?>"                                             rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/select2/select2.min.css')); ?>"                                     rel="stylesheet" media="all">
    <link href="<?php echo e(asset('CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>"                     rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="<?php echo e(asset('CoolAdmin/css/theme.css')); ?>"                                                      rel="stylesheet" media="all">


<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "a8df0c29-7a89-44ac-98ca-b40ab86c2ff3",
    });
  });
</script>
</head>

<body class="animsition" >
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo e(asset('image/logoAdmin.png')); ?>" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo e(route('home.index')); ?>">
                    <img style="width:100%;height:100%"  src="<?php echo e(asset('image/logoAdmin.png')); ?>" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Tổng Quan</a>

                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo e(route('admin_category.index')); ?>">
                                <i class="fas fa-align-justify"></i>QL Danh Mục</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                            </ul>
                        </li>
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo e(route('admin_products.index')); ?>">
                                <i class="fas fa-gift"></i>QL Sản Phẩm</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo e(route('admin_order.index')); ?>">
                                <i class="fas fa-file-text"></i>QL Đơn Hàng</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo e(route('admin_users.index')); ?>">
                                <i class="fas fa-users"></i>QL Người Dùng</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?php echo e(route('admin_slide.index')); ?>">
                                <i class="fas fa-table"></i>QL Slide</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            </ul>
                        </li>
                        

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <ul id="messages" class="list-group"></ul>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu" data-toggle="dropdown">
                                        <i class="zmdi zmdi-notifications" data-count="0"></i>
                                        <span class="quantity">0</span>
                                        <div class="notifi-dropdown js-dropdown" >
                                            <div class="notifi__title" data-toggle="dropdown">
                                                <p>Bạn Có (<span class="notif-count">0</span>) thông báo</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </div>
                                                <div class="content">
                                                    <a href=""><p>Bạn Có 1 Đơn Hàng Mới</p></a>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <?php if(Auth::check()): ?>
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo e(asset('image/img_avatar2.png')); ?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo e(asset('image/img_avatar2.png')); ?>" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo e(Auth::user()->name); ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo e(Auth::user()->email); ?></span>
                                                </div>
                                            </div>

                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo e(route('logout')); ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="row">
                    <?php echo Breadcrumbs::render(); ?>

                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    
    <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
    </script>
    
    <script>
        CKEDITOR.replace('ckeditor', options);
    </script>
    
    <script src="<?php echo e(asset('CoolAdmin/vendor/jquery-3.2.1.min.js')); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo e(asset('CoolAdmin/vendor/bootstrap-4.1/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js')); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo e(asset('CoolAdmin/vendor/slick/slick.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/animsition/animsition.min.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/counter-up/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/counter-up/jquery.counterup.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/circle-progress/circle-progress.min.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/chartjs/Chart.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('CoolAdmin/vendor/select2/select2.min.js')); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo e(asset('CoolAdmin/js/main.js')); ?>"></script>
    <!-- CKEDITOR -->
    

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>

    <script>
      $(document).ready(function(){
        var pusher = new Pusher('5247df2e6d49e755e640', {
            cluster: 'ap1',
            encrypted: true
        });

        var channel = pusher.subscribe('channel-demo-real-time');
        channel.bind('App\\Events\\NewCustomer', addMessageDemo);

      });

      //function add message
      function addMessageDemo(data) {
        var liTag = $("<li class='list-group-item'></li>");
        liTag.html(data.message);
        $('#messages').append(liTag);
      }
    </script>

</body>

</html>
<!-- end document-->
