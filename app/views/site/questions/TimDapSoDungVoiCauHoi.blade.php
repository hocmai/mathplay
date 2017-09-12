<?php
$answer = !empty($config['answer']) ? $config['answer'] : 100;
?>

<div class="start">
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
			<div class="col-sm-12">
				{{ Form::text('answer', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>