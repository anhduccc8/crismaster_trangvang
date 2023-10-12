<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Crismaster
 * @since 1.0
 * @version 1.0
 */
global  $post;

get_header( );
if(have_posts()):
    while ( have_posts() ) : the_post();
        setPostViews(get_the_ID());
?>
    <section id="wrapper">
    <div id="content-wrapper">
        <div class="container">
            <div class="row">
                <div id="content-wrapper" class="right-column col-xs-12 col-sm-8 col-md-9">
                    <div class="ybc_blog_layout_large_grid ybc-blog-wrapper-detail">
                        <div class="ybc-blog-wrapper-content">
                            <h1 class="page-heading product-listing">
                                <span  class="title_cat" ><?php the_title(); ?></span>
                            </h1>
                            <div class="post-details">
                                <div class="blog-extra">
                                    <div class="ybc-blog-latest-toolbar">
                                            <span class="post-date">
                                                <span class="be-label">Posted on: </span>
                                                <span><?php echo get_the_date(); ?></span>
                                            </span>
                                        <div class="author-block">
                                            <span class="post-author-label">By </span>
                                            <a href="">
                                                    <span class="post-author-name"><?php the_author(); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ybc-blog-tags-social">
                                        <div class="blog-extra-item blog-extra-facebook-share">
                                            <ul>
                                                <li class="facebook icon-gray">
                                                    <a target="_blank" title="Share" class="text-hide" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>">Share</a>
                                                </li>
                                                <li class="twitter icon-gray">
                                                    <a target="_blank" title="Twitter" class="text-hide" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">Twitter</a>
                                                </li>
                                                <li class="pinterest icon-gray">
                                                    <a target="_blank" title="Pinterest" class="text-hide" href="http://www.pinterest.com/pin/create/button/?media=&amp;url=<?php the_permalink(); ?>">Pinterest</a>
                                                </li>
                                                <li class="linkedin icon-gray">
                                                    <a target="_blank" title="LinkedIn" class="text-hide" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title() ?>&amp;summary=&amp;source=LinkedIn">LinkedIn</a>
                                                </li>
                                                <li class="tumblr icon-gray">
                                                    <a target="_blank" title="Tumblr" class="text-hide" href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>">Tumblr</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="blog_description popup_image">
                                    <?php the_content(); ?>
                                </div>
<!--                                Form hữu ích-->
<!--                                Related products-->
<!--                                comment Facebook-->
                                <div class="ybc-blog-wrapper-comment">
<!--                                    <div id="fb-root"></div>-->
<!--                                    <h4 class="title_blog">Facebook comment</h4>-->
<!--                                    <div class="fb-comments">-->
<!--                                        --><?php //echo do_shortcode( '[gs-fb-comments]' ) ?>
<!--                                    </div>-->
                                </div>
                            </div>
<!--related post ybc_blog_related_posts_type_carousel-->
                            <?php
                            if ( is_active_sidebar('sidebar-2') ) {
                                dynamic_sidebar( 'sidebar-2' );
                            }
                            ?>
                        </div>
                    </div>
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

    <?php
    endwhile;
endif;
get_footer();
?>