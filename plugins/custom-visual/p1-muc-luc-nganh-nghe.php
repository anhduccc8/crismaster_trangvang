<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Mục lục ngành nghề','crismaster'),
        'base' => 'p1_muc_luc_nganh_nghe',
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
                'type' => 'textfield',
                'heading' => esc_html__('Link xem thêm','crismaster'),
                'param_name' => 'link',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_muc_luc_nganh_nghe','p1_muc_luc_nganh_nghe_func');
function p1_muc_luc_nganh_nghe_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'link' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-widget-fields space-section">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section text-center heading-service">
                        <span class="text-behind">fields</span>
                        <h2 class="item-section-title mt-a60px"><span class="text-highlight"><?= esc_attr($title) ?></span> <?= esc_attr($title2) ?></h2>
                    </div>
                </div>
            </div>
            <div class="row wrap-grid-fields text-center">
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'profession_type',
                    'hide_empty' => false,
                ));
                $sorted_terms = array();
                if (!empty($terms) && !is_wp_error($terms)) {
                    $t = 1;
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        if ($term->term_id == '14' || $term->term_id == '81') {
                            $sorted_terms[] = $term;
                        } else {
                            if($t < 12){ ?>
                                <div class="col-6 col-md-3 col-lg-2 item">
                                    <a href="<?= esc_attr($term_link) ?>" class="wrap-item-box">
                                        <h5 class="item-text"><?= esc_attr($term->name) ?></h5>
                                    </a>
                                </div>
                                <?php $t++; }
                        }
                     }
                    if (!empty($terms)) {
                        foreach ($sorted_terms as $term) {
                            $term_link = get_term_link($term);
                            ?>
                            <div class="col-6 col-md-3 col-lg-2 item">
                                <a href="<?= esc_attr($term_link) ?>" class="wrap-item-box">
                                    <h5 class="item-text"><?= esc_attr($term->name) ?></h5>
                                </a>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <div class="row">
                <a class="btn-main btn-round style-02 btn-view-more" href="<?= esc_attr($link) ?>"><?= esc_html__('Xem Chi Tiết','crismaster') ?> <img src="<?= get_template_directory_uri() ?>/assets/image/double-icon.svg" alt="double icon"></a>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>