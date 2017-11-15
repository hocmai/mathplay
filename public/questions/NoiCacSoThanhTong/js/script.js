var canvas_graph = {};
/**
 * Item name is unique
 */
fabric.Canvas.prototype.getItemBy = function(key, value) {
	var object = [], objects = this.getObjects();
	for (var i = 0, len = this.size(); i < len; i++) {
		if (objects[i][key] && objects[i][key] === value) {
	  		object.push(objects[i]);
		}
	}
	return object;
};

$(document).ready(function(){

	//////// Kiem tra cac duong noi da dung chua
	$('.question-wrapper').on('submit', 'form.answer-question-form', function(e){
		if( $('canvas.graph-number-with-total', this).length == 0 ) return;
		var canvas_id = $('canvas.graph-number-with-total', this).attr('id');
		if( $.isEmptyObject(canvas_graph[canvas_id]) ) return;

		var lines = canvas_graph[canvas_id].getItemBy('id', 'line'),
		data_render = $.parseJSON($('canvas.graph-number-with-total', this).attr('data-render')),
		check_answer = true;
		if( data_render.range1.length = lines.length ){
			$.each(lines, function(key, line){
				if( line.value != data_render.total ){
					check_answer = false;
					return false;
				}
			})
			if( check_answer ){
				$('input[name="answer"][type="hidden"]', this).val(1).change();
			}
			else{
				$('input[name="answer"][type="hidden"]', this).val(0).change();
			}
		}
		// console.log(lines,data_render);
	})


	///////////////// Ve lai
	$('.question-wrapper button.re-draw-canvas-graph').on('click', function(e){
		if( $(this).parent().find('canvas.graph-number-with-total').length == 0 ) return;
		var canvas_id = $(this).parent().find('canvas.graph-number-with-total').attr('id');
		if( $.isEmptyObject(canvas_graph[canvas_id]) ) return;

		var lines = canvas_graph[canvas_id].getItemBy('id', 'line');
		if( lines.length == 0 ) return;

		/// remove All line
		$.each(lines[lines.length-1].source, function(i, group){
			group.animate({scaleX: 1, scaleY: 1}, { onChange: canvas_graph[canvas_id].renderAll.bind(canvas_graph[canvas_id]), easing: fabric.util.ease['easeOutBounce'], duration: 400 });
			group.set({hasLine: false});
		})
		canvas_graph[canvas_id].remove(lines[lines.length-1]);
		canvas_graph[canvas_id].renderAll();
	})
	
	////// Tao canvas
	$('#NoiCacSoThanhTong canvas.graph-number-with-total').each(function(index, el) {
		var id = $(this).attr('id'),
  		data_render = $.parseJSON($(this).attr('data-render')),
  		_this = $(this)
  		index = id;

  		if( typeof data_render == 'undefined' ) return;

  		var total = data_render.total;
  		canvas_graph[index] = this.__canvas = new fabric.Canvas(id, {
			hasControls: false,
			imageSmoothingEnabled: false,
		});
		fabric.Object.prototype.hasBorders = false;
		// fabric.Object.prototype.selectable = false;
		fabric.Object.prototype.hasControls = false;
		fabric.Object.prototype.originX = fabric.Object.prototype.originY = 'center';

		var clicked = false, selected = '', line_suggest = null, lines = [];
		canvas_graph[index].on('mouse:up', function(e){
			var target = canvas_graph[index].getActiveObject();
			if( $.isEmptyObject(target) ) return;
			var pointer = canvas_graph[index].getPointer(e.e);
			if( !$.isEmptyObject(target.id) && (target.id == 'row-1' | target.id == 'row-2') && !target.hasLine ){
			// console.log(target, selected, clicked, target.id);
				if( !clicked ){
					selected = target.id;
					clicked = true;
					line_suggest = target;
					target.animate({scaleX: 1.25, scaleY: 1.25}, { onChange: canvas_graph[index].renderAll.bind(canvas_graph[index]), easing: fabric.util.ease['easeOutBounce'], duration: 400 });
					target.set({hasLine: true});
				}
				if( selected != target.id && clicked ){
					var line = new fabric.Line([line_suggest.left, line_suggest.top, target.left, target.top], {
						fill: '#111',
						stroke: '#111',
						strokeWidth: 2,
						selectable: false,
						id: 'line',
						value: target.value + line_suggest.value,
						source: [line_suggest, target],
					});
					canvas_graph[index].add(line);
					line_suggest.bringToFront();
					target.bringToFront();
					// lines.push(line);
					line_suggest = null;
					clicked = false;
					selected = '';
					target.animate({scaleX: 1.25, scaleY: 1.25}, { onChange: canvas_graph[index].renderAll.bind(canvas_graph[index]), easing: fabric.util.ease['easeOutBounce'], duration: 400 });
					target.set({hasLine: true});
				}
				canvas_graph[index].renderAll();
			}
		})

		// canvas_graph[index].on('mouse:over', function(e){
		// 	if( $.isEmptyObject(e.target) ) return;
		// 	if( !$.isEmptyObject(e.target.id) && (e.target.id == 'row-1' | e.target.id == 'row-2') ){
		// 		e.target.animate({scaleX: 1.25, scaleY: 1.25}, { onChange: canvas_graph[index].renderAll.bind(canvas_graph[index]), easing: fabric.util.ease['easeOutBounce'], duration: 800 });
		// 	}
		// })

		// canvas_graph[index].on('mouse:out', function(e){
		// 	if( $.isEmptyObject(e.target) ) return;
		// 	e.target.animate({scaleX: 1, scaleY: 1}, { onChange: canvas_graph[index].renderAll.bind(canvas_graph[index]), easing: fabric.util.ease['easeOutBounce'], duration: 800 });
		// })

		var margin = canvas_graph[index].width/(data_render.range1.length+1);
		$.each(data_render.range1, function(key, value) {
			var text_1 = new fabric.Textbox(''+value+'', {
				left: margin*(key+1),
				top: 30,
				fontSize: 18,
				textAlign: 'center',
				editable: false,
			}),
			circle_1 = new fabric.Circle({
				left: margin*(key+1),
				top: 30,
				radius: 18,
				fill: '#fff',
				stroke: 'orange',
				strokeWidth: 2,
			}),
			text_2 = new fabric.Textbox(''+data_render.range2[key]+'', {
				left: margin*(key+1),
				top: 125,
				fontSize: 20,
				textAlign: 'center',
				editable: false,
			}),
			circle_2 = new fabric.Circle({
				left: margin*(key+1),
				top: 125,
				radius: 18,
				fill: '#fff',
				stroke: 'orange',
				strokeWidth: 2,
			}),
			group1 = new fabric.Group([ circle_1, text_1 ], {
				value: value,
				id: 'row-1',
				hasLine: false,
				selectable: true,
				lockMovementX: true,
				lockMovementY: true,
				hasControls: false,
			}),
			group2 = new fabric.Group([ circle_2, text_2 ], {
				value: data_render.range2[key],
				id: 'row-2',
				hasLine: false,
				selectable: true,
				lockMovementX: true,
				lockMovementY: true,
				hasControls: false,
			});
			canvas_graph[index].add(group1, group2);
		});

	})

})