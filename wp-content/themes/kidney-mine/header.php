<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Lora:400,400italic|PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,400,400italic,300,300italic|Roboto+Condensed:300,300italic' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
		<!--[if lt IE 9]>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
		   <link href='<?php echo get_template_directory_uri();?>/css/my-ie8.css' rel='stylesheet' type='text/css'>
		<![endif]-->
<!--Google Analytics Tracking Code Starts -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69449189-1', 'auto');
  ga('send', 'pageview');

</script>
<!--Google Analytics Tracking Code Ends-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div id="wrap">
	<div id="tip-top" class="dark-blue-bg">
		<div class="row">
			<div class="columns large-12">
				<ul class="socials right">
                    <li class="twitter"><a href="https://twitter.com/paireddonation" target="_blank"></a></li>
					<li class="facebook"><a href="https://www.facebook.com/paireddonation" target="_blank"></a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/company/alliance-for-paired-kidney-donation" target="_blank"></a></li>
					<li class="contact"><a href="<?= site_url();?>/contact-us/"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="sky" itemscope itemtype="http://schema.org/Organization">
		<header id="masthead" class="site-header" role="banner">
			<section class="header-main row">
				<a itemprop="url" class="site-title medium-3 left show-for-large-up" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div id="icon-only" class="left"><img src="<?php bloginfo('stylesheet_directory');?>/img/icon.png" itemprop="logo" alt="Alliance for Paired Kidney Donation"></div><div id="full-name" class="left show-for-medium-up"><img src="<?php bloginfo('stylesheet_directory');?>/img/alliance-for-paired-kidney-donation.png" alt="Alliance for Paired Kidney Donation"></div></a>
				<a class="site-title-mobile medium-3 left hide-for-large-up left" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('stylesheet_directory');?>/img/alliance-for-paired-kidney-donation-mobile.png" alt="Alliance for Paired Kidney Donation"></a>
				<nav id="primary-navigation" class="site-navigation primary-navigation columns medium-9 hide-for-small-only hide-for-medium-only" role="navigation">
					<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', ''); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
					<ul class="socials right">
                        <li class="twitter"><a href="https://twitter.com/paireddonation" target="_blank"></a></li>
						<li class="facebook"><a href="https://www.facebook.com/paireddonation" target="_blank"></a></li>
						<li class="linkedin"><a href="" target="_blank"></a></li>
						<li class="contact"><a href="<?= site_url();?>/contact-us"></a></li>
					</ul>
				</nav>
				<ul class="socials show-for-medium-only right">
					<li class="facebook"><a href="https://www.facebook.com/paireddonation" target="_blank"></a></li>
					<li class="linkedin"><a href="" target="_blank"></a></li>
					<li class="contact"><a href="<?= site_url();?>/contact-us"></a></li>
				</ul>
				<button class="menu-toggle hide-for-large-up"><img src="<?php bloginfo('stylesheet_directory');?>/img/menu-toggle.png" alt="Menu Toggle"/></button>
			</section>
			<section class="row toggle-menu-area">
				<nav id="mobile-navigation" class="site-navigation mobile-navigation columns small-12 small-collapse hide-for-large-up" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' =>'main-menu', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'mobile-menu')); ?>
				</nav>
			</section>
		</header><!-- #masthead -->
	<?php if(!is_front_page()) { 
		echo '</div><!--end sky-->';
		echo '<div id="main" class="site-main">';
		echo '<div id="gradient"></div>';
	}?>
	
