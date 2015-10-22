<?php
/*
Plugin Name: IndonezShortcodes
Plugin URI: http://indonez.com
Description: A simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
Version: 1.0
Author: Indonez
Author URI: http://www.indonez.com
*/

class IndonezShortcodes {

    function __construct() 
    {	
	    require_once( plugin_dir_path( __FILE__ ) .'functions.php' );
    	require_once( plugin_dir_path( __FILE__ ) .'shortcodes.php' );
    	define('INDONEZ_TINYMCE_URI', plugin_dir_url( __FILE__ ) .'tinymce');
		define('INDONEZ_TINYMCE_DIR', plugin_dir_path( __FILE__ ) .'tinymce');
		
        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));
	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{
		if( ! is_admin() )
		{
			wp_enqueue_style( 'indonez-shortcodes', plugin_dir_url( __FILE__ ) . 'shortcodes.css' );
			wp_enqueue_style( 'indonez-icon-shortcodes', plugin_dir_url( __FILE__ ) . 'css/icon.css' );
			wp_enqueue_script( 'jquery-ui-accordion' );
			wp_enqueue_script( 'jquery-ui-tabs' );
			wp_enqueue_script( 'indonez-shortcodes-lib', plugin_dir_url( __FILE__ ) . 'js/indonez-shortcodes-lib.js', array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs') );
			wp_enqueue_script( 'jquery.mcarouFredSel', plugin_dir_url( __FILE__ ) .'/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery'), '', true  );
			wp_enqueue_script( 'jquery.masonry', plugin_dir_url( __FILE__ ) .'/js/masonry.min.js', array( 'jquery'), '', true  );
			wp_enqueue_script( 'jquery.gmap', plugin_dir_url( __FILE__ ) .'/js/jquery.gmap.min.js', array( 'jquery'), '', true  );
			wp_enqueue_script( 'jquery.donutchart', plugin_dir_url( __FILE__ ) .'/js/jquery.donutchart.js', array( 'jquery'), '', true  );

		}
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' )
		{
			add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
		}
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		$plugin_array['indonezShortcodes'] = INDONEZ_TINYMCE_URI . '/plugin.js';
		return $plugin_array;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'indonez_button' );
		return $buttons;
	}
	
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		// css
		wp_enqueue_style( 'indonez-popup', INDONEZ_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
		
		// js
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-livequery', INDONEZ_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', INDONEZ_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', INDONEZ_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'indonez-popup', INDONEZ_TINYMCE_URI . '/js/popup.js', false, '1.0', false );
		
		wp_localize_script( 'jquery', 'IndonezShortcodes', array('plugin_folder' => WP_PLUGIN_URL .'/indonez-shortcodes') );
	}
    
}
$indonez_shortcodes = new IndonezShortcodes();
?>