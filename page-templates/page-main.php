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
/* Template Name: smartme.pl - strona główna */
?>

<?php
/* Ad - banner, normal
-------------------------------- */
?>
<section class='l-section l-section--restrict-width '>
    <?php
    get_template_part(
        'template-parts/home/separator',
        null,
        array(
            'title' => "Reklama",
            'variant' => "alt",
        )
    );
    get_template_part(
        'template-parts/home/ads-banner',
    ); ?>
</section>
<?php
/* "Featured"
-------------------------------- */
?>
<section class='l-section l-section--restrict-width  l-section-grid l-section-grid--one-third'>
    <?php
    // featured 
    ?>
    <div class='l-section--content-wrapper'>
        <?php
        // separator
        $acf_featured_separator_title = get_field('featured', 'options')['sep']['title'];
        $acf_featured_separator_url = get_field('featured', 'options')['sep']['url'];
        get_template_part(
            'template-parts/home/separator',
            null,
            array(
                'title' => $acf_featured_separator_title,
                'url' => $acf_featured_separator_url,
                'readmore' => $acf_featured_separator_readmore
            )
        );
        ?>

        <?php
        // posts
        $acf_featured_data = get_field('featured', 'options');
        $acf_featured_main_post = $acf_featured_data['main'];
        $acf_featured_sub_1 = $acf_featured_data['sub_1'];
        $acf_featured_sub_2 = $acf_featured_data['sub_2'];
        $acf_featured_fallback = $acf_featured_data['fallback'];
        // fallback if no data is selected
        $args = array(
            'posts_per_page' => 3,
            'cat' => $acf_featured_fallback
        );
        $acf_featured_fallback_posts;
        if (!$acf_featured_main_post || !$acf_featured_sub_1 || !$acf_featured_sub_2) {
            $q = new WP_Query($args);
            if ($q->have_posts()) {
                while ($q->have_posts()) {
                    $q->the_post();
                    $acf_featured_fallback_posts[] = get_post();
                }
                wp_reset_postdata();
            }
            if (!$acf_featured_main_post) {
                $acf_featured_main_post = $acf_featured_fallback_posts[0];
            };
            if (!$acf_featured_sub_1) {
                $acf_featured_sub_1 = $acf_featured_fallback_posts[1];
            };
            if (!$acf_featured_sub_2) {
                $acf_featured_sub_2 = $acf_featured_fallback_posts[2];
            };
        };

        ?>
        <div class='c-featured__container'>
            <?php
            get_template_part(
                'template-parts/home/render-post',
                null,
                array(
                    'post' => $acf_featured_main_post,
                    'class' => 'c-featured__post c-featured__post-main'
                )
            );
            get_template_part(
                'template-parts/home/render-post',
                null,
                array(
                    'post' => $acf_featured_sub_1,
                    'class' => 'c-featured__post  c-featured__post-sub'
                )
            );
            get_template_part(
                'template-parts/home/render-post',
                null,
                array(
                    'post' => $acf_featured_sub_2,
                    'class' => 'c-featured__post  c-featured__post-sub'
                )
            );
            ?>
        </div>
    </div>
    <?php
    /* "News"
-------------------------------- */
    ?>
    <div class=' l-section--content-wrapper'>
        <?php
        // separator
        $acf_news_separator_title = get_field('news', 'options')['sep']['title'];
        $acf_news_separator_url = get_field('news', 'options')['sep']['url'];
        $acf_news_separator_readmore = get_field('news', 'options')['sep']['read-more'];
        get_template_part(
            'template-parts/home/separator',
            null,
            array(
                'title' => $acf_news_separator_title,
                'url' => $acf_news_separator_url,
                'readmore' => $acf_news_separator_readmore
            )
        );
        ?>
        <?php
        // news
        $acf_news_data = get_field('news', 'options');
        $acf_news_count = $acf_news_data['news-count'];
        $acf_category_id = $acf_news_data['category-id'];
        $acf_news_posts;
        if ($acf_news_count > 0) {
            $args = array(
                'posts_per_page' => $acf_news_count,
                'cat' => $acf_category_id
            );
            $q = new WP_Query($args);
            if ($q->have_posts()) {
                while ($q->have_posts()) {
                    $q->the_post();
                    $acf_news_posts[] = get_post();
                }
                wp_reset_postdata();
            }
        ?>
            <div class='c-news'>
                <?php
                foreach ($acf_news_posts as $post) :
                ?>

                    <?php
                    get_template_part(
                        'template-parts/home/render-post',
                        null,
                        array(
                            'post' => $post,
                            'class' => 'c-news__post '
                        )
                    );
                    ?>
                <?php endforeach; ?>
            </div>
        <?php } ?>

    </div>
