<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php the_title() ?></title>
  <link href="//fonts.googleapis.com/css?family=Lato:400,700,300" rel="stylesheet" type="text/css">
  <?php wp_head() ?>
</head>
<body class="<?php body_class() ?>">
  <div class="header " style="padding-bottom: 55px;">
    <div class="container">
      <div class="logo">
        <a href="<?php bloginfo('url') ?>"><img src="<?php echo get_template_directory_uri() ?>/static/logo.png" alt="" class=""></a>
        <a target="_blank" title="Twitter" href="https://twitter.com/quipvid"><i class="icon icon-twitter"></i></a>
        <a target="_blank" title="Twitter" href="https://www.facebook.com/quipvid"><i class="icon icon-facebook"></i></a>
      </div>
      <nav id="main_menu">
        <?php wp_nav_menu('global') ?>
      </nav>
    </div>
    <div class="container wrapper search">
      <div class="row">
    <?php get_search_form() ?>
      </div>
    </div>
  </div>
  <div class="container wrapper">
    <div class="pad30"></div>
