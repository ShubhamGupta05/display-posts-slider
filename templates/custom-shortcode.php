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
<<<<<<< HEAD
	<h2><?php echo esc_html( $old_post->post_title ); ?></h2>
	<p><?php echo esc_html( $old_post->post_excerpt ); ?></p>
	<img src="<?php echo get_the_post_thumbnail( $old_post, medium ); ?>" />
=======
  <h2><?php echo $old_post->post_title; ?></h2>
  <p><?php echo $old_post->post_excerpt; ?></p>
  <img><?php echo get_the_post_thumbnail( $old_post, medium ); ?></img>
>>>>>>> 1d34e9046cfb32b03c05ca675b1674ee68cd8b15
</article>
