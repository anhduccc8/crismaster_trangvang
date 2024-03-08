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

$header_province = $theme_option['header_province'];
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
                                                $link = get_permalink('208') . '?province=' . urlencode($province_arr[0]);
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

                                <div id="primary">
                                    <?php
                                    ?>
                                    <h3 class="title-main color-main text-center"><?= esc_html__('Tags đang xem : ','crismaster') ?><?= single_cat_title() ?></h3>
                                    <?php
                                    if (have_posts()) : ?>
                                        <?php
                                        while (have_posts()) : the_post();
                                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>
                                            <div class="widget-box-info mb-30 mt-40">
                                                <div class="box-info-content">
                                                    <h3 class="box-cate-title color-main fs-20">
                                                        <?= the_title() ?>
                                                        <svg width="31" height="28" viewBox="0 0 31 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path id="Vector" d="M30.8591 13.9933L27.5277 10.2742L27.9919 5.35117L23.0632 4.25418L20.4827 0L15.8407 1.95318L11.1986 0L8.61818 4.25418L3.68942 5.33779L4.15362 10.2609L0.822266 13.9933L4.15362 17.7124L3.68942 22.6488L8.61818 23.7458L11.1986 28L15.8407 26.0334L20.4827 27.9866L23.0632 23.7324L27.9919 22.6354L27.5277 17.7124L30.8591 13.9933ZM13.1101 20.6823L7.64881 15.3311L9.5739 13.4448L13.1101 16.8963L22.1074 8.08027L24.0325 9.97993L13.1101 20.6823Z" fill="#FFCD00"/>
                                                        </svg>
                                                    </h3>
                                                    <div class="row flex-content-box mt-30">
                                                        <div class="col-12 col-lg-6 column-img-box">
                                                            <div class="wrap-box-img">
                                                                <img src="<?= esc_url($single_image[0]) ?>" alt="img-banner-01" style="width:100%">
                                                                <span class="text-style-box"><?= esc_html__('Đã Xác Thực','crismaster') ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 column-content-box">
                                                            <?php
                                                            $tags = get_the_tags(get_the_ID());
                                                            if ($tags){ ?>
                                                                <div class="box-info-des">
                                                                    <label><?= esc_html__('Tags','crismaster') ?>: </label>
                                                                    <?php foreach ($tags as $tag){ ?>
                                                                        <span class="info-des-normal" ><?= esc_attr($tag->name) ?></span> |
                                                                    <?php }?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="item-des mt-40 mb-40">
                                                        <?= get_the_excerpt() ?>
                                                    </div>
                                                    <a class="btn-text btn-box-text-dm" href="<?php the_permalink() ?>"><?= esc_html__('Xem Thêm','crismaster') ?> <img src="<?= get_template_directory_uri() ?>/assets/image/double-icon.svg" alt="double icon"></a>
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
                                    $array_A_to_Z = range('A', 'Z');
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
