<?php
/**
 * Custom Shortcode Template.
 *
 * @package custom-shortcode/templates
 *
 * @version 1.0.0
 * @since 1.0.0
 */

// enqueuing the stylesheet.
wp_enqueue_style( 'style' );

?>
<article>
	<h2><?php echo esc_html( $old_post->post_title ); ?></h2>
	<p><?php echo esc_html( $old_post->post_excerpt ); ?></p>
	<img src="<?php echo esc_html( get_the_post_thumbnail_url( $old_post, 'medium' ) ); ?>"/>
</article>
