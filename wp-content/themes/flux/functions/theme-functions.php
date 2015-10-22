<?php
/*====================================================================================================
Set Up Theme
======================================================================================================*/
if ( ! function_exists( 'indonez_setup' ) ):
	function indonez_setup() {
		
	//Make theme available for translation
	load_theme_textdomain( 'indonez', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	//Define content width
	if(!isset($content_width)) $content_width = 966;

	//This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	//Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
		
	//This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Top Navigation', 'indonez' ),
	) );
	
	//This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		
		add_image_size( 'custom-small-image', 68, 68, true ); // latest posts, popular post
		
		add_image_size( 'custom-medium-image', 628, 227, true ); //blog, single
		
		add_image_size( 'portfolio-image', 458, 500, true ); // portfolio
		
		add_image_size( 'custom-large-image', 960, 658, true ); //portfolio single

	}
	
	//This theme uses gallery, video post format
	add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'link', 'quote' ));
	
	//Use Shortcode on the exceprt
	add_filter( 'the_excerpt', 'do_shortcode');
	
	//Use Shortcode on text widget
	add_filter('widget_text', 'do_shortcode');
		
	}
endif;
add_action( 'after_setup_theme', 'indonez_setup' );

/*====================================================================================================
Remove Width and Height Image
======================================================================================================*/
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/*====================================================================================================
Meta and title
======================================================================================================*/
function indonez_seo() 
{
	global $smof_data;
	
	if($smof_data['seo_onoff']){
		global $post;
		
		// description
		if( get_post_meta(get_the_ID(), 'indonez_seo_desc', true ) ){
			echo '<meta name="description" content="'. stripslashes( get_post_meta( get_the_ID(), 'indonez_seo_desc', true ) ) .'" />'."\n";
		} elseif($smof_data['seo_metadesc']){
			echo '<meta name="description" content="'. stripslashes($smof_data['seo_metadesc']) .'" />'."\n";
		}
		
		// keywords
		if( get_post_meta(get_the_ID(), 'indonez_seo_key', true ) ){
			echo '<meta name="keywords" content="'. stripslashes( get_post_meta( get_the_ID(), 'indonez_seo_key', true ) ) .'" />'."\n";
		} elseif($smof_data['seo_metakeywords']){
			echo '<meta name="keywords" content="'. stripslashes($smof_data['seo_metakeywords']) .'" />'."\n";
		}
		
	}
}
add_action('wp_seo', 'indonez_seo');

/*====================================================================================================
Load Javascript
======================================================================================================*/
function indonez_add_javascripts() {

	wp_enqueue_scripts('jquery');
	wp_enqueue_script( 'jquery.modernizr', get_template_directory_uri().'/js/modernizr.js', array( 'jquery'), '', true  );
	wp_enqueue_script( 'jquery.mediaelement', get_template_directory_uri().'/js/mediaelement-and-player.min.js', array( 'jquery'), '', true  );
	wp_enqueue_script( 'jquery.retina', get_template_directory_uri().'/js/jquery.retina.js', array( 'jquery'), '', true  );
	wp_enqueue_script( 'jquery.superfish', get_template_directory_uri().'/js/superfish.js', array( 'jquery'), '', true  );
	wp_enqueue_script( 'jquery.fancybox', get_template_directory_uri().'/js/jquery.fancybox.js', array( 'jquery'), '2.0.6', true  );
	wp_enqueue_script( 'jquery.fancybox.media', get_template_directory_uri().'/js/jquery.fancybox-media.js', array( 'jquery'), '1.0.3', true  );
	wp_enqueue_script( 'jquery.ui.totop', get_template_directory_uri().'/js/jquery.ui.totop.min.js', array( 'jquery'), '', true  );
	wp_enqueue_script( 'jflickrfeed', get_template_directory_uri().'/js/jflickrfeed.min.js', array( 'jquery'), '', true  );
	wp_enqueue_script( 'jquery.isotope', get_template_directory_uri().'/js/jquery.isotope.js', array( 'jquery'), '1.4', true  );
	wp_enqueue_script( 'jquery.tinynav', get_template_directory_uri().'/js/tinynav.min.js', array('jquery'), '1.1', true);
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri().'/js/jquery.easing-1.3.min.js', array( 'jquery'), '1.3', true  );
	wp_enqueue_script( 'jquery.themefunctions', get_template_directory_uri().'/js/jquery.theme.functions.js', array( 'jquery'), '', true  );
	
	global $smof_data;
	$show_switcher = $smof_data['show_switcher'];
	
	if ( !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) )
	if($show_switcher==1){
		wp_enqueue_script( 'jquery.cookie', get_template_directory_uri().'/demo_switcher/jquery.cookie.js', array( 'jquery'), '', true  );
		wp_enqueue_script( 'jquery.colorpicker', get_template_directory_uri().'/demo_switcher/colorpicker.js', array( 'jquery'), '', true  );
		wp_enqueue_script( 'jquery.color', get_template_directory_uri().'/demo_switcher/jquery.color.js', array( 'jquery'), '', true  );
		wp_enqueue_script( 'jquery.switcher', get_template_directory_uri().'/demo_switcher/switcher.js', array( 'jquery'), '', true  );
	}
  
}

if (!is_admin()) {
  add_action( 'wp_print_scripts', 'indonez_add_javascripts' ); 
}


