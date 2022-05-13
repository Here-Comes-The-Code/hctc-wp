<?php /* Template Name: HCTC - Kontakt */
get_header();
?>

<?php
$acf_data = get_field('contact', 'options');
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    get_template_part(
      'template-parts/components/hero-banner',
      null,
      array(
        'page' => 'contact',
        'variant' => 'alt',
      )
    ); ?>
    <div class='l-section--content-wrapper l-section--restrict-width l-section-divide l-section-divide--one-third '>
      <div>
        <?php
        get_template_part(
          'template-parts/components/section-title',
          null,
          array(
            'url' => $acf_data['about']['url'],
            'title' => $acf_data['about']['title'],
          )
        );
        get_template_part(
          'template-parts/components/section-text',
          null,
          array(
            'text-accent' => $acf_data['about']['text-accent'],
            'text-normal' => $acf_data['about']['text-normal'],
            'read-more' => $acf_data['about']['read-more'],

          )
        );
        get_template_part(
          'template-parts/components/section-title',
          null,
          array(
            'url' => $acf_data['contact-info']['url'],
            'title' => $acf_data['contact-info']['title'],
          )
        );
        get_template_part(
          'template-parts/page/contact/info',
        );
        ?>
      </div>
      <?php
      $form_decor = $acf_data['form']['decor'];
      $form_img = $acf_data['form']['img'];
      ?>
      <div class='c-form-contact'>
        <img class='c-form-contact__decor' src='<?php echo $form_decor['url']; ?>' />
        <?php
        echo do_shortcode('[ninja_form id=1]');
        ?>
        <div class='c-form-contact__img'>
          <img src='<?php echo $form_img['url']; ?>' />
        </div>
      </div>

    </div>
  </main>
</div>
<?php
// get_sidebar();
get_footer();
