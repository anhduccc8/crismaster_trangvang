<?php
/**
 * Lolo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Lolo
 * @since 1.0
 */
/**
 * Lolo only works in WordPress 4.7 or later.
 */

require_once get_template_directory() . '/plugins/redux/ReduxCore/framework.php';
require_once get_template_directory() . '/plugins/redux/sample/sample-config.php';
require_once get_template_directory() . '/plugins/widget/widgets.php';
require_once get_template_directory() . '/plugins/custom-visual/banner-dau-trang-chu.php';
require_once get_template_directory() . '/plugins/custom-visual/danh-muc-ua-chuong.php';
require_once get_template_directory() . '/plugins/custom-visual/nhan-cuoi-cao-cap.php';
require_once get_template_directory() . '/plugins/custom-visual/nhan-cau-hon.php';
require_once get_template_directory() . '/plugins/custom-visual/nhan-nu.php';
require_once get_template_directory() . '/plugins/custom-visual/kim-thuy-moc-hoa-tho.php';
require_once get_template_directory() . '/plugins/custom-visual/nhan-nam-cao-cap.php';
require_once get_template_directory() . '/plugins/custom-visual/co-the-ban-thich.php';
require_once get_template_directory() . '/plugins/custom-visual/chinh-sach-ban-hang.php';
require_once get_template_directory() . '/plugins/custom-visual/follow-chung-toi.php';
require_once get_template_directory() . '/plugins/custom-visual/khach-hang-cua-chung-toi.php';
require_once get_template_directory() . '/plugins/custom-visual/tin-tuc-trang-chu.php';
require_once get_template_directory() . '/plugins/custom-visual/anh-background-cate.php';


if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}

/* * * Include TGM Plugin Activation ** */
//require_once get_template_directory() . '/inc/includes/class-tgm-plugin-activation.php';
/* * * Theme Options ** */
//require_once get_template_directory() . '/inc/register_sidebar.php';
require_once get_template_directory() . '/admin/base_options.php';
require_once get_template_directory() . '/admin/theme_options.php';

// sidebar in single blog
function crismaster_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar - Trang tin tức', 'crismaster' ),
        'id'            => 'sidebar-1',
        'class'         => '',
        'description'   => esc_html__( 'Sidebar sẽ xuất hiện ở right sidebar single post.', 'crismaster' ),
        'before_widget'  => '<li id="%1$s" class="widget %2$s">',
        'after_widget'   => "</li>\n",
        'before_title'   => '<h2 class="widgettitle">',
        'after_title'    => "</h2>\n",
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar - Cuối Trang tin tức', 'crismaster' ),
        'id'            => 'sidebar-2',
        'class'         => '',
        'description'   => esc_html__( 'Sidebar sẽ xuất hiện ở cuối single post.', 'crismaster' ),
        'before_widget'  => '<li id="%1$s" class="widget %2$s">',
        'after_widget'   => "</li>\n",
        'before_title'   => '<h2 class="widgettitle">',
        'after_title'    => "</h2>\n",
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar - Cuối Trang Sản phẩm', 'crismaster' ),
        'id'            => 'sidebar-3',
        'class'         => '',
        'description'   => esc_html__( 'Sidebar sẽ xuất hiện ở cuối trang chi tiết sản phẩm.', 'crismaster' ),
        'before_widget'  => '<li id="%1$s" class="widget %2$s">',
        'after_widget'   => "</li>\n",
        'before_title'   => '<h2 class="widgettitle">',
        'after_title'    => "</h2>\n",
    ) );

}
add_action( 'widgets_init', 'crismaster_widgets_init' );

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span class="cart-products-count" id="mini-cart-count"><?php echo $items_count ? $items_count : '&nbsp;'; ?></span>
    <?php
    $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

add_action('admin_head', 'admin_custom_css');

