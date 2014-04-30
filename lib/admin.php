<?php

// BRANDING

// Add custom branding to the footer of the admin
 
function modify_footer_admin () {
  echo 'Created by <a href="http://www.343design.com">343design</a>.';
}

add_filter('admin_footer_text', 'modify_footer_admin');

// LOGIN STYLE
function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/lib/login.css" />'; 
}
add_action('login_head', 'custom_login');

// spam & delete links for all versions of wordpress
 function delete_comment_link($id) {
     if (current_user_can('edit_post')) {
         echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&c='.$id.'">del</a> ';
         echo '| <a href="'.get_bloginfo('wpurl').'/wp-admin/comment.php?action=cdc&dt=spam&c='.$id.'">spam</a>';
     }
 }

// EDITOR AND APPEARANCE

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
    


?>