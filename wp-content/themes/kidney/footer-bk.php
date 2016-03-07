	</div><!-- #main -->
  </div><!-- #wrap-->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<section class="row">
		<div class="columns medium-3">
			<a href="<?= site_url();?>"><img src="<?php bloginfo('stylesheet_directory');?>/img/alliance-for-paired-kidney-donation-ft-logo.png" alt="Alliance for Paired Kidney Donation"></a>
		</div>
		<div class="columns medium-9">
			<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu')); ?>
			<ul class="socials left">
				<li class="facebook"><a href="" target="_blank"></a></li>
				<li class="linkedin"><a href="" target="_blank"></a></li>
				<li class="contact"><a href="" target="_blank"></a></li>
			</ul>
		</div>
</footer><!-- #colophon -->


	<?php wp_footer(); ?>
	
	<script type="text/javascript">
		jQuery(document).foundation({
		  equalizer : {
		    equalize_on_stack: false,
		    act_on_hidden_el: false
		  }
		});
		jQuery(window).load(function($) {
			jQuery('.slideshow').flexslider({
			  	animation: "slide",
		        controlNav: false,
		       // selector: '#featured-content > .featured-block',
		        slideshow: false,
		        animationLoop: true,
		        start: function(slider){
		          jQuery('body').removeClass('loading');
		          //jQuery('.flex-viewport #featured-content article').show();
		        },
		      }); 
		      jQuery('#interior-testimonial').flexslider({
			  	animation: "fade",
		        controlNav: false,
		        selector: '.slides > .slide-item',
		        //smoothHeight: true,
		        slideshow: false,
		        start: function(slider){
		          jQuery('body').removeClass('loading');
		          //jQuery('.flex-viewport #featured-content article').show();
		        },
		      });
		      jQuery('.stats').flexslider({
			  	animation: "slide",
		        controlNav: false,
		        selector: '.slides > .slide-item',
		        slideshow: false,
		        animationLoop:false,
		        itemWidth: 210,
		        directionNav: false,
		        start: function(slider){
		          jQuery('body').removeClass('loading');
		           jQuery(document).foundation('equalizer', 'reflow');
		           //jQuery('.stats').append('<ul class="custom-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul>');
		          //jQuery('.stats').after('<ul class="custom-direction-nav"><li class="flex-nav-prev">Previous</li><li class="flex-nav-next">Next</li></ul>');
		          //jQuery('.flex-viewport #featured-content article').show();
		        },
		      }); 
		 });
		jQuery(document).ready(function() {			
/*
			jQuery('.custom-direction-nav a.flex-next').click(function(event){
				event.preventDefault();
				function $m(id){
				    return document.getElementById(id);
				}
				function getTransform(el) {
					var transform = window.getComputedStyle(el, null).getPropertyValue('-webkit-transform');
					var results = transform.match(/matrix(?:(3d)\(\d+(?:, \d+)*(?:, (\d+))(?:, (\d+))(?:, (\d+)), \d+\)|\(\d+(?:, \d+)*(?:, (\d+))(?:, (\d+))\))/)
				
				        if(!results) return [0, 0, 0];
					    if(results[1] == '3d') return results.slice(2,5);
					
					    results.push(0);
					    return results.slice(5, 8); // returns the [X,Y,Z,1] values
					}
					var translation = getTransform( $m('slider') );
					var translationX = translation[0];
					var absX = Math.abs(translationX);
					console.log('currently is '+absX);
					var changeTo;
					if(absX == 0) {
						changeTo = 3.3;
					} else {
						changeTo = absX*3.3;
					}
					console.log('change to '+changeTo);
					jQuery('#slider').css('transition-duration','0.6s');
					jQuery('#slider').css({transform:"translate3d(-"+changeTo+"%, 0px, 0px)"});
			});
*/
			jQuery('.custom-direction-nav a.flex-next').click(function(event){
				event.preventDefault();
				var transform;
				var results;
				var $coordinateX;
				var $coordinates;
				function getTransform() {
					//var transform = window.getComputedStyle(el, null).getPropertyValue('-webkit-transform');
					$transform = jQuery('#slider').css('-webkit-transform');
					
					
					
					
					var results = $transform.match(/matrix(?:(3d)\(\d+(?:, \d+)*(?:, (\d+))(?:, (\d+))(?:, (\d+)), \d+\)|\(\d+(?:, \d+)*(?:, (\d+))(?:, (\d+))\))/)
					
					if(!results) return [0, 0, 0];
					if(results[1] == '3d') return results.slice(2,5);
					
					results.push(0);
					$coordinates = results.slice(5, 8); // returns the [X,Y,Z,1] values
					
					console.log('NEW RESULTS '+$coordinates);
					console.log(typeof $coordinates);
					//$coordinates = $coordinates.split(',');
					$coordinateX = $coordinates[Object.keys($coordinates)[0]];
					console.log('NEW COORDINATES X is '+ $coordinateX );
					$coordinateX = $coordinates[0];
					console.log('after split '+$coordinateX);
					//results = results.split('(');
					//$coordinateX = results[1];
				
					console.log('Final results are '+$coordinateX);
					
				        if(!results) return [0, 0, 0];
					    if(results[1] == '3d') return results.slice(2,5);
					    results.push(0);
					    //return results.slice(5, 8);// returns the [X,Y,Z,1] values
					    $coordinates = results.slice(5, 8);
					    console.log('Results '+results.slice(5,8));
				}
				var currentTranslation = getTransform(jQuery('#slider'));
				console.log('$coordinate X is '+$coordinateX);
				//console.log(typeof $coordinates);
				

				//var translation = getTransform(jQuery('#slider') );
				var changeTo;
				if($valueX == 0) {
					changeTo = 3.3;
				} else {
					//move decimal two points to the left?
					changeTo = absX*3.3;
				}
				console.log('change to '+changeTo);
				jQuery('#slider').css('transition-duration','0.6s');
				jQuery('#slider').css({transform:"translate3d(-"+changeTo+"%, 0px, 0px)"});

			});
			
			
			
			
			
			//jQuery(el).css('-webkit-transform').match(/matrix(?:(3d)\(-{0,1}\d+(?:, -{0,1}\d+)*(?:, (-{0,1}\d+))(?:, (-{0,1}\d+))(?:, (-{0,1}\d+)), -{0,1}\d+\)|\(-{0,1}\d+(?:, -{0,1}\d+)*(?:, (-{0,1}\d+))(?:, (-{0,1}\d+))\))/)
			
			
			
			
			
			
			
			jQuery('#primary-navigation').hover(function(){
				jQuery(this).toggleClass('overflow');
			});
			function wrapMenu() {
				jQuery('#primary-menu li a').each(function() {
				   var html = jQuery(this).html();
				   var word = html .substr(0, html.indexOf(" "));
				   var rest = html .substr(html.indexOf(" "));
				   jQuery(this).html(rest).prepend(jQuery("<span/>").html(word).addClass("litera-heavy"));
				});
			};
			wrapMenu();
			jQuery('.menu-toggle').click(function(){
				jQuery('.mobile-navigation').toggleClass('active');
				//jQuery('body').toggleClass('sticking');
				//jQuery('#masthead').toggleClass('sticky');
				jQuery('#mobile-navigation .nav-menu').slideToggle();
			});

		});
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 40 ){  
			    jQuery('#masthead').addClass("sticky").removeClass('not-sticky');
			    jQuery('body').addClass('sticking');
			    jQuery('#masthead .hide-for-large-up .menu-main-container').slideUp('fast');
			  }
			  else{
			    jQuery('#masthead').removeClass("sticky").addClass('not-sticky');
			    jQuery('body').removeClass('sticking');
			    jQuery('#primary-navigation').addClass('overflow');
			  }
		});

	</script>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/foundation-8-fix/rem.js"></script>
 	 <![endif]-->
</body>
</html>