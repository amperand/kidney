<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-8" role="main">

			<header class="entry-header">
				<h1 class="page-title"><?php _e('Not Found', ''); ?></h1>
			</header>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below can help.', '' ); ?></p>

				<ul>
						<li><a href="http://paireddonation.org/">Home</a></li>
						<li><a href="http://paireddonation.org/sitemap/">Sitemap</a></li>
					</ul><br />					

				<?php get_search_form(); ?>
		</div><!-- #content -->
		<?php get_sidebar('content');?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();