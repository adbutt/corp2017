'use strict';
( function( $ ) {

	wp.customize( 'wpc_contact_email', function( value ) {
		value.bind( function( to ) {
			$( '.email-contact a>span' ).text( to );
		} );
	} );

	wp.customize( 'wpc_header_tel', function( value ) {
		value.bind( function( to ) {
			$( '.contact-now' ).text( to );
		} );
	} );

	wp.customize( 'wpc_contact_tel', function( value ) {
		value.bind( function( to ) {
			$( '.tel-contact>span' ).text( to );
		} );
	} );

	wp.customize( 'wpc_street_address', function( value ) {
		value.bind( function( to ) {
			$( '.streetAddress' ).text( to );
		} );
	} );

	wp.customize( 'wpc_locality', function( value ) {
		value.bind( function( to ) {
			$( '.addressLocality' ).text( to );
		} );
	} );

	wp.customize( 'wpc_region', function( value ) {
		value.bind( function( to ) {
			$( '.addressRegion' ).text( to );
		} );
	} );

	wp.customize( 'wpc_post_code', function( value ) {
		value.bind( function( to ) {
			$( '.postalCode' ).text( to );
		} );
	} );

	wp.customize( 'wpc_country', function( value ) {
		value.bind( function( to ) {
			$( '.addressCountry' ).text( to );
		} );
	} );

} )( jQuery );
