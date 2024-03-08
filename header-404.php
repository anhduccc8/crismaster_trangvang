<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $theme_option = get_option('theme_option');
if (isset($theme_option['header_logo']['url'])){
    $header_logo = $theme_option['header_logo']['url'];
}
if (isset($theme_option['header_banner']['url'])){
    $header_banner = $theme_option['header_banner']['url'];
}
$header_title = $theme_option['header_title'];
$header_desc = $theme_option['header_desc'];
$header_search = $theme_option['header_search'];
$header_province = $theme_option['header_province'];

$lines = explode("\n", trim($header_search));
$header_search_arr = [];
foreach ($lines as $line) {
    $header_search_arr[] = $line;
}

$lines2 = explode("\n", trim($header_province));
$header_province_arr = [];
foreach ($lines2 as $line2) {
    $header_province_arr[] = $line2;
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?= get_template_directory_uri() ?>/assets/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/images/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class('body-main error-page'); ?> >
<header>
    <div id="site-header-wrap" class="header-layout">
        <div class="site-header-main">
            <div class="container-fluid-ct">
                <div class="row row-header align-center space-between">
                    <div class="site-branding">
                        <a class="logo-hsh logo-desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?= esc_html__('Trang vàng company','crismaster') ?>">
                            <?php
                            $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                            if ($current_language == 'ja'){ ?>
                                <img src="<?= get_template_directory_uri() ?>/assets/image/logo_ja.png">
                                <?php
                            }else{
                                if (isset($header_logo) && $header_logo != '') { ?>
                                    <img src="<?php  echo esc_url($header_logo) ?>" alt="">
                                <?php }else{ ?>
                                    <img src="<?= get_template_directory_uri() ?>/assets/image/logo-light.png">
                                <?php } }
                            ?>
                        </a>
                    </div>
                    <div class="header-right shs-menu">
                        <div id="menu-reponsive" class="site-navigation">
                            <ul class="hsh-menu-list">
                                <?php
                                $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                                if ($current_language == 'vi'){
                                    $menu_items = wp_get_menu_array('2');
                                }else{
                                    $menu_items = wp_get_menu_array('136');
                                }
                                $object = get_queried_object();
                                if (!empty($menu_items)){
                                 foreach ($menu_items as $menu) { ?>
                                     <li>
                                         <a class="<?php if ($menu['object_id'] == $object->ID){ echo 'active'; } ?>" href="<?= $menu['url'] ?>"><?php esc_attr_e( trim($menu['title']), 'crismaster'); ?></a>
                                     </li>
                                 <?php
                                 }
                                }
                                ?>
                                <li>
                                    <div class="info-right d-flex">
                                        <div class="cms-lang-curentcy">
                                            <div class="cms-lang">
                                                <?= do_shortcode('[polylang_langswitcher]') ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="menu-mobile" class="main-menu-mobile">
                        <span class="btn-nav-mobile open-menu" onclick="navOpen()"><span></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

