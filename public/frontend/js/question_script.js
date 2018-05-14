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

////// Ban phim ao//////////////////
// keyboardToggle = function(action = ''){
//     var $ = jQuery;
//     if( action == '' | action == 'toggle' ){
//         $('.ban-phim').toggleClass('clicked');
//     }
//     else if( action == 'show' ){
//         $('.ban-phim').removeClass('clicked');
//     } 
//     else{
//         $('.ban-phim').addClass('clicked');
//     }

//     if($('.ban-phim').hasClass('clicked')){
//         $('.ban-phim .text-show').html("Hiển thị bàn phím <i class='fa fa-angle-double-up'></i>")
//     }else {
//         $('.ban-phim .text-show').html("Thu nhỏ <i class='fa fa-angle-double-down'></i>")
//     }
// }

//////////// Move cursor to first letter of an input
jQuery.fn.setCaret = function (pos) {
    var input = this[0];
    if( input.type == 'number' ){
    	return;
    }
    if (input.setSelectionRange) {
        input.focus();
        input.setSelectionRange(pos, pos);
    } else if (input.createTextRange) {
        var range = input.createTextRange();
        range.collapse(true);
        range.moveEnd('character', pos);
        range.moveStart('character', pos);
        range.select();
    }
};
// enter chuyển ô d
$(document).ready(function(eOuter) {
	var id;
    $('input').bind('keypress', function(eInner) {
        var tabindex = $(this).attr('tabindex');
        tabindex++; //increment tabindex
        $('[tabindex=' + tabindex + ']').focus();
        // to cancel out Onenter page postback in asp.net
    });
});

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
			if( $('.question-rendered.active form.answer-question-form').find('input[type="text"]').length == 0
				&& $('.question-rendered.active form.answer-question-form').find('input[type="number"]').length == 0 ){

				$('.question-rendered.active form.answer-question-form').trigger('submit');
			}
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
		your_score = parseInt($('.diem .your-score').first().text()),
		max_score = parseInt(parent.attr('max-score')),
		score = parseInt(parent.attr('score')),
		data_history = $.parseJSON(parent.attr('data-history'));

		$.each(data, function (i, value) {
	        input[value.name] = value.value;
	    });
	    
		////// chua co cau tra loi
	    if( $.isEmptyObject(input.answer) ){
	    	// $('body').toggleClass('open-hd-giai');
	    	return false;
	    }

		var rand = Math.floor((Math.random() * 2) + 1);

		if( !$.isEmptyObject(input.true_answer) && input.answer == input.true_answer ){
			//////// Tra loi Dung

			///// Cap nhat lich su
			data_history.score = your_score+score;
			data_history.time_use = parseInt($('.times>.time-use').text());

			// Neu la cau cuoi cung thi chuyen trang thai lich su
			// data_history.completed = 0;
			// if( q_order == q_num ){
			// 	// data_history.completed = 1;
			// 	data_history.current_question = q_num;
			// }

			$.ajax({
				url: '/ajax/updatestudyhistory',
				type: 'POST',
				data: {data: JSON.stringify(data_history)},
				success: function(result){
					console.log(result);
					if( q_order < q_num ){
						$('.diem .your-score').text(result.score);
						$('.lession-page .lession-process .progress>.progress-bar').animate(
							{width: result.score+'%'},
							400, function(){
								if( result.star >= 1 )
									$('.lession-page .lession-process .progress>.star-1').addClass('on');
								if( result.star >= 2 )
									$('.lession-page .lession-process .progress>.star-2').addClass('on');
								if( result.star >= 3 )
									$('.lession-page .lession-process .progress>.star-3').addClass('on');
							}
						);
					}
					else {
						$('.box-bai-lam .hoan-thanh .point').text(result.score+' điểm');
					}
				},
				error: function(error){
					console.log(error.responseText);
				}
			});
			
			window.setTimeout(function(){
				$('#myModal-true').modal('hide'); // Hide modal chuc mung

				// Hide cau hien tai, Hien cau tiep theo
				// $('.diem .your-score').text(your_score+score);
				if( q_order < q_num ){
					show_next_question(parent);
				} else{
					// Cau hoi cuoi cung, hien tong so diem
					// $('.box-bai-lam .hoan-thanh .point').text((your_score+score)+' điểm');
					window.setTimeout(function(){
						$('.box-bai-lam .boxLeft, .box-bai-lam .boxRight').hide('400');
						$('.box-bai-lam .hoan-thanh').removeClass('hidden').show();
						$('.ban-phim').hide();
					},500);
				}
			},1000)

			$('#myModal-true').modal('show');
			// var audio = $('#myModal-true').find('.audio > audio');
			// if(audio.length) audio.get(rand-1).play();
		}
		else{
			///////// Tra loi sai
			// Hien modal
			// keyboardToggle('hide');
			$('#myModal-false').modal('show');
			// var audio = $('#myModal-false').find('.audio > audio');
			// if(audio.length) audio.get(rand-1).play();
		}

	    // console.log(input);
	    e.preventDefault();
	    // return false;
	});

	//////////////////// Lam bai tiep ///////////////////
	$('.bg-box-lam-bai .lam-bai-tiep').on('click', function(){
		next_question_anyway();
	})

	//////////////////// Huong dan giai ///////////////////
	$('.bg-box-lam-bai .btn-support .huong-dan-giai').on('click', function(){
		$('#myModal-false').modal('hide');
		if( $('.question-rendered.active .huong-dan-giai').length ){
			$('.question-rendered.active .question-wrapper form input').attr('disabled', 'disabled');
			$('.question-rendered.active .huong-dan-giai').fadeIn('300', function() {
				var top = $(this).offset().top;
				$('body, html').animate({scrollTop: top}, 300);
			});
		}
		return false;
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
		your_score = parseInt($('.diem .your-score').first().text()),
		max_score = parseInt(parent.attr('max-score')),
		data_history = $.parseJSON(parent.attr('data-history'));
		// console.log(your_score);

		data_history.score = your_score;
		data_history.current_question = q_order+1;
		data_history.time_use = parseInt($('.times>.time-use').text());

		// Neu la cau cuoi cung thi chuyen trang thai lich su
		data_history.completed = 0;
		if( q_order >= q_num ){
			data_history.completed = 1;
		}

		$.ajax({
			url: '/ajax/updatestudyhistory',
			type: 'POST',
			data: {data: JSON.stringify(data_history)},
			success: function(result){
				console.log(result);
				if( q_order >= q_num ){
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
			// else{
			// 	keyboardToggle('hide');
			// }
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



    /////////////////////// hien thi ban phim ao //////////////////////
    window.setTimeout(function(){
    	if( $('.question-rendered.active input.virtual-focus').length == 0 ){
	        if( $('.question-rendered.active input[type="text"]').length ){
	            $('.question-rendered.active input[type="text"]:first').focus();
	            $('.question-rendered.active input[type="text"]:first').addClass('virtual-focus');
	            // keyboardToggle('show');
	        }
	        else if( $('.question-rendered.active input[type="number"]').length ){
	            $('.question-rendered.active input[type="number"]:first').focus();
	            $('.question-rendered.active input[type="number"]:first').addClass('virtual-focus');
	            // keyboardToggle('show');
	        }
    	}
    	else{
            $('.question-rendered.active input.virtual-focus').focus();
    	}
    },300)

    // $(window).on('click', function(e){
    //     if( $('.lession-keyboard').length == 0 ) return;

    //     if( $(e.target).get(0).tagName != 'INPUT' 
    //         && $.inArray($(e.target).attr('type'), ['text','number']) < 0 
    //         && $(e.target).parents('.lession-keyboard').length == 0
    //         && !$('.lession-keyboard').hasClass('clicked') )
    //     {
    //         $('input.virtual-focus').removeClass('virtual-focus');
    //         // keyboardToggle('hide');
    //     }
    // })

    $(document).on('focus', '.question-rendered input[type="text"], .question-rendered input[type="number"]', function(){
        $('input.virtual-focus').removeClass('virtual-focus');
        $(this).addClass('virtual-focus');
        // keyboardToggle('show');
    })

    // $('.lession-keyboard .text-show').click(function () {
    //     // keyboardToggle();
    // });

    /////// nhap input qua ban phim ao ///////////
    $('.lession-keyboard').on('click', '.item-number', function(){
        if( $('input.virtual-focus').is(":visible") ){
            var origin = $('input.virtual-focus').val(),
            value = $(this).text();
            $('input.virtual-focus').val(origin + value).change();
            $('input.virtual-focus').val(origin + value).focus();
        }
    })
    $('.lession-keyboard').on('click', '.delete', function(){
        if( $('input.virtual-focus').is(":visible") ){
            var origin = $('input.virtual-focus').val();
            $('input.virtual-focus').val(origin.substring(0, origin.length - 1)).change();
            $('input.virtual-focus').val(origin.substring(0, origin.length - 1)).focus();
        }
    })


});