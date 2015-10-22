<?php
/*
 * Template Name: Portfolio
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com

*/
get_header();
?>

	<?php get_template_part('page-templates/slideshow'); ?>

    <!-- content section start here -->
    <section id="content-wrapper">
           
        <div class="row">
           <div class="twelve column">
           
				<?php 
				    global $smof_data , $post;
					$prefix = 'indonez_';
					$getmetapf_type = get_post_meta($post->ID, $prefix . 'portfolio_type', true);
					$getmetapf = get_post_meta($post->ID, $prefix . 'portfolio_cat_include', true);
					$catid = implode(",", $getmetapf);
					$showdesc = $smof_data['portfolio_desc'];
					$showtitle = $smof_data['portfolio_title'];
					$prefix = 'indonez_';
					$getcolumn = get_post_meta($post->ID, $prefix . 'portfolio_layout', true);
					$column = str_replace("+", "", urlencode(strtolower($getcolumn)));
					
					if($column=="2column" || $column=="" ):
						$col =2;
					elseif($column=="3column"):
						$col =3;
					elseif($column=="4column"):
						$col =4;
					endif;
					

                    echo indonez_portfolio($type="".$getmetapf_type."", $showposttitle="".$showtitle."", $showpostdesc="".$showdesc."", $showpost="-1", $colnumber="".$col."", $cat_id="".$catid."");
					
                    the_content();
                ?> 

           </div>
        </div>         
                 
    </section>
    <!-- content section end here -->
	
<?php get_footer(); ?>