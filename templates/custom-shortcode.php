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
// wp_enqueue_style( 'style' );.

?>
<article class='article1'>
	<img class='img1' src="<?php echo esc_html( get_the_post_thumbnail_url( $old_post, 'medium' ) ); ?>"/>
	<h2 class='heading'><?php echo esc_html( $old_post->post_title ); ?></h2>
	<p class='para1'><?php echo esc_html( $old_post->post_excerpt ); ?></p>
	<a class='a1' href="#" title="Read More">Read More</a>
</article>
