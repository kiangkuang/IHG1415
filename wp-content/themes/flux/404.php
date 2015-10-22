<?php
/**
 * 404 page.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
 
get_header(); 
?>

	<?php
	global $smof_data;
	$page_not_found_text = $smof_data['page_not_found_text'];
	?>

	<?php get_template_part('page-templates/header-inner'); ?>

    <!-- content section start here -->
    <section id="content-wrapper">
           
        <div class="row">
        
            <div class="seven column">
            	<div id="error404-left">
                    <h1 class="smallmargin-bottom"><?php _e('oops! 404','indonez');?> <i class="icon-ghost"></i></h1>
                    <p><?php echo $page_not_found_text;?></p>                        
                    <a href="<?php echo home_url(); ?>" class="button small green"><?php _e('Go To Homepage','indonez');?></a>
               </div>
            </div>
            
            <div class="four column">
            	<div id="error404-right">
                    <h3><?php _e('Or you can go to this link','indonez');?></h3>
					<?php 
					wp_nav_menu( array(
                        'menu_id' => 'menu',
                        'theme_location' => 'primary',
                        'sort_column' => 'menu_order',
                        'menu_class' => 'arrow list-line',
                        'fallback_cb' => 'menu_page_fallback'
                    ));
					?>
                </div>
            </div>     
        
                	
        </div>         
                 
    </section>
    <!-- content section end here -->

<?php get_footer(); ?>