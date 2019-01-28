<?php
$user_current = $this->session->userdata('user_login');
?>
<section class="main-video">
    <iframe width="100%" src="https://www.youtube.com/embed/K8s1U2W0k0s?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
    <?php if (!$user_current): ?>
        <div class="sec-register">
            <ul class="list-unstyled">
                <li><a href="javascript:void(0);" class="btn btn-info login-menu">Đăng nhập</a></li>
                <li><a href="javascript:void(0);" class="btn btn-register register-menu">Đăng ký khóa học</a></li>
            </ul>
        </div>
    <?php endif; ?>
</section>
<section class="site-content site-section site-gray block-about">
    <div class="container">
        <div class="block-header"><h2>Seami là ai?</h2></div>
        <div class="block-body">
            <p>Học viện Âm nhạc Đông Nam Á (South East Asia Music Institute – SEAMI) là đơn vị chuyên đào tạo âm nhạc, nghệ thuật. Với triết lý đào tạo âm nhạc nghệ thuật được tiêu chuẩn hoá bằng công nghệ Quản Lý Giáo Dục: việc đào tạo âm nhạc phải tuân theo lộ trình học tập để đảm bảo chất lượng đầu ra, không dựa trên sự tuỳ hứng, tuỳ biến.</p>
            <p>Chúng tôi phát triển LỘ TRÌNH HỌC TẬP được xây dựng và tổng hợp từ nhiều hệ thống chứng chỉ quốc tế danh tiếng như RSL (một trong những hệ thống chứng chỉ âm nhạc Quốc tế hàng đầu về rock và pop) và ABRSM (hệ thống chứng chỉ âm nhạc Quốc tế hàng đầu về Cổ điển).</p>
            <p>Với mong muốn phổ cập kiến thức âm nhạc đến với cộng đồng, SEAMI đào tạo nhiều bộ môn trên cơ sở CHUẨN HOÁ về quy trình giảng dạy, giáo trình, giảng viên, trang thiết bị. Đồng thời tạo nên nhiều hoạt động ngoại khóa hỗ trợ học viên nâng cao trải nghiệm và thể hiện bản thân.</p>
        </div>
    </div>