</section>
<section class='l-section l-section--restrict-width '>
    <?php
    /* "Ad - optads"
-------------------------------- */
    ?>
    <?php
    get_template_part(
        'template-parts/home/separator',
        null,
        array(
            'title' => "Reklama",
            'variant' => "alt",
            'class' => 'js-optads'
        )
    );
    ?>
</section>
<!-- Reviews -->
<?php
$acf_reviews_data = get_field('reviews', 'options');
/* separator */
$acf_reviews_separator = $acf_reviews_data['sep'];
$acf_reviews_separator_title = $acf_reviews_separator['title'];
$acf_reviews_separator_url = $acf_reviews_separator['url'];
$acf_reviews_separator_readmore = $acf_reviews_separator['read-more'];
/* reviews */
$acf_reviews_main_review = $acf_reviews_data['main-review'];
$acf_reviews_section_title = $acf_reviews_data['section-title'];
$acf_reviews_category_id = $acf_reviews_data['category-id'];
$acf_reviews_count = $acf_reviews_data['count'];
$acf_reviews_posts;
$acf_reviews_index = 0;
// loop through posts, get last 5 reviews
$args = array(
    'posts_per_page' => 5,
    'cat' => $acf_reviews_category_id
);
// query for category posts
$q = new WP_Query($args);
if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        $acf_reviews_posts[] = get_post();
    }
    wp_reset_postdata();
}
// if no main is selected, pick it from the array
if (!$acf_reviews_main_column) {
    $acf_reviews_main_review = $acf_reviews_posts[0];
    array_shift($acf_reviews_posts);
}
?>
<section class='l-section l-section--restrict-width  c-media--deco'>
    <?php
    get_template_part(
        'template-parts/home/separator',
        null,
        array(
            'title' => $acf_reviews_separator_title,
            'url' => $acf_reviews_separator_url,
            'readmore' => $acf_reviews_separator_readmore
        )
    );
    ?>
    <?php
    get_template_part(
        'template-parts/home/render-post',
        null,
        array(
            'post' => $acf_reviews_main_review,
            'class' => 'c-post-primary__main',
            'section-title' => $acf_reviews_section_title,
            'add-excerpt' => true,
        )
    );
    ?>
    <div class='c-post-primary__small-wrapper'>
        <?php
        $count = 0;
        foreach ($acf_reviews_posts as $post) :
            $count++;
        ?>

            <?php
            if ($count < 5) {
                get_template_part(
                    'template-parts/home/render-post',
                    null,
                    array(
                        'post' => $post,
                        'class' => 'c-post-primary__small ',
                        'add-excerpt' => true,
                    )
                );
            }
            ?>
        <?php endforeach; ?>
    </div>

</section>
<!-- Media -->
<?php
$acf_media_data = get_field('media', 'options');
$acf_audio = $acf_media_data['podcast'];
$acf_videos_latest = $acf_media_data['videos'];
$acf_selected_video = $acf_media_data['video-main'];

$acf_media_separator = $acf_media_data['sep'];
$acf_media_separator_title = $acf_media_separator['title'];
$acf_media_separator_url = $acf_media_separator['url'];
$acf_media_separator_readmore = $acf_media_separator['read-more'];

?>

