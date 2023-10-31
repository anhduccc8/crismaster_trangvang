<?php
add_action( 'widgets_init', 'create_crismaster_widget' );
function create_crismaster_widget() {
    register_widget('crismaster_Related_Post');
    register_widget('Crismaster_Recent_Product');
    register_widget( 'Crismaster_Category_Posts' );
    register_widget( 'Crismaster_Popular_Posts' );
}

/* Creat Widgets */

class crismaster_Related_Post extends WP_Widget
{
    /**
     * widget init: name, base ID
     */
    function __construct()
    {
        $tpwidget_options = array(
            'classname' => 'related-blogs', // widget class
            'description' => 'Cris - Bài viết liên quan'
        );
        parent::__construct('crismaster_Related_Products_widget_id', 'Cris - Bài viết liên quan', $tpwidget_options);// ID, Name, .
    }

    /**
     * creat form option for widget
     */
    function form($instance)
    {

        //  Default Variables
        $default = array(
            'title' => '',
            'number' => '',
            'ids_pro' => '',
        );

        $instance = wp_parse_args((array)$instance, $default);

        //Tạo biến riêng cho giá trị mặc định trong mảng $default
        $title = esc_attr($instance['title']);
        $number = esc_attr($instance['number']);
        $ids_pro = esc_attr($instance['ids_pro']);

        //Show form option in widget
        echo "<p>Tiêu đề cần được hiển thị<input type='text' class='widefat' name='" . $this->get_field_name('title') . "' value='" . $title . "' /></p>";
        echo "<p>Số bài viết muốn hiển thị<input type='text' class='widefat' name='" . $this->get_field_name('number') . "' value='" . $number . "' /></p>";
        echo "<p>Hoặc Nhập IDs các  bài viết nổi bật (ví dụ 1,2,3,..)<input type='text' class='widefat' name='" . $this->get_field_name('ids_pro') . "' value='" . $ids_pro . "' /></p>";
    }

