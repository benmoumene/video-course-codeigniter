<?php $user_data = $this->session->userdata('user_admin'); ?>
<!-- Brand -->
<a href="#" class="sidebar-brand">
    <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Piano</strong> trực tuyến</span>
</a>
<!-- END Brand -->
<!-- User Info -->
<div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
    <div class="sidebar-user-avatar">
        <a href="#"><img src="<?php echo base_url(); ?>public/assets/img/avatar.jpg" alt="avatar"></a>
    </div>
    <div class="sidebar-user-name">
        <?php echo (isset($user_data['fullname']) ? $user_data['fullname'] : 'Quản trị viên'); ?>
    </div>
    <div class="sidebar-user-links">
        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
        <a href="<?php echo base_url('auth/logout'); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
    </div>
</div>
<!-- END User Info -->
<?php $module_current = ($this->uri->segment(2) ? $this->uri->segment(2) : ''); ?>
<!-- Sidebar Navigation -->
<ul class="sidebar-nav">
    <li class="<?php echo ($module_current ? '' : 'active'); ?>">
        <a href="<?php echo base_url('backend'); ?>"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
    </li>
    <li class="<?php echo ($module_current == 'posts' ? 'active' : ''); ?>">
        <a href="<?php echo base_url('backend/posts'); ?>" class="sidebar-nav-menu">
            <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
            <i class="gi gi-book sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Tin tức</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo base_url('backend/posts'); ?>">Tất cả</a>
            </li>
            <li>
                <a href="<?php echo base_url('backend/posts/add'); ?>">Thêm mới</a>
            </li>
        </ul>
    </li>
    <li class="<?php echo ($module_current == 'users' ? 'active' : ''); ?>">
        <a href="<?php echo base_url('backend/users'); ?>" class="sidebar-nav-menu">
            <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
            <i class="gi gi-user sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Thành viên</span>
        </a>
        <ul>
            <li>
                <a href="<?php echo base_url('backend/users'); ?>">Tất cả</a>
            </li>
            <li>
                <a href="<?php echo base_url('backend/users/add'); ?>">Thêm mới</a>
            </li>
        </ul>
    </li>
    <?php if ($user_data['role'] == 'admin'): ?>
        <li class="<?php echo ($module_current == 'courses' || $module_current == 'coursedetail' ? 'active' : ''); ?>">
            <a href="<?php echo base_url('backend/courses'); ?>" class="sidebar-nav-menu">
                <i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                <i class="gi gi-piano sidebar-nav-icon"></i>
                <span class="sidebar-nav-mini-hide">Khóa học</span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo base_url('backend/courses'); ?>">Khóa học</a>
                </li>
                <li>
                    <a href="<?php echo base_url('backend/coursedetail'); ?>">Chi tiết bài học</a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
</ul>
<!-- END Sidebar Navigation -->