/*====================================================================================================
Custom Javascript
======================================================================================================*/
if(!function_exists("indonez_print_javascript")){
	function indonez_print_javascript(){
?>
	<script>
	
	jQuery(document).ready(function() {
	
	//Border Menu
	var html = '<span class="mborder"></span>';
	
	jQuery('ul#menu > li.current_page_item, ul#menu > li.current_page_parent, ul#menu > li.current-menu-parent, ul#menu > li.current-menu-item').prepend(html);
	jQuery('ul#menu > li.current_page_item > span.mborder, ul#menu > li.current_page_parent > span.mborder, ul#menu > li.current-menu-parent > span.mborder, ul#menu > li.current-menu-item > span.mborder').fadeIn("slow");
	jQuery("ul#menu > li").hover(
  
   function() {

        // Do not append menu-hover on selected li
        if (jQuery(this).hasClass('current_page_item') || jQuery(this).hasClass('current_page_parent') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-item'))
		return;

        // Append menu-hover on non-selected li
        jQuery(this).prepend(html);
        jQuery("ul#menu > li span.mborder").fadeIn("slow");

    },
	
   function() {
        
		// Do not remove menu-hover on selected li
        if (jQuery(this).hasClass('current_page_item') || jQuery(this).hasClass('current_page_parent') || jQuery(this).hasClass('current-menu-parent') || jQuery(this).hasClass('current-menu-item'))
		return;
		
		// Remove span
        jQuery(this).find("span.mborder").remove();

    }
	
	);


	//Detect device
	var isMobile = {
	Android: function() {
	  return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
	  return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
	  return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
	  return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
	  return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
	  return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
	};	
	
	if(isMobile) {
	jQuery('.lightbox-item-overlay-content').hover(
	  function(){
		  jQuery(this).stop().fadeTo(200,1);
	  }, 
	  function(){
		  jQuery(this).stop().fadeTo(200,0);
	  }
	  );
	}	
	
	});	
	
	
	//Portfolio Filter Jquery
	jQuery(window).load(function(){
	var $container = jQuery('.pffilterable');
	$container.isotope({
		filter: '*',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
		}
	});
	jQuery('#pf-filter a').click(function(){
		var selector = jQuery(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
			
			
		});
	  return false;
	});
	
	var $optionSets = jQuery('#pf-filter'),
		   $optionLinks = $optionSets.find('a');
	 
		   $optionLinks.click(function(){
			  var $this = jQuery(this);
		  // don't proceed if already selected
		  if ( $this.hasClass('selected') ) {
			  return false;
		  }
	   var $optionSet = $this.parents('#pf-filter');
	   $optionSet.find('.selected').removeClass('selected');
	   $this.addClass('selected'); 
		});
	
	});	
	
	
	
	<?php if(function_exists('putRevSlider')) {?>
	//Post Gallery
	jQuery('.banner-blog').revolution({
	delay:9000,
	onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off
	
	thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
	thumbHeight:50,
	thumbAmount:3,
	
	hideThumbs:0,
	navigationType:"bullet",				// bullet, thumb, none
	navigationArrows:"none",				// nexttobullets, solo (old name verticalcentered), none
	
	navigationStyle:"round-old",			// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
	
	
	navigationHAlign:"left",				// Vertical Align top,center,bottom
	navigationVAlign:"bottom",					// Horizontal Align left,center,right
	navigationHOffset:15,
	navigationVOffset:15,
	
	touchenabled:"on",						// Enable Swipe Function : on/off
	
	stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
	stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
	
	hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
	hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
	hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value
	
	
	fullWidth:"0ff",
	
	shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
	})
	
	<?php } ?>
	
   
	
	jQuery('#indonez_noscript-css').remove();
	
	</script>
    
    
    
<?php
	}
	add_action("wp_footer","indonez_print_javascript",20);
}


/*====================================================================================================
Load CSS
======================================================================================================*/
function indonez_add_stylesheet() {
   if (!is_admin()) {
   
	global $smof_data;
	$getfontbody = $smof_data['font_body'];
	$getfontmenu = $smof_data['font_menu'];
	$getfontmenudesc = $smof_data['font_menu_desc'];
	$getfontheading = $smof_data['font_heading'];
	
	$font = str_replace(' ', '+', $getfontbody);
	$font1 = str_replace(' ', '+', $getfontmenu);
	$font2 = str_replace(' ', '+', $getfontmenudesc);
	$font3 = str_replace(' ', '+', $getfontheading);
   
	wp_register_style('googlefonts_body', 'http://fonts.googleapis.com/css?family='.$font.':300,400,400italic,700');
	wp_enqueue_style( 'googlefonts_body');
   
	wp_register_style('googlefonts_menu', 'http://fonts.googleapis.com/css?family='.$font1.':300,400,400italic,700');
	wp_enqueue_style( 'googlefonts_menu');
	
	wp_register_style('googlefonts_menu_desc', 'http://fonts.googleapis.com/css?family='.$font2.':300,400,400italic,700');
	wp_enqueue_style( 'googlefonts_menu_desc');
	
	wp_register_style('googlefonts_heading', 'http://fonts.googleapis.com/css?family='.$font3.':300,400,400italic,700');
	wp_enqueue_style( 'googlefonts_heading');
	
	wp_register_style('googlefonts_text', 'http://fonts.googleapis.com/css?family=Pacifico');
	wp_enqueue_style( 'googlefonts_text');
	
	wp_register_style('googlefonts_text2', 'http://fonts.googleapis.com/css?family=Roboto:400,300,700,500,900');
	wp_enqueue_style( 'googlefonts_text2');

	wp_register_style('googlefonts_text3', 'http://fonts.googleapis.com/css?family=Open+Sans');
	wp_enqueue_style( 'googlefonts_text3');
	
	wp_register_style('indonez_base', get_template_directory_uri().'/css/base.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_base');
	
	wp_register_style('indonez_grid', get_template_directory_uri().'/css/grid.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_grid');
	
	wp_register_style('indonez_css', get_bloginfo( 'stylesheet_url' ), '', '', 'all');
	wp_enqueue_style('indonez_css');
	
	wp_register_style('indonez_audio', get_template_directory_uri().'/css/audio.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_audio');
	
	
	if($smof_data['responsive_layout']==true):
	wp_register_style('indonez_mediaquery', get_template_directory_uri().'/css/media.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_mediaquery');
	else:
	wp_register_style('indonez_responsive_off', get_template_directory_uri().'/css/responsive_off.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_responsive_off');
	endif;
	
	wp_register_style('indonez_noscript', get_template_directory_uri().'/css/noscript.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_noscript');
	
   global $smof_data; 
   $show_switcher = $smof_data['show_switcher'];
	if($show_switcher==1){
		wp_register_style('indonez_style-switcher', get_template_directory_uri().'/demo_switcher/style-switcher.css', '', '', 'screen, all');
		wp_enqueue_style('indonez_style-switcher');
		wp_register_style('indonez_colorpicker', get_template_directory_uri().'/demo_switcher/colorpicker.css', '', '', 'screen, all');
		wp_enqueue_style('indonez_colorpicker');
	}
	
	
	}

}
add_action('init', 'indonez_add_stylesheet');


