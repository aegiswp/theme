/**
 * File notice.js.
 */
 jQuery( document ).ready( function() {
	
	jQuery( '.ae-notice' ).on( 'click', '.ae-notice-dismiss', function(e) {
		e.preventDefault();
        var $wrapperElm = jQuery( this ).closest( '.ae-notice' );
		jQuery.post( ajaxurl, {
			action: 'ae_set_admin_notice_viewed',
			notice_id: $wrapperElm.data( 'notice_id' )
		} );
        $wrapperElm.fadeTo( 100, 0, function() {
			$wrapperElm.slideUp( 100, function() {
				$wrapperElm.remove();
			} );
        } );
	} );
} );
