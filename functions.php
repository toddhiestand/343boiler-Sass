<?php

// Includes our custom taxonomies
require_once(__DIR__ . '/lib/taxonomies.php');

// Includes our custom post types
require_once(__DIR__ . '/lib/post-types.php');

// Includes our custom widgets
require_once(__DIR__ . '/lib/widgets.php');

// Includes our admin funtions
require_once(__DIR__ . '/lib/admin.php');

function boiler_enqueue_scripts() {
// Register some often used Scripts

  // register some of our custom styles
      wp_register_style( 'ss-pika', get_template_directory_uri() . '/fonts/symbolset/ss-pika.css', array(), '', 'all' );
      wp_register_style( 'ss-social', get_template_directory_uri() . '/fonts/ss-social-circle/ss-social-circle.css', array(), '', 'all' );
      // wp_register_style( 'bscss', get_template_directory_uri() . '/css/jquery.bxslider.css', array(), '', 'all' );
      // wp_register_style( 'pushycss', get_template_directory_uri() . '/stylesheets/pushy.css', array(), '', 'all' );
      //wp_register_style( 'tabscss', get_template_directory_uri() . '/stylesheets/easy-responsive-tabs.css', array(), '', 'all' );

   // register da scripts
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', false, '1.8.3');
      wp_register_script( 'modernizer', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', array(), true );
      wp_register_script( '343theme', get_template_directory_uri() . '/js/theme.js', array(), true );
      // wp_register_script( 'pushy', get_template_directory_uri() . '/js/pushy.js', array(), true,'1.0',true,true );
      // wp_register_script( 'stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array(), true,true );
      // wp_register_script( 'bxjs', get_template_directory_uri() . '/js/jquery.bxslider.js', array(), true,true );
      //wp_register_script( 'selects', get_template_directory_uri() . '/js/jquery.customSelect.min.js', array(), true,true );
      // wp_register_script( 'tabs', get_template_directory_uri() . '/js/easyResponsiveTabs.js', array(), true,true );

   // enqueue da styles
      wp_enqueue_style('ss-pika');
      wp_enqueue_style('ss-social');
      // wp_enqueue_style('bscss');
      // wp_enqueue_style('pushycss');
      // wp_enqueue_style('tabscss');

   // enqueue da scripts
      wp_enqueue_script( 'jquery' );
      wp_enqueue_script( 'modernizer' );
      wp_enqueue_script( '343theme' );
      // wp_enqueue_script( 'pushy' );
      // wp_enqueue_script( 'stellar' );
      // wp_enqueue_script( 'slides' );
      // wp_enqueue_script( 'bxjs' );
      // wp_enqueue_script( 'selects' );
      // wp_enqueue_script( 'tabs' );

}

add_action('wp_enqueue_scripts', 'boiler_enqueue_scripts');


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




 // Get rid of those self-pings
 function no_self_ping( &$links ) {
     $home = get_option( 'home' );
     foreach ( $links as $l => $link )
         if ( 0 === strpos( $link, $home ) )
             unset($links[$l]);
 }
 add_action( 'pre_ping', 'no_self_ping' );



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

// LETS CREAT A FUNCTIN FOR THE SUBNAV
if(!function_exists('get_post_top_ancestor_id')){
/**
 * Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 *
 * @uses object $post
 * @return int
 */
function get_post_top_ancestor_id(){
    global $post;

    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}}

?>
