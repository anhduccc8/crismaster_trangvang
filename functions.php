<?php

require_once get_template_directory() . '/plugins/redux/ReduxCore/framework.php';
require_once get_template_directory() . '/plugins/redux/sample/sample-config.php';
require_once get_template_directory() . '/plugins/custom-post-type/crismaster_post_type.php';
require_once get_template_directory() . '/plugins/cmb2/init.php';
require_once get_template_directory() . '/plugins/cmb2/example-functions.php';
require_once get_template_directory() . '/plugins/widget/widgets.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-banner-dau.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-dich-vu-doanh-nghiep.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-gallery.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-thong-ke.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-muc-luc-nganh-nghe.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-doanh-nghiep-tim-kiem-nhieu.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-san-pham-dich-vu-noi-bat.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-doanh-nghiep-moi-cap-nhat.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-doanh-nghiep-moi-dang-ky.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-kien-thuc-doanh-nghiep.php';
require_once get_template_directory() . '/plugins/custom-visual/p1-dang-ky-doanh-nghiep.php';
require_once get_template_directory() . '/plugins/custom-visual/p2-dvu-banner.php';
require_once get_template_directory() . '/plugins/custom-visual/p2-dvu-gioi-thieu-text-anh.php';
require_once get_template_directory() . '/plugins/custom-visual/p2-dvu-quang-cao.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-single-post-noi-dung-chinh.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-single-post-tin-tuc-cung-chu-de.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-single-post-tin-tuc-moi-nhat.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-kien-thuc-doanh-nghiep-post-sidebar-quang-cao.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-kien-thuc-doanh-nghiep-carousel.php';
require_once get_template_directory() . '/plugins/custom-visual/p3-kien-thuc-doanh-nghiep-banner-2.php';
require_once get_template_directory() . '/plugins/custom-visual/p4-danh-muc-nghe.php';
require_once get_template_directory() . '/plugins/custom-visual/p5-form-lien-he.php';
require_once get_template_directory() . '/plugins/custom-visual/p5-lien-he-infor.php';
// @ini_set( 'upload_max_size' , '64M' );
// @ini_set( 'post_max_size', '64M');
// @ini_set( 'max_execution_time', '300' );
//Theme Set up:
function crismaster_theme_setup() {
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
//	add_theme_support ('title-tag');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list','gallery', ) );

//	register_nav_menus( array(
//		'primary' => esc_html__('Menu sử dụng cho tất cả các page','crismaster'),
//		'second' => esc_html__('Second Navigation Menu (Menu For Home Page With Scroll menu)','crismaster'),
//    ) );
//    add_theme_support( 'woocommerce' );

}
add_action( 'after_setup_theme', 'crismaster_theme_setup' );

