<?php

$prefix = '_cmb_'; // start with an underscore to hide fields from custom fields list
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );
function be_sample_metaboxes( $meta_boxes ) {
  global $prefix;

  
    
  return $meta_boxes;
}

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( 'metabox/init.php' );
  }
}

?>