<?php
/*====================================================================================================
Testimonial Function
======================================================================================================*/
function func_testimonial_indonez($column="", $showpost="", $ids="") {
global $post, $paged;

if($showpost==""){$showpost="-1";}

if($column=="1"){
 $container ="";
}elseif($column=="2"){
 $container ="six column";
}elseif($column=="3"){
 $container ="four column";
}elseif($column=="4"){
 $container ="three column";
}

if($ids!=""){
$getpostid = explode(',',$ids);
}else{
$getpostid ='';
}

query_posts(array('post_type' => 'testimonial', 'showposts' =>$showpost,'paged' => $paged,'orderby'=>'post_date','order'=>'DESC', 'post__in' => $getpostid));
if(have_posts()):
	
	
	$i=1;
	$out="";
	while (have_posts()) : the_post();
	$prefix ='indonez_';
	$testi_info = get_post_meta($post->ID, $prefix . 'testimonial_info',true) ? get_post_meta($post->ID, $prefix . 'testimonial_info',true) : '';
	$testi_company = get_post_meta($post->ID, $prefix . 'testimonial_company',true) ? get_post_meta($post->ID, $prefix . 'testimonial_company',true) : '';
	
	$out.='<div class="'.$container.'">';
	$out.='<div class="testi-container">';                       	
		$out.='<div class="testi-text">';
			$out.='<blockquote>';
				$out.= '<p>'. get_the_content() . '</p>';
			$out.='</blockquote>';                                                        
		$out.='</div>';
		$out.='<div class="clear"></div>';                                                                     
	$out.='</div>';
	$out.='<div class="testi-baloon"></div>';
	if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
	$out.='<div class="testi-image">';
		$out.= get_the_post_thumbnail($post->ID, 'full');                                                                      
	$out.='</div>';
	}
	
	if($testi_company) {$sep =  '&ndash;';} else{$sep ="";}
	
	$out.='<div class="testi-name">'.get_the_title().'<br/><span class="company-name">'.$testi_info.' '. $sep .' '. $testi_company .'</span></div>';  
	$out.='</div>';    	
	
   if($i%$column==0 && $column > 1){
	$out.= '<div class="spacer"></div>';
	}		  
	
	$i++;
	endwhile; 
	
	wp_reset_query() ;
	
	return $out;
	
endif;   
}


function func_carousel_testimonial_indonez($section, $ids) {
global $post, $paged;


if($ids!=""){
$getpostid = explode(',',$ids);
}else{
$getpostid ='';
}

$getsection = sanitize_title($section);

query_posts(array('post_type' => 'testimonial', 'showposts' =>'-1','paged' => $paged,'orderby'=>'post_date','order'=>'DESC', 'post__in' => $getpostid));
if(have_posts()):
	
	$out="";
	$out.='<div class="list_carousel responsive">';
	$out.='<ul id="'.$getsection.'" class="testi-carousel">';
	while (have_posts()) : the_post();
	$prefix ='indonez_';
	$testi_info = get_post_meta($post->ID, $prefix . 'testimonial_info',true) ? get_post_meta($post->ID, $prefix . 'testimonial_info',true) : '';
	$testi_company = get_post_meta($post->ID, $prefix . 'testimonial_company',true) ? get_post_meta($post->ID, $prefix . 'testimonial_company',true) : '';
	
	
	$out.='<li>'; 
	   
		if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
		$out.='<div class="testi-image">';
			$out.= get_the_post_thumbnail($post->ID, 'full');                                                                      
		$out.='</div>';
		}
	    
		if($testi_company) {$sep =  '&ndash;';} else{$sep ="";}
		               	
		$out.='<div class="testi-text">';
			$out.='<blockquote>';
				$out.= '<p>'. get_the_content() . '</p>';
			$out.='</blockquote>';                                                        
		$out.='</div>';
		$out.='<div class="testi-name">'.get_the_title().'<span> '. $sep .' '. $testi_company .'</span></div>';
		                                                                
	
	$out.='</li>'; 
	
	
	endwhile;
	$out.='</ul>';
	$out.='<div class="clear"></div>'; 
	$out.='<div id="pager-carousel-'.$getsection.'" class="pager"></div>'; 
	$out.='</div>';
	
	$outputjs = '<div><script> 
	jQuery(document).ready(function() {
		jQuery("#'.$getsection.'").carouFredSel({
		responsive: true,
		width: "100%",
		pagination: "#pager-carousel-'.$getsection.'",
		scroll : {
		items           : 1,
		timeoutDuration : 6000,            
		pauseOnHover    : false
		}     
		});	
	});
	</script></div>';
	
	wp_reset_query() ;
	
	return $out . $outputjs;
	
