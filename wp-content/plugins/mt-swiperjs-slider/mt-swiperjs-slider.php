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
    wp_enqueue_style('mt-animate', plugin_dir_url(__FILE__) . 'public/assets/css/animate.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-bootstrap', plugin_dir_url(__FILE__) . 'public/assets/css/bootstrap.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-custom-animation', plugin_dir_url(__FILE__) . 'public/assets/css/custom-animation.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-font-awesome-pro', plugin_dir_url(__FILE__) . 'public/assets/css/font-awesome-pro.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-nice-select', plugin_dir_url(__FILE__) . 'public/assets/css/nice-select.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-slick', plugin_dir_url(__FILE__) . 'public/assets/css/slick.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-swiper-slider', plugin_dir_url(__FILE__) . 'public/assets/css/swiper-bundle.css', [], '1.0.0', 'all');
    wp_enqueue_style('mt-slider-main', plugin_dir_url(__FILE__) . 'public/assets/css/main.css', [], '1.0.0', 'all');

    // JS
    wp_enqueue_script('mt-bootstrap-bundle', plugin_dir_url(__FILE__) . 'public/assets/js/bootstrap-bundle.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('mt-nice-select', plugin_dir_url(__FILE__) . 'public/assets/js/nice-select.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('mt-slick', plugin_dir_url(__FILE__) . 'public/assets/js/slick.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('mt-swiper-slider', plugin_dir_url(__FILE__) . 'public/assets/js/swiper-bundle.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('mt-wow', plugin_dir_url(__FILE__) . 'public/assets/js/wow.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('mt-slider-main', plugin_dir_url(__FILE__) . 'public/assets/js/main.js', ['jquery'], '1.0.0', true);
});

require_once 'functions.php';


add_action('init', function(){
    register_post_type('mt_swiperjs_slider', [
        'labels' => [
            'name' => 'MT Sliders',
            'singular_name' => 'MT Slider',
            'add_new_item' => 'Add New Slide',
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
});

add_action('admin_menu', function(){
    add_submenu_page(
        'edit.php?post_type=mt_swiperjs_slider',
        'Settings',
        'Settings',
        'manage_options',
        'mt-slider-settings',
        'mt_swiperjs_slider_settings_page'
    );
});





