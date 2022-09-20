/**
 * File sticky.js.
 */
( function() {
	'use strict';
	
	const header = document.querySelector( '.ae-has-sticky' );
    if ( header ) {
        const top = header.offsetTop;
        let start = top + 100;
        const scrollUp = 'ae-sticky-scroll-up';
        const scrollDown = 'ae-sticky-scroll-down';

        let hideStart = header.offsetHeight;
        let bottom = header.offsetHeight;

        // If top bar.
        const topbar = document.querySelector( '.aeon-top-bar' );
        if ( topbar ) {
            const topBarHeight = topbar.offsetHeight;
            hideStart = hideStart + topBarHeight;
        }

        // Sticky breakpoint.
        if ( header.hasAttribute( 'data-destroy-sticky' ) ) {
            const destroyWidth = header.getAttribute( 'data-destroy-sticky' );
            if ( window.innerWidth < destroyWidth ) {
                return;
            }
        }

        // Add wrapper.
        header.insertAdjacentHTML( 'beforebegin', '<span class="ae-sticky-wrapper"></span>' );
        header.previousSibling.appendChild( header );

        function onScroll() {
            const currentScroll = window.pageYOffset;

            if ( header.classList.contains( 'ae-hide-scroll' ) ) {
                if ( currentScroll <= hideStart ) {
                    header.classList.remove( scrollUp );
                    header.classList.remove( 'ae-is-sticky' );
                    return;
                }
            
                if ( currentScroll > bottom && ! header.classList.contains( scrollDown ) ) {
                    // Down.
                    header.classList.remove( scrollUp );
                    header.classList.add( scrollDown );
                } else if ( currentScroll < bottom && header.classList.contains( scrollDown ) ) {
                    // Up.
                    header.classList.remove( scrollDown );
                    header.classList.add( scrollUp );
                    header.classList.add( 'ae-is-sticky' );
                }
                bottom = currentScroll;
            } else {
                if ( currentScroll >= start ) {
                    header.classList.add( 'ae-is-sticky' );
                } else if ( currentScroll <= top ) {
                    header.classList.remove( 'ae-is-sticky' );
                }
            }
        }

        window.addEventListener( 'scroll', onScroll );
        window.addEventListener( 'resize', onScroll );
        window.addEventListener( 'orientationchange', onScroll );

        function wrapperStyle() {
            header.parentNode.style.display = 'block';
            header.parentNode.style.width = window.innerWidth + 'px';
            header.parentNode.style.height = header.offsetHeight + 'px';
        }

        window.addEventListener( 'load', wrapperStyle );
        window.addEventListener( 'resize', wrapperStyle );
        window.addEventListener( 'orientationchange', wrapperStyle );
    }

}() );
