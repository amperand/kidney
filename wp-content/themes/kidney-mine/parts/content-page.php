<header class="entry-header">
	<?php $titlePreamble = get_field('title-preamble');
	if($titlePreamble) {
		echo '<h2 class="title-preamble">'.$titlePreamble.'</h2>';
	} ?>
	<h1 class="page-title"><?php the_title();?></h1>
</header>
<?php $featuredImage = wp_get_attachment_image(get_field('featured_image'), 'featured');
if($featuredImage) {
	echo $featuredImage;
} 
$subtitle = get_field('sub_title');
if ($subtitle) {
	echo '<p class="subtitle">'.$subtitle.'</p>';
}
?>
<div class="entry-content">
	<?php the_content();
	if( have_rows('page_content') ):
	    while ( have_rows('page_content') ) : the_row();			
	        if( get_row_layout() == 'content' ):
	        	the_sub_field('content_text');
	        elseif(get_row_layout() == 'button'):
	        	$buttonLink = get_sub_field('button_link');
	        	$buttonText = get_sub_field('button_text');
	        	echo '<a class="button round" href="'.$buttonLink.'">'.$buttonText.'</a>';
	        elseif(get_row_layout() == 'team_members_block'):
	        	if(have_rows('team_members'))?>
					<section class="team-members">
						<?php 
						while(have_rows('team_members')): the_row();
							$picSrc = get_sub_field('pic');
							$pic = wp_get_attachment_image($picSrc, 'thumbnail');
							$name = get_sub_field('name');
							$lastname = get_sub_field('last_name');
							$title = get_sub_field('title');
							$email = get_sub_field('email');
							$bio = get_sub_field('bio');
							?><div class="columns small-12 member"><div class="columns small-3"><?php echo $pic;?><p><strong><?php echo $name;?>&nbsp;<?php echo $lastname;?></strong></br/><i><?php echo $title;?></i><br/><a class="email-member" href="mailto:<?php echo $email;?>" target="_blank">Email <?php echo $name;?></a></p></div><div class="columns small-9"><?php echo $bio;?></div></div>
						<?php endwhile;
					echo '</section>';
					
			elseif(get_row_layout() == 'striped_content'):
	        	if(have_rows('stripe'))?>
					<section class="stripes">
						<?php 
						while(have_rows('stripe')): the_row();
							$stripeStuff = get_sub_field('content');
							$title = get_sub_field('title');
							echo '<article class="line">';
							if($title) {
								echo '<h3>'.$title.'</h3>';
							}
							echo $stripeStuff.'</article>';	
						endwhile;
					echo '</section>';
					
					
	        elseif( get_row_layout() == 'accordion_block' ): 
				if(have_rows('accordion'))?>
					<ul class="accordion" data-accordion>
						<?php $i=0;
						while(have_rows('accordion')): the_row();
							$title = get_sub_field('accordion_title');
							$text = get_sub_field('accordion_text');
							echo '<li class="accordion-navigation"><a href="#accordion-'.$i.'">'.$title.'</a><div id="accordion-'.$i.'" class="content">'.$text.'</div></li>';
							$i++;
						endwhile;
					echo '</ul>';
	        endif;
	    endwhile;
	else :
	    // no layouts found
	endif;?>
</div><!-- .entry-content -->
