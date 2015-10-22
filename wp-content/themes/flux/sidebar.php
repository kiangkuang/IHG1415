<?php
/**
 * The Page Sidebar containing the widget area.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
global $post;
if (is_home() || is_single() || is_archive() || is_category() || is_search() || is_404()) {

	  $sidebar_name_single_post = get_post_meta($post->ID,"indonez_post_sidebar_widget",true);
	  
	  if($sidebar_name_single_post!=""){
	    dynamic_sidebar($sidebar_name_single_post);
	  }else{
	  	dynamic_sidebar('post-sidebar');
	  }
	  
}else{
	$sidebar_name = get_post_meta($post->ID,"indonez_page_sidebar_widget",true);
	dynamic_sidebar($sidebar_name);
}
?>