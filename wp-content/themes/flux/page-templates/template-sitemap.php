<?php 
/*
 * Template Name: Sitemap
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
            
           <div class="four column sitemap-heading">
               <h4 class="title-line"><span><?php echo __('Pages','indonez');?></span></h4>
                <ul class="arrow">
					<?php  wp_list_pages(array('exclude' => '','title_li' => '',));?>
                </ul>
            </div>
           <div class="four column sitemap-heading">
               <h4 class="title-line"><span><?php echo __('Blog Archives','indonez');?></span></h4>
               <h6><?php echo __('Archives by Month','indonez');?></h6>
                <ul class="arrow">
					 <?php wp_get_archives('type=monthly'); ?>
                </ul>
               <h6><?php echo __('Archives by Category','indonez');?></h6>
                <ul class="arrow">
					<?php
                    $cats = get_categories('exclude=');
                    foreach ($cats as $cat) {
                        $cat_id = $cat->cat_ID;
                        $cat_name = $cat->name;
                        $cat_link = get_category_link($cat_id); 
                    ?>
                        <li><a href="<?php echo $cat_link;?>"><?php echo $cat_name;?></a></li>
                    <?php } ?>
                </ul>
               <h6><?php echo __('Archives by Tag','indonez');?></h6>
                <ul class="arrow">
					<?php
                    $tags = array();
                    $posts = get_posts('numberposts=-1');
                    foreach ($posts as $p) {
                        foreach (wp_get_post_tags($p->ID) as $tag) {
                            if (array_key_exists($tag->name, $tags))
                                $tags[$tag->name]['count']++;
                            else {
                                $tags[$tag->name]['count'] = 1;
                                $tags[$tag->name]['link'] = get_tag_link($tag->term_id);
                            }
                        }
                    }
                    ?>

                    <?php foreach ($tags as $tag_name => $tag) { ?>
                            <li><a href="<?php echo $tag['link'];?>"><?php echo $tag_name;?></a></li>
                    <?php } ?>
                </ul>
               <h6><?php echo __('Archives by Author','indonez');?></h6>
                <ul class="arrow">
                  <?php  wp_list_authors(array('exclude_admin' => false,)); ?>
                </ul>
            </div>
           <div class="four column sitemap-heading">
                <h4 class="title-line"><span><?php echo __('Latest 20 Posts','indonez');?></span></h4>
                <ul class="arrow">
                    <?php
                    query_posts('posts_per_page=20&post_type=post'); 
                    while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                    <?php endwhile;?>
                </ul>
            </div>
            
        </div>         
                 
    </section>
    <!-- content section end here -->

<?php get_footer(); ?>