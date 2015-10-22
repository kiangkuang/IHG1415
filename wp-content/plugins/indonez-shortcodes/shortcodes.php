<?php
function idz_run_shortcode( $content ) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
	
	add_shortcode('idz_row', 'indonez_func_row');
	add_shortcode('idz_col_full', 'indonez_func_col_full');
	add_shortcode('idz_col_12', 'indonez_func_col_12');
	add_shortcode('idz_col_13', 'indonez_func_col_13');
	add_shortcode('idz_col_14', 'indonez_func_col_14');
	add_shortcode('idz_col_16', 'indonez_func_col_16');
	add_shortcode('idz_col_23', 'indonez_func_col_23');
	add_shortcode('idz_col_34', 'indonez_func_col_34');
	add_shortcode('idz_col_125_3', 'indonez_func_col_125_3');
	add_shortcode('idz_col_275_3', 'indonez_func_col_275_3');
	add_shortcode('idz_spacer', 'indonez_func_spacer');
    add_shortcode('idz_button', 'indonez_func_button');
    add_shortcode('idz_alert', 'indonez_func_alert');
    add_shortcode('idz_toggle', 'indonez_func_toggle');
    add_shortcode('idz_accordion', 'indonez_func_accordion');
    add_shortcode('idz_tab', 'indonez_func_tab' );
    add_shortcode('idz_div', 'indonez_func_div_html');
    add_shortcode('idz_end_div', 'indonez_func_div_closed_html');
    add_shortcode('idz_dropcap', 'indonez_func_drop_cap');
    add_shortcode('idz_pullquote', 'indonez_func_pullquote');
    add_shortcode('idz_table', 'indonez_func_table');
    add_shortcode('idz_paragraph', 'indonez_func_paragraph_text');
    add_shortcode('idz_highlight', 'indonez_func_highlight_text');
    add_shortcode( 'idz_pricing', 'indonez_func_pricing_table_shortcode' );
    add_shortcode( 'idz_pricing_item', 'indonez_func_pricing_shortcode' );
    add_shortcode('idz_custom_heading', 'indonez_func_custom_heading');
    add_shortcode('idz_list', 'indonez_func_list_style');
    add_shortcode('idz_progress_bar', 'indonez_func_progress_bar');
    add_shortcode('idz_note', 'indonez_func_note');
    add_shortcode('idz_icon', 'indonez_func_icons');
    add_shortcode("idz_video", "indonez_func_video");
    add_shortcode('idz_promobox', 'indonez_func_promobox');
    add_shortcode('idz_testimonial_carousel', 'indonez_func_carousel_testimonial');
    add_shortcode('idz_team_list','indonez_func_team_list_shortcode');
    add_shortcode('idz_client_list','indonez_func_client_list_shortcode');
    add_shortcode('idz_portfolio', 'indonez_func_recent_portfolio_shortcode');
    add_shortcode('idz_portfolio_carousel', 'indonez_func_recent_portfolio_carousel_shortcode');
    add_shortcode('idz_twitter', 'indonez_func_twitter');
    add_shortcode('idz_wrapbox', 'indonez_func_wrapbox');
    add_shortcode('idz_blogpost', 'indonez_func_blogposts');
    add_shortcode('idz_gmap','indonez_func_shortcode_googlemap');
	
	
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}
add_filter( 'the_content', 'idz_run_shortcode', 7 );

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_row')) {
function indonez_func_row( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	
	return '<div class="idz_row '.$class.'">'. do_shortcode($content) .'</div>';
}
add_shortcode('idz_row', 'indonez_func_row');
}

if (!function_exists('indonez_func_col_full')) {
function indonez_func_col_full( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	
	return '<div class="twelve idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_full', 'indonez_func_col_full');
}

if (!function_exists('indonez_func_col_12')) {
function indonez_func_col_12( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));

   return '<div class="six idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_12', 'indonez_func_col_12');
}

if (!function_exists('indonez_func_col_13')) {
function indonez_func_col_13( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	return '<div class="four idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_13', 'indonez_func_col_13');
}

if (!function_exists('indonez_func_col_14')) {
function indonez_func_col_14( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	return '<div class="three idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_14', 'indonez_func_col_14');
}

if (!function_exists('indonez_func_col_16')) {
function indonez_func_col_16( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	return '<div class="two idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_16', 'indonez_func_col_16');
}

if (!function_exists('indonez_func_col_23')) {
function indonez_func_col_23( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	return '<div class="eight idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_23', 'indonez_func_col_23');
}


