<section class="site-content site-section site-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <?php echo $this->load->view('frontend/includes/nav'); ?>
            </div>
            <div class="col-sm-8 col-md-9">
                <?php
                if ($error):
                    echo "<p class='alert alert-danger'>" . $error . "</p>";
                endif;
                if ($message):
                    echo "<p class='alert alert-success'>" . $message . "</p>";
                endif;
                ?>
                <form class="form-validation form-change" method="POST">
                    <p>
                        <label>Mật khẩu cũ</label>
                        <input type="password" required="true" name="oldpassword" class="form-control" />
                    </p>
                    <p>
                        <label>Mật khẩu mới</label>
                        <input type="password" required="true" name="password" class="form-control" />
                    </p>
                    <p>
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" required="true" name="repassword" class="form-control" />
                    </p>
                    <p class="text-center">
                        <input type="submit" class="btn btn-register" value="Thay đổi mật khẩu" />
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>