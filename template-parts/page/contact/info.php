<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field('contact-info', 'options');

?>

<div class='c-row-data'>
  <div class="c-row-data__item c-row-data__item--accent">
    <i class="las la-info-circle"></i>
    <div>
      <strong>
        <?php echo $acf['company-name']; ?>
      </strong>
      <?php echo $acf['name']; ?>
    </div>
  </div>
  <div class="c-row-data__item">
    <i class="las la-map-marker"></i>
    <a class='' target="_blank" href="https://www.google.com/maps/search/?api=1&zoom=5&query=<?php echo urlencode(strip_tags($acf['address'])) ?> ">
      <?php echo $acf['address'] ?>
    </a>
  </div>
  <div class="c-row-data__item">
    <i class="las la-phone-volume"></i>
    <a class='' href="tel:<?php echo $acf['phone'] ?>"><?php echo $acf['phone'] ?></a>
  </div>
  <div class="c-row-data__item">
    <i class="las la-envelope"></i>
    <a class='' href="mailto:<?php echo $acf['e-mail'] ?>"><?php echo $acf['e-mail'] ?></a>
  </div>
  <div class="c-row-data__item">
    <span class='c-icon--nip'>NIP</span>
    <div>
      <?php echo $acf['nip']; ?>
    </div>
  </div>
</div>