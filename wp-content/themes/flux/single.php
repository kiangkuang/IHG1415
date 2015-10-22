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

	<?php 
    global $smof_data;
    $readmoretext = $smof_data['blog_read_moretext'];
	$layout = $smof_data['main_layout'];
	
	switch ($layout) {
		case 'rightsidebar':
			$position ="float:left";
			break;
		case 'leftsidebar':
			$position ="float:right";
			break;
		default:
			$position ="";
			break;
	}
	?>
    
    <?php get_template_part('page-templates/header-inner'); ?>

    <!-- content section start here -->
    <section id="content-wrapper">
           
        <div class="row">
                	
            <div class="<?php if($position){echo'eight column';}else{echo 'twelve column';}?>" style=" <?php echo $position;?> ">
            
			<?php while ( have_posts() ) : the_post();?>
            
            	 <?php get_template_part( 'content', get_post_format() ); ?>
            
                 <!--Begin sharing box-->
                <div class="sharing-box">
                
                    <?php if($smof_data['blog_show_fblike']==1) {?>
                    <div class="share-facebook">
                        <!--[if IE]>
                            <iframe id="facebookIframe-single2" 
                                src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" 
                                style="border:none; overflow:hidden; width:300px; height:45px;" 
                                allowTransparency="true">
                            </iframe>
                        <![endif]-->
                        <!--[if !IE]>-->
                            <iframe id="facebookIframe-single2" 
                                src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" 
                                style="border:none; overflow:hidden; width:300px; height:45px;" >
                            </iframe>
                        <!--<![endif]-->
                    </div>
                    
                    
                    <?php } ?>
                    
                    <?php if($smof_data['blog_show_shareicon']==1) {?>        
                    <?php if (function_exists('indonez_social_bookmarks')) indonez_social_bookmarks();?>
                     <?php } ?>
                    
                </div>
                
                <?php if ( comments_open() ) : ?>
                                
                 <?php comments_template( '', true ); ?>
                 
                 <?php endif; ?>
            
            <?php endwhile; ?>
            
            </div>
            
            <?php if($position){ ?>
            <div class="four column widget-side-area">
            
               <?php get_sidebar(); ?>
               
            </div> 
            <?php } ?>
                 
        </div>         
                 
    </section>
    <!-- content section end here -->

<?php get_footer(); ?>