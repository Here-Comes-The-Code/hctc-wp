<?php
/**
 * The template for displaying Author bios
 */

if( ! basel_get_opt( 'blog_author_bio' ) ) return;
?>

<?php
    $categories = get_the_category();
    if ( !empty( $categories ) && $categories[0]->name === 'News') return;
?>


<div class="author-info">
    <div class="author-avatar">
        <?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Twenty Thirteen 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'twentythirteen_author_bio_avatar_size', 120 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
    </div>

    <div class="author-description">
        <h4 class="author-title">
            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                rel="author">
                <?php the_author(); ?>
            </a>
        </h4>
        <hr class="separator left">

        <p class="author-bio">
            <?php the_author_meta( 'description' ); ?>
        </p>
    </div>
</div>