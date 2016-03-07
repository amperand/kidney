<article id="post-<?php the_ID(); ?>" class="post-excerpt">
	<?php echo '<section class="flexslider testimonial-slider row small-collapse interior widget" id="interior-testimonial"><div class="slides">';		
				$ti = get_the_title();
				$perma = get_the_permalink();
				$donorDesc = get_field('donor_description');
				$quote = get_field('quote');
				$imageSrc = get_field('featured_image');
				$image = wp_get_attachment_image($imageSrc,'thumbnail');
				echo '<div class="columns medium-12 slide-item "><div class="columns small-5"><a href="'.$perma.'">'.$image.'</a></div><div class="columns small-7"><br/><br/>'.$quote.'<h4><a href="'.$perma.'">'.$ti.'</a></h4><p class="byline">'.$donorDesc.'</p></div></div>';		
		echo '</div></section>';?>
</article><!-- #post-## -->
