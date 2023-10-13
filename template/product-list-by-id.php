<?php
/*
*Template Name: Danh sách sản phẩm theo ID danh mục
*
*/
get_header();
$mobile = wp_is_mobile();?>
    <section id="wrapper">
        <div class="container">
            <?php
            while ( have_posts() ) : the_post();
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'crismaster' ),
                    'after'  => '</div>',
                ) );
            endwhile; // End of the loop.
            ?>
        </div>
    </section>
<?php
get_footer();
?>