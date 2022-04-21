<?php

/**
 * Template part for displaying hero banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hctc
 */

$acf = get_field($args['page'], 'options')['hero-banner'];
?>

<section class='c-hero-banner' style='background-image: url(<?php echo $acf['bg'] ?>)'>
    <div class='c-hero-banner__txt'>
        <h1 class='c-hero-banner__txt-title'>
            <?php echo $acf['title']; ?>
        </h1>
        <div class='c-hero-banner__txt-subtitle'>
            <?php echo $acf['subtitle']; ?>

        </div>
    </div>
</section>