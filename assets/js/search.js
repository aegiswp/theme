/**
 * File search.js.
 */
( function() {
	'use strict';

    document.addEventListener( 'DOMContentLoaded', function() {
        const searchWrap = document.querySelector( '.aeon-search-icon' );
        const searchLink = document.querySelectorAll( '.aeon-search-icon-link' );
        const searchClose = document.querySelector( '.aeon-search-close' );
        if ( searchLink ) {
            for ( let i = 0; i < searchLink.length; i++ ) {
                searchLink[i].addEventListener( 'click', function( e ) {
                    e.preventDefault();
                    document.body.classList.toggle( 'aeon-search-active' );
                    setTimeout( function() {
                        document.querySelector( '.aeon-search-wrapper .search-field' ).focus();
                    }, 200 );
                } );
            }

            if ( searchWrap ) {
                if ( ! searchWrap.classList.contains( 'search-full-screen' ) ) {
                    // Close when clicking elsewhere.
                    document.addEventListener( 'click', function(e) {
                        if ( ! document.querySelector( '.aeon-search-icon' ).contains( e.target ) ) {
                            document.body.classList.remove( 'aeon-search-active' );
                        }
                    } );
                }
                
                if ( ! searchWrap.classList.contains( 'search-dropdown' ) ) {
                    searchClose.addEventListener( 'click', function() {
                        document.body.classList.remove( 'aeon-search-active' );
                    } );
                }
            }
        }
    } );

}() );
