<?php $method = $this->router->fetch_method(); ?>
<aside class="sidebar site-block">
    <div class="sidebar-block">
        <h4 class="site-heading">Thông tin cá nhân</h4>
        <ul class="list-unstyled">
            <li class="<?php echo (($method == 'index' or $method == 'course_detail') ? 'active' : ''); ?>"><a href="<?php echo base_url('thong-tin-ca-nhan.html'); ?>"><i class="fa fa-file-text-o"></i> Danh sách khóa học</a></li>
            <li class="<?php echo ($method == 'changepassword' ? 'active' : ''); ?>"><a href="<?php echo base_url('thay-doi-mat-khau.html'); ?>"><i class="fa fa-user"></i> Thay đổi mật khẩu</a></li>
            <li><a href="<?php echo base_url('thoat.html'); ?>"><i class="fa fa-sign-out"></i> Thoát</a></li>
        </ul>
    </div>
</aside>