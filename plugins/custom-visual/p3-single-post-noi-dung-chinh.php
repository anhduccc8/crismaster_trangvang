<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Nội dung chính bài post','crismaster'),
        'base' => 'p3_single_post_noi_dung_chinh',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textarea_raw_html',
                'heading' => esc_html__('Nội dung chính','crismaster'),
                'param_name' => 'des',
                'value' => '',
                'description' => esc_html__('Có thể nhập text dạng html',"crismaster")
            ),
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Hình ảnh cho nội dung','crismaster'),
                'param_name' => 'images',
                'value' => '',
                'description' => esc_html__('Có thể chọn 1 hoặc nhiều hình ảnh cho nội dung',"crismaster")
            ),
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Hình ảnh quảng cáo sidebar','crismaster'),
                'param_name' => 'images2',
                'value' => '',
                'description' => esc_html__('Có thể chọn 1 hoặc nhiều hình ảnh quảng cáo trên sidebar',"crismaster")
            ),
        )
    ));
}
add_shortcode('p3_single_post_noi_dung_chinh','p3_single_post_noi_dung_chinh_func');
function p3_single_post_noi_dung_chinh_func($atts,$content = null){
    extract(shortcode_atts(array(
        'des' => '',
        'images' => '',
        'images2' => '',
    ),$atts));
    ob_start();
    if(isset($image) && $image!='') {
        $image_link = wp_get_attachment_image_src($image, '');
    }
    global $post;
    ?>
    <section class="section-blog-service space-custom-02">
        <div class="container-fluid-ct">
            <div class="row row-custom">
                <div class="col-xs-12 col-lg-9">
                    <h4 class="item-post-title style-02"><?= get_the_title($post->ID) ?></h4>
                    <div class="row row-custom-box-content">
                        <div class="col-xs-12">
                            <?= isset($des) ? urldecode(base64_decode($des)) : ''; ?>
                            <?php if(isset($images) && $images !='') {
                                $imagess = explode(',', $images);
                                foreach ($imagess as $img){
                                    $imgs = wp_get_attachment_image_src($img, '');?>
                                    <img class="pt-20" src="<?= esc_url($imgs[0]) ?>" alt="Image Content" style="width:100%">
                            <?php } } ?>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-3 banner-sidebar">
                <?php if(isset($images2) && $images2 !='') {
                    $imagess2 = explode(',', $images2);
                    foreach ($imagess2 as $img2){
                        $img2 = wp_get_attachment_image_src($img2, '');?>
                    <div class="item-post item-banner-sale-sb">
                        <img alt="Image QC" src="<?= esc_url($img2[0]) ?>" style="width:100%">
                    </div>
                <?php } } ?>
                </div>

                <div class="section-blog-tag col-12">
                    <div class="trending-search">
                        <?php
                        if ($post && is_object($post)) {
                            $post_tags = get_the_tags($post->ID);
                            if ($post_tags) { ?>
                                <ul class="trending-category">
                                <span class="trending-title">
                                    <?= esc_html__('Từ Khóa','crismaster') ?>:
                                </span>
                                    <?php foreach ($post_tags as $tag) { ?>
                                        <li><a class="box-link" href="<?= $tag->link ?>"><?= $tag->name ?></a></li>
                                    <?php } ?>
                                </ul>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>