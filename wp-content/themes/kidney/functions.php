<?php
	
function my_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/img/custom-login-logo.png) !important;width:203px;height:44px;background-size:203px 44px;padding-left:11px; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

// load scripts and styles
function wpb_adding_scripts() {	
	wp_register_script('foundation',get_stylesheet_directory_uri().'/js/foundation.min.js',array('jquery'));
	wp_register_script('equalizer',get_stylesheet_directory_uri().'/js/foundation/foundation.equalizer.js',array('jquery'));
	wp_register_script('flexslide', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
	//wp_register_script('modal',get_stylesheet_directory_uri().'/js/foundation/foundation.reveal.js', array('jquery'));
	wp_register_script('actions', get_stylesheet_directory_uri().'/js/actions.js', array('jquery'));
	
	wp_enqueue_script(array('foundation', 'flexslide', 'equalizer', 'actions'));
	//wp_enqueue_script('modal');
	
    wp_register_style('normalize',get_stylesheet_directory_uri().'/css/normalize.css');
    wp_register_style('foundation',get_stylesheet_directory_uri().'/css/foundation.min.css');
    wp_register_style('flexsliderstyle',get_stylesheet_directory_uri().'/css/flexslider.css');
    wp_register_style('fonts',get_stylesheet_directory_uri().'/font-kit/stylesheet.css');
    wp_register_style('style',get_stylesheet_directory_uri().'/css/style.css');

    wp_enqueue_style(array('normalize','foundation','flexsliderstyle','fonts','style'));
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __('Footer Menu')
    )
  );
}
add_action( 'init', 'register_my_menus' );

// add ACF Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

// create dynamic sidebars
function sidebar_widgets_init() { //Register the default sidebar
    register_sidebar( array(
         'name' => 'Default Sidebar',
         'id' => 'default-sidebar',
         'before_widget' => '<aside id="%1$s" class="widget %2$s">',
         'after_widget' => '</aside>',
         'before_title' => '<h3 class="widget-title">',
         'after_title' => '</h3>',
    ));
	register_sidebar( array(
		 'name' => 'Footer Widget',
		 'id' => 'footer-sidebar',
		 'before_widget' => '<aside id="%1$s" class="columns medium-4 small-12 widget %2$s">',
		 'after_widget' => '</aside>',
		 'before_title' => '<h3 class="widget-title">',
		 'after_title' => '</h3>',
	));
	 
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	if (is_plugin_active('advanced-custom-fields-pro/acf.php')){ //Check to see if ACF is installed
		 	if (have_rows('sidebars','options')){
		 		while (have_rows('sidebars','options')):the_row(); //Loop through sidebar fields to generate custom sidebars
					 $s_name = get_sub_field('sidebar_name','options');
					 $s_id = str_replace(" ", "-", $s_name); // Replaces spaces in Sidebar Name to dash
					 $s_id = strtolower($s_id); // Transforms edited Sidebar Name to lowercase
					 register_sidebar( array(
						 'name' => $s_name,
						 'id' => $s_id,
						 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						 'after_widget' => '</aside>',
						 'before_title' => '<h3 class="widget-title">',
						 'after_title' => '</h3>',
					 ));
 				endwhile;
 			};
 	}
}
add_action( 'widgets_init', 'sidebar_widgets_init' );

/*
* ACF Sidebar Loader
*/
function my_acf_load_sidebarRepeater( $field ) {
 // reset choices
 $field['choices'] = array();
 $field['choices']['default-sidebar'] = 'Default Sidebar';
 $field['choices']['none'] = 'No Sidebar';
 // load repeater from the options page
 if(get_field('sidebars', 'options')) {
	 // loop through the repeater and use the sub fields "value" and "label"
	 while(has_sub_field('sidebars', 'options')) {
		 $label = get_sub_field('sidebar_name');
		 $value = str_replace(" ", "-", $label);
		 $value = strtolower($value);
		 $field['choices'][ $value ] = $label;
	}
 }
 // Important: return the field
 return $field;
}
add_filter('acf/load_field/name=multi_select_a_sidebar', 'my_acf_load_sidebarRepeater');

// set number of archive  months to show
function my_limit_archives( $args ) {
    $args['limit'] = 5;
    return $args;
}
add_filter( 'widget_archives_args', 'my_limit_archives' );

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '... Read More', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

