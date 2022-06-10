<?php
$post = $args['post'];
$section_title = $args['section-title'];
$add_excerpt = $args['add-excerpt'];
$class = $args['class'];
// post metadata
$id = $post->ID;
$title = $post->post_title;
$post_link = get_permalink($id);
// excerpt
$post_excerpt_length = 200;
// img 
$img = get_the_post_thumbnail($id);
// author
$author = get_user_meta($post->post_author);
$author_name = $author['first_name'][0] . ' ' . $author['last_name'][0][0];
$author_link = get_author_posts_url($post->post_author);
// category
$category = get_the_category($id);
// select only first - primary - category
$category_name = $category[0]->name;
$category_link = get_category_link($category[0]->term_id);


?>

<div class='c-post <?php
                    if ($class) {
                      echo $class;
                    }
                    ?>'>
  <a class='c-post__img' href="<?php echo $post_link; ?>">
    <?php echo $img; ?>
  </a>
  <div class='c-post__txt'>
    <?php
    if ($section_title) :
    ?>
      <span class='c-post__txt-section-title'><?php echo $section_title; ?></span>
    <?php
    endif;
    ?>
    <a href="<?php echo $category_link; ?>" class="c-post__txt-category">
      <?php echo $category_name; ?>
    </a>
    <a class='c-post__txt-title' href="<?php echo $post_link; ?>">
      <h2 class="c-post__txt-title"><?php echo $title; ?></h2>
    </a>
    <a href="<?php echo $author_link; ?>" class="c-post__txt-author">
      <?php echo $author_name; ?>
    </a>
    <?php
    if ($add_excerpt) :
    ?>

      <a href="<?php echo $post_link; ?>" class='c-post__txt-excerpt'><?php


                                        $excerpt = strip_tags($post->post_content);
                                        if (strlen($excerpt) > $post_excerpt_length) {
                                          $excerpt = substr($excerpt, 0, $post_excerpt_length);
                                           $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

                                          $excerpt = preg_replace("/\[[^)]+\]/", "", $excerpt);
                                          $excerpt .= '... <strong>[czytaj dalej]</strong>';
                                        }
                                        echo $excerpt;
                                        ?></a>
    <?php
    endif;
    ?>
  </div>
</div>