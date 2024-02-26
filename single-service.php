<?php
get_header('short');
if(have_posts()):
    while ( have_posts() ) : the_post();?>
        <main class="site-content-danh-muc">
            <div class="container-fluid">
                <div class="row-custom">
                    <div class="row-custom">
                        <section class="section-blog-service space-custom-02">
                            <div class="container-fluid-ct">
                                <div class="row row-custom">
                                    <div class="col-xs-12 col-lg-9">
                                        <h4 class="item-post-title style-02"><?= get_the_title() ?></h4>
                                        <div class="row row-custom-box-content">
                                            <div class="col-xs-12">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;
get_footer();
?>