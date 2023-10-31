<?php
/*
*Template Name: Danh sách category bolog
*
*/
get_header();
$mobile = wp_is_mobile();?>
    <section id="wrapper">
        <div id="content-wrapper" class="post_layout_kienthuc">
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="right-column col-xs-12 col-sm-8 col-md-9">
                        <div class="ybc_blog_layout_large_grid ybc-blog-wrapper ybc-blog-wrapper-blog-list loadmore">
                            <h2 class="page-heading product-listing">All categories</h2>
                            <ul class="ybc-blog-list row">
                                <?php $args = array(
                                    'orderby' => 'slug',
                                    'parent' => 0
                                );
                                $categories = get_categories( $args );
                                foreach( $categories as $category ){
                                ?>
                                <li class="list_category_item">
                                    <div class="post-wrapper">
                                        <div class="ybc-blog-wrapper-content">
                                            <div class="ybc-blog-wrapper-content-main">
                                                <a class="ybc_title_block"
                                                   href="<?php get_category_link( $category->term_id ) ?>">
                                                    <?= $category->name ?>&nbsp;(<?= $category->category_count ?>)
                                                </a>
                                                <div class="blog_description">
                                                    <p></p>
                                                </div>
                                                <div class="clearfix"></div>
                                                <a class="view_detail_link blog_view_all"
                                                   href="<?php get_category_link( $category->term_id ) ?>">
                                                    View <?= $category->category_count ?> posts
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    <?php
                                }
                                ?>
                            </ul>
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
get_footer();
?>