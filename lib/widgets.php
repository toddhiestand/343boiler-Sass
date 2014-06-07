<?php

//REGISTER SIDEBARS

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
	'name' => 'Sidebar',
    'id' => 'Sidebar',
	'description' => __('Blog / Articles Sidebars'),
	'before_widget' => '<div id="%1$s" class="sidebar-section">',
	'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));   

if ( function_exists('register_sidebar') ) 
    register_sidebar(array(
    'name' => 'Page Sidebar',
    'id' => 'page-sidebar',
    'description' => __('Sidebar for static pages'),
    'before_widget' => '<div id="%1$s" class="sidebar-section">',
    'after_widget' => '</div>',
    )); 

   }

?>