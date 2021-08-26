<?php
/**
 * Plugin Name:       Custom Shortcode
 * Plugin URI:        https://lazlo.in/plugins/Custom Shortcode/
 * Description:       Plugin to add custom shortcode to get the oldest five post.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shubham Gupta
 * Author URI:        https://lazlo.in/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-first-plugin
 * Domain Path:       /languages
 *
 * @package plugins
 */

add_shortcode( 'custom_shortcode', 'custom_shortcode_get_posts' );

/** Function to get 5 oldest post*/
function custom_shortcode_get_posts() {

	$args = array(
		'post_status'   => 'publish',
		'post_per_page' => 5,
		'orderby'       => 'post_date',
		'order'         => 'DESC',
	);

	$latest_post = new WP_Query( $args );

	print_r( $latest_post );

}
