<?php

/***
 * Plugin Name: My Plugin For WordPress
 * Plugin URI: https://www.example.com
 * Description: This is a plugin for WordPress
 * Version: 1.0.0
 * Author: Nanantal
 * Author URI: https://www.Nanantal.com
 * Requires at least: 6.7
 * Requires PHP: 8.2
 * Text Domain: my-plugin
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || die('No script kiddies please!');

if (file_exists(plugin_dir_path(__FILE__) . '/vendor/autoload.php')) {
    require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';
}
// require_once plugin_dir_path(__FILE__) . 'includes/Activate.php';
// require_once plugin_dir_path(__FILE__) . 'includes/Deactivate.php';

use Nanantaltheme\MyPlugin\Activate;
use Nanantaltheme\MyPlugin\Deactivate;
use Nanantaltheme\MyPlugin\Main;
use Nanantaltheme\Admin\Admin;
use Nanantaltheme\Admin\Test;

// Activate::activate(); // Activate the plugin
// Deactivate::deactivate(); // Deactivate the plugin
// Main::register_post_type(); // Register the post type
// Admin::register(); // Register the admin page
// Test::run(); // Run the test class




// add_action('init', function(){
//     echo '<ul>';
//     wp_list_categories(array(
//         'title_li' => '',
//         'show_count' => true,
//         'hide_empty' => false,
//     ));
//     echo '</ul>';
// });

add_action('wp_footer', function () {

    // $all_tags = get_tags(array(
    //     'taxonomy' => 'post_tag',
    //     'hide_empty' => false,
    // ));
    // // echo '<pre>';
    // // var_dump($all_tags);

    // foreach ($all_tags as $single_tags) {

    //     // echo $single_tags->name . ' - '. '(' . $single_tags->count .')' . '<br>';

    //     echo '<a href="' . get_tag_link($single_tags->term_id) . '" class="tag-link">' . $single_tags->name . ' (' . $single_tags->count . ')</a> ' . '<br>';
    // }


    // $all_location = get_tags(array(
    //     'taxonomy' => 'mt_location',
    //     'hide_empty' => false,
    // ));
    // // echo '<pre>';
    // // var_dump($all_tags);

    // foreach ($all_location as $location) {

    //     // echo $single_tags->name . ' - '. '(' . $single_tags->count .')' . '<br>';

    //     echo '<a href="' . get_tag_link($location->term_id) . '" class="tag-link">' . $location->name . ' (' . $location->count . ')</a> ' . '<br>';
    // }


    $all_pages = new WP_Query(array(
        'post_type' => 'mt_book',
        'posts_per_page' => -1,
    ));

    while ($all_pages->have_posts()) {
        $all_pages->the_post();
        echo get_the_title() . '<br>';
        echo get_the_content() . '<br>';
        echo '<hr>';
        echo '<a href="' . get_permalink() . '" class="post-link">Read More</a>' . '<br>';
        echo '<hr>';
        the_post_thumbnail();
        $categories = get_the_terms(get_the_ID(), 'mt_category');
        foreach ($categories as $category) {
            echo '<a href="' . get_category_link($category->term_id) . '" class="category-link">' . esc_html($category->name) . '</a>';
        }
    }
});




// add_action('init', function () {
//     register_taxonomy('mt_location', 'post', array(
//         'label' => __('MT Locations', 'my-plugin'),
//         'rewrite' => array('slug' => 'location'),
//         'hierarchical' => true,
//         'show_in_rest' => true,
//         'public' => true,
//         'show_admin_column' => true,
//         'show_in_quick_edit' => true,
//         'show_ui' => true,
//         'capabilities' => array(
//             'manage_terms' => 'manage_categories',
//             'edit_terms' => 'manage_categories',
//             'delete_terms' => 'manage_categories',
//             'assign_terms' => 'edit_posts',
//         ),
//         'meta_box_cb' => 'post_categories_meta_box',
//     ));
// });


// Custom Post Type 

add_action('init', function () {
    register_post_type('mt_book', array(
        'labels' => array(
            'name' => __('Books', 'my-plugin'),
            'singular_name' => __('Book', 'my-plugin'),
            'all_items'      => __('All Books', 'my-plugin'),
            'add_new_item' => __('Add New Book', 'my-plugin'),
            'edit_item' => __('Edit Book', 'my-plugin'),
            'new_item' => __('New Book', 'my-plugin'),
            'view_item' => __('View Book', 'my-plugin'),
            'search_items' => __('Search Books', 'my-plugin'),
            'not_found' => __('No books found', 'my-plugin'),
            'not_found_in_trash' => __('No books found in Trash', 'my-plugin'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'all-books'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-book',
        'capability_type'    => 'post',

    ));

    register_taxonomy('mt_category', 'mt_book', array(
        'labels'        => array(
            'name'      => 'Categories',
            'singular_name' => 'category',
            'add_new_item'  => 'Add New Category',
            'all_items'     => 'All Categories',
            'view_items'    => 'View Category'

        ),
        'public'            => true,
        'hierarchical'      => true,
        'rewrite'           => array('slug' => 'genre'),
        'show_admin_column' => true,
        'show_ui'           => true,
    ));
});
