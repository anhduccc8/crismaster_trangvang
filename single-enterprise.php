<?php
get_header('short');
$theme_option = get_option('theme_option');
$enterprise_banner = '';
if (isset($theme_option['enterprise_banner']['url'])){
    $enterprise_banner = $theme_option['enterprise_banner']['url'];
}
if(have_posts()):
    while ( have_posts() ) : the_post();
        $is_taitro = get_post_meta(get_the_ID(),'_cmb_is_taitro',true);
        $current_post_id = get_the_ID();
        $categories = get_the_terms($current_post_id, 'enterprise_type');?>
        <main class="site-content-danh-muc">
            <div class="container-fluid">
                <div class="row-custom">
                    <section class="section section-widget-banner-social">
                        <div class="container-fluid-ct">
                            <div class="row">
                                <div class="col-12">
                                    <a>
                                        <img src="<?php  echo esc_url($enterprise_banner) ?>" alt="img-banner-social" style="width:100%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section section-widget-banner-socials mt-30">
                        <div class="container-fluid-ct">
                            <div class="row">
                                <?php
                                if (isset($theme_option['enterprise_gallery'])) {
                                    $enterprise_gallery = $theme_option['enterprise_gallery'];
                                    $gallery_ids_array = explode(',', $enterprise_gallery);
                                    foreach ($gallery_ids_array as $attachment_id) {
                                        $image_url = wp_get_attachment_url($attachment_id);
                                        $caption = get_post_field('post_excerpt', $attachment_id);
                                        if ($image_url) { ?>
                                            <div class="item-img-social col-md-2">
                                                <a href="<?= esc_url($caption) ?>">
                                                    <img src="<?= esc_url($image_url) ?>" alt="img-social-01" style="width: 100%">
                                                </a>
                                            </div>
                                        <?php }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </section>
                    <section class="section-blog-main container-fluid-ct style-02">
                        <div class="row row-custom">
                            <div class="col-xs-12 col-lg-9">
                                <div class="widget-box-info">
                                    <h3 class="box-info-title"> <?= the_title() ?></h3>
                                    <div class="box-info-content">
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
                                        <?php  $ng_diachi = get_post_meta(get_the_ID(), $prefix . '_cmb_ng_diachi', true);
                                        if ($ng_diachi != ''){ ?>
                                            <div class="box-info-des mt-30">
                                                <label><?= esc_html__('Địa chỉ','crismaster') ?>: </label>
                                                <span class="info-des-normal" ><?= esc_attr($ng_diachi) ?></span>
                                            </div>
                                        <?php } ?>
                                        <?php  $ng_daidien = get_post_meta(get_the_ID(), $prefix . '_cmb_ng_daidien', true);
                                        if ($ng_daidien != ''){ ?>
                                            <div class="box-info-des">
                                                <label><?= esc_html__('Người đại diện','crismaster') ?>: </label>
                                                <span class="info-des-normal" ><?= esc_attr($ng_daidien) ?></span>
                                            </div>
                                        <?php } ?>
                                        <?php  $mst = get_post_meta(get_the_ID(), $prefix . '_cmb_mst', true);
                                        if ($mst != ''){ ?>
                                            <div class="box-info-des">
                                                <label><?= esc_html__('Mã số thuế','crismaster') ?>: </label>
                                                <span class="info-des-normal" ><?= esc_attr($mst) ?></span>
                                            </div>
                                        <?php } ?>

                                        <div class="row-btn-info">
                                        <?php  $phone_e = get_post_meta(get_the_ID(), $prefix . '_cmb_phone_e', true);
                                        if ($phone_e != ''){ ?>
                                            <a class="btn-main btn-round style-04" href="tel:<?= esc_attr($phone_e) ?>">
                                                <svg width="20" height="20" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M20.0887 26.5983C18.206 26.529 12.8701 25.7918 7.28194 20.206C1.69507 14.619 0.958955 9.28558 0.888351 7.40188C0.783752 4.53124 2.98294 1.74295 5.52338 0.654044C5.8293 0.521972 6.1643 0.471688 6.49553 0.508126C6.82675 0.544565 7.14281 0.666474 7.41269 0.861891C9.50466 2.3861 10.9481 4.69203 12.1876 6.50514C12.4603 6.90348 12.5769 7.38822 12.5152 7.86699C12.4535 8.34575 12.2177 8.78508 11.8529 9.10126L9.302 10.9954C9.17876 11.0844 9.09201 11.2151 9.05786 11.3632C9.02371 11.5113 9.04449 11.6667 9.11634 11.8007C9.69424 12.8504 10.7219 14.4138 11.8987 15.5903C13.0767 16.7668 14.7137 17.8622 15.8368 18.5054C15.9776 18.5844 16.1434 18.6065 16.3 18.5671C16.4566 18.5277 16.5922 18.4298 16.6788 18.2936L18.3393 15.7667C18.6446 15.3613 19.0949 15.0897 19.596 15.0088C20.0971 14.9279 20.6101 15.044 21.0275 15.3328C22.8671 16.606 25.014 18.0243 26.5856 20.0361C26.7969 20.3079 26.9314 20.6314 26.9748 20.9729C27.0183 21.3144 26.9692 21.6613 26.8327 21.9773C25.7384 24.5303 22.9691 26.7042 20.0887 26.5983Z" fill="#003DA5"/>
                                                </svg>
                                                <?= esc_attr($phone_e) ?>
                                            </a>
                                        <?php } ?>
                                        <?php  $email_e = get_post_meta(get_the_ID(), $prefix . '_cmb_email_e', true);
                                        if ($email_e != ''){ ?>
                                            <a class="btn-main btn-round style-04" href="mailto:<?= esc_attr($email_e) ?>">
                                                <svg width="23" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path id="Vector" d="M3.20234 19.4694C2.48444 19.4694 1.86966 19.2391 1.35799 18.7786C0.846327 18.3181 0.590929 17.7652 0.591799 17.1199V3.02295C0.591799 2.37684 0.847632 1.82354 1.3593 1.36304C1.87097 0.902539 2.48531 0.672681 3.20234 0.673464H24.0867C24.8046 0.673464 25.4194 0.903714 25.931 1.36421C26.4427 1.82471 26.6981 2.37763 26.6972 3.02295V17.1199C26.6972 17.766 26.4414 18.3193 25.9297 18.7798C25.4181 19.2403 24.8037 19.4702 24.0867 19.4694H3.20234ZM24.0867 5.37244L14.3298 10.8644C14.221 10.9231 14.1066 10.9674 13.9865 10.9971C13.8664 11.0269 13.7524 11.0414 13.6445 11.0406C13.5357 11.0406 13.4213 11.0261 13.3012 10.9971C13.1811 10.9681 13.0672 10.9239 12.9593 10.8644L3.20234 5.37244V17.1199H24.0867V5.37244ZM13.6445 8.89668L24.0867 3.02295H3.20234L13.6445 8.89668ZM3.20234 5.66613V3.93338V3.96275V3.94865V5.66613Z" fill="#003DA5"/>
                                                </svg>
                                                <?= esc_attr($email_e) ?>
                                            </a>
                                        <?php } ?>
                                        <?php  $website_e = get_post_meta(get_the_ID(), $prefix . '_cmb_website_e', true);
                                        if ($website_e != ''){ ?>
                                            <a class="btn-main btn-round style-04" href="#">
                                                <svg width="25" height="25" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                                <div class="widget-box-info mt-60">
                                    <h3 class="box-info-title"> <?= esc_html__('Thông tin chi tiết','crismaster') ?></h3>
                                    <div class="box-info-content">
                                    <?php
                                    $name_dn = get_post_meta(get_the_ID(), $prefix . '_cmb_name_dn', true);
                                    $type_dn = get_post_meta(get_the_ID(), $prefix . '_cmb_type_dn', true);
                                    $thitruong_dn = get_post_meta(get_the_ID(), $prefix . '_cmb_thitruong_dn', true);
                                    $date_dn = get_post_meta(get_the_ID(), $prefix . '_cmb_date_dn', true);
                                    if ($name_dn != ''){ ?>
                                        <div class="box-info-des">
                                            <label><?= esc_html__('Tên chính thức','crismaster') ?>: </label>
                                            <span class="info-des-normal"><?= esc_attr($name_dn) ?></span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($type_dn != ''){ ?>
                                        <div class="box-info-des">
                                            <label><?= esc_html__('Loại hình công ty','crismaster') ?>: </label>
                                            <span class="info-des-normal"><?= esc_attr($type_dn) ?></span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($thitruong_dn != ''){ ?>
                                        <div class="box-info-des">
                                            <label><?= esc_html__('Thị trường chính','crismaster') ?>: </label>
                                            <span class="info-des-normal"><?= esc_attr($thitruong_dn) ?></span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($date_dn != ''){ ?>
                                        <div class="box-info-des">
                                            <label><?= esc_html__('Ngày cấp giấy phép','crismaster') ?>: </label>
                                            <span class="info-des-normal"><?= date('d/m/Y', $date_dn) ?></span>
                                        </div>
                                    <?php } ?>
                                        <div class="box-info-des">
                                            <label><?= esc_html__('Từ khóa','crismaster') ?> : </label>
                                        </div>
                                        <div class="row-btn-info-02">
                                            <?php
                                            $tags = get_the_tags(get_the_ID());
                                            if ($tags) {
                                                foreach ($tags as $tag) { ?>
                                                    <a class="btn-main btn-round style-05 rd-12" href="<?= esc_attr($tag->link) ?>">
                                                       <?= esc_attr($tag->name) ?>
                                                    </a>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-box-info mt-60">
                                    <div class="box-info-content style-02">
                                        <h2 class="item-section-title item-box-title-info mb-30">
                                            <span class="text-highlight"><?= esc_html__('GIỚI THIỆU','crismaster') ?></span> <?= esc_html__('CÔNG TY & SẢN PHẨM DỊCH VỤ','crismaster') ?>
                                        </h2>
                                        <a href="<?= esc_attr($theme_option['enterprise_link3']) ?>" class="link-box-custom">
                                            <?= esc_html__('Gửi yêu cầu cập nhật thông tin doanh nghiệp này','crismaster') ?>
                                        </a>
                                        <?php the_content(); ?>
                                        <?php
                                        $giaithuong = get_post_meta( get_the_ID(), $prefix . '_cmb_giaithuong', true );
                                        if ($giaithuong != '' && count($giaithuong) > 0){ ?>
                                        <div class="block-certificate">
                                            <div class="block-certificate-title mt-50 mb-40"><?= esc_html__('Giải thưởng và danh hiệu uy tín lớn','crismaster') ?>:</div>
                                                <div class="row">
                                                <?php
                                                foreach ($giaithuong as $gt){ ?>
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <img alt="img-certificate" src="<?= esc_url($gt) ?>" style="width:100%">
                                                    </div>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }
                                        ?>
                                </div>

                                <div class="widget-box-info mt-60">
                                    <?php
                                    if (comments_open() || get_comments_number()) {
                                        comments_template();
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-3 <?php if ($is_taitro == 'on'){ echo 'blog-sidebar-right'; } ?> sidebar-info-page">
                            <?php
                            if (isset($theme_option['enterprise_adver']) && $is_taitro == 'on') {
                                $enterprise_adver = $theme_option['enterprise_adver'];
                                $gallery2_ids_array = explode(',', $enterprise_adver);
                                foreach ($gallery2_ids_array as $attachment_id2) {
                                    $image_url2 = wp_get_attachment_url($attachment_id2);
                                    $caption2 = get_post_field('post_excerpt', $attachment_id2);
                                    if ($image_url2) { ?>
                                        <div class="item-post item-banner-sale-sb" onclick="clickChangeUrls('<?= esc_url($caption2) ?> ?>')">
                                            <img alt="img-blog-01" src="<?= esc_url($image_url2) ?>" style="width:100%">
                                         </div>
                                    <?php }
                                }
                            }else{
                                if ($categories && !is_wp_error($categories)) {
                                    $current_category_id = $categories[0]->term_id;
                                    $args2 = array(
                                        'post_type' => 'enterprise',
                                        'posts_per_page' => 10,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'enterprise_type',
                                                'field' => 'id',
                                                'terms' => $current_category_id,
                                            ),
                                        ),
                                        'post__not_in' => array($current_post_id),
                                    );
                                    $related_posts_query2 = new WP_Query($args2);
                                    if ($related_posts_query2->have_posts()) :
                                        while ($related_posts_query2->have_posts()) : $related_posts_query2->the_post();
                                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                            $mst = get_post_meta(get_the_ID(),'_cmb_mst',true);
                                            $ng_diachi = get_post_meta(get_the_ID(),'_cmb_ng_diachi',true);
                                            ?>

                                            <div class="item box-item-blog mb-30">
                                                <span class="text-style-box"><?= esc_html__('ĐƯỢC ĐỀ XUẤT','crismaster') ?></span>
                                                <div class="wrap-item relative">
                                                    <a href="<?php get_permalink() ?>" class="link-box"></a>
                                                    <div class="wrap-image">
                                                        <img class="item-image" src="<?= esc_url($single_image[0]) ?>" alt="Image">
                                                    </div>
                                                    <div class="wrap-box-content-blog mt-30">
                                                        <h5 class="item-title"> <?= the_title() ?></h5>
                                                        <div class="box-content-des">
                                                            <?= esc_attr($ng_diachi) ?>
                                                        </div>
                                                        <div class="box-content-mst mt-10">
                                                            <?= esc_html__('Mã số thuế','crismaster') ?>: <?= esc_attr($mst) ?>
                                                        </div>
                                                        <?php $post_tags = get_the_tags();
                                                        if ($post_tags) {
                                                            $first_tag = $post_tags[0]; ?>
                                                            <a class="btn-main btn-round mt-20 style-05"><?= esc_attr($first_tag->name) ?></a>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </section>
                    <section class="section-product section-blog-carousel space-custom-02 space-info-page">
                        <div class="container-fluid-ct">
                            <div class="row">
                                <div class="col-12">
                                    <div class="wrap-title-section">
                                        <h2 class="item-section-title style-03"><span class="text-highlight"><?= esc_html__('DOANH NGHIỆP','crismaster') ?> </span><?= esc_html__('CÙNG CHUYÊN MỤC','crismaster') ?></h2>
                                    </div>
                                </div>

                                <div class="col-12 owl-carousel-section mt-70">
                                    <div class="owl-carousel owl-carousel-02 owl-theme">
                                        <?php
                                        if ($categories && !is_wp_error($categories)) {
                                            $current_category_id = $categories[0]->term_id;
                                            $args = array(
                                                'post_type' => 'enterprise',
                                                'posts_per_page' => 10,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'enterprise_type',
                                                        'field' => 'id',
                                                        'terms' => $current_category_id,
                                                    ),
                                                ),
                                                'post__not_in' => array($current_post_id),
                                            );
                                            $related_posts_query = new WP_Query($args);
                                            if ($related_posts_query->have_posts()) :
                                                while ($related_posts_query->have_posts()) : $related_posts_query->the_post();
                                                    $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                                    $mst = get_post_meta(get_the_ID(),'_cmb_mst',true);
                                                    $ng_diachi = get_post_meta(get_the_ID(),'_cmb_ng_diachi',true);

                                                    $title_cus = get_the_title();
                                                    $title_cus =mb_strlen($title_cus, 'UTF-8') > 30 ? mb_substr($title_cus, 0, 30, 'UTF-8') . '...' : $title_cus;
                                                    ?>
                                                    <div class="item box-item-blog">
                                                        <span class="text-style-box"><?= esc_html__('ĐƯỢC ĐỀ XUẤT','crismaster') ?></span>
                                                        <div class="wrap-item relative">
                                                            <a href="<?= get_permalink() ?>"  title="<?= the_title(); ?>" class="link-box"></a>
                                                            <div class="wrap-image">
                                                                <img class="item-image" src="<?= esc_url($single_image[0]) ?>" alt="Image">
                                                            </div>
                                                            <div class="wrap-box-content-blog mt-30">
                                                                <h5 class="item-title" title="<?= the_title(); ?>"> <?= $title_cus ?></h5>
                                                                <div class="box-content-des">
                                                                    <?= esc_attr($ng_diachi) ?>
                                                                </div>
                                                                <div class="box-content-mst mt-10">
                                                                    <?= esc_html__('Mã số thuế','crismaster') ?>: <?= esc_attr($mst) ?>
                                                                </div>
                                                                <?php $post_tags = get_the_tags();
                                                                if ($post_tags) {
                                                                    $first_tag = $post_tags[0]; ?>
                                                                    <a class="btn-main btn-round mt-20 style-05"><?= esc_attr($first_tag->name) ?></a>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                endwhile;
                                                wp_reset_postdata();
                                            endif;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section-blog-main container-fluid-ct style-02 space-info-page">
                        <div class="row row-custom">
                            <div class="col-xs-12 col-lg-9">
                                <div class="wrap-title-section">
                                    <h2 class="item-section-title style-03"><span class="text-highlight"><?= esc_html__('NGÀNH NGHỀ','crismaster')?> </span><?= esc_html__('LIÊN QUAN','crismaster')?></h2>
                                </div>
                                <div class="row list-item-info">
                                    <?php
                                        $taxonomy = 'profession_type';
                                        $t = 1;
                                        $profession_types = get_terms($taxonomy, array('hide_empty' => false));
                                        if (!empty($profession_types) && !is_wp_error($profession_types)) {
                                            foreach ($profession_types as $profession_type) {
                                                $term_link = get_term_link($profession_type);
                                                $args = array(
                                                    'post_type' => 'profession',
                                                    'posts_per_page' => 4,
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => $taxonomy,
                                                            'field' => 'id',
                                                            'terms' => $profession_type->term_id,
                                                        ),
                                                    ),
                                                );
                                                $profession_posts = new WP_Query($args);
                                                if ($profession_posts->have_posts()) { ?>
                                                    <div class="col-xs-12 col-lg-6 column-form-left">
                                                        <ul>
                                                            <li><a class="active" href="<?= esc_attr($term_link) ?>">
                                                                    <?= esc_attr($profession_type->name) ?>
                                                                </a></li>
                                                            <?php
                                                            while ($profession_posts->have_posts()) {
                                                            $profession_posts->the_post();
                                                            ?>
                                                            <li>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php the_title(); ?>
                                                                </a>
                                                            </li>
                                                          <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <?php
                                                     } wp_reset_postdata();
                                                 $t++;}
                                        }
                                        ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-3 blog-sidebar-right">
                                <?php
                                $quangcao2 = get_post_meta( get_the_ID(), $prefix . '_cmb_quangcao2', true );
                                if ($quangcao2 != '' && count($quangcao2) > 0){
                                    foreach ($quangcao2 as $qc2){ ?>
                                        <div class="item-post item-banner-sale-sb">
                                            <img alt="img-blog-01" src="<?= esc_url($qc2) ?>" style="width:100%">
                                        </div>
                                    <?php } } else { ?>
                                    <div class="item-post item-banner-sale-sb">
                                        <img alt="img-blog-01" src="<?= get_template_directory_uri() ?>/assets/image/banner-marketing.png" style="width:100%">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                    <?php
                    if (isset($theme_option['enterprise_banner2'])) {
                        $enterprise_banner2 = $theme_option['enterprise_banner2'];
                        $gallery3_ids_array = explode(',', $enterprise_banner2); ?>
                        <section class="section section-widget-banner-image-single space-custom-05">
                            <div class="container-fluid-ct">
                                <div class="row">
                                    <?php
                                    foreach ($gallery3_ids_array as $attachment_id3) {
                                    $image_url3 = wp_get_attachment_url($attachment_id3);
                                    $caption3 = get_post_field('post_excerpt', $attachment_id3);
                                    if ($image_url3) { ?>
                                        <div class="col-12 col-md-6 col-xl-3 item-banner-image-single" >
                                            <a href="<?= esc_url($caption3) ?>">
                                                <img src="<?= esc_url($image_url3) ?>" alt="img-single-column-01" style="width:100%">
                                            </a>
                                        </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </section>
                   <?php } ?>
                    <section class="section-registration-company space-custom-01">
                        <div class="container-fluid-ct">
                            <div class="row mlr-0">
                                <div class="col-12 wrap-item registration-box">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-12 item-left">
                                            <h2 class="item-section-title">
                                                <?= esc_html__('Đăng ký','crismaster') ?> <span class="text-highlight"> <?= esc_html__('TRANG VÀNG DOANH NGHIỆP','crismaster') ?></span> <span> <?= esc_html__('để tiếp cận khách hàng đang có nhu cầu mua','crismaster') ?></span>
                                            </h2>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 item-right column-btn">
                                            <a class="btn-main btn-round mr-20 style-01" href="<?= esc_url($theme_option['enterprise_link1']) ?>"><?= esc_html__('Liên hệ ngay','crismaster') ?></a>
                                            <a class="btn-main btn-round style-02" href="<?= esc_url($theme_option['enterprise_link2']) ?>"><?= esc_html__('Xem Chi Tiết','crismaster') ?> <img src="<?= get_template_directory_uri() ?>/assets/image/double-icon.svg" alt="double icon"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid section-table-of-contents style-2 ">
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
    endwhile;
endif;
get_footer();
?>