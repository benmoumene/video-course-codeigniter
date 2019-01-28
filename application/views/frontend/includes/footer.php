<footer class="site-footer">
    <div class="copyright">© Designed by SEAMI Team.</div>
</footer>
</div>
<!-- Modal -->
<div class="modal fade account-modal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="accountModalLabel">Tài khoản</h4>
            </div>
            <div class="modal-body">
                <div class="response-code"></div>
                <div class="login-modal modal-html">
                    <form class="form-validation" id="form-login" action="<?php echo base_url('dang-nhap-thanh-vien.html'); ?>" method="post" name="form-login">
                        <p>
                            <label>Email *</label>
                            <input type="email" required="true" name="email" class="form-control" placeholder="Email..." />
                        </p>
                        <p>
                            <label>Mật khẩu *</label>
                            <input type="password" required="true" name="password" class="form-control" placeholder="Mật khẩu..." />
                        </p>
                        <p>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0);" class="btn-forgot">Quên mật khẩu</a></li>
                            <li><input type="submit" class="btn btn-login" value="Đăng nhập" /></li>
                        </ul>
                    </form>
                </div>
                <div class="register-modal modal-html">
                    <form class="form-validation" action="<?php echo base_url('dang-ky-thanh-vien.html'); ?>" method="post" name="form-register" id="form-register">
                        <p>
                            <label>Họ và tên *</label>
                            <input type="text" required="true" name="fullname" class="form-control" placeholder="Họ và tên..." />
                        </p>
                        <p>
                            <label>Email *</label>
                            <input type="email" required="true" name="email" class="form-control" placeholder="Email..." />
                        </p>
                        <p>
                            <label>Số điện thoại *</label>
                            <input type="text" required="true" name="phone" class="form-control" placeholder="Số điện thoại..." />
                        </p>
                        <p>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0);" class="btn btn-login">Đăng nhập tại đây</a></li>
                            <li><input type="submit" class="btn btn-register" value="Đăng ký" /></li>
                        </ul>
                    </form>
                </div>
                <div class="forgot-modal modal-html">
                    <form class="form-validation" action="<?php echo base_url('quen-mat-khau.html'); ?>" method="post" name="form-forgot" id="form-forgot">
                        <div class="forgot-group">
                            <input type="email" name="email" required="true" class="form-control" placeholder="Email *" />
                            <button type="submit"><i class="gi gi-envelope"></i> Gửi</button>
                        </div>
                        <ul class="list-unstyled">
                            <li><a href="javascript:void(0);" class="btn btn-login">Đăng nhập tại đây</a></li>
                            <li><a href="javascript:void(0);" class="btn btn-register">Đăng ký tại đây</a></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="javascript:void(0);" id="to-top"><i class="fa fa-angle-up"></i></a>
<div class="loading"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></div>
<script src="<?php echo base_url('public/assets/js/vendor/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/vendor/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/helpers/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/helpers/jquery-validation/localization/messages_vi.min.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/helpers/sweetalert2/sweetalert2.min.js') ?>"></script>
<script type="text/javascript">
    jQuery(function() {
        jQuery('.form-validation').each(function() {
            jQuery(this).validate();
        });
    });
</script>
<script src="<?php echo base_url('public/assets/js/common.js'); ?>"></script>
</body>
</html>