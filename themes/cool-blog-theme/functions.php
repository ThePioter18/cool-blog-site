<?php

/**
 * Enqueue Styles and Scripts
 */
function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));

  register_rest_field('note', 'userNoteCount', array(
    'get_callback' => function() {return count_user_posts(get_current_user_id(), 'note');}
  ));
}

add_action('rest_api_init', 'university_custom_rest');

function cool_blog_load_assets() {
    
    $version = wp_get_theme()->get('Version'); // automatically downloads the version from style.css

    // === TablerIcons ===
    wp_enqueue_style(
        'tabler-icons',
        'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css', 
        array(),
        null,
        'all'
    );


    // === CSS ===
    wp_enqueue_style(
        'cool-blog-css', 
        get_theme_file_uri('/build/index.css'), 
        array(), 
        filemtime(get_template_directory() . '/build/index.css') // cache busting
    );

    // Automatic loading of all modules from build/css/modules/
    $modules_dir = get_template_directory() . '/build/css/modules/';

    if ( is_dir( $modules_dir ) ) {
        foreach ( glob( $modules_dir . '*.css' ) as $file ) {
            $filename = basename( $file, '.css' );

            if ( str_ends_with( $filename, '.map' ) ) {
                continue;
            }

            wp_enqueue_style(
                'module-' . $filename,
                get_theme_file_uri( '/build/css/modules/' . $filename . '.css' ),
                array( 'cool-blog-css' ),
                filemtime( $file )
            );
        }
    }

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
        'ajax_url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wp_rest')
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

// Force note posts to be private
add_filter('wp_insert_post_data', 'makeNotePrivate', 10, 2);

function makeNotePrivate($data, $postarr) {
  if ($data['post_type'] == 'note') {
    if(count_user_posts(get_current_user_id(), 'note') > 4 AND !$postarr['ID']) {
      die("You have reached your note limit.");
    }

    $data['post_content'] = sanitize_textarea_field($data['post_content']);
    $data['post_title'] = sanitize_text_field($data['post_title']);
  }

  if($data['post_type'] == 'note' AND $data['post_status'] != 'trash') {
    $data['post_status'] = "private";
  }
  
  return $data;
}