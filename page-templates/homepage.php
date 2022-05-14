<?php /* Template Name: HCTC - Strona główna */

$page_id = 'homepage';
get_header();
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    get_template_part(
      'template-parts/components/hero-banner',
      null,
      array(
        'page' => $page_id,
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
        'page' => $page_id,
        'id' => 'separator-1',
      )
    ); ?>
    <?php get_template_part(
      'template-parts/components/cta-bar',
      null,
      array(
        'page' => $page_id,
        'id' => 'cta-1',
      )
    ); ?>
    <?php
    get_template_part(
      'template-parts/components/portfolio-gallery',
      null,
      array(
        'page' => $page_id,
        'id' => 'portfolio-gallery',
        'item_id' => 'portfolio-item'
      )
  ); ?>
    <?php
    get_template_part(
      'template-parts/page/homepage/portfolio-done',
    ); ?>
    <?php get_template_part(
      'template-parts/components/separator',
      null,
      array(
        'page' => $page_id,
        'id' => 'separator-2',
        'type' => 'reversed',
      )
    ); ?>
    <?php get_template_part(
      'template-parts/page/homepage/references-extract',
    ); ?>
    <?php get_template_part(
      'template-parts/components/cta-bar',
      null,
      array(
        'page' => $page_id,
        'id' => 'cta-2',
      )
    ); ?>
    <?php get_template_part(
      'template-parts/page/homepage/achievements',
    ); ?>
  </main>
</div>
<?php
// get_sidebar();
get_footer();
