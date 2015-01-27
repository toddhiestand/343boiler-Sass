<?php

//REGISTER SIDEBARS

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
	'name' => 'Sidebar',
    'id' => 'mainsidebar',
	'description' => __('Page Sidebar'),
	'before_widget' => '<div id="%1$s" class="sidebar-section">',
	'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
    ));   

if ( function_exists('register_sidebar') ) 
    register_sidebar(array(
    'name' => 'Footer Left',
    'id' => 'footerone',
    'description' => __('Left Column of Footer'),
    'before_widget' => '<div id="%1$s" class="footer-section">',
    'after_widget' => '</div>',
    )); 

if ( function_exists('register_sidebar') ) 
    register_sidebar(array(
    'name' => 'Footer Left Center',
    'id' => 'footertwo',
    'description' => __('Center Column of Footer'),
    'before_widget' => '<div id="%1$s" class="footer-section">',
    'after_widget' => '</div>',
    )); 


if ( function_exists('register_sidebar') ) 
    register_sidebar(array(
    'name' => 'Footer Right Center',
    'id' => 'footerthree',
    'description' => __('Center Column of Footer'),
    'before_widget' => '<div id="%1$s" class="footer-section">',
    'after_widget' => '</div>',
    )); 

if ( function_exists('register_sidebar') ) 
    register_sidebar(array(
    'name' => 'Footer Right',
    'id' => 'footerfour',
    'description' => __('Right Column of Footer'),
    'before_widget' => '<div id="%1$s" class="footer-section">',
    'after_widget' => '</div>',
    )); 

   }

?>