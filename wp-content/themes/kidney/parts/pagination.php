<?php if(is_single()) { ?>
	
<section class="row">
	<div class="pagination large-12">
 
<?php $prev_post = get_previous_post();
if (!empty( $prev_post )): ?>
  <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="small-4 columns left">&larr;</a>
<?php endif; 

$next_post = get_next_post();
	if (empty( $prev_post )) {
		if (is_singular('post')) { ?>
			<a href="<?= site_url();?>/news" class="small-4 columns left back">All News</a>
		<?php }
		elseif(is_singular('testimonial')) { ?><a href="<?= site_url();?>/testimonial" class="small-4 columns left back">All Testimonials</a><?php }
	} elseif (empty( $next_post )) {
		if (is_singular('post')) { ?>
			<a href="<?= site_url();?>/news" class="small-4 columns text-right right back">All News</a>
		<?php }
		elseif(is_singular('testimonial')) {?> <a href="<?= site_url();?>/testimonial" class="small-4 columns text-right right back">All Testimonials</a><?php }
	} else {
		if (is_singular('post')) { ?>
			<a href="<?= site_url();?>/news" class="small-4 columns text-center left back">All News</a>
		<?php }
		elseif(is_singular('testimonial')) {?><a href="<?= site_url();?>/testimonial" class="small-4 columns text-center left back">All Testimonials</a> <?php }
		
	}
	
	
		if (!empty( $next_post )): ?>
		 	<a href="<?php echo get_permalink($next_post->ID); ?>" class="next small-4 columns right text-right">&rarr;</a>
		 <?php endif; ?>
	</div>
</section>
	
	
	
	
	
	
	
<?php } else { 
	
	function my_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; '),
		'next_text' => __( ' &rarr;'),
	) );

	if ( $links ) :

	?>
	
	
	<section>
		<div class="pagination page-nums">
			<?php echo $links; ?>
		</div>
	</section>
<?php
	endif;
}


 my_paging_nav();
	
} ?>