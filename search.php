<?php
get_header('short');

$theme_option = get_option('theme_option');
if (isset($theme_option['banner_logo_1']['url'])){
    $banner_logo_1 = $theme_option['banner_logo_1']['url'];
}
$header_language = $theme_option['header_language'];
$footer_name = $theme_option['footer_name'];
$footer_address = $theme_option['footer_address'];
$footer_address2 = $theme_option['footer_address2'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];

$current_language = function_exists('pll_current_language') ? pll_current_language() : '';
if ($current_language == 'ja'){
    $header_province = $theme_option['header_province_ja'];
}else{
    $header_province = $theme_option['header_province'];
}
$lines2 = explode("\n", trim($header_province));
$header_province_arr = [];
foreach ($lines2 as $line2) {
    $header_province_arr[] = $line2;
}
?>

<main class="site-content-danh-muc">
    <div class="container-fluid">
        <div class="row-custom">
            <section class="section-blog-main container-fluid-ct style-03">
                <div class="row row-custom">
                    <div class="col-12 col-lg-9">
                        <?php
                        if (isset($theme_option['enterprise_list_banner'])) {
                            $enterprise_list_banner = $theme_option['enterprise_list_banner'];
                            $gallery_ids_array = explode(',', $enterprise_list_banner); ?>
                            <section class="widget-banner-info mb-30">
                                <div class="container-fluid-ct">
                                    <div class="row">
                                        <?php
                                        foreach ($gallery_ids_array as $attachment_id) {
                                            $image_url = wp_get_attachment_url($attachment_id);
                                            $caption = get_post_field('post_excerpt', $attachment_id);
                                            if ($image_url) { ?>
                                                <div class="col-12 col-md-6 col-xl-3 item-banner-image-single" >
                                                    <a href="<?= esc_url($caption) ?>">
                                                        <img src="<?= esc_url($image_url) ?>" alt="img-single-column-01" style="width:100%">
                                                    </a>
                                                </div>
                                            <?php } } ?>
                                    </div>
                                </div>
                            </section>
                        <?php }
                        ?>
                        <div class="row row-custom">
                            <div class="col-xs-12 col-lg-3 sidebar-dm-page hide-mobile-1199">
                                <div class="widget widget-category-list">
                                    <h6 class="widget-title-sidebar"><?= esc_html__('Ngành Nghề Liên Quan','crismaster') ?></h6>
                                    <ul class="list-item-category mt-20">
                                        <?php
                                        $args2 = array(
                                            'post_type' => 'profession',
                                            'posts_per_page' => 4,
                                            'post_status' => 'publish',
                                        );
                                        $profession_posts_sidebar = get_posts($args2);
                                        foreach ($profession_posts_sidebar as $post2) {
                                            $post_title2 = mb_strlen($post2->post_title, 'UTF-8') > 20 ? mb_substr($post2->post_title, 0, 20, 'UTF-8') . '...' : $post2->post_title; ?>
                                            <li>
                                                <a href="<?= get_permalink($post2->ID) ?>" title="<?= esc_attr($post2->post_title) ?>"><?= esc_attr($post_title2) ?></a>
                                            </li>
                                        <?php }
                                        ?>
                                    </ul>
                                </div>
                                <div class="widget widget-category-list style-02">
                                    <h6 class="widget-title-sidebar"><?= esc_html__('TAG NGÀNH NGHỀ','crismaster') ?></h6>
                                    <?php
                                    $args_tag = array(
                                        'type' => 'profession',
                                        'posts_per_page' => 10,
                                        'orderby' => 'name',
                                        'order' => 'ASC'
                                    );
                                    $tags_cu = get_tags($args_tag);
                                    if (!empty($tags_cu) && !is_wp_error($tags_cu)) { ?>
                                        <ul class="list-item-category mt-30">
                                            <?php
                                            foreach ($tags_cu as $tag_cu) { ?>
                                                <li>
                                                    <a href="<?= get_term_link($tag_cu) ?>"><?= esc_attr(esc_html($tag_cu->name)) ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <div class="widget widget-category-list style-02">
                                    <h6 class="widget-title-sidebar"><?= esc_html__('NHÓM NGÀNH NGHỀ','crismaster') ?></h6>
                                    <?php
                                    $terms3 = get_terms(array(
                                        'taxonomy' => 'profession_type',
                                        'hide_empty' => true,
                                    ));
                                    if (!empty($terms3) && !is_wp_error($terms3)) { ?>
                                        <ul class="list-item-category mt-30">
                                            <?php
                                            foreach ($terms3 as $term3) { ?>
                                                <li>
                                                    <a href="<?= get_term_link($term3,'profession_type') ?>"><?= esc_attr(esc_html($term3->name)) ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <div class="widget widget-category-list style-03 border-none">
                                    <h6 class="widget-title-sidebar"><?= esc_html__('Tỉnh/ Thành Phố','crismaster') ?></h6>
                                    <ul class="list-item-category mt-30">
                                        <?php if (!empty($header_province_arr)){
                                            foreach ($header_province_arr as $province){
                                                $province_arr = explode('|',$province);
                                                if ($current_language == 'ja'){
                                                    $link = get_permalink('296') . '?province=' . urlencode($province_arr[0]);
                                                }else{
                                                    $link = get_permalink('208') . '?province=' . urlencode($province_arr[0]);
                                                }
                                                ?>
                                                <li>
                                                    <a class="<?php if (isset($_GET['province']) && $province_arr[0] == $_GET['province']  ){ echo 'active'; } ?>" href="<?= esc_url($link) ?>"><?= esc_attr($province_arr[1]) ?></a>
                                                </li>
                                            <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-9 column-contet-box-main">
                                <form class="row filter-box mb-30" id="enterprise-filter" method="get" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                                    <div class="filter-label">
                                        <svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path id="Vector" d="M5.68943 10C5.45983 10 5.26723 9.94 5.11164 9.82C4.95604 9.7 4.87852 9.55167 4.87906 9.375V5.625L0.178899 1C-0.0236942 0.791666 -0.0542182 0.572917 0.0873269 0.34375C0.228872 0.114583 0.475495 0 0.827197 0H12.1724C12.5236 0 12.7702 0.114583 12.9123 0.34375C13.0544 0.572917 13.0238 0.791666 12.8207 1L8.12055 5.625V9.375C8.12055 9.55208 8.04275 9.70062 7.88716 9.82062C7.73157 9.94062 7.53924 10.0004 7.31018 10H5.68943ZM6.4998 5.1875L10.5111 1.25H2.48846L6.4998 5.1875Z" fill="#003DA5"/>
                                        </svg>
                                        <?= esc_html__('Lọc theo','crismaster') ?> :
                                    </div>
                                    <div class="dropdown-section max-w-300px">
                                        <select id="dropdownProfession"  >
                                            <option value=""><?= esc_html__('Chọn Ngành Nghề','crismaster') ?></option>
                                            <?php
                                            $args = array(
                                                'post_type' => 'profession',
                                                'posts_per_page' => -1,
                                            );
                                            $profession_posts = get_posts($args);
                                            foreach ($profession_posts as $post) {
                                                $post_title = mb_strlen($post->post_title, 'UTF-8') > 20 ? mb_substr($post->post_title, 0, 20, 'UTF-8') . '...' : $post->post_title;
                                                echo '<option value="' . esc_attr($post->ID.'|'.$post->post_title) . '">' . esc_html($post_title) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="dropdown-section max-w-300px">
                                        <select id="dropdownProvince" >
                                            <option value=""><?= esc_html__('Chọn Thành Phố','crismaster') ?></option>
                                            <?php if (!empty($header_province_arr)){
                                                foreach ($header_province_arr as $province){
                                                    $province_arr = explode('|',$province);
                                                    ?>
                                                    <option value="<?= esc_attr($province_arr[0]) ?>"><?= esc_attr($province_arr[1]) ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </form>

                                <div id="primary">

                                    <?php  $search_query = new WP_Query( 's='.$s.'&showposts=-1' );
                                    $search_keyword =  $s;
                                    $search_count = $search_query->post_count; ?>

                                    <?php
                                    $args = array(
                                        's' => $search_keyword,
                                        'posts_per_page' => 5,
                                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                                        'post_status' => 'publish',
                                    );
                                    if (isset($_GET['is_enterprise']) && $_GET['is_enterprise'] == 'on') {
                                        $args['post_type'] = 'enterprise';
                                    }
                                    if (isset($_GET['province']) && $_GET['province'] != '0'){
                                        $province_value = sanitize_text_field($_GET['province']);
                                        $args['meta_query'] = array(
                                            array(
                                                'key' => '_cmb_province',
                                                'value' => $province_value,
                                                'compare' => '='
                                            )
                                        );
                                    }
                                    $wp_query = new WP_Query($args);

                                    if ($wp_query->have_posts()) : ?>
                                        <h3 class="title-main color-main text-center"><?= esc_html__('Tìm thấy','crismaster') ?> <span><?= $wp_query->found_posts ?></span> <?= esc_html__('kết quả cho : ','crismaster') ?><?php echo esc_attr($search_keyword)?></h3>
                                        <?php
                                        while ($wp_query->have_posts()) : $wp_query->the_post();
                                            $province = get_post_meta(get_the_ID(),'_cmb_province',true);
                                            $profession = get_post_meta(get_the_ID(),'_cmb_profession',true);
                                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                            $taitro = get_post_meta(get_the_ID(),'_cmb_is_taitro',true);
                                            ?>
                                            <div class="widget-box-info mb-30 mt-40">
                                                <div class="box-info-content">
                                                    <h3 class="box-cate-title color-main fs-20">
                                                        <?= the_title() ?>
                                                        <svg width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path id="Vector" d="M30.8591 13.9933L27.5277 10.2742L27.9919 5.35117L23.0632 4.25418L20.4827 0L15.8407 1.95318L11.1986 0L8.61818 4.25418L3.68942 5.33779L4.15362 10.2609L0.822266 13.9933L4.15362 17.7124L3.68942 22.6488L8.61818 23.7458L11.1986 28L15.8407 26.0334L20.4827 27.9866L23.0632 23.7324L27.9919 22.6354L27.5277 17.7124L30.8591 13.9933ZM13.1101 20.6823L7.64881 15.3311L9.5739 13.4448L13.1101 16.8963L22.1074 8.08027L24.0325 9.97993L13.1101 20.6823Z" fill="#FFCD00"/>
                                                        </svg>
                                                    </h3>
                                                    <?php if ($taitro == 'on'){ ?>
                                                        <div class="sub-cate-title">
                                                            <?= esc_html__('Được Tài Trợ','crismaster') ?>
                                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M8.19536 0C12.6192 0 16.2052 3.35775 16.2052 7.5C16.2052 11.6423 12.6192 15 8.19536 15C3.77154 15 0.185547 11.6423 0.185547 7.5C0.185547 3.35775 3.77154 0 8.19536 0ZM8.19536 1.5C6.49589 1.5 4.86603 2.13214 3.66433 3.25736C2.46262 4.38258 1.78751 5.9087 1.78751 7.5C1.78751 9.0913 2.46262 10.6174 3.66433 11.7426C4.86603 12.8679 6.49589 13.5 8.19536 13.5C9.89483 13.5 11.5247 12.8679 12.7264 11.7426C13.9281 10.6174 14.6032 9.0913 14.6032 7.5C14.6032 5.9087 13.9281 4.38258 12.7264 3.25736C11.5247 2.13214 9.89483 1.5 8.19536 1.5ZM7.06278 4.31775C7.34635 4.0524 7.72588 3.89625 8.12642 3.88014C8.52696 3.86403 8.91939 3.98914 9.22623 4.23075L9.32795 4.31775L11.5939 6.4395C11.8773 6.70503 12.0441 7.0604 12.0613 7.43545C12.0785 7.8105 11.9449 8.17795 11.6868 8.46525L11.5939 8.5605L9.32795 10.6823C9.04437 10.9476 8.66484 11.1038 8.2643 11.1199C7.86376 11.136 7.47133 11.0109 7.1645 10.7692L7.06278 10.6823L4.7968 8.5605C4.51341 8.29497 4.34664 7.9396 4.32944 7.56455C4.31224 7.18951 4.44585 6.82205 4.70388 6.53475L4.7968 6.4395L7.06278 4.31775ZM8.19536 5.379L5.93019 7.5L8.19536 9.621L10.4605 7.5L8.19536 5.379Z" fill="#FFCD00"/>
                                                            </svg>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="row flex-content-box mt-30">
                                                        <div class="col-12 col-lg-6 column-img-box">
                                                            <div class="wrap-box-img">
                                                                <img src="<?= esc_url($single_image[0]) ?>" alt="img-banner-01" style="width:100%">
                                                                <span class="text-style-box"><?= esc_html__('Đã Xác Thực','crismaster') ?></span>
                                                            </div>
                                                            <?php
                                                            $giaithuong = get_post_meta( get_the_ID(),'_cmb_giaithuong', true );
                                                            if ($giaithuong != '' && count($giaithuong) > 0){ ?>
                                                                <div class="hsh-blog-releated mt-20">
                                                                    <div class="shs-nav-blog-releated row">
                                                                        <?php
                                                                        foreach ($giaithuong as $gt){ ?>
                                                                            <a class="nav-image"><img alt="img-blog-01" style="max-width: 70px" src="<?= esc_url($gt) ?>"></a>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-12 col-lg-6 column-content-box">
                                                            <?php  $ng_diachi = get_post_meta(get_the_ID(),'_cmb_ng_diachi', true);
                                                            if ($ng_diachi != ''){ ?>
                                                                <div class="box-info-des">
                                                                    <label><?= esc_html__('Địa chỉ','crismaster') ?>: </label>
                                                                    <span class="info-des-normal" ><?= esc_attr($ng_diachi) ?></span>
                                                                </div>
                                                            <?php } ?>
                                                            <?php  $mst = get_post_meta(get_the_ID(),'_cmb_mst', true);
                                                            if ($mst != ''){ ?>
                                                                <div class="box-info-des">
                                                                    <label><?= esc_html__('Mã số thuế','crismaster') ?>: </label>
                                                                    <span class="info-des-normal" ><?= esc_attr($mst) ?></span>
                                                                </div>
                                                            <?php } ?>
                                                            <?php  $phone_e = get_post_meta(get_the_ID(), $prefix . '_cmb_phone_e', true);
                                                            if ($phone_e != ''){
                                                                ?>
                                                                <div class="box-info-des">
                                                                    <label><?= esc_html__('Điện thoại','crismaster') ?>: </label>
                                                                    <span class="info-des-normal"><?= esc_attr($phone_e) ?></span>
                                                                </div>
                                                            <?php } ?>

                                                            <div class="box-info-des">
                                                                <label><?= esc_html__('Sản phẩm chính','crismaster') ?>: </label>
                                                                <?php
                                                                $services_ids = get_post_meta(get_the_ID(), $prefix . '_cmb_service', true);
                                                                if ($services_ids) {
                                                                    foreach ($services_ids as $service_id) {
                                                                        $service_title = get_the_title($service_id);
                                                                        $service_permalink = get_permalink($service_id);
                                                                        ?>
                                                                        <span class="info-des-normal"><?= esc_attr($service_title) ?> </span> |
                                                                        <?php
                                                                    }
                                                                }else{ ?>
                                                                    <a href="#"><?= esc_html__('Chưa thêm sản phẩm/dịch vụ','crismaster') ?></a>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                            <div class="box-info-des lh-1">
                                                                <label><?= esc_html__('Ngành nghề kinh doanh','crismaster') ?>: </label>
                                                                <?php
                                                                $profession_ids = get_post_meta(get_the_ID(), $prefix . '_cmb_profession', true);
                                                                if ($profession_ids) {
                                                                    foreach ($profession_ids as $profession_id) {
                                                                        $profession_title = get_the_title($profession_id);
                                                                        $profession_permalink = get_permalink($profession_id);
                                                                        ?>
                                                                        <a class="info-link" href="<?= esc_url($profession_permalink) ?>"><?= esc_attr($profession_title) ?>; </a>
                                                                        <?php
                                                                    }
                                                                }else{ ?>
                                                                    <a href="#"><?= esc_html__('Chưa thêm ngành nghề','crismaster') ?></a>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-des mt-40 mb-40">
                                                        <?= get_the_excerpt() ?>
                                                    </div>
                                                    <a class="btn-text btn-box-text-dm" href="<?php the_permalink() ?>"><?= esc_html__('Xem Thêm','crismaster') ?> <img src="<?= get_template_directory_uri() ?>/assets/image/double-icon.svg" alt="double icon"></a>
                                                    <div class="space-between row-btn-info btn-box-dm">
                                                        <?php  $phone_e = get_post_meta(get_the_ID(), $prefix . '_cmb_phone_e', true);
                                                        if ($phone_e != ''){
                                                            $phone_e = mb_strlen($phone_e, 'UTF-8') > 16 ? mb_substr($phone_e, 0, 16, 'UTF-8') . '...' : $phone_e;?>
                                                            <a class="btn-main btn-round style-04" href="tel:02438262938">
                                                                <svg width="16" height="16" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M20.0887 26.5983C18.206 26.529 12.8701 25.7918 7.28194 20.206C1.69507 14.619 0.958955 9.28558 0.888351 7.40188C0.783752 4.53124 2.98294 1.74295 5.52338 0.654044C5.8293 0.521972 6.1643 0.471688 6.49553 0.508126C6.82675 0.544565 7.14281 0.666474 7.41269 0.861891C9.50466 2.3861 10.9481 4.69203 12.1876 6.50514C12.4603 6.90348 12.5769 7.38822 12.5152 7.86699C12.4535 8.34575 12.2177 8.78508 11.8529 9.10126L9.302 10.9954C9.17876 11.0844 9.09201 11.2151 9.05786 11.3632C9.02371 11.5113 9.04449 11.6667 9.11634 11.8007C9.69424 12.8504 10.7219 14.4138 11.8987 15.5903C13.0767 16.7668 14.7137 17.8622 15.8368 18.5054C15.9776 18.5844 16.1434 18.6065 16.3 18.5671C16.4566 18.5277 16.5922 18.4298 16.6788 18.2936L18.3393 15.7667C18.6446 15.3613 19.0949 15.0897 19.596 15.0088C20.0971 14.9279 20.6101 15.044 21.0275 15.3328C22.8671 16.606 25.014 18.0243 26.5856 20.0361C26.7969 20.3079 26.9314 20.6314 26.9748 20.9729C27.0183 21.3144 26.9692 21.6613 26.8327 21.9773C25.7384 24.5303 22.9691 26.7042 20.0887 26.5983Z" fill="#003DA5"/>
                                                                </svg>
                                                                <?= esc_attr($phone_e) ?>
                                                            </a>
                                                        <?php } ?>
                                                        <?php  $email_e = get_post_meta(get_the_ID(), $prefix . '_cmb_email_e', true);
                                                        if ($email_e != ''){
                                                            $email_e = mb_strlen($email_e, 'UTF-8') > 16 ? mb_substr($email_e, 0, 16, 'UTF-8') . '...' : $email_e;?>
                                                            <a class="btn-main btn-round style-04" href="mailto:abc@gmail.com">
                                                                <svg width="19" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path id="Vector" d="M3.20234 19.4694C2.48444 19.4694 1.86966 19.2391 1.35799 18.7786C0.846327 18.3181 0.590929 17.7652 0.591799 17.1199V3.02295C0.591799 2.37684 0.847632 1.82354 1.3593 1.36304C1.87097 0.902539 2.48531 0.672681 3.20234 0.673464H24.0867C24.8046 0.673464 25.4194 0.903714 25.931 1.36421C26.4427 1.82471 26.6981 2.37763 26.6972 3.02295V17.1199C26.6972 17.766 26.4414 18.3193 25.9297 18.7798C25.4181 19.2403 24.8037 19.4702 24.0867 19.4694H3.20234ZM24.0867 5.37244L14.3298 10.8644C14.221 10.9231 14.1066 10.9674 13.9865 10.9971C13.8664 11.0269 13.7524 11.0414 13.6445 11.0406C13.5357 11.0406 13.4213 11.0261 13.3012 10.9971C13.1811 10.9681 13.0672 10.9239 12.9593 10.8644L3.20234 5.37244V17.1199H24.0867V5.37244ZM13.6445 8.89668L24.0867 3.02295H3.20234L13.6445 8.89668ZM3.20234 5.66613V3.93338V3.96275V3.94865V5.66613Z" fill="#003DA5"/>
                                                                </svg>
                                                                <?= esc_attr($email_e) ?>
                                                            </a>
                                                        <?php } ?>
                                                        <?php  $website_e = get_post_meta(get_the_ID(), $prefix . '_cmb_website_e', true);
                                                        if ($website_e != ''){
                                                            $website_e = mb_strlen($website_e, 'UTF-8') > 16 ? mb_substr($website_e, 0, 16, 'UTF-8') . '...' : $website_e;?>
                                                            <a class="btn-main btn-round style-04" href="#">
                                                                <svg width="20" height="25" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="Group">
                                                                        <path id="Vector" d="M27.1931 14.5935C27.1931 7.38452 21.4166 1.54082 14.2904 1.54082C7.16423 1.54082 1.3877 7.38452 1.3877 14.5935C1.3877 21.8026 7.16423 27.6463 14.2904 27.6463" stroke="#003DA5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path id="Vector_2" d="M15.5813 1.60574C15.5813 1.60574 19.4521 6.76157 19.4521 14.5932M13.0007 27.5807C13.0007 27.5807 9.12992 22.4248 9.12992 14.5932C9.12992 6.76157 13.0007 1.60574 13.0007 1.60574M2.20117 19.1617H14.291M2.20117 10.0247H26.3808" stroke="#003DA5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path id="Vector_3" d="M27.0363 22.3167C27.6737 22.7135 27.6337 23.6781 26.9782 23.7538L23.6661 24.1336L22.181 27.1514C21.8868 27.7505 20.9772 27.4568 20.8262 26.7154L19.207 18.7324C19.0792 18.1059 19.6366 17.7117 20.1747 18.0471L27.0363 22.3167Z" stroke="#003DA5" stroke-width="2"/>
                                                                    </g>
                                                                </svg>
                                                                <?= esc_attr($website_e) ?>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata(); ?>
                                        <div class="nav-number-blog text-center">
                                            <?php
                                            crismaster_pagination();
                                            ?>
                                        </div>
                                    <?php
                                    else :
                                        echo esc_html__('Không có dữ liệu!','crismaster');
                                    endif;
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($theme_option['enterprise_list_adver'])) {
                        $enterprise_list_adver = $theme_option['enterprise_list_adver'];
                        $gallery4_ids_array = explode(',', $enterprise_list_adver); ?>
                        <div class="col-xs-12 col-lg-3 sidebar-info-page">
                            <?php
                            foreach ($gallery4_ids_array as $attachment_id4) {
                                $image_url4 = wp_get_attachment_url($attachment_id4);
                                $caption4 = get_post_field('post_excerpt', $attachment_id4);
                                if ($image_url4) { ?>
                                    <div class="item-post item-banner-sale-sb" onclick="clickChangeUrls('<?= esc_url($caption4) ?>')">
                                        <img alt="img-blog-01" src="<?= esc_url($image_url4) ?>" style="width:100%">
                                    </div>
                                <?php } } ?>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <?php
            if (isset($theme_option['enterprise_list_adver2'])) {
                $enterprise_list_adver2 = $theme_option['enterprise_list_adver2'];
                $gallery4_ids_array3 = explode(',', $enterprise_list_adver2); ?>
                <section class="section section-widget-banner-image-single space-custom-02 section-banner-image-dm-page" style="max-width:1240px; margin: 100px auto 0">
                    <div class="container-fluid-ct">
                        <div class="row">
                            <?php
                            foreach ($gallery4_ids_array3 as $attachment_id5) {
                                $image_url5 = wp_get_attachment_url($attachment_id5);
                                $caption5 = get_post_field('post_excerpt', $attachment_id5);
                                if ($image_url5) { ?>
                                    <div class="col-12 col-md-6 col-xl-3 item-banner-image-single">
                                        <a href="<?= esc_url($caption5) ?>">
                                            <img src="<?= esc_url($image_url5) ?>" alt="img-banner-01" style="width:100%">
                                        </a>
                                    </div>
                                <?php } } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <section class="bgr-fff">
                <div class="container-fluid section-table-of-contents style-2">
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
            </section>
        </div>
    </div>
</main>

<?php
get_footer();
?>