    /**
     * save widget form
     */

    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = esc_attr($new_instance['number']);
        $instance['ids_pro'] = esc_attr($new_instance['ids_pro']);
        return $instance;
    }

    /**
     * Show widget
     */

    function widget($args, $instance)
    {

        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $number = $instance['number'];
        $ids_pro = $instance['ids_pro'];
        ?>
        <div class="ybc-blog-related-posts ybc_blog_related_posts_type_carousel">
             <h4 class="title_blog">Related posts</h4>
                    <div class="ybc-blog-related-posts-wrapper">
                    <ul class="ybc-blog-related-posts-list dt-3 related-blogs owl-carousel">
                    <?php
                    if (isset($ids_pro) && $ids_pro != '') {
                        $p_ids_pro = explode(',', $ids_pro);
                        $query = new WP_Query(array(
                            'post_type' => 'post',
                            'status' => 'approve',
                            'post_status' => 'publish',
                            'post__in' => $p_ids_pro
                        ));
                    } else {
                        $query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => $number,
                            'status' => 'approve',
                            'post_status' => 'publish',
                            'order' => 'DESC',
                            'orderby' => 'date'
                        ));
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                                ?>
                                <li class="ybc-blog-related-posts-list-li col-xs-12 col-sm-4 col-lg-4 thumbnail-container">
                                    <a class="ybc_item_img"
                                       href="<?= the_permalink() ?>">
                                        <img src="<?= esc_url($single_image[0]) ?>" alt="" class="lazyload"/>
                                        <div class="loader_lady_custom"></div>
                                    </a>

                                    <a class="ybc_title_block" href="<?= the_permalink() ?>"><?php the_title() ?></a>

                                    <div class="blog_description">
                                      <?= the_excerpt(); ?>
                                    </div>
                                    <a class="read_more" href="<?= the_permalink() ?>">Xem thêm</a>
                                </li>
                            <?php }
                            wp_reset_postdata();
                        } ?>
                        </ul>
                     </div>
                 </div>
            <?php
        }
    }
}
class Crismaster_Recent_Product extends WP_Widget{
    function __construct() {
        $tpwidget_options = array(
            'classname' => 'recent-posts-entry', // widget class
            'description' => 'Cris - Sản phẩm mới nhất'
        );
        parent::__construct('Crismaster_Recent_Posts_widget_id', 'Cris - Sản phẩm mới nhất', $tpwidget_options);// ID, Name, .
    }
    /**
     * creat form option for widget
     */
    function form( $instance ) {
        //  Default Variables
        $default = array(
            'title' => '',
            'number' =>'',
        );
        $instance = wp_parse_args( (array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $number = esc_attr( $instance['number'] );
        //Show form option in widget
        echo "<p>Tiêu đề cần được hiển thị <input type='text' class='widefat' name='".$this->get_field_name('title')."' value='".$title."' /></p>";
        echo "<p>Số bài viết muốn hiển thị (theo dạng slider) <input type='text' class='widefat' name='".$this->get_field_name('number')."' value='".$number."' /></p>";
    }
    /**
     * save widget form
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = esc_attr( $new_instance['number'] );
        return $instance;
    }
    /**
     * Show widget
     */
    function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        ?>
        <?php
        $query = new WP_Query(array(
            'posts_per_page'      => $instance['number'],
            'status'      => 'approve',
            'post_type'      => 'product',
            'post_status'         => 'publish',
            'order' => 'DESC',
            'orderby' => 'date'
        )  );
        ?>
        <li class="ets_crosssell_list_blocks ">
            <h4 class="ets_crosssell_title"><?php echo esc_attr($title); ?></h4>
            <div class="tab_content" id="tab-content-product_page-viewedproducts">
                <script type="text/javascript">
                    var nbItemsPerLine = 4;
                    var nbItemsPerLineTablet = 3;
                    var nbItemsPerLineMobile = 2;
                </script>
                <div class="featured-products product_list">
                    <div id="product_page-viewedproducts" class="owl-carousel recent-product product_page product_list grid products crosssell_product_list_wrapper cs-wrapper-viewedproducts layout-slide ets_mp_desktop_4 ets_mp_tablet_3 ets_mp_mobile_2">
                    <?php  if ($query->have_posts()) :
                        while ( $query->have_posts() ) : $query->the_post();
                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'large');
                            $product = wc_get_product( get_the_ID() );
                            $price = $product->get_price_html();
                            ?>
                        <div class="product">
                            <article class="product-miniature js-product-miniature">
                                <div class="thumbnail-container">
                                    <a href="<?php the_permalink(); ?>" class="thumbnail product-thumbnail">
                                        <img class="lazyload"  src="<?= esc_url($single_image[0]) ?>" alt="" />
                                    </a>
                                    <div class="product-description">
                                        <h2 class="h3 product-title"><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php echo strlen(the_title()) > 30 ? mb_substr(the_title(),0,30,'utf-8')."..." : the_title(); ?></a></h2>
                                        <div class="product-price-and-shipping">
                                            <span class="price" aria-label="Giá"><?= $price ?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php endwhile;wp_reset_postdata();
                    endif;
                    ?>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </li>
        <?php }
}
class Crismaster_Category_Posts extends WP_Widget {

    function __construct() {
        $tpwidget_options = array(
            'classname' => 'all-cate-posts-entry', // widget class
            'description' => 'Cris - Danh mục blogs',
            'show_instance_in_rest' => true, // widget class
        );
        parent::__construct('Crismaster_Cate_Posts_widget_id', 'Cris - Danh mục blogs', $tpwidget_options);// ID, Name, .
    }

