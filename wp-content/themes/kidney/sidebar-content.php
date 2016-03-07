<div id="content-sidebar" class="content-sidebar widget-area columns medium-3  medium-offset-1" role="complementary">
	<?php $parent = $post->post_parent;
	if ($parent) {
		$mySibs = get_pages( array( 'child_of' => $parent, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );
	if($mySibs) { ?>
		<article class="widget relative-pages"><ul id="list-pages"><li class="parent"><a href="<?php echo get_permalink($parent);?>"><?php echo get_the_title($parent);?></a></li><?php
		foreach($mySibs as $page) {
			$perma = get_permalink($page->ID);
			$ti = get_the_title($page->ID);
			if($page->ID == $post->ID) {
				echo '<li class="current"><a href="'.$perma.'">'.$ti.'</a></li>';
			} else {
				echo '<li><a href="'.$perma.'">'.$ti.'</a></li>';
			}
		}
		echo '</ul></article>';
	}
	}
		
	
	$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );
		//$ti = get_title();
	if($mypages) { ?>
		<article class="widget relative-pages"><ul id="list-pages"><li class="parent current"><a href="#"><?php the_title();?></a></li><?php
		foreach($mypages as $page) {
			$perma = get_permalink($page->ID);
			$ti = get_the_title($page->ID);
			echo '<li><a href="'.$perma.'">'.$ti.'</a></li>';
		}
		echo '</ul></article>';
	}
	
	if(get_field('show_testimonials_in_sidebar') == 'Yes') {
		$showCatID = get_field('choose_category');
		$term = get_term($showCatID, 'testimonial-category');
		$showCat = $term->slug;
		echo '<section class="flexslider testimonial-slider row small-collapse interior widget" id="interior-testimonial"><div class="slides">';
			$args = array(
				'posts_per_page'   => 5,
				'testimonial-category' => $showCat,
				'orderby'          => 'rand',
				//'order'            => 'DESC',
				'post_type'        => 'testimonial',
				'post_status'      => 'publish'
			);
			$testimonials = get_posts( $args );
			
			foreach($testimonials as $post): setup_postdata($post);			
				$ti = get_the_title();
				$perma = get_the_permalink();
				$donorDesc = get_field('donor_description');
				$quote = get_field('quote');
                $quote = kidney_string_limit_words($quote,200);
				$imageSrc = get_field('featured_image');
				$image = wp_get_attachment_image($imageSrc,'thumbnail');
				echo '<div class="columns medium-12 slide-item "><div class="columns medium-12 small-5"><a href="'.$perma.'">'.$image.'</a></div><div class="columns medium-12 small-7"><a href="'.$perma.'">'.$quote.'<h4>'.$ti.'</h4></a><p class="byline">'.$donorDesc.'</p></div></div>';
			endforeach;
			wp_reset_postdata();
		
		
		echo '</div></section>';	
	}// show testimonial slider		
			
	$sidebarRows = 'select_sidebar';
	$page_for_posts = get_option( 'page_for_posts' );
	
	if(is_home()) {
		if(have_rows($sidebarRows, $page_for_posts)) {
			while(have_rows($sidebarRows,$page_for_posts)): the_row();
				$sidebar = get_sub_field('multi_select_a_sidebar');
				if($sidebar != 'none'){
					dynamic_sidebar($sidebar);
				}
			endwhile;
		} else {
			dynamic_sidebar('news-archive');
		}
	} elseif(is_singular('post')) {
		dynamic_sidebar('news-articles');
	} else {
		if(have_rows($sidebarRows)) {
			while(have_rows($sidebarRows)): the_row();
				$sidebar = get_sub_field('multi_select_a_sidebar');
				if($sidebar != 'none'){
					dynamic_sidebar($sidebar);
				}
			endwhile;
		} else {
			dynamic_sidebar('default-sidebar');
		}
	}
	
	 ?>
</div><!-- #content-sidebar -->