function indonez_add_stylesheet_footer() { 
  if (!is_admin()) {
	global $smof_data;
	wp_register_style('indonez_revolution', get_template_directory_uri().'/css/revolution.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_revolution');
	
	if($smof_data['responsive_layout']==true):
	wp_register_style('indonez_media-slideshow', get_template_directory_uri().'/css/media-slideshow.css', '', '', 'screen, all');
	wp_enqueue_style('indonez_media-slideshow');
	endif;
	
	} 
}
add_action('wp_enqueue_scripts', 'indonez_add_stylesheet_footer', 40);


/*====================================================================================================
Custom CSS
======================================================================================================*/
function colourCreator($colour, $per) 
{ 
    $colour = substr( $colour, 1 ); // Removes first character of hex string (#)
    $rgb = ''; // Empty variable 
    $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature
     
    if  ($per < 0 ) // Check to see if the percentage is a negative number 
    { 
        // DARKER 
        $per =  abs($per); // Turns Neg Number to Pos Number 
        for ($x=0;$x<3;$x++) 
        { 
            $c = hexdec(substr($colour,(2*$x),2)) - $per; 
            $c = ($c < 0) ? 0 : dechex($c); 
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        }   
    }  
    else 
    { 
        // LIGHTER         
        for ($x=0;$x<3;$x++) 
        {             
            $c = hexdec(substr($colour,(2*$x),2)) + $per; 
            $c = ($c > 255) ? 'ff' : dechex($c); 
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c; 
        }    
    } 
    return '#'.$rgb; 
}


function toRGB($Hex){
   
if (substr($Hex,0,1) == "#")
    $Hex = substr($Hex,1);
    
    

$R = substr($Hex,0,2);
$G = substr($Hex,2,2);
$B = substr($Hex,4,2);

$R = hexdec($R);
$G = hexdec($G);
$B = hexdec($B);

$RGB['R'] = $R;
$RGB['G'] = $G;
$RGB['B'] = $B;

return $RGB;

}


