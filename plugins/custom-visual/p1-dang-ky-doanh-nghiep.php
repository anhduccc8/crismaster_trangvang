<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Banner đăng ký doanh nghiệp','crismaster'),
        'base' => 'p1_dang_ky_doanh_nghiep',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link liên hệ ngay','crismaster'),
                'param_name' => 'link',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link xem chi tiết','crismaster'),
                'param_name' => 'link2',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
        )
    ));
}
add_shortcode('p1_dang_ky_doanh_nghiep','p1_dang_ky_doanh_nghiep_func');
function p1_dang_ky_doanh_nghiep_func($atts,$content = null){
    extract(shortcode_atts(array(
        'link' => '',
        'link2' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section-registration-company">
        <div class="container-fluid-ct">
            <div class="row mlr-0">
                <div class="col-12 wrap-item registration-box">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 item-left">
                            <h2 class="item-section-title fs-27">
                                <?= esc_html__('Đăng ký','crismaster') ?> <span class="text-highlight"> <?= esc_html__('TRANG VÀNG DOANH NGHIỆP','crismaster') ?></span><br><span> <?= esc_html__('để tiếp cận khách hàng đang có nhu cầu mua','crismaster') ?></span>
                            </h2>
                        </div>
                        <div class="col-xl-4 col-lg-12 item-right column-btn">
                            <a class="btn-main btn-round mr-20 style-01" href="<?= esc_url($link) ?>"><?= esc_html__('Liên hệ ngay','crismaster') ?></a>
                            <a class="btn-main btn-round style-02" href="<?= esc_url($link2) ?>"><?= esc_html__('Xem Chi Tiết','crismaster') ?> <img src="<?= get_template_directory_uri() ?>/assets/image/double-icon.svg" alt="double icon"></a>
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
    <?php
    return ob_get_clean();
}
?>