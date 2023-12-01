<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'HSH - Tin tức','crismaster'),
        'base' => 'hsh_tin_tuc',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('Tin tức',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Có thể nhập các ID bài viết','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Các Ids ngăn cách nhau bằng dấu phẩy',"crismaster")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Hoặc thêm link các bài post tương ứng','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Chỉ nên chọn 3-5 bài post để tối ưu hiển thị','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link','crismaster'),
                        'param_name' => 'slink',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Tiêu đề','crismaster'),
                        'param_name' => 'stitle',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'simage',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Mô tả ngắn','crismaster'),
                        'param_name' => 'sdes',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Ngày tháng','crismaster'),
                        'param_name' => 'sday',
                        'value' => '',
                        'description' => esc_html__('08/11/2023',"crismaster")
                    ),
                ),
            ),
        )
    ));
}
add_shortcode('hsh_tin_tuc','hsh_tin_tuc_func');
function hsh_tin_tuc_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'ids' => '',
        'details' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    var_dump($mobile);die();
    ?>
    <section class="section shs-section-widget bg-img-section shs-section-blog" data-anchor="news" id="tin-tuc-ele news" style="background-image: url('<?= get_template_directory_uri() ?>/assets/images/bgr-section-blog.png');">
        <div class="container-fluid height-100vh">
            <div class="row">
                <div class="col-12">
                    <div class="shs-heading-widget-blog">
                        <img alt="img-sub-heading-new" class="img-sub-heading-style-02" src="<?= get_template_directory_uri() ?>/assets/images/img-sub-heading-style-02.png">
                        <div class="shs-heading-meta">
                            <h3 class="shs-heading fs-30-cus"><?= esc_html__($title, 'crismaster') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row shs-item-blog-inner hsh-tin-tuc <?= $mobile ?> <?php if (!$mobile){ echo 'owl-carousel'; } ?>">
            <?php
            $t = 1;
            if (isset($ids) && $ids != '') {
                $p_ids = explode(',', $ids);
                $args = array(
                    'post_type' => 'post',
                    'status' => 'approve',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'post__in' => $p_ids
                );
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                        ?>
                        <div class="col-xs-12 shs-item-blog pd-l-r-15 u-fade-type-left js-scroll-trigger">
                            <div class="item-blog item">
                                <div class="item-image-blog">
                                    <a href="<?= get_permalink() ?>"><img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%"></a>
                                </div>
                                <div class="item-blog-content">
                                    <h6 class="item-blog-title"><a href="<?= get_permalink() ?>"><?php echo (strlen(get_the_title()) > 50) ? mb_substr(get_the_title(),0,50,'utf-8')."..." : get_the_title(); ?></a></h6>
                                    <div class="item-blog-description"><?php echo (strlen(get_the_excerpt()) > 150) ? mb_substr(get_the_excerpt(),0,150,'utf-8')."..." : get_the_excerpt(); ?></div>
                                    <div class="item-blog-date"><?= get_the_date('d/m/Y') ?></div>
                                    <div class="item-blog-btn">
                                        <a class="btn-main btn-out-line" href="<?= get_permalink() ?>"><?= esc_html__('ĐỌC THÊM','crismaster') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $t++; }
                    wp_reset_postdata();
                }
            } else {
                if (isset($details) && $details != '') {
                    $t = 1;
                    $detailss = vc_param_group_parse_atts($details, '');
                    foreach ($detailss as $dca) {
                        if (isset($dca['simage']) && $dca['simage'] != '') {
                            $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                        } ?>
                        <div class="col-xs-12 shs-item-blog pd-l-r-15 u-fade-type-left js-scroll-trigger" data-dot='<div class="nav-number"><?php if($t < 10){ echo '0'; } ?><?= $t ?></div>'>
                            <div class="item-blog item">
                                <div class="item-image-blog">
                                    <a href="<?= get_permalink() ?>"><img alt="img-blog-01" src="<?= esc_url($dca['simage'][0]) ?>" style="width:100%"></a>
                                </div>
                                <div class="item-blog-content">
                                    <h6 class="item-blog-title"><a href="<?= get_permalink() ?>"><?php echo (strlen($dca['stitle']) > 50) ? mb_substr($dca['stitle'],0,50,'utf-8')."..." : $dca['stitle']; ?></a></h6>
                                    <div class="item-blog-description"><?php echo (strlen($dca['sdes']) > 150) ? mb_substr($dca['sdes'],0,150,'utf-8')."..." : $dca['sdes']; ?></div>
                                    <div class="item-blog-date"><?= esc_html__($dca['sday'],'crismaster') ?></div>
                                    <div class="item-blog-btn">
                                        <a class="btn-main btn-out-line" href="<?= esc_url($dca['slink']) ?>"><?= esc_html__('ĐỌC THÊM','crismaster') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $t++; } } ?>
             <?php } ?>
            </div>
        </div>
        <div class="shs-nav-number hide">
            <div class="nav-number"><a href="#bannerHome">01</a></div>
            <div class="nav-number"><a href="#ve-chung-toi-ele">02</a></div>
            <div class="nav-number"><a href="#">03</a></div>
            <div class="nav-number active text-black"><a href="#tin-tuc-ele">04</a></div>
            <div class="nav-number"><a href="#">05</a></div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>