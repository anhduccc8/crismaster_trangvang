<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Chi tiết các cửa hàng','crismaster'),
        'base' => 'chi_tiet_cua_hang',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Thêm cửa hàng','crismaster'),
                'param_name' => 'details_ca',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Địa chỉ','crismaster'),
                        'param_name' => 'address',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Địa chỉ chi tiết','crismaster'),
                        'param_name' => 'address_2',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Số điện thoại','crismaster'),
                        'param_name' => 'phone',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Email','crismaster'),
                        'param_name' => 'emails',
                        'value' => '',
                        'description' => esc_html__('',"crismaster")
                    ),
                ),
                'description' => esc_html__('Các danh mục sẽ được hiển thị theo dạng slide',"crismaster")
            ),
        )
    ));
}
add_shortcode('chi_tiet_cua_hang','chi_tiet_cua_hang_func');
function chi_tiet_cua_hang_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_ca' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <section id="content" class="page-content page-stores">
    <?php if(isset($details_ca) && $details_ca != ''){
        $details_ca = vc_param_group_parse_atts($details_ca,'');
        $t = 1;
        foreach ($details_ca as $dca ) {
            ?>

        <article id="store-<?= $t ?>" class="store-item col-md-4 col-sm-3 col-xs-12">
            <div class="store-item-container">
                <div class="col-md-1 store-picture hidden-sm-down">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/1-stores_default.jpg" alt="<?= $dca['address'] ?>" title="<?= $dca['address'] ?>">
                </div>
                <div class="col-md-11 col-sm-11 col-xs-12 store-description">
                    <p class="h3 card-title"><?= $dca['address'] ?></p>
                    <a data-toggle="collapse" href="#about-<?= $t ?>" aria-expanded="false" aria-controls="about-<?= $t ?>">
                        Giới Thiệu và Thông Tin Liên Hệ <i class="material-icons">&#xE409;</i>
                    </a>
                </div>
            </div>
            <footer id="about-<?= $t ?>" class="collapse">
                <div class="store-item-footer divide-top">
                    <address><?= htmlspecialchars_decode($dca['address_2']) ?></address>
                    <ul class="card-block">
                        <li><i class="material-icons">&#xE0B0;</i><?= $dca['phone'] ?></li>
                        <li><i class="material-icons">&#xE0BE;</i><?= $dca['emails'] ?></li>
                    </ul>
                </div>
            </footer>
        </article>
        <?php $t++;  } } ?>

    </section>
<?php
    return ob_get_clean();
}
?>