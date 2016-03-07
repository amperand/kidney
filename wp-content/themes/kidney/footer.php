	</div><!-- #main -->
  </div><!-- #wrap-->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<section class="row">
		<div class="columns medium-3">
			<a href="<?= site_url();?>"><img src="<?php bloginfo('stylesheet_directory');?>/img/alliance-for-paired-kidney-donation-ft-logo.png" alt="Alliance for Paired Kidney Donation"></a>
		</div>
		<div class="columns medium-9">
			<?php //wp_nav_menu( array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu')); ?>
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
            <div id="footer-sidebar" class="menu-footer-menu-container widget-area">
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                <div class="clearfix"></div>
            </div><!-- #footer-sidebar -->
            <?php endif; ?>
			<ul class="socials left">
                <li class="twitter"><a href="https://twitter.com/paireddonation" target="_blank"></a></li>
				<li class="facebook"><a href="https://www.facebook.com/paireddonation" target="_blank"></a></li>
				<li class="linkedin"><a href="https://www.linkedin.com/company/alliance-for-paired-kidney-donation" target="_blank"></a></li>
				<li class="youtube"><a href="https://www.youtube.com/channel/UC9jgvQiW2e7Udq-q8c8zHbg/videos?sort=dd&view=0&shelf_id=0" target="_blank"></a></li>
				<li class="contact"><a href="<?= site_url();?>/contact-us"></a></li>
			</ul>
		</div>
</footer><!-- #colophon -->


	<?php wp_footer(); ?>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56be0b92a4395498" async="async"></script>

	
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/foundation-8-fix/rem.js"></script>
 	 <![endif]-->
</body>
</html>