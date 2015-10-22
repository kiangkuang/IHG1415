<?php 
/**
 * The Template for displaying all single posts.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
get_header();
?>

<?php get_template_part('page-templates/header-inner'); ?>

<!-- maincontent start here -->
<section id="content-wrapper">   
    <div class="row">
    
    	<?php while (have_posts()) : the_post();?>
        
        <?php 
		    $prefix = 'indonez_';
			$pf_link = get_post_meta($post->ID, $prefix . 'portfolio_link', true );
			$get_attachments = get_children( array( 'post_parent' => $post->ID ) );
			$attachments_count = count( $get_attachments );
			$thumb   = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
			$pf_url = get_post_meta($post->ID, $prefix . 'portfolio_url', true );
			$get_single_image =  wp_get_attachment_image_src($thumb,'custom-large-image' );
			$single_image =  $get_single_image[0];
		
		?>
    
        <div class="twelve column">
        	<?php if ($attachments_count >1) { ?>
            
				<?php
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
                ?>
                
                <?php if ($attachments) { ?> 
                <div class="banner-pf">
                               
                    <ul> 
                        <?php
                        foreach ($attachments as $attachment) {
                            $attachment_url = wp_get_attachment_image_src( $attachment->ID , 'custom-large-image' );
                            $image = $attachment_url[0];
                        ?> 
                        <li data-transition="slidehorizontal"><img src="<?php echo $image;?>" alt="<?php the_title();?>" /></li> 
                        <?php } ?>                       
                    </ul>
                    <div class="tp-bannertimer tp-top"></div>
                </div>
                
                <script type="text/javascript">
                  jQuery(document).ready(function($) {
                     jQuery('.banner-pf').revolution({
						delay:9000,
						navigationType:"bullet",				// bullet, thumb, none
						navigationArrows:"none",				// nexttobullets, solo (old name verticalcentered), none
						navigationStyle:"round-old",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom
						navigationHAlign:"left",				// Horizontal Align left,center,right
						navigationVAlign:"bottom",				// Vertical Align top,center,bottom
						navigationHOffset:38,
						navigationVOffset:47,
						touchenabled:"on",						// Enable Swipe Function : on/off
						onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off
						stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
						stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
						hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
						hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
						hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value
						shadow:0,								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
						fullWidth:"off"							// Turns On or Off the Fullwidth Image Centering in FullWidth Modus
						})
                  });
                </script>
                
                <?php } ?>
                
            
            <?php } else { ?>
            
				<?php if ($pf_link) { ?>
                
                        <div id="pf-video-wrapper">
                        <?php
						  if (is_youtube($pf_link)) {  
							echo '<div class="video-container"><a href="'.$pf_link.'"  rel="youtube"></a></div>';
						  } else if (is_vimeo($pf_link)) {
							echo '<div class="video-container"><a href="'.$pf_link.'"  rel="vimeo"></a></div>';
						  } else if (is_quicktime($pf_link)) {
							echo '<div class="video-container"><a href="'.$pf_link.'"  rel="quicktime"></a></div>';
						  } else if (is_flash($pf_link)) {
							echo '<div class="video-container"><a href="'.$pf_link.'"  rel="flash"></a></div>';
						  } else { ?>
							<img src="<?php echo $pf_link;?>" alt="" />
						  <?php } ?>
                        </div>
                        
                <?php } else { ?>
                        <div class="banner-pf">
                         <img src="<?php echo $single_image;?>" alt="<?php the_title();?>" style="width:100%" />
                         </div>
                <?php } ?>
            
            <?php } ?> 
            
                            
        </div>
		
		<?php the_content(); ?>
        
		<?php endwhile;	?>
        
        <?php 
        if (function_exists('indonez_get_related_portfolio')) {
         echo indonez_get_related_portfolio(__('Related Portfolio','indonez'));
		}
        ?>
        
    </div>
</section>
<!-- maincontent end here -->

<?php get_footer(); ?>