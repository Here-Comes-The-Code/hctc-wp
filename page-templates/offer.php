<?php
/* Template Name: HCTC - Oferta */
get_header();
?>

<?php
$page_id = "offer";
$acf_data = get_field($page_id, 'options');
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    get_template_part(
      'template-parts/components/hero-banner',
      null,
      array(
        'page' => $page_id,
        'variant' => 'alt',
      )
    ); ?>

    <?php
    get_template_part(
      'template-parts/components/text-with-media',
      null,
      array(
        'url' => $acf_data['about']['url'],
        'title' => $acf_data['about']['title'],
        'text-accent' => $acf_data['about']['text-accent'],
        'text-normal' => $acf_data['about']['text-normal'],
        'read-more' => $acf_data['about']['read-more'],
        'images' => $acf_data['about']['media']['images'],
        'decor' => $acf_data['about']['media']['decor'],
        'img-variant' => 'framed'
      )
    );
    ?>
    <?php get_template_part(
      'template-parts/components/cta-bar',
      null,
      array(
        'page' => $page_id,
        'id' => 'cta-1',
        'variant' => 'secondary'
      )
    ); ?>
    <?php
    get_template_part(
      'template-parts/components/portfolio-gallery',
      null,
      array(
        'page' => $page_id,
        'id' => 'items',
        'variant' => 'vertical'
      )
    ); ?>
  </main>
</div>
<?php
// get_sidebar();
get_footer();
