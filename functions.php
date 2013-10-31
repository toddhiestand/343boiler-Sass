<?php

// Includes our custom post types
require_once('lib/post-types.php');

// Includes our custom taxonomies
require_once('lib/taxonomies.php');

// Includes our custom meta-boxes
require_once('lib/meta-boxes.php');

// Includes our custom meta-boxes
require_once('lib/widgets.php');

// Register some often used Scripts 

// flexslider
     wp_register_script( 'flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array(), '2.1', false );
     wp_register_style( 'flex-stylesheet', get_stylesheet_directory_uri() . '/js/flexslider.css', array(), '', 'all' );
//jquery from google cdn
     wp_deregister_script('jquery');
     wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3');
	 wp_register_script( 'stellar', get_stylesheet_directory_uri() . '/js/jquery.stellar.js', array(), false );


	 wp_enqueue_style('flex-stylesheet');
     wp_enqueue_script( 'jquery' );
     wp_enqueue_script( 'flexslider' );
     wp_enqueue_script( 'stellar' );

// Add us some fancy menus

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'utility-menu' => __( 'Utility Menu' ),
      'sitemap-menu' => __( 'Sitemap Menu' )
      
    )
  );
}
add_action( 'init', 'register_my_menus' );


/**
 * Show Kitchen Sink in WYSIWYG Editor
 */
function mb_unhide_kitchensink($args) {
	$args['wordpress_adv_hidden'] = false;
	return $args;
}

// LOGIN STYLE
function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/lib/login.css" />'; 
}
add_action('login_head', 'custom_login');


// Add RSS links to the header 
  add_theme_support('automatic-feed-links');

// Add a few different custom excerpt lengths

   function wpe_excerptlength_short($length) {
       return 25;
   }
   function wpe_excerptlength_medium($length) {
       return 55;
   }
   function wpe_excerptlength_long($length) {
       return 85;
   }
   function wpe_excerptmore($more) {
       return '...<p><a class="btn more" href="'. get_permalink($post->ID) . '">' . 'Read More &rarr;' . '</a></p>';
   }
   
   function wpe_excerpt($length_callback='', $more_callback='') {
       global $post;
       if(function_exists($length_callback)){
           add_filter('excerpt_length', $length_callback);
       }
       if(function_exists($more_callback)){
           add_filter('excerpt_more', $more_callback);
       }
       $output = get_the_excerpt();
       $output = apply_filters('wptexturize', $output);
       $output = apply_filters('convert_chars', $output);
       echo $output;
   }

 
 // Add some featured images and sizes
 
 if ( function_exists( 'add_theme_support' ) ) { 
 add_theme_support( 'post-thumbnails' );
 set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
 
 // additional image sizes
 // delete the next line if you do not need additional image sizes
 add_image_size( 'image-small', 150, 9999 ); //300 pixels wide (and unlimited height)
 add_image_size( 'image-single', 300, 9999 ); //300 pixels wide (and unlimited height)

 }
            
// spam & delete links for all versions of wordpress
 function delete_comment_link($id) {
     if (current_user_can('edit_post')) {
         echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&c='.$id.'">del</a> ';
         echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&dt=spam&c='.$id.'">spam</a>';
     }
 }
 
 // Get rid of those self-pings
 function no_self_ping( &$links ) {
     $home = get_option( 'home' );
     foreach ( $links as $l => $link )
         if ( 0 === strpos( $link, $home ) )
             unset($links[$l]);
 }
 add_action( 'pre_ping', 'no_self_ping' );
     
 // Rid ourselves of the default metaboxes on the post screen
    function remove_default_post_screen_metaboxes() {
  remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
  remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
  remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
  }
    add_action('admin_menu','remove_default_post_screen_metaboxes');
 
 // Rid ourselves of the default metaboxes on the pages screen
    function remove_default_page_screen_metaboxes() {
  remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
  remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
  remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
  }
    add_action('admin_menu','remove_default_page_screen_metaboxes');
    
// Remove all the stupid face widgets from the dashboard

  add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
 global $wp_meta_boxes;
 
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
 unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
 unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
 
 wp_add_dashboard_widget('custom_help_widget', 'Help and Support', 'custom_dashboard_help');
  }
 
 function custom_dashboard_help() {
  echo '<p>If you need help or support for your website, please contact 343design at <a href="mailto:todd@343design.com">todd@343design.com</a></p>';
 }

// Add custom branding to the footer of the admin
 
function modify_footer_admin () {
  echo 'Created by <a href="http://www.343design.com">343design</a>.';
}

add_filter('admin_footer_text', 'modify_footer_admin');

/**
 * Customize Admin Bar Items
 * @since 1.0.0
 * @link http://wp-snippets.com/addremove-wp-admin-bar-links/
 */
function be_admin_bar_items() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu( 'new-link', 'new-content' );
}
add_action( 'wp_before_admin_bar_render', 'be_admin_bar_items' );

/**
 * Customize Menu Order
 * @since 1.0.0
 *
 * @param array $menu_ord. Current order.
 * @return array $menu_ord. New order.
 *
 */
function be_custom_menu_order( $menu_ord ) {
  if ( !$menu_ord ) return true;
  return array(
    'index.php', // this represents the dashboard link

    );
}

add_filter( 'custom_menu_order', 'be_custom_menu_order' );
add_filter( 'menu_order', 'be_custom_menu_order' );


// Remove unnecessary items from the admin bar
function gist_custom_admin_bar_remove() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
  // $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('new-media');
  $wp_admin_bar->remove_menu('new-link');
  $wp_admin_bar->remove_menu('new-theme');
  $wp_admin_bar->remove_menu('w3tc');
}
add_action('wp_before_admin_bar_render', 'gist_custom_admin_bar_remove', 0);

/**
 * Remove Menu Items
 * @since 1.0.0
 *
 * Remove unused menu items by adding them to the array.
 * See the commented list of menu items for reference.
 *
 */
function be_remove_menus () {
  global $menu;
  $restricted = array(__('Media'));
  // Example:
  //$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
}
add_action( 'admin_menu', 'be_remove_menus' );


// Add some helpful styles to the backend
function gist_custom_admin_styles() { 
   echo '<style type="text/css">
      #wp-admin-bar-site-name > .ab-item {
        background: transparent url(/site/wp-content/themes/343boiler/logo.png) 4px 3px no-repeat !important;
        height: 20px;
        width: 8px;
        margin-top: 4px;
        text-indent: -999em;
      }
      #wp-admin-bar-site-name.hover > .ab-item {
        background-color: white !important;
        background-position: 4px -25px !important;
      }
      .status-draft { opacity: .5; -webkit-transition: opacity 1s; -moz-transition: opacity 1s; transition: opacity 1s }
      .status-draft:hover { opacity: 1; -webkit-transition: opacity .3s; -moz-transition: opacity .3s; transition: opacity .3s }
      .field-expanded input { width: 100%; }
         </style>';
}
if ( is_user_logged_in() ) {
  add_action('admin_head', 'gist_custom_admin_styles'); // Logo in admin bar
  add_action('wp_head', 'gist_custom_admin_styles'); 
}


?>