<section class='l-section c-media'>
    <div class='c-media__bg''>
     <img  src="<?php echo $acf_media_data['background']['url']; ?>" alt="">
    </div>
    <div class=' c-media__title l-section--restrict-width '>
        <?php echo $acf_media_data['title']; ?>
    </div>
    <div class=' c-media__content l-section-grid l-section-grid--one-two l-section--restrict-width '>
        <div class=' c-media__item c-media__item--audio'>
        <?php echo $acf_audio; ?>
    </div>
    <div class='c-media__item c-media__item--video'>
        <?php
        if ($acf_selected_video) :
        ?>
            <iframe width="700" height="340" src="<?php echo str_replace('watch?v=', 'embed/', $acf_selected_video); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php endif; ?>
        <?php
        if (!$acf_selected_video) :
        ?>
            <?php echo $acf_videos_latest; ?>
        <?php endif; ?>
    </div>
    </div>
    <div class='c-media__controls l-section--restrict-width'>
        <span>
            <?php echo $acf_media_data['title-controls']; ?>
        </span>
        <div>
            <?php
            foreach ($acf_media_data['controls'] as $button) :
            ?>
                <a class='' href='<?php echo $button['button'] ?>'>
                    <?php echo $button['button']['title'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Sponsored -->
<?php
$acf_sponsored_main_data = get_field('sponsored_main', 'options');
/* separator */
$acf_sponsored_main_separator = $acf_sponsored_main_data['sep'];
$acf_sponsored_main_separator_title = $acf_sponsored_main_separator['title'];
$acf_sponsored_main_separator_url = $acf_sponsored_main_separator['url'];
$acf_sponsored_main_separator_readmore = $acf_sponsored_main_separator['read-more'];
/* sponsored article */
$acf_sponsored_active = $acf_sponsored_main_data['is-active'];
$acf_sponsored_post = get_post($acf_sponsored_main_data['post']);
$acf_sponsored_section_title = $acf_sponsored_main_data['section-title'];
$acf_sponsored_section_excerpt = $acf_sponsored_main_data['excerpt'];
$acf_sponsored_section_color = $acf_sponsored_main_data['color'];
$acf_sponsored_section_additional = $acf_sponsored_main_data['additional'];
$acf_sponsored_section_logo = $acf_sponsored_main_data['logo'];
?>

<?php if ($acf_sponsored_active) : ?>
    <section class='l-section l-section--restrict-width  c-media--deco-inv'>
        <?php
        get_template_part(
            'template-parts/home/separator',
            null,
            array(
                'title' => $acf_sponsored_main_separator_title,
                'url' => $acf_sponsored_main_separator_url,
                'readmore' => $acf_sponsored_main_separator_readmore,
                'img' => $acf_sponsored_section_logo,
                'color' => $acf_sponsored_section_color,
                'class' => "color",
            )
        );
        ?>
        <?php if ($acf_sponsored_section_color) : ?>
            <style>
                .c-post-primary--sponsored .c-post__img {
                    box-shadow: 0 0 15px 0 <?php echo $acf_sponsored_section_color; ?>;
                }
            </style>
        <?php endif; ?>
        <?php
        get_template_part(
            'template-parts/home/render-post',
            null,
            array(
                'post' => $acf_sponsored_post,
                'class' => 'c-post-primary__main c-post-primary--reversed c-post-primary--sponsored',
                'section-title' => $acf_sponsored_section_title,
                'add-excerpt' => true,
                'custom-excerpt' => $acf_sponsored_section_excerpt
            )
        );
        ?>
        <div class='c-post-primary__micro-wrapper c-separator__raw--top'>
            <?php if ($acf_sponsored_section_additional) : ?>
                <?php foreach ($acf_sponsored_section_additional as $post) {
                    get_template_part(
                        'template-parts/home/render-post',
                        null,
                        array(
                            'post' => $post,
                            'class' => 'c-post-primary__micro ',
                        )
                    );
                } ?>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>
<!-- Guides -->
<?php
$acf_guides_data = get_field('guides', 'options');
/* separator */
$acf_guides_separator = $acf_guides_data['sep'];
$acf_guides_separator_title = $acf_guides_separator['title'];
$acf_guides_separator_url = $acf_guides_separator['url'];
$acf_guides_separator_readmore = $acf_guides_separator['read-more'];
/* guides data */
$acf_guides_main_guide = $acf_guides_data['main-post'];
$acf_guides_section_title = $acf_guides_data['section-title'];
$acf_guides_category_id = $acf_guides_data['category-id'];
$acf_guides_count = $acf_guides_data['count'];
$acf_guides_posts;
$acf_guides_index = 0;
// loop through posts, get last 5 reviews
$args = array(
    'posts_per_page' => 5,
    'cat' => $acf_guides_category_id
);
// query for category posts

$q = new WP_Query($args);
if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        $acf_guides_posts[] = get_post();
    }
    wp_reset_postdata();
}
// if no main review is selected, pick it from the array
if (!$acf_guides_main_guide) {
    $acf_guides_main_guide = $acf_guides_posts[0];
    array_shift($acf_guides_posts);
}
?>

