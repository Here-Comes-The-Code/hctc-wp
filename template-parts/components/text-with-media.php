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

<section class='l-section--content-wrapper l-section--restrict-width l-section-divide l-section-divide--one-third c-text-with-media__default
<?php if ($args['direction']) {
  echo 'c-text-with-media--' . $args['direction'];
} ?>
'>
  <div class='c-text-with-media__txt'>
    <?php
    if ($args['title']) {
      get_template_part(
        'template-parts/components/section-title',
        null,
        array(
          'url' => $args['url'],
          'title' => $args['title'],
        )
      );
    }
    if ($args['text-normal'] || $args['text-accent']) {
      get_template_part(
        'template-parts/components/section-text',
        null,
        array(
          'text-accent' => $args['text-accent'],
          'text-normal' => $args['text-normal'],
          'read-more' => $args['read-more'],
        )
      );
    }
    if ($args['pillars']) :
    ?>
      <div class='c-text-with-media__pillars'>
        <?php foreach ($args['pillars'] as $item) : ?>
          <div class='c-text-with-media__pillars-item'>
            <?php if ($item['icon']) : ?>
              <i class='<?php echo $item['icon']; ?>'></i>
            <?php endif; ?>
            <?php if ($item['img']) : ?>
              <img class='<?php echo $item['icon']; ?>' src='<?php echo $item['img'] ?>' />
            <?php endif; ?>
            <h4 class='c-text-with-media__pillars-title'><?php echo $item['title']; ?></h4>
          </div>
        <?php endforeach; ?>

      </div>
    <?php endif; ?>
  </div>
  <?php if ($args['images']) : ?>
    <div class='c-text-with-media__img <?php if ($args['img-variant']) {
                                          echo 'c-text-with-media__img-' . $args['img-variant'];
                                        } ?>'>
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