function admin_custom_css() {
    echo '<style>
    .components-notice-list.components-editor-notices__dismissible {
      display: none
    } 
  </style>';
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/*ajax add to cart*/
add_action('wp_ajax_ftc_woocommerce_ajax_add_to_cart', 'ftc_woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_ftc_woocommerce_ajax_add_to_cart', 'ftc_woocommerce_ajax_add_to_cart');

/* Ajax nonce*/

add_action('wp_enqueue_scripts', 'ftc_ajax_platform_script_enqueue');
add_action('admin_enqueue_scripts', 'ftc_ajax_platform_script_enqueue');
function ftc_ajax_platform_script_enqueue () {
    wp_enqueue_script(
        'platform',
        get_template_directory_uri(). '/assets/js/platform.js',
        array('jquery'), '1.0', true);

    wp_localize_script('platform', 'ftc_platform', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('platform_security')
    ));
}
function is_elementor(){
 global $post;
 if(class_exists('Elementor\Plugin')){
    return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
} 
}
function ftc_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php print_r($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
    <div class="comment-author vcard"><?php 
    if ( $args['avatar_size'] != 0 ) {
        echo get_avatar( $comment, $args['avatar_size'] ); 
    } ?>
</div>
<div class="total-comment">
    <div class="name"><?php 
    printf( __( '<span class="fn">%s</span> ','lolo' ), get_comment_author_link() ); 
    ?>
</div>

<?php 
if ( $comment->comment_approved == '0' ) { ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','lolo' ); ?></em><br/><?php 
} ?>
<div class="comment-text">
    <?php comment_text(); ?>
</div>
<div class="comment-date">
    <?php
    printf( __( '<span class="fn-date">%s</span> ','lolo' ),  get_comment_date() ); 
    ?>
</div>
<div class="reply"><?php 
comment_reply_link( 
    array_merge( 
        $args, 
        array( 
            'add_below' => $add_below, 
            'depth'     => $depth, 
            'max_depth' => $args['max_depth'] 
        ) 
    ) 
); ?>
</div></div><?php 
if ( 'div' != $args['style'] ) : ?>
    </div><?php 
endif;
}

/* * * Is Active WooCommmerce ** */
if (!function_exists('ftc_has_woocommerce')) {

    function ftc_has_woocommerce() {
        $_actived = apply_filters('active_plugins', get_option('active_plugins'));
        if (in_array("woocommerce/woocommerce.php", $_actived) || class_exists('WooCommerce')) {
            return true;
        }
        return false;
    }

}

/* * * Include files in woo folder ** */
$file_names = array('functions', 'term', 'quickshop', 'grid_list_toggle', 'hooks');
foreach ($file_names as $file) {
    $file_path = get_template_directory() . '/inc/woo/' . $file . '.php';
    if (file_exists($file_path)) {
        require_once $file_path;
    }
}




/* * * Require Advance Options ** */
require_once get_template_directory() . '/inc/theme_control.php';



