(function() {
	var registro = document.getElementById( 'open-registro' ),
		ctrlClose = registro.querySelector( 'span.registro-close' ),
		isOpen = isAnimating = false,
		// show/hide search area
		toggleSearch = function(evt) {
			if( isOpen ) {
				classie.remove( registro, 'open' );
						// trick to hide input text once the search overlay closes 
							// todo: hardcoded times, should be done after transition ends
							if( input.value !== '' ) {
								setTimeout(function() {
									classie.add( morphSearch, 'hideInput' );
									setTimeout(function() {
										classie.remove( morphSearch, 'hideInput' );
										input.value = '';
									}, 300 );
								}, 500);
							}
							
							input.blur();				
			}
			else {
				classie.add( registro, 'open' );
			}
			isOpen = !isOpen;
		};
	registro.addEventListener( 'click', toggleSearch );
	ctrlClose.addEventListener( 'click', toggleSearch );

})();