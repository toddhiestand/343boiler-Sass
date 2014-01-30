<?php

//REGISTER SIDEBARS

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
	'name' => 'Sidebar',
	'description' => __('This is the sidebar. Feel free to add as many widgets as you want.'),
	'before_widget' => '<div id="%1$s" class="sidebar-section">',
	'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));   

if ( function_exists('register_sidebar') ) 
    register_sidebar(array(
    'name' => 'Footer',
    'description' => __(''),
    'before_widget' => '<div id="address" class="section">',
    'after_widget' => '</div>',
    ));        
   }

?>