function ftc_setup() {

    /*Custom Gutenberg*/
    add_editor_style('editor-styles');
    add_editor_style( 'assets/css/style-editor.css' );
    add_theme_support( 'dark-editor-style' );
    add_theme_support( 'responsive-embeds' );
  // Add support for default block styles.
    add_theme_support( 'wp-block-styles' );
    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    add_theme_support( 'editor-font-sizes', array(
        array(
            'name' => __( 'Small', 'lolo' ),
            'size' => 12,
            'slug' => 'small'
        ),
        array(
            'name' => __( 'Normal', 'lolo' ),
            'size' => 14,
            'slug' => 'normal'
        ),
        array(
            'name' => __( 'Large', 'lolo' ),
            'size' => 36,
            'slug' => 'large'
        ),
        array(
            'name' => __( 'Huge', 'lolo' ),
            'size' => 48,
            'slug' => 'huge'
        )
    ) );

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'strong magenta', 'lolo' ),
            'slug' => 'strong-magenta',
            'color' => '#a156b4',
        ),
        array(
            'name' => __( 'light grayish magenta', 'lolo' ),
            'slug' => 'light-grayish-magenta',
            'color' => '#d0a5db',
        ),
        array(
            'name' => __( 'very light gray', 'lolo' ),
            'slug' => 'very-light-gray',
            'color' => '#eee',
        ),
        array(
            'name' => __( 'very dark gray', 'lolo' ),
            'slug' => 'very-dark-gray',
            'color' => '#444',
        ),
    ) );

    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/ftc
     * If you're building a theme based on Lolo, use a find and replace
     * to change 'lolo' to the name of your theme in all the template files.
     */
    load_theme_textdomain('lolo');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    add_image_size('ftc-featured-image', 2000, 1200, true);

    add_image_size('ftc-thumbnail-avatar', 100, 100, true);

    // Set the default content width.
    $GLOBALS['content_width'] = 1200;

    /* Translation */
    load_theme_textdomain('lolo', get_template_directory() . '/languages');

    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if (is_readable($locale_file)) {
        require_once( $locale_file );
    }


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));

    // Add theme support for Custom Background
    $defaults = array(
        'default-color' => ''
        , 'default-image' => ''
    );
    add_theme_support('custom-background', $defaults);

    // Add theme support for Custom Logo.
    add_theme_support('custom-logo', array(
        'width' => 250,
        'height' => 250,
        'flex-width' => true,
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

    if (!isset($content_width)) {
        $content_width = 1200;
    }

    // Define and register starter content to showcase the theme on new sites.
    $starter_content = array(
        'widgets' => array(
            // Place three core-defined widgets in the sidebar area.
            'sidebar-1' => array(
                'text_business_info',
                'search',
                'text_about',
            ),
            // Add the core-defined business info widget to the footer 1 area.
            'sidebar-2' => array(
                'text_business_info',
            ),
            // Put two core-defined widgets in the footer 2 area.
            'sidebar-3' => array(
                'text_about',
                'search',
            ),
        ),
        // Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts' => array(
            'home',
            'about' => array(
                'thumbnail' => '{{image-sandwich}}',
            ),
            'contact' => array(
                'thumbnail' => '{{image-espresso}}',
            ),
            'blog' => array(
                'thumbnail' => '{{image-coffee}}',
            ),
            'homepage-section' => array(
                'thumbnail' => '{{image-espresso}}',
            ),
        ),
        // Create the custom image attachments used as post thumbnails for pages.
        'attachments' => array(
            'image-espresso' => array(
                'post_title' => _x('Espresso', 'Theme starter content', 'lolo'),
                'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
            ),
            'image-sandwich' => array(
                'post_title' => _x('Sandwich', 'Theme starter content', 'lolo'),
                'file' => 'assets/images/sandwich.jpg',
            ),
            'image-coffee' => array(
                'post_title' => _x('Coffee', 'Theme starter content', 'lolo'),
                'file' => 'assets/images/coffee.jpg',
            ),
        ),
        // Default to a static front page and assign the front and posts pages.
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),
        // Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods' => array(
            'panel_1' => '{{homepage-section}}',
            'panel_2' => '{{about}}',
            'panel_3' => '{{blog}}',
            'panel_4' => '{{contact}}',
        ),
        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => array(
            // Assign a menu to the "top" location.
            'top' => array(
                'name' => __('Top Menu', 'lolo'),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),
            // Assign a menu to the "social" location.
            'social' => array(
                'name' => __('Social Links Menu', 'lolo'),
                'items' => array(
                    'link_yelp',
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_email',
                ),
            ),
        ),
    );

    /**
     * Filters Lolo array of starter content.
     *
     * @since Lolo 1.1
     *
     * @param array $starter_content Array of starter content.
     */
    $starter_content = apply_filters('ftc_starter_content', $starter_content);

    add_theme_support('starter-content', $starter_content);
}

add_action('after_setup_theme', 'ftc_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ftc_content_width() {

    $content_width = $GLOBALS['content_width'];

    // Get layout.
    $page_layout = get_theme_mod('page_layout');

    // Check if layout is one column.
    if ('one-column' === $page_layout) {
        if (ftc_is_frontpage()) {
            $content_width = 644;
        } elseif (is_page()) {
            $content_width = 740;
        }
    }

    // Check if is single post and there is no sidebar.
    if (is_single() && !is_active_sidebar('sidebar-1')) {
        $content_width = 740;
    }

    /**
     * Filter Lolo content width of the theme.
     *
     * @since Lolo 1.0
     *
     * @param $content_width integer
     */
    $GLOBALS['content_width'] = apply_filters('ftc_content_width', $content_width);
}

