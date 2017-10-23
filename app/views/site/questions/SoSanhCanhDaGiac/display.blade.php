<?php
$range = range(3,8);
$num = array_rand($range, 2);
$answer = $range[getRandArrayVal($num)];
?>

<div class="start">
    @if(!empty($config['sound_title']))
        <div class="play-question-sound">
            <button class="control play"></button>
            <video class="hidden">
                <source src="{{ $config['sound_title'] }}" type="" type="audio/mpeg">
            </video>
        </div>
    @endif
    {{ $question->title }}
</div>
<div class="description">Hình nào có số {{ getRandArrayVal(['cạnh', 'đỉnh']) }} {{ ($answer < $range[$num[1]]) ? 'bé' : 'lớn' }} hơn?</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="content inline-block">
			<?php shuffle($num); ?>
			@for($i = 0; $i < 2; $i++)
				<div class="form-group inline-block radio-box">
					<input class="hidden" type="radio" value="{{ $range[$num[$i]] }}" name="answer" id="answer-{{ $question->id.'-'.$question_num.'-'.$i }}">
					<label for="answer-{{ $question->id.'-'.$question_num.'-'.$i }}">
						<div class="shape">
							{{ SoSanhCanhDaGiac::renderShape($range[$num[$i]]) }}
						</div>
					</label>
				</div>
			@endfor
		</div>
	{{ Form::close() }}
</div>