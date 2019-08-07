<?php
get_header();
the_post();

// pull out our source term
$source_terms = get_the_terms($post, 'quip-source');
$source_term = array_pop($source_terms);

// update view count
$view_count = get_field('view_count') + 1;
update_field('view_count', $view_count);

?>
<div class="row page_watch" itemscope="" itemtype="http://schema.org/VideoObject">

  <div class="span8">
    <div class="video is_paused is_stopped" id="quip_player">
      <div class="control">
        <i class="icon-refresh replay"></i>
      </div>
      <video src="<?php the_field('video_source') ?>" poster="<?php the_field('thumbnail') ?>" autoplay="" playsinline="" style="cursor: pointer;"></video>
    </div>
    <div class="pad25"></div>
  </div>
  <div class="span4">
    <h2 itemprop="name"><?php the_title() ?></h2>
    <meta itemprop="thumbnailUrl" content="<?php echo htmlspecialchars(get_field('thumbnail')) ?>">
    <meta itemprop="description" content="<?php echo htmlspecialchars(get_the_title()) ?> quote from <?php echo htmlspecialchars($source_term->name) ?>">
    <meta itemprop="uploadDate" content="<?php echo get_the_date() ?>">
    <meta itemprop="transcript" content="<?php echo htmlspecialchars(get_field('transcript')) ?>">

    <ul class="icons">
      <li><i class="icon-film black"></i> <a href="<?php echo get_term_link($source_term) ?>"><?php echo $source_term->name ?></a></li>
      <li itemprop="interactionStatistic" itemscope="" itemtype="http://schema.org/InteractionCounter">
        <span itemprop="userInteractionCount" content="<?php echo $view_count ?>">
        <i class="icon-eye-open"></i> <?php echo $view_count ?> Views
        </span>
      </li>
      <li itemprop="author" itemscope="" itemtype="http://schema.org/Person">
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )) ?>">
          <i class="icon-user black"></i> <span itemprop="name"><?php echo get_the_author_meta('display_name') ?></span>
        </a>
      </li>
      <li style="margin-top: 1em;">

      </li>
    </ul>
    <div class="share_sheet" style="margin-top: 1em;">
      <div>
        <strong>Share: </strong>
        <input type="text" value="<?php the_permalink() ?>">
      </div>
    </div>
    <div class="share_sheet">
      <div>
        <strong>Embed: </strong>
        <input type="text" value="<iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://quipvid.com/embed/TX2DRdOP&quot; frameborder=&quot;0&quot; allowfullscreen></iframe>">
      </div>
    </div>
    <div class="pad25"></div>
    <div class="pad25"></div>
  </div>
</div>

<h2>More Quips From <?php echo $source_term->name ?></h2>
<?php
//
$quip_list_q = new WP_Query(array(
	'post_type' => 'quip',
  'posts_per_page' => 12,
  'post__not_in' => array(get_the_ID()),
  'tax_query' => array(
    array(
      'taxonomy' => 'quip-source',
      'terms' => $source_term->term_id
    )
  )
));
get_template_part('partials/quip-list');
?>

    <div class="row">
      <div class="span12">
        <a href="<?php bloginfo('url') ?>/quip-request"><h3>If you were itching to see something specific, click here to let the Quippers know!</h3></a>
      </div>
    </div>
<?php get_footer() ?>
