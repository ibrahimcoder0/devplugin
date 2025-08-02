<?php

/***
 * Plugin Name: MT Slider
 * Plugin URI: https://www.example.com
 * Description: This is a MT Slider Plugin for WordPress
 * Version: 1.0.0
 * Author: Nanantal
 * Author URI: https://www.Nanantal.com
 * Requires at least: 6.7
 * Requires PHP: 8.2
 * Text Domain: mt-slider
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

add_action('init', function(){
    register_post_type('mt_slider', [
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
        'edit.php?post_type=mt_slider',
        'Settings',
        'Settings',
        'manage_options',
        'tp-slider-settings',
        'mt_slider_settings_page'
    );
});

