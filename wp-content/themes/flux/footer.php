<?php  global $smof_data; 
/**
 * The Footer theme.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
?>

	<?php
	$prefix = 'indonez_';
	$bottom_meta_text = get_post_meta($post->ID, $prefix . 'bottom_meta_text', true);
	$bottom_meta_text_onoff = get_post_meta($post->ID, $prefix . 'bottom_meta_text_onoff', true);
	$bottom_text = $smof_data['bottom_text'];
	$bottom_text_onoff = $smof_data['bottom_text_onoff'];
	?>
    
    
    <!-- bottom content start here -->
    <?php if($bottom_meta_text_onoff==1 || $bottom_text_onoff==1): ?>
    <section id="bottom-content">
    
    	<div class="row">
			<?php 
            if($bottom_meta_text!=""):
             echo do_shortcode($bottom_meta_text);
			else:
			 echo do_shortcode($bottom_text);
            endif;
            ?>
        </div>
        
    </section>
   
    
    <?php else: ?>
		<?php if($bottom_text_onoff==1):?>
        <section id="bottom-content">
        
            <div class="row">
                <?php 
                 echo do_shortcode($bottom_text);
                ?>
            </div>
            
        </section>
        <?php endif;?>
    
     <?php endif;?>
    
    <!-- bottom content end here -->
    
    
    <!-- footer start here -->
    <footer>   
        <div class="row">
        	<div class="nine column">
                <?php
				$footer_contact_title = $smof_data['footer_contact_title'];
				$footer_contact_title_onoff = $smof_data['footer_contact_title_onoff'];
				$footer_balloon_text = $smof_data['footer_balloon_text'];
				$footer_balloon_text_url = $smof_data['footer_balloon_text_url'];
				$footer_balloon_onoff = $smof_data['footer_balloon_onoff'];
				
				
				// Contact Title Information
				if($footer_contact_title_onoff==1){
					echo '<h6>'.$footer_contact_title.'</h6>';
				}
				
				//Balloon Text
				if($footer_balloon_onoff==1){
					if($footer_balloon_text!=""){
					echo'<div class="say-hello">';
						if($footer_balloon_text_url!=""){
							echo'<h4><a href="'.$footer_balloon_text_url.'">'.$footer_balloon_text.'</a></h4>';
						}else{
							echo'<h4><span>'.$footer_balloon_text.'</span></h4>';
						}
					echo'</div>';
					}
				}
				
				//Address, Telephone, Mail
				$footer_addr = $smof_data['footer_addr'];
				$footer_tlp = $smof_data['footer_tlp'];
				$footer_mail = $smof_data['footer_mail'];
				$footer_ate_onoff = $smof_data['footer_ate_onoff'];
				
				if($footer_ate_onoff==1){
					
					if($footer_addr!="" || $footer_tlp!="" || $footer_mail!=""){
					echo '<ul class="footer-address no-bullet">';
					
						if($footer_addr!=""){
						echo '<li class="address">'.$footer_addr.'</li>';
						}
						if($footer_tlp!=""){
						echo '<li class="phone">'.$footer_tlp.'</li>';
						}
						if($footer_mail!=""){
						echo '<li class="email">'.$footer_mail.'</li>';
						}
					
					
					echo '</ul>';
					}
				
				}
				
				// Footer Menu
				$footer_menu = $smof_data['footer_menu'];
				$footer_menu_onoff = $smof_data['footer_menu_onoff'];
				
				
				if($footer_menu_onoff==1){
					$menu_items = wp_get_nav_menu_items($footer_menu);
	
					$menu_list = '<ul class="footer-link no-bullet">';
				
					foreach ( (array) $menu_items as $key => $menu_item ) {
						$title = $menu_item->title;
						$url = $menu_item->url;
						$menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
					}
					$menu_list .= '</ul>';
					
					echo $menu_list;
				}
				
				?>
            </div>
            
            <div class="three column">
            	<?php
				//Footer Logo
				$footerlogo = $smof_data['footer_logo'];
				$footerlogoonoff = $smof_data['footer_logo_onoff'];
				$copyright = $smof_data['footer_copyright'];
				$copyrightonoff = $smof_data['footer_copyright_onoff'];
				
				if($footerlogoonoff==1){
					if($footerlogo!=""){
					echo '<a href="'.home_url().'"><img src="'.$footerlogo.'" alt="main-logo" class="footer-logo retina"/></a>';
					}else{
					echo '<a href="'.home_url().'"><img src="'.get_template_directory_uri()."/images/logo.png".'" alt="main-logo" class="footer-logo retina"/></a>';
					}
				}
				
				//Copyright Text
				if($copyrightonoff==1){
				echo '<div>'.do_shortcode($copyright).'</div>';
				}
				?>
            </div>
            
            <!-- Footer Widget 1 -->
            <?php if ( is_active_sidebar( 'indonez-footer1-sidebar' ) ) : ?>
            <div class="three column mobile-two">
            	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('indonez-footer1-sidebar')) : endif;?>
            </div>
            <?php endif; ?>
            
            <!-- Footer Widget 2 -->
            <?php if ( is_active_sidebar( 'indonez-footer2-sidebar' ) ) : ?>
            <div class="three column mobile-two">
            	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('indonez-footer2-sidebar')) : endif;?>
            </div>
            <?php endif; ?>
            
            <!-- Footer Widget 3 -->
            <?php if ( is_active_sidebar( 'indonez-footer3-sidebar' ) ) : ?>
            <div class="three column mobile-two">
            	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('indonez-footer3-sidebar')) : endif;?>
            </div>
            <?php endif; ?>
            
            <!-- Footer Widget 4 -->
            <?php if ( is_active_sidebar( 'indonez-footer4-sidebar' ) ) : ?>
            <div class="three column mobile-two">
            	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('indonez-footer4-sidebar')): endif;?>
            </div>
            <?php endif; ?>
                   
        </div>
    </footer>
    <!-- footer end here -->
    
</div>
         
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>