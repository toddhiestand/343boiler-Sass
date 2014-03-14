<?php

// Includes our custom taxonomies
require_once(__DIR__ . '/lib/taxonomies.php');

// Includes our custom post types
require_once(__DIR__ . '/lib/post-types.php');

// Includes our custom widgets
require_once(__DIR__ . '/lib/widgets.php');


function 343boiler_enqueue_scripts() {
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

add_action('wp_enqueue_scripts', '343boiler_enqueue_scripts');


// Add us some fancy menus

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'utility-menu' => __( 'Utility Menu' )      
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

 // remove dumb admin fields

function add_twitter_contactmethod( $contactmethods ) {
  unset($contactmethods['aim']);
  unset($contactmethods['jabber']);
  unset($contactmethods['yim']);
  return $contactmethods;
}
add_filter('user_contactmethods','add_twitter_contactmethod',10,1);

/**
 * Add additional custom field
 */

add_action ( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action ( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields ( $user )
{
?>
    <h3>Extra profile information</h3>
    <table class="form-table">
        <tr>
            <th><label for="twitter">Twitter</label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Twitter username.</span>
            </td>
        </tr>
        <tr>
            <th><label for="facebook">Facebook</label></th>
            <td>
                <input type="text" name="facebook" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please add the link to your Facebook page.</span>
            </td>
        </tr>
    </table>
<?php
}

add_action ( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action ( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    /* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
    update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
    update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
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