<?php
/* Template Name: HCTC - Realizacje */
get_header();
?>

<?php
$page_id = "done";
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
        'url' => $acf_data['done']['url'],
        'title' => $acf_data['done']['title'],
        'text-accent' => $acf_data['done']['text-accent'],
        'text-normal' => $acf_data['done']['text-normal'],
        'read-more' => $acf_data['done']['read-more'],
        'images' => $acf_data['done']['media']['images'],
        'decor' => $acf_data['done']['media']['decor'],
        'img-variant' => 'framed'
      )
    );
    ?>
    <?php
    get_template_part(
      'template-parts/page/done/realised',
      null,
      array(
        'id' => 'portfolio-1'
      )
    );
    ?>
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
      'template-parts/components/text-with-media',
      null,
      array(
        'url' => $acf_data['references']['url'],
        'title' => $acf_data['references']['title'],
        'text-accent' => $acf_data['references']['text-accent'],
        'text-normal' => $acf_data['references']['text-normal'],
        'read-more' => $acf_data['references']['read-more'],
        'images' => $acf_data['references']['media']['images'],
        'decor' => $acf_data['references']['media']['decor'],
        'img-variant' => 'framed',
        'direction' => 'rtl'

      )
    );
    ?>
        <?php
    get_template_part(
      'template-parts/page/done/references',
      null,
      array(
        'id' => 'portfolio-2'
      )
    );
    ?>

  </main>
</div>
<?php
// get_sidebar();
get_footer();
