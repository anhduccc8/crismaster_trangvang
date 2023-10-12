<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Follow Chúng tôi','crismaster'),
        'base' => 'follow_chung_toi',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Email','crismaster'),
                'param_name' => 'email',
                'value' => '',
                'description' => esc_html__('Nhập vào email',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Số điện thoại','crismaster'),
                'param_name' => 'phone',
                'value' => '',
                'description' => esc_html__('Nhập vào số điện thoại',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Cửa hàng','crismaster'),
                'param_name' => 'shop',
                'value' => '',
                'description' => esc_html__('Nhập vào tên cửa hàng',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Fanpage','crismaster'),
                'param_name' => 'fanpage',
                'value' => '',
                'description' => esc_html__('Nhập vào link fanpage',"crismaster")
            ),
        )
    ));
}
add_shortcode('follow_chung_toi','follow_chung_toi_func');
function follow_chung_toi_func($atts,$content = null){
    extract(shortcode_atts(array(
        'email' => '',
        'phone' => '',
        'shop' => '',
        'fanpage' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="follow" >
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-3 col-sm-3 col-md-3 col-xs-6 ">
                    <div class=" " style=""><p><img class="lazyload" src="<?= get_template_directory_uri() ?>/assets/img/email.png"  alt="" width="64" height="46" /></p>
                        <p><?= $email ?></p>
                    </div>
                </div>
                <div class="home-position col-lg-3 col-sm-3 col-md-3 col-xs-6  ">
                    <div>
                        <p><img class="lazyload" src="<?= get_template_directory_uri() ?>/assets/img/phone2.png" alt="" width="64" height="64" /></p>
                        <p><span style="font-family: Arial; font-size: 13px; white-space: pre-wrap; background-color: #ffffff;"><?= $phone ?></span></p>
                    </div>
                </div>
                <div class="home-position col-lg-3 col-sm-3 col-md-3 col-xs-6  ">
                    <div class=" " style="">
                        <p><img class="lazyload" src="<?= get_template_directory_uri() ?>/assets/img/store.png"  alt="" width="62" height="64" /></p>
                        <p><?= $shop ?></p>
                    </div>
                </div>
                <div class="home-position col-lg-3 col-sm-3 col-md-3 col-xs-6  ">
                    <div class=" " style="">
                        <a href="<?= $fanpage ?>">
                            <p><img class="lazyload" src="<?= get_template_directory_uri() ?>/assets/img/fb.png"  alt="" width="64" height="64" /></p>
                            <p>Fanpage</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <?php
    return ob_get_clean();
}
?>