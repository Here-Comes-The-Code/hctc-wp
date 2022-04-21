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
  </main>
</div>
<?php
// get_sidebar();
get_footer();
