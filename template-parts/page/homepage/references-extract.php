<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field('homepage', 'options')['references'];
$acf_ref = get_field('portfolio-2', 'options');
$max_ref_count = 3;
?>

<section class="l-section--content-wrapper ">
  <div class="l-section-divide l-section-divide--one-third c-text-with-media">

    <div class='c-text-with-media__txt'>
      <?php
      get_template_part(
        'template-parts/components/section-title',
        null,
        array(
          'url' => $acf['url'],
          'title' => $acf['title'],
        )
      ); ?>
      <?php

      ?>
      <div class='c-text-with-media__txt-paragraph c-text-with-media__txt-paragraph--accent'>
        <?php echo $acf['paragraph-accent']; ?>
      </div>
    </div>
    <div class='c-text-with-media__media '>
      <img class='js-parallax' src="<?php echo $acf['media']['url'] ?>" alt="<?php echo $acf['media']['title'] ?>">
    </div>

  </div>
  <div class='l-section-divide l-section-divide--col-3'>
    <div class='c-text-with-media__refs'>
      <?php
      $counter = 1;
      if ($acf_ref) : ?>
        <?php foreach ($acf_ref as $ref) : ?>
          <?php if ($ref['selected'] && $counter <= $max_ref_count) : ?>
            <?php $counter++; ?>
            <div class='c-text-with-media__refs-wrapper'>
              <?php
              $image = $ref['media'];
              $title = $ref['title'];
              $subtitle = $ref['subtitle'];
              $description = $ref['description'];
              ?>
              <div class='c-text-with-media__refs-txt'>
                <?php echo $description ?>
              </div>
              <h4 class='c-text-with-media__refs-title'><?php echo $title ?></h4>
              <p class='c-text-with-media__refs-subtitle'><?php echo $subtitle ?></p>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </div>
</section>