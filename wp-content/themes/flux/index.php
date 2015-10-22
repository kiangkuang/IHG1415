<?php 
/**
 * The main template file.
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
            
				<?php if ( have_posts() ) : ?>
                
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
                
                
                <?php else : ?>
                
                    <article id="post-0" class="post error404 not-found">
                        <h1 class="posttitle"><?php _e( 'Not Found', 'indonez' ); ?></h1>
                        <div class="entry">
                            <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'indonez' ); ?></p>
                            <?php get_template_part('searchform'); ?>
                        </div>
                    </article>
    
                <?php endif; // end have_posts()?>
            
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