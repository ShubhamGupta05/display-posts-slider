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

/**
 * Class containing mupltiple methods..
 *
 * @since 1.0.0
 */
class Custom_Shortcode {
	/**
	 * Initial function that will add action and shortcode to the code.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		// adds the custom shortcode.
		add_shortcode( 'custom_shortcode', array( $this, 'get_posts' ) );

		// adds the custom stylesheet.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_style' ) );
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $atts attribute passed while calling shortcode.
	 */
	public function get_posts( $atts ) {

		$default_attributes = array(
			'posts_per_page' => 5,
			'post_type'      => 'post',
			'category_name'  => 'mypost',
			'author_name'    => 'shubham',
		);
		// declaring $args variable and assigning the values to the properties.
		$attributes = shortcode_atts( $default_attributes, $atts );
		foreach ( $attributes as $atts_key => $value ) {
			$method = 'check_$atts_key';
			$this->$method( $attributes );
		}
		print_r( $attributes );
		$this->new_query( $attributes );
	}

	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_post_type( $attributes ) {
		if ( is_string( $attributes['post_type'] ) ) {
			$register_post = get_post_types();
			if ( in_array( $attributes['post_type'], $register_post ) ) {
				return $attributes;
			} else {
				print_r( $attributes['post_type'] . ' is not a valid post type we will display general post type ' );
				$attributes['post_type'] = 'post';
				return $attributes;
			}
		}
	}

	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_post_per_page( $attributes ) {
		if ( is_numeric( $attributes['posts_per_page'] ) ) {
			return $attributes;
		} else {
			print_r( $attributes['posts_per_page'] . ' is not a valid number we will display default number of posts ' );
			$attributes['posts_per_page'] = 5;
			return $attributes;
		}
	}

	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function new_query( $attributes ) {
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
	public function enqueue_style() {

		// passing parameters to  wp_register_style function.
		wp_enqueue_style(
			'cs_style',
			CS_URL . 'assets/css/style.css',
			array(),
			CS_VERSION,
			'all'
		);
	}
}

$shortcode = new Custom_Shortcode();
$shortcode->init();

