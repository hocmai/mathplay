$(document).ready(function($) {
	
	//////////// Submit answer form
	$('.question-wrapper').on('submit', 'form.answer-question-form', function(e){
		var data = $(this).serializeArray(), input = {},
		parent = $(this).parents('.question-rendered'),
		q_num = parent.parent().find('>.question-rendered').length,
		qid = parent.attr('qid'),
		q_order = parseInt(parent.attr('q-order')),
		your_score = parseInt($('.diem. your-score').text());

		$.each(data, function (i, value) {
	        input[value.name] = value.value;
	    });

		////// chua co cau tra loi
	    if( $.isEmptyObject(input.answer) ){
	    	$('body').toggleClass('open-hd-giai');
	    	return false;
	    }

		var rand = Math.floor((Math.random() * 2) + 1);
		if( !$.isEmptyObject(input.true_answer) && input.answer == input.true_answer ){
			//////// Dung
			// Chuyen cau tiep theo
			if( q_order < q_num ){
				parent.fadeOut('300', function(){
					parent.removeClass('active').addClass('hide');
					parent.next().hide().removeClass('hide');
				});
			}
			
			window.setTimeout(function(){
				$('#myModal-true').modal('hide'); // Hide modal chuc mung

				// Hide cau hien tai, Hien cau tiep theo
				if( q_order < q_num ){
					$('.total-number .current-question').text(q_order+1);
					parent.next().fadeIn('400').addClass('active');
				} else{
					// Cau hoi cuoi cung, hien tong so diem
					window.setTimeout(function(){
						$('.box-bai-lam .boxLeft, .box-bai-lam .boxRight').hide('400');
						$('.box-bai-lam .hoan-thanh').removeClass('hidden').fadeIn();
					},500);
				}
			},1000)

			$('#myModal-true').modal('show');
			var audio = $('#myModal-true').find('.audio > audio');
			audio.get(rand-1).play();
		} else{
			///////// Sai
			// Hien modal
			$('#myModal-false').modal('show');
			var audio = $('#myModal-false').find('.audio > audio');
			audio.get(rand-1).play();
		}

	    // console.log(input);
	    e.preventDefault();
	});

	//////// Send your answer
	$('.gui-bai').click(function(){
		$('.question-rendered.active form.answer-question-form').trigger('submit');
		return false;
	});

	/////// Dismiss modal alert
    $('.over').click(function () {
        $('body').removeClass('open-hd-giai');
    });

    /////// Timer counter
    if($('.times>.hours, .times>.minutes, .times>.seconds').length){
    	var start = $('.times').attr('data-start'),
    	hours = $('.times>.hours'),
    	minutes = $('.times>.minutes'),
    	seconds = $('.times>.seconds'),
    	second_start = min_start = hour_start = 0;

    	if(typeof start == 'undefined') start = 0;

    	counterSecond = setInterval(function () {
    		second_start ++;
	        seconds.text( ((second_start < 10) ? '0' : '' )+second_start );
    		if( second_start >= 60 ) second_start = -1;
	    }, 1000);

    	counterMinute = setInterval(function () {
    		min_start ++;
	        minutes.text( ((min_start < 10) ? '0' : '' )+min_start );
    		if( min_start >= 59 ) min_start = -1;
	    }, 60000);

    	counterHour = setInterval(function () {
    		hour_start ++;
	        hours.text( ((hour_start < 10) ? '0' : '' )+hour_start );
    		// if( hour_start >= 60 ) hour_start = -1;
	    }, 60000*60);
	    // clearInterval(counter);
    }


});