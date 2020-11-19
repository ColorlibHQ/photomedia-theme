<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package photomedia
 */
?>

<div class="col-xl-6 col-md-6">
    <div class="single_blog">
        <div class="blog_thumb">
            <a href="<?php the_permalink(); ?>">
                <?php 
                    echo has_post_thumbnail() ? the_post_thumbnail( 'blog_img_thumb_362x262', ['alt' => get_the_title()] ) : '';
                ?>
            </a>
        </div>
        <div class="blog_meta">
            <p><?php echo photomedia_featured_post_cat(', ', 'photomedia-category-link'); ?> | <?php echo the_time('F j Y');?></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
    </div>
</div>
