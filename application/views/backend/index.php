<!doctype html>
<!--[if lt IE 8]>         <html class="no-js lt-ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Quản trị viên - Học piano trực tuyến</title>
        <!-- Stylesheets -->
        <link rel="font icon" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,600italic,700,700italic">
        <link rel="shortcut icon" href="<?php echo base_url('public/assets'); ?>/img/favicon.png">
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css">
        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/plugins.css">
        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/main.css">
        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/themes.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/admin.css">
        <!-- END Stylesheets -->
        <!-- Modernizr (browser feature detection library) -->
        <script src="<?php echo base_url(); ?>public/assets/js/vendor/modernizr.min.js"></script>
        <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
        <script src="<?php echo base_url(); ?>public/assets/js/vendor/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/js/app.js"></script>
    </head>
    <body>
        <div id="page-wrapper">
            <!-- Page Container -->
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <?php echo $this->load->view('backend/includes/nav'); ?>    
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->
                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <?php
                        if (isset($page)):
                            echo $this->load->view($page);
                        else:
                            echo $this->load->view('backend/dashboard');
                        endif;
                        ?>
                    </div>
                    <!-- END Page Content -->
                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="text-center">
                            Copyright &copy; <i class="fa fa-heart text-danger"></i> by HB Developer
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->
        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
        <div class="loading"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div>
        <script src="<?php echo base_url(); ?>public/assets/js/admin.js"></script>
    </body>
</html>