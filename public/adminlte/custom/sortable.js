$(document).ready(function(){

	$( "table.sortable tbody" ).sortable( {
		placeholder: "ui-state-highlight",
		cancel: "th",
		containment: "parent",
		handle: ".handle",
		update: function( event, ui ) {
			$(ui.item).addClass('sorted');
			var per_page = parseInt($(ui.item).attr('data-perpage'));
			var page = parseInt($(ui.item).attr('data-page'));
			$('#sort-node-save').removeClass('disabled');

		    $(this).children().each(function(index) {
		    	$(this).find('td.order-number').html('#'+(index+(per_page*page)));
		    	$(this).find('select#node_weight').val(index+(per_page*page)-100).change();
		    });
	 	}
	});

	$('.show-weight-number').on('click', function(){
		if($(this).hasClass('show')){
			$('table.sortable td>.handle').show();
			$('table.sortable td>select#node_weight').hide();
			$(this).text('Hiện thứ tự');
		}
		else{
			$('table.sortable td>.handle').hide();
			$('table.sortable td>select#node_weight').show();
			$(this).text('Ẩn thứ tự');
			$('button#sort-node-save').removeClass('disabled');
		}
		$(this).toggleClass('show');
	})

	$('#sort-node-save').on('click', function(){
		if( $(this).hasClass('loading') | $(this).hasClass('disabled') | $('table.sortable').length == 0 ) return false;
		$(this).addClass('loading');

		var _this = $(this),
		model = $(this).attr('data-model');
		node_ids = [];

		$('table.sortable td>select#node_weight').each(function(index, el) {
			node_ids.push( {id: $(this).parent().find('>input#node_id').val(), weight: $(this).val()} );
		});

		$.ajax({
			method: 'POST',
			url : '/ajax/node-sort/'+model,
			cache:false,
			data: {node_ids: node_ids},
			success: function(data){
				alert(data);
				// console.log(data);
				_this.removeClass('loading');
				$('table.sortable tr.sorted').removeClass('sorted');
			},
			error: function(e){
				alert('Có lỗi xảy ra!');
				console.log(e.responseText);
				_this.removeClass('loading');
			}
		})
	})

});