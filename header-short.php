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

<body <?php body_class('body-main'); ?> >

<header>
    <div id="site-header-wrap" class="header-layout">
        <div class="site-header-main">
            <div class="container-fluid-ct">
                <div class="row row-header align-center space-between">
                    <div class="site-branding">
                        <a class="logo-hsh logo-desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Trang vàng company">
                            <?php if (isset($header_logo) && $header_logo != '') { ?>
                                <img src="<?php  echo esc_url($header_logo) ?>" alt="">
                            <?php }else{ ?>
                                <img src="<?= get_template_directory_uri() ?>/assets/image/logo-light.png">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="header-right shs-menu">
                        <div id="menu-reponsive" class="site-navigation">
                            <ul class="hsh-menu-list">
                                <?php
                                $menu_items = wp_get_menu_array('2');
                                $object = get_queried_object();
                                if (!empty($menu_items)){
                                    foreach ($menu_items as $menu) { ?>
                                        <li>
                                            <a class="<?php if ($menu['object_id'] == $object->ID){ echo 'active'; } ?>" href="<?= $menu['url'] ?>"><?php esc_attr_e( $menu['title'], 'crismaster'); ?></a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div id="menu-mobile" class="main-menu-mobile">
                        <span class="btn-nav-mobile open-menu" onclick="navOpen()"><span></span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-content bg-img-section bgr-page-title" style="background-image: url('<?= get_template_directory_uri() ?>/assets/image/page-title-01.jpg');">
            <div class="container-fluid-ct">
                <div class="row section-form-search">
                    <form class="slide-form-box">
                        <div class="form-search">
                            <button class="btn hide-mobile-1199">
                                <svg width="25" height="25" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M33.8979 31.5561L22.8606 20.5189C24.5734 18.3047 25.4999 15.5974 25.4999 12.7499C25.4999 9.34146 24.1696 6.14547 21.7642 3.73573C19.3587 1.32599 16.1542 0 12.7499 0C9.34571 0 6.14122 1.33024 3.73573 3.73573C1.32599 6.14122 0 9.34146 0 12.7499C0 16.1542 1.33024 19.3587 3.73573 21.7642C6.14122 24.1739 9.34146 25.4999 12.7499 25.4999C15.5974 25.4999 18.3004 24.5734 20.5147 22.8649L31.5519 33.8979C31.5842 33.9302 31.6227 33.9559 31.6649 33.9734C31.7072 33.991 31.7526 34 31.7984 34C31.8441 34 31.8895 33.991 31.9318 33.9734C31.9741 33.9559 32.0125 33.9302 32.0449 33.8979L33.8979 32.0491C33.9302 32.0167 33.9559 31.9783 33.9734 31.936C33.991 31.8937 34 31.8484 34 31.8026C34 31.7568 33.991 31.7115 33.9734 31.6692C33.9559 31.6269 33.9302 31.5885 33.8979 31.5561ZM19.4819 19.4819C17.6799 21.2797 15.2914 22.2699 12.7499 22.2699C10.2085 22.2699 7.81997 21.2797 6.01797 19.4819C4.22023 17.6799 3.22999 15.2914 3.22999 12.7499C3.22999 10.2085 4.22023 7.81572 6.01797 6.01797C7.81997 4.22023 10.2085 3.22999 12.7499 3.22999C15.2914 3.22999 17.6842 4.21598 19.4819 6.01797C21.2797 7.81997 22.2699 10.2085 22.2699 12.7499C22.2699 15.2914 21.2797 17.6842 19.4819 19.4819Z" fill="#878787"/>
                                </svg>
                            </button>
                                    <input class="input" type="type" placeholder="Ngành nghề, dịch vụ, tên công ty..." />
                        </div>

                        <div class="form-check-box">
                            <input name="gender" type="radio" value="Nam" />
                            <?= esc_html__('Chỉ tìm theo tên công ty','crismaster') ?>
                        </div>

                        <div class="dropdown-section">
                            <svg class="hide-mobile-1199" width="27" height="36" viewBox="0 0 27 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.0846 19.7001C15.5876 19.7001 17.6166 17.4167 17.6166 14.6001C17.6166 11.7834 15.5876 9.50006 13.0846 9.50006C10.5817 9.50006 8.55261 11.7834 8.55261 14.6001C8.55261 17.4167 10.5817 19.7001 13.0846 19.7001Z" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.0853 1C9.88008 1 6.80614 2.43285 4.5397 4.98335C2.27327 7.53384 1 10.9931 1 14.6C1 17.8164 1.60729 19.921 3.266 22.25L13.0853 35L22.9046 22.25C24.5633 19.921 25.1706 17.8164 25.1706 14.6C25.1706 10.9931 23.8973 7.53384 21.6309 4.98335C19.3645 2.43285 16.2905 1 13.0853 1V1Z" stroke="#878787" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <select id="dropdownAddress">
                                <?php if (!empty($header_province_arr)){
                                    foreach ($header_province_arr as $province){
                                        $province_arr = explode('|',$province);
                                        ?>
                                        <option value="<?= esc_attr($province_arr[0]) ?>"><?= esc_attr($province_arr[1]) ?></option>
                                    <?php }
                                } ?>
                            </select>
                            <button class="btn-main btn-search-dropdown" onclick="myFunction()"><?= esc_html__('Tìm kiếm','crismaster') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid section-table-of-contents">
            <div class="container-fluid-ct">
                <div class="row row-table-of-contents">
                    <div class="table-of-contents">
                        <ul class="list-of-contents">
								<span class="table-of-contents-title">
									Mục lục
								</span>
                            <li><a class="box-link-table" href="#">A</a></li>
                            <li><a class="box-link-table" href="#">B</a></li>
                            <li><a class="box-link-table" href="#">C</a></li>
                            <li><a class="box-link-table" href="#">D</a></li>
                            <li><a class="box-link-table" href="#">E</a></li>
                            <li><a class="box-link-table" href="#">F</a></li>
                            <li><a class="box-link-table" href="#">G</a></li>
                            <li><a class="box-link-table" href="#">H</a></li>
                            <li><a class="box-link-table" href="#">I</a></li>
                            <li><a class="box-link-table" href="#">J</a></li>
                            <li><a class="box-link-table" href="#">K</a></li>
                            <li><a class="box-link-table" href="#">L</a></li>
                            <li><a class="box-link-table" href="#">M</a></li>
                            <li><a class="box-link-table" href="#">N</a></li>
                            <li><a class="box-link-table" href="#">O</a></li>
                            <li><a class="box-link-table" href="#">P</a></li>
                            <li><a class="box-link-table" href="#">Q</a></li>
                            <li><a class="box-link-table" href="#">R</a></li>
                            <li><a class="box-link-table" href="#">S</a></li>
                            <li><a class="box-link-table" href="#">T</a></li>
                            <li><a class="box-link-table" href="#">U</a></li>
                            <li><a class="box-link-table" href="#">V</a></li>
                            <li><a class="box-link-table" href="#">W</a></li>
                            <li><a class="box-link-table" href="#">X</a></li>
                            <li><a class="box-link-table" href="#">Y</a></li>
                            <li><a class="box-link-table" href="#">Z</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid section-breadcrumb">
            <div class="container-fluid-ct">
                <div class="row-breadcrumb">
                    <div class="breadcrumb-page">
                        <a class="link-home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?= esc_html__('Trang chủ','crismaster') ?></a>
                        <i class="fa-solid fa-angle-right"></i>
                        <span><?php esc_html__('Dịch vụ','crismaster') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

