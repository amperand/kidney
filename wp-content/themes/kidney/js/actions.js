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
		        slideshow: false,
		        animationLoop: true,
		        start: function(slider){
		          jQuery('.slideshow').removeClass('loading');
		        },
		      }); 
		      jQuery('.testimonial-slider').flexslider({
			  	animation: "fade",
		        controlNav: false,
		        selector: '.slides > .slide-item',
		        //smoothHeight: true,
		        slideshow: false,
		        start: function(slider){
		          jQuery('.testimonial-slider').removeClass('loading');
		        },
		      });
		      jQuery('#interior-testimonial').flexslider({
			  	animation: "fade",
		        controlNav: false,
		        selector: '.slides > .slide-item',
		        //smoothHeight: true,
		        slideshow: false,
		        start: function(slider){
		          jQuery('#interior-testimonial').removeClass('loading');
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
		          jQuery('.stats').removeClass('loading');
		           jQuery(document).foundation('equalizer', 'reflow');
		        },
		      }); 
		 });
		jQuery(document).ready(function() {			

			jQuery('.custom-direction-nav a.flex-next').click(function(event){
				event.preventDefault();
				var transform;
				var results;
				var $coordinateX;
				var $coordinates;
				function getTransform() {
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
				
					console.log('Final results are '+$coordinateX);
					
				        if(!results) return [0, 0, 0];
					    if(results[1] == '3d') return results.slice(2,5);
					    results.push(0);
					    $coordinates = results.slice(5, 8);
					    console.log('Results '+results.slice(5,8));
				}
				var currentTranslation = getTransform(jQuery('#slider'));
				console.log('$coordinate X is '+$coordinateX);
				
				var changeTo;
			
				if($coordinateX == 0) {
				//if($valueX == 0) {
					changeTo = 3.3;
				} else {
					changeTo = absX*3.3;
				}
				console.log('change to '+changeTo);
				jQuery('#slider').css('transition-duration','0.6s');
				jQuery('#slider').css({transform:"translate3d(-"+changeTo+"%, 0px, 0px)"});

			});
			
			
			
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