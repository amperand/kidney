<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-12" role="main">


			<header class="entry-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', '' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

				<?php
					while ( have_posts() ) : the_post();
						include('parts/content-excerpt.php');
				endwhile;
				include("parts/pagination.php");?>

		</div><!-- #content -->
	</section><!-- #primary -->
</div>
<?php get_footer();