////// Creating the widget 
class Feature_Testimonial extends WP_Widget {
	function Feature_Testimonial() {
		parent::WP_Widget(false, "Featured Testimonial");
	}
	function update($new_instance, $old_instance) {  
		return $new_instance;  
	}  
	function form($instance){  
		$title = esc_attr($instance["title"]);  
		echo "<br />";
	}
	function widget($args, $instance) {
		$widget_id = "widget_" . $args["widget_id"];
		$post_objects = get_field('show_featured_testimonial', $widget_id);
		$direction = get_field('display_orientation', $widget_id);
		if($direction != "Vertical") {
			echo '<section class="flexslider testimonial-slider row interior widget horizontal"><div class="slides">';
		} else {
			echo '<section class="flexslider testimonial-slider row interior widget"><div class="slides">';
		}
		foreach($post_objects as $post_object) {
			$donorDesc = get_field('donor_description',$post_object);
            $quote = get_field('quote',$post_object);    
			$quote = kidney_string_limit_words($quote,200);	
			$ti = get_the_title($post_object);	
			$perma = get_permalink($post_object);
			$imageSrc = get_field('featured_image',$post_object);
			$image = wp_get_attachment_image($imageSrc,'thumbnail');
			if($direction == "Vertical") {
				echo '<div class="columns medium-12 slide-item"><div class="columns medium-12 small-5"><a href="'.$perma.'">'.$image.'</a></div><div class="columns medium-12 small-7"><a href="'.$perma.'">'.$quote.'<h4>'.$ti.'</h4></a><p class="byline">'.$donorDesc.'</p></div></div>';
			} else {
				echo '<div class="columns medium-12 slide-item"><div class="columns large-7 medium-6 small-7">'.$quote.'<a href="'.$perma.'"><h4>'.$ti.'</h4></a><p class="byline">'.$donorDesc.'</p></div><div class="columns large-5 medium-6 small-5"><a href="'.$perma.'">'.$image.'</a></div></div>';
			}
		
		}
		echo '</div></section>';
 	}
}
register_widget("Feature_Testimonial");
class Custom_Text_Link extends WP_Widget {
	function Custom_Text_Link() {
		parent::WP_Widget(false, "Title, Picture, Text and Link Widget");
	}
	function update($new_instance, $old_instance) {  
		return $new_instance;  
	}  
	function form($instance){  
		$title = esc_attr($instance["title"]);  
		echo "<br />";
	}
	function widget($args, $instance) {
		$widget_id = "widget_" . $args["widget_id"];
		$title = get_field('title', $widget_id);
		$text = get_field('text',  $widget_id);
		$imageSrc = get_field('picture', $widget_id);
		$imageSize = get_field('image_size',$widget_id);
		$image = wp_get_attachment_image($imageSrc,$imageSize);
		$useLink = get_field('add_link', $widget_id);
		$btnStyle = get_field('choose_button_style', $widget_id);
		$linkText = get_field('link_text', $widget_id);
		$link = get_field('link', $widget_id);?>
		<article class="widget title-text-pic" id="<?php echo $widget_id;?>">
			<?php if($title) { echo '<h3 class="widget-title">'.$title.'</h3>';}
			if($imageSrc) {echo $image;}
			if($text) {echo $text;}
			if($useLink == "Yes") {
				echo '<a class="'.$btnStyle.'" href="'.$link.'">'.$linkText.'</a>';
			} ?>
		</article>
 	<?php }
}
register_widget("Custom_Text_Link");

class BigButton extends WP_Widget {
	function BigButton() {
		parent::WP_Widget(false, "Big Button");
	}
	function update($new_instance, $old_instance) {  
		return $new_instance;  
	}  
	function form($instance){  
		$title = esc_attr($instance["title"]);  
		echo "<br />";
	}
	function widget($args, $instance) {
		$widget_id = "widget_" . $args["widget_id"];
		$linkText = get_field('link_text', $widget_id);
		$link = get_field('link', $widget_id);?>
		<article class="widget title-text-pic" id="<?php echo $widget_id;?>">
			<?php echo '<a class="button round secondary" href="'.$link.'">'.$linkText.'</a>';?>
		</article>
 	<?php }
}
register_widget("BigButton");


// unregister widgets 
function unregister_default_widgets() {     
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Recent_Comments');    
	unregister_widget('WP_Widget_RSS');     
	unregister_widget('WP_Widget_Tag_Cloud'); 
	unregister_widget('WP_Widget_Meta');
	unregister_widget('Advanced_Pages_Widget_widgetized'); //advanced pages
	unregister_widget('Button_Creator_Widget_widgetized'); //advanced button
} 
add_action('widgets_init', 'unregister_default_widgets', 11);