function crismaster_theme_scripts_styles(){
    $mobile = wp_is_mobile();
    /**** Theme Specific CSS ****/
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/css/bootstrap.css',array());
    wp_enqueue_style( 'bootstrap-css-2', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',array());
    wp_enqueue_style( 'font-css-3', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',array());
    wp_enqueue_style( 'font-css-4', 'https://fonts.googleapis.com/css?family=Montserrat|Sonsie+One',array());
    wp_enqueue_style( 'font-css', get_template_directory_uri() .'/assets/font/fontawesome-free-6.0.0-web/css/all.min.css',array());
    wp_enqueue_style( 'font-css-2', get_template_directory_uri() .'/assets/css/font-family.css',array(),'1.0.2');
    wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',array());

    wp_enqueue_style( '2-css', get_template_directory_uri() .'/assets/css/owl.carousel.css',array());
    wp_enqueue_style( '3-css', get_template_directory_uri() .'/assets/css/owl.theme.css',array());
    wp_enqueue_style( '4-css', get_template_directory_uri() .'/assets/css/owl.transitions.css',array());

    wp_enqueue_style( 'main-css', get_template_directory_uri() .'/assets/css/main.css',array(),'1.0.4');
    wp_enqueue_style( 'header-css', get_template_directory_uri() .'/assets/css/header.css',array());
    wp_enqueue_style( 'footer-css', get_template_directory_uri() .'/assets/css/footer.css',array(),'1.0.1');
    wp_enqueue_style( 'response-css', get_template_directory_uri() .'/assets/css/responsive.css',array(),'1.0.1');
    wp_enqueue_style( 'mystyle', get_template_directory_uri() .'/style.css',array(),'1.1.8');
    /**** Start Jquery ****/
    wp_enqueue_script("jquery-min", get_template_directory_uri()."/assets/js/jquery.min.js",array(),true,false);
//    wp_enqueue_script("jquery-min", "https://code.jquery.com/jquery-3.6.0.min.js",array(),true,false);
    wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js",array(),true,false);
    wp_enqueue_script("select2-js", "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js",array(),true,false);
    wp_enqueue_script("owl-carousel-js", get_template_directory_uri()."/assets/js/owl.carousel.min.js",array(),true,false);
    wp_enqueue_script("map-js", "https://maps.googleapis.com/maps/api/js?key=AIzaSyAlZDuxldYtZzVxBMRnGJrwAcLBEGB2v8s",array(),true,false);
    wp_enqueue_script("custom-js", get_template_directory_uri()."/assets/js/main.js",array(),'1.0.1',false);
    wp_localize_script('custom-js', 'themeData', array(
        'direc_url' => get_template_directory_uri().'/assets/'
    ));


}
add_action( 'wp_enqueue_scripts', 'crismaster_theme_scripts_styles' );

function enqueue_select2_scripts() {
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js', array('jquery'), '', true);
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css');
}
add_action('admin_enqueue_scripts', 'enqueue_select2_scripts');

function crismaster_breadcrumbs() {
    // / === OPTIONS === /
    $text['home']     = esc_html__('Trang chủ','crismaster'); // text for the 'Home' link
    $text['category'] = esc_html__('%s','crismaster'); // text for a category page
    $text['tax']      = esc_html__('%s','crismaster'); // text for a taxonomy page
    $text['search']   = esc_html__('Tìm kiếm "%s"','crismaster'); // text for a search results page
    $text['tag']      = esc_html__('Tags "%s"','crismaster'); // text for a tag page
    $text['author']   = esc_html__('Articles Posted by %s','crismaster'); // text for an author page
    $text['404']      = esc_html__('Error 404','crismaster'); // text for the 404 page

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = ''; // tag before the current crumb
    $after       = ''; // tag after the current crumb
    // / === END OF OPTIONS === /
    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '';
    $linkAfter = '';
    $linkAttr = ' rel="v:url" property="v:title"  class="link-home"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a><i class="fa-solid fa-angle-right"></i>' . $linkAfter;
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<a href="' . $homeLink . '" class="link-home">' . $text['home'] . '</a>';
    } else {
        echo '' . sprintf($link, $homeLink, $text['home']) . $delimiter;
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<span><a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a></span>' . $linkAfter, $cats);
                echo wp_specialchars_decode($cats);
            }
            echo wp_specialchars_decode($before .'<h1>'. sprintf($text['category'].'</h1>', single_cat_title('', false)) . $after);
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo wp_specialchars_decode($cats);
            }
            echo wp_specialchars_decode($before . sprintf($text['tax'], single_cat_title('', false)) . $after);
        }elseif ( is_search() ) {
            echo wp_specialchars_decode($before . sprintf($text['search'], get_search_query()) . $after);
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo wp_specialchars_decode($before . get_the_time('d') . $after);
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo wp_specialchars_decode($before . get_the_time('F') . $after);
        } elseif ( is_year() ) {
            echo wp_specialchars_decode($before . get_the_time('Y') . $after);
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before .'' . $after);
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, FALSE, '');
                // $cats2 = explode(',',$cats);
                // $cats = $cats2[0];
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<span><a', $linkBefore . '<span><a' . $linkAttr, $cats);
                $cats = str_replace('</a></span>', '</a></span>' . $linkAfter, $cats);
                echo '<span class="cus-span">'.$cats.'</span>';
                if ($showCurrent == 1) echo wp_specialchars_decode($before . $after);
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo wp_specialchars_decode($before . $post_type->labels->singular_name . $after);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo wp_specialchars_decode($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before . get_the_title() . $after);
        } elseif ( is_page() && !$post->post_parent ) {

            if ($showCurrent == 1) echo wp_specialchars_decode($before . get_the_title() . $after);
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo wp_specialchars_decode($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1) echo wp_specialchars_decode($delimiter);
            }
            if ($showCurrent == 1) echo wp_specialchars_decode($delimiter . $before . get_the_title() . $after);
        } elseif ( is_tag() ) {
            echo wp_specialchars_decode($before . sprintf($text['tag'], single_tag_title('', false)) . $after);
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo wp_specialchars_decode($before . sprintf($text['author'], $userdata->display_name) . $after);
        } elseif ( is_404() ) {
            echo wp_specialchars_decode($before .'<span>'. $text['404'].'</span>' . $after);
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
    }
}

