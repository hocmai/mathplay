$(document).ready(function(){

	// $(".dragable-number").shapeshift({
	// 	// minColumns: 3
	// });
	// $(".dropable-number .drop-grid-area").shapeshift({
	// 	// minColumns: 3
	// });

	$( '#SoSanhTichVaMotSoKeoTha .dragable-number .item' ).draggable({
		cancel: "a.ui-icon", // clicking an icon won't initiate dragging
		revert: "invalid", // when not dropped, the item will revert back to its initial position
		containment: "document",
		cursor: "move",
    });

    $('#SoSanhTichVaMotSoKeoTha .dropable-number .drop-grid-area').droppable({
		accept: "#SoSanhTichVaMotSoKeoTha .dragable-number .item",
		classes: {
			"ui-droppable-active": "ui-state-highlight"
		},
		over: function(event, ui) {
	        // $("#SoSanhTichVaMotSoKeoTha .dragable-number .item").draggable({
	        //     // grid: [80, 50]
	        // });
	    },
	    out: function(event, ui) {
	        // $(".dragable-number .item").draggable("option", "grid", false);
	    },
		drop: function( event, ui ) {
			var parent = $(event.target).parents('.question-rendered.active');
			parent.find('.answer-question-form input[name="answer"]').val(0);

			if( $(event.target).parent().hasClass($(ui.draggable).attr('data-condition')) ){
				$(ui.draggable).attr('data-answer', 'true');
			} else{
				$(ui.draggable).attr('data-answer', 'false');
			}

			///////// Neu 3 o da duoc keo tha het
			if( parent.find('.answer-question-form .dragable-number .wrapper >.item[data-answer="true"]').length == 3 ){
				parent.find('.answer-question-form input[name="answer"]').val(1);
			}
		}
    });

})