<?php
/**
 * Shortcode Plugin File
 *
 * @package custom-shortcode
 *
 * @since 1.0.0
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// adds the custom shortcode.
add_shortcode( 'custom_shortcode', 'cs_get_posts' );

// adds the custom stylesheet.
add_action( 'wp_enqueue_scripts', 'cs_enqueue_style' );

/**
 * Fetches the oldest 5 posts.
 *
 * @since 1.0.0
 * @param array $atts attribute passed while calling shortcode.
 */
function cs_get_posts( $atts ) {

	// declaring $args variable and assigning the values to the properties.
	$attributes = shortcode_atts(
		array(
			'posts_per_page' => 5,
			'post_type'      => 'post',
		),
		$atts
	);
	print_r( $atts );
	print_r( 'check the attribute now' );
	print_r( $attributes );

	$oldest_posts_query = new WP_Query( $attributes );

	// Loops to get post from $old_post.
	foreach ( $oldest_posts_query->posts as $old_post ) {
		/**
		 * Includes the template file.
		 *
		 * @since 1.0.0
		 */
		include CS_PATH . 'templates/custom-shortcode.php';
	}
}


/**
 * Adds the custom css file name style.css.
 *
 * @since 1.0.0
 */
function cs_enqueue_style() {

	// passing parameters to  wp_register_style function.
	wp_register_style(
		'style',
		CS_URL . 'assets/css/style.css',
		array(),
		1,
		'all'
	);
	wp_enqueue_style( 'style' );
}
