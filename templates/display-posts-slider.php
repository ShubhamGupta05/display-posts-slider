<?php
/**
 * Display Posts Slider Template.
 *
 * @package display-posts-slider/templates
 *
 * @version 1.0.0
 * @since 1.0.0
 */

?>
<div class="dps-container"> 
  <div class="slide-inner"> 
		<ul class="slide-area">
			<?php
			print_r( 'Hello World' );
			foreach ( $oldest_posts_query->posts as $old_post ) {
				print_r( 'hello posts' );
				/**
				 * Includes the template file.
				 *
				 * @since 1.0.0
				 */
				include DPS_PATH . 'templates/display-posts.php';
			}
			print_r( 'Hello World1' );
			?>
			
		</ul>
		<a class="prev" href="#">&larr;<a>
		<a class="next" href="#">&rarr;</a>
	  </div>
	  <div class="controller">
	<a class="auto" href="#">Auto</a> 
	<div class="indicate-area"> 
	  <a href="#">1</a>
	  <a href="#">2</a>
	  <a href="#">3</a>
	  <a href="#">4</a>
	  <a href="#">5</a>
	</div>
   </div>
</div>
