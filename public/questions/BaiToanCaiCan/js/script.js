var canvas_weight = [];
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

	$('#BaiToanCaiCan canvas.canvas-weight-balance').each(function(index, el) {
		var id = $(this).attr('id'),
  		_this = $(this),
  		data_balance = $(this).attr('data-balance'),
  		data_rand = parseInt($(this).attr('data-rand'));

		canvas_weight[index] = this.__canvas = new fabric.Canvas(id, {
			hasControls: false,
			imageSmoothingEnabled: false,
		});
		fabric.Object.prototype.hasBorders = false;
		fabric.Object.prototype.selectable = false;
		fabric.Object.prototype.hasControls = false;
		fabric.Object.prototype.originX = fabric.Object.prototype.originY = 'center';
		fabric.Object.prototype.transparentCorners = false;
  		fabric.Object.prototype.objectCaching = true;

  		var canvas_width = canvas_weight[index].width,
  		coin_left, coin_right, weight_left, weight_right, balance,
  		weight_left_top = (data_balance == 'left') ? 170 + data_rand*5.15 : 170 - data_rand*5.15,
  		weight_right_top = (data_balance == 'right') ? 170 + data_rand*5.15 : 170 - data_rand*5.15,
  		weight_left_left = canvas_width/2 - 92 + ((data_balance == 'left') ? -data_rand*0.9 : data_rand*0.9),
  		weight_right_left = canvas_width/2 + 92 + ((data_balance == 'left') ? data_rand*0.95 : -data_rand*0.95),
  		balance_angle = (data_balance == 'left') ? -data_rand*3 : data_rand*3,
  		count_coin_left = (data_balance == 'left') ? data_rand : 0,
  		count_coin_right = (data_balance == 'right') ? data_rand : 0;

		canvas_weight[index].on('mouse:up', function(e){
			if( e.target != null && typeof e.target.id != 'undefinded' && (e.target.id == 'coin_left' | e.target.id == 'coin_right') ){
				if( (e.target.id == 'coin_right' && weight_right_top < 210) | (e.target.id == 'coin_left' && weight_left_top < 210) ){

					var dollar_left = canvas_weight[index].getItemBy('id', 'dollar_left'),
					dollar_right = canvas_weight[index].getItemBy('id', 'dollar_right');
					
					fabric.Image.fromURL('/questions/BaiToanCaiCan/img/dollar.png', function(img) {
						img.set({
							left: e.target.left,
							top: e.target.top+20,
							id: 'dollar_'+( (e.target.id == 'coin_left') ? 'left' : 'right' ),
						});
						// img.scale(0.25);
						canvas_weight[index].add(img);
						
						if( e.target.id == 'coin_right'){
							weight_left_top -= 5.15;
							weight_right_top += 5.15;
							if( balance_angle < 0 ){
								weight_left_left -= 0.935;
								weight_right_left += 0.935;
							} else{
								weight_left_left += 0.935;
								weight_right_left -= 0.935;
							}
							balance_angle += 3;
							count_coin_right++;
						} else{
							weight_left_top += 5.15;
							weight_right_top -= 5.15;
							if( balance_angle < 0 ){
								weight_left_left += 0.935;
								weight_right_left -= 0.935;
							} else{
								weight_left_left -= 0.935;
								weight_right_left += 0.935;
							}
							balance_angle -= 3;
							count_coin_left++;
						}
						if( balance_angle == 0 ){
							weight_left_left = canvas_width/2 - 90;
							weight_right_left = canvas_width/2 + 90;
							$('#BaiToanCaiCan.question-rendered.active form input[name="answer"][type="hidden"]').val('1').change();
						} else{
							$('#BaiToanCaiCan.question-rendered.active form input[name="answer"][type="hidden"]').val('0').change();
						}

						img.animate(
							{
								top: (e.target.id == 'coin_left') ? weight_left_top + 35 : weight_right_top + 35,
								left: img.left + fabric.util.getRandomInt(-25, 25)},
							{
							duration: 800,
							onChange: canvas_weight[index].renderAll.bind(canvas_weight[index]),
							easing: fabric.util.ease['easeOutBounce']
						});
						$.each(dollar_right, function(key, object){
							object.animate({top: weight_right_top + 35, left: object.left + ((balance_angle < 0) ? - 0.935 : + 0.935)}, {easing: fabric.util.ease['easeOutBounce'], duration: 800});
						})
						$.each(dollar_left, function(key, object){
							object.animate({top: weight_left_top + 35, left: object.left + ((balance_angle < 0) ? + 0.935 : - 0.935)}, {easing: fabric.util.ease['easeOutBounce'], duration: 800});
						})

						weight_left.animate({top: weight_left_top, left: weight_left_left}, { onChange: canvas_weight[index].renderAll.bind(canvas_weight[index]), easing: fabric.util.ease['easeOutBounce'], duration: 800 } );
						weight_right.animate({'top': weight_right_top, left: weight_right_left}, { onChange: canvas_weight[index].renderAll.bind(canvas_weight[index]), easing: fabric.util.ease['easeOutBounce'], duration: 800 } );
						balance.animate('angle', balance_angle, { onChange: canvas_weight[index].renderAll.bind(canvas_weight[index]), easing: fabric.util.ease['easeOutBounce'], duration: 800 } );

					});
				}
			}
		})

  		fabric.Image.fromURL('/questions/BaiToanCaiCan/img/weight-3.png', function(img) {
			img.set({
				left: canvas_width/2 - 90,
				top: 170 + ((data_balance == 'left') ? data_rand*5.15 : -data_rand*5.15),
				id: 'weight_left',
			});
			img.scale(0.25);
			canvas_weight[index].add(img);
			weight_left = img;
			weight_left_top = weight_left.top;
			weight_left_left = weight_left.left;
		});
		fabric.Image.fromURL('/questions/BaiToanCaiCan/img/weight-3.png', function(img) {
			img.set({
				left: canvas_width/2 + 90,
				top: 170 + ((data_balance == 'left') ? -data_rand*5.15 : data_rand*5.15),
				id: 'weight_right',
			});
			img.scale(0.25);
			canvas_weight[index].add(img);
			weight_right = img;
			weight_right_top = weight_right.top;
			weight_right_left = weight_right.left;
		});

  		var canvas_width = canvas_weight[index].width;
  		fabric.Image.fromURL('/questions/BaiToanCaiCan/img/weight-2.png', function(img) {
			img.set({
				left: canvas_width/2,
				top: 110,
				angle: (data_balance == 'left') ? -data_rand*3 : data_rand*3
			});
			img.scale(0.7);
			canvas_weight[index].add(img);
			balance = img;
			balance_angle = balance.angle;
		});

  		fabric.Image.fromURL('/questions/BaiToanCaiCan/img/weight-1.png', function(img) {
			img.set({
				left: canvas_width/2,
				top: 180,
			});
			img.scale(0.5);
			canvas_weight[index].add(img);
		});

		fabric.Image.fromURL('/questions/BaiToanCaiCan/img/coin.png', function(objects) {
		 	objects.set({
				left: canvas_width/2 - 90,
				top: 30,
				id: 'coin_left'
			});
			objects.scale(0.55);
		    canvas_weight[index].add(objects);
		    coin_left = objects;
		});

		fabric.Image.fromURL('/questions/BaiToanCaiCan/img/coin.png', function(objects) {
		 	objects.set({
				left: canvas_width/2 + 90,
				top: 30,
				id: 'coin_right'
			});
			objects.scale(0.55);
		    canvas_weight[index].add(objects);
		    canvas_weight[index].renderAll(objects);
		    coin_right = objects;
		});

  		for( var i = 0; i < data_rand; i++ ){
  			fabric.Image.fromURL('/questions/BaiToanCaiCan/img/dollar.png', function(img) {
				img.set({
					left: ((data_balance == 'left') ? canvas_width/2 - 90 : canvas_width/2 + 90) + fabric.util.getRandomInt(-25, 25),
					top: 200 + data_rand*5.15,
					id: 'dollar_'+( (data_balance == 'left') ? 'left' : 'right' ),
				});
				canvas_weight[index].add(img);
			});
  		}

	});

})