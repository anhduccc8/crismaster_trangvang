<?php
/*
*Template Name: Danh sách blog
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
                    <span itemprop="name">Blog</span>
                </li>
            </ol>
        </nav>
        <div id="content-wrapper">
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