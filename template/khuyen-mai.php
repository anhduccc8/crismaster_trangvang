<?php
/*
*Template Name: Trang Khuyến mãi
*
*/
get_header();
$mobile = wp_is_mobile();?>
    <section id="wrapper">
        <nav data-depth="2" class="breadcrumb hidden-sm-down">
            <ol>
                <li>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span >Trang chủ</span></a>
                </li>
                <li>
                    <span itemprop="name">Khuyễn mãi</span>
                </li>
            </ol>
        </nav>
        <div id="content-wrapper">
            <section id="main">
                <section id="content" class="page-content page-cms page-cms-6">
                    <div class="tea_content_body">
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
            </section>
        </div>
    </section>
<?php
get_footer();
?>