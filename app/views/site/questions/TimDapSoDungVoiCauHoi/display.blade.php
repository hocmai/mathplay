<?php
$answer = isset($config['answer']) ? $config['answer'] : '';
$type = isset($config['type']) ? $config['type'] : 'input';
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

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group number-line">
			<div class="content text-left">
				{{ Common::getObject($question, 'content') }}
			</div>
		</div>
		
		<div class="form-group inline-block">
			@if( $type == 'input' )
				<div class="col-sm-12">
					{{ Form::text('answer', '', ['class' => 'form-control', 'required' => true]) }}
				</div>
			@else
				<?php
					$answer_arr = !empty($config['answer_arr']) ? explode(';', $config['answer_arr']) : []; 
					shuffle($answer_arr);
				?>
				@foreach( $answer_arr as $key => $value )
					<?php $value = trim($value); ?>
					<div class="radio form-group radio-box">
						{{ Form::radio('answer', $value, false, ['id' => $question_num.'-'.$key]) }}
						<label for="{{ $question_num.'-'.$key }}">{{ $value }}</label>
					</div>
				@endforeach
			@endif
		</div>
	{{ Form::close() }}
</div>