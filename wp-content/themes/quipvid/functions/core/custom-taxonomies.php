<?php
// http://codex.wordpress.org/Function_Reference/register_taxonomy
function register_custom_taxonomies() {

  // --------------------------------
  // Quip Source
  // --------------------------------

  register_taxonomy(
    'quip-source', // taxononmy ID. Make this unique from CPTs and Pages to avoid URL rewrite headaches.
    array(
      'quip' // applicable post type
    ),
    array(
      'hierarchical' => true,
      'show_ui' => true,
      'public' => true,
      'label' => __('Quip Source'),
      'show_in_nav_menus' => false,
      'labels' => array(
        'add_new_item' => 'Add New Quip Source'
      ),
      'query_var' => true,
    )
  );





}
add_action( 'init', 'register_custom_taxonomies' );
