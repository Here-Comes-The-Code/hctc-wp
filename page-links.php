<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 */

get_header(); ?>


<?php
/* Template Name: Linki afiliacyjneee */
$POSTS_PER_PAGE = 20;
?>

<!-- <form class="affiliate-links-search fxflex" action="<?php echo home_url('/'); ?>">
    <input type="search" name="s" placeholder="Szukaj&hellip;">
    <input type="submit" value="Szukaj">
    <input type="hidden" name="post_type" value="affiliatelinks">
</form> -->


<div class="c_affiliate-links__container js-cpost-loader" data-taxonomy-type='taxonomy' data-taxonomy-term='affiliatelinks' data-taxonomy-pagination='false' data-taxonomy-offset="<?php echo $POSTS_PER_PAGE;?>">
    <?php
    $post_args = array('post_type' => 'affiliatelinks', 'posts_per_page' => $POSTS_PER_PAGE);
    $post_query = new WP_Query($post_args);
    ?>
    <?php

    if ($post_query->have_posts()) :
        while ($post_query->have_posts()) : $post_query->the_post(); ?>

            <article class="c_affiliate-links__item">
                <header class="c_affiliate-links__item-header">

                    <?php if (has_post_thumbnail($post->ID)) : ?>
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                        <a class='c_affiliate-links__item-thumb-container' href="<?php echo esc_url(get_permalink()); ?>">
                            <div class="c_affiliate-links__item-thumb" style="background-image: url('<?php echo $image[0]; ?>')"></div>
                        </a>
                    <?php endif; ?>

                    <span class="c_affiliate-links__item-date links-date"><?php basel_post_date(); ?></span>

                    <div class="c_affiliate-links__item-price">
                        <span class="c_affiliate-links__item-price--old"><?php echo get_post_meta($post->ID, 'old_price', true); ?></span>
                        <span class="c_affiliate-links__item-price--new"><?php echo get_post_meta($post->ID, 'new_price', true); ?></span>
                    </div>
                </header>
                <aside class="">
                    <h3 class="c_affiliate-links__item-title"> <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    <?php
                    $terms = wp_get_post_terms($post->ID, 'links');
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        echo '<a class="c_affiliate-links__item-category" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
                    }
                    ?>
                </aside>

            </article>


            <?php wp_reset_postdata(); ?>

        <?php endwhile; // ending while loop 
        ?>

</div>

<?php else :  ?>
    <p><?php _e('Sorry, no affiliate links matched your criteria.'); ?></p>
<?php endif; // ending condition 
?>
<button   href="#" rel="nofollow" class="btn js-cpost-loader-trigger c_affiliate-links__trigger" data-holder-id="<?php echo esc_attr($id); ?>"><?php _e('Load more posts', 'basel'); ?></button>

<?php get_footer(); ?>