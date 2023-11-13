<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $theme_option = get_option('theme_option');
if (isset($theme_option['header_logo']['url'])){
    $header_logo = $theme_option['header_logo']['url'];
}

$header_language = $theme_option['header_language'];
$mobile = wp_is_mobile();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?= get_template_directory_uri() ?>/assets/images/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/images/favicon.ico">
	<?php wp_head(); ?>
</head>

<body <?php body_class('body-main'); ?> >
<header>
    <div class="hdContainer">
        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/logo_trans.png');">
            <?php if (isset($header_logo) && $header_logo != '') { ?>
                <img src="<?php  echo esc_url($header_logo) ?>" alt="">
            <?php }else{ ?>
                <img src="<?= get_template_directory_uri() ?>/assets/images/logo_trans.png">
            <?php } ?>
        </a>
        <div class="hamburger-menu">
            <div class="bar"></div>
        </div>
        <?php if ($header_language){
            ?>
            <div class="botHd">
                <p>
                    <?= do_shortcode('[polylang_langswitcher]') ?>
                </p>
            </div>
        <?php } ?>
    </div>
    <div class="ctMenu">
        <nav>
            <ul id="nav">
                <?php
                $menu_items = wp_get_menu_array('3');
                if (!empty($menu_items)){
                    foreach ($menu_items as $menu) { ?>
                        <li><a href="<?= $menu['url'] ?>" class="text-uppercase" id="id-<?= $menu['ID'] ?>"><?php esc_attr_e( $menu['title'], 'crismaster'); ?></a></li>
                 <?php   }
                }
                ?>
            </ul>
        </nav>
    </div>
</header>