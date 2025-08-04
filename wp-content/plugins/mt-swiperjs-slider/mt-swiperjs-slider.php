<?php

/***
 * Plugin Name: MT Swiperjs Slider
 * Plugin URI: https://www.nanantal.com
 * Description: This is a MT Swiperjs Slider Plugin for WordPress
 * Version: 1.0.0
 * Author: Nanantal
 * Author URI: https://www.Nanantal.com
 * Requires at least: 6.7
 * Requires PHP: 8.2
 * Text Domain: mt-swiperjs-slider
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || die('No script kiddies please!');



add_action('wp_enqueue_scripts', function(){

    // CSS
    wp_enqueue_style('tp-swiper-slider', plugin_dir_url(__FILE__) . 'public/css/swiper-bundle.css', [], '1.0.0', 'all');
    wp_enqueue_style('tp-slider-main', plugin_dir_url(__FILE__) . 'public/css/main.css', [], '1.0.0', 'all');

    // JS
    wp_enqueue_script('tp-swiper-slider', plugin_dir_url(__FILE__) . 'public/js/swiper-bundle.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('tp-slider-main', plugin_dir_url(__FILE__) . 'public/js/main.js', ['jquery'], '1.0.0', true);
});

require_once 'functions.php';



