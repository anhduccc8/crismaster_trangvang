<?php
get_header('404');
?>
<main class="site-content-error">
    <div class="container-fluid">
        <div class="row-custom">
            <section class="section-error-page">
                <div class="container-fluid-ct">
                    <div class="row">
                        <div class="col-12">
                            <div class="wrap-title-section text-center">
                                <img class="item-image" src="<?= get_template_directory_uri() ?>/assets/image/img-404.png" alt="Image" style="max-width: 921px; width: 100%">
                                <h2 class="item-section-title mt-40"><?= esc_html__('NỘI DUNG BẠN TÌM','crismaster') ?> <span class="text-highlight"><?= esc_html__('KHÔNG CÒN TỒN TẠI','crismaster') ?></span></h2>
                                <div class="error-des">
                                    <?= esc_html__('Thật không may, địa chỉ URL bạn yêu cầu không được tìm thấy. Quay về trang trước hoặc trang chủ để tìm kiếm nội dung liên quan.','crismaster') ?>
                                </div>
                                <a class="btn-main btn-round btn-error mt-40" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="25" viewBox="0 0 32 25" fill="none">
                                        <path d="M14.9231 2L2 12.5L14.9231 23M3.79487 12.5L30 12.5" stroke="#003DA5" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <?= esc_html__('QUAY VỀ TRANG CHỦ','crismaster') ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
