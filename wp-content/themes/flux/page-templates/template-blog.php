<?php
/**
 * Template Name: Blog
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
 
get_header();
?>
    
    <?php
    global $smof_data, $post;
	$prefix = 'indonez_';
	$layout = $smof_data['main_layout'];
	$layoutmeta = get_post_meta($post->ID, $prefix . 'page_layout', true);
	$layoutmetaoption = str_replace("+", "", urlencode(strtolower($layoutmeta)));
	
	if($layoutmetaoption!=""){
	
		switch ($layoutmetaoption) {
			case 'rightsidebar':
				$position ="float:left";
				$showcontainer="yes";
				break;
			case 'leftsidebar':
				$position ="float:right";
				$showcontainer="yes";
				break;
			default:
				$position ="";
				$showcontainer="";
				break;
		}
	
	}else{
	
		switch ($layout) {
			case 'rightsidebar':
				$position ="float:left";
				$showcontainer="yes";
				break;
			case 'leftsidebar':
				$position ="float:right";
				$showcontainer="yes";
				break;
			default:
				$position ="";
				$showcontainer="";
				break;
		}
	
	}
	?>
    
    <?php get_template_part('page-templates/slideshow'); ?>

    <!-- content section start here -->
    <section id="content-wrapper">
           
        <div class="row">
        
        	<?php wp_reset_query(); the_content(); ?>
                	
           <div class="<?php if($position){echo'eight column';}else{echo 'twelve column';}?>" style=" <?php echo $position;?> ">
            
			<?php 
			global $post, $sticky;
			$blog_cat_include = $smof_data['blog_categories'];
			$cat_id = get_cat_ID($blog_cat_include);
			
			$paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
			$blog_items_num = ($smof_data['blog_item_number']) ? $smof_data['blog_item_number'] : 3;
			$blog_order = ($smof_data['blog_order']) ? $smof_data['blog_order']  : "date"; 
			
			$sticky = get_option( 'sticky_posts' );
			
			
			$custom_args = array(
				'post_type' => 'post',
				'cat'=>$cat_id,
				'posts_per_page'=>$blog_items_num,
				'orderby'=>$blog_order,
				'paged' => $paged
			);
			
			$custom_query = new WP_Query($custom_args);
			?>
				<?php while ( $custom_query ->have_posts() ) : $custom_query ->the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                
				<?php if (   $custom_query ->max_num_pages > 1 ) : ?>
                     <?php if(function_exists('wp_pagenavi')) { ?>
                         <?php wp_pagenavi( array( 'query' => $custom_query ) ); ?>
                     <?php }else{ ?>
                            <div class="blog-pagination">
                                <nav class="navigation">
                                    <div class="nav-previous alignleft"><?php next_posts_link( __( '&larr; Older posts', 'indonez' ), $custom_query->max_num_pages); ?></div>
                                    <div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'indonez' ), $custom_query->max_num_pages ); ?></div>
                                </nav>
                            </div>
                    <?php }?>
                <?php endif; ?>
                
			<?php wp_reset_postdata();	?>
            
            
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
