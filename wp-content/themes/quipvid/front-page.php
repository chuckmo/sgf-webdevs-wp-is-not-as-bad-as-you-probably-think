<?php
get_header();

the_post();
?>
</div>
<div id="banner">
  <div class="pad25 hidden-desktop"></div>

  <div class="container intro_wrapper">
    <div class="inner_content">
      <h1 class="title">
        <i class="icon-facetime-video animated fadeIn"></i>
        <i class="icon-quote-left animated fadeIn"></i>
      </h1>

      <h1 class="intro">
        <?php the_content() ?>
      </h1>
    </div>
  </div>
</div>
<div class="container wrapper">
  <div class="pad30"></div>
  <h1 class="into">Latest Quips</h1>
  <?php
  $quip_list_q = new WP_Query(array(
    'post_type' => 'quip',
    'posts_per_page' => 12,
    'orderby' => 'date',
    'order' => 'DESC'
  ));
  get_template_part('partials/quip-list');
  ?>
</div>

<?php
get_footer();
