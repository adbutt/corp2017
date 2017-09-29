<?php
#-----------------------------------------------------------------
# Custom Hooks / Filters
#-----------------------------------------------------------------

//Modify Excerpt Length from default 55
function custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Modify Excerpt from default [...] to readmore link
function new_excerpt_more( $more ) {
    return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '"> Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//function to call and print shortened post title
function the_title_shorten($len,$rep='...') {
    $title = the_title('','',false);
    $shortened_title = textLimit($title, $len, $rep);
    print $shortened_title;
}

//shorten title without cutting full words (Thank You Serzh 'http://us2.php.net/manual/en/function.substr.php#83585')
function textLimit($string, $length, $replacer) {
    if(strlen($string) > $length)
    return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
    return $string;
}

//Breadcrumb W3C Validation Resolution
add_filter ('wpseo_breadcrumb_output','mc_microdata_breadcrumb');
function mc_microdata_breadcrumb ($link_output) {
$link_output = preg_replace(array('#<span xmlns:v="http://rdf.data-vocabulary.org/\#">#','#<span typeof="v:Breadcrumb"><a href="(.*?)" .*?'.'>(.*?)</a></span>#','#<span typeof="v:Breadcrumb">(.*?)</span>#','# property=".*?"#','#</span>$#'), array('','<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="$1" itemprop="url"><span itemprop="title">$2</span></a></span>','<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">$1</span></span>','',''), $link_output);

return $link_output;
}


//Lazyload preloader image
add_filter( 'lazyload_images_placeholder_image', 'my_custom_lazyload_placeholder_image' );
function my_custom_lazyload_placeholder_image( $image ) {
    return 'http://workpowercorp.staging.wpengine.com/wp-content/themes/workpower-corporate/assets/images/preload.gif';
}

//301 Redirect Filter - Category to Page
add_filter('term_link', 'term_link_filter', 10, 3);
function term_link_filter( $url, $term, $taxonomy ) {

    if ( is_category( 'latest-news' ) ) {

        $url = site_url( '/news' );

        wp_safe_redirect( $url, 301 );

        exit;

    }

    return $url;

}
/*
 * Adds the custom social sharing icons
 */
function add_social_sharing() { ?>
    <h4>Share this post<h4>
	    <ul class="share-buttons">
		  <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fworkpower.com.au&t=" target="_blank" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook-square fa-2x"></i></a></li>
		  <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fworkpower.com.au&text=:%20http%3A%2F%2Fworkpower.com.au" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter-square fa-2x"></i></a></li>
		  <li><a href="https://plus.google.com/share?url=http%3A%2F%2Fworkpower.com.au" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
		  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fworkpower.com.au&title=&summary=&source=http%3A%2F%2Fworkpower.com.au" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
		  <li><a href="mailto:?subject=&body=:%20http%3A%2F%2Fworkpower.com.au" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><i class="fa fa-envelope-square fa-2x"></i></a></li>
	</ul>
    <?php }
add_action( 'custom_social_share', 'add_social_sharing' );
?>