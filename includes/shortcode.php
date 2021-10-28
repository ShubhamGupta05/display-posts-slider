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
			'author_name'          => 'shubham',
			'post__not_in'         => 'post id',
			'post_status'          => 'publish',
			'order'                => 'DESC',
			'orderby'              => 'rand',
			'date_query_after'     => 'September 1st, 2021',
			'date_query_before'    => 'September 30th, 2021',
			'date_query_inclusive' => 'true',
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
			$this->$method( $value );
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
	public function check_post_type( $post_type ) {
		$postvalue = (string) $post_type;
		if ( $postvalue ) {
			$register_post = get_post_types();
			if ( in_array( $postvalue, $register_post ) ) {
				return $postvalue;
			} else {
				print_r( $postvalue . ' is not a valid post type' );
			}
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_date_query_after( $date_after ) {
		$dateafter = validateDate( $date_after, $format = 'm-d-y' );
		if ( $dateafter ) {
			return $date_after;
		} else {
			print_r( $date_after . ' is not a valid date ' );
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_date_query_before( $date_before ) {
		$datebefore = validateDate( $date_before, $format = 'm-d-y' );
		if ( $datebefore ) {
			return $date_before;
		} else {
			print_r( $date_before . ' is not a valid date  we will display default posts ' );
		}
	}

	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_order( $check_order ) {
		$checkorder = (string) $check_order;
		$order_list = array( 'ASC', 'DESC' );
		if ( in_array( $checkorder, $order_list ) ) {
			return $checkorder;
		} else {
			print_r( $checkorder . ' is not a valid  order' );
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_orderby( $check_orderby ) {
		$checkorderby = (string) $check_orderby;
		$orderby_list = array( 'none', 'ID', 'author', 'title', 'date', 'modified', 'rand', 'comment_count', 'menu_order' );
		if ( in_array( $checkorderby, $orderby_list ) ) {
			return $checkorderby;
		} else {
			print_r( $check_orderby . ' is not a valid post orderby value ' );
		}
	}
	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_post_status( $post_status ) {
		$poststatus      = (string) $post_status;
		$poststatus_list = get_post_statuses();
		if ( in_array( $poststatus, $poststatus_list ) ) {
			return $poststatus;
		} else {
			print_r( $post_status . ' is not a valid post status ' );
		}
	}

	/**
	 * Fetches the oldest 5 posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function check_post_per_page( $posts_per_page ) {
		$postsperpage = (int) $posts_per_page;
		return $postsperpage;
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