function indonez_custom_css() {
	global $smof_data;
	
	//General
	$generalcolor = $smof_data['generalcolor'];
	$bg_pattern = $smof_data['bg_pattern'];
	$show_pattern = $smof_data['show_pattern'];
	$bg_color   = $smof_data['bg_color'];
	$headingcolor = $smof_data['headingcolor'];
	
	//Top Section
	$topareabg = $smof_data['topareabg'];
	$topareatext = $smof_data['topareatext'];
	
	//Menu Section
	$menuareabg = $smof_data['menuareabg'];
	$menucolor = $smof_data['menucolor'];
	$menudesccolor = $smof_data['menudesccolor'];
	$bgmenucolor = $smof_data['bgmenucolor'];

	
	//Footer Section
	$footerbg = $smof_data['footerbg'];
	$footertextcolor = $smof_data['footertextcolor'];
	$footerheadingcolor = $smof_data['footerheadingcolor'];
	
	//Custom CSS
	$custom_css_code = $smof_data['custom_css'];
	
	//Font
	$font = $smof_data['font_body'];
	$font1 = $smof_data['font_menu'];
	$font2 = $smof_data['font_menu_desc'];
	$font3 = $smof_data['font_heading'];
	
	//Setting
	$darkPercent = -5;
	$darkPercent2 = -15; 
	$lightPercent = 4;
	
	$bordermenuarea = colourCreator($menuareabg, $lightPercent);
	$bgmenucolorhover = colourCreator($menuareabg, $darkPercent);
	$searchformcolor = colourCreator($menuareabg, $darkPercent2);
	$bordermenuactive = colourCreator($bgmenucolor, $darkPercent);
	
	$footermenuhover = colourCreator($footertextcolor, $lightPercent);
	$footerline = colourCreator($footerbg, $lightPercent);
	$buttonhover = colourCreator($generalcolor, $darkPercent);
	
	$lightboxhover = toRGB($generalcolor);
	
	$custom_css = '';
	
	if ($bg_color !="") {
		$custom_css .=  'body { background-color:'.$bg_color.';}'."\n";
	}
  
	if ($bg_pattern !="") {
		$custom_css .=  'body { background-image: url('.$bg_pattern.');}'."\n";
	}
  
  
	if ($show_pattern == 0) {
		$custom_css .= '
		body { background-image: none;}
		'."\n";
	}
	
	$custom_css .= 'body{font-family:'.$font.', Helvetica, Arial}'."\n";
	
	$custom_css .= '#mainmenu ul{font-family:'.$font1.', Helvetica, Arial}'."\n";
	
	$custom_css .= 'span.desc-menu, #menu li ul a,#menu li ul a:visited{font-family:'.$font2.', Helvetica Neue, Helvetica, Arial, sans-serif}'."\n";
	
	$custom_css .= 'h1,h2,h3,h4,h5,h6{font-family:'.$font3.', Helvetica, Arial}'."\n";
	
	if($generalcolor!=""){
	$custom_css .='.rdm, button[type="submit"], input[type="submit"], input[type="button"]{background:'.$generalcolor.'}'."\n";
	$custom_css .='.rdm:hover, button[type="submit"]:hover, input[type="submit"]:hover, input[type="button"]:hover{background:'.$buttonhover.'}'."\n";
	}
	
	if($generalcolor!=""){
	$custom_css .= 'a:link,a:visited,a:active, .breadcrumb ul li.current_item, .breadcrumb ul li.current_item a, .breadcrumb ul li.current_item a:visited, #pf-filter ul li a:hover, #pf-filter ul li a:active, #pf-filter ul li a.selected, ul.post-info li a:hover, ul.popular-list li p.comment-count a, ul.popular-list li p.comment-count a:visited, ul.popular-list li p.author-name, ul.popular-list li p.author-name a, ul.popular-list li p.author-name a:visited, #error404-left i, .company-name, .list_carousel ul.testi-carousel li .testi-name{color:'.$generalcolor.';}';
	$custom_css .= '.quote-box, .pages a:hover, .pages .current, .wp-pagenavi a:hover, .wp-pagenavi .current, a.comment-reply-link, a.comment-reply-link:visited, form#comment-form #submit, .idz-toggle .ui-accordion-header-active, .idz-accordion .ui-accordion-header-active, .highlight{background:'.$generalcolor.'}';
	$custom_css .= '.lightbox-item .lightbox-item-overlay-content, .teaser-gallery-box .lightbox-item .lightbox-item-overlay-content{background:'.$generalcolor.'; background-color:rgba('.$lightboxhover['R'].', '.$lightboxhover['G'].', '.$lightboxhover['B'].', 0.8); }';
	$custom_css .= '.teaser-preview-box, #map, .google_map, .pages a:hover, .pages .current, .wp-pagenavi a:hover, .wp-pagenavi .current, .idz-toggle .ui-accordion-header-active, .idz-accordion .ui-accordion-header-active{border-color:'.$generalcolor.' !important}'."\n";
	$custom_css .= '.idz-tabs .idz-nav .ui-tabs-selected a, .idz-tabs .idz-nav .ui-tabs-active a {border-top:solid 1px '.$generalcolor.'; color:'.$generalcolor.';}'."\n";
	$custom_css .= '.idz-tabs.bottom .idz-nav .ui-tabs-selected a, .idz-tabs.bottom .idz-nav .ui-tabs-active a {border-bottom:solid 1px '.$generalcolor.' !important; color:'.$generalcolor.';}'."\n";
	$custom_css .= '.idz-tabs.left .idz-nav .ui-tabs-selected a, .idz-tabs.left .idz-nav .ui-tabs-active a{border-left:solid 1px '.$generalcolor.' !important; color:'.$generalcolor.';}'."\n";
	$custom_css .= '.idz-tabs.right .idz-nav .ui-tabs-selected a, .idz-tabs.right .idz-nav .ui-tabs-active a{border-right:solid 1px '.$generalcolor.' !important; color:'.$generalcolor.';}'."\n";
	$custom_css .= '.mborder{background:'.$generalcolor.';}'."\n";
	}
	
	$custom_css .= 'h1,h2,h3,h4,h5,h6{color:'.$headingcolor.'}'."\n";

	$custom_css .= 'header#top{background:'.$topareabg.'}'."\n";
	$custom_css .= '#top-info, #top-info span, #top-info a, #top-info a:visited{color:'.$topareatext.'}'."\n";
	
	$custom_css .= '#mainmenu-wrapper, #menu ul{background:'.$menuareabg.'}'."\n";
	
	$custom_css .= '#top-search input[type="text"], a.trigger{color:#5f7387}'."\n";
	
	if($menuareabg!=""){
	$custom_css .= '#mainmenu ul li{border-color:'.$bordermenuarea.'}'."\n";
	$custom_css .= 'a.trigger, a.active.trigger, #top-search #searchform{background:'.$searchformcolor.'}'."\n";
	$custom_css .= '#top-search input[type="text"], a.trigger{color:#ccc}'."\n";
	}
	
	if($menudesccolor!=""){
	$custom_css .= 'span.desc-menu{color:'.$menudesccolor.'}'."\n";
	}
	
	$custom_css .= '#mainmenu ul li a, #mainmenu ul li li a:hover, #mainmenu ul li li:hover > a
					#mainmenu ul li li.current_page_item > a, #mainmenu ul li li.current_page_item:hover > a,
					#mainmenu ul li li.current_page_parent > a, #mainmenu ul li li.current_page_parent:hover > a,
					#mainmenu ul li li.current-menu-parent > a, #mainmenu ul li li.current-menu-parent:hover > a,
					#mainmenu ul li li.current-menu-item > a, #mainmenu ul li li.current-menu-ancestor > a{color:'.$menucolor.'}'."\n";
					
	if($menuareabg!=""){
	$custom_css .= '#mainmenu ul li:hover,  #mainmenu ul li li:hover,
					#mainmenu li.current_page_item,
					#mainmenu li.current_page_parent,
					#mainmenu li.current-menu-parent,
					#mainmenu li.current-menu-item{background:'.$bgmenucolorhover.'}'."\n";
	}
					
	if($bgmenucolor!=""){
	$custom_css .= '#mainmenu ul li:hover,
					#mainmenu li.current_page_item,
					#mainmenu li.current_page_parent,
					#mainmenu li.current-menu-parent,
					#mainmenu li.current-menu-item{border-color:'.$bordermenuactive.'}'."\n";
	}
	

	if($footerbg!=""){
	$custom_css .= 'footer{background:'.$footerbg.'}'."\n";
	$custom_css .= 'ul.footer-address{border-color:'.$footerline.'}'."\n";
	}
	
	$custom_css .= 'footer ul li a, footer ul li a:visited, footer ul li, footer ul li:after, footer ul li:before, footer p, .textwidget, #wp-calendar th, #wp-calendar caption{color:'.$footertextcolor.' !important}'."\n";
	if($footertextcolor!=""){
	$custom_css .= 'footer ul li a:hover{color:'.$footermenuhover.' !important}'."\n";
	}
	
	$custom_css .= 'footer h1, footer h2, footer h3, footer h4, footer h5, footer h6{color:'.$footerheadingcolor.'}'."\n";
	
	if ($custom_css_code !="") {
		$custom_css .= $custom_css_code."\n";
	}
	
	
	$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css . "\n</style>";
	
	if(!empty($custom_css)) {
		echo $css_output;
	}
  
}
add_action('wp_head', 'indonez_custom_css');

