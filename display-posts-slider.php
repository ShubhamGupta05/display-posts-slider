<?php
/**
 * Main Plugin File
 *
 * @package display-posts-slider
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 * Plugin Name:       Display Posts Slider
 * Plugin URI:        https://lazlo.in/plugins/display-posts-slider/
 * Description:       Plugin to add custom shortcode to get the your posts in a beautiful slider.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shubham Gupta
 * Author URI:        https://lazlo.in/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://lazlo.in/my-plugin/
 * Text Domain:       display-posts-slider
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

/**
 * Plugin's file path
 *
 * @since 0.1.0
 */
define( 'DPS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Plugin's url path
 *
 * @since 0.1.0
 */
define( 'DPS_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * The current version
 *
 * @since 0.1.0
 */
define( 'DPS_VERSION', '1.0.0' );

/**
 * Includes the main functionality file.
 *
 * @since 1.0.0
 */
require_once DPS_PATH . 'includes/class-display-posts.php';
