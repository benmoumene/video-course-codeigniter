var App = {
    handleHeader: function() {
        var header = jQuery('header');
        jQuery(window).scroll(function() {
// If the user scrolled a bit (150 pixels) alter the header class to change it
            if (jQuery(this).scrollTop() > header.outerHeight()) {
                header.addClass('header-scroll');
            } else {
                header.removeClass('header-scroll');
            }
        });
    },
    /* Handles Main Menu */
    handleMenu: function() {
        var sideNav = jQuery('.site-nav');
        jQuery('.site-menu-toggle').on('click', function() {
            sideNav.toggleClass('site-nav-visible');
        });
        sideNav.on('mouseleave', function() {
            jQuery(this).removeClass('site-nav-visible');
        });
    },
    scrollToTop: function() {
        // Get link
        var link = jQuery('#to-top');
        var windowW = window.innerWidth
                || document.documentElement.clientWidth
                || document.body.clientWidth;
        jQuery(window).scroll(function() {
            // If the user scrolled a bit (150 pixels) show the link in large resolutions
            if ((jQuery(this).scrollTop() > 150) && (windowW > 991)) {
                link.fadeIn(100);
            } else {
                link.fadeOut(100);
            }
        });
        // On click get to top
        link.click(function() {
            jQuery('html, body').animate({scrollTop: 0}, 500);
            return false;
        });
    },
    mutedVideo: function() {
        jQuery('.pause-video').on('click', function() {
            var vol = jQuery(this).find('i');
            vol.toggleClass('active');
            var vid = document.getElementById("mainVideo");
            if (vol.hasClass('active')) {
                vid.volume = 0;
            } else {
                vid.volume = 1;
            }
        });
    },
    accountModal: function() {
        var userModal = jQuery('.account-modal');
        jQuery('.login-menu').on('click', function() {
            jQuery('.modal-html').removeClass('active').hide();
            userModal.find('.login-modal').addClass('active').fadeIn();
            jQuery('.response-code').text('');
            userModal.modal('show');
        });
        jQuery('.register-menu').on('click', function() {
            jQuery('.modal-html').removeClass('active').hide();
            userModal.find('.register-modal').addClass('active').fadeIn();
            jQuery('.response-code').text('');
            userModal.modal('show');
        });
        jQuery('.btn-forgot').on('click', function() {
            userModal.find('.modal-html').hide();
            jQuery('.response-code').text('');
            userModal.find('.forgot-modal').fadeIn();
        });
        jQuery('.btn-register').on('click', function() {
            userModal.find('.modal-html').hide();
            jQuery('.response-code').text('');
            userModal.find('.register-modal').fadeIn();
        });
        jQuery('.btn-login').on('click', function() {
            userModal.find('.modal-html').hide();
            jQuery('.response-code').text('');
            userModal.find('.login-modal').fadeIn();
        });
    },
    formAction: function() {
        jQuery('#form-login, #form-register, #form-forgot').on('submit', function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize(),
                    url = jQuery(this).attr('action'),
                    id_form = jQuery(this).attr('id');
            jQuery.ajax({
                url: url,
                data: formData,
                type: "POST",
                beforeSend: function() {
                    jQuery('.loading').fadeIn();
                },
                success: function(response) {
                    var json = jQuery.parseJSON(response);
                    jQuery('.response-code').text(json.message);
                    if (json.hasOwnProperty('redirect')) {
                        setTimeout(function() {
                            location.href = json.redirect;
                        }, 2000);
                    } else if (json.status != 0) {
                        document.getElementById(id_form).reset();
                    }
                },
                complete: function() {
                    jQuery('.loading').fadeOut();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    },
    chooseCourse: function() {
        jQuery('.choose-course').on('click', function() {
            var url = jQuery('#courseURL').val(),
                    primary = jQuery(this).data('primary');
            swal({
                title: 'Bạn muốn đăng ký khóa học này ?',
                type: 'info',
                showCancelButton: true,
                confirmButtonText: 'Đăng ký',
                cancelButtonText: 'Hủy'
            }).then(function(isConfirm) {
                if (isConfirm.hasOwnProperty('value')) {
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: {course_id: primary},
                        beforeSend: function() {
                            jQuery('.loading').fadeIn();
                        },
                        success: function(response) {
                            jQuery('.loading').fadeOut();
                            swal('Thông báo', response, 'info');
                        }
                    });
                }
            });
        });
    },
    modalVideo: function() {
        var count = 1;
        jQuery('.lst-courses').on('click', '.icon-play', function() {
            var src = jQuery(this).data('key'),
                    modal = jQuery('.video-modal'),
                    vid = 'video-' + count,
                    html = video_html(vid, src);
            modal.find('.video-body').html(html);
            videojs(vid, {height: 435}).play();
            modal.fadeIn();
        });
        jQuery('.close-video').on('click', function() {
            jQuery('.video-modal .video-body').html('');
            jQuery('.video-modal').fadeOut();
            count++;
        });
        function video_html(vid, src) {
            var html = '<video id="' + vid + '" class="video-js vjs-default-skin" controls="true">';
            html += '<source src="' + base64_decode(src) + '" type="application/x-mpegURL"></video>';
            return html;
        }

        function base64_decode(input) {
            var keyStr = "ABCDEFGHIJKLMNOP" +
                    "QRSTUVWXYZabcdef" +
                    "ghijklmnopqrstuv" +
                    "wxyz0123456789+/" +
                    "=";
            var output = "";
            var chr1, chr2, chr3 = "";
            var enc1, enc2, enc3, enc4 = "";
            var i = 0;
            // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
            var base64test = /[^A-Za-z0-9\+\/\=]/g;
            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            do {
                enc1 = keyStr.indexOf(input.charAt(i++));
                enc2 = keyStr.indexOf(input.charAt(i++));
                enc3 = keyStr.indexOf(input.charAt(i++));
                enc4 = keyStr.indexOf(input.charAt(i++));
                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;
                output = output + String.fromCharCode(chr1);
                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }
                chr1 = chr2 = chr3 = "";
                enc1 = enc2 = enc3 = enc4 = "";
            } while (i < input.length);
            return unescape(output);
        }
    },
    formQuestion: function() {
        jQuery('.form-question').on('submit', function(e) {
            e.preventDefault();
            var form = jQuery(this), url = form.attr('action'),
                    data = form.serialize();
            if (form.valid()) {
                jQuery.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    beforeSend: function() {
                        jQuery('.loading').fadeIn();
                    },
                    success: function(response) {
                        var json = jQuery.parseJSON(response);
                        if (json.status == 1) {
                            jQuery('.form-message').removeClass('alert-warning');
                            jQuery('.form-message').addClass('alert alert-success');
                            document.getElementById('form-question').reset();
                        } else {
                            jQuery('.form-message').removeClass('alert-success');
                            jQuery('.form-message').addClass('alert alert-warning');
                        }
                        jQuery('.form-message').text(json.message);
                    },
                    complete: function() {
                        jQuery('.loading').fadeOut();
                    }
                });
            }
        });
    }
};
/* Initialize app when page loads */
jQuery(document).ready(function() {
    App.handleHeader();
    App.handleMenu();
    App.scrollToTop();
    App.mutedVideo();
    App.accountModal();
    App.formAction();
    App.chooseCourse();
    App.modalVideo();
    App.formQuestion();
});