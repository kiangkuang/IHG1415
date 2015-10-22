<?php
/**
 * The template for displaying Comments.
 */
?>
<div id="comments">
<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','indonez'));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php echo __('This post is password protected. Enter the password to view comments.', 'indonez') ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

	<?php if ( have_comments() ) : // if there are comments ?>
        
        <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
    		
        <h4 class="comment-heading"><?php
			printf( _n( 'One Comment to %2$s', '%1$s Comments to %2$s', get_comments_number(), 'templatesquare' ),
			number_format_i18n( get_comments_number() ), '&quot;' . get_the_title() . '&quot;' );
			?></h4>
        <ol class="commentlist">
            <?php wp_list_comments('type=comment&avatar_size=50&callback=indonez_comment'); ?>
        </ol>
        <?php endif; ?>
        <div class="clear"></div>
        
        <?php if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
    		<h4 class="comment-heading"><?php echo __('Trackbacks for this post', 'indonez') ?></h4>
    		<ol class="commentlist">
				<?php wp_list_comments('type=pings&callback=indonez_list_pings'); ?>
            </ol>
        <?php endif; ?>
		    <div class="clear"></div>
        
    		<div class="navigation">
    			<div class="alignleft"><?php previous_comments_link(); ?></div>
    			<div class="alignright"><?php next_comments_link(); ?></div>
    		</div>
    		
		<?php if ('closed' == $post->comment_status ) : // if the post has comments but comments are now closed ?>
		<p class="nocomments"><?php echo __('Comments are now closed for this article.', 'indonez') ?></p>
		<?php endif; ?>

 		<?php else :  ?>
		
        <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>
        <!-- If comments are open, but there are no comments. -->

        <?php else : // if comments are closed ?>
		
		<?php if (is_single()) { ?><p class="nocomments"><?php echo __('Comments are closed.', 'indonez') ?></p><?php } ?>

        <?php endif; ?>
        
        
<?php endif; ?>


	<?php if ( comments_open() ) : ?>

  <?php 
  $defaults = array( 
  'fields' => apply_filters( 'comment_form_default_fields', 
    array(
      'author' => 
              '<fieldset><div class="label-form-inline">' .
              '<input id="author" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"' . $req . '   class="textfield"/><label for="author">' . __( 'Name' ,'indonez') . ( $req ? '<span class="required">*</span>' : '' ) . '</label> </div>',
      
      'email'  => 
              '<div class="label-form-inline">' .
              '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $req . '  class="textfield" /><label for="email">' . __( 'Email','indonez' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> </div>',
      
      'url'    => 
              '<div class="label-form-inline">' .
              '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3"  class="textfield" /><label for="url">' . __( 'Website','indonez' ) . '</label></div>'  ) ),
      
      'comment_field' => 
                '<div class="label-form-inline">' .
                '<textarea id="comment" name="comment" cols="2" rows="8" tabindex="4" aria-required="true" class="textarea" ></textarea></div></fieldset>',
      
      'comment_notes_after' => '',
      'id_form' => 'comment-form',
      'id_submit' => 'submit',
      'title_reply' => __( 'Leave a comment','indonez' ),
      'title_reply_to' => __( 'Reply to %s' ,'indonez'),
      'cancel_reply_link' => __( 'Cancel reply' ,'indonez'),
      'label_submit' => __( 'Submit','indonez')
      );


comment_form($defaults); 

?>
  
	<?php endif; // If registration required and not logged in ?>


</div>