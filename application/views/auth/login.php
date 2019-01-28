<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Login - Piano trực tuyến</title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="font icon" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,600italic,700,700italic">
        <link rel="shortcut icon" href="<?php echo base_url('public/assets'); ?>/img/favicon.png">
        <!-- END Icons -->
        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo base_url('public/assets'); ?>/css/bootstrap.min.css">
        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo base_url('public/assets'); ?>/css/plugins.css">
        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo base_url('public/assets'); ?>/css/main.css">
        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url('public/assets'); ?>/css/themes.css">
        <!-- END Stylesheets -->
        <!-- Modernizr (browser feature detection library) -->
        <script src="<?php echo base_url('public/assets'); ?>/js/vendor/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <h1><i class="gi gi-music"></i> <strong>Piano Trực Tuyến</strong><br><small>Đăng nhập quản trị</small></h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <form action="" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <?php
                    if ($error):
                        echo '<div class="has-error text-center"><p class="help-block animation-slideDown">' . $error . '</p></div>';
                    endif;
                    ?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email đăng nhập">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
<!--                        <div class="col-xs-6 text-left">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Quên mật khẩu?</small></a>
                        </div>-->
                        <div class="text-center">
                            <input type="hidden" name="action" value="login" />
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Đăng nhập</button>                            
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Reminder Form -->
                <form action="" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
                    <?php
                    if ($error):
                        echo '<div class="has-error text-center"><p class="help-block animation-slideDown">' . $error . '</p></div>';
                    endif;
                    ?>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="text" id="reminder-email" name="reminder-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <input type="hidden" name="action" value="forgot" />
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Gửi yêu cầu</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <small>Quay lại trang</small> <a href="javascript:void(0)" id="link-reminder"><small>Đăng nhập</small></a>
                        </div>
                    </div>
                </form>
                <!-- END Reminder Form -->
            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->
        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?php echo base_url('public/assets'); ?>/js/vendor/jquery.min.js"></script>
        <script src="<?php echo base_url('public/assets'); ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url('public/assets'); ?>/js/plugins.js"></script>
        <script src="<?php echo base_url('public/assets'); ?>/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?php echo base_url('public/assets'); ?>/js/pages/login.js"></script>
        <script>$(function () {
                Login.init();
            });</script>
    </body>
</html>