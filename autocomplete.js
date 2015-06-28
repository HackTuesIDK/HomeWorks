// var MIN_LENGTH = 3;
// $( document ).ready(function() {
	// $("#keyword").keyup(function() {
		// var keyword = $("#keyword").val();
		// if (keyword.length >= MIN_LENGTH) {
			// $.get( "autocomplete.php", { keyword: keyword } )
			  // .done(function( data ) {
			    // console.log(data);
			  // });
		// }
	// });

// });
$(document).ready(function($){
    $('#auto').autocomplete({
	source: function( request, response ) {
        $.ajax({
		  type: "GET",
          url: "suggest_name.php",
          dataType: "json",
          data: { 
			'auto': document.getElementById("auto").value,
            q: request.term,
          },
          success: function( data ) {
            console.log(data);
			response( data );
          }
        });
	},		
	minLength:1,
		select: function(event,ui){
			var code = ui.item.id;
			//WHEN SELECTED
		},
        // optional
		html: true, 
		open: function() {
			$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
		},
		close: function() {
			$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
		}
	});
});