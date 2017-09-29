<?php if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { die(); }

#-----------------------------------------------------------------
# Load framework
#-----------------------------------------------------------------

require_once get_stylesheet_directory() . '/includes/extension-loader.php';
require_once get_stylesheet_directory() . '/includes/core/custom-posts.php';
require_once get_stylesheet_directory() . '/includes/core/custom-taxonomies.php';
require_once get_stylesheet_directory() . '/includes/core/customizr.php';


// Content width
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 980;


#-----------------------------------------------------------------
# Theme Features
#-----------------------------------------------------------------

function wkpower_setup() {

    //Translation
    load_theme_textdomain('wkpower', get_template_directory() . '/languages');

    // WP Stuff
    add_editor_style(); // Admin editor styles
    add_theme_support('automatic-feed-links'); // RSS Feeds
    add_theme_support( 'title-tag' ); // Let WP handle the title tag
    register_nav_menus( array( 'main-menu' => __( 'Main Menu', 'wkpower' ),
        'mobile-menu' => __( 'Mobile Menu', 'wkpower' ))
    ); // Register Navigation

    //Register Sidebars / Widgets
    register_sidebar( array(
        'name'          => __( 'Default Sidebar', 'adbootstarter' ),
        'id'            => 'sidebar-1',
        'description'   => 'Appears on single news pages',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'adbootstarter' ),
        'id'            => 'sidebar-2',
        'description'   => 'Page specific sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-1',
        'name' =>  __( 'Footer Widget 1', 'adbootstarter' ),
        'description' =>  __( 'Used for footer widget area', 'adbootstarter' ),
        'before_widget' => '<div id="%1$s" class="adbs-footer-1 widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-2',
        'name' =>  __( 'Footer Widget 2', 'adbootstarter' ),
        'description' =>  __( 'Used for footer widget area', 'adbootstarter' ),
        'before_widget' => '<div id="%1$s" class="adbs-footer-2 widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-3',
        'name' =>  __( 'Footer Widget 3', 'adbootstarter' ),
        'description' =>  __( 'Used for footer widget area', 'adbootstarter' ),
        'before_widget' => '<div id="%1$s" class="adbs-footer-3 widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    //Post Thumbnails
    add_theme_support('post-thumbnails');

    //Addtional image sizes
    add_image_size('site-300', 300, 300, TRUE);
    add_image_size('site-thumbs', 300, 225, TRUE);
    add_image_size('site-450', 450, 300, TRUE);
    add_image_size('site-530', 530, 300, TRUE);
    add_image_size('site-hero', 1200, 800, TRUE);
    add_image_size('profile-image', 100, 100, TRUE);

    //Remove height and width of Markup for responsive imagery
    add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
    add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

    function remove_width_attribute( $html ) {
       $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
       return $html;
    }


}
add_action('after_setup_theme', 'wkpower_setup');

add_filter( 'the_content', 'featured_image_in_feed' );
function featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'site-530', array( 'style' => 'float:right; margin:0 0 10px 10px;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}

#-----------------------------------------------------------------
# Styles and Scripts
#-----------------------------------------------------------------

// Detect if page is the login page to save loading only on front end
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

function theme_styles_and_scripts() {
     if ( !is_admin() && !is_login_page() ) {

        // Javascript
        //................................................

        // Register scripts
        wp_register_script( 'modernizr',        get_stylesheet_directory_uri() . '/assets/js/vendor/modernizr.custom.js' ,'', '', false); // keep the last argument as false which loads modernizr in the head
        // wp_register_script( 'jqueryeasing',     get_stylesheet_directory_uri() . '/assets/js/src/jquery.easing.min.js', array('jquery'), '20150618', true );
        // wp_register_script( 'parallax',         get_stylesheet_directory_uri() . '/assets/js/src/parallax.min.js', array('jquery'), '20130115', true );
        // wp_register_script( 'fancybox',         get_stylesheet_directory_uri() . '/assets/js/src/jquery.fancybox.pack.js', 'jquery', '2.0.4', true);
        // wp_register_script( 'gridder',          get_stylesheet_directory_uri() . '/assets/js/src/jquery.gridder.min.js', array('jquery'), '20130115', true );
        // wp_register_script( 'theme-js',         get_stylesheet_directory_uri() . '/assets/js/main.min.js', array('jquery'), '1.0', true );
        wp_register_script( 'project-js',         get_stylesheet_directory_uri() . '/assets/js/project-full.js', array('jquery'), '1.0', true );

        // Enqueue scripts
        wp_enqueue_script( 'modernizr' );
        wp_enqueue_script( 'jquery' );
        // wp_enqueue_script( 'jqueryeasing' );
        // wp_enqueue_script( 'parallax' );
        // wp_enqueue_script( 'fancybox' );
        // wp_enqueue_script( 'gridder' );
        // wp_enqueue_script( 'theme-js' );
        wp_enqueue_script( 'project-js' );

        // CSS
        //................................................

        // Theme Default
        // wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/assets/css/project.min.css', array(), '0.2.0');

        // Theme Default
        wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/assets/css/project.css', array(), '0.3.0');

        // Load Google Fonts specified in '/includes/fonts.php'
        wp_enqueue_style( 'custom-google-fonts', theme_slug_fonts_url(), array(), null );
    }
}
add_action('wp_enqueue_scripts', 'theme_styles_and_scripts', 11 );

function my_custom_login_logo() {
    echo '<style type="text/css">
        body {background-color:#bd0726;}
        h1 a { background-image:url('.get_bloginfo('template_directory').'/assets/icons/appleicon.png) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

#-----------------------------------------------------------------
# >IE 9 Styles and Scripts
# http://alxmedia.se/code/2013/11/make-ie-87-and-6-more-compliant-with-css3-mediaqueries-and-html5/
#-----------------------------------------------------------------

/*  IE js header
/* ------------------------------------ */
function wp_ie_js_header () {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_stylesheet_directory_uri() . '/assets/js/ie/html5shiv.min.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_stylesheet_directory_uri() . '/assets/js/ie/selectivizr-min.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_stylesheet_directory_uri() . '/assets/js/ie/ie-only.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'wp_ie_js_header' );

/*  IE js footer
/* ------------------------------------ */
function wp_ie_js_footer () {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/assets/js/ie/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_footer', 'wp_ie_js_footer', 20 );

$landing_page_templates = array(
   array (
     array (
       'param' => 'post_type',
       'operator' => '==',
       'value' => 'page',
     ),
     array (
       'param' => 'page_template',
       'operator' => '!=',
       'value' => 'templates/page-business.php',
     ),
   ),
 );
 add_theme_support( 'flexible-content-location', $landing_page_templates );

 function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
/**
 * Hide editor on specific pages.
 *
 */
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  // Hide the editor on the page titled 'Homepage'
  // $homepgname = get_the_title($post_id);
  // if($homepgname == 'Homepage'){
  //   remove_post_type_support('page', 'editor');
  // }
  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  if($template_file == 'templates/page-service.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}
