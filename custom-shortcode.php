<?php
/**
 * Main Plugin File
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
 * Text Domain:       custom-shortcode
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

/**
 * Plugin's file path
 *
 * @since 0.1.0
 */
define( 'CS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Plugin's url path
 *
 * @since 0.1.0
 */
define( 'CS_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Includes the main functionality file.
 *
 * @since 1.0.0
 */
require_once CS_PATH . 'includes/shortcode.php';
