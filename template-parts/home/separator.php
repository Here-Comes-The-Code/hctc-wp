<?php
$img = $args['img'];
$title = $args['title'];
$title_url = $args['url'];
$read_more = $args['readmore'];
$variant = $args['variant'];
$class = $args['class'];
$color = $args['color'];
$class = $args['class'];
if ($title_url) {
    $title_url = $args['url']['url'];
}

?>

<?php if ($color) : ?>
    <style>
        .c-separator.color:after {
            background-color: <?php echo $color; ?>
        }

        .c-separator.color .c-separator__button:not(.c-separator__button--alt) {
            background-color: <?php echo $color; ?>
        }

        .c-separator.color .c-separator__button--alt {
            color: <?php echo $color; ?>
        }
    </style>
<?php endif; ?>
<div class='c-separator  <?php if ($variant) {
                                echo "c-separator--" . $variant;
                            }; ?> <?php if ($class) {
                                        echo $class;
                                    }; ?>'>
    <a class='c-separator__button' <?php if ($title_url) {
                                        echo 'href="' . $title_url . '"';
                                    } ?>>
        <?php if ($img) : ?>
            <img src="<?php echo $img ?>" alt="">
        <?php endif; ?>
        <?php echo $title ?>
    </a>
    <?php if ($read_more) : ?>
        <a class='c-separator__button c-separator__button--alt' href='<?php echo $read_more['url']; ?>'>
            <?php echo $read_more['title']; ?>
        </a>
    <?php endif; ?>

</div>