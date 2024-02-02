<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( get_template_directory() . '/framework/cmb2/init.php' ) ) {
	require_once  get_template_directory() . '/framework/cmb2/init.php';
} elseif ( file_exists(  get_template_directory() . '/framework/includes/CMB2/init.php' ) ) {
	require_once  get_template_directory() . '/framework/includes/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'details_enterprise_metabox' );
function details_enterprise_metabox() {
	$prefix = '_cmb_';
    $args = array(
        'post_type'      => 'profession',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );
    $profession_options = array();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $profession_id = get_the_ID();
            $profession_name = get_the_title();
            $profession_name =mb_strlen($profession_name, 'UTF-8') > 30 ? mb_substr($profession_name, 0, 30, 'UTF-8') . '...' : $profession_name;
            $profession_options[ $profession_id ] = '('.$profession_id.')'.$profession_name;
        }
        wp_reset_postdata();
    }
    $args2 = array(
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );
    $query2 = new WP_Query( $args2 );
    $service_options = array();
    if ( $query2->have_posts() ) {
        while ( $query2->have_posts() ) {
            $query2->the_post();
            $service_id = get_the_ID();
            $service_name = get_the_title();
            $service_name = mb_strlen($service_name, 'UTF-8') > 30 ? mb_substr($service_name, 0, 30, 'UTF-8') . '...' : $service_name;
            $service_options[ $service_id ] = '('.$service_id.')'.$service_name;
        }
        wp_reset_postdata();
    }
    $theme_option = get_option('theme_option');
    $header_province = $theme_option['header_province'];
    $lines2 = explode("\n", trim($header_province));
    $header_province_arr = [];
    $province_options = [];
    foreach ($lines2 as $line2) {
        $header_province_arr[] = $line2;
    }
    if (!empty($header_province_arr)){
        foreach ($header_province_arr as $province){
            $province_arr = explode('|',$province);
            $province_options[$province_arr[0]] = $province_arr[1];
          }
    }
	new_cmb2_box( array(
        'id'           => $prefix . 'details_enterprise',
        'title'        => __( 'Chi tiết doanh nghiệp', 'cmb2' ),
        'object_types' => array( 'enterprise' ),
        'fields'       => array(

            array(
                'name'    => esc_html__( 'Chọn các ngành nghề', 'cmb2' ),
                'desc'    => '',
                'id'      => $prefix . 'profession',
                'type'    => 'multicheck',
                'options'    => $profession_options,
                'inline'  => true,
            ),
            array(
                'name'    => esc_html__( 'Chọn các sản phẩm/dịch vụ', 'cmb2' ),
                'desc'    => '',
                'id'      => $prefix . 'service',
                'type'    => 'multicheck',
                'options'    => $service_options,
                'inline'  => true,
            ),
            array(
                'name'    => esc_html__( 'Doanh nghiệp được tài trợ', 'cmb2' ),
                'desc'    => '',
                'id'      => $prefix . 'is_taitro',
                'type'    => 'select',
                'options' => array(
                        'on' => 'Được tài trợ',
                        'off' => 'Không được tài trợ',
                ),
                'default' => array(),
            ),
            array(
                'name' => esc_html__('Tên công tý đăng ký kinh doanh', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'name_dn',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Tên người đại diện', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'ng_daidien',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Địa chỉ', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'ng_diachi',
                'type' => 'text',
            ),
            array(
                'name'    => esc_html__( 'Chọn thành phố', 'cmb2' ),
                'desc'    => '',
                'id'      => $prefix . 'province',
                'type'    => 'select',
                'options' => $province_options,
                'attributes' => array(
                    'data-placeholder' => 'Chọn thành phố', // Tùy chọn placeholder cho Select2
                ),
                'default' => array(),
            ),
            array(
                'name' => esc_html__('Chọn ngày giờ đăng ký', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'date_register',
                'type' => 'text_datetime_timestamp',
            ),
            array(
                'name' => esc_html__('Mã số thuế công ty', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'mst',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Số điện thoại', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'phone_e',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Email', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'email_e',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Website', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'website_e',
                'type' => 'text',
            ),

            array(
                'name' => esc_html__('Loại hình công ty', 'cmb2'),
                'desc' => 'Nhà sản xuất',
                'id'   => $prefix . 'type_dn',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Thị trường chính', 'cmb2'),
                'desc' => 'Toàn quốc, Quốc tế',
                'id'   => $prefix . 'thitruong_dn',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Ngày cấp phép', 'cmb2'),
                'desc' => '',
                'id'   => $prefix . 'date_dn',
                'type' => 'text_date_timestamp',
            ),
            array(
                'name' => esc_html__( 'Ảnh giải thưởng và danh mục', 'crismaster' ),
                'desc' => esc_html__( 'Có thể upload nhiều file', 'crismaster' ),
                'id'   => $prefix . 'giaithuong',
                'type' => 'file_list',
            ),
            array(
                'name' => esc_html__('Ảnh quảng cáo phía dưới', 'cmb2'),
                'desc' => esc_html__('', 'cmb2'),
                'id'   => $prefix . 'quangcao2',
                'type' => 'file_list',
            ),
        ),
	) );
    add_action('admin_footer', 'cmb2_select2_script');
    function cmb2_select2_script() {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#_cmb_profession').select2({
                    placeholder: 'Chọn các ngành nghề',
                    allowClear: true,
                    multiple: true,
                });
                $('#_cmb_service').select2({
                    placeholder: 'Chọn các sản phẩm/dịch vụ',
                    allowClear: true,
                    multiple: true,
                });
            });
        </script>
        <?php
    }
}

add_action( 'cmb2_admin_init', 'add_post_summary_metabox' );

function add_post_summary_metabox() {
    $prefix = '_cmb_';
    new_cmb2_box( array(
        'id'           => $prefix . 'post_summary',
        'title'        => __( 'Tóm Tắt Bài Viết', 'cmb2' ),
        'object_types' => array( 'post' ),
        'fields'       => array(
            array(
                'name' => esc_html__( 'Tóm Tắt', 'cmb2' ),
                'desc' => '',
                'id'   => $prefix . 'post_summary',
                'type' => 'textarea',
            ),
        ),
    ) );
}

