<?php
/**
 * List Child Pages.
 * Include in template by using <?php wpb_list_child_pages(); ?>
 * Shortcode  [wpb_childpages]
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-display-a-list-of-child-pages-for-a-parent-page-in-wordpress/
 */
function wpb_list_child_pages() {

    global $post;

    if ( is_page() && $post->post_parent ) {
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
        $titlenamer = get_the_title($post->post_parent);
        $titlelink = get_permalink($post->post_parent);
     } else {
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
        $titlenamer = get_the_title($post->ID);
        $titlelink = get_permalink($post->ID);
    }
    // if ($childpages) {
    //     $string = '<ul><li><a href="' . $titlelink . '">' . $titlenamer . '</a></li>'
    //     . $childpages . '</ul>';
    // }
        if (count($childpages)!=0) {
        $string = '<aside id="child-pages" class="widget"><ul>'
        . $childpages . '</ul></aside>';
    }
    return $string;
    }

add_shortcode('wpb_childpages', 'wpb_list_child_pages');
?>