endif;   
}


/*====================================================================================================
Team Function
======================================================================================================*/
function func_team_list_indonez($title="",$category="",$column="",$showpost=-1) {

global $post, $more; $more = 0; 
if($category!=""){
$getcatid = get_term_by('slug', $category, 'team_category');
$thecatslug = $getcatid->slug;
}else{
$thecatslug = "";
}


query_posts(array('team_category' =>$thecatslug, 'post_type' => 'team', 'showposts' => $showpost,'orderby'=>'date','order'=>'DESC'));


if(have_posts()):

		  if($column=="2"):
			  $container ="six column";	  
		  elseif($column=="3"):
			  $container ="four column";
		  elseif($column=="4" || $column==""):
			  $container ="three column";
		  endif;
	  
      	  $i=1;	
	  	  $out="";
		  if($title!=""){
		  $out.='<div class="twelve column">';
		  $out.='<h4 class="smallmargin-bottom2">'.$title.'</h4>';
		  $out.='</div>';
		  }
		  
		  $prefix ='indonez_';
		  while (have_posts()) : the_post();
		  $teaminfo =get_post_meta($post->ID, $prefix . 'team_info',true);
		  $teamfb = get_post_meta($post->ID, $prefix . 'team_fb',true);
		  $teamtwitter = get_post_meta($post->ID, $prefix . 'team_twitter',true);
		  $teamgoogle = get_post_meta($post->ID, $prefix . 'team_google',true);
		  $teamcustom = get_post_meta($post->ID, $prefix . 'team_custom',true);
		  
		  
		  $out.='<div class="'.$container.' mobile-two">';                    	
            	$out.='<div class="teaser">';                                                
                    $out.='<div class="teaser-preview-box">';
                        
						if (function_exists('has_post_thumbnail') && has_post_thumbnail()) :    
                        $out.='<div class="lightbox-item">'; 
                            $out.= get_the_post_thumbnail($post->ID, 'full');
							$out.='<div class="lightbox-item-overlay-content">';
								if($teamfb!=""){
								$out.='<a href="'.$teamfb.'" title="Facebook" target="_blank" class="socialink"><i class="social-facebook"></i></a>';
								}
								
								if($teamtwitter!=""){
								$out.='<a href="'.$teamtwitter.'" title="Twitter" target="_blank" class="socialink"><i class="social-twitter"></i></a>';
								}
								
								if($teamgoogle!=""){
								$out.='<a href="'.$teamgoogle.'" title="Google+" target="_blank" class="socialink"><i class="social-googleplus"></i></a>';
								}
								
								if($teamcustom!=""){
								$out.=stripslashes($teamcustom);
								}
							$out.='</div>';
                        $out.='</div>';
						endif; 
                            
                    $out.='</div>';
                    $out.='<h6 class="bold"><a href="'.get_permalink().'">'.get_the_title().'</a></h6>';
                    $out.='<h6 class="subheader">'.$teaminfo.'</h6>';
                    $out.=  get_the_content();
					
                $out.='</div>';                                       
           $out.='</div>';
		   
		   if($i%$column==0 && $column > 1){
			$out.= '<div class="spacer"></div>';
			}		  
		  
		   $i++; endwhile; wp_reset_query() ;
	
	return $out;
    
  endif;
}

