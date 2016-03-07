<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform row collapse" data-equalizer>
	<div class="columns small-9">
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search' ); ?>" data-equalizer-watch/>
	</div>
	<div class="columns small-3">
		<input type="submit" name="submitsearch" value="" data-equalizer-watch/>
	</div>
</form>
