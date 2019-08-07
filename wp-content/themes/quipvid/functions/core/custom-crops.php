<?php

// --------------------------------
// Register Custom Image Crops
// --------------------------------

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'thumbnail', 380, 350, true );
  add_image_size( 'timeline', 680, 510, true );
  add_image_size( 'header', 1170 );
}
