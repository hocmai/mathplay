////////////////////////////////////////////////
/////////////// soundManager ///////////////////
////////////////////////////////////////////////
var nowPlaying = false;
function PlaySoundManage(element, id){
	jQuery(element).switchClass('play', 'stop', 0);
	nowPlaying = false;
	soundManager.stopAll();
	var id_list = id.split('_');
	playAudio(id_list, 0 , element);
}

function playAudio(id_list, playlistId, button){
    // Default playlistId to 0 if not supplied 
    playlistId = playlistId ? playlistId : 0;
    // Standard Sound Manager play sound function...
    nowPlaying = soundManager.play(id_list[playlistId],{
		onfinish: function() {
			playlistId ++;
            playAudio(id_list, playlistId, button);
			if(playlistId == id_list.length){
				jQuery(button).switchClass('stop', 'play', 0);
			}
	 	}
	});
	if( typeof nowPlaying.readyState != 'undefined' && nowPlaying.readyState == 0 ){
		jQuery(button).switchClass('stop', 'play', 0);
	}
}

soundManager.useConsole = soundManager.setupOptions.debugMode = false;
var onReady = function() {
    for(var i = 0; i< audioList.length; i++){
        soundManager.createSound(audioList[i]);
    }
}

if(soundManager.readyState != 3){
	soundManager.onready(function(){ onReady() });
}
else {
    onReady();
}
//////////////////////////////////////////////////
//////////////// End soundManager ////////////////
//////////////////////////////////////////////////


