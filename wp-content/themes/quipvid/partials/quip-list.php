<div id="load" class="row latest" data-page="1">
  <?php
  // $quip_list_q should be setup as a WP_Query instance before this file is loaded
  global $quip_list_q;
  if($quip_list_q->post_count == 0){
    echo '<strong>No quips bro</strong>';
  }
  while($quip_list_q->have_posts()):
    $quip_list_q->the_post();
    $thumbnail = get_field('thumbnail');
    ?>
    <div class="span3">
        <div class="tile">
            <a class="vid vid_modal" href="<?php the_permalink() ?>" style="background-image: url('<?php echo $thumbnail ?>');"></a>
            <h6><a class="vid_modal" href="<?php the_permalink() ?>"><span><?php the_title() ?></span></a></h6>
        </div>
        <div class="pad25"></div>
    </div>
    <?php
  endwhile;

  wp_reset_query();
  ?>
</div>