function crismaster_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar ', 'crismaster' ),
        'id'            => 'sidebar-1',
        'class'         => '',
        'description'   => esc_html__( 'Sidebar', 'crismaster' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}
add_action( 'widgets_init', 'crismaster_widgets_init' );


function crismaster_pagination() {
    if( is_singular() )
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged == 1 && $max > 2 )
        $links[] = $paged + 2 ;
    /** Add the pages around the current page to the array */
    if ( $paged >= 2 ) {
        $links[] = $paged - 1;
    }
    if ( ( $paged + 1 ) <= $max ) {
        $links[] = $paged + 1;
    }
    if ( $paged == $max && $max > 2 )
        $links[] = $paged - 2 ;
    /** Previous Post Link */
    $next_page_exists = get_next_posts_link(null, $wp_query->max_num_pages) !== null;
    $prev_page_exists = get_previous_posts_link(null) !== null;
    if ( $prev_page_exists )
        printf( get_previous_posts_link('&laquo;') );
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? 'active' : '';
        printf( '<a class="nav-number %s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Next Post Link */
    if ( $next_page_exists )
//        printf( '<a class="nav-number">%s</a>' . "\n", get_next_posts_link('&raquo;') );
        printf('%s', get_next_posts_link('&raquo;'));
}

function wp_get_menu_array($current_menu='Main Menu') {

    $menu_array = wp_get_nav_menu_items($current_menu);
    $menu = array();



    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['object_id'] = $m->object_id;
            $menu[$m->ID]['children'] = populate_children($menu_array, $m);
        }
    }

    return $menu;

}
function populate_children($menu_array, $menu_item)
{
    $children = array();
    if (!empty($menu_array)){
        foreach ($menu_array as $k=>$m) {
            if ($m->menu_item_parent == $menu_item->ID) {
                $children[$m->ID] = array();
                $children[$m->ID]['ID'] = $m->ID;
                $children[$m->ID]['title'] = $m->title;
                $children[$m->ID]['url'] = $m->url;
                $children[$m->ID]['object_id'] = $m->object_id;
                unset($menu_array[$k]);
                $children[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    };
    return $children;
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function custom_next_posts_link_attributes($attr) {
    $attr .= ' class="nav-number"';
    return $attr;
}
add_filter('next_posts_link_attributes', 'custom_next_posts_link_attributes');
function custom_prev_posts_link_attributes($attr) {
    $attr .= ' class="nav-number"';
    return $attr;
}
add_filter('previous_posts_link_attributes', 'custom_prev_posts_link_attributes');


function custom_polylang_langswitcher() {
    $langs_array = pll_the_languages( array( 'dropdown' => 1, 'hide_current' => 0, 'raw' => 1 ) );
    $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
    if ($langs_array) : ?>
        <a class="text-uppercase <?php if ($current_language == $langs_array['vi']['slug']) echo 'active'; ?>" href="<?= $langs_array['vi']['url'] ?>"><?= $langs_array['vi']['slug'] ?></a><em>|</em><a class="text-uppercase <?php if ($current_language == $langs_array['en']['slug']) echo 'active'; ?>" href="<?= $langs_array['en']['url'] ?>"><?= $langs_array['en']['slug'] ?></a>
    <?php endif;
}
add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );

// Hook the custom_pll_the_languages function into the pll_the_languages filter
add_filter('pll_the_languages', 'custom_pll_the_languages', 10, 2);

function custom_comment_output($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $rating = get_comment_meta(get_comment_ID(), 'rating', true);?>
    <div class="item-review mb-40">
        <div class="img-people">
            <img alt="img-blog-01" src="<?= get_template_directory_uri() ?>/assets/image/img-people.jpg">
        </div>
        <div class="date-review">
            <div class="date"><?php echo  get_comment_date('j/n/Y').' '.get_comment_time('H:i'); ?></div>
        </div>
        <div class="review-content">
            <div class="name"><?php echo get_comment_author_link(); ?></div>
            <div class="rating">
                <?php
                if ($rating) {
                    for ($i = 1; $i <= $rating; $i++) {
                        echo '<i class="fa-solid fa-star"></i>';
                    }
                }else{ ?>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                <?php }
                ?>
            </div>
            <div class="content-review">
                <?php comment_text(); ?>
            </div>
        </div>
    </div>
    <?php
}

// Thêm trường Tên và Số điện thoại vào biểu mẫu bình luận
function custom_comment_fields($fields) {
    $fields['author'] = '<div class="form-input-review"><input class="form-control" id="author" name="author" type="text" placeholder="'.esc_html__('Nhập họ tên','crismaster').'"></div>';
    $fields['email'] = '<div class="form-input-review mt-20"><input class="form-control" id="email" name="email" type="email" placeholder="'.esc_html__('Nhập email','crismaster').'"></div>';
    $fields['phone_cm'] = '<div class="form-input-review mt-20"><input id="phone_cm"  class="form-control" name="phone_cm" type="tel" placeholder="'.esc_html__('Nhập số điện thoại','crismaster').'"></div>';
    return $fields;
}
add_filter('comment_form_default_fields', 'custom_comment_fields');


function custom_comment_textarea_field($comment_field) {
    $comment_field = '<div class="form-input-review mt-20"><textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="'.esc_html__('Review của bạn','crismaster').'"></textarea></div>';
    return $comment_field;
}
add_filter('comment_form_field_comment', 'custom_comment_textarea_field');

function custom_comment_submit_button() {
    $submit_button = '<button type="submit" class="btn-main btn-review form-submit-btn mt-30">'.esc_html__('Gửi thông tin').'</button>';
    return $submit_button;
}
add_filter('comment_form_submit_button', 'custom_comment_submit_button');


function add_rating_field() {
    echo '<div class="rating mt-20"><div class="title-rating">'.esc_html__("Đánh giá",'crismaster').'</div>
        <input type="hidden" name="rating" id="rating_hide">
        <div class="rating-stars">
            <i class="fa fa-star" data-value="1"></i>
            <i class="fa fa-star" data-value="2"></i>
            <i class="fa fa-star" data-value="3"></i>
            <i class="fa fa-star" data-value="4"></i>
            <i class="fa fa-star" data-value="5"></i>
        </div>
        </div>';
}
add_action('comment_form_logged_in_after', 'add_rating_field');
add_action('comment_form_after_fields', 'add_rating_field');

// Lưu giá trị của các trường tùy chỉnh
function save_custom_comment_fields($comment_id) {
    if (isset($_POST['author'])) {
        $author = sanitize_text_field($_POST['author']);
        add_comment_meta($comment_id, 'author', $author);
    }
    if (isset($_POST['phone_cm'])) {
        $phone = sanitize_text_field($_POST['phone_cm']);
        add_comment_meta($comment_id, 'phone_cm', $phone);
    }
    if (isset($_POST['rating'])) {
        $rating = intval($_POST['rating']);
        add_comment_meta($comment_id, 'rating', $rating);
    }
}
add_action('comment_post', 'save_custom_comment_fields');

function hide_comment_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'hide_comment_fields');


add_action('wp_ajax_my_filter_function_profession', 'my_filter_function_profession');
add_action('wp_ajax_nopriv_my_filter_function_profession', 'my_filter_function_profession');

function my_filter_function_profession() {
    $meta_query = array();

    // Profession
    if (isset($_GET['profession']) && $_GET['profession'] !='' ) {
        $pro_arr = explode('|',$_GET['profession']);
        $meta_query[] =    array(
            'key'     => '_cmb_profession',
            'value'   => '"'.$pro_arr[0].'"',
            'compare' => 'LIKE',
        );
        $title_p = $pro_arr[1];
    }else{
        $title_p = '';
    }
    // Province
    if (isset($_GET['province']) && $_GET['province'] !='') {
        $province = trim($_GET['province']);
        $meta_query[] = array(
            'key'     => '_cmb_province',
            'value'   => $province,
            'compare' => 'LIKE',
        );
    }
    $args = array(
        'post_type' => 'enterprise',
        'posts_per_page' => -1,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        'meta_query' => $meta_query,
    );
    $query2 = new WP_Query($args);


    if ($query2->have_posts()) { ?>
        <h2 class="title-main color-main text-center"><?= esc_attr($title_p) ?></h2>
        <div class="text-result">(<?= esc_html__('Tìm thấy','crismaster') ?> <span><?= $query2->found_posts ?></span> <?= esc_html__('kết quả','crismaster') ?>)</div>

        <?php
        while ($query2->have_posts()) {
            $query2->the_post();
            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
            $taitro = get_post_meta(get_the_ID(), '_cmb_is_taitro', true);
            ?>
            <div class="widget-box-info mb-30 mt-40">
                <div class="box-info-content">
                    <h3 class="box-cate-title color-main fs-20">
                        <?= the_title() ?>
                        <svg width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path id="Vector"
                                  d="M30.8591 13.9933L27.5277 10.2742L27.9919 5.35117L23.0632 4.25418L20.4827 0L15.8407 1.95318L11.1986 0L8.61818 4.25418L3.68942 5.33779L4.15362 10.2609L0.822266 13.9933L4.15362 17.7124L3.68942 22.6488L8.61818 23.7458L11.1986 28L15.8407 26.0334L20.4827 27.9866L23.0632 23.7324L27.9919 22.6354L27.5277 17.7124L30.8591 13.9933ZM13.1101 20.6823L7.64881 15.3311L9.5739 13.4448L13.1101 16.8963L22.1074 8.08027L24.0325 9.97993L13.1101 20.6823Z"
                                  fill="#FFCD00"/>
                        </svg>
                    </h3>
                    <?php if ($taitro == 'on') { ?>
                        <div class="sub-cate-title">
                            <?= esc_html__('Được Tài Trợ', 'crismaster') ?>
                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path id="Vector" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.19536 0C12.6192 0 16.2052 3.35775 16.2052 7.5C16.2052 11.6423 12.6192 15 8.19536 15C3.77154 15 0.185547 11.6423 0.185547 7.5C0.185547 3.35775 3.77154 0 8.19536 0ZM8.19536 1.5C6.49589 1.5 4.86603 2.13214 3.66433 3.25736C2.46262 4.38258 1.78751 5.9087 1.78751 7.5C1.78751 9.0913 2.46262 10.6174 3.66433 11.7426C4.86603 12.8679 6.49589 13.5 8.19536 13.5C9.89483 13.5 11.5247 12.8679 12.7264 11.7426C13.9281 10.6174 14.6032 9.0913 14.6032 7.5C14.6032 5.9087 13.9281 4.38258 12.7264 3.25736C11.5247 2.13214 9.89483 1.5 8.19536 1.5ZM7.06278 4.31775C7.34635 4.0524 7.72588 3.89625 8.12642 3.88014C8.52696 3.86403 8.91939 3.98914 9.22623 4.23075L9.32795 4.31775L11.5939 6.4395C11.8773 6.70503 12.0441 7.0604 12.0613 7.43545C12.0785 7.8105 11.9449 8.17795 11.6868 8.46525L11.5939 8.5605L9.32795 10.6823C9.04437 10.9476 8.66484 11.1038 8.2643 11.1199C7.86376 11.136 7.47133 11.0109 7.1645 10.7692L7.06278 10.6823L4.7968 8.5605C4.51341 8.29497 4.34664 7.9396 4.32944 7.56455C4.31224 7.18951 4.44585 6.82205 4.70388 6.53475L4.7968 6.4395L7.06278 4.31775ZM8.19536 5.379L5.93019 7.5L8.19536 9.621L10.4605 7.5L8.19536 5.379Z"
                                      fill="#FFCD00"/>
                            </svg>
                        </div>
                    <?php } ?>

                    <div class="row flex-content-box mt-30">
                        <div class="col-12 col-lg-6 column-img-box">
                            <div class="wrap-box-img">
                                <img src="<?= esc_url($single_image[0]) ?>" alt="img-banner-01" style="width:100%">
                                <span class="text-style-box"><?= esc_html__('Đã Xác Thực', 'crismaster') ?></span>
                            </div>
                            <?php
                            $giaithuong = get_post_meta(get_the_ID(), '_cmb_giaithuong', true);
                            if ($giaithuong != '' && count($giaithuong) > 0) { ?>
                                <div class="hsh-blog-releated mt-20">
                                    <div class="shs-nav-blog-releated row">
                                        <?php
                                        foreach ($giaithuong as $gt) { ?>
                                            <a class="nav-image"><img alt="img-blog-01" style="max-width: 70px"
                                                                      src="<?= esc_url($gt) ?>"></a>
                                        <?php } ?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-lg-6 column-content-box">
                            <?php $ng_diachi = get_post_meta(get_the_ID(), '_cmb_ng_diachi', true);
                            if ($ng_diachi != '') { ?>
                                <div class="box-info-des">
                                    <label><?= esc_html__('Địa chỉ', 'crismaster') ?>: </label>
                                    <span class="info-des-normal"><?= esc_attr($ng_diachi) ?></span>
                                </div>
                            <?php } ?>
                            <?php $mst = get_post_meta(get_the_ID(), '_cmb_mst', true);
                            if ($mst != '') { ?>
                                <div class="box-info-des">
                                    <label><?= esc_html__('Mã số thuế', 'crismaster') ?>: </label>
                                    <span class="info-des-normal"><?= esc_attr($mst) ?></span>
                                </div>
                            <?php } ?>
                            <?php $phone_e = get_post_meta(get_the_ID(), '_cmb_phone_e', true);
                            if ($phone_e != '') { ?>
                                <div class="box-info-des">
                                    <label><?= esc_html__('Điện thoại', 'crismaster') ?>: </label>
                                    <span class="info-des-normal"><?= esc_attr($phone_e) ?></span>
                                </div>
                            <?php } ?>

                            <div class="box-info-des">
                                <label><?= esc_html__('Sản phẩm chính', 'crismaster') ?>: </label>
                                <?php
                                $services_ids = get_post_meta(get_the_ID(), '_cmb_service', true);
                                if ($services_ids) {
                                    foreach ($services_ids as $service_id) {
                                        $service_title = get_the_title($service_id);
                                        $service_permalink = get_permalink($service_id);
                                        ?>
                                        <span class="info-des-normal"><?= esc_attr($service_title) ?> </span> |
                                        <?php
                                    }
                                } else { ?>
                                    <a href="#"><?= esc_html__('Chưa thêm sản phẩm/dịch vụ', 'crismaster') ?></a>
                                <?php }
                                ?>
                            </div>
                            <div class="box-info-des lh-1">
                                <label><?= esc_html__('Ngành nghề kinh doanh', 'crismaster') ?>: </label>
                                <?php
                                $profession_ids = get_post_meta(get_the_ID(), '_cmb_profession', true);
                                if ($profession_ids) {
                                    foreach ($profession_ids as $profession_id) {
                                        $profession_title = get_the_title($profession_id);
                                        $profession_permalink = get_permalink($profession_id);
                                        ?>
                                        <a class="info-link"
                                           href="<?= esc_url($profession_permalink) ?>"><?= esc_attr($profession_title) ?>
                                            ; </a>
                                        <?php
                                    }
                                } else { ?>
                                    <a href="#"><?= esc_html__('Chưa thêm ngành nghề', 'crismaster') ?></a>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="item-des mt-40 mb-40">
                        <?= get_the_excerpt() ?>
                    </div>
                    <a class="btn-text btn-box-text-dm"
                       href="<?php the_permalink() ?>"><?= esc_html__('Xem Thêm', 'crismaster') ?> <img
                                src="<?= get_template_directory_uri() ?>/assets/image/double-icon.svg"
                                alt="double icon"></a>
                    <div class="space-between row-btn-info btn-box-dm">
                        <?php $phone_e = get_post_meta(get_the_ID(), '_cmb_phone_e', true);
                        if ($phone_e != '') {
                            $phone_e = mb_strlen($phone_e, 'UTF-8') > 16 ? mb_substr($phone_e, 0, 16, 'UTF-8') . '...' : $phone_e; ?>
                            <a class="btn-main btn-round style-04" href="tel:02438262938">
                                <svg width="16" height="16" viewBox="0 0 27 27" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path id="Vector" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M20.0887 26.5983C18.206 26.529 12.8701 25.7918 7.28194 20.206C1.69507 14.619 0.958955 9.28558 0.888351 7.40188C0.783752 4.53124 2.98294 1.74295 5.52338 0.654044C5.8293 0.521972 6.1643 0.471688 6.49553 0.508126C6.82675 0.544565 7.14281 0.666474 7.41269 0.861891C9.50466 2.3861 10.9481 4.69203 12.1876 6.50514C12.4603 6.90348 12.5769 7.38822 12.5152 7.86699C12.4535 8.34575 12.2177 8.78508 11.8529 9.10126L9.302 10.9954C9.17876 11.0844 9.09201 11.2151 9.05786 11.3632C9.02371 11.5113 9.04449 11.6667 9.11634 11.8007C9.69424 12.8504 10.7219 14.4138 11.8987 15.5903C13.0767 16.7668 14.7137 17.8622 15.8368 18.5054C15.9776 18.5844 16.1434 18.6065 16.3 18.5671C16.4566 18.5277 16.5922 18.4298 16.6788 18.2936L18.3393 15.7667C18.6446 15.3613 19.0949 15.0897 19.596 15.0088C20.0971 14.9279 20.6101 15.044 21.0275 15.3328C22.8671 16.606 25.014 18.0243 26.5856 20.0361C26.7969 20.3079 26.9314 20.6314 26.9748 20.9729C27.0183 21.3144 26.9692 21.6613 26.8327 21.9773C25.7384 24.5303 22.9691 26.7042 20.0887 26.5983Z"
                                          fill="#003DA5"/>
                                </svg>
                                <?= esc_attr($phone_e) ?>
                            </a>
                        <?php } ?>
                        <?php $email_e = get_post_meta(get_the_ID(), '_cmb_email_e', true);
                        if ($email_e != '') {
                            $email_e = mb_strlen($email_e, 'UTF-8') > 16 ? mb_substr($email_e, 0, 16, 'UTF-8') . '...' : $email_e; ?>
                            <a class="btn-main btn-round style-04" href="mailto:abc@gmail.com">
                                <svg width="19" height="20" viewBox="0 0 27 20" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path id="Vector"
                                          d="M3.20234 19.4694C2.48444 19.4694 1.86966 19.2391 1.35799 18.7786C0.846327 18.3181 0.590929 17.7652 0.591799 17.1199V3.02295C0.591799 2.37684 0.847632 1.82354 1.3593 1.36304C1.87097 0.902539 2.48531 0.672681 3.20234 0.673464H24.0867C24.8046 0.673464 25.4194 0.903714 25.931 1.36421C26.4427 1.82471 26.6981 2.37763 26.6972 3.02295V17.1199C26.6972 17.766 26.4414 18.3193 25.9297 18.7798C25.4181 19.2403 24.8037 19.4702 24.0867 19.4694H3.20234ZM24.0867 5.37244L14.3298 10.8644C14.221 10.9231 14.1066 10.9674 13.9865 10.9971C13.8664 11.0269 13.7524 11.0414 13.6445 11.0406C13.5357 11.0406 13.4213 11.0261 13.3012 10.9971C13.1811 10.9681 13.0672 10.9239 12.9593 10.8644L3.20234 5.37244V17.1199H24.0867V5.37244ZM13.6445 8.89668L24.0867 3.02295H3.20234L13.6445 8.89668ZM3.20234 5.66613V3.93338V3.96275V3.94865V5.66613Z"
                                          fill="#003DA5"/>
                                </svg>
                                <?= esc_attr($email_e) ?>
                            </a>
                        <?php } ?>
                        <?php $website_e = get_post_meta(get_the_ID(), '_cmb_website_e', true);
                        if ($website_e != '') {
                            $website_e = mb_strlen($website_e, 'UTF-8') > 16 ? mb_substr($website_e, 0, 16, 'UTF-8') . '...' : $website_e; ?>
                            <a class="btn-main btn-round style-04" href="#">
                                <svg width="20" height="25" viewBox="0 0 29 29" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g id="Group">
                                        <path id="Vector"
                                              d="M27.1931 14.5935C27.1931 7.38452 21.4166 1.54082 14.2904 1.54082C7.16423 1.54082 1.3877 7.38452 1.3877 14.5935C1.3877 21.8026 7.16423 27.6463 14.2904 27.6463"
                                              stroke="#003DA5" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path id="Vector_2"
                                              d="M15.5813 1.60574C15.5813 1.60574 19.4521 6.76157 19.4521 14.5932M13.0007 27.5807C13.0007 27.5807 9.12992 22.4248 9.12992 14.5932C9.12992 6.76157 13.0007 1.60574 13.0007 1.60574M2.20117 19.1617H14.291M2.20117 10.0247H26.3808"
                                              stroke="#003DA5" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                        <path id="Vector_3"
                                              d="M27.0363 22.3167C27.6737 22.7135 27.6337 23.6781 26.9782 23.7538L23.6661 24.1336L22.181 27.1514C21.8868 27.7505 20.9772 27.4568 20.8262 26.7154L19.207 18.7324C19.0792 18.1059 19.6366 17.7117 20.1747 18.0471L27.0363 22.3167Z"
                                              stroke="#003DA5" stroke-width="2"/>
                                    </g>
                                </svg>
                                <?= esc_attr($website_e) ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
        } }else {
        echo 'Không có dữ liệu.';
    }
    wp_reset_postdata();
    die();
}


add_action('wpcf7_mail_sent', 'custom_cf7_redirect');
function custom_cf7_redirect($contact_form) {
    $form_id = $contact_form->id();
    if ($form_id) {
        $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
        if ($current_language == 'vi'){
            $redirect_url = get_permalink('189');
        }else{
            $redirect_url = get_permalink('189');
        }
        wp_redirect($redirect_url);
        exit();
    }
}

function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace("/[^0-9]/", "", $phoneNumber);
    if (strlen($phoneNumber) === 10) {
        $formattedNumber = substr($phoneNumber, 0, 4) . '.' . substr($phoneNumber, 4, 3) . '.' . substr($phoneNumber, 7);
        return $formattedNumber;
    } else {
        return "";
    }
}

function tags_add_custom_types( $query ) {
    if( is_tag() && is_main_query() ) {
        $post_types = get_post_types();
        $query->query_vars['post_type'] = $post_types;
    }
}
add_filter( 'pre_get_posts', 'tags_add_custom_types' );
?>