if (!function_exists('indonez_func_col_34')) {
function indonez_func_col_34( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
	return '<div class="nine idz_column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_34', 'indonez_func_col_34');
}

if (!function_exists('indonez_func_col_125_3')) {
function indonez_func_col_125_3($atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
   return '<div class="five column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_125_3', 'indonez_func_col_125_3');
}

if (!function_exists('indonez_func_col_275_3')) {
function indonez_func_col_275_3($atts, $content = null ) {
	extract(shortcode_atts(array(
		'class'	=> '',
	), $atts));
   return '<div class="seven column '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_col_275_3', 'indonez_func_col_275_3');
}


/*-----------------------------------------------------------------------------------*/
/*	Spacer
/*-----------------------------------------------------------------------------------*/
function indonez_func_spacer( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'height' => false,
		'color'  => ''
	), $atts));
	
  	
	
	return '<div class="spacer" style="height:'.$height.'px; clear:both; display:block; margin:0 18px 20px 18px; padding:0; background:'.$color.'">&nbsp;</div>';
}
add_shortcode('idz_spacer', 'indonez_func_spacer');



/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('indonez_func_button')) {
	function indonez_func_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'color' => 'grey',
			'size' => 'small',
			'type' => 'round'
	    ), $atts));
		
	   return '<a target="'.$target.'" class="idz-button '.$size.' '.$color.' '. $type .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('idz_button', 'indonez_func_button');
}

/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_alert')) {
	function indonez_func_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'type'   => ''
	    ), $atts));
		
		if($type=="info"){
		$geticon ='<i class="icon-info-sign"></i>';
		}elseif($type=="success"){
		$geticon ='<i class="icon-ok"></i>';
		}elseif($type=="warning"){
		$geticon ='<i class="icon-warning-sign"></i>';
		}elseif($type=="error"){
		$geticon ='<i class="icon-remove"></i>';
		}else{
		$geticon ='';
		}
		
	   return '<div class="idz-alert '.$type.'">' . $geticon . do_shortcode($content) . '</div>';
	}
	add_shortcode('idz_alert', 'indonez_func_alert');
}


/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_toggle')) {
	function indonez_func_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"idz-toggle\"><span class=\"idz-toggle-title\">". $title ."</span><div class=\"idz-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('idz_toggle', 'indonez_func_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Accordion Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_accordion')) {
	function indonez_func_accordion( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
	    ), $atts));
	
		return "<div class=\"idz-accordion\"><span class=\"idz-accordion-title\">". $title ."</span><div class=\"idz-accordion-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('idz_accordion', 'indonez_func_accordion');
}

/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('indonez_func_tabs')) {
	function indonez_func_tabs( $atts, $content = null ) {
		$defaults = array();
		extract(shortcode_atts(array(
		'menu_position' => 'top'
		), $atts));
		
		
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="idz-tabs-'. $i .'" class="idz-tabs '.$menu_position.'"><div class="idz-tab-inner">';
			$output .= '<ul class="idz-nav idz_clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#idz-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode('idz_tabs', 'indonez_func_tabs' );
}

if (!function_exists('indonez_func_tab')) {
	function indonez_func_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div class="idz-tab-container"><div id="idz-tab-'. sanitize_title( $title ) .'" class="idz-tab">'. do_shortcode( $content ) .'</div></div>';
	}
	add_shortcode( 'idz_tab', 'indonez_func_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*	DIV Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_div_html')) {
function indonez_func_div_html($atts, $content = null ) {
	extract(shortcode_atts(array('class' => '', 'id' => '' ), $atts));
	$return = '<div';
	if (!empty($class)) $return .= ' class="'.$class.'"';
	if (!empty($id)) $return .= ' id="'.$id.'"';
	$return .= '>' . do_shortcode($content);
	return $return;
}
add_shortcode('idz_div', 'indonez_func_div_html');
}

if (!function_exists('indonez_func_div_closed_html')) {
function indonez_func_div_closed_html($atts) {
	return '</div>';
}
add_shortcode('idz_end_div', 'indonez_func_div_closed_html');
}



