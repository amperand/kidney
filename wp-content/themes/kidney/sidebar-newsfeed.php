<div class="widget-area row" role="complementary">
	<?php $wp_query = new WP_Query();
	$wp_query->query('post_type=post&showposts=3');
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
		echo '<div class="columns medium-4 small-12 widget">';
			include('parts/content-excerpt.php');
		echo '</div>';
	endwhile;
	?>
</div><!-- #content-sidebar -->
