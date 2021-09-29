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
	if ( is_string( $attributes['post_type'] ) ) {
		$register_post = get_post_types();
		if ( in_array( $attributes['post_type'], $register_post ) ) {
			print_r( $attributes['post_type'] );
		} else {
			print_r( $attributes['post_type'] . ' is not a valid post type we will display general post type ' );
			$attributes['post_type'] = 'post';
		}
	}

	if ( is_int( $attributes['posts_per_page'] ) ) {
		print_r( $attributes );
	} else {
		print_r( $attributes['posts_per_page'] . ' is not a valid number we will display default number of posts ' );
		$attributes['posts_per_page'] = 5;
		print_r( $attributes );
	}
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
	wp_enqueue_style(
		'cs_style',
		CS_URL . 'assets/css/style.css',
		array(),
		1,
		'all'
	);
}
