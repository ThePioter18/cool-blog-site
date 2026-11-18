<?php

function post_types() {

//Note Post Type
register_post_type('note', array(
  'show_in_rest' => true,
  'supports' => array('title', 'editor'),
  'public' => false,
  'show_ui' => true,
  'labels' => array(
    'name' => 'Notatki',
    'add_new_item' => 'Dodaj nową notatkę',
    'edit_item' => 'Edytuj notatkę',
    'all_items' => 'Wszystkie notatki',
    'singular_name' => 'Notatka'
  ),
  'menu_icon' => 'dashicons-welcome-write-blog'
));

}
add_action('init', 'post_types');