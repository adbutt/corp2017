<?php
function get_categories_select() {
 $teh_cats = get_categories();
    $results;
    $count = count($teh_cats);
    for ($i=0; $i < $count; $i++) {
      if (isset($teh_cats[$i]))
        $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
      else
        $count++;
    }
  return $results;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wpt_register_theme_customizer ( $wp_customize ) {
	// Customize title and tagline sections and labels
	$wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'wptthemecustomizer');
	$wp_customize->get_control('blogname')->label = __('Site Name', 'wptthemecustomizer');
	$wp_customize->get_control('blogdescription')->label = __('Site Description', 'wptthemecustomizer');
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Customize the Front Page Settings
	$wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'wptthemecustomizer');
	$wp_customize->get_section('static_front_page')->priority = 20;
	$wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'wptthemecustomizer');
	$wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'wptthemecustomizer');
	$wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'wptthemecustomizer');

	// Create custom panels
	$wp_customize->add_panel( 'general_settings', array(
	  'priority' => 10,
	  'theme_supports' => '',
	  'title' => __( 'General Settings', 'wptthemecustomizer' ),
	  'description' => __( 'Controls the basic settings for the theme.', 'wptthemecustomizer' )
	));


	//Add Category Select utilises custom function get_categories_select() above.
	$wp_customize->add_setting(
		'cat_1',
		array(
		'default'        => 'latest-news',
		'capability'     => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cat_1',
			array(
				'settings' => 'cat_1',
				'label'   => 'Select News Category',
				'section' => 'static_front_page',
				'type'    => 'select',
				'choices' => get_categories_select()
			)
		)
	);

	/* ==========================================================================
    Contact Settings Section
    ========================================================================== */

	$wp_customize->add_section(
		'custom_contact',
		array(
			'title'    => __('Contact Details', 'wptthemecustomizer'),
			'description' => __( 'Displays formatted meta data on the contact page', 'wptthemecustomizer' ),
			'priority' => 20,
		)
	);

	//Add Email custom
	$wp_customize->add_setting(
      'wpc_contact_email',
      array(
          'default'           => __( 'wp@workpower.asn.au', 'wptthemecustomizer' ),
          'transport'         => 'refresh',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'casper_sanitize_email'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_contact_email',
            array(
                'label'          => __( 'Email Address', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_contact_email',
                'type'           => 'text'
            )
        )
	);

	//Add Header Telephone Text custom
	$wp_customize->add_setting(
      'wpc_header_tel',
      array(
          'default'           => __( '1800 610 665', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_header_tel',
            array(
                'label'          => __( 'Header Contact No.', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_header_tel',
                'type'           => 'text'
            )
        )
	);

  	//Add Main Telephone Text custom
	$wp_customize->add_setting(
      'wpc_contact_tel',
      array(
          'default'           => __( '(08) 9445 6500', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_contact_tel',
            array(
                'label'          => __( 'Main Contact No.', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_contact_tel',
                'type'           => 'text'
            )
        )
   );

	//Add Street Address Text custom
	$wp_customize->add_setting(
      'wpc_street_address',
      array(
          'default'           => __( '9 Leeway Court, Osborne Park', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_street_address',
            array(
                'label'          => __( 'Street Address', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_street_address',
                'type'           => 'text'
            )
        )
   );

	//Add Locality Text custom
	$wp_customize->add_setting(
      'wpc_locality',
      array(
          'default'           => __( 'Perth', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_locality',
            array(
                'label'          => __( 'City', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_locality',
                'type'           => 'text'
            )
        )
   );

	//Add Region Text custom
	$wp_customize->add_setting(
      'wpc_region',
      array(
          'default'           => __( 'Western Australia', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_region',
            array(
                'label'          => __( 'Region', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_region',
                'type'           => 'text'
            )
        )
   );

	//Add Post Code Text custom
	$wp_customize->add_setting(
      'wpc_post_code',
      array(
          'default'           => __( '6017', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_post_code',
            array(
                'label'          => __( 'Post Code', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_post_code',
                'type'           => 'text'
            )
        )
   );

	//Add Country Text custom
	$wp_customize->add_setting(
      'wpc_country',
      array(
          'default'           => __( 'Australia', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text'
      )
  	);

  	$wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wpc_country',
            array(
                'label'          => __( 'Country', 'wptthemecustomizer' ),
                'section'        => 'custom_contact',
                'settings'       => 'wpc_country',
                'type'           => 'text'
            )
        )
   );

  	/* ==========================================================================
    Social Settings Section
    ========================================================================== */
	$wp_customize->add_section(
	    'wpc_social',
	    array(
	        'title'     => 'Social Media Settings',
	        'priority'  => 21
	    )
	);
	$wp_customize->add_setting('wpc_social_mailchimp', array('transport' => 'refresh', 'sanitize_callback' => 'casper_sanitize_uri'));
	$wp_customize->add_control('wpc_social_mailchimp', array('section' => 'wpc_social', 'label' => 'Mailchimp Signup URL', 'type' => 'text'));
	$wp_customize->add_setting('wpc_social_facebook', array('transport' => 'refresh', 'sanitize_callback' => 'casper_sanitize_uri'));
	$wp_customize->add_control('wpc_social_facebook', array('section' => 'wpc_social', 'label' => 'Facebook URL', 'type' => 'text'));
	$wp_customize->add_setting('wpc_social_google', array('transport' => 'refresh', 'sanitize_callback' => 'casper_sanitize_uri'));
	$wp_customize->add_control('wpc_social_google', array('section' => 'wpc_social', 'label' => 'Google+ URL', 'type' => 'text'));
	$wp_customize->add_setting('wpc_social_linkedin', array('transport' => 'refresh', 'sanitize_callback' => 'casper_sanitize_uri'));
	$wp_customize->add_control('wpc_social_linkedin', array('section' => 'wpc_social', 'label' => 'LinkedIn URL', 'type' => 'text'));
	$wp_customize->add_setting('wpc_social_twitter', array('transport' => 'refresh', 'sanitize_callback' => 'casper_sanitize_uri'));
	$wp_customize->add_control('wpc_social_twitter', array('section' => 'wpc_social', 'label' => 'Twitter URL', 'type' => 'text'));
	$wp_customize->add_setting('wpc_social_youtube', array('transport' => 'refresh', 'sanitize_callback' => 'casper_sanitize_uri'));
	$wp_customize->add_control('wpc_social_youtube', array('section' => 'wpc_social', 'label' => 'Youtube URL', 'type' => 'text'));


	// Assign sections to panels
	$wp_customize->get_section('title_tagline')->panel = 'general_settings';
	$wp_customize->get_section('nav')->panel = 'general_settings';
	$wp_customize->get_section('static_front_page')->panel = 'general_settings';

}
add_action( 'customize_register', 'wpt_register_theme_customizer' );

// Sanitize text
function sanitize_text( $text ) {

    return sanitize_text_field( $text );

}

// Sanitize URL's
function casper_sanitize_uri($uri){
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}

/**
 * Sanitize email/uri
 */
function casper_sanitize_email($uri){
  if('' === $uri){
    return '';
  }
  if (substr( $uri, 0, 4 ) != 'http' && strpos($uri, '@') === false) {
    $uri = 'mailto:' . $uri;
  }
  return sanitize_email($uri);
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function basic_wpthemecustomizer_preview_js() {
  wp_enqueue_script( 'wpthemecustomizer', get_stylesheet_directory_uri() . '/assets/js/src/theme-customizer.js', array( 'customize-preview' ), '20150518', true );
}
add_action( 'customize_preview_init', 'basic_wpthemecustomizer_preview_js' );
?>