<?php
#-----------------------------------------------------------------
# Customise Admin Area
#-----------------------------------------------------------------

//Add Workpower Branding to the Admin Footer
function modify_footer_admin () {
  echo 'Created by <a href="http://workpowermedia.com.au">Workpower</a>.&nbsp;';
  echo 'Powered by <a href="http://WordPress.org">WordPress</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');

//Move the pages menu icon to the top
function rrh_change_post_links() {
    global $menu;
    $menu[6] = $menu[5];
    $menu[5] = $menu[20];
    unset($menu[20]);
}
add_action('admin_menu', 'rrh_change_post_links');

// if ( function_exists( 'add_image_size' ) ) {
// add_image_size( 'new-size', 350, 250, true ); //(cropped)
// }
// add_filter('image_size_names_choose', 'my_image_sizes');
// function my_image_sizes($sizes) {
// $addsizes = array(
// "new-size" => __( "New Size")
// );
// $newsizes = array_merge($sizes, $addsizes);
// return $newsizes;
// }

#-----------------------------------------------------------------
# Plugin Overides
#-----------------------------------------------------------------

//SEO Plugin......

// Filter Yoast Meta Priority
add_filter( 'wpseo_metabox_prio', function() { return 'low';});


#-----------------------------------------------------------------
# Enable shortdoces in sidebar default Text widget
#-----------------------------------------------------------------
add_filter('widget_text', 'do_shortcode');

?>