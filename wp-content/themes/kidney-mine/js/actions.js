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
          jQuery('.slideshow').removeClass('loading');
          //jQuery('.flex-viewport #featured-content article').show();
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
          //jQuery('.flex-viewport #featured-content article').show();
        },
      });

      jQuery('.stats').flexslider({
	  	animation: "slide",
        controlNav: false,
        selector: '.slides > .slide-item',
        slideshow: false,
        animationLoop:false,
        //itemWidth: 210,
        //itemWidth:3.3%,
        directionNav: false,
        start: function(slider){
          jQuery('.stats').removeClass('loading');
           jQuery(document).foundation('equalizer', 'reflow');
        },
      });

 });
jQuery(document).ready(function() {			
	jQuery('iframe').wrap('<div class="iframe-contain"></div>');
	$statsSlides = new Array();
	jQuery('#slider .slide-item').each(function(){
		$statsSlides.push(jQuery(this));									   
	});
	$slidesLength = $statsSlides.length;
	$counter=0;
	$nextLimit = $slidesLength - 3;
	
	jQuery('.custom-direction-nav a.flex-next').click(function(event){
		event.preventDefault();
		if($nextLimit != $counter) {
			jQuery('#slider').animate({left:'-=33%'},600);	
			$counter++;
		} 
	});

	jQuery('.custom-direction-nav a.flex-prev').click(function(event){
		event.preventDefault();
		if($counter != 0) {
			jQuery('#slider').animate({left:'+=33%'},600);	
			$counter--;
		} 
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