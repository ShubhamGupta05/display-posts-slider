<?php
/**
 * Custom Shortcode template.
 *
 * This template is used to show the post.
 *
 * @author      Shubham
 * @package     templates
 * @version     1.0.0
 */

?>
<article>
<h2><?php echo $old_post->post_title; ?></h2>
<p><?php echo $old_post->post_excerpt; ?></p>
<img><?php echo get_the_post_thumbnail( $old_post, medium ); ?></img>
</article>
