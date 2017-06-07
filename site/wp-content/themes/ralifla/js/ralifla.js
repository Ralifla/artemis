'use strict';

;( function ( document, window, index ) {
	var $jQuery = jQuery.noConflict()

	/* Masonry Plugin  
	 * By desandro.com
	 */ 

	var $ms = $jQuery('#ms-container').imagesLoaded( function() {
		var ms = $jQuery('#ms-container').masonry({
			itemSelector: '.ms-item',
	  		columnWidth: '.col-6'
		});
	});
	
	/* Add classe fixed ao rolar página
	 * By Nilso Jr 
	 */

	var top = $jQuery('.main-navigation');

    $jQuery(window).scroll(function(){
       if ($jQuery(this).scrollTop() > 450) {
           $jQuery(top).addClass('menu-fixed');
        } else {
            //top.hasClass('fixed')
             $jQuery(top).removeClass('menu-fixed');
        }
    });


    /* Menu Mobile Ícone navegação (x)
	 * By Nilso Jr 
	 */

    $jQuery('#menu').prepend('<div id="nav-icon"><span></span><span></span><span></span><span></span></div>');
    $jQuery('#menu #nav-icon').click(function(){

        $jQuery(this).toggleClass('open');

        var menu = $jQuery(this).next('ul');

        function open() {
        	$jQuery(menu).removeClass('close').addClass('open');
	    }

	    function close() {
	        $jQuery(menu).removeClass('open').addClass('close');
	    }

        if (menu.hasClass('open')) {
            close();

        } else {
            open();
        }

    })


    /* Input type=file
	 * By Osvaldas Valutis, www.osvaldas.info
	 * Available for use under the MIT License
	 */

	var inputs = document.querySelectorAll( '.inputfile' );

	Array.prototype.forEach.call( inputs, function( input ) {
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e ) {
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});

	
	

}( document, window, 0 ));	''



