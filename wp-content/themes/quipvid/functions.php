<?php

// used for cache-busting
define('QUIP_ASSETS_VER', '0.1');

require('functions/core/custom-post-types.php');
require('functions/core/custom-taxonomies.php');
require('functions/core/custom-menus.php');

// Enqueue theme custom scripts
add_action('wp_enqueue_scripts', 'custom_load_scripts');
function custom_load_scripts()
{

  wp_register_script('custom-main', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), QUIP_ASSETS_VER, TRUE);
  wp_enqueue_script('custom-main');

  wp_register_style('theme-css', get_stylesheet_directory_uri() . '/style.css', FALSE, QUIP_ASSETS_VER, FALSE);
  wp_enqueue_style('theme-css');

  wp_register_style('theme-fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/3.1.0/css/font-awesome.min.css', FALSE, QUIP_ASSETS_VER, FALSE);
  wp_enqueue_style('theme-fontawesome');

}

// show quips on authors page instead of posts
function quip_show_quips_on_author_page( $query ) {
  if ( $query->is_author() && $query->is_main_query() ) {
    $query->set( 'post_type', 'quip' );
  }
}
add_action( 'pre_get_posts', 'quip_show_quips_on_author_page' );
