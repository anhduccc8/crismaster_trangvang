<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Form Liên Hệ','crismaster'),
        'base' => 'p5_form_lien_he',
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
        )
    ));
}
add_shortcode('p5_form_lien_he','p5_form_lien_he_func');
function p5_form_lien_he_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title' => '',
        'title2' => '',
    ),$atts));
    ob_start();?>
    <section class="section-form-contact space-section">
        <div class="container-fluid-ct">
            <div class="row">
                <div class="col-12">
                    <div class="wrap-title-section">
                        <h2 class="item-section-title style-03"><span class="text-highlight"><?= esc_attr($title) ?> </span><?= esc_attr($title2) ?></h2>
                    </div>
                </div>
            </div>

            <div class="row form-contact mt-30">
                <div class="col-12">
                    <div class="form-box">
                        <?= do_shortcode('[contact-form-7 id="cf3bcc0" title="Form liên hệ 1"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $theme_option = get_option('theme_option');
    $footer_lat_log = $theme_option['footer_lat_log'];
    $footer_lat_log_arr = explode(',',$footer_lat_log);
    ?>
    <script>
        function initializeMap() {
            var myLatLng = { lat: <?= $footer_lat_log_arr[0] ?>, lng: <?= $footer_lat_log_arr[1] ?> };
            var map = new google.maps.Map(document.getElementById('link-map'), {
                center: myLatLng,
                zoom: 15
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Trang vang'
            });
            marker.addListener('click', function() {
                alert('Marker clicked!');
            });
        }
        document.addEventListener('DOMContentLoaded', initializeMap);
    </script>
    <?php
    return ob_get_clean();
}
?>