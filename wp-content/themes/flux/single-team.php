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

    <!-- content section start here -->
    <section id="content-wrapper">
           
        <div class="row">
            
            <div class="twelve column">
            
			<?php while (have_posts()) : the_post();?>
			<?php the_content();?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'indonez' ), 'after' => '</div>' ) ); ?>  
            <?php endwhile;?>
            
            </div>
            
                 
        </div>         
                 
    </section>
    <!-- content section end here -->

<?php get_footer(); ?>