<div class="widget-area columns medium-6 medium-offset-1" role="complementary">
<?php $sidebarRows = 'select_sidebar';
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
		if(have_rows($sidebarRows)) {
			while(have_rows($sidebarRows)): the_row();
				$sidebar = get_sub_field('multi_select_a_sidebar');
				if($sidebar != 'none'){
					dynamic_sidebar($sidebar);
				}
			endwhile;
		} else {
			dynamic_sidebar('news-articles');
		}
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
	} ?>
</div><!-- #content-sidebar -->