<section class='l-section l-section--restrict-width <?php if ($acf_sponsored_active == false) {
                                                        echo 'c-media--deco-inv';
                                                    } ?>'>
    <?php
    get_template_part(
        'template-parts/home/separator',
        null,
        array(
            'title' => $acf_guides_separator_title,
            'url' => $acf_guides_separator_url,
            'readmore' => $acf_guides_separator_readmore
        )
    );
    ?>
    <?php
    get_template_part(
        'template-parts/home/render-post',
        null,
        array(
            'post' => $acf_guides_main_guide,
            'class' => 'c-post-primary__main',
            'section-title' => $acf_guides_section_title,
            'add-excerpt' => true,
        )
    );
    ?>
    <div class='c-post-primary__small-wrapper'>
        <?php
        $count = 0;
        foreach ($acf_guides_posts as $post) :
            $count++;
        ?>

            <?php
            if ($count < 5) {
                get_template_part(
                    'template-parts/home/render-post',
                    null,
                    array(
                        'post' => $post,
                        'class' => 'c-post-primary__small ',
                        'add-excerpt' => true,
                    )
                );
            }
            ?>
        <?php endforeach; ?>
    </div>

</section>
<!-- Columns -->
<?php
$acf_columns_data = get_field('columns', 'options');
/* separator */
$acf_columns_separator = $acf_columns_data['sep'];
$acf_columns_separator_title = $acf_columns_separator['title'];
$acf_columns_separator_url = $acf_columns_separator['url'];
$acf_columns_separator_readmore = $acf_columns_separator['read-more'];
/* reviews */
$acf_columns_main_column = $acf_columns_data['main-post'];
$acf_columns_section_title = $acf_columns_data['section-title'];
$acf_columns_category_id = $acf_columns_data['category-id'];
$acf_columns_count = $acf_columns_data['count'];
$acf_columns_posts;
$acf_columns_index = 0;
// loop through posts, get last 5 reviews
$args = array(
    'posts_per_page' => 5,
    'cat' => $acf_columns_category_id
);
// query for category posts
$q = new WP_Query($args);
if ($q->have_posts()) {
    while ($q->have_posts()) {
        $q->the_post();
        $acf_columns_posts[] = get_post();
    }
    wp_reset_postdata();
}
// if no main is selected, pick it from the array
if (!$acf_columns_main_column) {
    $acf_columns_main_column = $acf_columns_posts[0];
    array_shift($acf_columns_posts);
}

?>
<section class='l-section l-section--restrict-width '>
    <?php
    get_template_part(
        'template-parts/home/separator',
        null,
        array(
            'title' => $acf_columns_separator_title,
            'url' => $acf_columns_separator_url,
            'readmore' => $acf_columns_separator_readmore
        )
    );
    ?>
    <?php
    get_template_part(
        'template-parts/home/render-post',
        null,
        array(
            'post' => $acf_columns_main_column,
            'class' => 'c-post-primary__main',
            'section-title' => $acf_columns_section_title,
            'add-excerpt' => true,
        )
    );
    ?>
    <div class='c-post-primary__small-wrapper'>
        <?php
        $count = 0;
        foreach ($acf_columns_posts as $post) :
            $count++;
        ?>
            <?php
            if ($count < 5) {
                get_template_part(
                    'template-parts/home/render-post',
                    null,
                    array(
                        'post' => $post,
                        'class' => 'c-post-primary__small ',
                        'add-excerpt' => true,
                    )
                );
            }
            ?>
        <?php endforeach; ?>
    </div>

</section>
<section class='l-section l-section--restrict-width '>
    <?php
    /* "Ad - optads"
-------------------------------- */
    ?>
    <?php
    get_template_part(
        'template-parts/home/separator',
        null,
        array(
            'title' => "Reklama",
            'variant' => "alt",
            'class' => 'js-optads'
        )
    );
    ?>
</section>



<?php get_footer(); ?>