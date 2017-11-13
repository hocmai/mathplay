
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="1" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value="" />
		
		<div class="form-group">
			<div class="content inline-block">
				<canvas class="canvas-weight-balance" id="canvas-weight-balance-{{ $question_num }}" width="400px" height="300px" data-balance="{{ getRandArrayVal(['left', 'right']) }}" data-rand="{{ rand(1,5) }}"></canvas>
			</div>
		</div>
	{{ Form::close() }}
</div>