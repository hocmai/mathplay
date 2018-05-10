<?php
$answer = isset($config['answer']) ? $config['answer'] : '';
$type = isset($config['type']) ? $config['type'] : 'input';
// dd($config);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content text-left col-xs-12">
				{{ Common::getObject($question, 'content') }}
			</div>
		</div>
		
		<div class="form-group pull-left text-left">
			@if( $type == 'input' )
				<div class="col-sm-12">
					{{ Form::text('answer', '', ['class' => 'form-control', 'required' => true]) }}
				</div>
			@elseif( $type == 'choose' && isset($config['answer_key']) )
				@foreach( $config['answer_key'] as $key => $value )
					<div class="radio form-group radio-box">
						{{ Form::radio('answer', $value, false, ['id' => $question_num.'-'.$key]) }}
						<label for="{{ $question_num.'-'.$key }}">{{ (isset($config['answer_value'][$key])) ? $config['answer_value'][$key] : '' }}</label>
					</div>
					<div class="clear clearfix"></div>
				@endforeach
			@elseif( $type == 'multi' && isset($config['answer_key']) )
				{{ Form::hidden('answer') }}
				@foreach( $config['answer_key'] as $key => $value )
					<div class="radio form-group radio-box">
						{{ Form::checkbox('answer[]', $value, false, ['id' => $question_num.'-'.$key]) }}
						<label for="{{ $question_num.'-'.$key }}">{{ (isset($config['answer_value'][$key])) ? $config['answer_value'][$key] : '' }}</label>
					</div>
					<div class="clear clearfix"></div>
				@endforeach
			@endif
		</div>
	{{ Form::close() }}
</div>
@if( !empty($config['question_guide']))
<div class="huong-dan-giai text-left">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper">
		{{ $config['question_guide'] }}
		<button class="btn lam-bai-tiep margin0" data-dismiss="modal" aria-label="Close">Làm bài tiếp</button>
	</div>
</div>
@endif