<?php
get_header();

if(is_page()){
  the_post();
  echo '<h1 class="into">' . get_the_title() . '</h1>';
  the_content();
} else {
  if(is_search()){
    $title = 'Results for "' . get_search_query() . '"';
  } else if(is_author()) {

    // https://codex.wordpress.org/Author_Templates
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    $title = $curauth->display_name . '\'s Quips';
  } else if(is_tax()) {
    $title = 'Quips from ' . single_term_title('', false);
  }

  echo '<h1 class="into">' . $title . '</h1>';
  $quip_list_q = $wp_query;
  get_template_part('partials/quip-list');
}

wp_reset_query();

get_footer();
