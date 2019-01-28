<form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-validation form-bordered">
    <div id="page-content">
        <?php
        if (isset($errors) and ! empty($errors)):
            foreach ($errors as $error):
                echo "<div class='alert alert-danger'>" . $error . "</div>";
            endforeach;
        endif;
        ?>
        <div class="row">
            <div class="col-sm-8">
                <div class="block">
                    <div class="block-title">
                        <h2>Quản lý <strong>Tin tức</strong></h2>
                    </div>
                    <div class="form-group">
                        <label>Tên bài viết</label>
                        <input type="text" name="post[title]" required="true" value="<?php echo ($item ? $item['title'] : ''); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea name="post[short_desc]" required="true" rows="5" class="form-control"><?php echo ($item ? $item['short_desc'] : ''); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="post[content]" rows="10" class="tinymce"><?php echo ($item ? $item['content'] : ''); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="block">
                    <div class="block-title">
                        <h2>Thông tin thêm</h2>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="file" class="file-preview" />
                        <div class="preview">
                            <div class="pre-image">
                                <?php
                                if (isset($edit) and $item['thumbnail']):
                                    echo '<img src="' . base_url($item['thumbnail']) . '" class="img-responsive" />';
                                endif;
                                ?>
                            </div>
                            <?php
//                            if (isset($edit) and $item['thumbnail']):
//                                echo "<span class='rm-thumb' data-primary='" . $item['id'] . "'>&times;</span>";
//                            endif;
                            ?>
                        </div>
                        <div class="note">
                            Lưu ý: kích thước tối đa 960x640 và không vượt quá 1MB
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="pull-left">
                            <a class="btn btn-default" href="<?php echo base_url('backend/posts'); ?>"><i class="fa fa-chevron-left"></i> Quay lại</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-refresh"></i> <?php echo (isset($edit) ? 'Cập nhật' : 'Thêm mới'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="post[id]" value="<?php echo (isset($edit) ? $item['id'] : ''); ?>" />
</form>
<script src="<?php echo base_url('public/assets/js/helpers/tinymce/tinymce.min.js') ?>"></script>
<script>tinymce.init({selector: '.tinymce'});</script>
<script src="<?php echo base_url('public/assets/js/pages/formsValidation.js') ?>"></script>
<script>
    $(function () {
        FormsValidation.init();
    });
</script>
