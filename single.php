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
	
	// Get content width and sidebar position
	$content_class = basel_get_content_class();

?>


<div class="site-content <?php echo esc_attr( $content_class ); ?>" role="main">

    <?php /* The loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

    <div class='c_contact__container'>
        <div class="c_contact__btns-container fxrow fxwrap post-share">
            <div class="post-container">
                <a rel="nofollow" class="fxflex fxcenter fxcol" href="https://www.facebook.com/groups/smarthomepolska/" target="_blank">
                    <img src="/wp-content/uploads/2020/04/logo2.png" title="logo" style="padding: 3px">
                    <p style='font-size:14px;'>Polska grupa Smart Home by SmartMe</p>
                </a>
            </div>
            <div class="post-container">
                <a rel="nofollow" class="fxflex fxcenter fxcol" href="https://www.facebook.com/groups/XiaomiPolskaSmartMe" target="_blank">
                    <img src="/wp-content/uploads/2020/04/logo1.png" title="logo">
                    <p style='font-size:14px;'>Polska grupa Xiaomi by SmartMe</p>
                </a>
            </div>
            <div class="post-container">
                <a rel="nofollow" class="fxflex fxcenter fxcol" href="https://www.facebook.com/groups/promocjesmarthome/" target="_blank">
                    <img src="/wp-content/uploads/2020/04/logo3.png" title="logo">
                    <p style='font-size:14px;'>Promocje SmartMe</p>
                </a>
            </div>
        </div>
        <div class='js-fb-page'></div>
            <script>
                const pageBoxWidth = window.innerWidth > 991 ? 'data-width="500"' : 'data-width="300"';
                const pageBoxHTML = `
                <div class='c_contact__fb-container'>
                   <div class="fb-page" data-href="https://www.facebook.com/smartme.official/" data-tabs="" ${pageBoxWidth} data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>
                </div>
                `;
                const hook = document.querySelector('.js-fb-page');
                hook.innerHTML = pageBoxHTML; 
            </script>
    </div>

    <!-- <?php if ( basel_get_opt( 'blog_share' ) ): ?>
    <div class="single-post-social">
        <?php if( function_exists( 'basel_shortcode_social' ) ) echo basel_shortcode_social(array('type' => 'share', 'tooltip' => 'yes', 'style' => 'colored')) ?>
    </div>
    <?php endif ?> -->

    <?php if ( basel_get_opt( 'blog_navigation' ) ): ?>
    <div class="single-post-navigation">
        <?php previous_post_link('<div class="prev-link">%link</div>', esc_html__('Previous Post', 'basel')); ?>
        <?php next_post_link('<div class="next-link">%link</div>', esc_html__('Next Post', 'basel')); ?>
    </div>
    <?php endif ?>

    <?php 

					if ( basel_get_opt( 'blog_related_posts' ) ) {
					    $args = basel_get_related_posts_args( $post->ID );

					    $query = new WP_Query( $args );

						 if( function_exists( 'basel_generate_posts_slider' ) ) echo basel_generate_posts_slider(array(
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