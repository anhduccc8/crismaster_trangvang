<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Chính sách bán hàng','crismaster'),
        'base' => 'chinh_sach_ban_hang',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Sản phẩm chính hãng','crismaster'),
                'param_name' => 'san_pham_chinh_hang',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Bảo hành lâu dài','crismaster'),
                'param_name' => 'baohanhlaudai',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Cam kết đúng giá','crismaster'),
                'param_name' => 'camketdunggia',
                'value' => '',
                'description' => esc_html__('',"crismaster")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link yotube','crismaster'),
                'param_name' => 'link_youtube',
                'value' => '',
                'description' => esc_html__('https://www.youtube.com/watch?v=HkXGvnFMhTs&ab_channel=K%E1%BB%B3AK',"crismaster")
            ),
        )
    ));
}
add_shortcode('chinh_sach_ban_hang','chinh_sach_ban_hang_func');
function chinh_sach_ban_hang_func($atts,$content = null){
    extract(shortcode_atts(array(
        'san_pham_chinh_hang' => '',
        'baohanhlaudai' => '',
        'camketdunggia' => '',
        'link_youtube' => '',
    ),$atts));
    ob_start();
    $mobile = wp_is_mobile();
    ?>
    <div class="chinh_sach_ban_hang">
        <div class="container">
            <div class="home-row row">
                <div class="home-position col-lg-6 col-sm-6 col-md-6 col-xs-12  ">
                    <div class="title_block " style=""><h4>CHÍNH SÁCH BÁN HÀNG</h4></div>
                    <h2 class="title_block panel-heading">
                        <span>Sản phẩm chính hãng</span>
                    </h2>
                    <div class="chinh_hang">
                        <p><?php echo wp_specialchars_decode($san_pham_chinh_hang); ?></p>
                    </div>
                    <h2 class="title_block panel-heading">
                        <span>BẢO HÀNH LÂU DÀI</span>
                    </h2>
                    <div class="bao_hanh">
                        <p><?= wp_specialchars_decode($baohanhlaudai) ?></p>
                    </div>
                    <h2 class="title_block panel-heading">
                        <span>CAM KẾT ĐÚNG GIÁ</span>
                    </h2>
                    <div class="dung_gia">
                        <p><?= wp_specialchars_decode($camketdunggia) ?></p>
                    </div>
                </div>
                <div class="home-position col-lg-6 col-sm-6 col-md-6 col-xs-12  ">
                    <div><p>
                            <iframe width="560" height="315" src="<?= getYoutubeEmbedUrl($link_youtube) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>
                        </p>
                    </div>
                </div>
            </div>
        </div>	</div>
    <?php
    return ob_get_clean();
}
function getYoutubeEmbedUrl($url)
{
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}
?>