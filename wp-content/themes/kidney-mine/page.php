<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-8" role="main">
			
			<?php while ( have_posts() ) : the_post();
				include('parts/content-page.php');
			endwhile; ?>

		</div><!-- #content -->
		<?php get_sidebar('content');?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
