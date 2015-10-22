<?php 
/**
 * The template for displaying Archive pages.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
 
get_header();
?>

   <?php 
	global $smof_data;
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
            
				<?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                
				<?php if (  $wp_query->max_num_pages > 1 ) : ?>
                     <?php if(function_exists('wp_pagenavi')) { ?>
                         <?php wp_pagenavi(); ?>
                     <?php }else{ ?>
                            <div class="blog-pagination">
                                <nav class="navigation">
                                    <div class="nav-previous alignleft"><?php next_posts_link( __( '&larr; Older posts', 'indonez' ) ); ?></div>
                                    <div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'indonez' ) ); ?></div>
                                </nav>
                            </div>
                    <?php }?>
                <?php endif; ?>
            
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