add_action('template_redirect', 'ftc_content_width', 0);


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Lolo 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function ftc_excerpt_more($link) {
    if (is_admin()) {
        return $link;
    }

    $link = sprintf('<p class="link-more" style="display: none;"><a href="%1$s" class="more-link">%2$s</a></p>', esc_url(get_permalink(get_the_ID())),
        sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'lolo'), get_the_title(get_the_ID()))
    );
    return ' &hellip; ' . $link;
}


add_filter('excerpt_more', 'ftc_excerpt_more');

/**
 * Enqueue scripts and styles.
 */
function ftc_scripts() {
    global $smof_data, $ftc_page_datas;
    wp_enqueue_style('editor-styles', get_template_directory_uri() . '/assets/css/style-editor.css');
    wp_deregister_style('font-awesome');
    wp_deregister_style('yith-wcwl-font-awesome');
    wp_register_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
    wp_enqueue_style('font-awesome');


    // Theme stylesheet.
    wp_enqueue_style('ftc-style', get_stylesheet_uri());

    // Load the dark colorscheme.
    if ('dark' === get_theme_mod('colorscheme', 'light') || is_customize_preview()) {
        wp_enqueue_style('ftc-colors-dark', get_theme_file_uri('/assets/css/colors-dark.css'), array('ftc-style'), '1.0');
    }

    wp_register_style('ftc-reset', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('ftc-reset');

    wp_register_style('ftc-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('ftc-responsive');

    /*Load libraries*/
    wp_enqueue_script('isotope', get_theme_file_uri('/assets/js/isotope.min.js'), array(), null, true);
    wp_enqueue_script('throttle', get_theme_file_uri('/assets/js/jquery.ba-throttle-debounce.min.js'), array(), null, true);
    wp_enqueue_script('countto', get_theme_file_uri('/assets/js/jquery.countto.js'), array(), null, true);
    wp_enqueue_script('hoverin', get_theme_file_uri('/assets/js/jquery.hoverintent.js'), array(), null, true);
    wp_enqueue_script('mbytplayer', get_theme_file_uri('/assets/js/jquery.mb.ytplayer.js'), array(), null, true);
    wp_enqueue_script('parallax', get_theme_file_uri('/assets/js/jquery.parallax.js'), array(), null, true);
    wp_enqueue_script('prettyphoto', get_theme_file_uri('/assets/js/jquery.prettyphoto.js'), array(), null, true);
    wp_enqueue_script('tweenlite', get_theme_file_uri('/assets/js/tweenlite.min.js'), array(), null, true);
    wp_enqueue_script('tweenmax', get_theme_file_uri('/assets/js/tweenmax.min.js'), array(), null, true);
    wp_enqueue_script('waypoint', get_theme_file_uri('/assets/js/waypoint.min.js'), array(), null, true);
    wp_enqueue_script('sticky', get_theme_file_uri('/assets/js/jquery.sticky.js'), array(), null, true);
//    wp_enqueue_script('smartmenus', get_template_directory_uri().'/assets/js/jquery.smartmenus.js', array(), null, true);
    wp_enqueue_script( 'swipebox-min', get_template_directory_uri().'/assets/js/jquery.swipebox.min.js', array(), null, true);
    wp_enqueue_script( 'swipebox', get_template_directory_uri().'/assets/js/jquery.swipebox.js', array(), null, true);


    // Load the html5 shiv.
    wp_enqueue_script('html5', get_theme_file_uri('/assets/js/html5.js'), array(), '3.7.3');
    wp_script_add_data('html5', 'conditional', 'lt IE 9');

    wp_enqueue_script('ftc-skip-link-focus-fix', get_theme_file_uri('/assets/js/skip-link-focus-fix.js'), array(), '1.0', true);

    if (has_nav_menu('top')) {
        wp_enqueue_script('ftc-navigation', get_theme_file_uri('/assets/js/navigation.js'), array(), '1.0', true);
        $ftc_l10n['expand'] = __('Expand child menu', 'lolo');
        $ftc_l10n['collapse'] = __('Collapse child menu', 'lolo');
        $ftc_l10n['icon'] = ftc_get_svg(array('icon' => 'angle-down', 'fallback' => true));
    }

    wp_enqueue_script('ftc-global', get_theme_file_uri('/assets/js/custom.js'), array('jquery'), '1.0', true);

    wp_enqueue_script('jquery-scrollto', get_theme_file_uri('/assets/js/jquery.scrollto.js'), array('jquery'), '2.1.2', true);

    wp_localize_script('ftc-skip-link-focus-fix', 'ftcScreenReaderText', $ftc_l10n);

    if (is_singular('product') && isset($smof_data['ftc_prod_cloudzoom']) && $smof_data['ftc_prod_cloudzoom'] ) {
        wp_register_script('cloud-zoom', get_template_directory_uri() . '/assets/js/cloud-zoom.js', array('jquery'), null, true);
        wp_enqueue_script('cloud-zoom');
    }

    if (defined('ICL_LANGUAGE_CODE')) {
        $ajax_uri = admin_url('admin-ajax.php?lang=' . ICL_LANGUAGE_CODE, 'relative');
    } else {
        $ajax_uri = admin_url('admin-ajax.php', 'relative');
    }

    $data = array(
        'ajax_uri' => $ajax_uri,
        '_ftc_enable_responsive' => isset($smof_data['ftc_responsive']) ? (int)$smof_data['ftc_responsive'] : 1,
        '_ftc_enable_ajax_search' => isset($smof_data['ftc_ajax_search']) ? (int)$smof_data['ftc_ajax_search'] : 1,
        'cookies_version' => isset($smof_data['cookies_version']) ? (int)$smof_data['cookies_version'] : 1,
    );
    wp_localize_script('ftc-global', 'ftc_shortcode_params', $data);

    if (is_singular('product') && isset($smof_data['ftc_prod_thumbnails_style']) && $smof_data['ftc_prod_thumbnails_style'] == 'vertical') {
        wp_register_script('jquery-caroufredsel', get_template_directory_uri() . '/assets/js/jquery.caroufredsel-6.2.1.min.js', array(), null, true);
        wp_enqueue_script('jquery-caroufredsel');
    }

    wp_enqueue_script('wc-add-to-cart-variation');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Crismaster
    wp_enqueue_style( 'base-css', get_template_directory_uri() .'/assets/css/theme.css',array()); // use
    wp_enqueue_style( '1-css', get_template_directory_uri() .'/assets/css/font_megamenu.css',array());
    wp_enqueue_style( 'font-awesome-css', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',array());
//    wp_enqueue_style( 'owl-carousel-min-css', get_template_directory_uri() .'/assets/css/owl.carousel.min.css',array());
    wp_enqueue_style( '2-css', get_template_directory_uri() .'/assets/css/owl.carousel.css',array());
    wp_enqueue_style( '3-css', get_template_directory_uri() .'/assets/css/owl.theme.css',array());
    wp_enqueue_style( '4-css', get_template_directory_uri() .'/assets/css/owl.transitions.css',array());
    wp_enqueue_style( '5-css', get_template_directory_uri() .'/assets/css/fix17.css',array());
    wp_enqueue_style( '6a-css', get_template_directory_uri() .'/assets/css/blog.css',array());
//    wp_enqueue_style( '6-css', get_template_directory_uri() .'/assets/css/blog_home.css',array());
    wp_enqueue_style( '7-css', get_template_directory_uri() .'/assets/css/widget.css',array());
    wp_enqueue_style( '8-css', get_template_directory_uri() .'/assets/css/newsletter.css',array());
    wp_enqueue_style( '9-css', get_template_directory_uri() .'/assets/css/flaticon.css',array());
    wp_enqueue_style( '10-css', get_template_directory_uri() .'/assets/css/flickity.css',array());
//    wp_enqueue_style( '11-css', get_template_directory_uri() .'/assets/css//style.css',array());
    wp_enqueue_style( '12-css', get_template_directory_uri() .'/assets/css/custom.css',array());
    wp_enqueue_style( '13-css', get_template_directory_uri() .'/assets/css/advancecategories.css',array());
    wp_enqueue_style( '14-css', get_template_directory_uri() .'/assets/css/productcomments.all.css',array());
    wp_enqueue_style( '15-css', get_template_directory_uri() .'/assets/css/jquery-ui.min.css',array());
    wp_enqueue_style( '16-css', get_template_directory_uri() .'/assets/css/jquery.ui.theme.min.css',array());
    wp_enqueue_style( '17-css', get_template_directory_uri() .'/assets/css/homeslider.css',array());
    wp_enqueue_style( '18-css', get_template_directory_uri() .'/assets/css/checkout.css',array());


    /**** Start Jquery ****/
//    wp_enqueue_script("jquery-min", get_template_directory_uri()."/assets/js/jquery-3.1.1.js",array(),true,false);
    wp_enqueue_script("owl-carousel-js", get_template_directory_uri()."/assets/js/owl.carousel.js",array(),true,false);
    wp_enqueue_script("script-js", get_template_directory_uri()."/assets/js/script.js",array(),true,false);
    wp_enqueue_script("bootstrap-js", get_template_directory_uri()."/assets/js/bootstrap.min.3x.js",array(),true,false);


    wp_enqueue_script( 'infinite', get_template_directory_uri().'/assets/js/infinite-scroll.pkgd.min.js', array(), null, true);

    /*Load libraries*/


    wp_enqueue_script( 'swipebox-min', get_template_directory_uri().'/assets/js/jquery.swipebox.min.js', array(), null, true);
    wp_enqueue_script( 'swipebox', get_template_directory_uri().'/assets/js/jquery.swipebox.js', array(), null, true);

}

add_action('wp_enqueue_scripts', 'ftc_scripts', 1000);

/* * * Array Attribute Compare ** */
if (!function_exists('ftc_array_atts')) {

    function ftc_array_atts($pairs, $atts) {
        $atts = (array) $atts;
        $out = array();
        foreach ($pairs as $name => $default) {
            if (array_key_exists($name, $atts)) {
                if (is_array($atts[$name]) && is_array($default)) {
                    $out[$name] = ftc_array_atts($default, $atts[$name]);
                } else {
                    $out[$name] = $atts[$name];
                }
            } else {
                $out[$name] = $default;
            }
        }
        return $out;
    }

}
/* * * Breadcrumbs ** */
if (!function_exists('ftc_breadcrumbs')) {

    function ftc_breadcrumbs() {
        global $smof_data;

        $is_rtl = is_rtl() || ( isset($smof_data['ftc_enable_rtl']) && $smof_data['ftc_enable_rtl'] );

        if (ftc_has_woocommerce()) {
            if (function_exists('woocommerce_breadcrumb') && function_exists('is_woocommerce') && is_woocommerce()) {
                woocommerce_breadcrumb(array('wrap_before' => '<div class="ftc-breadcrumbs-content">', 'delimiter' => '<span>' . ($is_rtl ? '\\' : '/') . '</span>', 'wrap_after' => '</div>'));
                return;
            }
        }

        if (function_exists('bbp_breadcrumb') && function_exists('is_bbpress') && is_bbpress()) {
            $args = array(
                'before' => '<div class="ftc-breadcrumbs-content">'
            , 'after' => '</div>'
            , 'sep' => $is_rtl ? '\\' : '/'
            , 'sep_before' => '<span class="brn_arrow">'
            , 'sep_after' => '</span>'
            , 'current_before' => '<span class="current">'
            , 'current_after' => '</span>'
            );

            bbp_breadcrumb($args);
            /* Remove bbpress breadcrumbs */
            add_filter('bbp_no_breadcrumb', '__return_true', 999);
            return;
        }

        $delimiter = '<span class="brn_arrow">' . ($is_rtl ? '\\' : '/') . '</span>';

        $front_id = get_option('page_on_front');
        if (!empty($front_id)) {
            $home = get_the_title($front_id);
        } else {
            $home = esc_html__('Home', 'lolo');
        }
        $ar_title = array(
            'search' => esc_html__('Search results for ', 'lolo')
        , '404' => esc_html__('Error 404', 'lolo')
        , 'tagged' => esc_html__('Tagged ', 'lolo')
        , 'author' => esc_html__('Articles posted by ', 'lolo')
        , 'page' => esc_html__('Page', 'lolo')
        , 'portfolio' => esc_html__('Portfolio', 'lolo')
        );

        $before = '<span class="current">'; /* tag before the current crumb */
        $after = '</span>'; /* tag after the current crumb */
        global $wp_rewrite;
        $rewriteUrl = $wp_rewrite->using_permalinks();
        if (!is_home() && !is_front_page() || is_paged()) {

            echo '<div class="ftc-breadcrumbs-content">';

            global $post;
            $homeLink = esc_url(home_url('/'));
            echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

            if (is_category()) {
                global $wp_query;
                $cat_obj = $wp_query->get_queried_object();
                $thisCat = $cat_obj->term_id;
                $thisCat = get_category($thisCat);
                $parentCat = get_category($thisCat->parent);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($parentCat, true, ' ' . $delimiter . ' ');
                }
                print_r($before); print_r(single_cat_title('', false)); print_r($after);
            } elseif (is_search()) {
                print_r($before); print_r($ar_title['search'] . '"' . get_search_query() . '"'); print_r($after);
            } elseif (is_day()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                print_r($before); print_r(get_the_time('d')); print_r($after);
            } elseif (is_month()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                print_r($before); print_r(get_the_time('F')); print_r($after);
            } elseif (is_year()) {
                print_r($before); print_r(get_the_time('Y')); print_r($after);
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    $post_type_name = $post_type->labels->singular_name;
                    if (strcmp('Portfolio Item', $post_type->labels->singular_name) == 0) {
                        $post_type_name = $ar_title['portfolio'];
                    }
                    if ($rewriteUrl) {
                        echo '<a href="' . $homeLink . $slug['slug'] . '/">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    } else {
                        echo '<a href="' . $homeLink . '?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    }

                    print_r($before); print_r(get_the_title()); print_r($after);
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                    print_r($before); print_r(get_the_title()); print_r($after);
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                $post_type_name = $post_type->labels->singular_name;
                if (strcmp('Portfolio Item', $post_type->labels->singular_name) == 0) {
                    $post_type_name = $ar_title['portfolio'];
                }
                if (is_tag()) {
                    print_r($before); print_r($ar_title['tagged'] . '"'); print_r(single_tag_title('', false) . '"'); print_r($after);
                } elseif (is_taxonomy_hierarchical(get_query_var('taxonomy'))) {
                    if ($rewriteUrl) {
                        echo '<a href="' . $homeLink . $slug['slug'] . '/">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    } else {
                        echo '<a href="' . $homeLink . '?post_type=' . get_post_type() . '">' . $post_type_name . '</a> ' . $delimiter . ' ';
                    }

                    $curTaxanomy = get_query_var('taxonomy');
                    $curTerm = get_query_var('term');
                    $termNow = get_term_by('name', $curTerm, $curTaxanomy);
                    $pushPrintArr = array();
                    if ($termNow !== false) {
                        while ((int) $termNow->parent != 0) {
                            $parentTerm = get_term((int) $termNow->parent, get_query_var('taxonomy'));
                            array_push($pushPrintArr, '<a href="' . get_term_link((int) $parentTerm->term_id, $curTaxanomy) . '">' . $parentTerm->name . '</a> ' . $delimiter . ' ');
                            $curTerm = $parentTerm->name;
                            $termNow = get_term_by('name', $curTerm, $curTaxanomy);
                        }
                    }
                    $pushPrintArr = array_reverse($pushPrintArr);
                    array_push($pushPrintArr, $before . get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'))->name . $after);
                    echo implode($pushPrintArr);
                } else {
                    print_r($before) ; print_r($post_type_name) ; print_r($after);
                }
            } elseif (is_attachment()) {
                if ((int) $post->post_parent > 0) {
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID);
                    if (count($cat) > 0) {
                        $cat = $cat[0];
                        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                    }
                    echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
                }
                print_r($before); print_r(get_the_title()); print_r($after);
            } elseif (is_page() && !$post->post_parent) {
                print_r($before); print_r(get_the_title()); print_r($after);
            } elseif (is_page() && $post->post_parent) {
                $parent_id = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_post($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb)
                    print_r($crumb . ' '); print_r($delimiter . ' ');
                print_r($before); print_r(get_the_title()); print_r($after);
            } elseif (is_tag()) {
                print_r($before); print_r($ar_title['tagged'] . '"'); print_r(single_tag_title('', false) . '"'); print_r($after);
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                print_r($before); print_r($ar_title['author']); print_r($userdata->display_name); print_r($after);
            } elseif (is_404()) {
                print_r($before); print_r($ar_title['404']); print_r($after);
            }

            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() || is_post_type_archive() || is_archive()) {
                    print_r($before . ' (');
                }
                print_r($ar_title['page'] . ' '); print_r(get_query_var('paged'));
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() || is_post_type_archive() || is_archive()) {
                    echo ')' . $after;
                }
            } else {
                if (get_query_var('page')) {
                    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() || is_post_type_archive() || is_archive()) {
                        print_r($before . ' (');
                    }
                    print_r($ar_title['page'] . ' '); print_r(get_query_var('page'));
                    if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() || is_page_template() || is_post_type_archive() || is_archive()) {
                        echo ')' . $after;
                    }
                }
            }
            echo '</div>';
        }

        wp_reset_postdata();
    }

}

