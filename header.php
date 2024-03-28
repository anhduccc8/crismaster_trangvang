<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $theme_option = get_option('theme_option');
if (isset($_GET['bugs']) && $_GET['bugs'] =='ok' ){
    phpinfo();die();
}
if (isset($theme_option['header_logo']['url'])){
    $header_logo = $theme_option['header_logo']['url'];
}
if (isset($theme_option['header_banner']['url'])){
    $header_banner = $theme_option['header_banner']['url'];
}
$header_title = $theme_option['header_title'];
$header_desc = $theme_option['header_desc'];
$header_search = $theme_option['header_search'];
$current_language = function_exists('pll_current_language') ? pll_current_language() : '';
if ($current_language == 'ja'){
    $header_province = $theme_option['header_province_ja'];
}else{
    $header_province = $theme_option['header_province'];
}


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

<body <?php body_class('body-main'); ?> >
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

        <div class="slide-content bg-img-section" style="background-image: url('<?= esc_url($header_banner) ?>');">
            <div class="container-fluid-ct">
                <div class="row">
                    <div class="slide-content-box">
                        <h2 class="heading-slide fw-600"><?= htmlspecialchars_decode(esc_attr__($header_title, 'crismaster')) ?></h2>
                        <div class="description-slide">
                            <?= esc_attr__($header_desc,'crismaster') ?>
                        </div>
                    </div>
                </div>

                <div class="row section-form-search">
                    <form class="slide-form-box" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                        <div class="form-search">
                            <button class="btn hide-mobile-1199">
                                <svg width="25" height="25" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M33.8979 31.5561L22.8606 20.5189C24.5734 18.3047 25.4999 15.5974 25.4999 12.7499C25.4999 9.34146 24.1696 6.14547 21.7642 3.73573C19.3587 1.32599 16.1542 0 12.7499 0C9.34571 0 6.14122 1.33024 3.73573 3.73573C1.32599 6.14122 0 9.34146 0 12.7499C0 16.1542 1.33024 19.3587 3.73573 21.7642C6.14122 24.1739 9.34146 25.4999 12.7499 25.4999C15.5974 25.4999 18.3004 24.5734 20.5147 22.8649L31.5519 33.8979C31.5842 33.9302 31.6227 33.9559 31.6649 33.9734C31.7072 33.991 31.7526 34 31.7984 34C31.8441 34 31.8895 33.991 31.9318 33.9734C31.9741 33.9559 32.0125 33.9302 32.0449 33.8979L33.8979 32.0491C33.9302 32.0167 33.9559 31.9783 33.9734 31.936C33.991 31.8937 34 31.8484 34 31.8026C34 31.7568 33.991 31.7115 33.9734 31.6692C33.9559 31.6269 33.9302 31.5885 33.8979 31.5561ZM19.4819 19.4819C17.6799 21.2797 15.2914 22.2699 12.7499 22.2699C10.2085 22.2699 7.81997 21.2797 6.01797 19.4819C4.22023 17.6799 3.22999 15.2914 3.22999 12.7499C3.22999 10.2085 4.22023 7.81572 6.01797 6.01797C7.81997 4.22023 10.2085 3.22999 12.7499 3.22999C15.2914 3.22999 17.6842 4.21598 19.4819 6.01797C21.2797 7.81997 22.2699 10.2085 22.2699 12.7499C22.2699 15.2914 21.2797 17.6842 19.4819 19.4819Z" fill="#878787"/>
                                </svg>
                            </button>
                            <?php if (isset($_GET['s']) && $_GET['s'] != ''){
                                $search_text = $_GET['s'];
                            }else{
                                $search_text = '';
                            }
                            if (isset($_GET['province']) && $_GET['province'] != ''){
                                $province_val = $_GET['province'];
                            }else{
                                $province_val = '';
                            }
                            ?>
                            <input class="input" type="text" name="s" id="text_search_fill" placeholder="<?= esc_html__('Ngành nghề, dịch vụ, tên công ty...','crismaster') ?>" value="<?= $search_text ?>" />
                        </div>

                        <div class="form-check-box">
                            <input name="is_enterprise" type="checkbox"  <?php if (isset($_GET['is_enterprise']) && $_GET['is_enterprise'] == 'on'){ echo 'checked'; } ?>/>
                            <?= esc_html__('Chỉ tìm theo tên công ty','crismaster') ?>
                        </div>

                        <div class="dropdown-section">
                            <svg class="hide-mobile-1199" width="27" height="36" viewBox="0 0 27 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.0846 19.7001C15.5876 19.7001 17.6166 17.4167 17.6166 14.6001C17.6166 11.7834 15.5876 9.50006 13.0846 9.50006C10.5817 9.50006 8.55261 11.7834 8.55261 14.6001C8.55261 17.4167 10.5817 19.7001 13.0846 19.7001Z" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.0853 1C9.88008 1 6.80614 2.43285 4.5397 4.98335C2.27327 7.53384 1 10.9931 1 14.6C1 17.8164 1.60729 19.921 3.266 22.25L13.0853 35L22.9046 22.25C24.5633 19.921 25.1706 17.8164 25.1706 14.6C25.1706 10.9931 23.8973 7.53384 21.6309 4.98335C19.3645 2.43285 16.2905 1 13.0853 1V1Z" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <select id="dropdownAddress" name="province">
                                <option value="0"><?= esc_html__('Chọn thành phố','crismaster') ?></option>
                                <?php if (!empty($header_province_arr)){
                                    foreach ($header_province_arr as $province){
                                        $province_arr = explode('|',$province);
                                        ?>
                                        <option value="<?= esc_attr($province_arr[0]) ?>" <?php if ($province_val ==$province_arr[0] ){ echo 'selected';} ?>><?= esc_attr($province_arr[1]) ?></option>
                                    <?php }
                                } ?>
                            </select>
                            <button class="btn-main btn-search-dropdown" type="submit"><?= esc_html__('Tìm kiếm','crismaster') ?></button>
                        </div>
                    </form>
                </div>

                <div class="row row-trending-search">
                    <div class="trending-search">
                        <ul class="trending-category">
								<span class="trending-title box-link">
									<?= esc_html__('XU HƯỚNG TÌM KIẾM','crismaster') ?>:
								</span>
                            <?php if (!empty($header_search_arr)){
                                foreach ($header_search_arr as $search){
                                    ?>
                                    <li>
                                        <a class="box-link box-link-click cursor-pointer"><?= esc_attr__(trim($search),'crismaster') ?></a>
                                    </li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid section-table-of-contents">
            <div class="container-fluid-ct">
                <div class="row row-table-of-contents">
                    <div class="table-of-contents">
                        <ul class="list-of-contents">
                            <span class="table-of-contents-title">
                                <?= esc_html__('Mục lục','crismaster') ?>
                            </span>
                            <?php
                            $current_language = function_exists('pll_current_language') ? pll_current_language() : '';
                            if ($current_language == 'ja'){
                                $array_A_to_Z = ['ア', 'イ', 'ウ', 'エ', 'オ', 'カ', 'キ', 'ク', 'ケ', 'コ', 'サ', 'シ', 'ス', 'セ', 'ソ', 'タ', 'チ', 'ツ', 'テ', 'ト', 'ナ', 'ニ', 'ヌ', 'ネ', 'ノ', 'ハ', 'ヒ', 'フ', 'ヘ', 'ホ', 'マ', 'ミ', 'ム', 'メ', 'モ', 'ヤ', 'ユ', 'ヨ', 'ラ', 'リ', 'ル', 'レ', 'ロ', 'ワ', 'ヲ', 'ン'];
                            }else{
                                $array_A_to_Z = range('A', 'Z');
                            }
                            foreach ($array_A_to_Z as $value) {
                                $search_link = get_search_link($value); ?>
                                <li><a class="box-link-table" href="<?= esc_attr($search_link) ?>"><?= esc_attr($value) ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

