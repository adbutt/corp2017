<?php
// Register Custom Post Type
function custom_business_units() {

      $labels = array(
            'name'                => _x( 'Business Units', 'Post Type General Name', 'text_domain' ),
            'singular_name'       => _x( 'Business Unit', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'           => __( 'Business Units', 'text_domain' ),
            'name_admin_bar'      => __( 'Business Units', 'text_domain' ),
            'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
            'all_items'           => __( 'All Business Units', 'text_domain' ),
            'add_new_item'        => __( 'Add New Business Unit', 'text_domain' ),
            'add_new'             => __( 'Add Business Unit', 'text_domain' ),
            'new_item'            => __( 'New Business Unit', 'text_domain' ),
            'edit_item'           => __( 'Edit Business Unit', 'text_domain' ),
            'update_item'         => __( 'Update Business Unit', 'text_domain' ),
            'view_item'           => __( 'View Business Unit', 'text_domain' ),
            'search_items'        => __( 'Search Business Unit', 'text_domain' ),
            'not_found'           => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
      );
      $args = array(
            'label'               => __( 'business_units', 'text_domain' ),
            'description'         => __( 'Business Units', 'text_domain' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 7,
            'menu_icon'           => 'dashicons-networking',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
      );
      register_post_type( 'business_units', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_business_units', 0 );

function create_team_posts() {
      register_post_type( 'team', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
            // let's now add all the options for this post type
            array('labels' => array(
                  'name' => __('Team Members', 'post type general name'), /* This is the Title of the Group */
                  'singular_name' => __('Team Member', 'post type singular name'), /* This is the individual type */
                  'all_items' => __('All Team Members'), /* the all items menu item */
                  'add_new' => __('Add Team Member', 'custom post type item'), /* The add new menu item */
                  'add_new_item' => __('Add New Team Member'), /* Add New Display Title */
                  'edit' => __( 'Edit' ), /* Edit Dialog */
                  'edit_item' => __('Edit Team Members'), /* Edit Display Title */
                  'new_item' => __('New Team Members'), /* New Display Title */
                  'view_item' => __('View Team Member'), /* View Display Title */
                  'search_items' => __('Search Team Members'), /* Search Custom Type Title */
                  'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
                  'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
                  'parent_item_colon' => ''
                  ), /* end of arrays */
                  'description' => __( 'This is the Team Member post type' ), /* Custom Type Description */
                  'public' => true,
                  'publicly_queryable' => true,
                  'exclude_from_search' => false,
                  'show_ui' => true,
                  'query_var' => true,
                  'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
                  'menu_icon' => 'dashicons-groups',
                  'rewrite'   => array( 'slug' => 'team-members', 'with_front' => false ), /* you can specify it's url slug */
                  'has_archive' => 'team-members', /* you can rename the slug here */
                  'capability_type' => 'post',
                  'hierarchical' => false,
                  /* the next one is important, it tells what's enabled in the post editor */
                  'supports' => array( 'title', 'editor', 'thumbnail')
            ) /* end of options */
      ); /* end of register post type */


}

      // adding the function to the Wordpress init
      add_action( 'init', 'create_team_posts', 0);
?>