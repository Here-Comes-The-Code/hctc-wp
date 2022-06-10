<?php
$title = $args['title'];
$title_url = $args['url'];
$read_more = $args['readmore'];
$variant = $args['variant'];
$class = $args['class'];
if ($title_url) {
    $title_url = $args['url']['url'];
}

?>

<div class='c-separator <?php if ($variant) {
                            echo "c-separator--" . $variant;
                        }; ?> <?php if ($class) {
                                    echo $class;
                                }; ?>'>
    <a class='c-separator__button' <?php if ($title_url) {
                                        echo 'href="' . $title_url . '"';
                                    } ?>>
        <?php echo $title ?>
    </a>
    <?php if ($read_more) : ?>
        <a class='c-separator__button c-separator__button--alt' href='<?php echo $read_more['url']; ?>'>
            <?php echo $read_more['title']; ?>
        </a>
    <?php endif; ?>

</div>