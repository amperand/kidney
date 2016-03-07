<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-12" role="main">


			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', '' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
						include('content-single.php');

					endwhile;

				?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer();