add_filter('img_caption_shortcode', 'limg_caption', 10, 3 );
function limg_caption( $caption, $atts, $image ) {
   //print_r($atts);
   $align = $atts[align];
   $width = $atts[width];
   $attachmentID =$atts[id];
   $attachmentID = str_replace('attachment_','',$attachmentID);
   $linkTo = wp_get_attachment_link($attachmentID, '');
   $title = get_the_title($attachmentID);
   $caption = "<figure class='photo caption-photo ".$align."' style='width:".$width.";'>$image <figcaption class=\"caption\">";
   $getPost = get_post($attachmentID);
   $description =  $getPost->post_content;
   $description = apply_filters('the_content', $description);
   $description = str_replace(']]>', ']]>', $description);
   //$caption .= "{$atts['caption']} $title $description";
   $caption .= '<p class="caption-title">'.$linkTo.'</p>';
   $caption .= '<p class="caption-text">';
   $caption .= "{$atts['caption']}";
   $caption .= '</p></figcaption></figure>';
   return $caption;
}
// columns shortcode
function createtwoColumn( $atts, $content = null ) {
   return '<div class="columns small-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns-2', 'createtwoColumn');

// create button shortcode
$addBtnId = 0;
function btnshortcode( $atts, $content = null ) {
	 ob_start();
   global $addBtnId;
  echo '<div class="shortcode-btn" id="shortbtn-'.$addBtnId.'"></div>';
  //echo do_shortcode($content);
   ?><script type="text/javascript">
	    var myButton = '<?php echo $content;?>';
	    var btnText = myButton.match(/>([^<]*)/)[1];
		var href =myButton.match(/href="([^"]*)/)[1];
		var btnId = '<?php echo $addBtnId;?>';
		var hasTarget = myButton.indexOf('target')>-1;
		if (hasTarget ==false) {
			var target = '';	
		} else {
			var target = myButton.match(/target="([^"]*)/)[1]; 
		}
		document.getElementById('shortbtn-'+btnId).innerHTML += '<a href="'+href+'" class="button round" target="'+target+'">'+btnText+'</a>';

		</script><?php $addBtnId++;
			$output = ob_get_clean();
		return $output;
}
add_shortcode('button', 'btnshortcode');


function kidney_string_limit_words($string, $word_limit){
    $excerpt = get_field('excerpt_content',get_the_ID());
    if($excerpt){
       return $excerpt;
    }else{
        $content = strip_shortcodes($string);
        $content = preg_replace('/<(\s*)img[^<>]*>/i', '', $content );
        $words = explode(' ', $content, ($word_limit + 1));
        if(count($words) > $word_limit)
        array_pop($words);
        return implode(' ', $words);    
    }
}

if(class_exists('Video_Thumbnails')):
// create video shortcode
function videoshortcode( $atts, $content = null ) {
    global $video_thumbnails;
    extract(shortcode_atts(array(
        "url" => '',
        "title" => ''
    ), $atts));
    $vidobj = $video_thumbnails->find_videos($url);
    $newcontent = '<div class="iframe-contain"><a href="javascript:;" data-reveal-id="videoModal'.$vidobj[0]['id'].'"><img src="'.$video_thumbnails->get_first_thumbnail_url($url).'" width="457" height="282"></a>';
    $newcontent .= '<div id="videoModal'.$vidobj[0]['id'].'" class="reveal-modal large" data-reveal aria-labelledby="videoTitle'.$vidobj[0]['id'].'" aria-hidden="true" role="dialog"><h2 id="videoTitle'.$vidobj[0]['id'].'">'.$title.'</h2><div class="flex-video widescreen '.$vidobj[0]['provider'].'"><iframe width="1280" height="720" src="'.$url.'" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div><a class="close-reveal-modal" aria-label="Close">&#215;</a></div></div>';
    return $newcontent;
}
add_shortcode('videopopup', 'videoshortcode');
endif;

// deliver responsive images
function custom_theme_setup() {
    add_theme_support( 'advanced-image-compression' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' ); 


add_image_size('billboard', 1003, 454, false);
add_image_size('featured', 622, 227, true );
add_image_size('testimonial', 400, 400, true );

/*Interactive map code here*/
//Run the Shortcode to Build Interactive Map
function shortcode_imap( $atts, $content = null ) {    
    extract(shortcode_atts(array(
        "overlay" => 'false',
    ), $atts)); 
    $id = get_the_ID();
    //to have another map overlay we created a new parameter

    if(isset($overlay)) {

        $html = '<div id="iwm_map_overlay">';
        $html .= new_build_i_world_map_exec($id,'base');
        $html .= new_build_i_world_map_exec($overlay,'data');
        $html .= '</div>';

        $html .= '
         <!-- Map Overlay Styles -->
        <style type="text/css">
         #iwm_map_overlay #map_canvas_'.$overlay.' {
            pointer-events:none;
           }

         #iwm_map_overlay #map_canvas_'.$overlay.' path  {
            display:none;
           }

         #iwm_map_overlay #map_canvas_'.$overlay.' text, 
         #iwm_map_overlay #map_canvas_'.$overlay.' circle {
            pointer-events:visible; 
        }
        </style>';

        return $html;

    } else {

        return new_build_i_world_map_exec($id,'base');    

    }

    
}
add_shortcode('imapshortcode', 'shortcode_imap');

