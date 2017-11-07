var canvas = [];

$(document).ready(function(){

	$('canvas.draw-shape-color').each(function(index, el) {
		var id = $(this).attr('id');

		canvas[index] = this.__canvas = new fabric.Canvas(id, {
			// isDrawingMode: true,
			hasControls: false,
			selectable: false,
			imageSmoothingEnabled: false,
			// freeDrawingCursor: 'crosshair'
		});
		fabric.Object.prototype.hasControls = fabric.Object.prototype.selectable = false;
		fabric.Object.prototype.originX = fabric.Object.prototype.originY = 'center';

		canvas[index].freeDrawingBrush = new fabric.PencilBrush(canvas[index]);
		canvas[index].freeDrawingBrush.color =  $('.canvas-wrapper>.options>span.active').attr('data-color');
		canvas[index].freeDrawingBrush.width = 40;

		var rect_1 = new fabric.Rect({ top: 80, left: 90, width: 100, height: 100, fill: false, stroke: '#111', strokeWidth: 1, angle: Math.floor((Math.random()*360)+1) }),
		    rect_2 = new fabric.Rect({ top: 280, left: 300, width: 140, height: 140, fill: false, stroke: '#111', strokeWidth: 1, angle: Math.floor((Math.random()*360)+1) }),
		    rect_3 = new fabric.Rect({ top: 90, left: 560, width: 70, height: 70, fill: false, stroke: '#111', strokeWidth: 1, angle: Math.floor((Math.random()*360)+1) }),

		    circle_1 = new fabric.Circle({ top: 80, left: 230, radius: 50, fill: false, stroke: '#111', strokeWidth: 1 }),
		    circle_2 = new fabric.Circle({ top: 100, left: 405, radius: 80, fill: false, stroke: '#111', strokeWidth: 1 }),
		    circle_3 = new fabric.Circle({ top: 280, left: 635, radius: 90, fill: false, stroke: '#111', strokeWidth: 1 }),
		    
		    triangle_1 = new fabric.Triangle({ top: 265, left: 105, width: 145, height: 145, fill: false, stroke: '#111', strokeWidth: 1, angle: Math.floor((Math.random()*360)+1) }),
		    triangle_2 = new fabric.Triangle({ top: 280, left: 470, width: 100, height: 100, fill: false, stroke: '#111', strokeWidth: 1, angle: Math.floor((Math.random()*360)+1) }),
		    triangle_3 = new fabric.Triangle({ top: 80, left: 680, width: 100, height: 100, fill: false, stroke: '#111', strokeWidth: 1, angle: Math.floor((Math.random()*360)+1) });

		canvas[index].add(rect_1,rect_2,rect_3,circle_1,circle_2,circle_3,triangle_1,triangle_2,triangle_3);

		canvas[index].on('mouse:down', function(e) {
			if( typeof e.target != 'undefined' && e.target != null  ){
				var color = $('.question-rendered.active .canvas-wrapper>.options>span.active').attr('data-color'),
				input = $('.question-rendered.active form input[name="answer"]');
				e.target.set({fill: color});
				if( rect_1.fill && circle_1.fill && triangle_1.fill && rect_1.fill == rect_2.fill && rect_2.fill == rect_3.fill
					&& circle_1.fill == circle_2.fill && circle_2.fill == circle_3.fill
					&& triangle_1.fill == triangle_2.fill && triangle_2.fill == triangle_3.fill
					&& rect_1.fill != triangle_1.fill && triangle_1.fill != circle_1.fill && rect_1.fill != circle_1.fill ){
					input.val(1).change();
				} else{
					input.val(0).change();
				}
				// canvas[index].isDrawingMode = false;
			}
		})

		$('.canvas-wrapper>.options>span').on('click', function(){
			$('.question-rendered.active .canvas-wrapper>.options>span.active').removeClass('active');
			$(this).addClass('active');
		})

	});

})