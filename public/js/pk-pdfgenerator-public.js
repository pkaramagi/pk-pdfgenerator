(function( $ ) {
	'use strict';

	/**
	 * jquery to handle shortcode form submission
	 * used to create plugin logs
	 */

	$(document).ready(function(){
		$('#pk-pdfgen-form').submit(function(event){
			event.preventDefault();
			var url = $("input[name='url']",this).val();
			var download_pdf_url = "https://api.microlink.io/?url="+url+"&pdf&embed=pdf.url&scale=1&margin=0.4cm"

			$.ajax({
				type : 'POST',
				url : $(this).attr('action'),
				data : $('#pk-pdfgen-form').serialize()
			});

			this.reset();

			window.open(download_pdf_url, '_blank');

		});
	});


})( jQuery );