</section>
<section class="site-content site-section block-book">
    <div class="container">
        <div class="block-header"><h2>Giới thiệu khóa học</h2></div>
        <div class="block-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Buổi 1: Làm quen đàn piano
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                            on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                            raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Buổi 2: Học thanh nhạc trong piano
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                            on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                            raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Buổi 3: Thực hành một số bài hát cơ bản
                        </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
                            on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                            raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-content site-section site-gray">
    <div class="container">
        <div class="block-header"><h2>Cảm nhận học viên</h2></div>
        <div class="block-body">
            <div class="quote-list">
                <div class="item row">
                    <div class="client-item">
                        <img src="<?php echo base_url('public/uploads/testimonial/term-1.jpg'); ?>" class="img-responsive" />
                    </div>
                    <div class="quote-item">
                        <div class="name">Huỳnh Duy Thảo – Học viên lớp guitar</div>
                        <div class="description">
                            Mình cảm thấy đi học ở đây rất là vui, cô giáo chỉ dạy, động viên nhiều thứ, còn các em học chung thật là năng động.
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class="client-item">
                        <img src="<?php echo base_url('public/uploads/testimonial/term-2.jpg'); ?>" class="img-responsive" />
                    </div>
                    <div class="quote-item">
                        <div class="name">Võ Tiến Đạt – Học viên lớp học thử Ukulele</div>
                        <div class="description">
                            Buổi học hôm nay tôi cảm thấy rất thú vị với sự hướng dẫn tận tình và tỉ mỉ của giáo viên, tôi đã nhấn được các hợp âm và đánh đệm được bài Happy Birthday.
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class="client-item">
                        <img src="<?php echo base_url('public/uploads/testimonial/term-3.png'); ?>" class="img-responsive" />
                    </div>
                    <div class="quote-item">
                        <div class="name">Kay Trần – Học viên Piano</div>
                        <div class="description">
                            2 từ khóa mình dành cho SEAMI đó là nhiệt tình và rất thoải mái.
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class="client-item">
                        <img src="<?php echo base_url('public/uploads/testimonial/term-4.png'); ?>" class="img-responsive" />
                    </div>
                    <div class="quote-item">
                        <div class="name">Bác Vinh – Học viên Thanh nhạc</div>
                        <div class="description">
                            Tôi cảm thấy giáo viên vui vẻ, tận tâm và rất là kiên nhẫn trong sự hướng dẫn cho các học viên.
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class="client-item">
                        <img src="<?php echo base_url('public/uploads/testimonial/term-5.jpg'); ?>" class="img-responsive" />
                    </div>
                    <div class="quote-item">
                        <div class="name">Học viên Yae Mori – Học viên lớp Guitar</div>
                        <div class="description">
                            Tôi cảm thấy học hợp âm rất khó, nhờ giáo viên vừa bấm từng ngón tay vừa chỉ tôi 1 cách cẩn thận mà tôi đã thành thạo hơn.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="site-content site-section block-course">
    <div class="container">
        <div class="block-header"><h2>Học phí khóa học</h2></div>
        <div class="row">
            <?php
            if ($courses):
                foreach ($courses as $item):
                    ?>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="formbox-wrap">
                            <div class="formbox-text">
                                <h3><?php echo $item['title']; ?></h3>
                                <div class="description">
                                    <?php echo $item['content']; ?>
                                </div>
                            </div>
                            <div class="formbox-price">
                                <?php
                                if ($item['price_sale']):
                                    echo '<span class="price-sale">' . number_format($item['price_sale']) . ' VNĐ</span>';
                                    echo '<span class="price-regular">' . number_format($item['price']) . ' VNĐ</span>';
                                else:
                                    echo number_format($item['price']) . ' VNĐ';
                                endif;
                                ?>
                                <div class="formbox-button">
                                    <a data-primary="<?php echo $item['id']; ?>" href="javascript:void(0)" class="btn btn-primary <?php echo ($user_current ? 'choose-course' : 'register-menu'); ?>">Chọn khóa học</a>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<!--<section class="site-content site-section site-gray">
    <div class="container">
        <div class="sec-form">
            <div class="form-header">Đăng ký học thử</div>
            <div class="form-body">
                <form action="" class="form-validation">
                    <p>
                        <label>Họ và tên *</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Họ và tên" required="true" />
                    </p>
                    <p>
                        <label>Số điện thoại *</label>
                        <input type="text" minlength="10" maxlength="11" class="form-control" name="phone" placeholder="Số điện thoại" required="true" />
                    </p>
                    <p>
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="Email *" required="true" />
                    </p>
                    <p>
                        <input type="submit" value="Đăng ký học thử" class="btn btn-register" />
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>-->
<!--<section class="site-content site-section">
    <div class="container">
        <div class="site-block">
            <div class="block-header"><h2>Học thử piano</h2></div>
            <div class="sec-learning">
                <ul class="list-unstyled row">
                    <li class="col-md-3 col-sm-4 col-xs-12">
                        <div class="item">
                            <img src="<?php echo base_url('public/assets/img/photo.png') ?>" alt="" class="img-responsive" />
                            <span class="icon-play"></span>
                        </div>
                        <h4>Học thử piano cơ bản</h4>
                    </li>
                    <li class="col-md-3 col-sm-4 col-xs-12">
                        <div class="item">
                            <img src="<?php echo base_url('public/assets/img/photo.png') ?>" alt="" class="img-responsive" />
                            <span class="icon-play"></span>
                        </div>
                        <h4>Học thử piano cơ bản</h4>
                    </li>
                    <li class="col-md-3 col-sm-4 col-xs-12">
                        <div class="item">
                            <img src="<?php echo base_url('public/assets/img/photo.png') ?>" alt="" class="img-responsive" />
                            <span class="icon-play"></span>
                        </div>
                        <h4>Học thử piano cơ bản</h4>
                    </li>
                    <li class="col-md-3 col-sm-4 col-xs-12">
                        <div class="item">
                            <img src="<?php echo base_url('public/assets/img/photo.png') ?>" alt="" class="img-responsive" />
                            <span class="icon-play"></span>
                        </div>
                        <h4>Học thử piano cơ bản</h4>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>-->
<input type="hidden" id="courseURL" value="<?php echo base_url('dang-ky-khoa-hoc.html'); ?>" />