$(document).ready(function($) {

	//////////////// Checkbox multi value [name="answer[]"]
	$('form.answer-question-form').on('change', 'input[type="checkbox"][name="answer[]"]', function(){
		var val = [];
		$(this).parents('form.answer-question-form').find('input[type="checkbox"][name="answer[]"]').each(function(){
			if( $(this).is(":checked") ){
				val.push($(this).val());
			}
		})
		$(this).parents('form.answer-question-form').find('input[name="answer"]').val(val.join(',')).change();
		// console.log( val.join(',') );
	})
	//////////////// Textbox multi value [name="answer[]"]
	$('form.answer-question-form').on('change', 'input[type="text"][name="answer[]"], input[type="number"][name="answer[]"]', function(){
		var val = [];
		$(this).parents('form.answer-question-form').find('input[name="answer[]"]').each(function(){
			val.push($(this).val());
		})
		$(this).parents('form.answer-question-form').find('input[name="answer"]').val(val.join(',')).change();
		// console.log( val.join(',') );
	})
	
    ///////// Play question sound
    $('.play-question-sound>button.control').on('click', function(){
    	if( $(this).parent().find('>video').length ){
	        if($(this).hasClass('play')){
	            $(this).parent().find('>video')[0].play();
	        } else{
	            $(this).parent().find('>video')[0].pause();
	            $(this).parent().find('>video')[0].load();
	        }
	        $(this).toggleClass('play');
    	}
    })
    $('.play-question-sound>video').on('ended', function(){
        $(this).parent().find('button.control').addClass('play');
    })


	//////////// Submit answer form
	$(window).on('keypress', function(event) {
		////////////// Submit form when press ENTER key
		if( event.keyCode == 13 ){
			$('.question-rendered.active form.answer-question-form').trigger('submit');
		}
	});

	$('.question-wrapper').on('submit', 'form.answer-question-form', function(e){
		console.log('Form global process');
		var data = $(this).serializeArray(),
		input = {},
		parent = $(this).parents('.question-rendered'),
		q_num = parent.parent().find('>.question-rendered').length,
		qid = parent.attr('qid'),
		q_order = parseInt(parent.attr('q-order')),
		your_score = parseInt($('.diem .your-score').text()),
		max_score = parseInt(parent.attr('max-score')),
		score = parseInt(parent.attr('score')),
		data_history = $.parseJSON(parent.attr('data-history'));

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
			//////// Tra loi Dung

			///// Cap nhat lich su
			data_history.score = your_score+score;
			data_history.current_question = q_order+1;
			data_history.time_use = parseInt($('.times>.time-use').text());

			// Neu la cau cuoi cung thi chuyen trang thai lich su
			data_history.completed = 0;
			if( q_order == q_num ){
				data_history.completed = 1;
				data_history.current_question = q_num;
			}

			$.ajax({
				url: '/ajax/updatestudyhistory',
				type: 'POST',
				data: {data: JSON.stringify(data_history)},
				success: function(result){
					console.log(result);
				},
				error: function(error){
					console.log(error.responseText);
				}
			});
			
			window.setTimeout(function(){
				$('#myModal-true').modal('hide'); // Hide modal chuc mung

				// Hide cau hien tai, Hien cau tiep theo
				$('.diem .your-score').text(your_score+score);
				if( q_order < q_num ){
					show_next_question(parent);
				} else{
					// Cau hoi cuoi cung, hien tong so diem
					$('.box-bai-lam .hoan-thanh .point').text((your_score+score)+' điểm');
					window.setTimeout(function(){
						$('.box-bai-lam .boxLeft, .box-bai-lam .boxRight').hide('400');
						$('.box-bai-lam .hoan-thanh').removeClass('hidden').show();
						$('.ban-phim').hide();
					},500);
				}
			},1000)

			$('#myModal-true').modal('show');
			var audio = $('#myModal-true').find('.audio > audio');
			if(audio.length) audio.get(rand-1).play();
		}
		else{
			///////// Tra loi sai
			// Hien modal
			keyboardToggle('hide');
			$('#myModal-false').modal('show');
			var audio = $('#myModal-false').find('.audio > audio');
			if(audio.length) audio.get(rand-1).play();
		}

	    // console.log(input);
	    e.preventDefault();
	    // return false;
	});

	//////////////////// Lam bai tiep ///////////////////
	$('.bg-box-lam-bai .lam-bai-tiep').on('click', function(){
		next_question_anyway();
	})

	///////////////// loai bo khoang trang khi nhap dap an ///////////////
	$('.question-rendered form input[type="text"], .question-rendered form input[type="number"]').on('input', function(){
		var val = $(this).val().replace(/\s/g,"");
		$(this).val(val).change();
		// console.log(val);
	})

	////////////// Chuyen cau hoi tiep theo ////////////////////
	function next_question_anyway(){
		///// Cap nhat lich su
		parent = $('.question-rendered.active'),
		q_num = parent.parent().find('>.question-rendered').length,
		q_order = parseInt(parent.attr('q-order')),
		your_score = parseInt($('.diem .your-score').text()),
		max_score = parseInt(parent.attr('max-score')),
		data_history = $.parseJSON(parent.attr('data-history'));

		data_history.score = your_score;
		data_history.current_question = q_order+1;
		data_history.time_use = parseInt($('.times>.time-use').text());

		// Neu la cau cuoi cung thi chuyen trang thai lich su
		data_history.completed = 0;
		if( q_order == q_num ){
			data_history.completed = 1;
			data_history.current_question = q_num;
		}

		$.ajax({
			url: '/ajax/updatestudyhistory',
			type: 'POST',
			data: {data: JSON.stringify(data_history)},
			success: function(result){
				console.log(result);
				if( q_order == q_num ){
					// Cau hoi cuoi cung, hien tong so diem
					$('.box-bai-lam .hoan-thanh .point').text((your_score)+' điểm');
					window.setTimeout(function(){
						$('.box-bai-lam .boxLeft, .box-bai-lam .boxRight').hide('400');
						$('.box-bai-lam .hoan-thanh').removeClass('hidden').show();
						$('.ban-phim').hide();
					},500);
				}else{
					show_next_question(parent);
				}
			},
			error: function(error){
				console.log(error.responseText);
			}
		});
	}

	///////////// CHuyen cau tiep theo sau khi tra loi dung ////////////////
	function show_next_question(parent){
		var q_order = parseInt($('.question-rendered.active').attr('q-order'));
		parent.fadeOut('300', function(){
			parent.removeClass('active').addClass('hide');
			parent.next().hide().removeClass('hide');
			parent.next().fadeIn('400').addClass('active');
			if(parent.next().find('input[type="number"]').length){
				parent.next().find('input[type="number"]')[0].focus();
			}
			else if(parent.next().find('input[type="text"]').length){
				parent.next().find('input[type="text"]')[0].focus();
			}
			else{
				keyboardToggle('hide');
			}
			$('.total-number .current-question').text(q_order+1);
		});
	}

	//////// Send your answer
	$('.gui-bai').click(function(){
		$('.question-rendered.active form.answer-question-form').trigger('submit');
		return false;
	});

    /////// Timer counter
    if($('.times>.hours, .times>.minutes, .times>.seconds').length){
    	var start = parseInt($('.times>.time-use').text()),
    	hours = $('.times>.hours'),
    	minutes = $('.times>.minutes'),
    	seconds = $('.times>.seconds'),
    	second_start = parseInt(seconds.text()),
    	min_start = parseInt(minutes.text()),
    	hour_start = parseInt(hours.text());

    	counterSecond = setInterval(function () {
    		second_start ++;
	        seconds.text( ((second_start < 10) ? '0' : '' )+second_start );
    		if( second_start >= 60 ) second_start = -1;
    		start++;
    		$('.times>.time-use').text(start)
	    }, 1000);

    	counterMinute = setInterval(function () {
    		min_start ++;
	        minutes.text( ((min_start < 10) ? '0' : '' )+min_start );
    		if( min_start >= 59 ) min_start = -1;
	    }, 1000*60);

    	counterHour = setInterval(function () {
    		hour_start ++;
	        hours.text( ((hour_start < 10) ? '0' : '' )+hour_start );
	    }, 1000*60*60);
	    // clearInterval(counter);
    }


});