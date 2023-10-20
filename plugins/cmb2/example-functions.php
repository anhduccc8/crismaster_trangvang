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
add_action( 'cmb2_admin_init', 'single_post_metabox' );
function single_post_metabox() {
    $prefix = '_cmb_';

    $cmb_crismaster = new_cmb2_box( array(
        'id'            => $prefix . 'single_post',
        'title'         => __( 'Thêm thông tin cho tin tức', 'cmb2' ),
        'object_types'  => array( 'post'), // Post type
        'fields' => array(
            array(
                'name' => __( 'Ảnh đại diện bài viết', 'cmb' ),
                'desc' => __( 'Ảnh sẽ hiển thị trên đầu mỗi bài post (1920 x 720)', 'cmb2' ),
                'id'   => $prefix . 'single_image',
                'type' => 'file',
            ),
        ),
    ) );
}