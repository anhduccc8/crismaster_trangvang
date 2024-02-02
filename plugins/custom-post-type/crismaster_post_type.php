<?php

function custom_post_types()
{
    // Danh mục Bài viết: Doanh Nghiệp
    $labels_doanh_nghiep = array(
        'name' => _x('Doanh Nghiệp', 'Tên Danh mục bài viết', 'crismaster'),
        'singular_name' => _x('Doanh Nghiệp', 'Tên Danh mục bài viết', 'crismaster'),
        'menu_name' => _x('Doanh Nghiệp', 'Tên menu', 'crismaster'),
        'name_admin_bar' => _x('Doanh Nghiệp', 'Thêm mới trên thanh admin', 'crismaster'),
        'add_new' => _x('Thêm mới', 'Doanh Nghiệp', 'crismaster'),
        'add_new_item' => __('Thêm mới Doanh Nghiệp', 'crismaster'),
        'new_item' => __('Doanh Nghiệp mới', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Doanh Nghiệp', 'crismaster'),
        'view_item' => __('Xem Doanh Nghiệp', 'crismaster'),
        'all_items' => __('Tất cả Doanh Nghiệp', 'crismaster'),
        'search_items' => __('Tìm kiếm Doanh Nghiệp', 'crismaster'),
        'parent_item_colon' => __('Doanh Nghiệp cha:', 'crismaster'),
        'not_found' => __('Không tìm thấy Doanh Nghiệp.', 'crismaster'),
        'not_found_in_trash' => __('Không tìm thấy Doanh Nghiệp trong thùng rác.', 'crismaster'),
    );

    $args_doanh_nghiep = array(
        'labels' => $labels_doanh_nghiep,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'enterprise'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'taxonomies' => array('post_tag')
    );

    register_post_type('enterprise', $args_doanh_nghiep);

    // Taxonomy: Danh mục Doanh Nghiệp
    $labels_loai_doanh_nghiep = array(
        'name' => _x('Danh mục Doanh Nghiệp', 'Tên taxonomy', 'crismaster'),
        'singular_name' => _x('Danh mục Doanh Nghiệp', 'Tên taxonomy', 'crismaster'),
        'search_items' => __('Tìm kiếm Danh mục Doanh Nghiệp', 'crismaster'),
        'all_items' => __('Tất cả Danh mục Doanh Nghiệp', 'crismaster'),
        'parent_item' => __('Danh mục Doanh Nghiệp cha', 'crismaster'),
        'parent_item_colon' => __('Danh mục Doanh Nghiệp cha:', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Danh mục Doanh Nghiệp', 'crismaster'),
        'update_item' => __('Cập nhật Danh mục Doanh Nghiệp', 'crismaster'),
        'add_new_item' => __('Thêm mới Danh mục Doanh Nghiệp', 'crismaster'),
        'new_item_name' => __('Tên mới của Danh mục Doanh Nghiệp', 'crismaster'),
        'menu_name' => __('Danh mục Doanh Nghiệp', 'crismaster'),
    );

    $args_loai_doanh_nghiep = array(
        'hierarchical' => true,
        'labels' => $labels_loai_doanh_nghiep,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'enterprise_type'),
    );

    register_taxonomy('enterprise_type', array('enterprise'), $args_loai_doanh_nghiep);

    // Danh mục Bài viết: Nghề Nghiệp
    $labels_nghe_nghiep = array(
        'name' => _x('Nghề Nghiệp', 'Tên Danh mục bài viết', 'crismaster'),
        'singular_name' => _x('Nghề Nghiệp', 'Tên Danh mục bài viết', 'crismaster'),
        'menu_name' => _x('Nghề Nghiệp', 'Tên menu', 'crismaster'),
        'name_admin_bar' => _x('Nghề Nghiệp', 'Thêm mới trên thanh admin', 'crismaster'),
        'add_new' => _x('Thêm mới', 'Nghề Nghiệp', 'crismaster'),
        'add_new_item' => __('Thêm mới Nghề Nghiệp', 'crismaster'),
        'new_item' => __('Nghề Nghiệp mới', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Nghề Nghiệp', 'crismaster'),
        'view_item' => __('Xem Nghề Nghiệp', 'crismaster'),
        'all_items' => __('Tất cả Nghề Nghiệp', 'crismaster'),
        'search_items' => __('Tìm kiếm Nghề Nghiệp', 'crismaster'),
        'parent_item_colon' => __('Nghề Nghiệp cha:', 'crismaster'),
        'not_found' => __('Không tìm thấy Nghề Nghiệp.', 'crismaster'),
        'not_found_in_trash' => __('Không tìm thấy Nghề Nghiệp trong thùng rác.', 'crismaster'),
    );

    $args_nghe_nghiep = array(
        'labels' => $labels_nghe_nghiep,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'profession'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt','tags'),
        'taxonomies' => array('post_tag')
    );

    register_post_type('profession', $args_nghe_nghiep);

    // Taxonomy: Danh mục Nghề Nghiệp
    $labels_loai_nghe_nghiep = array(
        'name' => _x('Danh mục Nghề Nghiệp', 'Tên taxonomy', 'crismaster'),
        'singular_name' => _x('Danh mục Nghề Nghiệp', 'Tên taxonomy', 'crismaster'),
        'search_items' => __('Tìm kiếm Danh mục Nghề Nghiệp', 'crismaster'),
        'all_items' => __('Tất cả Danh mục Nghề Nghiệp', 'crismaster'),
        'parent_item' => __('Danh mục Nghề Nghiệp cha', 'crismaster'),
        'parent_item_colon' => __('Danh mục Nghề Nghiệp cha:', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Danh mục Nghề Nghiệp', 'crismaster'),
        'update_item' => __('Cập nhật Danh mục Nghề Nghiệp', 'crismaster'),
        'add_new_item' => __('Thêm mới Danh mục Nghề Nghiệp', 'crismaster'),
        'new_item_name' => __('Tên mới của Danh mục Nghề Nghiệp', 'crismaster'),
        'menu_name' => __('Danh mục Nghề Nghiệp', 'crismaster'),
    );

    $args_loai_nghe_nghiep = array(
        'hierarchical' => true,
        'labels' => $labels_loai_nghe_nghiep,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'profession_type'),
    );

    register_taxonomy('profession_type', array('profession'), $args_loai_nghe_nghiep);

    // Danh mục Bài viết: Dịch Vụ
    $labels_dich_vu = array(
        'name' => _x('Dịch Vụ', 'Tên Danh mục bài viết', 'crismaster'),
        'singular_name' => _x('Dịch Vụ', 'Tên Danh mục bài viết', 'crismaster'),
        'menu_name' => _x('Dịch Vụ', 'Tên menu', 'crismaster'),
        'name_admin_bar' => _x('Dịch Vụ', 'Thêm mới trên thanh admin', 'crismaster'),
        'add_new' => _x('Thêm mới', 'Dịch Vụ', 'crismaster'),
        'add_new_item' => __('Thêm mới Dịch Vụ', 'crismaster'),
        'new_item' => __('Dịch Vụ mới', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Dịch Vụ', 'crismaster'),
        'view_item' => __('Xem Dịch Vụ', 'crismaster'),
        'all_items' => __('Tất cả Dịch Vụ', 'crismaster'),
        'search_items' => __('Tìm kiếm Dịch Vụ', 'crismaster'),
        'parent_item_colon' => __('Dịch Vụ cha:', 'crismaster'),
        'not_found' => __('Không tìm thấy Dịch Vụ.', 'crismaster'),
        'not_found_in_trash' => __('Không tìm thấy Dịch Vụ trong thùng rác.', 'crismaster'),
    );

    $args_dich_vu = array(
        'labels' => $labels_dich_vu,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('service', $args_dich_vu);

    // Taxonomy: Danh mục Dịch Vụ
    $labels_loai_dich_vu = array(
        'name' => _x('Danh mục Dịch Vụ', 'Tên taxonomy', 'crismaster'),
        'singular_name' => _x('Danh mục Dịch Vụ', 'Tên taxonomy', 'crismaster'),
        'search_items' => __('Tìm kiếm Danh mục Dịch Vụ', 'crismaster'),
        'all_items' => __('Tất cả Danh mục Dịch Vụ', 'crismaster'),
        'parent_item' => __('Danh mục Dịch Vụ cha', 'crismaster'),
        'parent_item_colon' => __('Danh mục Dịch Vụ cha:', 'crismaster'),
        'edit_item' => __('Chỉnh sửa Danh mục Dịch Vụ', 'crismaster'),
        'update_item' => __('Cập nhật Danh mục Dịch Vụ', 'crismaster'),
        'add_new_item' => __('Thêm mới Danh mục Dịch Vụ', 'crismaster'),
        'new_item_name' => __('Tên mới của Danh mục Dịch Vụ', 'crismaster'),
        'menu_name' => __('Danh mục Dịch Vụ', 'crismaster'),
    );

    $args_loai_dich_vu = array(
        'hierarchical' => true,
        'labels' => $labels_loai_dich_vu,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service_type'),
    );
    register_taxonomy('service_type', array('service'), $args_loai_dich_vu);
}
add_action( 'init', 'custom_post_types' );