/*====================================================================================================
Title Function
======================================================================================================*/
function indonez_filter_wp_title( $title, $separator ) {

	if ( is_feed() ) return $title;
		
	global $paged, $page;

	if ( is_search() ) {
	
		//If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'indonez' ), '"' . get_search_query() . '"' );
		//Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'indonez' ), $paged );
		//Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'indonez' );
		//We're done. Let's send the new title back to wp_title():
		return $title;
	}

	//Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'indonez' );

	//If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'indonez' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	//Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'indonez' ), max( $paged, $page ) );

	//Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'indonez_filter_wp_title', 10, 2 );


/*====================================================================================================
Custom Exceprt
======================================================================================================*/
function excerpt($excerpt_length) {
  global $post;
	$content = $post->post_content;
	$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$content = implode(' ', $words);
	endif;
  
  $content = strip_tags(strip_shortcodes($content));
  
	return $content;
}

if(!function_exists("indonez_excerpt_limit_char")){
	function indonez_excerpt_limit_char($excerpt, $substr=0, $strmore ="..."){
		$string = strip_tags(str_replace('...', '...', $excerpt));
		if ($substr>0) {
			$string = substr($string, 0, $substr);
		}
		if(strlen($excerpt)>=$substr){
			$string .= $strmore;
		}
		return $string;
	}
}


/*====================================================================================================
Enable excerpt for pages
======================================================================================================*/
add_action( 'init', 'indonez_add_excerpts_to_pages' );
function indonez_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


/*====================================================================================================
Custom Comment Display
======================================================================================================*/
function indonez_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   	  <div class="comment-con">
      <div class="avatar-icon"><?php echo get_avatar( $comment, 64, 64 ); ?></div>
      <div class="comment-text" >
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      <h6><?php echo get_comment_author_link(); ?></h6>
      
      <small><?php printf(__('%1$s at %2$s','indonez'), get_comment_date(),  get_comment_time()) ?></small>
      <?php if ($comment->comment_approved == '0') : ?>
			<em><?php echo __('Your comment is awaiting moderation.','indonez');?></em>
			<div class="clear"></div>
			<?php endif; ?>
		  <?php comment_text()?>
      <small>
      <?php edit_comment_link(__('Edit','indonez'),'  ','') ?>
      </small>
      </div>
      </div>
  </li>
<?php
}

/*====================================================================================================
Output the styling for the seperated Pings
======================================================================================================*/
function indonez_list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?></li>
<?php }


/*====================================================================================================
Hidden preview button on custom post type
======================================================================================================*/
function posttype_admin_css() {
    global $post_type;
    if($post_type == 'slideshow' || $post_type == 'testimonial' || $post_type == 'client') {
    echo '<style type="text/css">#view-post-btn,#post-preview{display: none;}</style>';
    }
}
add_action('admin_head', 'posttype_admin_css');


/*====================================================================================================
Remove Default Container for Nav Menu Features
======================================================================================================*/
function indonez_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
} 
add_filter( 'wp_nav_menu_args', 'indonez_nav_menu_args' );



