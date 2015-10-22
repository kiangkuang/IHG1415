<?php
$prefix = 'indonez_';
$sliderrev = get_post_meta($post->ID, $prefix . 'slider_revolution', true);

if($sliderrev!=""){

?> 

<!-- slideshow start here -->
<section id="slideshow-container">
    <div class="banner"> 
        
        <?php
		 if($sliderrev!=""){
			if (function_exists("putRevSlider")){
			putRevSlider($sliderrev); 
			}
		}
		?>
    </div>        
</section>
<!-- slideshow end here -->

<?php
$headernote = get_post_meta($post->ID, $prefix . 'header_note', true);
$headernoteonoff = get_post_meta($post->ID, $prefix . 'header_note_onoff', true);
?>
<?php if($headernoteonoff==1 && $headernote!=""){ ?>
<!-- slide box start here -->
<section id="slide-box">
    <div class="row">
        <div class="twelve column slide-position">                    	
              <?php 
			  echo do_shortcode($headernote);
			  ?>                           
        </div>
    </div>    
</section>
<!-- slide box end here -->
<?php } ?>

<?php } else {?>

	
    <?php if(!is_front_page()) :?>


    <?php
	global $smof_data, $post;
	$prefix = 'indonez_';
	$page_breadcrumb_onoff = $smof_data['page_breadcrumb_onoff'];
	?>
    
    
    <!-- pagetitle start here -->
    <section id="pagetitle-container">
    	<div class="row">
        	<div class="twelve column">
			<?php 
            
                $page_title = get_post_meta($post->ID, $prefix . "page_title",true);
				$page_desc = get_post_meta($post->ID, $prefix . "page_desc",true);
				
                if ($page_title !="") :
                  echo '<h1>'.$page_title.'</h1>';
                else :
                  echo '<h1>'.get_the_title().'</h1>';
                endif;
				
				if($page_desc !=""):
				  echo '<h3>'.$page_desc.'</h3>';
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
    
<?php } ?>