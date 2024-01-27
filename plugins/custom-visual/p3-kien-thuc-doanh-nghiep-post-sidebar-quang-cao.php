<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Bài post và sidebar quảng cáo','crismaster'),
        'base' => 'p3_kien_thuc_doanh_nghiep_post_sidebar_quang_cao',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề','crismaster'),
                'param_name' => 'title',
                'value' => '',
                'description' => esc_html__('Kiến thức',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tiêu đề 2','crismaster'),
                'param_name' => 'title2',
                'value' => '',
                'description' => esc_html__('Doanh nghiệp',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID bài tin tức chính','crismaster'),
                'param_name' => 'idz',
                'value' => '',
                'description' => esc_html__('Nhập 1 ID của bài viết chính',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('ID các bài tin tức phụ muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ","',"crismaster")
            ),
            array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Thêm banner quảng cáo sidebar','crismaster'),
                    'param_name' => 'details',
                    'value' => '',
                    'description' => esc_html__('Chỉ nên chọn 4 banner để hiển thị','crismaster'),
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Hình Ảnh','crismaster'),
                            'param_name' => 'simage',
                            'value' => '',
                            'description' => esc_html__('',"crismaster")
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Đi đến Link','crismaster'),
                            'param_name' => 'slink',
                            'value' => '',
                            'description' => esc_html__('',"crismaster")
                        ),

                    ),
                ),
        )
    ));
}
add_shortcode('p3_kien_thuc_doanh_nghiep_post_sidebar_quang_cao','p3_kien_thuc_doanh_nghiep_post_sidebar_quang_cao_func');
function p3_kien_thuc_doanh_nghiep_post_sidebar_quang_cao_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'idz' => '',
        'ids' => '',
        'details' => '',
    ),$atts));
    ob_start();
    $ids_arr = explode(',', $ids);
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => $ids_arr,
    );
    ?>
    <div class="section-blog-main container-fluid-ct style-02">
        <div class="row row-custom">
            <div class="col-xs-12 col-lg-9 shs-item-blog-sidebar">
                <div class="hsh-blog-column">
                    <div class="item-post-content">
                        <h4 class="item-section-title item-post-title"><span class="text-highlight"><?= esc_attr($title) ?> </span><?= esc_attr($title2) ?></h4>
                        <?php
                        $post = get_post($idz);
                        if ($post) {
                            $title_post = get_the_title($post->ID);
                            $title_post = mb_strlen($title_post, 'UTF-8') > 50 ? mb_substr($title_post, 0, 50, 'UTF-8') . '...' : $title_post;
                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                            $post_summary = get_post_meta($post->ID, '_cmb_post_summary', true);
                            ?>
                            <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                            <h6 class="item-blog-title"><?= esc_attr($title_post) ?></h6>
                            <div class="item-post-description">
                                <?= esc_attr($post_summary) ?>
                            </div>
                            <a class="btn-main btn-round style-03 btn-page-news" href="<?php the_permalink(); ?>"><?= esc_html__('Xem chi tiết','crismaster') ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="gp-blog-releated-02">
                    <div class="row row-blog-releated">
                    <?php
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $title_post2 = get_the_title();
                            $title_post2 = mb_strlen($title_post2, 'UTF-8') > 50 ? mb_substr($title_post2, 0, 50, 'UTF-8') . '...' : $title_post2;
                            $single_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                            ?>
                            <a href="<?= get_permalink() ?>" class="nav-image-02 col-lg-4">
                                <img alt="img-blog-01" src="<?= esc_url($single_image[0]) ?>" style="width:100%">
                                <div class="title-blog-related"><?= esc_attr($title_post2) ?></div>
                            </a>
                        <?php }
                        wp_reset_postdata();
                    }
                    ?>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-lg-3 shs-blog-sidebar">
            <?php if(isset($details) && $details != ''){
                $detailss = vc_param_group_parse_atts($details,'');
                foreach ($detailss as $dca ) {
                    if(isset($dca['simage']) && $dca['simage']!='') {
                        $dca['simage'] = wp_get_attachment_image_src($dca['simage'], '');
                    }?>
                        <div class="item-post item-banner-sale-sb">
                            <a href="<?= esc_url($dca['slink']) ?>">
                                <img alt="Banner Quảng Cáo" src="<?= esc_url($dca['simage'][0]) ?>" style="width:100%">
                            </a>
                        </div>
                <?php } } ?>

            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
?>