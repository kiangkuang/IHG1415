<?php
function indonez_init_sidebars() {		
	global $smof_data;
	
	register_sidebar( array(
		'name' 				=> __( 'General', 'indonez' ),
		'id' 				=> 'post-sidebar',
		'description' 		=> __( 'Located at the side of blog, archives, single and search.', 'indonez' ),
		'before_widget' 	=> '<aside class="sidebar-content widgets %2$s" id="%1$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h4 class="widget-title"><span>',
		'after_title' 			=> '</span></h4>',
	));
	
	
	register_sidebar( array(
		'name' 				=> __( 'Page', 'indonez' ),
		'id' 				=> 'indonez-page-sidebar',
		'description' 		=> __( 'Located at the side of page templates.', 'indonez' ),
		'before_widget' 	=> '<aside class="sidebar-content widgets %2$s" id="%1$s">',
		'after_widget' 		=> '</aside>',
		'before_title' 		=> '<h4 class="widget-title"><span>',
		'after_title' 		=> '</span></h4>',
	));
	
	$sidebars = explode( ",", trim($smof_data['custom_sidebar']));
   	if (count( $sidebars ) ) {    		
		foreach ( $sidebars as $sidebar) {
			if ( strlen( $sidebar ) ) {			
			register_sidebar(array(
				'name'          		=> $sidebar,
				'id'					=> $sidebar,
				'description'   		=> __('A Custom sidebar created from Appearance >> Theme Options >> Sidebar Settings.', 'indonez' ),
				'before_widget' 		=> '<aside class="sidebar-content widgets %2$s" id="%1$s">',
				'after_widget' 			=> '</aside>',
				'before_title' 			=> '<h4 class="widget-title">',
				'after_title' 			=> '</h4>'
			));
			
			}
		}		    
   	}
	
	register_sidebar( array(
		'name' 				=> __( 'Footer1', 'indonez' ),
		'id' 				=> 'indonez-footer1-sidebar',
		'description' 		=> __( 'Located at the footer column 1. Below copyright text', 'indonez' ),
		'before_widget' 	=> '<div class="sidebar-content widgets %2$s" id="%1$s">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h4 class="widget-title">',
		'after_title' 		=> '</h4>',
	));
	
	register_sidebar( array(
		'name' 				=> __( 'Footer2', 'indonez' ),
		'id' 				=> 'indonez-footer2-sidebar',
		'description' 		=> __( 'Located at the footer column 2.', 'indonez' ),
		'before_widget' 	=> '<div class="sidebar-content widgets %2$s" id="%1$s">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h4 class="widget-title">',
		'after_title' 		=> '</h4>',
	));
	
	register_sidebar( array(
		'name' 				=> __( 'Footer3', 'indonez' ),
		'id' 				=> 'indonez-footer3-sidebar',
		'description' 		=> __( 'Located at the footer column 3.', 'indonez' ),
		'before_widget' 	=> '<div class="sidebar-content widgets %2$s" id="%1$s">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h4 class="widget-title">',
		'after_title' 		=> '</h4>',
	));
	
	register_sidebar( array(
		'name' 				=> __( 'Footer4', 'indonez' ),
		'id' 				=> 'indonez-footer4-sidebar',
		'description' 		=> __( 'Located at the footer column 4.', 'indonez' ),
		'before_widget' 	=> '<div class="sidebar-content widgets %2$s" id="%1$s">',
		'after_widget' 		=> '</div>',
		'before_title' 		=> '<h4 class="widget-title">',
		'after_title' 		=> '</h4>',
	));
	
	
}
add_action( 'widgets_init', 'indonez_init_sidebars');



