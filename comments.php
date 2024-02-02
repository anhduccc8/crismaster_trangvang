<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>
<h3 class="box-info-title tab-title tab-review active"><?= esc_html__('Nhận xét','crismaster') ?> </h3>
<h3 class="box-info-title tab-title tab-write-review"><?= esc_html__('Viết Đánh Giá','crismaster') ?></h3>
<div class="box-info-review active">
    <?php
    if ( have_comments() ) :
        wp_list_comments( array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 64,
            'callback'    => 'custom_comment_output', // Sử dụng hàm custom_comment_output để hiển thị mỗi comment
        ) );
    ?>
    <div class="commentPaginate">
        <?php paginate_comments_links( array('prev_text' => '&laquo; PREV', 'next_text' => 'NEXT &raquo;') ); ?>
    </div>
    <?php
    endif;
	if (  comments_open() && get_comments_number() == '0' ) : ?>
    <div class="text-center">
        <span class="text-center min-h200px"><?= esc_html__('Chưa có nhận xét nào hoặc ý kiến của bạn đang được xét duyệt!','crismaster') ?></span>
    </div>
	    <?php
    endif;

	?>
</div>
<div class="box-write-review">
    <?php 	comment_form(array('id_form' => 'commentform','class_form' => 'form-review')); ?>
</div>
