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



add_action('wp_enqueue_scripts', function () {

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


    wp_localize_script('mt-slider-main', "SLIDER_DATA", array(
        'slider_next' => apply_filters('slider_prev_js', '.slider-prev'),
        'slider-prev' => apply_filters('slider_next_js', '.slider-next'),
    ));
});

require_once 'functions.php';


add_action('init', function () {
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

add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=mt_swiperjs_slider',
        'Settings',
        'Settings',
        'manage_options',
        'mt-slider-settings',
        'mt_swiperjs_slider_settings_page'
    );
});


// Footer Hook

add_filter('the_title', function ($title) {
    return '<h2>--->' . $title . ' </h2>' . get_the_ID();
}, 10, 1);


add_action('init', function () {
    remove_filter('mt_slider_after_content', 'mt_slider_modificatoins', 10, 1);
});




// === OPP Theory ===
// 1. Encapsulation
// 2. Inheritance
// 3. Polymorphism
// 4. Abstraction

//  Public, Private, Proteacted


// == Encapsulation and Inheritance ==

// class Pijon
// {

//     public $pijon_specis = 'Desi Pijon <br>';

//     function fly()
//     {
//         echo 'I can fly <br>';
//     }
// }

// $pijon_obj = new Pijon();
// $pijon_obj->fly();
// echo $pijon_obj->pijon_specis;

// class ChildPijon extends Pijon
// {

//     function SummerSalt()
//     {
//         echo 'I can do summer Salt <br>';
//     }
// }

// $child_obj = new ChildPijon();

// $child_obj->SummerSalt();
// $child_obj->fly();
// echo $child_obj->pijon_specis;

// == Polymorphism ===

class Bird
{

    public $name;
    function __construct($param)
    {
        $this->name = $param;
    }

    function Fly()
    {
        echo $this->name . 'I can Fly <br>';
    }

    function get_name()
    {
        return $this->name;
    }
}


class Egle extends Bird
{

    function Fly()
    {
        echo parent::get_name() . ' I can Fly better than othars <br>';
    }
}

$egle_obj = new Egle('Egle');

$egle_obj->fly();


class Pijon extends Bird
{

    function Fly()
    {
        echo parent::get_name() . ' I can Fly Average altiude. <br>';
    }
}

$pijon_obj = new Pijon('Pijon');

$pijon_obj->fly();