/* Tag Widget */
class customTags_Widget extends WP_Widget {
  function customTags_Widget () {
    $widgets_opt = array('description'=>__('Indonez Tags cloud widget','indonez'));
    parent::WP_Widget(false,$name=__("Indonez - Tags Widget","indonez"),$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
	$tagstitle = isset($instance['tagstitle']) ? esc_attr($instance['tagstitle']) : '';
  ?>
    <p><label for="tagtitle"><?php _e('Title','indonez');?>:
  		<input id="<?php echo $this->get_field_id('tagstitle'); ?>" name="<?php echo $this->get_field_name('tagstitle'); ?>" type="text" class="widefat" value="<?php echo $tagstitle;?>" /></label></p>       		
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    extract($args);
	
	 $tagstitle = isset($instance['tagstitle']) ? esc_attr($instance['tagstitle']) : '';
	 if ($tagstitle == "") $tagstitle = __("Tags","indonez");
    
    echo $before_widget;
    
    echo $before_title.$tagstitle.$after_title;
	
	
	$tags = array();
	$posts = get_posts('numberposts=-1');
	foreach ($posts as $p) {
		foreach (wp_get_post_tags($p->ID) as $tag) {
			if (array_key_exists($tag->name, $tags))
				$tags[$tag->name]['count']++;
			else {
				$tags[$tag->name]['count'] = 1;
				$tags[$tag->name]['link'] = get_tag_link($tag->term_id);
			}
		}
	}

	// Show tag cloud
	echo '<div class="tag-cloud">';
	foreach ($tags as $tag_name => $tag) {
		echo '<span class="tag">' .
			'<a href="' . $tag['link'] . '">' . $tag_name . '</a></span>';
	}
	echo '<div class="clear"></div>';
	echo '</div>';	
	
    echo $after_widget; 
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("customTags_Widget");'));


/* Popular News Widget */
class PopularNews_Widget extends WP_Widget {
  
  function PopularNews_Widget() {
    $widgets_opt = array('description'=>__('Display Popular Post base on comments count','indonez'));
    parent::WP_Widget(false,$name= __("Indonez - Popular Post","indonez"),$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
	$newstitle = isset($instance['newstitle']) ? esc_attr($instance['newstitle']) : '';
	$numnews = isset($instance['numnews']) ? esc_attr($instance['numnews']) : '';
	$disableimg = isset($instance['disableimg']) ? esc_attr($instance['disableimg']) : '';    
    
  ?>
        <p><label for="newstitle"><?php _e('Title','indonez');?>:
        <input id="<?php echo $this->get_field_id('newstitle'); ?>" name="<?php echo $this->get_field_name('newstitle'); ?>" type="text" class="widefat" value="<?php echo $newstitle;?>" /></label></p>  
        <p><label for="numnews"><?php _e('Number to display','indonez');?>:
        <input id="<?php echo $this->get_field_id('numnews'); ?>" name="<?php echo $this->get_field_name('numnews'); ?>" type="text" class="widefat" value="<?php echo $numnews;?>" /></label></p>
        <p><label for="disableimg"><?php _e('Disable Image','indonez');?>:
        <?php if(isset($instance['disableimg'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <input type="checkbox" name="<?php echo $this->get_field_name('disableimg'); ?>" id="<?php echo $this->get_field_id('disableimg'); ?>" value="true" <?php echo $checked; ?> /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
	$newstitle = isset($instance['newstitle']) ? esc_attr($instance['newstitle']) : '';
	$numnews = isset($instance['numnews']) ? esc_attr($instance['numnews']) : '';
	$disableimg = isset($instance['disableimg']) ? esc_attr($instance['disableimg']) : '';    
    
    if ($numnews == "") $numnews = 3;
    if ($newstitle == "") $newstitle = __("Popular Post","indonez");
    
	echo $before_widget;
		$title = $before_title.$newstitle.$after_title;
		indonez_popular_news($title,$numnews, $disableimg);
	echo $after_widget;
  } 
}
add_action('widgets_init', create_function('', 'return register_widget("PopularNews_Widget");'));


/* Recent News Widget */
class RecentNews_Widget extends WP_Widget {
  
  function RecentNews_Widget() {
    $widgets_opt = array('description'=>__('Display Recent Post','indonez'));
    parent::WP_Widget(false,$name= __("Indonez - Recent Post","indonez"),$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $newstitle = isset($instance['newstitle']) ? esc_attr($instance['newstitle']) : '';
	$category = isset($instance['category']) ? esc_attr($instance['category']) : '';
    $numnews = isset($instance['numnews']) ? esc_attr($instance['numnews']) : '';
	$disableimg = isset($instance['disableimg']) ? esc_attr($instance['disableimg']) : '';    
    
  ?>
        <p><label for="newstitle"><?php _e('Title','indonez');?>:
        <input id="<?php echo $this->get_field_id('newstitle'); ?>" name="<?php echo $this->get_field_name('newstitle'); ?>" type="text" class="widefat" value="<?php echo $newstitle;?>" /></label></p>  
         <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'templatesquare'); ?><br />
            <?php 
            $args = array(
            'selected'         => $category,
            'echo'             => 1,
            'name'             =>$this->get_field_name('category')
            );
            wp_dropdown_categories( $args );
            ?>
            </label></p>
        <p><label for="numnews"><?php _e('Number to display','indonez');?>:
        <input id="<?php echo $this->get_field_id('numnews'); ?>" name="<?php echo $this->get_field_name('numnews'); ?>" type="text" class="widefat" value="<?php echo $numnews;?>" /></label></p>
        <p><label for="disableimg"><?php _e('Disable Image','indonez');?>:
        <?php if(isset($instance['disableimg'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <input type="checkbox" name="<?php echo $this->get_field_name('disableimg'); ?>" id="<?php echo $this->get_field_id('disableimg'); ?>" value="true" <?php echo $checked; ?> /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $newstitle = isset($instance['newstitle']) ? esc_attr($instance['newstitle']) : '';
	$category = isset($instance['category']) ? esc_attr($instance['category']) : '';
    $numnews = isset($instance['numnews']) ? esc_attr($instance['numnews']) : '';
	$disableimg = isset($instance['disableimg']) ? esc_attr($instance['disableimg']) : '';    
    
    if ($numnews == "") $numnews = 3;
    if ($newstitle == "") $newstitle = __("Recent Post","indonez");
    
	echo $before_widget;
		$title = $before_title.$newstitle.$after_title;
		indonez_recent_news($title,$numnews, $disableimg, $category);
	echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("RecentNews_Widget");'));


/* Flickr Widget */
class FlickrFeed_Widget extends WP_Widget {
  
  function FlickrFeed_Widget() {
    $widgets_opt = array('description'=>__('Display flickr photos','indonez'));
    parent::WP_Widget(false,$name= __("Indonez - Flickr Feed","indonez"),$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $widgettitle = isset($instance['widgettitle']) ? esc_attr($instance['widgettitle']) : '';
	$numphotos = isset($instance['numphotos']) ? esc_attr($instance['numphotos']) : '';
	$flickrid = isset($instance['flickrid']) ? esc_attr($instance['flickrid']) : '';    
    
  ?>
        <p><label for="widgettitle"><?php _e('Title','indonez');?>:
        <input id="<?php echo $this->get_field_id('widgettitle'); ?>" name="<?php echo $this->get_field_name('widgettitle'); ?>" type="text" class="widefat" value="<?php echo $widgettitle;?>" /></label></p>  
        <p><label for="numphotos"><?php _e('Number to display','indonez');?>:
        <input id="<?php echo $this->get_field_id('numphotos'); ?>" name="<?php echo $this->get_field_name('numphotos'); ?>" type="text" class="widefat" value="<?php echo $numphotos;?>" /></label></p>
        <p><label for="flickrid"><?php _e('Flickr ID: <br/>(get flickr id on http://idgettr.com/)','indonez');?>
        <input id="<?php echo $this->get_field_id('flickrid'); ?>" name="<?php echo $this->get_field_name('flickrid'); ?>" type="text" class="widefat" value="<?php echo $flickrid;?>" /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $widgettitle = isset($instance['widgettitle']) ? esc_attr($instance['widgettitle']) : '';
	$numphotos = isset($instance['numphotos']) ? esc_attr($instance['numphotos']) : '';
	$flickrid = isset($instance['flickrid']) ? esc_attr($instance['flickrid']) : '';    
    
    if ($numphotos == "") $numphotos = 6;
	if ($flickrid == "") $flickrid = '51850279@N06';
    if ($widgettitle == "") $widgettitle = __("Flickr Photos","indonez");
    
    echo $before_widget;
	
    $title = $before_title.$widgettitle.$after_title;
    
	  global $post,$smof_data;
	  
	  if ($title!="") echo $title;
  ?>
  
   <script>
   jQuery(document).ready(function() {
	jQuery('#flck-thumb').jflickrfeed({
		limit: <?php echo $numphotos; ?>,
		qstrings: {
			id: '<?php echo $flickrid; ?>'
		},
		itemTemplate: '<div>'+
						'<a class="fancybox" href="{{image}}" data-fancybox-group="gallery" title="{{title}}">' +
							'<img src="{{image_s}}" alt="{{title}}" />' +
						'</a>' +
					  '</div>'
	});	
	});
   </script>
  
    <div id="flck-thumb" class="thumbs"><div class="no-image"></div></div>
    
    <!-- Noscript Notification when your Javascript not active -->
    <div id="flickr-noscript">                	
        <p><?php echo __('Cant load Flickr feed, please activate your javascript first...','indonez');?></p>
    </div>
    <!-- End of Noscript Notification when your Javascript not active -->
    
   <?php
       
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("FlickrFeed_Widget");'));



/* Custom Archive */
class customAchive_Widget extends WP_Widget {
  function customAchive_Widget () {
    $widgets_opt = array('description'=>__('Indonez Archive widget','indonez'));
    parent::WP_Widget(false,$name=__("Indonez - Archive Widget","indonez"),$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
	$archivetitle = isset($instance['archivetitle']) ? esc_attr($instance['archivetitle']) : '';
  ?>
    <p><label for="archivetitle"><?php _e('Title','indonez');?>:
  		<input id="<?php echo $this->get_field_id('archivetitle'); ?>" name="<?php echo $this->get_field_name('archivetitle'); ?>" type="text" class="widefat" value="<?php echo $archivetitle;?>" /></label></p>       		
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    extract($args);
	
	 $archivetitle = isset($instance['archivetitle']) ? esc_attr($instance['archivetitle']) : '';
	 if ($archivetitle == "") $archivetitle = __("Archives","indonez");
    
    echo $before_widget;
    
    echo $before_title.$archivetitle.$after_title;
	?>
	
	 <ul class="archive-list">
		<?php
        global $wpdb;
        $limit = 0;
        $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
        foreach($months as $month) :
        ?>
        <li>
        <a href="<?php echo get_month_link($month->year, date("m", mktime(0, 0, 0, $month->month, 1, $month->year)));?>">
        <?php echo date("F", mktime(0, 0, 0, $month->month, 1, $month->year)) .'&nbsp;'. $month->year; ?>
        </a>
        <span class="archive-count"><?php echo $month->post_count;?></span>
        </li> 
        <?php
        
        if(++$limit >= 18) { break; }
        
        endforeach;
        ?>                         
    </ul>                 
	<?php
    echo $after_widget; 
  } 
}
add_action('widgets_init', create_function('', 'return register_widget("customAchive_Widget");'));
?>