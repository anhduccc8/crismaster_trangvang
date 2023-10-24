<?php
/*
*Template Name: Trang Cửa hàng
*
*/
get_header();
$mobile = wp_is_mobile();?>
    <section id="wrapper ">
        <div class="container" id="stores">
            <div class="content-wrapper">
                <section id="main">
                    <header class="page-header">
                        <h1>
                            Cửa hàng
                        </h1>
                    </header>
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'crismaster' ),
                            'after'  => '</div>',
                        ) );
                    endwhile; // End of the loop.
                    ?>
                </section>
            </div>
        </div>
    </section>
<?php
get_footer();
?>