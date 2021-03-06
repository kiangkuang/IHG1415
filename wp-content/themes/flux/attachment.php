<?php
get_header();
?>

<?php get_template_part('page-templates/header-inner'); ?>

<!-- maincontent start here -->
<section id="content-wrapper">   
    <div class="row">
		<div class="twelve columns">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
						<div class="entry-attachment">
							<?php if ( wp_attachment_is_image() ) :
                                $attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
                                foreach ( $attachments as $k => $attachment ) {
                                    if ( $attachment->ID == $post->ID )
                                        break;
                                }
                                $k++;
                                // If there is more than 1 image attachment in a gallery
                                if ( count( $attachments ) > 1 ) {
                                    if ( isset( $attachments[ $k ] ) )
                                        // get the URL of the next image attachment
                                        $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                                    else
                                        // or get the URL of the first image attachment
                                        $next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
                                } else {
                                    // or, if there's only 1 image attachment, get the URL of the image
                                    $next_attachment_url = wp_get_attachment_url();
                                }
                            ?>
                            <p class="attachment"><a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php
                                $attachment_size = apply_filters( 'indonez_attachment_size', 960);
                                echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // filterable image width with, essentially, no limit for image height.
                            ?></a></p>
                            
                            <?php the_content( __( 'Read More', 'indonez' ) ); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'indonez' ), 'after' => '</div>' ) ); ?>
                            
    
                            <div class="navigation">
                                <div class="nav-previous alignleft"><?php previous_image_link( true ); ?></div>
                                <div class="nav-next alignright"><?php next_image_link( true ); ?></div>
                            </div>
                            
                            <?php else : ?>
                            <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
                            <?php endif; ?>
                        
						</div><!-- .entry-attachment -->
                        
                        <br class="clear" />
						

				<?php endwhile; ?>
                
                </div>
         </div>
    </div>
</section>
<!-- maincontent end here -->

<?php get_footer(); ?>