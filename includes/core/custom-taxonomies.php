<?php

// Register Custom Taxonomy
function register_team_member_categories() {

  $labels = array(
    'name'                       => _x( 'Teams', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Team', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'team', 'text_domain' ),
    'all_items'                  => __( 'All Teams', 'text_domain' ),
    'parent_item'                => __( 'Parent Team', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Team:', 'text_domain' ),
    'new_item_name'              => __( 'New Team Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Team', 'text_domain' ),
    'edit_item'                  => __( 'Edit Team', 'text_domain' ),
    'update_item'                => __( 'Update Team', 'text_domain' ),
    'view_item'                  => __( 'View Team', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate teams with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove teams', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Teams', 'text_domain' ),
    'search_items'               => __( 'Search Teams', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => false,
    'public'                     => true,
    'show_ui'                    => false,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => false,
    'show_tagcloud'              => false,
  );
  register_taxonomy( 'team_member_team_categories', array( 'team' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_team_member_categories', 0 );
?>