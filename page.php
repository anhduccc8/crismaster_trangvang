<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Lolo
 * @since 1.0
 * @version 1.0
 */

get_header( );


ftc_breadcrumbs_title($show_breadcrumb, $show_page_title, get_the_title());
$page_column_class = '';
?>
    <section id="wrapper">
        <div id="content-wrapper">
            <section id="main">
                <section id="content" class="page-home">
                    <div class="tea_content_body">
                        <div id="primary" class="content-area">
                         <main id="main" class="site-main container" >
                            <?php
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/page/content', 'page' );
                        // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                            endif;
                            endwhile; // End of the loop.
                            ?>
                        </main><!-- #main -->
                         </div>
                    </div>
                </section>
            </section>
        </div>
    </section>
<?php get_footer();
