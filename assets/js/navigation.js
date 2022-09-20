/**
 * File navigation.js.
 */
( function() {
	'use strict';
	
	const navToggles = document.querySelectorAll( '.menu-toggle' );
	const dropdownToggle = document.querySelectorAll( 'nav .dropdown-menu-toggle' );

	// Function to open mobile menu.
	function toggleNav() {
		const container = document.getElementById( this.closest( 'nav' ).getAttribute( 'id' ) );

		if ( ! container ) {
			return;
		}

		const nav = container.getElementsByTagName( 'ul' )[0];

		if ( container.classList.contains( 'toggled' ) ) {
			container.classList.remove( 'toggled' );
			nav.setAttribute( 'aria-hidden', 'true' );
			this.setAttribute( 'aria-expanded', 'false' );

			disableDropdownArrows( nav );
		} else {
			container.classList.add( 'toggled' );
			nav.setAttribute( 'aria-hidden', 'false' );
			this.setAttribute( 'aria-expanded', 'true' );

			enableDropdownArrows( nav );
		}
	}

	for ( let i = 0; i < navToggles.length; i++ ) {
		navToggles[i].addEventListener( 'click', toggleNav, false );
	}

	// Functions to open sub menus on mobile menu.
	function enableDropdownArrows( nav ) {
		const dropdownItems = nav.querySelectorAll( 'li.menu-item-has-children' );

		for ( let i = 0; i < dropdownItems.length; i++ ) {
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).setAttribute( 'tabindex', '0' );
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).setAttribute( 'role', 'button' );
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).setAttribute( 'aria-expanded', 'false' );
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).setAttribute( 'aria-label', aeLocalize.openSubMenuLabel );
		}
	};

	function disableDropdownArrows( nav ) {
		const dropdownItems = nav.querySelectorAll( 'li.menu-item-has-children' );

		for ( let i = 0; i < dropdownItems.length; i++ ) {
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).removeAttribute( 'tabindex' );
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).setAttribute( 'role', 'presentation' );
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).removeAttribute( 'aria-expanded' );
			dropdownItems[i].querySelector( '.dropdown-menu-toggle' ).removeAttribute( 'aria-label' );
		}
	};

	function setDropdownArrowAttributes( arrow ) {
		if ( 'false' === arrow.getAttribute( 'aria-expanded' ) || ! arrow.getAttribute( 'aria-expanded' ) ) {
			arrow.setAttribute( 'aria-expanded', 'true' );
			arrow.setAttribute( 'aria-label', aeLocalize.closeSubMenuLabel );
		} else {
			arrow.setAttribute( 'aria-expanded', 'false' );
			arrow.setAttribute( 'aria-label', aeLocalize.openSubMenuLabel );
		}
	};

	function toggleSubNav( e ) {
		if ( this.closest( 'nav' ).classList.contains( 'toggled' ) ) {
			e.preventDefault();
			const closestLi = this.closest( 'li' );

			setDropdownArrowAttributes( closestLi.querySelector( '.dropdown-menu-toggle' ) );

			for ( let i = 0; i < closestLi.length; i++ ) {
				if ( closestLi[i].classList.contains( 'sfHover' ) ) {
					closestLi[i].classList.remove( 'sfHover' );
					closestLi[i].querySelector( '.toggled-on' ).classList.remove( 'sub-open' );
					setDropdownArrowAttributes( closestLi[i].querySelector( '.dropdown-menu-toggle' ) );
				}
			}

			closestLi.classList.toggle( 'sfHover' );
			closestLi.querySelector( '.sub-menu' ).classList.toggle( 'sub-open' );
		}

		e.stopPropagation();
	}

	for ( let i = 0; i < dropdownToggle.length; i++ ) {
		dropdownToggle[i].addEventListener( 'click', toggleSubNav, false );
	}

	// Remove mobile menu classes on window resize.
	function checkMobile() {
		const openedMobileMenus = document.querySelectorAll( '.toggled' );

		for ( let i = 0; i < openedMobileMenus.length; i++ ) {
			const menuToggle = openedMobileMenus[i].querySelector( '.menu-toggle' );

			if ( menuToggle && menuToggle.offsetParent === null ) {
				if ( openedMobileMenus[i].classList.contains( 'toggled' ) ) {
					// Navigation is toggled, but .menu-toggle isn't visible on the page (display: none).
					const closestNav = openedMobileMenus[i].getElementsByTagName( 'ul' )[ 0 ];
					const closestNavItems = closestNav.getElementsByTagName( 'li' );
					const closestSubMenus = closestNav.getElementsByTagName( 'ul' );

					document.activeElement.blur();
					openedMobileMenus[i].classList.remove( 'toggled' );

					menuToggle.setAttribute( 'aria-expanded', 'false' );

					for ( let li = 0; li < closestNavItems.length; li++ ) {
						closestNavItems[li].classList.remove( 'sfHover' );
					}

					for ( let sm = 0; sm < closestSubMenus.length; sm++ ) {
						closestSubMenus[sm].classList.remove( 'sub-open' );
					}

					if ( closestNav ) {
						closestNav.removeAttribute( 'aria-hidden' );
					}

					disableDropdownArrows( openedMobileMenus[i] );
				}
			}
		}
	}
	window.addEventListener( 'resize', checkMobile, false );
	window.addEventListener( 'orientationchange', checkMobile, false );

}() );
