<?php
// http://codex.wordpress.org/Function_Reference/register_post_type
function register_custom_post_types() {



  // --------------------------------
  // Quip
  // --------------------------------

  $labels = array(
    'name' => _x('Quips', 'post type general name'),
    'singular_name' => _x('Quip', 'post type singular name'),
    'add_new' => _x('Add New', 'Quip'),
    'add_new_item' => __('Add New Quip'),
    'edit_item' => __('Edit Quip'),
    'new_item' => __('New Quip'),
    'view_item' => __('View Quip'),
    'search_items' => __('Search Quips'),
    'not_found' =>  __('No Quips found'),
    'not_found_in_trash' => __('No Quips found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Quips'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'quip'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 29,
    'menu_icon' => 'dashicons-groups',
    'supports' => array('title', 'page-attributes', 'thumbnail')
  );
  register_post_type('quip', $args);



}
add_action( 'init', 'register_custom_post_types' );
