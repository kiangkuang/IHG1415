<?php
/* Register Custom Post Type for Portfolio */
add_action('init', 'testimonial_post_type_init');
function testimonial_post_type_init() {
  $labels = array(
    'name' => __('Testimonial', 'post type general name','indonez'),
    'singular_name' => __('testimonial', 'post type singular name','indonez'),
	'all_items' => __('All Testimonial', 'testimonial','indonez'),
    'add_new' => __('Add new', 'testimonial','indonez'),
    'add_new_item' => __('Add new testimonial','indonez'),
    'edit_item' => __('Edit testimonial','indonez'),
    'new_item' => __('New testimonial','indonez'),
    'view_item' => __('View testimonial','indonez'),
    'search_items' => __('Search testimonial','indonez'),
    'not_found' =>  __('No testimonial found','indonez'),
    'not_found_in_trash' => __('No testimonial found in Trash','indonez'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 900,
	'menu_icon' => get_template_directory_uri(). '/admin/assets/images/comment.png',
    'rewrite' => array(
      'slug' => 'testimonial_item',
      'with_front' => FALSE,
    ),    
    'supports' => array(
      'title',
      'editor',
      'thumbnail'
    )
  );

  register_post_type('testimonial',$args);
}

/* Register Custom Post Type for Portfolio */
add_action('init', 'portfolio_post_type_init');
function portfolio_post_type_init() {
  $labels = array(
    'name' => __('Portfolio', 'post type general name','indonez'),
    'singular_name' => __('portfolio', 'post type singular name','indonez'),
	'all_items' => __('All Portfolio', 'portfolio','indonez'),
    'add_new' => __('Add New', 'portfolio','indonez'),
    'add_new_item' => __('Add New portfolio','indonez'),
    'edit_item' => __('Edit portfolio','indonez'),
    'new_item' => __('New portfolio','indonez'),
    'view_item' => __('View portfolio','indonez'),
    'search_items' => __('Search portfolio','indonez'),
    'not_found' =>  __('No portfolio found','indonez'),
    'not_found_in_trash' => __('No portfolio found in Trash','indonez'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
	'menu_icon' => get_template_directory_uri(). '/admin/assets/images/portfolio.png',
    'rewrite' => array(
      'slug' => 'portfolio_item',
      'with_front' => FALSE,
    ),    
    'supports' => array(
      'title',
      'editor',
      'thumbnail',
      'excerpt'
    )
  );

  register_post_type('portfolio',$args);
}

register_taxonomy("portfolio_category", 
	array("portfolio"), 
	array( "hierarchical" => true, 
		"label" => __("Portfolio Categories",'indonez'), 
		"singular_label" => __("Portfolio Categories",'indonez'), 
		"rewrite" => true,
		"query_var" => true,
	"rewrite" => array(
	"slug" => "portfolio_category"
	)
));  
			    		

/* Register Custom Post Type for Client */
add_action('init', 'clients_post_type_init');

function clients_post_type_init() {
  $labels = array(
    'name' => __('Client', 'post type general name','indonez'),
    'singular_name' => __('Client', 'post type singular name','indonez'),
	'all_items' => __('All Client', 'client','indonez'),
    'add_new' => __('Add New', 'client','indonez'),
    'add_new_item' => __('Add New client','indonez'),
    'edit_item' => __('Edit client','indonez'),
    'new_item' => __('New client','indonez'),
    'view_item' => __('View client','indonez'),
    'search_items' => __('Search client','indonez'),
    'not_found' =>  __('No client found','indonez'),
    'not_found_in_trash' => __('No client found in Trash','indonez'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
	'menu_icon' => get_template_directory_uri(). '/admin/assets/images/client.png',
    'rewrite' => array(
      'slug' => 'client_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
      'thumbnail'     
    )
  );
  register_post_type('client',$args);
}

register_taxonomy("client_category", 
			array("client"), 
			array( "hierarchical" => true, 
					"label" => __("Client Categories",'indonez'), 
					"singular_label" => __("Client Categories",'indonez'), 
					"rewrite" => true,
					"query_var" => true,
		"rewrite" => array(
		  "slug" => "client_category"
		)
));  


/* Register Custom Post Type for Team */
add_action('init', 'team_post_type_init');

function team_post_type_init() {
  $labels = array(
    'name' => __('Team', 'post type general name','indonez'),
    'singular_name' => __('Team', 'post type singular name','indonez'),
	'all_items' => __('All Team', 'team','indonez'),
    'add_new' => __('Add New', 'team','indonez'),
    'add_new_item' => __('Add New team','indonez'),
    'edit_item' => __('Edit team','indonez'),
    'new_item' => __('New team','indonez'),
    'view_item' => __('View team','indonez'),
    'search_items' => __('Search team','indonez'),
    'not_found' =>  __('No team found','indonez'),
    'not_found_in_trash' => __('No team found in Trash','indonez'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
	'menu_icon' => get_template_directory_uri(). '/admin/assets/images/team.png',
    'rewrite' => array(
      'slug' => 'team_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
      'editor',
      'thumbnail'      
    )
  );
  register_post_type('team',$args);
}
register_taxonomy("team_category", 
			array("team"), 
			array( "hierarchical" => true, 
					"label" => __("Team Categories",'indonez'), 
					"singular_label" => __("Team Categories",'indonez'), 
					"rewrite" => true,
					"query_var" => true,
		"rewrite" => array(
		  "slug" => "team_category"
		)
)); 
?>