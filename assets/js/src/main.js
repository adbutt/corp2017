'use strict';
jQuery( function( $ ) {

	$( document ).ready( function() {
		$( '#menu-mmenu' ).hide();
		$( '.mtoggle' ).click( function() {
			$( '#menu-mmenu' ).slideToggle( 500 );
		} );
		$( '#menu-mmenu li a' ).click( function() {
			$( '#menu-mmenu' ).slideToggle();
		} );

		$( document ).ready( function() {
			var tmpImg = new Image();

			tmpImg.src = $( '.parallax-window' ).attr( 'data-image-src' );
			tmpImg.onload = function() {
				// alert("fark the image has loaded");
				$( '.parallax-background' ).removeClass( 'dark' );
			};
		} );

		$( '.gallery-icon a' ).fancybox();
	} );

	$( document ).ready( function() {
		$( 'a.fancybox' ).fancybox( {
			maxWidth: 800,
			maxHeight: 600,
			fitToView: false,
			width: '70%',
			height: '70%',
			autoSize: false,
			closeClick: false,
			openEffect: 'none',
			closeEffect: 'none',
			type: 'iframe'
		} );
	} );

	$( document ).ready( function() {
		$( 'a.fancy' ).fancybox( {
			maxWidth: 800,
			maxHeight: 600,
			fitToView: false,
			width: '70%',
			height: '70%',
			autoSize: false,
			closeClick: false,
			openEffect: 'fade',
			closeEffect: 'fade',
			centerOnScroll: 'true',
			showNavArrows: 'true'
		} );
	} );

	$( document ).ready( function() {
		$( 'a.video' ).fancybox( {
			maxWidth: 800,
			maxHeight: 600,
			fitToView: false,
			width: '70%',
			height: '70%',
			autoSize: false,
			closeClick: false,
			openEffect: 'elastic',
			closeEffect: 'none'
		} );
	} );

	$( function() {

		// Call Gridder
		$( '.gridder' ).gridderExpander( {
			scroll: true,
			scrollOffset: 180,
			scrollTo: 'panel', // panel or listitem
			animationSpeed: 500,
			animationEasing: 'easeOutExpo',
			showNav: true, // Show Navigation
			nextText: 'Next', // Next button text
			prevText: 'Previous', // Previous button text
			closeText: 'Close', // Close button text
			onStart: function() {
				console.log( 'Gridder Inititialized' );
			},
			onContent: function() {
				console.log( 'Gridder Content Loaded' );
			},
			onClosed: function() {
				console.log( 'Gridder Closed' );
			}
		} );
	} );
} );

/*----------------------------------------------  Back to Top ------------------------------------------------*/
jQuery( '.s-top' ).click( function() {
	//alert('test');
	jQuery( 'html, body' ).animate( {scrollTop: 0}, 800, 'easeOutExpo' );
	return false;
} );

jQuery( window ).scroll( function() {
	var position = jQuery( window ).scrollTop();

	if ( position > 300 ) {
		jQuery( '#scroll-top' ).fadeIn( 350 );
	} else {
		jQuery( '#scroll-top' ).fadeOut( 350 );
	}

	if ( navigator.platform === 'iPad' || navigator.platform === 'iPhone' || navigator.platform === 'iPod' ) {
		jQuery( '.s-top' ).css( 'position', 'static' );
	}
} );

jQuery( document ).ready( function() {
	jQuery( '.clear_field input, .clear_field textarea' ).focus( function() {
		var origval = jQuery( this ).val();

		jQuery( this ).val( '' );
		//console.log(origval);
		jQuery( '.clear_field input, .clear_field textarea' ).blur( function() {
			if ( jQuery( this ).val().length === 0 ) {
				jQuery( this ).val( origval );
				origval = null;
			} else {
				origval = null;
			}
		} );
	} );
} );

jQuery.cookie = function( name, value, options ) {
	if ( typeof value !== 'undefined' ) {
		options = options || {}; if ( value === null ) {
			value = ''; options.expires = -1;
		} var expires = '';

		if ( options.expires && ( typeof options.expires === 'number' || options.expires.toUTCString ) ) {
			var date;

			if ( typeof options.expires === 'number' ) {
				date = new Date(); date.setTime( date.getTime() + options.expires * 24 * 60 * 60 * 1000 );
			} else {
				date = options.expires;
			}expires = '; expires=' + date.toUTCString();
		} var path = options.path ? '; path=' + options.path : ''; var domain = options.domain ? '; domain=' + options.domain : ''; var secure = options.secure ? '; secure' : '';

		document.cookie = [name, '=', encodeURIComponent( value ), expires, path, domain, secure].join( '' );
	} else {
		var cookieValue = null;

		if ( document.cookie && document.cookie !== '' ) {
			var cookies = document.cookie.split( ';' );

			for ( var i = 0; i < cookies.length; i++ ) {
				var cookie = jQuery.trim( cookies[i] );

				if ( cookie.substring( 0, name.length + 1 ) === name + '=' ) {
					cookieValue = decodeURIComponent( cookie.substring( name.length + 1 ) ); break;
				}
			}
		} return cookieValue;
	}
};
jQuery( document ).ready( function() {
	if ( jQuery.cookie( 'TEXT_SIZE' ) ) {
		jQuery( 'body' ).addClass( jQuery.cookie( 'TEXT_SIZE' ) );
	}
	jQuery( '.resizer a' ).click( function() {
		var textSize = jQuery( this ).parent().attr( 'class' );

		jQuery( 'body' ).removeClass( 'small medium large' ).addClass( textSize );
		jQuery.cookie( 'TEXT_SIZE', textSize, {path: '/', expires: 10000} );
		return false;
	} );
} );
jQuery( document ).ready( function() {
	if ( jQuery.cookie( 'CONTRAST' ) ) {
		jQuery( 'body' ).addClass( jQuery.cookie( 'CONTRAST' ) );
	}
	jQuery( '.contrast a' ).click( function() {
		var contrast = jQuery( this ).parent().attr( 'class' );

		jQuery( 'body' ).removeClass( 'low-contrast high-contrast' ).addClass( contrast );
		jQuery.cookie( 'CONTRAST', contrast, {path: '/', expires: 10000} );
		return false;
	} );
} );
