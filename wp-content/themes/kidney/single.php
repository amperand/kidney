<?php get_header(); ?>

	<div id="primary" class="content-area row">
		<?php if(is_singular('testimonial')) {
			echo '<div id="content" class="site-content columns medium-12" role="main">';
		} else {
			echo '<div id="content" class="site-content columns medium-8" role="main">';
		}
				// Start the Loop.
				while ( have_posts() ) : the_post();
					include('parts/content-single.php');
					include("parts/pagination.php");
				endwhile;
			?>
		</div><!-- #content -->
		<?php if(!is_singular('testimonial')) {
			get_sidebar( 'content' );
		} ?>
	</div><!-- #primary -->

<?php get_footer();
