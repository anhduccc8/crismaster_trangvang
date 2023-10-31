<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage crismaster
 * @since 1.0
 * @version 1.0
 */
$page_title = '';
switch( true ){
	case is_day():
		$page_title = esc_html__( 'Day: ', 'crismaster' ) . get_the_date();
	break;
	case is_month():
		$page_title = esc_html__( 'Month: ', 'crismaster' ) . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'crismaster' ) );
	break;
	case is_year():
		$page_title = esc_html__( 'Year: ', 'crismaster' ) . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'crismaster' ) );
	break;
	case is_search():
		$page_title = esc_html__( 'Search Results for: ', 'crismaster' ) . get_search_query();
	break;
	case is_tag():
		$page_title = esc_html__( 'Tag: ', 'crismaster' ) . single_tag_title( '', false );
	break;
	case is_category():
		$page_title = esc_html__( 'Category: ', 'crismaster' ) . single_cat_title( '', false );
	break;
	case is_404():
		$page_title = esc_html__( 'OOPS! FILE NOT FOUND', 'crismaster' );
	break;
	default:
		$page_title = esc_html__( 'Archives', 'crismaster' );
	break;
}
?>
<?php
get_header( );?>
        <section id="wrapper">
            <div id="content-wrapper" class="post_layout_kienthuc">
                <div class="container">
                    <div class="row">
                        <div id="content-wrapper" class="right-column col-xs-12 col-sm-8 col-md-9">
                            <h4 class="layout_title">
                                <span><?= $page_title ?></span>
                            </h4>
                        <?php if(have_posts()):
                        while ( have_posts() ) : the_post();
                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));?>
                            <div class="blog_post col-sm-6">
                                <div class="post-wrapper">
                                    <a class="ybc_item_img" href="<?php the_permalink(); ?>">
                                        <img title="<?php the_title() ?>" src="<?= esc_url($single_image[0]) ?>" alt="<?php the_title() ?>">
                                    </a>
                                    <div class="post_des">
                                        <h3 class="post_title">
                                            <a class="ybc_title_block" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        endif;
                        ?>
                        </div>
                        <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
                            <div class="ybc_blog_sidebar ">
                                <div class="ybc-navigation-blog-content">
                                    <?php
                                    if ( is_active_sidebar('sidebar-1') ) {
                                        dynamic_sidebar( 'sidebar-1' );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php get_footer();
