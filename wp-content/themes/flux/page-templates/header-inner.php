<?php
global $smof_data, $post;
$page_breadcrumb_onoff = $smof_data['page_breadcrumb_onoff'];
$blog_title = $smof_data['blog_title'];
$blog_desc = $smof_data['blog_desc'];

if($blog_title!=""){
$blog_title = $blog_title;
}else{
$blog_title = __('Blog', 'indonez');
}

?>

	<?php if(!is_front_page()) :?>

    <!-- pagetitle start here -->
    <section id="pagetitle-container">
    	<div class="row">
        	<div class="twelve column">
			<?php 
            
				if(is_singular('portfolio') || is_singular('team') || is_singular('client')) :
				
					echo '<h1>'.get_the_title().'</h1>';	
				
				elseif(is_attachment()):
				
					echo '<h1>'.get_the_title().'</h1>';
			
				elseif(is_single() || is_home()) :
				
					echo '<h1>'.$blog_title.'</h1>';
					if($blog_desc!=""):
					echo '<h3>'.$blog_desc.'</h3>';
					endif;	
				
				elseif(is_archive()):
				
					echo '<h1>';
					if ( is_day() ) :
					printf( __( '<span>%s</span>', 'indonez' ), get_the_date() );
					elseif ( is_month() ) :
					printf( __( '<span>%s</span>', 'indonez' ), get_the_date('F Y') );
					elseif ( is_year() ) :
					printf( __( '<span>%s</span>', 'indonez' ), get_the_date('Y') );
					elseif ( is_author()) :
					printf( __( 'Archives %s', 'indonez' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" );
					
					elseif ( is_search()) :
					printf( __( 'Search Results', 'indonez' ), '<span></span>' );
					
					else :
					printf( __( '%s', 'indonez' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					endif;
					echo '</h1>';
					
					if (category_description() != '') :
					echo'<h3>'.category_description().'</h3>';
					endif;
					
				elseif(is_search()):
				
					echo ' <h1>';
					printf( __( 'Search Result', 'indonez' ), '<span>' . get_search_query() . '</span>' );
					echo '</h1>';
					
				elseif(is_404()):
				
					echo ' <h1>'.__( 'ERROR 404', 'indonez' ).'</h1>';
					
				endif;
            ?>
            </div>
           
			 <?php 
			 if($page_breadcrumb_onoff==1){
				 if(function_exists('bcn_display')){
					echo' <div class="twelve column breadcrumb"><ul>';
					bcn_display_list();
					echo'</ul></div>';
				}
			}
            ?>
            
        </div>	        
    </section>
    <!-- pagetitle end here -->
    
    <?php endif; ?>