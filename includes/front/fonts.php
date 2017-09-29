<?php // Add Google Fonts the right way

function theme_slug_fonts_url() {
    $fonts_url = '';
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $ptserif = _x( 'off', 'PTSerif font: on or off', 'adbootstarter' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $source_sans = _x( 'on', 'Source Sans font: on or off', 'adbootstarter' );

    if ( 'off' !== $ptserif || 'off' !== $source_sans ) {
        $font_families = array();

        if ( 'off' !== $ptserif ) {
            $font_families[] = 'PT Serif:400,700,400italic';
        }

        if ( 'off' !== $source_sans ) {
            $font_families[] = 'Source Sans Pro:300,400,600';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
?>