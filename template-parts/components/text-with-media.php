<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf_options = get_field($args['page'], 'options');
$acf = $acf_options[$args['id']];
?>

<section class='l-section--content-wrapper l-section--restrict-width l-section-divide l-section-divide--one-third c-text-with-media__default'>
  <div class='c-text-with-media__txt'>
    <?php get_template_part(
      'template-parts/components/section-title',
      null,
      array(
        'url' => $args['url'],
        'title' => $args['title'],
      )
    );
    get_template_part(
      'template-parts/components/section-text',
      null,
      array(
        'text-accent' => $args['text-accent'],
        'text-normal' => $args['text-normal'],
        'read-more' => $args['read-more'],
      )
    ); ?>
  </div>
  <?php if ($args['images']) : ?>
    <div class='c-text-with-media__img c-text-with-media__img-framed'>
      <?php foreach ($args['images'] as $img) : ?>
        <?php $image = $img['image'] ?>
        <div>
          <img class='js-parallax' src="<?php echo $image['url'] ?>" alt="">
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <?php if ($args['decor']) : ?>
    <img src='<?php echo $decor['url']; ?>' />
  <?php endif; ?>
</section>