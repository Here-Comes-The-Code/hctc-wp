<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field('homepage', 'options')['portfolio-done'];
$acf_projects = get_field('portfolio-1', 'options');
$decor = $acf['media']['decor'];
$images = $acf['media']['images'];
$max_projects_count = 4;
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
      get_template_part(
        'template-parts/components/section-text',
        null,
        array(
          'text-accent' => $acf['text-accent'],
          'text-normal' => $acf['text-normal'],
          'read-more' => $acf['read-more'],
        )
      ); ?>
    </div>
    <div class='c-text-with-media__imgs'>
      <?php
      $counter = 1;
      if ($acf_projects) : ?>
        <?php foreach ($acf_projects as $project) : ?>
          <?php if ($project['selected'] && $counter <= $max_projects_count) : ?>
            <?php $counter++; ?>
            <div class='c-text-with-media__imgs-wrapper'>
              <?php
              $image = $project['media'];
              $title = $project['title'];
              $subtitle = $project['subtitle'];
              ?>
              <img class='c-text-with-media__imgs-img' src="<?php echo $image['url'] ?>" alt="">
              <span class='c-text-with-media--underline'></span>
              <h4 class='c-text-with-media__imgs-title'><?php echo $title ?></h4>
              <p class='c-text-with-media__imgs-txt'><?php echo $subtitle ?></p>
            </div>
          <?php endif; ?>


        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>