<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Lolo
 * @since 1.0
 * @version 1.0
 */

/* translators: %s: Name of current post */
the_content(sprintf(
    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'lolo'),
    get_the_title()
));

?>
