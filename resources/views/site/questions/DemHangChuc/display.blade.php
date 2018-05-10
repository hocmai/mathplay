<?php
$min = (!empty($config['min_value']) && $config['min_value'] >= 10) ? $config['min_value'] : 10;
$max = !empty($config['max_value']) ? $config['max_value'] : 100;
$answer = floor(rand($min, $max)/10);

$image_data = DemHangChuc::getImageData()['data'];
$image = !empty($config['image_data']) ? $image_data[$config['image_data']] : 'rand';
if( $image == 'rand' ){
	$image = $image_data[array_rand($image_data)];
}

$answertype = !empty($config['answer_type']) ? $config['answer_type'] : 'rand';
if( $answertype == 'rand' ){
	$answertype = ['trac-nghiem', 'dien-dap-an'];
	$answertype = $answertype[array_rand($answertype)];
}
?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => [] ] )

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer * 10 }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group row">
			@for($i = 1; $i <= $answer; $i++)
				<div class="col-xs-4 col-sm-3" style="margin: 15px 0"><img src="{{ $image }}" width="125"></div>
			@endfor
		</div>
		<div class="clearfix"></div>

		@if($answertype == 'dien-dap-an')
			<div class="form-group col-sm-2 input">
				{{ Form::number('answer', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		@else
			<table class="form-group choose" cellspacing="5" cellpadding="5">
				<tr>
					@for($i = 1; $i <= 5; $i++)
						<td>
							<input class="hidden" id="answer-{{ $question_num.$i }}" type="radio" name="answer" value="{{ $i*10 }}"/>
							<label for="answer-{{ $question_num.$i }}">
								{{ $i*10 }}
							</label>
						</td>
					@endfor
				</tr>
				<tr>
					@for($i = 6; $i <= 10; $i++)
						<td>
							<input class="hidden" id="answer-{{ $question_num.$i }}" type="radio" name="answer" value="{{ $i*10 }}"/>
							<label for="answer-{{ $question_num.$i }}">
								{{ $i*10 }}
							</label>
						</td>
					@endfor
				</tr>
			</table>
			<style type="text/css">
				
			</style>
		@endif
	{{ Form::close() }}
</div>
@include('site.questions_guide.dem_hang_chuc')