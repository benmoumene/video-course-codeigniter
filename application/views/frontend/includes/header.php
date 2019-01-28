<?php
$user_current = $this->session->userdata('user_login');
$class = $this->router->fetch_class();
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Khóa học piano trực tuyến - Học viện âm nhạc SEAMI</title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=vietnamese" rel="stylesheet" />
        <link rel="shortcut icon" href="<?php echo base_url() ?>public/assets/img/favicon.png" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/plugins.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/js/helpers/sweetalert2/sweetalert2.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url('public/assets/js/helpers/videojs/video-js.min.css'); ?>" />
        <script src="<?php echo base_url() ?>public/assets/js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <div id="page-container">
            <header class="<?php echo ($class == 'index' ? 'header-fixed' : ''); ?>">
                <div class="container">
                    <a href="<?php echo base_url(); ?>" class="site-logo">
                        <img src="<?php echo base_url(); ?>public/assets/img/logo-transparent.png" class="img-responsive" />
                    </a>
                    <nav>
                        <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                        <ul class="site-nav">
                            <li class="visible-xs visible-sm">
                                <a href="javascript:void(0)" class="site-menu-toggle text-center">
                                    <i class="fa fa-times"></i>
                                </a>
                            </li>
                            <?php if ($user_current): ?>
                                <li>
                                    <a href="javascript:void(0);">
                                        Xin chào, <?php echo $user_current['fullname']; ?>
                                        <i class="fa fa-angle-down site-nav-arrow"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('thong-tin-ca-nhan.html'); ?>">Thông tin cá nhân</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('thoat.html'); ?>">Thoát</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="javascript:void(0);" class="login-menu">Đăng nhập</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="register-menu">Đăng ký</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </header>