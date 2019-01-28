<section class="site-content site-section site-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <?php echo $this->load->view('frontend/includes/nav'); ?>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="row lst-courses">
                    <?php
                    if (empty($courses)):
                        echo "<p class='alert alert-warning'></p>";
                    else:
                        foreach ($courses as $course):
                            $image = ($course['thumbnail'] ? $course['thumbnail'] : 'public/assets/img/no-image.png');
                            ?>
                            <div class="col-sm-6 col-xs-12">
                                <div class="item">
                                    <img src="<?php echo base_url($image); ?>" class="img-responsive" />
                                    <div class="caption">
                                        <h3><a href="<?php echo base_url('hoc-truc-tuyen/' . $course['id']); ?>"><?php echo $course['title']; ?></a></h3>
                                        <div class="description"><?php echo $course['content']; ?></div>
                                        <a href="<?php echo base_url('hoc-truc-tuyen/' . $course['slug'] . '.html'); ?>" class="btn btn-login">Học bài</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>