function ftc_breadcrumbs_title($show_breadcrumb = false, $show_page_title = false, $page_title = '', $extra_class_title = '') {
    global $smof_data;
    if ($show_breadcrumb || $show_page_title) {
        $breadcrumb_bg = '';
        if ( isset($smof_data['ftc_enable_breadcrumb_background_image']) && $smof_data['ftc_enable_breadcrumb_background_image']) {
            $breadcrumb_bg = esc_url($smof_data['ftc_bg_breadcrumbs']['url']);
        }

        $style = '';
        if ($breadcrumb_bg != '') {
            $style = 'style="background-image: url(' . $breadcrumb_bg . ')"';
            if (isset($smof_data['ftc_breadcrumb_bg_parallax']) && $smof_data['ftc_breadcrumb_bg_parallax']) {
                $extra_class .= ' ftc-breadcrumb-parallax';
            }
        }
        if($breadcrumb_bg == ''){
            echo '<div class="ftc-breadcrumb ftc-breadcrumb-no-img" ' . $style . '>';
        }else{
            echo '<div class="ftc-breadcrumb" ' . $style . '>';
        }

        echo '<div class="container"><div class="ftc-breadcrumb-title">';
        if (isset($smof_data['ftc_enable_breadcrumb_title']) && $smof_data['ftc_enable_breadcrumb_title'] == 0) {
            echo ' ';
        }else{
            echo '<h1 class="product_title page-title entry-title ' . $extra_class_title . '">' . $page_title . '</h1>';
        }
        if ($show_breadcrumb) {
            ftc_breadcrumbs();
        }
        echo '</div></div></div>';
    }
}

