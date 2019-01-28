var Admin = {
    previewImage: function () {
        jQuery('.file-preview').on('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var html = '<img src="' + e.target.result + '" class="img-responsive" />';
                    jQuery('.preview .pre-image').html(html);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    },
    deleteRecord: function () {
        jQuery('.delAll').on('click', function () {
            var checkbox = jQuery('input[name="ids[]"]:checked'),
                    ajaxURL = jQuery('#delURL').val();
            if (checkbox.length) {
                var confirm = window.confirm('Bạn có muốn xóa không');
                if (confirm) {
                    var values = [];
                    checkbox.each(function () {
                        values.push(jQuery(this).val());
                    });
                    if (values.length > 0) {
                        jQuery.ajax({
                            type: "POST",
                            url: ajaxURL,
                            data: {values: values},
                            beforeSend: function () {
                                jQuery('.loading').fadeIn();
                            },
                            success: function (response) {
                                console.log(response);
                                if (response == 1) {
                                    alert('Đã xóa thành công');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);
                                } else {
                                    alert('Có lỗi xảy ra, vui lòng thử lại');
                                }
                            },
                            complete: function () {
                                jQuery('.loading').fadeOut();
                            }
                        });
                    }
                }
            } else {
                alert('Vui lòng chọn item để xóa');
            }
        });
        jQuery('.delete').on('click', function () {
            var confirm = window.confirm('Bạn có muốn xóa không');
            if (confirm) {
                return true;
            }
            return false;
        });
    }
};
jQuery(document).ready(function () {
    Admin.previewImage();
    Admin.deleteRecord();
});