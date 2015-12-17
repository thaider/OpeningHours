(function( $ ) { 
	$( document ).ready( function() { 
		$( '.openinghourstable' ).each( function() {
			var oh_string = $( this ).data( 'openinghours' );
			var oh_options =  {
				"address": {
					"state": "Ober\u00f6sterreich",
					"country":"\u00d6sterreich",
					"country_code":"at"
					}
				};
			var oh = new opening_hours( oh_string, oh_options ); 
			var it = oh.getIterator(); 
			$( this ).html( OpeningHoursTable.drawTableAndComments( oh, it ) ); 
		});
	});
})(jQuery);
