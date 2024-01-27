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
                            <h2 class="item-section-title">
                                <?= esc_html__('Đăng ký','crismaster') ?> <span class="text-highlight"> <?= esc_html__('TRANG VÀNG DOANH NGHIỆP','crismaster') ?></span> <span> <?= esc_html__('để tiếp cận khách hàng đang có nhu cầu mua','crismaster') ?></span>
                            </h2>
                        </div>
                        <div class="col-xl-4 col-lg-12 item-right column-btn">
                            <a class="btn-main btn-round mr-20 style-01" href="<?= esc_url($link1) ?>"><?= esc_html__('Liên hệ ngay','crismaster') ?></a>
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
                            <li><a class="box-link-table" href="#">A</a></li>
                            <li><a class="box-link-table" href="#">B</a></li>
                            <li><a class="box-link-table" href="#">C</a></li>
                            <li><a class="box-link-table" href="#">D</a></li>
                            <li><a class="box-link-table" href="#">E</a></li>
                            <li><a class="box-link-table" href="#">F</a></li>
                            <li><a class="box-link-table" href="#">G</a></li>
                            <li><a class="box-link-table" href="#">H</a></li>
                            <li><a class="box-link-table" href="#">I</a></li>
                            <li><a class="box-link-table" href="#">J</a></li>
                            <li><a class="box-link-table" href="#">K</a></li>
                            <li><a class="box-link-table" href="#">L</a></li>
                            <li><a class="box-link-table" href="#">M</a></li>
                            <li><a class="box-link-table" href="#">N</a></li>
                            <li><a class="box-link-table" href="#">O</a></li>
                            <li><a class="box-link-table" href="#">P</a></li>
                            <li><a class="box-link-table" href="#">Q</a></li>
                            <li><a class="box-link-table" href="#">R</a></li>
                            <li><a class="box-link-table" href="#">S</a></li>
                            <li><a class="box-link-table" href="#">T</a></li>
                            <li><a class="box-link-table" href="#">U</a></li>
                            <li><a class="box-link-table" href="#">V</a></li>
                            <li><a class="box-link-table" href="#">W</a></li>
                            <li><a class="box-link-table" href="#">X</a></li>
                            <li><a class="box-link-table" href="#">Y</a></li>
                            <li><a class="box-link-table" href="#">Z</a></li>
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