<?php
$user_current = $this->session->userdata('user_admin');
if ($msg = $this->session->flashdata('success')):
    echo "<p class='alert alert-success'>" . $msg . "</p>";
endif;
if ($msg = $this->session->flashdata('error')):
    echo "<p class='alert alert-danger'>" . $msg . "</p>";
endif;
?>
<div class="block">
    <!-- Table Styles Title -->
    <div class="block-title">
        <h2>Quản lý <strong>Khóa học</strong></h2>
    </div>
    <div class="table-options clearfix">
        <div class="btn-group btn-group-sm">
            <a href="<?php echo base_url('backend/coursedetail/add'); ?>" class="btn btn-primary">
                Thêm mới
            </a>
            <?php
            if ($user_current['role'] == 'admin'):
                echo '<a href="javascript:void(0);" id="style-default" class="btn btn-primary delAll">Xóa tất cả</a>';
            endif;
            ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php if ($user_current['role'] == 'admin'): ?>
                        <th style="width: 50px;" class="text-center"><input type="checkbox"></th>
                    <?php endif; ?>
                    <th>Tên bài học</th>
                    <th>Tên khóa học</th>
                    <th>Ngày tạo</th>
                    <th style="width: 100px;" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($items)):
                    foreach ($items as $item):
                        ?>
                        <tr>
                            <?php if ($user_current['role'] == 'admin'): ?>
                                <td class="text-center">
                                    <input type="checkbox" name="ids[]" value="<?php echo $item['id']; ?>">
                                </td>
                            <?php endif; ?>
                            <td><a href="<?php echo base_url('backend/coursedetail/edit/' . $item['id']); ?>"><?php echo $item['title']; ?></a></td>
                            <td><?php echo $item['course_title']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($item['created_time'])); ?></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="<?php echo base_url('backend/coursedetail/edit/' . $item['id']); ?>" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Sửa"><i class="fa fa-pencil"></i></a>
                                    <?php
                                    if ($user_current['role'] == 'admin'):
                                        echo '<a href="' . base_url('backend/coursedetail/delete/' . $item['id']) . '" data-toggle="tooltip" title="" class="btn btn-danger delete" data-original-title="Xóa"><i class="fa fa-times"></i></a>';
                                    endif;
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                else:
                    echo "<tr><td colspan='7' class='alert alert-danger'>Dữ liệu đang được cập nhật</td></tr>";
                endif;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"><?php echo $pagination; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<input type="hidden" id="delURL" value="<?php echo base_url('backend/coursedetail/deleteAjax'); ?>" />
<script src="<?php echo base_url('public/assets/js/pages/tablesGeneral.js') ?>"></script>
<script>
    $(function () {
        TablesGeneral.init();
    });
</script>
