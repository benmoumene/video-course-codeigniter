<section class="site-content site-section site-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <?php echo $this->load->view('frontend/includes/nav'); ?>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="row lst-courses">
                    <?php
                    if (empty($items)):
                        echo "<p class='alert alert-warning'></p>";
                    else:
                        foreach ($items as $item):
                            $image = ($item['thumbnail'] ? $item['thumbnail'] : 'public/assets/img/no-image.png');
                            ?>
                            <div class="col-sm-6 col-xs-12">
                                <div class="item">
                                    <div class="sec-thumbnail">
                                        <img src="<?php echo base_url($image); ?>" class="img-responsive" />
                                        <span data-key="<?php echo base64_encode(base_url($item['video_stream'] . '/output.m3u8')); ?>" class="icon-play"></span>
                                    </div>
                                    <div class="caption">
                                        <h3><?php echo $item['title']; ?></h3>
                                        <div class="description"><?php echo $item['content']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="block-question">
                    <div class="block-header">Thắc mắc về bài học</div>
                    <form action="<?php echo base_url('thac-mac-bai-hoc.html'); ?>" method="POST" id="form-question" class="form-validation form-question">
                        <div class="form-message"></div>
                        <div class="form-group">
                            <textarea rows="8" placeholder="Nội dung" name="content" required="true" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $course['id']; ?>" />
                            <button type="submit" class="btn btn-register">Gửi thắc mắc</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="video-modal">
    <div class="video-container">
        <div class="close-video">&times;</div>
        <div class="video-body"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/helpers/videojs/video.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/helpers/videojs/videojs-contrib-hls.js'); ?>"></script>