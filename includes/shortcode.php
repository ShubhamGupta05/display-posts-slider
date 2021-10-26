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
			'posts_per_page'       => 5,
			'post_type'            => 'post',
			'name'                 => 'this is my first post',
			'author_name'          => 'shubham',
			'post__not_in'         => 'post id',
			'post_status'          => 'publish',
			'order'                => 'DESC',
			'orderby'              => 'rand',
			'date_query_after'     => 'September 1st, 2021',
			'date_query_before'    => 'September 30th, 2021',
			'date_query_inclusive' => 'true',
			'pagename'             => 'checkshortcode',
			's'                    => 'this',
			'category_name'        => 'mypost',
			'category__not_in'     => 'uncategorized id',
			'tag'                  => 'action',
			'tag__not_in'          => 'drama id',
			'comment_count'        => 1,
			'tax_query_taxonomy'   => 'movie_genre',
			'tax_query_field'      => 'moviegenre',
			'tax_query_terms'      => 'action',
			'meta_key'             => 'price',
			'meta_value_num'       => 100,
			'meta_compare'         => '<',
			'meta_value'           => 'if string value',
			'post_mime_type'       => 'image/gif',
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
	public function check_name( $attributes ) {
		if ( is_string( $attributes['name'] ) ) {
			return $attributes;
		} else {
			print_r( $attributes['name'] . ' is not a valid post name  we will display default posts ' );
			return $attributes;
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_date_query_after( $attributes ) {
		$date_test = validateDate( $attributes['date_query_after'], $format = 'm-d-y' );
		if ( $date_test ) {
			return $attributes;
		} else {
			print_r( $attributes['date_query_after'] . ' is not a valid date  we will display default posts ' );
			$attributes['date_query_after'] ='';
			return $attributes;
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_date_query_before( $attributes ) {
		$date_test1 = validateDate( $attributes['date_query_before'], $format = 'm-d-y' );
		if ( $date_test1 ) {
			return $attributes;
		} else {
			print_r( $attributes['date_query_before'] . ' is not a valid date  we will display default posts ' );
			$attributes['date_query_before'] ='';
			return $attributes;
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_pagename( $attributes ) {
		if ( is_string( $attributes['pagename'] ) ) {
			return $attributes;
		} else {
			print_r( $attributes['pagename'] . ' is not a valid page name' );
			return $attributes;
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_order( $attributes ) {
		if ( is_string( $attributes['order'] ) ) {
			return $attributes;
		} else {
			print_r( $attributes['order'] . ' is not a valid post order we will display posts in ascending order ' );
			$attributes['order'] = 'ASC';
			return $attributes;
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_orderby( $attributes ) {
		if ( is_string( $attributes['orderby'] ) ) {
			return $attributes;
		} else {
			print_r( $attributes['orderby'] . ' is not a valid post orderby value we will display posts in random order ' );
			$attributes['orderby'] = 'rand';
			return $attributes;
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_post_status( $attributes ) {
		if ( is_string( $attributes['post_status'] ) ) {
			return $attributes;
		} else {
			print_r( $attributes['post_status'] . ' is not a valid post status we will display published posts ' );
			$attributes['post_status'] = 'published';
			return $attributes;
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

