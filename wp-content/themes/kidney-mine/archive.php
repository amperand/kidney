<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-8" role="main">


			<header class="entry-header">
				<h1 class="page-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'twentyfourteen' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyfourteen' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyfourteen' ) ) );

						else :
							if(is_post_type_archive('testimonial')) {
								_e( 'Testimonials', 'twentyfourteen' );	
							} else {
								_e( 'Archives', 'twentyfourteen' );
							}
						endif;
					?>
				</h1>
			</header><!-- .page-header -->

			<?php if(is_post_type_archive('testimonial')) {
				while(have_posts()):the_post();
					include('parts/content-testimonial-excerpt.php');
				endwhile;
			} else {
					
				while ( have_posts() ) : the_post();
					include('parts/content-excerpt.php');
				endwhile;
			}
				include("parts/pagination.php");

			?>
		</div><!-- #content -->
		<?php get_sidebar('content');?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
