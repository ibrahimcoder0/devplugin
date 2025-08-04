<?php

/**
 * The template for displaying the slider
 */

$mt_loop = get_option('mt_loop') == 'on' ? true : false;
$mt_autoplay = get_option('mt_autoplay');
$mt_slider_pagination = get_option('mt_slider_pagination') == 'on' ? true : false;
$mt_slider_arrow = get_option('mt_slider_arrow') == 'on' ? true : false;

$mt_slider_query = new WP_Query([
    'post_type'      => 'mt_swiperjs_slider',
]);

?>


<!-- hero area start -->
<div class="tp-slider-3-area  black-bg p-relative">
    <div class="tp-slider-3-wrapper fix p-relative">
        <?php if (!empty($mt_slider_arrow)): ?>
            <div class="tp-slider-3-arrow-box">
                <button class="slider-prev active"><i class="fa-regular fa-arrow-left-long"></i></button>
                <button class="slider-next"><i class="fa-regular fa-arrow-right-long"></i></button>
            </div>
        <?php endif; ?>
        <div class="tp-slider-dots dots-color"></div>
        <div class="swiper-container tp-slider-3-active" data-loop="<?php echo $mt_loop ?>" data-autoplay="<?php echo $mt_autoplay ?>" data-pagination="<?php echo $mt_slider_pagination ?>" data-arrow="<?php echo $mt_slider_arrow ?>">
            <div class="swiper-wrapper">
                <div class="tp-slider-3-shape-2 d-none d-sm-block">
                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/img/hero/shape-3-2.png" alt="">
                </div>
                <div class="tp-slider-3-shape-3 d-none d-md-block">
                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/img/hero/shape-3-3.png" alt="">
                </div>
                <?php if ($mt_slider_query->have_posts()): ?>
                    <?php while ($mt_slider_query->have_posts()): $mt_slider_query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="tp-slider-3-height p-relative">
                                <div class="tp-slider-3-shape-1 d-none d-xl-block">
                                    <img src="<?php echo plugin_dir_url(dirname(__FILE__)); ?>assets/img/hero/shape-3-1.png" alt="">
                                </div>
                                <div class="tp-slider-3-bg ">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="tp-slider-3-content z-index-3">
                                                <div class="tp-slider-3-title-box">
                                                    <span class="tp-slider-2-subtitle pb-5"><?php echo get_the_content(); ?></span>
                                                    <h1 class="tp-slider-3-title mb-40"><?php echo get_the_title(); ?></h1>
                                                </div>
                                                <div class="tp-slider-3-button">
                                                    <a class="tp-btn hover-2" href="about-us.html"><span>Discover More</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                <?php else: ?>
                    <p>No Slider content</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<!-- hero area end -->