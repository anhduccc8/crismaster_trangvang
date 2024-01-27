<?php
get_header('short');

if(have_posts()):
    while ( have_posts() ) : the_post();?>
        <main class="site-content-danh-muc">
            <div class="container-fluid">
                <div class="row-custom">
                    <?php the_content(); ?>
                </div>
            </div>
        </main>
    <?php
    endwhile;
endif;
get_footer();
?>