<?php
/**
 * Custom Shortcode Template.
 *
 * @package custom-shortcode/templates
 *
 * @version 1.0.0
 * @since 1.0.0
 */

?>
<article>
	<h2><?php echo esc_html( $old_post->post_title ); ?></h2>
	<p><?php echo esc_html( $old_post->post_excerpt ); ?></p>
	<img src=" <?php echo get_the_post_thumbnail( $old_post, medium ); ?>" />
</article>
