<?php
/**
 * The template for displaying the slider
 */

    $mt_loop = get_option('mt_loop') == 'on' ? true : false;
    $mt_slider_autoplay = get_option('mt_slider_autoplay');
    $mt_slider_pagination = get_option('mt_slider_pagination') == 'on'? true : false;

    $mt_slider_query = new WP_Query([
        'post_type'      => 'mt_slider',
    ]);
?>

<div class="my-slider-wrapper">
    <div class="swiper tp-classes-active" data-loop="<?php echo $mt_loop ?>" data-autoplay="<?php echo $mt_slider_autoplay ?>" data-pagination="<?php echo $mt_slider_pagination ?>">
        <div class="swiper-wrapper">
            <?php if($mt_slider_query->have_posts()): ?>
                <?php while($mt_slider_query->have_posts()): $mt_slider_query->the_post(); ?>
                <div class="swiper-slide">
                    <div class="tp-classes-thumb">
                        <?php the_post_thumbnail(); ?>
                        <div class="tp-classes-content">
                            <h2><?php echo get_the_title(); ?></h2>
                            <p><?php echo get_the_content(); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_query(); ?>
            <?php else: ?>
                <p>No Slider content</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="tp-courses-chef-dot"></div>
    <div class="tp-pagenation-wrap">
        <span class="tp-testimonial-prev">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 8H1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M8 1L1 8L8 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </span>
        <span class="tp-testimonial-next">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M8 1L15 8L8 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </span>
    </div>
</div>
