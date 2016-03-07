<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-8" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e('Not Found', ''); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

				<?php get_search_form(); ?>
		</div><!-- #content -->
		<?php get_sidebar('content');?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();