function wp_get_menu_array($current_menu='Main Menu') {

    $menu_array = wp_get_nav_menu_items($current_menu);

    $menu = array();

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
                    unset($menu_array[$k]);
                    $children[$m->ID]['children'] = populate_children($menu_array, $m);
                }
            }
        };
        return $children;
    }

    foreach ($menu_array as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID'] = $m->ID;
            $menu[$m->ID]['title'] = $m->title;
            $menu[$m->ID]['url'] = $m->url;
            $menu[$m->ID]['children'] = populate_children($menu_array, $m);
        }
    }

    return $menu;

}


require get_parent_theme_file_path('/inc/template-functions.php');

function ftc_register_admin_scripts() {
   wp_register_style('ftc-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css');
   wp_enqueue_style('ftc-admin-style');
   wp_register_style('ftc-theme-options', get_template_directory_uri() . '/admin/css/options.css');
   wp_enqueue_style('ftc-theme-options');
   wp_register_script('ftc-admin-script', get_template_directory_uri() . '/assets/js/admin-main.js', array('jquery'), null, true);
   wp_enqueue_script('ftc-admin-script');
}

add_action('admin_enqueue_scripts', 'ftc_register_admin_scripts');


add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

function woocommerce_ajax_add_to_cart() {

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX :: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }

    wp_die();
}

/* * * Social Sharing ** */
if (!function_exists('ftc_template_social_sharing')) {

    function ftc_template_social_sharing() {
        if (is_active_sidebar('product-detail-social-icon')) {
            dynamic_sidebar('product-detail-social-icon');
        }
    }

}
?>