<?php
/**
 * The template for displaying content in the index.php and blog template
 *
 * @package Flux
 * @author Indonez
 * @link http://indonez.com
 */
  
	global $post, $smof_data;
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

    <article id="post-<?php the_ID(); ?>" class="blog-post <?php get_post_class(); ?>">
    
    	<?php
		$showauthor = $smof_data['blog_show_author'];
		$showpostdate = $smof_data['blog_show_postdate'];
		$showtag = $smof_data['blog_show_tag'];
		$showcomments = $smof_data['blog_show_comments'];
		?>
        
        <?php if(!is_search()): ?>
			<?php 
            $prefix = 'indonez_';
            $video = get_post_meta($post->ID, $prefix . 'video_embed', true);
            ?>
            <?php if($video){ ?>
                <div class="blog-media">
                    <?php
                        if (is_youtube($video)) {  
                            echo '<div class="video-container-post"><a href="'.$video.'"  rel="youtube"></a></div>';
                        } elseif (is_vimeo($video)) {
                            echo '<div class="video-container-post"><a href="'.$video.'"  rel="vimeo"></a></div>';
                        } elseif (is_quicktime($video)) {
                            echo '<div class="video-container-post"><a href="'.$video.'"  rel="quicktime"></a></div>';
                        } elseif (is_flash($video)) {
                            echo '<div class="video-container-post"><a href="'.$video.'"  rel="flash"></a></div>';
                        }
                    ?>
                </div>
            <?php } ?>
        <?php endif; ?>         

    
    
        <h3 class="posttitle"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        
        <?php if($showauthor==1 || $showpostdate==1 || $showtag==1 || $showcomments==1) {?>
        <ul class="no-bullet post-info">
        	<?php if($showauthor==1) {?>
                <li><i class="icon-user"></i><span><?php the_author_posts_link();?></span></li>
            <?php } ?>
            <?php if($showpostdate==1) {?>
                <li class="no-tag2"><i class="icon-clockalt-timealt"></i><span><?php the_time('M d, Y'); ?></span></li>
            <?php } ?>
            <?php if($showtag==1 && get_the_tag_list( '',', ' ) ) {?>
                <li class="no-tag"><i class="icon-tag"></i><span><?php the_tags('',', '); ?></span></li>
            <?php } ?>
            <?php if($showcomments==1 &&  comments_open()) {?>
                <li class="no-tag2"><i class="icon-comment"></i><span><?php comments_popup_link(__('0 Comments','indonez'),__('1 Comments','indonez'),__('% Comments','indonez'));?></span></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
        <?php } ?>
        
		<?php if(!is_search()): ?>
        
             <?php the_content('<span class="button small rdm">'.$readmoretext.'</span>');?>
             <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'indonez' ), 'after' => '</div>' ) ); ?>
        
        <?php else: ?>
        
            <?php the_excerpt();?>
            
        <?php endif; ?>
        
           
    </article>

    