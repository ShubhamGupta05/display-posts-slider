<?php
/**
 * Shortcode Plugin File
 *
 * @package display-posts-slider
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
	 * Error variable error that will contain all the errors while validating the parameters.
	 *
	 * @since 1.0.0
	 * @var $error
	 */
	private $errors = array();
	/**
	 * Initial function that will add action and shortcode to the code.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		// adds the custom shortcode.
		add_shortcode( 'display-posts-slider', array( $this, 'get_posts' ) );

		// adds the custom stylesheet.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_custom' ) );
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
			'post_status'          => 'publish',
			'order'                => 'DESC',
			'orderby'              => '',
			'date_query_after'     => '',
			'date_query_before'    => '',
			'date_query_inclusive' => '',
			's'                    => '',
			'category_name'        => '',
			'category__not_in'     => '',
			'tag'                  => '',
			'tag__not_in'          => '',
		);
		// declaring $args variable and assigning the values to the properties.
		$attributes = shortcode_atts( $default_attributes, $atts );
		print_r( $attributes );
		foreach ( $attributes as $atts_key => $value ) {
			$method = "check_$atts_key";
			$this->$method( $value );
		}
		print_r( $attributes );
		$this->new_query( $attributes );
	}

	/**
	 * Validate the post_per_page parameter value passed by the user.
	 *
	 * @since 1.0.0
	 * @param array $posts_per_page attribute passed while calling this function.
	 */
	public function check_posts_per_page( $posts_per_page ) {
		$posts_per_page = (int) $posts_per_page;
		if ( ! empty( $posts_per_page ) ) {
			return $posts_per_page;
		}
		$this->errors[] = $posts_per_page . ' is not a valid value for posts per page parameter';

		return '';
	}

	/**
	 * Validate the post_type parameter value passed by the user.
	 *
	 * @since 1.0.0
	 *  @param string $post_type attribute passed while calling this function.
	 */
	public function check_post_type( $post_type ) {
		$post_type = (string) $post_type;

		if ( empty( $post_type ) ) {
			return '';
		}
		$register_post_types = get_post_types();
		if ( in_array( $post_type, $registered_post_types ) ) {
			return $post_type;
		}

		$this->errors[] = $post_type . ' is not a valid post type';

		return '';
	}

	/**
	 * Validates the value of the paramter $author_name.
	 *
	 * @since 1.0.0
	 * @param string $author_name passed while calling the function.
	 */
	public function check_author_name( $author_name ) {
		$author_name = (string) $author_name;
		if ( empty( $author_name ) ) {
			return '';
		}
		$author_name_list = get_users();
		foreach ( $author_name_list as $author ) {
			if ( $author->display_name == $author_name ) {
				return $author_name;
			}
		}
		$this->errors[] = $author_name . ' is not a valid author name';

		return '';
	}
	/**
	 * Validate the value of the post_status parameter.
	 *
	 * @since 1.0.0
	 * @param string $post_status attribute passed while calling shortcode.
	 */
	public function check_post_status( $post_status ) {
		$post_status = (string) $post_status;
		if ( empty( $post_status ) ) {
			return '';
		}
		$poststatus_list = get_post_statuses();
		if ( in_array( $post_status, $poststatus_list ) ) {
			return $post_status;
		}
		$this->errors[] = $post_status . ' is not a valid  post status';

		return '';
	}

	/**
	 * Validate the value of the order parameter.
	 *
	 * @since 1.0.0
	 * @param string $check_order attribute passed while calling shortcode.
	 */
	public function check_order( $check_order ) {
		$check_order = (string) $check_order;
		if ( empty( $check_order ) ) {
			return '';
		}
		$order_list = array( 'ASC', 'DESC' );
		if ( in_array( $check_order, $order_list ) ) {
			return $check_order;
		}
		$this->errors[] = $check_order . ' is not a valid  order';

		return '';
	}

	/**
	 * Validate the value of the check orderby parameter.
	 *
	 * @since 1.0.0
	 * @param string $check_orderby attribute passed while calling shortcode.
	 */
	public function check_orderby( $check_orderby ) {
		$check_orderby = (string) $check_orderby;
		if ( empty( $check_orderby ) ) {
			return '';
		}
		$orderby_list = array( 'none', 'ID', 'author', 'title', 'date', 'modified', 'rand', 'comment_count', 'menu_order' );
		if ( in_array( $check_orderby, $orderby_list ) ) {
			return $checkorderby;
		}
		$this->errors[] = $check_orderby . ' is not a valid  orderby type';

		return '';
	}

	/**
	 * Validate the value of date after parameter.
	 *
	 * @since 1.0.0
	 * @param date $date_after attribute passed while calling shortcode.
	 */
	public function check_date_query_after( $date_after ) {
		if ( empty( $date_after ) ) {
			return '';
		}
		if ( validateDate( $date_after, $format = 'm-d-y' ) ) {
			return $date_after;
		}
		$this->errors[] = $date_after . ' is not a valid date';

		return '';
	}
	/**
	 * Validate the value of date before parameter.
	 *
	 * @since 1.0.0
	 * @param date $date_before attribute passed while calling shortcode.
	 */
	public function check_date_query_before( $date_before ) {
		if ( empty( $date_before ) ) {
			return '';
		}
		if ( validateDate( $date_before, $format = 'm-d-y' ) ) {
			return $date_before;
		}
		$this->errors[] = $date_before . ' is not a valid date';

		return '';
	}

	/**
	 * Validate the value of date inclusive parameter.
	 *
	 * @since 1.0.0
	 * @param boolean $date_inclusive attribute passed while calling shortcode.
	 */
	public function check_date_query_inclusive( $date_inclusive ) {
		$date_inclusive = (bool) $date_inclusive;
		if ( empty( $date_inclusive ) ) {
			return '';
		}
		if ( $date_inclusive === 'true' ) {
			return $date_inclusive;
		}

		if ( $date_inclusive === 'false' ) {
			return $date_inclusive;
		}
		$this->errors[] = $date_inclusive . ' is not a valid boolean value';

		return '';
	}

	/**
	 * Validate the value entered by the user to search.
	 *
	 * @since 1.0.0
	 * @param string $search passed while calling the function.
	 */
	public function check_s( $search ) {
		$search = (string) $search;
		if ( empty( $search ) ) {
			return '';
		}
		return $search;
	}

	/**
	 * Validate the value of the category name parameter.
	 *
	 * @since 1.0.0
	 * @param string $category_name passed while calling the function.
	 */
	public function check_category_name( $category_name ) {
		$category_name = (string) $category_name;
		if ( empty( $category_name ) ) {
			return '';
		}
		$category_name_list = get_categories();
		foreach ( $category_name_list as $category ) {
			if ( $category_name == $category->name ) {
				return $category_name;
			}
		}
		$this->errors[] = $category_name . ' is not a valid category name';

		return '';
	}
	/**
	 * Validate the value passed in category not in parameter.
	 *
	 * @since 1.0.0
	 * @param string $category_not_in passed while calling the function.
	 */
	public function check_category__not_in( $category_not_in ) {
		$category_not_in = (string) $category_not_in;
		if ( empty( $category_not_in ) ) {
			return '';
		}
		$name        = explode( ',', $category_not_in );
		$category_id = array();
		foreach ( $name as $category ) {
			$categoryid = get_cat_ID( $category );
			if ( $categoryid == 0 ) {
				$this->errors[] = $category . ' is not a valid category name';
			}
			if ( $categoryid != 0 ) {
				$category_id[] = $categoryid;
			}
		}
		return category_id;
	}

	/**
	 * Validate the value passed to the tag parameter.
	 *
	 * @since 1.0.0
	 * @param string $tag passed while calling the function.
	 */
	public function check_tag( $tag ) {
		$tag = (string) $tag;
		if ( empty( $tag ) ) {
			return '';
		}
		$tag_name_list = get_tags();
		foreach ( $tag_name_list as $tags ) {
			if ( $tag == $tags->name ) {
				return $tag;
			}
		}
		$this->errors[] = $tag . ' is not a valid tag name';

		return '';
	}
	/**
	 * Validate the value of the tag not in parameter.
	 *
	 * @since 1.0.0
	 * @param string $tag_not_in passed while calling the function.
	 */
	public function check_tag__not_in( $tag_not_in ) {
		$tag_not_in = (string) $tag_not_in;
		if ( empty( $tag_not_in ) ) {
			return '';
		}
		$name   = explode( ',', $tag_not_in );
		$tag_id = array();
		foreach ( $name as $tag ) {
			$tagid = get_term_by( 'name', $tag, 'post_tag' );
			if ( empty( $tagid ) ) {
				$this->errors[] = $tag . ' is not a valid tag name';
			}
			if ( ! empty( $tagid ) ) {
				$tag_id[] = $tagid[0];
			}
		}
		return category_id;
	}

	/**
	 * Creates a new wp query and call the template to show the posts.
	 *
	 * @since 1.0.0
	 * @param array $attributes attribute passed while calling shortcode.
	 */
	public function new_query( $attributes ) {
		$oldest_posts_query = new WP_Query( $attributes );

		if ( ! empty( $this->errors ) ) {
			$this->display_errors();
		}

		// Loops to get post from $old_post.
		foreach ( $oldest_posts_query->posts as $old_post ) {
			/**
			 * Includes the template file.
			 *
			 * @since 1.0.0
			 */
			include DPS_PATH . 'templates/display-posts-slider.php';
		}
	}
	/**
	 * If there are any errors in the code, this function is used to display that errors.
	 *
	 * @since 1.0.0
	 */
	public function display_errors() {
		// Loops to get post from $old_post.

		foreach ( $this->errors as $error ) {
			include DPS_PATH . 'templates/error-message.php';
		}
	}
	/**
	 * Enqueue all the custom css and js scripts to the plugin.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_custom() {

		// passing parameters to  wp_register_style function.
		wp_enqueue_style(
			'style',
			DPS_URL . 'assets/css/style.css',
			array(),
			DPS_VERSION,
			'all'
		);
		wp_enqueue_script(
			'jdslider',
			DPS_URL . 'assets/js/jquery.jdSlider-latest.min.js',
			array( 'jquery' ),
			DPS_VERSION,
			'all'
		);
		wp_enqueue_script(
			'dps',
			DPS_URL . 'assets/js/dps.js',
			array( 'jdslider' ),
			DPS_VERSION,
			'all'
		);
	}
}

$shortcode = new Custom_Shortcode();
$shortcode->init();