/*====================================================================================================
Client Function
======================================================================================================*/
function func_client_list_indonez($section="",$category="") {
global $post;

if($category!=""){
$getcatid = get_term_by('slug', $category, 'client_category');
$thecatslug = $getcatid->slug;
}else{
$thecatslug ="";
}

$getsection = sanitize_title($section);

query_posts(array('client_category' =>$thecatslug, 'post_type' => 'client', 'showposts' => '-1','orderby'=>'post_date','order'=>'DESC'));
    
	$out='';
if(have_posts()):
	$out.='<div class="list_carousel responsive">';
	$out.='<ul id="'.$getsection.'" class="client-carousel">';
	
	while (have_posts()) : the_post();
	$prefix ='indonez_';
	$client_url = get_post_meta($post->ID, $prefix . 'client_url',true) ? get_post_meta($post->ID, $prefix . 'client_url',true) : get_permalink();
	
	if (function_exists('has_post_thumbnail') && has_post_thumbnail()) :
		if ($client_url !="") :
			 $out.='<li><a href="'.$client_url.'" target="_blank">'.get_the_post_thumbnail($post->ID, 'full', array('class'=>'retina')).'</a></li>';
		endif;
	endif;
	
	 
	endwhile; wp_reset_query() ;
	
	$out.='</ul>';
	$out.='<div class="clear"></div>';
	$out.='<a id="prev-carousel-'.$getsection.'" class="prev" href="#"><i class="icon-chevron-left"></i></a>';
	$out.='<a id="next-carousel-'.$getsection.'" class="next" href="#"><i class="icon-chevron-right"></i></a>';
	$out.='</div>';
	
	$outputjs = '<div><script> 
	jQuery(document).ready(function() {
		jQuery("#'.$getsection.'").carouFredSel({
		auto: false,
		responsive: true,
		width: "100%",
		prev: "#prev-carousel-'.$getsection.'",
		next: "#next-carousel-'.$getsection.'",
		scroll: 1,
		items: {
		width: 160,
		//	height: "30%",	//	optionally resize item-height
		visible: {
		min: 5,
		max: 5
		}
		}
		});
	});
	</script></div>';
	
	return $out . $outputjs;
	
endif;   
}


/*====================================================================================================
Blog Post Function
======================================================================================================*/
function func_blog_post_col_indonez($showpost="", $cat_id="") {
	global $post;
     
	$out=''; 

	$out.='<div class="masorny_col">';
	
	
	query_posts('cat='.$cat_id.'&posts_per_page='.$showpost.'&orderby=date&order=DESC');
	
	
	while (have_posts()) : the_post();
	
		$out.='<div class="four column mobile-two">';
			$out.='<div class="teaser">';
				$out.='<div class="teaser-preview-box">';
				
				 if(has_post_format('gallery')):
				 
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
					
					    $out.='<div class="banner_blog_container">';
						$out.='<div class="banner-blog">';
							$out.='<ul>'; 
								foreach ($attachments as $attachment) {
								$image_attributes = wp_get_attachment_image_src($attachment->ID, 'custom-medium-image');
								$out.='<li data-transition="slidehorizontal"><img src="'.$image_attributes[0].'"></li>';   
								}
							$out.='</ul>';
							$out.='<div class="tp-bannertimer tp-top"></div>';
						$out.='</div>';
						$out.='</div>';
						
				
				elseif(has_post_format('audio')) :
				
						$prefix = 'indonez_';
                        $audio = get_post_meta($post->ID, $prefix . 'audio_embed', true);
						
						
						if($audio):
                            $out.='<audio preload="auto" controls>';
                            $out.='<source src="'.$audio.'">';
                            $out.='</audio>'; 
						endif;
					
					
				elseif(has_post_format('video')) :
				
						$prefix = 'indonez_';
                        $video = get_post_meta($post->ID, $prefix . 'video_embed', true);
						
						if($video):
							if (is_youtube($video)):  
								$out.='<div class="video-container-post"><a href="'.$video.'"  rel="youtube"></a></div>';
							elseif (is_vimeo($video)):
								$out.='<div class="video-container-post"><a href="'.$video.'"  rel="vimeo"></a></div>';
							elseif (is_quicktime($video)):
								$out.='<div class="video-container-post"><a href="'.$video.'"  rel="quicktime"></a></div>';
							elseif (is_flash($video)):
								$out.='<div class="video-container-post"><a href="'.$video.'"  rel="flash"></a></div>';
							else:
							
							endif;
						endif;
					
					
				 elseif(has_post_format('quote')):
				 
						$prefix = 'indonez_';
						$quote_text = get_post_meta($post->ID, $prefix . 'quote_text', true);
						$quote_info_text = get_post_meta($post->ID, $prefix . 'quote_info_text', true);
				 
                        $out.='<div class="note">';
                            $out.='<blockquote><p>'.stripslashes($quote_text).'</p><cite>'.$quote_info_text.'</cite></blockquote>';
                            $out.='<div class="clear"></div>';
                        $out.='</div>';
						
				 elseif(has_post_format('link')) :
				        
						$prefix = 'indonez_';
                        $link = get_post_meta($post->ID, $prefix . 'link_embed', true);
						
						if($link):
						$out.='<div class="note">';
						$out.='<p class="lead">';
                        $out.='<a href="'.$link.'" title="'.$link.'" target="_blank">'.$link.'</a>';
                        $out.='</p>';
						$out.='</div>';
						endif;
				       
				 else:
				 
						if( has_post_thumbnail()) :
								
						$out.= get_the_post_thumbnail( 'custom-medium-image', array('class' => 'max-image') );
						
						endif;
				 
				 endif;
				
				$out.='</div>';//end teaser-preview-box
				
						$out.='<h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>';
						$out.='<h6 class="subheader">'.get_the_time('M d, Y', $post->ID).'</h6>'; 
						if (!has_post_format('quote')): 
						
						$excerpt = get_the_excerpt();
						
						$out.='<p>'.indonez_excerpt_limit_char($excerpt, 50, '...').'</p>';
						endif;
						$out.='<a href="'.get_permalink().'" class="more-link"><span class="button small rdm">'.__('Read More','indonez').'</span></a>';
					
				
				
			$out.='</div>';
		$out.='</div>';
		
	endwhile; wp_reset_query();
		
	$out.='</div>';
	
	
	return $out;
	
}

