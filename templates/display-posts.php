<?php
/**
 * Display Posts  Template.
 *
 * @package display-posts-slider/templates
 *
 * @version 1.0.0
 * @since 1.0.0
 */

?>
<li>
<article class='dps_post_template'>
	<img class='dps_post_thumbnail' src="<?php echo esc_html( get_the_post_thumbnail_url( $old_post, 'medium' ) ); ?>"/>
	<h2 class='dps_post_title'><?php echo esc_html( $old_post->post_title ); ?></h2>
	<p class='dps_post_content'><?php echo esc_html( $old_post->post_excerpt ); ?></p>
	<a class='dps_post_url' href="<?php echo esc_html( get_permalink( $old_post->ID ) ); ?>" title="Read More">Read More</a>
</article>
</li>