/*====================================================================================================
Top Navigation Custom
======================================================================================================*/
class Indonez_Walker extends Walker_Nav_Menu{
	function start_el(&$output, $item, $depth=0, $args=array(), $current_object_id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= '<span class="desc-menu">' . $item->description . '</span>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*====================================================================================================
Top Navigation Fallback
======================================================================================================*/
function menu_page_fallback() {
if(is_front_page()){$class="current_page_item";}else{$class="";}
print '<ul id="menu"><li class="'.$class.'"><a href=" '.home_url( '/') .' " title=" '.__('Click for Home','indonez').' ">'.__('Home','indonez').'</a></li>';
    wp_list_pages( 'title_li=&sort_column=menu_order' );
print '</ul>';
}


/*====================================================================================================
Check the current post for the existence of a short code
======================================================================================================*/
function indonez_has_shortcode($shortcode = '') {
	$post_to_check = get_post(get_the_ID());
	// false because we have to search through the post content first
	$found = false;
	// if no short code was provided, return false
	if (!$shortcode) {
		return $found;
	}
	// check the post content for the short code
	if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
		// we have found the short code
		$found = true;
	}
	// return our final results
	return $found;
}


/*====================================================================================================
Social Bookmarks
======================================================================================================*/
function indonez_social_bookmarks() { ?>
    <div class="share-social">
        <ul class="social-list circle-social">
            <li class="twitter-color"><a href="http://twitter.com/home?status<?php echo urlencode(get_permalink($post->ID)); ?>" title="share with twitter" class="tooltip"><i class="social-twitter"></i></a></li>
            <li class="facebook-color"><a href="http://www.facebook.com/share.php?u<?php echo urlencode(get_permalink($post->ID)); ?>" title="share on facebook" class="tooltip"><i class="social-facebook"></i></a></li>
            <li class="googleplus-color"><a href="https://plus.google.com/share?&url=<?php echo get_permalink($post->ID); ?>" title="share with google+" class="tooltip"><i class="social-googleplus"></i></a></li>
        </ul>
    </div>
  <?php
}


/*====================================================================================================
Popular News
======================================================================================================*/
function indonez_popular_news($title="", $num=3, $disableimg="") {
  global $post;
  
  if ($title!="") echo $title;
  ?>
  
  <ul class="popular-list">
  <?php
  query_posts(array('posts_per_page'=>$num,'orderby'=>'comment_count'));
  while (have_posts()) : the_post();
  ?>
    <li>
    
		<?php if( has_post_thumbnail() && $disableimg==false) : ?>
                <?php the_post_thumbnail( 'custom-small-image', array('class'=>''));?>
        <?php endif;?>
            
        <div class="popularcoltext">
        <p class="popular-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
        <p class="author-name"><?php _e('By : ','indonez');?><?php the_author_posts_link();?></p>
         <?php if ( comments_open()) : ?>
        <p class="comment-count"><?php comments_popup_link("",__('Comment : 1','indonez'),__('Comments : % ','indonez'));?></p>
        <?php endif; ?>
        </div>
        
    </li> 
    <?php endwhile; wp_reset_query();?>
    </ul>
    <div class="clear"></div>
    <?php
}

/*====================================================================================================
Recent News
======================================================================================================*/
function indonez_recent_news($title="", $num=3, $disableimg="", $category="") {
  global $post;
  
  if ($title!="") echo $title;
  ?>
  <ul class="popular-list">
  <?php
  query_posts(array('cat'=>$category,'posts_per_page'=>$num,'orderby'=>'post_date'));
  while (have_posts()) : the_post();
  ?>
    <li>
    
		<?php if( has_post_thumbnail() && $disableimg==false) : ?>
                <?php the_post_thumbnail( 'custom-small-image', array('class'=>''));?>
        <?php endif; ?>
            
        <div class="popularcoltext">
        <p class="popular-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
        <p class="author-name"><?php _e('By : ','indonez');?><?php the_author_posts_link();?></p>
        <?php if ( comments_open() ) : ?>
        <p class="comment-count"><?php comments_popup_link("",__('Comment : 1','indonez'),__('Comments : % ','indonez'));?></p>
        <?php endif; ?>
        </div>
        
    </li> 
    <?php endwhile; wp_reset_query();?>
    </ul>
    <div class="clear"></div>
    <?php
}


/*====================================================================================================
Portfolio Function
======================================================================================================*/
function indonez_portfolio($type="", $showposttitle="", $showpostdesc="", $showpost="", $colnumber="", $cat_id=""){
	global $post, $smof_data;
	
	if($colnumber==2):
	    $col =2;
		$container ="three-up";
	
	elseif($colnumber==3):
	    $col =3;
		$container ="three-up";
	
	elseif($colnumber==4):
	    $col =4;
		$container ="four-up";
		
	endif;
	
	$portfolio_order = ($smof_data['portfolio_order']) ? $smof_data['portfolio_order'] : "date";
	$showdesc = $smof_data['portfolio_desc'];
	$showtitle = $smof_data['portfolio_title'];
	
	$getcat = explode(',',$cat_id);
	query_posts(array(
	'post_type' => 'portfolio',
	'posts_per_page' => $showpost,
	'orderby' => $portfolio_order,
	'order'=> 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'portfolio_category',
			'terms' => $getcat,
			'field' => 'term_id',
		)
	)
	));
	
	$out='';
	
	if(have_posts()) :
	
	if($type=="filter"){
    $out.='<div id="pf-filter">';
        $out.='<ul>';
		  $out.='<li><i class="icon-menu"></i></li>';
          $out.='<li>&nbsp;<a href="" class="selected" data-filter="*">'.__('All','indonez').'</a></li>';
		 
		  $getpfcat = explode(',',$cat_id);
		  
		   foreach ($getpfcat as $pfcat) {
		   $cat = get_term($pfcat, 'portfolio_category');
		   $out.='<li class="'.$cat->name.'"><a href="" data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
		   }
		   
        $out.='</ul>';
	$out.='</div><div class="clear"></div>';
	}
	
	
	if($type=="gallery"){
	 $class ="block-grid-nomargin";
	 $class2 = "teaser-gallery";
	 $class3 = "teaser-gallery-box";
	}else{
	 $class ="block-grid";
	 $class2 = "teaser";
	 $class3 = "teaser-preview-box";
	}
	
    if($type=="gallery"){
    $out.='<ul class="pfgallery '.$class.' '.$container.'">';
	}else{
	$out.='<ul class="pffilterable pf-container '.$class.' '.$container.'">';
	}
	
		  
		  while ( have_posts() ) : the_post();
		  
		    $prefix = 'indonez_';
			$pf_link = get_post_meta($post->ID, $prefix . 'portfolio_link', true );
			$thumb   = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
			$pf_url = get_post_meta($post->ID, $prefix . 'portfolio_url', true );
			
			
			$args = array(
				'order'          => 'ASC',
				'post_type'      => 'attachment',
				'post_parent'    => $post->ID,
				'post_mime_type' => 'image',
				'post_status'    => null,
				'orderby'		 => 'menu_order',
				'numberposts'    => -1,
			);
			
			$attachments = get_posts( $args );
			
			if ($attachments) {
			
				foreach ( $attachments as $attachment ) {
					$attachment_url = wp_get_attachment_image_src( $attachment->ID , 'portfolio-image' );
					$image = $attachment_url[0];
				 }
				 
				if($pf_link!=""){$link=$pf_link;}else{$link=$img_url;}
				
				
				$out.='<li class="';
				$myterms = get_the_terms($post->ID,'portfolio_category');
				foreach ($myterms as $myterm ) {
				 $out.= $myterm->slug." ";
				}
								           
				$out.='">';
				        $out.='<div class="shape">';
						$out.='<div class="overlay hexagon"></div>'; 
						$out.='<div class="'.$class2.'">';                                               
                            $out.='<div class="'.$class3.'">';
                                    
                                $out.='<div class="lightbox-item">'; 
                                    $out.='<img src="'.$image.'" alt="'.get_the_title().'">';
                                    $out.='<div class="lightbox-item-overlay-content">'; 
									
										if($type=="gallery"){
											if($showtitle=="1" || $showposttitle=="yes"){
											$out.='<h6>'.get_the_title().'</h6>';
											}
											$excerpt = get_the_excerpt();
											if($showdesc=="1" && has_excerpt($post->ID) && $showpostdesc!="no"){
											$out.='<p>'.$excerpt.'</p>';
											}
										
										}else{
										
											if($showtitle=="1" || $showposttitle=="yes"){
											
											$out.='<h6>'.get_the_title().'</h6>';
											
											}
											
											
											$excerpt = get_the_excerpt();
											if($showdesc=="1" && has_excerpt($post->ID) && $showpostdesc!="no"){
											$out.='<hr/>';
											$out.='<p>'.$excerpt.'</p>';
											}
										
										}
										
										
									
                                        $out.='<a class="preview fancybox" href="'.$link.'" data-fancybox-group="pf-gallery" title="'. get_the_title().'"><i class="icon-search"></i></a>';
										
										if($pf_url!=""){
										$out.='<a class="permalink" href="'.$pf_url.'" target="_blank"><i class="icon-link"></i></a>';
										}else{
										$out.='<a class="permalink" href="'.get_permalink().'"><i class="icon-link"></i></a>';
										}
										
                                    $out.='</div>'; 
                                $out.='</div>'; 
                                    
                            $out.='</div>';
							
							
                        $out.='</div>';				 
						$out.='</div>';	  
					
				$out.='</li>';
			 }
			 
		  
		  endwhile; wp_reset_query();
  $out.='</ul>';
  endif;
  
  return $out;
        
}



