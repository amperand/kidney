<?php /** Template Name: Home Page **/
get_header(); ?>

<?php if(have_rows('billboard')):
	echo '<section class="flexslider loading slideshow"><ul class="slides"  data-equalizer>';
		while(have_rows('billboard')):the_row();
//            $image = wp_get_attachment_image(get_sub_field('image'), 'billboard');
			$imagebg = wp_get_attachment_url( get_sub_field('image'));
			$title = get_sub_field('title');
			$titleTwo = get_sub_field('title_line_2');
			$link_text = get_sub_field('link_text');
			$link = get_sub_field('link');
			echo '<li class="flex-container" style="background-image: url('.$imagebg.');"><div class="row"><div class="columns large-12"><article class="billboard-text left" data-equalizer-watch><header class="entry-header"><h2>'.$title.'</h2>';
			if($titleTwo) {
				echo '<h2>'.$titleTwo.'</h2>';
			}
			echo '</header><a class="button round" href="'.$link.'">'.$link_text.'</a></article></div></div></li>';
		
		endwhile;
	echo '</ul></section>';
endif; ?>

<?php if(have_rows('stats')):
	echo '<section id="stats-area"><div class="row" style="position:relative;"><section class="flexslider loading stats row"><div class="slides" id="slider" data-equalizer>';

		while(have_rows('stats')):the_row();
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			echo '<div class="slide-item"><div data-equalizer-watch><h3>'.$title.'</h3><p>'.$text.'</p></div></div>';
		endwhile;
	echo '</div></section>'; ?>
	<ul class="custom-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul>
	<?php echo '</div></section>';
endif; 
?>
</div><!--end sky -->
<div id="main" class="site-main">
<section id="faces">
	<div class="row">
		<div class="columns large-12 triangles white-bg drop text-center">
			<div class="columns large-11 large-centered">
				<h1><?php the_field('faces_section_title');?></h1>
				<?php the_field('faces_section_text');?>
			</div>
		</div>
</section>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-5" role="main">
			<h2 class="triangles banner-title"><?php the_field('main_title');?></h2>
			<p class="callout"><?php the_field('main_sub_title_section');?></p>
			<?php the_field('main_text');?>
		</div><!-- #content -->
		<?php get_sidebar('front'); ?>
	</div><!-- #primary -->
</div><!-- #main-content -->
<section class="lightest-teal-bg">
	<?php get_sidebar('newsfeed');?>
</section>

<?php get_footer();
