<?php
$ads_intro = get_field('intro', 'options');
$ads_cfg = get_field('ads-cfg', 'options');
$currentDate = date("d-m-Y");

// $active_group;
foreach ($ads_cfg as $group) {
    if ($group['is-active']) {
        $active_group = $group;
        break;
    }
}

?>

<section class='c_ad__container'>
    <div class='c_ad__wrapper'>
    <img src='https://imppl.tradedoubler.com/imp?type(inv)g(25180874)a(3251354)'>
        <?php
        if ($ads_intro) :
        ?>
            <div class='c_ad__intro-container'>
                <?php
                if ($ads_intro['title']) :
                ?>
                    <h3 class='c_ad__intro-title'>
                        <?php echo $ads_intro['title'] ?>
                    </h3>
                <?php endif; ?>
                <?php
                if ($ads_intro['description']) :
                ?>
                    <p class='c_ad__intro-txt'>
                        <?php echo $ads_intro['description'] ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php
        if ($active_group) :
        ?>
            <div class='c_ad__slider-container swiper swiper-container'>
                <div class='c_ad__groups-container c_ad__slider-wrapper swiper-wrapper'>
                    <?php foreach ($active_group['banners'] as $banner) : ?>
                        <?php
                        if ($banner['is-active'] && strtotime($currentDate) > strtotime($banner['time-active-start']) && strtotime($currentDate) <= strtotime($banner['time-active-stop'])) :
                        ?>
                            <a target="_blank" class='c_ad__banner-container c_ad__slider-slide swiper-slide' <?php
                                                                                                                if ($banner['url']) {
                                                                                                                    echo 'href=' . $banner['url'];
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                }
                                                                                                                ?>>
                                <?php
                                if ($banner['img']) :
                                ?>
                                    <div class='c_ad__banner-img-container'>
                                        <?php
                                        if ($banner['img']['sm']) :
                                        ?>
                                            <img class='c_ad__banner-img c_ad__banner-img-sm' src="<?php echo $banner['img']['sm'] ?>" alt=<?php echo $banner['name'] ?>>
                                        <?php endif; ?>
                                        <?php
                                        if ($banner['img']['md']) :
                                        ?>
                                            <img class='c_ad__banner-img c_ad__banner-img-md' src="<?php echo $banner['img']['md'] ?>" alt=<?php echo $banner['name'] ?>>
                                        <?php endif; ?>
                                        <?php
                                        if ($banner['img']['lg']) :
                                        ?>
                                            <img class='c_ad__banner-img c_ad__banner-img-lg' src="<?php echo $banner['img']['lg'] ?>" alt=<?php echo $banner['name'] ?>>
                                        <?php endif; ?>
                                        <img class='c_ad__banner-img c_ad__banner-img-desktop' src="<?php echo $banner['img']['desktop'] ?>" alt=<?php echo $banner['name'] ?>>

                                    </div>

                                <?php endif; ?>
                                <?php
                                if ($banner['name']) :
                                ?>
                                    <span class='c_ad__banner-text-title'>
                                        <?php echo $banner['name'] ?>;
                                    </span>
                                <?php endif; ?>
                                <?php
                                if ($banner['description']) :
                                ?>
                                    <span class='c_ad__banner-text-description'>
                                        <?php echo $banner['description'] ?>;
                                    </span>
                                <?php endif; ?>

                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="c_ad__slider-pagination swiper-pagination"></div>
            <!-- <div class="c_ad__slider-button-prev swiper-button-prev"></div> -->
            <!-- <div class="c_ad__slider-button-next swiper-button-next"></div> -->
        <?php endif; ?>
</section>