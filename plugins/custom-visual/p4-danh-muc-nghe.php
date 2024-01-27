<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Danh mục nghề nghiệp','crismaster'),
        'base' => 'p4_danh_muc_nghe',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề 2','crismaster'),
                'param_name' => 'title2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm danh mục','crismaster'),
                'param_name' => 'details',
                'value' => '',
                'description' => esc_html__('Thêm các danh mục nghề muốn hiển thị','crismaster'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('ID danh mục','crismaster'),
                        'param_name' => 'sid',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'simage',
                        'value' => '',
                        'description' => esc_html__('Hình ảnh đại diện hiển thị cho danh mục',"crismaster")
                    ),
                ),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm banner quảng cáo','crismaster'),
                'param_name' => 'details2',
                'value' => '',
                'description' => esc_html__('Thêm các banner quảng cáo, chỉ nên thêm 2 banner','crismaster'),
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Hình Ảnh','crismaster'),
                        'param_name' => 'ssimage',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Đi đến Link','crismaster'),
                        'param_name' => 'sslink',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                ),
            ),
        )
    ));
}
add_shortcode('p4_danh_muc_nghe','p4_danh_muc_nghe_func');
function p4_danh_muc_nghe_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'details' => '',
        'details2' => '',
    ),$atts));
    ob_start();
    $t = 1;
    if(isset($details) && $details != ''){
        $detailss = vc_param_group_parse_atts($details,'');
        foreach ($detailss as $dca ) {
            if(isset($dca['simage']) && $dca['simage']!='') {
                $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
            }
            ?>
            <section class="section-category-banner">
                <div class="container-fluid-ct">
                    <?php if ($t == 1){ ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrap-title-section">
                                    <h2 class="item-section-title style-03"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h2>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="row table-category-banner">
                        <div class="col-12 col-lg-3 col-custom">
                            <div class="wrap-category-banner">
                                <div class="category-banner-title">
                                    <span class="number-round"><?= $t ?></span>
                                    <?php
                                    $term = get_term_by('id', $dca['sid'], 'profession_type');
                                    if ($term) {
                                        echo esc_html($term->name);
                                    }?>
                                </div>
                                <ul class="category-item-list">
                                    <?php
                                    $profession_arr = array();
                                    $args = array(
                                        'post_type' => 'profession',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'profession_type',
                                                'field' => 'id',
                                                'terms' => $dca['sid'],
                                            ),
                                        ),
                                        'posts_per_page' => 6,
                                    );
                                    $profession_query = new WP_Query($args);
                                    if ($profession_query->have_posts()) {
                                        while ($profession_query->have_posts()) {
                                            $profession_query->the_post();
                                            $title_post2 = get_the_title();
                                            $title_post2 = mb_strlen($title_post2, 'UTF-8') > 50 ? mb_substr($title_post2, 0, 50, 'UTF-8') . '...' : $title_post2;
                                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                            array_push($profession_arr, array(
                                                    'link' => get_permalink(),
                                                    'title' => $title_post2,
                                                     'image' => $single_image ? $single_image[0] : get_template_directory_uri().'/assets/image/icon-1.svg',
                                            ));
                                    ?>
                                    <li><a href="<?php the_permalink() ?>" class="item-cateory"><?= esc_attr($title_post2) ?></a></li>
                                    <?php }  wp_reset_postdata(); } ?>
                                </ul>

                                <?php
                                $term_link = get_term_link($term);
                                if (!is_wp_error($term_link)) { ?>
                                    <a target="_blank" href="<?= esc_url($term_link) ?>" class="item-btn-view-all"><?= esc_html__('Xem tất cả','crismaster') ?></a>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-custom bg-img-section wrap-category-banner-img" style="background-image: url('<?= esc_url($dca['simage'][0]) ?>');">
                        </div>

                        <div class="col-12 col-lg-5 col-custom grid-item-banner">
                            <div class="row mlr-0 ">
                                <?php if (!empty($profession_arr)){
                                    foreach ($profession_arr as $profession){ ?>
                                        <div class="col-12 col-lg-4 col-item">
                                            <a href="<?= esc_attr($profession['link']) ?>" class="wrap-item text-center">
                                                <div class="wrap-image">
                                                    <img class="item-image" src="<?= esc_url($profession['image']) ?>" alt="Image" style="max-width: 100%">
                                                </div>
                                                <h5 class="item-title-grid"><?= esc_attr($profession['title']) ?></h5>
                                            </a>
                                        </div>
                                    <?php }
                                } ?>

                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <?php if ($t == 1){ ?>
                <section class="section section-widget-banner-ads">
                    <div class="container-fluid-ct">
                        <div class="row banner-box-white">
                            <?php if(isset($details2) && $details2 != ''){
                                $detailss2 = vc_param_group_parse_atts($details2,'');
                                foreach ($detailss2 as $dca2 ) {
                                    if(isset($dca2['ssimage']) && $dca2['ssimage']!='') {
                                        $dca2['ssimage'] = wp_get_attachment_image_src($dca2['ssimage'], '');
                                    }
                                    ?>
                                <div class="col-12 col-lg-6 item-banner-ads">
                                    <a href="<?= esc_url($dca2['sslink']) ?>">
                                        <img src="<?= esc_url($dca2['ssimage'][0]) ?>" alt="Banner Quảng Cáo" style="width:100%">
                                    </a>
                                </div>
                        <?php } } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>

        <?php    $t++; } }
    return ob_get_clean();
}
?>