function imap_place_replace($place){
    $oreplace = array(',', ";");
    $ofinal   = array('&#44', "&#59");
    return str_replace($oreplace, $ofinal, $place);
}

//Main Function to build the map
function new_build_i_world_map_exec($id,$overlay=false) {
    
    global $iwmparam_array;
    global $apiver;

//    i_world_map_defaults();
    $simplemap = get_field('interactive_regions',$id);
    if($simplemap == 'simple'){
        if(get_field('simple_interactive_regions',$id)):
            $mapinput='';
            while(has_sub_field('simple_interactive_regions',$id)){
                $regioncode = imap_place_replace(get_sub_field('region_code'));
                $tooltiptitle = imap_place_replace(get_sub_field('title'));
                $tooltipinfo = imap_place_replace(get_sub_field('tooltip'));
                $actionvalue = imap_place_replace(get_sub_field('action_value'));
                $colorcode = imap_place_replace(get_sub_field('color'));
                $mapinput .= $regioncode.','.$tooltiptitle.','.$tooltipinfo.','.$actionvalue.','.$colorcode.';';
            }
//            $input = htmlspecialchars($mapinput);
            $input = $mapinput;
         endif;
    }else{
        $input = get_field('advanced_data_editor',$id);
//        $input = htmlspecialchars($mapinput);
    }
    $styles = '';
    $overrideh = false;

//    $placeholder = __("<div class='iwm_placeholder'><img width='32px' src='".plugins_url('imgs/placeholder.png', __FILE__)."'><br>".$mapdata['name']."</div>",'iw_maps');
    //$input = str_replace(array("\r\n", "\r", "\n"), ' ', addslashes($mapdata['places']));

    $usehtml = 1;
    $apiv = "1";
    $apiv = $apiver;
    $bg_color = '#FFFFFF';
    $ina_color = 'transparent';
    $border_color = '#CCCCCC';
    $border_stroke = 0;
    $act_color = '#438094';
    $marker_size = 10;
    $width = "";
    $height = "";
    $aspect_ratio = 1;
    
    imap_include_responsive_js();
    
    $tooltipt = 1; //none , selection , focus
    $diplaym = get_field('display_mode',$id);
    $interactive = "true";
    $display_mode = $diplaym;
    $areashow = explode(",", get_field('region_to_display',$id));
    $region = $areashow[0]; 
    $resolution = $areashow[1];
    $map_action = get_field('active_region_action',$id);
    $custom_action = '';
    $projection = "mercator";
    $beforediv="";  
    $afterdiv ="";

    if($map_action != "none" || $map_action!='null' ) { 

 
          if($map_action =='i_map_action_content_below') {
            $afterdiv .="<div id='imap".$id."message'></div>";
            }
        if($map_action =='i_map_action_content_above') {
            $beforediv ="<div id='imap".$id."message'></div>";
            }

    }

   $new_iwm_array = array(
                    "apiversion" => $apiv,
                    "usehtml" => $usehtml,
                    "id" => $id,
                    "bgcolor"=>$bg_color,
                     "stroke"=>$border_stroke,
                     "bordercolor"=>$border_color,
                     "incolor"=>$ina_color,
                     "actcolor"=>$act_color,
                     "width"=>$width,
                     "height"=>$height,
                     "aspratio"=>$aspect_ratio,
                     "interactive"=>$interactive, 
                     "tooltip"=>$tooltipt,
                     "region"=>$region,
                     "resolution"=>$resolution,
                     "markersize"=>$marker_size,
                     "displaymode"=>$display_mode,
                     "placestxt"=>$input,
                     "action"=>$map_action,
                     "custom_action"=>'', 
                     "projection" => $projection
                    );


    array_push($iwmparam_array, $new_iwm_array);
        
    i_world_map_scripts($iwmparam_array);

    $style = '';
    if($overlay=='base') {
        $style .= "style='pointer-events:visible;' ";
    }

    $class = '';
    $style .= "class='iwm_map_canvas";
    if($overlay=='data') {
        $style .= " iwm_data";
    }
    //closing class=""
    $style .="'";

    //if the size height is overrided with css, we need extra class
    if($overrideh) {
        $beforediv .= '<div id="iwm_'.$id.'">';
        $afterdiv = '</div>'.$afterdiv;
    }

    return $styles.$beforediv."<div ".$style."><div id='map_canvas_".$id."' class='i_world_map ' ".$style.">".$placeholder."</div></div>".$afterdiv;
    
}
