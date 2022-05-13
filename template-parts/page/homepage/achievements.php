<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field('homepage', 'options')['achievements'];

?>
<?php
if ($acf['is-active']) :
?>
  <section class="l-section--content-wrapper ">
    <div class="c-achievements">
      <div class='c-achievements__col'>
        <?php
        $counter = 0;
        while ($counter < 3) :
          $item = $acf['achievement-list'][$counter];
          if ($item) :
        ?>
            <div class='c-achievements__item c-achievements__item--top'>
              <span div class='c-achievements__item-number'>
                <?php echo $item['achievement']['number']; ?>
              </span>
              <p div class='c-achievements__item-txt'>
                <?php echo $item['achievement']['title']; ?>
              </p>
            </div>
        <?php
            $counter++;
          endif;
        endwhile;
        ?>
      </div>
      <div class='c-achievements__media'>
        <?php $decor = $acf['decor'];
        if ($decor) : ?>
          <img class='c-text-with-media__decor c-achievements__decor' src="<?php echo $decor['url'] ?>" alt="<?php echo $decor['title'] ?>">
        <?php endif; ?>
        <img class='js-parallax' src="<?php echo $acf['background']['url']; ?>" alt="<?php $acf['background']['title']; ?>">
      </div>
      <div class='c-achievements__col'>
        <?php
        $counter = 3;
        while ($counter < 6) :
          $item = $acf['achievement-list'][$counter];
          if ($item) :
        ?>
            <div class='c-achievements__item c-achievements__item--bottom'>
              <span div class='c-achievements__item-number'>
                <?php echo $item['achievement']['number']; ?>
              </span>
              <p div class='c-achievements__item-txt'>
                <?php echo $item['achievement']['title']; ?>
              </p>
            </div>
        <?php
            $counter++;
          endif;
        endwhile;
        ?>
      </div>
    </div>
  </section>
<?php endif; ?>