/*-----------------------------------------------------------------------------------*/
/*	Dropcaps
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_drop_cap')) {
function indonez_func_drop_cap( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'    	 => 'round'
	), $atts));
	return '<p><span class="idz-dropcap '.$type.'">' . do_shortcode($content) . '</span></p>';
}
add_shortcode('idz_dropcap', 'indonez_func_drop_cap');
}

/*-----------------------------------------------------------------------------------*/
/*	Pullquote
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_pullquote')) {
function indonez_func_pullquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'align'    	 => 'left'
	), $atts));
	return '<span class="idz-pullquote '.$align.'">' . do_shortcode($content) . '</span>';
}
add_shortcode('idz_pullquote', 'indonez_func_pullquote');
}

/*-----------------------------------------------------------------------------------*/
/*	Tables
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_table')) {
function indonez_func_table( $atts, $content = null ) {
  extract(shortcode_atts(array(
        'color'      => ''
    ), $atts));
    
	$content = "<div class=\"idz-table $color\">".str_replace('<table>', '<table class="table">', do_shortcode($content))."</div>";
	return $content;
	
}
add_shortcode('idz_table', 'indonez_func_table');
}

/*-----------------------------------------------------------------------------------*/
/*	Paragraph Text
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_paragraph_text')) {
function indonez_func_paragraph_text( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'class'  => ''
	), $atts));
   
   if($class!=""){	
   return '<p class="'.$class.'">' . do_shortcode($content) . '</p>';
   }else{
   return '<p>' . do_shortcode($content) . '</p>';
   }
}
add_shortcode('idz_paragraph', 'indonez_func_paragraph_text');
}

/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_highlight_text')) {
function indonez_func_highlight_text( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'color'  => ''
	), $atts));
	
   return '<span class="highlight '.$color.'">' . do_shortcode($content) . '</span>';
}
add_shortcode('idz_highlight', 'indonez_func_highlight_text');
}

/*-----------------------------------------------------------------------------------*/
/*	Pricing Tables
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_pricing_table_shortcode')) {
function indonez_func_pricing_table_shortcode( $atts, $content = null  ) {
  
  extract( shortcode_atts( array(
		'column' => '2',
	), $atts ) );
	
	//set variables
	if($column == '2') {
		$column_size = 'two-up';
	}
	if($column =='3') {
		$column_size = 'three-up';
	}
	if($column =='4') {
		$column_size = 'four-up';
	}
	$out = '<ul class="pricing-grid '.$column_size.'">'; 
	$out .= do_shortcode($content);
	$out .= '</ul>';

	return $out;
}
add_shortcode( 'idz_pricing', 'indonez_func_pricing_table_shortcode' );
}

if (!function_exists('indonez_func_pricing_shortcode')) {
function indonez_func_pricing_shortcode( $atts, $content = null  ) {
	
	extract( shortcode_atts( array(
		'title' => '',
		'price_symbol' => '',
		'price' => '',
		'per' => '',
		'subtitle' => '',
		'button_url' => '',
        'button_color' => 'grey',
		'button_text' => 'Order',
		'featured' => 'no',
		'featured_color' => ''
	), $atts ) );
	
   if($featured=="yes"){
    $addclass ="featured-plan";
   }else{
    $addclass ="";
   }
   
   if($featured_color=="green"){
    $addcolor ="green-plan";
   }elseif($featured_color=="orange"){
   	$addcolor ="orange-plan";
   }elseif($featured_color=="blue"){
   	$addcolor ="blue-plan";
   }elseif($featured_color=="red"){
   	$addcolor ="red-plan";
   }else{
    $addcolor ="";
   }
	
  $pricing_content = '';
  
  $pricing_content .= '<li class="pricing-column '.$addcolor.' '.$addclass.'">';
  $pricing_content .= '<h6 class="pricing-title">'.$title.'</h6>';
  $pricing_content .= '<div class="pricing-price">';
  $pricing_content .= '<h1><span class="dollar">'. $price_symbol. '</span>'. $price .'<span class="permonth">'.$per.'</span></h1>';
  $pricing_content .= '<p>'.$subtitle.'</p> ';
  $pricing_content .= '</div>';                 
  $pricing_content .= '<div class="pricing-content">' . do_shortcode($content) . '</div>';                
  $pricing_content .= '<div class="pricing-button">';
  $pricing_content .= '<a href="'. $button_url .'" class="button medium '. $button_color .'">'. $button_text .'</a>';
  $pricing_content .= '</div>';                  
  $pricing_content .= '</li>';
  
	return $pricing_content;
}
add_shortcode( 'idz_pricing_item', 'indonez_func_pricing_shortcode' );
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Heading
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_custom_heading')) {
function indonez_func_custom_heading( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'tag' => 'h3',
		'class' => 'title-line'
	), $atts));
  	
	
	return '<'.$tag.' class="'.$class.'"><span>'.do_shortcode($content).'</span></'.$tag.'>';
}
add_shortcode('idz_custom_heading', 'indonez_func_custom_heading');
}

/*-----------------------------------------------------------------------------------
  List Styles 
-----------------------------------------------------------------------------------*/	
if (!function_exists('indonez_func_list_style')) {
function indonez_func_list_style( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'type'  => '',
		'class'  => ''
	), $atts));
	
	$content = str_replace('<ul>', '<ul class="'.$type.' '.$class.'">', do_shortcode($content));
	return do_shortcode($content);
	
}
add_shortcode('idz_list', 'indonez_func_list_style');
}

