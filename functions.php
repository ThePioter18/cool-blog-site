<?php

/**
 * Enqueue Styles and Scripts
 */
function cool_blog_load_assets() {
    
    $version = wp_get_theme()->get('Version'); // automatically downloads the version from style.css

    // === CSS ===
    wp_enqueue_style(
        'cool-blog-css', 
        get_theme_file_uri('/build/index.css'), 
        array(), 
        filemtime(get_template_directory() . '/build/index.css') // cache busting
    );

    // === JavaScript ===
    wp_enqueue_script(
        'cool-blog-js', 
        get_theme_file_uri('/build/index.js'), 
        array(),                    // dependencies 
        filemtime(get_template_directory() . '/build/index.js'), 
        true                        // load in footer
    );

    // Transferring data from PHP to JS
    wp_localize_script('cool-blog-js', 'ourData', array(
        'root_url'   => get_site_url(),
        'theme_url'  => get_template_directory_uri(),
        'ajax_url'   => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'cool_blog_load_assets');

/**
 * Theme Support
 */
function cool_blog_add_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'cool_blog_add_support');

/**
 * Menu registration
 */
function cool_blog_register_menus() {
    register_nav_menus(array(
        'primary' => 'Menu Główne',
    ));
}
add_action('init', 'cool_blog_register_menus');