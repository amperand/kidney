<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-8" role="main">
		<header class="entry-header">
			<h1 class="page-title"><?php single_cat_title(''); ?></h1>
		</header>
		<?php			
			$featuredImage = wp_get_attachment_image(get_field('featured_image', $news), 'featured');
			if($featuredImage) {
				echo $featuredImage;
			}
			$subtitle = get_field('sub_title', $news);
			if ($subtitle) {
				echo '<p class="subtitle">'.$subtitle.'</p>';
			}
			if ( have_posts() ) {
				while ( have_posts() ) : the_post();
					include('parts/content-excerpt.php');
				endwhile;
				include("parts/pagination.php");
			}
		?>

		</div><!-- #content -->
		<?php get_sidebar( 'content' ); ?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();