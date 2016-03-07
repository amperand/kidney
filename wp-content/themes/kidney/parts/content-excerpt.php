<article id="post-<?php the_ID(); ?>" class="post-excerpt">
	<header class="excerpt-header"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><h4><?php the_title();?></h4></a></header>
	<div class="entry-content">
		<?php the_excerpt();?>
		<a class="read-more" href="<?php the_permalink();?>">Read More</a>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