/*====================================================================================================
Portfolio Function
======================================================================================================*/
function func_recent_portfolio_indonez($type="", $showposttitle="", $showpostdesc="", $showpost="", $colnumber="", $cat_id="", $shape="", $shownav=""){

	global $post;
	
	if($colnumber==2):
	    $col =2;
		$container ="two-up";
	
	elseif($colnumber==3):
	    $col =3;
		$container ="three-up";
	
	elseif($colnumber==4):
	    $col =4;
		$container ="four-up";
		
	endif;
	
	$getcat = explode(',',$cat_id);
	query_posts(array(
	'post_type' => 'portfolio',
	'posts_per_page' => $showpost,
	'orderby' => 'date',
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
	if($shownav=="yes"){
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
				        
						if($shape=="hexagon" && $type=="filter"){
				        $out.='<div class="shape">';
						$out.='<div class="overlay hexagon"></div>';
						}
						 
						$out.='<div class="'.$class2.'">';                                               
                            $out.='<div class="'.$class3.'">';
                                    
                                $out.='<div class="lightbox-item">'; 
                                    $out.='<img src="'.$image.'" alt="'.get_the_title().'">';
                                    $out.='<div class="lightbox-item-overlay-content">'; 
									
										if($type=="gallery"){
											if($showposttitle=="yes"){
											$out.='<h6>'.get_the_title().'</h6>';
											}
											$excerpt = get_the_excerpt();
											if(has_excerpt($post->ID) && $showpostdesc!="no"){
											$out.='<p>'.$excerpt.'</p>';
											}
										
										}else{
										
											if($showposttitle=="yes"){
											
											$out.='<h6>'.get_the_title().'</h6>';
											
											}
											
											$excerpt = get_the_excerpt();
											if(has_excerpt($post->ID) && $showpostdesc!="no"){
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
						if($shape=="hexagon" && $type=="filter"){				 
						$out.='</div>';
						}	  
					
				$out.='</li>';
			 }
			 
		  
		  endwhile; wp_reset_query();
  $out.='</ul>';
  endif;
  
  return $out;
        
}

/*====================================================================================================
Portfolio Carousel Function
======================================================================================================*/
function func_recent_portfolio_carousel_indonez($section="", $cat_id=""){

	global $post;
	
	if($cat_id!=""){
	$getcat = explode(',',$cat_id);
	}else{
	$getcat = '';
	}
	query_posts(array(
	'post_type' => 'portfolio',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order'=> 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'portfolio_category',
			'terms' => $getcat,
			'field' => 'term_id',
		)
	)
	));
	
	$getsection = sanitize_title($section);
	
	$out='';
	
	
	if(have_posts()) :
	
	$out='<div class="list_carousel responsive">';
	
	$out.='<ul id="'.$getsection.'" class="gallery-carousel block-grid four-up">';
	
		  
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
				
				
				$out.='<li>';
						 
						$out.='<div class="teaser-gallery">';                                               
                            $out.='<div class="teaser-gallery-box">';
                                    
                                $out.='<div class="lightbox-item">'; 
                                    $out.='<img src="'.$image.'" alt="'.get_the_title().'">';
                                    $out.='<div class="lightbox-item-overlay-content">'; 
                                        $out.='<a class="preview fancybox" href="'.$link.'" data-fancybox-group="pf-gallery" title="'. get_the_title().'"><i class="icon-search"></i></a>';
										if($pf_url!=""){
										$out.='<a class="permalink" href="'.$pf_url.'" target="_blank"><i class="icon-link"></i></a>';
										}else{
										$out.='<a class="permalink" href="'.get_permalink().'"><i class="icon-link"></i></a>';
										}
                                    $out.='</div>'; 
                                $out.='</div>'; 
                                $out.='<h6>'.get_the_title().'</h6>';    
                            $out.='</div>';
							
							
					
				$out.='</li>';
			 }
			 
		  
		  endwhile; wp_reset_query();
  $out.='</ul>';
  $out.='<div class="clear"></div>';
  $out.='<div id="pager-carousel-'.$getsection.'" class="pager"></div>';
  $out.='</div>';
  
	$outputjs = '<div><script> 
	jQuery(document).ready(function() {
		jQuery("#'.$getsection.'").carouFredSel({
		auto: false,
		responsive: true,
		width: "100%",
		pagination: "#pager-carousel-'.$getsection.'",
		scroll: 4,
		items: {
		width: 214,
		//	height: "30%",	//	optionally resize item-height
		visible: {
		min: 4,
		max: 4
		}
		}
		});			
	});
	</script></div>';
  
  endif;
  
  
  return $out . $outputjs;
        
}

/*====================================================================================================
Display tweets with api 1.1
======================================================================================================*/
function idz_func_buildBaseString($baseURI, $method, $params) {
	$r = array();
	ksort($params);
	foreach($params as $key=>$value){
		$r[] = "$key=" . rawurlencode($value);
	}
	return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function idz_func_buildAuthorizationHeader($oauth) {
	$r = 'Authorization: OAuth ';
	$values = array();
	foreach($oauth as $key=>$value)
		$values[] = "$key=\"" . rawurlencode($value) . "\"";
	$r .= implode(', ', $values);
	return $r;
}

function func_indonez_get_twitter_timeline($twitter_id, $max_tweets, $consumer_key, $consumer_secret, $user_token, $user_secret){
	

	$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	
	$oauth_access_token = $user_token;
	$oauth_access_token_secret = $user_secret;
	$consumer_key = $consumer_key;
	$consumer_secret = $consumer_secret;
	
	$oauth = array( 'screen_name' => $twitter_id,
					'count' => $max_tweets,
					'oauth_consumer_key' => $consumer_key,
					'oauth_nonce' => time(),
					'oauth_signature_method' => 'HMAC-SHA1',
					'oauth_token' => $oauth_access_token,
					'oauth_timestamp' => time(),
					'oauth_version' => '1.0');
					
	$base_info = idz_func_buildBaseString($url, 'GET', $oauth);
	$composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
	$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
	$oauth['oauth_signature'] = $oauth_signature;
	
	// Make Requests
	$header = array(idz_func_buildAuthorizationHeader($oauth), 'Expect:');
	$options = array( CURLOPT_HTTPHEADER => $header,
					  //CURLOPT_POSTFIELDS => $postfields,
					  CURLOPT_HEADER => false,
					  CURLOPT_URL => $url . '?screen_name='.$twitter_id.'&count='.$max_tweets, 
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_SSL_VERIFYPEER => false);
	
	$feed = curl_init();
	curl_setopt_array($feed, $options);
	$json = curl_exec($feed);
	curl_close($feed);
	
	$twitter_data = json_decode($json);
	
	$out ='';
	
	foreach ($twitter_data as $key=>$value) {
	$regex = '@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.\,]*(\?\S+)?)?)*)@';
	$text  = $value->text;
	$text  = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\./-]*(\?\S+)?)?)?)@', '<a target="blank" title="$1" href="$1">$1</a>', $text);
	$text  = preg_replace('/#([0-9a-zA-Z_-]+)/', "<a target='blank' title='$1' href=\"http://twitter.com/search?q=$1\">#$1</a>",  $text);
	$text  = preg_replace("/@([0-9a-zA-Z_-]+)/", "<a target='blank' title='$1' href=\"http://twitter.com/$1\">@$1</a>", $text);

	$out  .='<p>' . $text . '</p>';
	
	};
	
	return $out;
}                    
?>