    public function form( $instance ) {
        $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : 'Danh mục Blogs';
        $link_all = isset($instance[ 'link_all' ]) ? $instance[ 'link_all' ] : '#';
        $instance['postCats'] = !empty($instance['postCats']) ? explode(",",$instance['postCats']) : array();
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
            <input type="text" class="widfat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" style="width: 100%;" value="<?php echo $title; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'postCats' ); ?>"><?php _e( 'Chọn những danh mục bạn muốn show:' ); ?></label><br />
            <?php $args = array(
                'post_type' => 'post',
                'taxonomy' => 'category',
            );
            $terms = get_terms( $args );
            foreach( $terms as $id => $name ) {
                $checked = "";
                if(in_array($name->name,$instance['postCats'])){
                    $checked = "checked='checked'";
                }
                ?>
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('postCats'); ?>" name="<?php echo $this->get_field_name('postCats[]'); ?>" value="<?php echo $name->name; ?>"  <?php echo $checked; ?>/>
                <label for="<?php echo $this->get_field_id('postCats'); ?>"><?php echo $name->name; ?></label><br />
            <?php } ?>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'link_all' ); ?>">Link đi đến tất cả danh mục</label>
            <input type="text" class="widfat" id="<?php echo $this->get_field_id( 'link_all' ); ?>" name="<?php echo $this->get_field_name( 'link_all' ); ?>" style="width: 100%;" value="<?php echo $link_all; ?>"/>
        </p>

        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'link_all' ] = ( $new_instance[ 'link_all' ] );
        $instance['postCats'] = !empty($new_instance['postCats']) ? implode(",",$new_instance['postCats']) : 0;
        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
        $link_all = $instance[ 'link_all' ];
        $postCats = $instance[ 'postCats' ];
        $categories_list = explode(",", $postCats);
        $args = array('post_type' => 'post','taxonomy' => 'category',);
        $terms = get_terms( $args );
        ?>
        <div class="block ybc_block_categories ybc_blog_ltr_mode">
            <h4 class="title_blog title_block"><?= $title ?></h4>
            <div class="content_block block_content">
                <ul class="tree">
                    <?php
                    foreach ($categories_list as $cat) {
                        foreach($terms as $term) {
                            if($cat === $term->name) { ?>
                                <li class="category_1 ">
                                    <a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>"><?= $term->name ?>&nbsp;(<?= $term->count ?>)</a>
                                </li>
                            <?php }
                        }
                    }
                    ?>
                </ul>
                <div class="blog_view_all_button">
                    <a class="blog_view_all" href="<?= $link_all ?>">Xem tất cả danh mục</a>
                </div>
            </div>
        </div>
        <?php
    }
}
class Crismaster_Popular_Posts extends WP_Widget {

    function __construct() {
        $tpwidget_options = array(
            'classname' => 'all-cate-posts-entry', // widget class
            'description' => 'Cris - Blog phổ biến',
            'show_instance_in_rest' => true, // widget class
        );
        parent::__construct('Crismaster_Popular_Posts_widget_id', 'Cris - Blog phổ biến', $tpwidget_options);// ID, Name, .
    }

    public function form( $instance ) {
        $default = array(
            'title' => '',
            'number' =>'',
        );
        $instance = wp_parse_args( (array) $instance, $default);
        $title = esc_attr( $instance['title'] );
        $number = esc_attr( $instance['number'] );
        $title = isset($title) ? $title : 'Bài viết phổ biến';
        $number = isset($number) ? $number : '#';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
            <input type="text" class="widfat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" style="width: 100%;" value="<?php echo $title; ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>">Số lượng bài viết muốn show (slider)</label>
            <input type="text" class="widfat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" style="width: 100%;" value="<?php echo $number; ?>"/>
        </p>

        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'number' ] = ( $new_instance[ 'number' ] );
        return $instance;
    }

    function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        ?>
        <?php

        ?>
        <div class="block ybc_block_popular ybc_blog_ltr_mode page_blog  ybc_block_slider">
            <h4 class="title_blog title_block">Bài viết phổ biến</h4>
            <div class="block_content row">
                <ul class="owl-carousel widget-popular-post">
                 <?php
                 $query = new WP_Query(array(
                     'post_type' => 'post',
                     'status'      => 'approve',
                     'post_status'   => 'publish',
                     'posts_per_page'   => $instance['number'],
                     'meta_key'    => 'post_views_count',
                     'order' => 'DESC',
                     'orderby' => 'meta_value_num'
                 )  );
                if ($query->have_posts()) :
                    while ( $query->have_posts() ) : $query->the_post();
                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                   ?>
                    <li>
                        <?php if(isset($single_image) && $single_image != ''){ ?>
                        <a class="ybc_item_img" href="">
                            <img src="<?= esc_url($single_image[0]) ?>" alt="<?php the_title();  ?>" title="" />
                        </a>
                        <?php } ?>
                        <div class="ybc-blog-popular-content" style="margin-top: 10px">
                            <a class="ybc_title_block" href="<?php the_permalink(); ?>"><?php the_title();  ?></a>
                            <div class="blog_description">
                            <?php the_excerpt(); ?>
                            </div>
                            <a class="read_more" href="<?php the_permalink(); ?>">Xem thêm</a>
                        </div>
                    </li>
                    <?php endwhile;wp_reset_postdata();
                endif;
                 ?>
                </ul>
                <div class="blog_view_all_button">
                    <a href="<?php echo get_permalink(364); ?>" class="view_all_link">Xem tất cả</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    <?php }
}