/*====================================================================================================
Related Portfolio Function
======================================================================================================*/
function indonez_get_related_portfolio($title="Related Portfolio") {
  global $post,$smof_data;
  
	$showdesc = $smof_data['portfolio_desc'];
  	
    
    $myterms = get_the_terms($post->ID,'portfolio_category');
    foreach ($myterms as $myterm ) {
      query_posts(array( 'post_type' => 'portfolio', 'showposts' =>-1,'portfolio_category'=>$myterm->slug,'orderby'=>'date', 'post__not_in' => array( $post->ID)));
    }
	
	if ($title !="") {
	    $out='<div class="twelve column">'; 
		$out.='<h3 class="title-line"><span>'.$title.'</span></h3>';
		$out.='</div>';
	}
	
	
	
	while ( have_posts() ) : the_post(); 
	
	$prefix = 'indonez_';
	$pf_link = get_post_meta($post->ID, $prefix . 'portfolio_link', true );
	$thumb   = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
	$pf_url = get_post_meta($post->ID, $prefix . 'portfolio_url', true );
	$get_image =  wp_get_attachment_image_src($thumb,'portfolio-image' );
	$image =  $get_image[0];
	
	if($pf_link!=""){$link=$pf_link;}else{$link=$img_url;}
	
	$out.='<div class="three column text-center mobile-two">';
	$out.='<div class="shape">';
			$out.='<div class="overlay hexagon"></div>';
			$out.='<div class="teaser">';                                               
				$out.='<div class="teaser-preview-box">';
						
					$out.='<div class="lightbox-item">'; 
						$out.='<img src="'.$image.'" alt="'.get_the_title().'">';
						$out.='<div class="lightbox-item-overlay-content">'; 
						
							$out.='<h6>'.get_the_title().'</h6>';
							
							$excerpt = get_the_excerpt();
							if($showdesc=="1" && has_excerpt($post->ID)){
							$out.='<hr/>';
							$out.='<p>'.$excerpt.'</p>';
							}
							
							$out.='<a class="preview fancybox" href="'.$link.'" data-fancybox-group="pf-gallery" title="'. get_the_title().'"><i class="icon-search"></i></a>';
							
							if($pf_url!=""){
							$out.='<a class="permalink" href="'.$pf_url.'" target="_blank"><i class="icon-link"></i></a>';
							}else{
							$out.='<a class="permalink" href="'.get_permalink().'"><i class="icon-link"></i></a>';
							}
							
						$out.='</div>'; 
					$out.='</div>'; 
						
				$out.='</div>';
			$out.='</div>';				 
	$out.='</div>';
	$out.='</div>';
	
	endwhile; wp_reset_query();
	
	
	
	return $out;
 
}

/*====================================================================================================
Detect File Extension
======================================================================================================*/
function detect_ext($file) {
  $ext = pathinfo($file, PATHINFO_EXTENSION);
  return $ext;
}