/*-----------------------------------------------------------------------------------
  Progress Bar
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_progress_bar')) {
function indonez_func_progress_bar($atts,$content=null) {
  extract(shortcode_atts(array(
    "title" => '',
	"color" => 'grey',
    "value" => '',
	"type" => 'default'
	
  ),$atts));
   
    $out='';
	if($type=="circle"){
		$out .='<div class="circular-bar-'.$color.' donutalign" data-percent="'.$value.'"></div>';
		$out .='<p>'.$title.'</p>';
	}else{
	$out .='<div class="progress-bar '.$color.'" data-percent="'.$value.'">';
		$out .='<div></div>';
		$out .='<span class="progress-title">'.$title.'</span>';
	$out .='</div>';
	}
	
	return $out;
}
add_shortcode('idz_progress_bar', 'indonez_func_progress_bar');
}

/*-----------------------------------------------------------------------------------
  Note
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_note')) {
function indonez_func_note( $atts, $content = null ) {
  extract(shortcode_atts(array(
		'color'	=> '',
		'class'	=> ''
		
	), $atts));
	
	if($color=="green"){
		$addclass ="note-folded green";
	}elseif($color=="blue"){
		$addclass ="note-folded blue";
	}elseif($color=="orange"){
		$addclass ="note-folded orange";
	}elseif($color=="red"){
		$addclass ="note-folded red";
	}elseif($color=="grey"){
		$addclass ="note-folded";
	}else{
		$addclass ="note";
	}
	
	return '<div class="'.$addclass.' '.$class.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('idz_note', 'indonez_func_note');
}


/*-----------------------------------------------------------------------------------
  Icons
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_icons')) {
function indonez_func_icons( $atts, $content = null ) {
  extract(shortcode_atts(array(
		'name'	=> '',
		'size'	=> '',
		'link'	=> '',
		'blank'	=> '',
		'class' => ''
		
	), $atts));
	
	if($blank==1){
	 $target ="target=_blank";
	}else{
	 $target ="";
	}
	
	if($link!=""){
	return '<a href="'.$link.'" '.$target.'><i class="'.$name.' '.$size.' '.$class.'"></i></a>';
	}else{
	return '<i class="'.$name.' '.$size.' '.$class.'"></i>';
	}
}
add_shortcode('idz_icon', 'indonez_func_icons');
}


/*-----------------------------------------------------------------------------------
  Video
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_video')) {
function indonez_func_video( $attr, $content = null ) {
	extract(shortcode_atts(array(
		'type' => '',
		'id' => '',
	), $attr));
	
	$output  = '<div class="video-container-shortcode">';
	
	if($type=="vimeo"){
	$output .= '<iframe src="http://player.vimeo.com/video/'. $id .'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'."\n";
	}elseif($type=="youtube"){
	$output .= '<iframe src="http://www.youtube.com/embed/'. $id .'" frameborder="0" allowfullscreen></iframe>'."\n";
	}
	
	$output .= '</div>';
	
	return $output;
}
add_shortcode("idz_video", "indonez_func_video"); 
}

/*-----------------------------------------------------------------------------------
  Promo Box
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_promobox')) {
function indonez_func_promobox( $atts, $content = null ) {
  extract(shortcode_atts(array(
		'color'	=> '',
		'button_text'	=> '',
		'button_url'	=> '',
		'blank'	=> '',
		'class'	=> ''
		
	), $atts));
	
	if($blank==1){
	  $target='_blank';
	}else{
	  $target='_self';
	}
	
	if($button_text!=""){
	  $class="withbutton";
	}else{
	  $class="nobutton";
	}
	
	$output ='<div class="promo-box '.$color.' '.$class.'">';
	$output .='<div class="promo-text '.$class.'">';
	$output .= do_shortcode($content);	
	$output .='</div>';
	if($button_text!=""){
	$output .='<div class="promo-button '.$color.'">';
	$output .= '<h3><a href="'.$button_url.'" target="'.$target.'">'.$button_text.'<i class="icon-chevron-right"></i></a></h3>';	
	$output .='</div>';
	}
	
	$output .='</div>';
	
	return $output;
}
add_shortcode('idz_promobox', 'indonez_func_promobox');
}


/*-----------------------------------------------------------------------------------
  Testimonial
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_testimonial')) {
function indonez_func_testimonial( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'column'	=> '',
		'showpost'	=> '',
		'ids'	=> ''
	), $atts));
	
	return func_testimonial_indonez($column, $showpost, $ids);
}
add_shortcode('idz_testimonial', 'indonez_func_testimonial');
}

if (!function_exists('indonez_func_carousel_testimonial')) {
function indonez_func_carousel_testimonial( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'section'	=> '',
		'ids'	=> ''
	), $atts));
	
	return func_carousel_testimonial_indonez($section, $ids);
}
add_shortcode('idz_testimonial_carousel', 'indonez_func_carousel_testimonial');
}


/*-----------------------------------------------------------------------------------
  Team
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_team_list_shortcode')) {
function indonez_func_team_list_shortcode($atts,$content=null) {
	global $post;
extract(shortcode_atts(array(
	"title" => '',
	"category" => '',
	"column" => '',
	"showpost" => ''
	),$atts));

return func_team_list_indonez($title,$category,$column,$showpost);
}
add_shortcode('idz_team_list','indonez_func_team_list_shortcode');
}


/*-----------------------------------------------------------------------------------*/
/*	Client
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_client_list_shortcode')) {
function indonez_func_client_list_shortcode($atts,$content=null) {
	global $post;

extract(shortcode_atts(array(
	"section" => '',
	"category" => ''
	),$atts));

return func_client_list_indonez($section, $category);
}
add_shortcode('idz_client_list','indonez_func_client_list_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	Portfolio
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_recent_portfolio_shortcode')) {
function indonez_func_recent_portfolio_shortcode( $atts, $content = null ) {
 
  extract(shortcode_atts(array(
        'type'	=>'',
		'showposttitle'	=>'yes',
		'showpostdesc'=> 'yes',
		'showpost'=> '',
		'colnumber'=> '',
		'cat_id'	=> '',
		'shape'=> '',
		'shownav'=> ''
		
	), $atts));
	
	return func_recent_portfolio_indonez($type, $showposttitle, $showpostdesc, $showpost, $colnumber, $cat_id, $shape, $shownav);
	
}
add_shortcode('idz_portfolio', 'indonez_func_recent_portfolio_shortcode');
}

if (!function_exists('indonez_func_recent_portfolio_carousel_shortcode')) {
function indonez_func_recent_portfolio_carousel_shortcode( $atts, $content = null ) {
 
  extract(shortcode_atts(array(
        'section'	=>'',
		'cat_id'	=> ''
	), $atts));
	
	return func_recent_portfolio_carousel_indonez($section, $cat_id);
	
}
add_shortcode('idz_portfolio_carousel', 'indonez_func_recent_portfolio_carousel_shortcode');
}

/*-----------------------------------------------------------------------------------*/
/*	Twitter
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_twitter')) {
function indonez_func_twitter( $atts, $content = null ) {

	extract(shortcode_atts(array(
		'twitter_id'	=> 'Indoneztheme',
		'max_tweets'	=> '1',
		'consumer_key'	=> '',
		'consumer_secret'	=> '',
		'user_token'	=> '',
		'user_secret'	=> ''
	), $atts));
			
	return '<div class="twitter-box"><div class="twitted">'.func_indonez_get_twitter_timeline($twitter_id, $max_tweets, $consumer_key, $consumer_secret, $user_token, $user_secret).'</div></div>';
	
	
}
add_shortcode('idz_twitter', 'indonez_func_twitter');
}

/*-----------------------------------------------------------------------------------*/
/*	Wrapper Box
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_wrapbox')) {
function indonez_func_wrapbox( $atts, $content = null ) {

  extract(shortcode_atts(array(
		'bg_image'	=> '',
		'bg_color'	=> '#ecf0f1',
		'class'	=> ''
		
	), $atts));
	
	if($bg_image!=""){
	$style='style="background:'.$bg_color.' url('.$bg_image.');"';
	}else{
	$style="";
	}

	return '<div class="wrap-box '.$class.'" '.$style.'><div class="idz_row">' . do_shortcode($content) . '</div><div class="clear"></div></div>';
}
add_shortcode('idz_wrapbox', 'indonez_func_wrapbox');
}


/*-----------------------------------------------------------------------------------*/
/*	Blog Post
/*-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_blogposts')) {
function indonez_func_blogposts( $atts, $content = null ) {
	
  extract(shortcode_atts(array(
		'showpost'=> '3',
		'cat_id'	=> ''
	), $atts));
		
	return func_blog_post_col_indonez($showpost, $cat_id);
}
add_shortcode('idz_blogpost', 'indonez_func_blogposts');
}


/*-----------------------------------------------------------------------------------
  Google Map
-----------------------------------------------------------------------------------*/
if (!function_exists('indonez_func_shortcode_googlemap')) {
function indonez_func_shortcode_googlemap($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		"width" => false,
		"height" => '400',
		"address" => '',
		"latitude" => 0,
		"longitude" => 0,
		"zoom" => 14,
		"html" => '',
		"popup" => 'false',
		"controls" => 'false',
		'pancontrol' => 'true',
		'zoomcontrol' => 'true',
		'maptypecontrol' => 'true',
		'scalecontrol' => 'true',
		'streetviewcontrol' => 'true',
		'overviewmapcontrol' => 'true',
		"scrollwheel" => 'true',
		'doubleclickzoom' =>'true',
		"maptype" => 'ROADMAP',
		"marker" => 'true',
		"class" => '',
		'align' => false,
	), $atts));
	
	if($width){
		if(is_numeric($width)){
			$width = $width.'px';
		}
		$width = 'width:'.$width.';';
	}else{
		$width = '';
		$align = false;
	}
	if($height){
		if(is_numeric($height)){
			$height = $height.'px';
		}
		$height = 'height:'.$height.';';
	}else{
		$height = '';
	}
	
	/* fix */
	$search  = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_DEFAULT_MAP_TYPES', 'G_PHYSICAL_MAP');
	$replace = array('ROADMAP', 'SATELLITE', 'HYBRID', 'HYBRID', 'TERRAIN');
	$maptype = str_replace($search, $replace, $maptype);
	/* end fix */
	
	if($controls == 'true'){
	$controls = '{
	panControl: '.$pancontrol.',
	zoomControl: '.$zoomcontrol.',
	mapTypeControl: '.$maptypecontrol.',
	scaleControl: '.$scalecontrol.',
	streetViewControl: '.$streetviewcontrol.',
	overviewMapControl: '.$overviewmapcontrol.'}';
	}
	
	$align = $align?' align'.$align:'';
	$id = rand(100,1000);
	if($marker != 'false'){
	
		$out ='
		<div class="'.$class.'"><div id="google_map_'.$id.'" class="google_map'.$align.'" style="'.$width.''.$height.'"></div></div>
		<div><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery("#google_map_'.$id.'").bind("initGmap",function(){
				jQuery(this).gMap({
					zoom: '.$zoom.',
					markers:[{
						address: "'.$address.'",
						latitude: '.$latitude.',
						longitude: '.$longitude.',
						html: "'.$html.'",
						popup: '.$popup.'
					}],
					controls: '.$controls.',
					maptype: "'.$maptype.'",
					doubleclickzoom:'.$doubleclickzoom.',
					scrollwheel:'.$scrollwheel.'
				});
				jQuery(this).data("gMapInited",true);
			}).data("gMapInited",false);
			jQuery("#google_map_'.$id.'").trigger("initGmap");
	});
	</script>
	</div>';

}else{
	
	$out ='
	<div class="'.$class.'"><div id="google_map_'.$id.'" class="google_map'.$align.'" style="'.$width.''.$height.'"></div></div>
	<div><script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery("#google_map_'.$id.'").bind("initGmap",function(){
			jQuery("#google_map_'.$id.'").gMap({
				zoom: '.$zoom.',
				latitude: '.$latitude.',
				longitude: '.$longitude.',
				address: "'.$address.'",
				controls: '.$controls.',
				maptype: "'.$maptype.'",
				doubleclickzoom:'.$doubleclickzoom.',
				scrollwheel:'.$scrollwheel.'
			});
			jQuery(this).data("gMapInited",true);
		}).data("gMapInited",false);
		jQuery("#google_map_'.$id.'").trigger("initGmap");
	});
	</script>
	</div>';
}
return $out;
}
add_shortcode('idz_gmap','indonez_func_shortcode_googlemap');
}
?>