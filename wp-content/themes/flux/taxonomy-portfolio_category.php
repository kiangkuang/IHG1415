<?php 
/**
 * The template for displaying portfolio category post.
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
           
				<?php 
				    global $smof_data , $post;
					$prefix = 'indonez_';
					$showdesc = $smof_data['portfolio_desc'];
					$showtitle = $smof_data['portfolio_title'];
					
					$term = get_term_by( 'slug', get_query_var( 'portfolio_category' ),  'portfolio_category'  );
					$cat = $term->term_id;

                    echo indonez_portfolio($type="gallery", $showposttitle="".$showtitle."", $showpostdesc="".$showdesc."", $showpost="-1", $colnumber="4", $cat_id="".$cat."");
					
                ?> 
           </div>
        </div>         
                 
    </section>
    <!-- content section end here -->

<?php get_footer();?>