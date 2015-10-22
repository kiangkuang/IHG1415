<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );


/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {


	// Start with an underscore to hide fields from custom fields list
	$prefix = 'indonez_';
	$url =  get_template_directory_uri().'/functions/inc/metabox/images/';

	//POST METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_post_option',
		'title'      => __('Post Options','indonez'),
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name'    => __('Sidebar','indonez'),
				'desc'    => __('Select sidebar to show in this post.','indonez'),
				'id'      => $prefix . 'post_sidebar_widget',
				'type'    => 'select_sidebar',
			),
			array(
				'name' => __('SEO Title','indonez'),
				'desc' => __('These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'seo_title',
				'type' => 'text',
			),
			array(
				'name' => __('SEO Description','indonez'),
				'desc' => __('These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'seo_desc',
				'type' => 'text',
			),
			array(
				'name' => __('SEO Keywords','indonez'),
				'desc' => __('These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'seo_key',
				'type' => 'text',
			),
		)
	);
	
	
	//POST EMBED METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_post_video_embed_option',
		'title'      => __('Video Embed','indonez'),
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Video','indonez'),
				'desc' => __('Enter video url. Used if you choose video post format.<br/>Example:<br/> http://player.vimeo.com/video/65888557 <br/> http://www.youtube.com/embed/aqzitoL0YsM','indonez'),
				'id'   => $prefix . 'video_embed',
				'type' => 'text',
			),
		)
	);
	
	
	$meta_boxes[] = array(
		'id'         => 'indonez_post_audio_embed_option',
		'title'      => __('Audio Embed','indonez'),
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Audio','indonez'),
				'desc' => __('Upload audio or enter an url. Used if you choose audio post format.','indonez'),
				'id'   => $prefix . 'audio_embed',
				'type' => 'file',
			),
		)
	);
	
	
	$meta_boxes[] = array(
		'id'         => 'indonez_post_link_embed_option',
		'title'      => __('Link Embed','indonez'),
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Link','indonez'),
				'desc' => __('Enter an url. Used if you choose link post format.','indonez'),
				'id'   => $prefix . 'link_embed',
				'type' => 'text',
			),
		)
	);


	$meta_boxes[] = array(
		'id'         => 'indonez_post_quote_embed_option',
		'title'      => __('Quote','indonez'),
		'pages'      => array( 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Quote Text','indonez'),
				'desc' => __('Enter quote text. Used if you choose Quote post format.','indonez'),
				'id'   => $prefix . 'quote_text',
				'type' => 'textarea',
			),
			array(
				'name' => __('Info Text','indonez'),
				'desc' => __('Enter info text.','indonez'),
				'id'   => $prefix . 'quote_info_text',
				'type' => 'text',
			),
			
		)
	);
	
	
	global $wpdb;
	$sliders = array();
	$sliders[] = array('name'=> 'Please Select', 'value'=>'');
	
	$table_name = $wpdb->base_prefix . "revslider_sliders";
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
		$array = $wpdb->get_results("SELECT * FROM $table_name ORDER BY title");
		
		if( is_array( $array ) ){
			foreach( $array as $v ){
				$sliders[] = array('name' => $v->title, 'value' => $v->alias);
			}
		}
	}
	
	
	//SLIDESHOW METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_slideshow_include_option',
		'title'      => __('Slideshow Options','indonez'),
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Revolution Slider','indonez'),
				'desc' => __('Select slider from the list of available <a href="admin.php?page=revslider">Revolution Sliders</a>.','indonez'),
				'id'   => $prefix . 'slider_revolution',
				'std'    => '',
				'type'    => 'select',
				'options'   => $sliders,
				
			),
			array(
				'name' => __('Header Note','indonez'),
				'desc' => __('Enter html, shortcode or text to display under slideshow.','indonez'),
				'id'   => $prefix . 'header_note',
				'std'    => '[idz_promobox color="green" button_text="Get Started" button_url="#" blank="1" class=""]
	[idz_div class="flatborder left"]
	[idz_icon name="flat-file" size="small"]
	[idz_end_div]
	<h3>A fully responsive HTML template with flat & clean design.</h3>
	<p>Flux is a flat design and responsive HTML template created for business websites.</p>
[/idz_promobox]',
				'type'    => 'textarea_code',
			),
			array(
				'name'    => 'Enable Header Note',
				'desc'    => __('Enable/disable header note.','indonez'),
				'id'      => $prefix . 'header_note_onoff',
				'type'    => 'radio',
				'std'    => '2',
				'options' => array(
					array( 'name' => 'Enable', 'value' => '1', ),
					array( 'name' => 'Disable', 'value' => '2', ),
				),
			),
		)
	);	
	
	//PAGE METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_page_option',
		'title'      => __('Page Options','indonez'),
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'	 => '',
		'fields' => array(
			array(
				'name' => __('Page Title','indonez'),
				'desc' => __('This title overrides default page title.','indonez'),
				'id'   => $prefix . 'page_title',
				'type' => 'text',
			),
			array(
				'name' => __('Page Description','indonez'),
				'desc' => __('This description of page title.','indonez'),
				'id'   => $prefix . 'page_desc',
				'type' => 'text',
			),
			array(
				'name' => __('Layout Options','indonez'),
				'desc' => __('These setting overrides theme options settings. If using portfolio template please select a full width layout.','indonez'),
				'id'   => $prefix . 'page_layout',
				'std'   => '',
				'type' => 'images',
				"options" 	=> array(
							'Left Sidebar' 	=> $url . '2cl.png',
							'Full Width' 	=> $url . '1col.png',
							'Right Sidebar' 	=> $url . '2cr.png',
						),
			),
			array(
				'name'    => __('Sidebar','indonez'),
				'desc'    => __('Select sidebar to show in this page. Not used in full width layout and portfolio template.','indonez'),
				'id'      => $prefix . 'page_sidebar_widget',
				'type'    => 'select_sidebar',
			),
			array(
				'name' => __('Bottom Widget','indonez'),
				'desc' => __('Enter html, shortcode or text to display in bottom area. These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'bottom_meta_text',
				'type'    => 'textarea_code',
			),
			array(
				'name'    => 'Enable Bottom Widget',
				'desc'    => __('Enable/disable bottom area. These setting overriddes theme options settings.','indonez'),
				'id'      => $prefix . 'bottom_meta_text_onoff',
				'type'    => 'radio',
				'std'    => '1',
				'options' => array(
					array( 'name' => 'Enable', 'value' => '1', ),
					array( 'name' => 'Disable', 'value' => '2', ),
				),
			),
			array(
				'name' => __('SEO Title','indonez'),
				'desc' => __('These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'seo_title',
				'type' => 'text',
			),
			array(
				'name' => __('SEO Description','indonez'),
				'desc' => __('These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'seo_desc',
				'type' => 'text',
			),
			array(
				'name' => __('SEO Keywords','indonez'),
				'desc' => __('These setting overriddes theme options settings.','indonez'),
				'id'   => $prefix . 'seo_key',
				'type' => 'text',
			),
		)
	);
	
	
	//PORTFOLIO METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_page_portfolio_option',
		'title'      => __('Portfolio Options','indonez'),
		'pages'      => array( 'page' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'	 => '',
		'fields' 	 => array(
			array(
				'name'    => __('Type','indonez'),
				'desc'    => __('Choose portfolio type to include in portfolio page','indonez'),
				'id'      => $prefix . 'portfolio_type',
				'type'    => 'select',
				'options' => array(
					array( 'name' => 'Filter', 'value' => 'filter', ),
					array( 'name' => 'Gallery', 'value' => 'gallery', ),
				),
			),
			array(
				'name' => __('Columns','indonez'),
				'desc' => __('Choose portfolio column layout','indonez'),
				'id'   => $prefix . 'portfolio_layout',
				'std'   => '',
				'type' => 'images',
				"options" 	=> array(
							'2 Column' 	=> $url . '2-col-portfolio.png',
							'3 Column' 	=> $url . '3-col-portfolio.png',
							'4 Column' 	=> $url . '4-col-portfolio.png',
						),
			),
			array(
				'name'    => __('Categories','indonez'),
				'desc'    => __('Choose category to include in portfolio page','indonez'),
				'id'      => $prefix . 'portfolio_cat_include',
				'type'		=> 'taxonomy_multicheck',
				'taxonomy'	=> 'portfolio_category', // Taxonomy Slug
			),
		)
	);
	
	$meta_boxes[] = array(
		'id'         => 'indonez_portfolio_option',
		'title'      => __('Portfolio Options','indonez'),
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'	 => '',
		'fields' 	 => array(
			array(
				'name' => __('Preview link','indonez'),
				'desc' => __('Please enter image or video url for lightbox.','indonez'),
				'id'   => $prefix . 'portfolio_link',
				'type' => 'text',
			),
			array(
				'name' => __('Custom URL','indonez'),
				'desc' => __('Add link / custom URL for portfolio items.','indonez'),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text',
			),
		)
	);
	
	//TEAM METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_team_option',
		'title'      => __('Team Options','indonez'),
		'pages'      => array( 'team' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Info','indonez'),
				'desc' => __('Please enter info the person.','indonez'),
				'id'   => $prefix . 'team_info',
				'type' => 'text',
			),
			array(
				'name' => __('Facebook','indonez'),
				'desc' => __('Please enter facebook URL. Example : http://www.facebook.com/username.','indonez'),
				'id'   => $prefix . 'team_fb',
				'type' => 'text',
			),
			array(
				'name' => __('Twitter','indonez'),
				'desc' => __('Please enter twitter URL. Example : http://www.twitter.com/username.','indonez'),
				'id'   => $prefix . 'team_twitter',
				'type' => 'text',
			),
			array(
				'name' => __('Google+','indonez'),
				'desc' => __('Please enter google+ URL. Example : https://plus.google.com/u/0/108763868013266824234/posts.','indonez'),
				'id'   => $prefix . 'team_google',
				'type' => 'text',
			),
			array(
				'name' => __('Custom Social','indonez'),
				'desc' => __('Put another Social Network URL.<br/> <strong>Example</strong> : &lt;a href=&quot;http://linkedin.com&quot; title=&quot;linkedin&quot; class=&quot;socialink&quot; target=&quot;_blank&quot;&gt;&lt;i class=&quot;social-linkedin&quot;&gt;&lt;/i&gt;&lt;/a&gt;<br/><strong>Available icon</strong> : social-linkedin, social-github, social-flickr, social-vimeo, social-pinterest, social-tumblr, social-dribbble, social-stumbleupon, social-lastfm, social-rdio, social-spotify, social-instagram, social-dropbox, social-evernote, social-skype, social-paypal, social-picasa, social-soundcloud, social-behance, social-sina-weibo, social-mixi, social-mail, social-smashing, social-renren, social-flattr, social-qq, social-rss','indonez'),
				'id'   => $prefix . 'team_custom',
				'type' => 'textarea_code',
			),
		)
	);
	
	//CLIENT METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_client_option',
		'title'      => __('Client Options','indonez'),
		'pages'      => array( 'client' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Client Url','indonez'),
				'desc' => __('Please enter url for client.','indonez'),
				'id'   => $prefix . 'client_url',
				'type' => 'text',
			),
		)
	);
	
	//TESTIMONIAL METABOX
	$meta_boxes[] = array(
		'id'         => 'indonez_testimonial_option',
		'title'      => __('Testimonial Options','indonez'),
		'pages'      => array( 'testimonial' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => '',
		'fields' => array(
			array(
				'name' => __('Info','indonez'),
				'desc' => __('Please enter info. Leave blank if you dont want info on description.','indonez'),
				'id'   => $prefix . 'testimonial_info',
				'type' => 'text',
			),
			array(
				'name' => __('Company','indonez'),
				'desc' => __('Please enter company name. Leave blank if you dont want company name on description.','indonez'),
				'id'   => $prefix . 'testimonial_company',
				'type' => 'text',
			),
		)
	);
	

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'inc/metabox/matabox_init.php';

}