/*====================================================================================================
Get Quicktime file
======================================================================================================*/
function is_quicktime($file) {
  $quicktime_file = array("mov","3gp","mp4");
  if (in_array(pathinfo($file, PATHINFO_EXTENSION),$quicktime_file)) {
    return true;
  } else {
    return false;
  }
}

/*====================================================================================================
Get Flash file
======================================================================================================*/
function is_flash($file) {
  if (pathinfo($file, PATHINFO_EXTENSION) == "swf") {
    return true;
  } else {
    return false;
  }
}


/*====================================================================================================
Get Vimeo Video ID
======================================================================================================*/
function vimeo_videoID($url) {
	if ( 'http://' == substr( $url, 0, 7 ) ) {
		preg_match( '#http://(www.vimeo|vimeo)\.com(/|/clip:)(\d+)(.*?)#i', $url, $matches );
		if ( empty($matches) || empty($matches[3]) ) return __('Unable to parse URL', 'ovum');

		$videoid = $matches[3];
		return $videoid;
	}
}

function is_vimeo($file) {
  if (preg_match('/vimeo/i',$file)) {
    return true;
  } else {
    return false;
  }
}


/*====================================================================================================
Get Youtube Video
======================================================================================================*/
function youtube_videoID($url) {
	preg_match( '#http://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(watch\?v=|w/\?v=|\?v=)([\w-]+)(.*?)#i', $url, $matches );
	if ( empty($matches) || empty($matches[3]) ) return __('Unable to parse URL', 'ovum');
  
  $videoid = $matches[3];
	return $videoid;
}

function is_youtube($file) {
  if (preg_match('/youtube/i',$file)) {
    return true;
  } else {
    return false;
  }
}



/*====================================================================================================
Custom thumbnail for custom post types column
======================================================================================================*/
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
 
function fb_AddThumbColumn($cols) {
 
$cols['thumbnail'] = __('Thumbnail','indonez');
 
return $cols;
}
 
function fb_AddThumbValue($column_name, $post_id) {
 
$width = (int) 100;
$height = (int) 100;
 
if ( 'thumbnail' == $column_name ) {
  // thumbnail of WP 2.9
  $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
  // image from gallery
  $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
  if ($thumbnail_id)
  $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
  elseif ($attachments) {
    foreach ( $attachments as $attachment_id => $attachment ) {
      $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
    }
  }
    if ( isset($thumb) && $thumb ) {
    echo $thumb;
    } else {
    echo __('None','indonez');
    }
  }
}
 
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
 
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );

// for Portfolio
add_filter( 'manage_portfolio_columns', 'fb_AddThumbColumn' );
add_action( 'manage_portfolio_custom_column', 'fb_AddThumbValue', 10, 2 );

// for client
add_filter( 'manage_client_columns', 'fb_AddThumbColumn' );
add_action( 'manage_client_custom_column', 'fb_AddThumbValue', 10, 2 );

// for team
add_filter( 'manage_team_columns', 'fb_AddThumbColumn' );
add_action( 'manage_team_custom_column', 'fb_AddThumbValue', 10, 2 );
}


add_filter('manage_edit-portfolio_columns', 'portfolio_columns');
function portfolio_columns($columns) {
    $columns['category'] = 'Portfolio Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'portfolio_show_columns');
function portfolio_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-client_columns', 'client_columns');
function client_columns($columns) {
    $columns['category'] = 'Client Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'client_show_columns');
function client_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'client_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-team_columns', 'team_columns');
function team_columns($columns) {
    $columns['category'] = 'Team Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'team_show_columns');
function team_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'team_category', '', ', ', '' );
            echo $cats;
    }
}

/*====================================================================================================
Google Analytics
======================================================================================================*/
function google_analytics(){
  global $smof_data;
	$google_analytics =  $smof_data['google_analytics'];
	if ( $google_analytics <> "" ) 
		echo stripslashes($google_analytics) . "\n";
}
add_action('wp_footer','google_analytics');


/*====================================================================================================
Highlight Parent Menu in Single Page
======================================================================================================*/
function indonez_current_nav_class($classes, $item) {

    $post_type = get_query_var('post_type');
	
	// Removes current_page_parent class from blog menu item
	 if (is_singular($post_type) == $post_type )
        $classes = array_diff($classes, array( 'current_page_parent' ));
	
	// This adds a current_page_parent class to the parent menu item
    if ($item->xfn != '' && $item->xfn == $post_type) {

        array_push($classes, 'current-menu-item');

    };
	

    return $classes;

}
add_filter('nav_menu_css_class', 'indonez_current_nav_class', 10, 2 );



/*====================================================================================================
Show Metabox on Spesific Page
======================================================================================================*/
add_action('admin_head', 'indonez_show_metabox_on_page');

function indonez_show_metabox_on_page() {
    global $current_screen;
    if('page' != $current_screen->id) return;
	
    echo '<script type="text/javascript">
        jQuery(document).ready( function($) {

            if($("#page_template").val() == "page-templates/template-portfolio.php") {
                $("#indonez_page_portfolio_option").show();
            } else {
                $("#indonez_page_portfolio_option").hide();
            }
			
            if (typeof console == "object") 
                console.log ("default value = " + $("#page_template").val());

            $("#page_template").live("change", function(){
			
				if($(this).val() == "page-templates/template-portfolio.php") {
					$("#indonez_page_portfolio_option").show();
				} else {
					$("#indonez_page_portfolio_option").hide();
				}
				
                if (typeof console == "object") 
                    console.log ("live change value = " + $(this).val());
            });                 
        }); 
		   
        </script>';
}
?>