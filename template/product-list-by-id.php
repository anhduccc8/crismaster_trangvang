<?php
/*
*Template Name: Danh sách sản phẩm theo ID danh mục
*
*/
get_header();
$mobile = wp_is_mobile();?>

    <section id="main">
        <div class="col-xs-12 col-sm-12 col-md-12 category_header_banner">
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