/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-branding' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-branding' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
    /**************************************************************************************************************
     * Site Layout
     *************************************************************************************************************/

	// Blog banner title.
    wp.customize( 'blog_banner', function( value ) {
        value.bind( function( to ) {
            $( '.entry-title' ).text( to );
        } );
    } );
    // Custom blog post Layout Options
    wp.customize( 'blog_layout_setting', function( value ) {
        value.bind( function( to ) {
            $( '#primary' ).removeClass( 'no-sidebar sidebar-left sidebar-right' );
            $( '#secondary' ).removeClass( 'no-sidebar sidebar-left sidebar-right' );
            $( '#primary' ).addClass( to );
            $( '#secondary' ).addClass( to );
        } );
    } );
    // Custom page Layout Options
    wp.customize( 'page_layout_setting', function( value ) {
        value.bind( function( to ) {
            $( '#primary' ).removeClass( 'no-sidebar sidebar-left sidebar-right' );
            $( '#secondary' ).removeClass( 'no-sidebar sidebar-left sidebar-right' );
            $( '#primary' ).addClass( to );
            $( '#secondary' ).addClass( to );
        } );
    } );

    /**************************************************************************************************************
     * Portfolio Layout
     *************************************************************************************************************/

	// Portfolio filter switch.
    wp.customize('portfolio_filter', function( value){
    	value.bind(function(to){
    		if(true === to){
    			$('#filters').show();
			}
    		else{
                $('#filters').hide();
			}
		});
	});

	// Portfolio banner title.
    wp.customize( 'portfolio_banner', function( value ) {
        value.bind( function( to ) {
            $( '.entry-title' ).text( to );
        } );
    } );

    // portfolio post type Layout Options
    wp.customize( 'portfolio_layout_setting', function( value ) {
        value.bind( function( to ) {
            $( '#portfolio-items > div' ).removeClass( 'portfolio-two-col portfolio-three-col portfolio-four-col' );
            $( '#portfolio-items > div' ).removeAttr( 'style' );
            $( '#portfolio-items > div' ).addClass( to );
        } );
    } );

    /**************************************************************************************************************
     * Service Layout
     *************************************************************************************************************/

    // Service banner title.
    wp.customize( 'service_banner', function( value ) {
        value.bind( function( to ) {
            $( '.entry-title' ).text( to );
        } );
    } );

    // Service intro title.
    wp.customize( 'service_intro_header', function( value ) {
        value.bind( function( to ) {
            $( '.service-header' ).text( to );
        } );
    } );

    // Service intro text.
    wp.customize( 'service_intro', function( value ) {
        value.bind( function( to ) {
            $( '.service-intro' ).text( to );
        } );
    } );

    // Service post type Layout Options
    wp.customize( 'service_layout_setting', function( value ) {
        value.bind( function( to ) {
            $( '#service > div' ).removeClass( 'service-two-col service-three-col service-four-col' );
            $( '#service > div' ).addClass( to );
        } );
    } );

} )( jQuery );
