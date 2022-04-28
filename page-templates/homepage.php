<?php /* Template Name: HCTC - Strona główna */

get_header();
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    get_template_part(
      'template-parts/components/hero-banner',
      null,
      array(
        'page' => 'homepage',
      )
    ); ?>
    <?php
    get_template_part(
      'template-parts/page/homepage/about',
    ); ?>
    <?php get_template_part(
      'template-parts/components/separator',
      null,
      array(
        'page' => 'homepage',
        'id' => 'separator-1',
      )
    ); ?>
    <?php get_template_part(
      'template-parts/components/cta-bar',
      null,
      array(
        'page' => 'homepage',
        'id' => 'cta-1',
      )
    ); ?>
    <?php
    get_template_part(
      'template-parts/page/homepage/portfolio-gallery',
    ); ?>
  </main>
</div>
<?php
// get_sidebar();
get_footer();
