<?php  global $smof_data; 
/**
 * The Header theme.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<html <?php language_attributes(); ?>>
<head>

<!-- Meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="format-detection" content="telephone=no" />
<?php if($smof_data['responsive_layout']==true) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'; ?>

<!-- Title -->
<title><?php
global $post;
if( $smof_data['seo_onoff'] && get_post_meta( get_the_ID(), 'indonez_seo_title', true ) ){
	echo stripslashes( get_post_meta( get_the_ID(), 'indonez_seo_title', true ) );
} else {
	global $page, $paged;
	wp_title( '|', true, 'right' );
	if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'indonez' ), max( $paged, $page ) );
}
?></title>

<!-- Favicon -->
<?php $favico = $smof_data['custom_favicon'];?>
<link rel="shortcut icon" href="<?php echo ($favico) ? $favico : get_template_directory_uri().'/images/favicon.ico';?>"/>
<link rel="alternate" id="idz_templateurl" href="<?php echo get_template_directory_uri(); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>


<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<?php do_action('wp_seo');?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php 
$layouttype = $smof_data['type_layout'];
?>
<div id="wrapper" class="<?php echo $layouttype;?>">

	<!-- header start here -->
	<header id="top">
    
    	<!-- top info start here -->
    	<div id="top-info">
        	<div class="row">
            	<div class="twelve column">
                    <!-- logo start here -->
                    <div id="logo">
                    	<?php $logo = $smof_data['custom_logo'];?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo ($logo) ? $logo : get_template_directory_uri().'/images/logo.png'; ?>" alt="logo" class="retina"/></a>
                    </div>           
                    <!-- logo end here -->
                    
                    <?php 
					$topsocial = $smof_data['contact_custom_top_social_url'];
					$topsocial_onoff = $smof_data['top_social'];
					?>
                    
                    <?php if($topsocial_onoff==1):?>
                    <div id="top-socials">
                    <div id="top-icon">
                       <?php 
					   echo do_shortcode($topsocial);
					   ?>
                    </div>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <!-- top info end here -->        
        
        <div id="mainmenu-wrapper">
            <div class="left-menu">
                    
                <!-- navigation start here -->
                <nav id="mainmenu">
					<?php 
					$walker = new Indonez_Walker;
					wp_nav_menu( array(
                        'menu_id' => 'menu',
                        'theme_location' => 'primary',
                        'sort_column' => 'menu_order',
                        'menu_class' => '',
						'walker' => $walker,
                        'fallback_cb' => 'menu_page_fallback'
                    ));
					?>
                </nav>
                <!-- navigation end here --> 
                    
            </div>
            
            <?php $displaysearchform = $smof_data['top_searchform'];?>
            <?php if($displaysearchform==1){?>
            <div class="right-menu" id="top-search">
                <a class="trigger" href="#"><i class="icon-search"></i></a>
                <div class="search-panel">
					<?php get_template_part('searchform');?>
                </div>
            </div>
            <?php } ?>
        </div>
                
    </header>
    <!-- header end here -->

