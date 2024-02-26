<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Doanh nghiệp mới đăng ký','crismaster'),
        'base' => 'p1_doanh_nghiep_moi_dang_ky',
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
                'heading' => esc_html__('ID các doanh nghiêp muốn hiển thị','crismaster'),
                'param_name' => 'ids',
                'value' => '',
                'description' => esc_html__('Ngăn cách nhau bởi dấu ","',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_doanh_nghiep_moi_dang_ky','p1_doanh_nghiep_moi_dang_ky_func');
function p1_doanh_nghiep_moi_dang_ky_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
        'ids' => '',
    ),$atts));
    ob_start();
    $ids_arr = explode(',', $ids);
    $args = array(
        'post_type' => 'enterprise',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'post__in' => $ids_arr,
    );
    ?>
    <section class="section-registration">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section">
                        <span class="text-behind style-03">REGISTRATION</span>
                        <h2 class="item-section-title style-02 mt-a50px"><?= esc_attr($title) ?> <span class="text-highlight"><?= esc_attr($title2) ?></span></h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="wrap-list box">
                        <ul class="wrap-list-registration">
                        <?php
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $date_register = get_post_meta(get_the_ID(), '_cmb_date_register', true);
                                $mst = get_post_meta(get_the_ID(), '_cmb_mst', true);
                                $title_post = get_the_title();
                                $title_post = mb_strlen($title_post, 'UTF-8') > 50 ? mb_substr($title_post, 0, 50, 'UTF-8') . '...' : $title_post
                                 ?>
                                <li class="item">
                                    <a class="item-info-company">
                                        <?php if ($mst != ''){ ?>
                                            <span class="item-company-code">-> <?= esc_attr($mst) ?></span>
                                        <?php }else{ ?>
                                            <span class="item-company-code">-> MST1234566</span>
                                        <?php } ?>
                                        <span class="item-company-name">-<?= esc_attr($title_post) ?></span>
                                    </a>
                                    <span class="item-wrap-time">
                                        <?php if ($date_register != ""){ ?>
                                            <span class="item-date"><?= date('d/m/Y', $date_register) ?></span>
                                            <span class="item-time"><?= date('H:i', $date_register) ?></span>
                                        <?php }else{ ?>
                                            <span class="item-date"><?= date('d/m/Y') ?></span>
                                            <span class="item-time"><?= date('H:i') ?></span>
                                        <?php } ?>
                                    </span>
                                </li>
                            <?php }
                            wp_reset_postdata();
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
?>