<?php
/**
 * The template for displaying all pages.
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
 
get_header(); ?>

   <?php 
    global $smof_data;
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
            
            <?php if($showcontainer=="yes") { ?>    	
            <div class="<?php if($position){echo'eight column';}else{echo 'twelve column';}?>" style=" <?php echo $position;?> ">
            <?php } ?>
            
			<?php if ( have_posts() )  the_post();?>
            
			
			<?php the_content();?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'indonez' ), 'after' => '</div>' ) ); ?>  
              
            <?php if($showcontainer=="yes") { ?> 
            </div>
            <?php } ?>
            
            <?php if($position){ ?>
            <div class="four column widget-side-area">
            
               <?php get_sidebar(); ?>
               
            </div> 
            <?php } ?>
                 
        </div>         
                 
    </section>
    <!-- content section end here -->

<?php get_footer(); ?>