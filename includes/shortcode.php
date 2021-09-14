<?php
/**
 * Shortcode Plugin File
 *
 * @package custom-shortcode
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 * Plugin Name:       Custom Shortcode
 * Plugin URI:        https://lazlo.in/plugins/Custom-Shortcode/
 * Description:       Plugin to add custom shortcode to get the oldest five post.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shubham Gupta
 * Author URI:        https://lazlo.in/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://lazlo.in/my-plugin/
 * Text Domain:       custom-shortcode-plugin
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

// adds the custom shortcode.
add_shortcode( 'custom_shortcode', 'custom_shortcode_get_posts' );

// adds the custom stylesheet.
add_action( 'wp_enqueue_scripts', 'enqueue_style' );

/**
 * Fetches the oldest 5 posts.
 *
 * @since 1.0.0
 */
function custom_shortcode_get_posts() {

	// declaring $args variable and assigning the values to the properties.
	$args = array(
		'post_status'    => 'publish',
		'posts_per_page' => 5,
		'orderby'        => 'post_date',
		'order'          => 'DESC',
	);

	$oldest_posts_query = new WP_Query( $args );

	// shows an array of all the post.
	print_r( $oldest_posts_query->posts );

	// Loops to get post from $old_post.
	foreach ( $oldest_posts_query->posts as $old_post ) {
		/**
		 * Includes the template file.
		 *
		 * @since 1.0.0
		 */
		include 'templates/custom-shortcode.php';
	}
}


/**
 * Adds the custom css file name style.css.
 *
 * @since 1.0.0
 */
function enqueue_style() {

	// passing parameters to  wp_enqueue_style function.
	wp_enqueue_style(
		'style',
		CS_URL . '/assets/css/style.css',
		array(),
		1,
		'all'
	);
}
