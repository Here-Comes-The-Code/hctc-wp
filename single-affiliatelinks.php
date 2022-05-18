<?php
/*
 * Template Name: Affiliate links
 * Template Post Type: affiliatelinks 
 */

get_header();  ?>

<?php

// Get content width and sidebar position
$content_class = basel_get_content_class();
$link =  get_post_meta($post->ID, 'link_to_buy', true);
$review =  get_post_meta($post->ID, 'product_review', true);
$terms = wp_get_post_terms($post->ID, 'links');
$coupon = get_post_meta($post->ID, 'link_coupon', true);
$comment = get_post_meta($post->ID, 'product_comment', true);
?>


<div class="site-content <?php echo esc_attr($content_class); ?>" role="main">

    <?php /* The loop */ ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="single-affiliate-link fxrow">
            <figure class="fxflex fxcenter">
                <span class="links-date"><?php basel_post_date(); ?></span>
                <?php the_post_thumbnail('large'); ?>
            </figure>

            <div class="fxcol fxcenter fxgrow single-affiliate-info">
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <div class="fxrow margin-10">
                    <span>KATEGORIA: </span>
                    <?php
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        echo '<a class="selling-store" href="' . $term_link . '">' . $term->name . '</a>' . ' ';
                    }
                    ?>
                </div>
                <?php if ($review) : ?>
                    <div class="fxrow margin-10">
                        <span>RECENZJA: </span>
                        <a href="<?php echo $review; ?>" target="_blank">czytaj więcej...</a>
                    </div>
                <?php endif ?>

                <div class="fxrow fxgrow margin-10 c_promo__container">
                    <div class="price price-old"><?php echo get_post_meta($post->ID, 'old_price', true); ?></div>
                    <div class="price price-new"><?php echo get_post_meta($post->ID, 'new_price', true); ?></div>
                    <div class='price-percent'>przecena o <span class='js-promo-percent'></span>%</div>
                    <?php if ($comment) : ?>
                        <div class="price price-comment">
                            <p>
                                <?php echo get_post_meta($post->ID, 'product_comment', true); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($coupon) : ?>
                    <div class="fxrow fxcenter affiliate-coupon">
                        <span>KOD: </span>
                        <button>
                            <strong><?php echo $coupon; ?></strong>
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                <?php endif ?>

                <div class='c_promo__controls'>
                    <?php if ($link) : ?>
                        <button class="single-affiliate-button c_promo__button">
                            <a rel="nofollow" href="<?php echo $link; ?>" target="_blank">Kup produkt <i class="fas fa-cart-plus"></i></a>
                        </button>
                    <?php endif ?>
                    <?php if (basel_get_opt('blog_share')) : ?>
                        <div class="single-post-social">
                            <?php if (function_exists('basel_shortcode_social')) echo basel_shortcode_social(array('type' => 'share', 'tooltip' => 'yes', 'style' => 'colored')) ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- <div class="single-affiliate-description">
        <?php // get_template_part( 'content', get_post_format() ); 
        ?>
    </div> -->



        <?php if (basel_get_opt('blog_navigation')) : ?>
            <div class="single-post-navigation">
                <?php previous_post_link('<div class="prev-link">%link</div>', esc_html__('Previous Post', 'basel')); ?>
                <?php next_post_link('<div class="next-link">%link</div>', esc_html__('Next Post', 'basel')); ?>
            </div>
        <?php endif ?>

        <?php

        if (basel_get_opt('blog_related_posts')) {
            $args = basel_get_related_posts_args($post->ID);

            $query = new WP_Query($args);

            if (function_exists('basel_generate_posts_slider')) echo basel_generate_posts_slider(array(
                'title' => esc_html__('Related Posts', 'basel'),
                'slides_per_view' => 2,
                'el_class' => 'basel-related-posts',
            ), $query);
        }

        ?>

        <?php comments_template(); ?>

    <?php endwhile; ?>

</div><!-- .site-content -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>