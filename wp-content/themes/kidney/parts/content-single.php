<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_singular('post')) {
		echo '<div class="addthis_sharing_toolbox"></div><br/>';
	} ?>
	<header class="entry-header">
		<?php $titlePreamble = get_field('title-preamble');
		if($titlePreamble) {
			echo '<h2 class="title-preamble">'.$titlePreamble.'</h2>';
		} ?>
		<h1 class="page-title"><?php the_title();?></h1>
	</header>
	<?php		
	$postID = $post->ID;		
	$terms =get_the_terms($postID,'testimonial-category');
	if($terms) {
		echo '<div class="meta terms"><span class="small"><i>Tags: </i></span>';
		foreach ($terms as $term) {
			$termName = $term->name;
			$termLink = $term->slug;
			//print_r($term);
			?><a href="<?= site_url();?>/testimonial-category/<?php echo $termLink;?>"><?php echo $termName;?></a>
		<?php }
		echo '</div>';
	}
	
	if(is_singular('post')) {
		$featuredImage = wp_get_attachment_image(get_field('featured_image'), 'featured');
		if($featuredImage) {
			echo $featuredImage;
		}
	} elseif (is_singular('testimonial')) {
		echo '<section class="flexslider testimonial-slider row small-collapse interior widget" id="interior-testimonial"><div class="slides">';		
				$ti = get_the_title();
				$perma = get_the_permalink();
				$donorDesc = get_field('donor_description');
				$quote = get_field('quote');
                $quote = kidney_string_limit_words($quote,200);
				$imageSrc = get_field('featured_image');
				$image = wp_get_attachment_image($imageSrc,'thumbnail');
				echo '<div class="columns medium-12 slide-item "><div class="columns small-5"><a href="'.$perma.'">'.$image.'</a></div><div class="columns small-7"><br/><br/>'.$quote.'<h4>'.$ti.'</h4><p class="byline">'.$donorDesc.'</p></div></div>';		
		echo '</div></section>';
	}  else {
		$featuredImage = wp_get_attachment_image(get_field('featured_image'), 'thumbnail');
		if($featuredImage) {
			echo $featuredImage;
		}
	}
	$subtitle = get_field('sub_title');
	if ($subtitle) {
		echo '<p class="subtitle">'.$subtitle.'</p>';
	}?>
	<div class="entry-content">
		<?php the_content();

			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->