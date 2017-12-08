$(document).ready(function(){

	// $(".dragable-number").shapeshift({
	// 	// minColumns: 3
	// });
	// $(".dropable-number .drop-grid-area").shapeshift({
	// 	// minColumns: 3
	// });

	$( '.dragable-number .item' ).draggable({
		cancel: "a.ui-icon", // clicking an icon won't initiate dragging
		revert: "invalid", // when not dropped, the item will revert back to its initial position
		containment: "document",
		// helper: "clone",
		cursor: "move"
    });

    $('.dropable-number .drop-grid-area').droppable({
		accept: ".dragable-number .item",
		classes: {
			"ui-droppable-active": "ui-state-highlight"
		},
		over: function(event, ui) {
	        $(".dragable-number .item").draggable({
	            // grid: [80, 50]
	        });
	    },
	    out: function(event, ui) {
	        // $(".dragable-number .item").draggable("option", "grid", false);
	    },
		drop: function( event, ui ) {
			console.log(ui.draggable, event.target);
			var startPosition = $(ui.draggable).position();
			console.log( startPosition, $(event.target).position() );
			
		}
    });

})