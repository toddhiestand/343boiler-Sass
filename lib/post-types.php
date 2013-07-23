<?php

 
// Register Sample Post Type

  function be_register_sample_post_type() {
   $labels = array(
     'name' => 'Post',
     'singular_name' => 'Post',
     'add_new' => 'Add New Entry',
     'add_new_item' => 'Add New Entry',
     'edit_item' => 'Edit Entry',
     'new_item' => 'New Entry',
     'view_item' => 'View Entry',
     'search_items' => 'Search Entries',
     'not_found' =>  'No Entries found',
     'not_found_in_trash' => 'No Entries found in trash',
     'parent_item_colon' => '',
     'menu_name' => 'Entries'
   );
  
   $args = array(
     'labels' => $labels,
     'public' => true,
     'publicly_queryable' => true,
     'show_ui' => true, 
     'show_in_menu' => true, 
     'query_var' => true,
     'rewrite' => true,
     'capability_type' => 'post',
     // 'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
     //'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
	 'rewrite'	=> array( 'slug' => 'sample-post-type', 'with_front' => false ), /* you can specify its url slug */   
	 'has_archive' => 'sample', /* you can rename the slug here */
     'hierarchical' => false,
     'menu_position' => null,
	 'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'sticky')
  ); 

   register_post_type( 'sample', $args );
 }
 add_action( 'init', 'be_register_sample_post_type' ); 


?>